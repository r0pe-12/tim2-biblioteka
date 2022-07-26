<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthorController extends Controller
{
//    todo add picture to author in form as well as implement it
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('author.create');
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
        $request->validate([
            'imeAutor' => ['required', 'string', 'max:255'],
            'prezimeAutor' => ['required', 'string', 'max:255'],
            'opis_autor' => [''],
        ]);
        $author = new Author([
            'name' => $request->imeAutor,
            'surname' => $request->prezimeAutor,
            'biography' => $request->opis_autor
        ]);
        $author->save();
        return redirect()->route('authors.index')->with('success', 'Autor "' . $author->name  . ' ' . $author->surname . '" je uspješno kreiran');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Author $author)
    {
        //
        return view('author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Author $author)
    {
        //
        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Author $author)
    {
        //
        $request->validate([
            'imeAutorEdit' => ['required', 'string', 'max:255'],
            'prezimeAutorEdit' => ['required', 'string', 'max:255'],
            'opis_autor_edit' => [''],
        ]);
        $author->name = $request->imeAutorEdit;
        $author->surname = $request->prezimeAutorEdit;
        $author->biography = $request->opis_autor_edit;

        if ($author->isClean()){
            throw ValidationException::withMessages([
                'imeAutorEdit' => 'Polje je nepromijenjeno',
                'prezimeAutorEdit' => 'Polje je nepromijenjeno'
            ]);
        }
        $author->save();
        return redirect()->route('authors.index')->with('success', 'Autor "' . $author->name . ' ' . $author->surname . '" je uspješno izmijenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Author $author)
    {
        //
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autor "' . $author->name . ' ' . $author->surname . '" je uspješno izbrisan');
    }
}
