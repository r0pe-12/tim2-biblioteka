<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $genres = Genre::latest()->get();
        return view('settings.genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('settings.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $input = $request->validate([

            'nazivZanra' => ['required', 'string', 'max:255'],
            'photoPath' => []

        ]);

        if ($file = $request->file('photoPath')){
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/genres', $name);
            $input['photoPath'] = $name;
        } else {
            $input['photoPath'] = null;
        }

        $genre = new Genre([

            'name' => $input['nazivZanra'],
            'icon' => $input['photoPath']

        ]);

        $genre->save();
        return \redirect()->route('genre.index')->with('success', 'Novi žanr "' . $genre->name . '" je uspješno kreiran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Genre $genre)
    {
        //
        return view('settings.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Genre $genre)
    {
        //

        $input = $request->validate([

            'nazivZanrEdit' => ['required', 'string', 'max:255'],
            'photoPath' => []

        ]);

        if ($file = $request->file('photoPath')) {
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/genres', $name);
            $input['photoPath'] = $name;

            if (file_exists($icon = public_path() . $genre->icon)) {
                unlink($icon);
            }
            $genre->icon = $input['photoPath'];
        } else {
            unset($input['icon']);
        }

        $genre->name = $request->nazivZanrEdit;

        if ($genre->isClean()){
//            if genre name is unchanged we throw form validation error
            throw ValidationException::withMessages([
                'nazivZanrEdit' => 'Polje je nepromijenjeno'
            ]);
        }

        $genre->save();
        return redirect()->route('genre.index')->with('success', 'Žanr "' . $genre->name .  '" uspješno izmijenjen');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Genre $genre)
    {
        //
        $photo = $genre->icon;

        try {
            $genre->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Brisanje žanra "' . $genre->name . '" nije moguće');
        }

        if (file_exists($iconPath = public_path() . $photo)){
            unlink($iconPath);
        }
        return redirect()->route('genre.index')->with('success', 'Žanr "' . $genre->name . '" je uspješno obrisan');
    }


    /**
     * Remove the specified resourceS from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bulkDelete()
    {
//        $names = [];
        $ids = explode(',', request('ids'));
        $genres = Genre::whereIn('id', $ids);

        $photos = [];
//        we will get all photopaths from genres
        foreach ($genres->get() as $genre){
            $photos[] = $genre->iconPath;
        }

//        we will try to delete genres
        try {
            $genres->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Brisanje žanrova nije moguće');
        }
//        if we delete them we will delete photos from storage
        foreach ($photos as $photo){
            if (file_exists($photoPath = public_path() . $photo)){
                unlink($photoPath);
            }
        }
        return redirect()->route('genre.index')->with('success', 'Žanrovi su uspješno izbrisani');
    }

}
