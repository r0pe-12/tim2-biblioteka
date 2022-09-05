<?php

namespace App\Http\Controllers;

use App\Http\Requests\Librarian\CreateRequest;
use App\Http\Requests\Librarian\UpdateRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $admins = Admin::all()->load('logins', 'role');
        return view('admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
//    odje cemo da koristimo request validaciju od bibliotekara jer je sve isto
    public function store(CreateRequest $request)
    {
        //
        $input = $request->validated();
        if ($file = $request->file('photoPath')){
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/users', $name);
            $input['photoPath'] = $name;
        }

        $admin = new User($input);

        $role = Role::admin();
        $role->users()->save($admin);
        return redirect()->route('admins.index')->with('success', 'Administrator "' . $admin->name . ' ' . $admin->surname . ': ' . $admin->username . '" je usjpešno kreiran');

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
        $admin = User::where('username', '=', $username)->first();
        if (is_null($admin)) {
            abort('404');
        }
        return view('admin.show', compact('admin'));

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
        $admin = User::where('username', '=', $username)->first();
        if (is_null($admin)) {
            abort('404');
        }
        return view('admin.edit', compact('admin'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
//    odje koristimo request validaciju od biblioteara jer sve isto
    public function update(UpdateRequest $request, User $admin)
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

            if (file_exists($photoPath = public_path() . $admin->photoPath)){
                unlink($photoPath);
            }

        } else{
            unset($input['photoPath']);
        }
        $admin->update($input);
        return redirect()->route('admins.show', $admin->username)->with('success', 'Administrator "' . $admin->name . ' ' . $admin->surname . ': ' . $admin->username . '" uspješno izmijenjen');

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
        $admin = User::where('username', '=', $username)->first();
        $this->authorize('delete', $admin);

        $photo = $admin->photoPath;

        try {
            $admin->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Brisanje administratora "' . $admin->name . ' ' . $admin->surname . ': ' . $admin->username . '" nije moguće');
        }

        if (file_exists($photoPath = public_path() . $photo)){
            unlink($photoPath);
        }
        return redirect()->route('admins.index')->with('success', 'Administrator "' . $admin->name . ' ' . $admin->surname . ': ' . $admin->username . '" uspješno izbrisan');

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
        $admins = User::whereIn('username', $unames);

        $photos = [];
//        we will get all photopaths from admins
        foreach ($admins->get() as $lib){
            $photos[] = $lib->getOriginal('photoPath');
        }

//        we will try to delete admins
        try {
            $admins->delete();
        } catch (\Exception $e){
            return redirect()->back()->with('fail', 'Brisanje administratora nije moguće');
        }

//        if wee delete them we will delete photos from storage
        foreach ($photos as $photo) {
            if (file_exists($photoPath = public_path() . $photo)){
                unlink($photoPath);
            }
        }
        return redirect()->back()->with('success', 'Administratori su uspješno izbrisani');
    }

    //    reset password for specific admin
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

}
