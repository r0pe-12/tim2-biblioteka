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
//        todo add picture in form and implement it
        $request->validate([
            'nazivZanra' => 'required|string'
        ]);

        $genre = new Genre([
            'name' => $request->nazivZanra,
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
        $request->validate([
            'nazivZanrEdit' => 'required|string'
        ]);

        $genre->name = $request->nazivZanrEdit;

        if ($genre->isClean()){
//            if genre name is unchanged we throw form validation error
            throw ValidationException::withMessages([
                'nazivZanrEdit' => 'Polje je nepromijenjeno'
            ]);
        }
        $genre->save();

        return redirect()->route('genre.index')->with('success', 'Žanr uspješno izmijenjen');
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
        $genre->delete();
        return redirect()->route('genre.index')->with('success', 'Žanr "' . $genre->name . '" je uspješno obrisan');
    }
}
