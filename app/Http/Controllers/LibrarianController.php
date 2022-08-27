<?php

namespace App\Http\Controllers;

use App\Http\Requests\Librarian\CreateRequest;
use App\Http\Requests\Librarian\UpdateRequest;
use App\Models\Librarian;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use League\CommonMark\Util\SpecReader;

class LibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $librarians = Librarian::all()->load('logins', 'role');
        return view('librarian.index', compact('librarians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('librarian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        //
        $input = $request->validated();
        if ($file = $request->file('photoPath')){
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/users', $name);
            $input['photoPath'] = $name;
        }
        $librarian = new User($input);
        $role = Role::findOrNew(Librarian::ROLE);
        if (!$role->id){
            $role->id = Librarian::ROLE;
            $role->name = 'bibliotekar';
            $role->save();
        }
        $role->users()->save($librarian);
        return redirect()->route('librarians.index')->with('success', 'Bibliotekar "' . $librarian->name . ' ' . $librarian->surname . ': ' . $librarian->username . '" je usjpešno kreiran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($username)
    {
        //
        $librarian = User::where('username', '=', $username)->first();
        if (is_null($librarian)) {
            abort('404');
        }
        return view('librarian.show', compact('librarian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($username)
    {
        //
        $librarian = User::where('username', '=', $username)->first();
        if (is_null($librarian)) {
            abort('404');
        }
        return view('librarian.edit', compact('librarian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, User $librarian)
    {
        //
        $input = $request->validated();
        if (is_null($input['password'])){
            unset($input['password']);
        }
        if ($file = $request->file('photoPath')){
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/users', $name);
            $input['photoPath'] = $name;

            if (file_exists($photoPath = public_path() . $librarian->photoPath)){
                unlink($photoPath);
            }

        } else{
            unset($input['photoPath']);
        }
        $librarian->update($input);
        return redirect()->route('librarians.show', $librarian->username)->with('success', 'Bibliotekar "' . $librarian->name . ' ' . $librarian->surname . ': ' . $librarian->username . '" uspješno izmijenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($username)
    {
        //
        $librarian = User::where('username', '=', $username)->first();
        $this->authorize('delete', $librarian);

        $photo = $librarian->photoPath;

        try {
            $librarian->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Brisanje bibliotekara "' . $librarian->name . ' ' . $librarian->surname . ': ' . $librarian->username . '" nije moguce');
        }

        if (file_exists($photoPath = public_path() . $photo)){
            unlink($photoPath);
        }
        return redirect()->route('librarians.index')->with('success', 'Bibliotekar "' . $librarian->name . ' ' . $librarian->surname . ': ' . $librarian->username . '" uspješno izbrisan');
    }


    /**
     * Remove the specified resourceS from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bulkDelete()
    {
        //
        $unames = explode(',', request('unames'));
        $librarians = User::whereIn('username', $unames);

        $photos = [];
//        we will get all photopaths from librarians
        foreach ($librarians->get() as $lib){
            $photos[] = $lib->getOriginal('photoPath');
        }

//        we will try to delete librarians
        try {
            $librarians->delete();
        } catch (\Exception $e){
            return redirect()->back()->with('fail', 'Brisanje bibliotekara nije moguce');
        }

//        if wee delete them we will delete photos from storage
        foreach ($photos as $photo) {
            if (file_exists($photoPath = public_path() . $photo)){
                unlink($photoPath);
            }
        }
        return redirect()->back()->with('success', 'Bibliotekari su uspješno izbrisani');
    }


//    reset password for specific librarian
    public function passwordReset(Request $request, User $user){
        # code
        $request['password'] = $request->pwResetBibliotekar;
        $request['password_confirmation'] = $request->pw2ResetBibliotekar;
        unset($request['pwResetBibliotekar'], $request['pw2ResetBibliotekar']);

        $request->validate([
            'password' => ['required', 'confirmed']
        ]);

        $user->password = $request->password;
        $user->save();
        return redirect()->back()->with('success', 'Šifra korisnika "' . $user->name . ' ' . $user->surname . ': ' . $user->username . '" je uspješno resetovana');
    }


    //    izbrisi profilnu sliku
    public function deleteProfilePhoto(User $user){
        # code
        if (file_exists($photoPath = public_path() . $user->photoPath)){
            $user->photoPath = null;
            $user->save();
            unlink($photoPath);
        }
    }
//    END-izbrisi profilnu sliku

}
