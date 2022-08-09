<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthorController extends Controller
{
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

        $input = $request->validate([
            'imeAutor' => ['required', 'string', 'max:255'],
            'prezimeAutor' => ['required', 'string', 'max:255'],
            'opis_autor' => [''],
            'photoPath' => ['']
        ]);

        if ($file = $request->file('photoPath')){
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/authors', $name);
            $input['photoPath'] = $name;
        } else{
            $input['photoPath'] = null;
        }

        $author = new Author([
            'name' => $input['imeAutor'],
            'surname' => $input['prezimeAutor'],
            'biography' => $input['opis_autor'],
            'image' => $input['photoPath']
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
        $input = $request->validate([

            'imeAutorEdit' => ['required', 'string', 'max:255'],
            'prezimeAutorEdit' => ['required', 'string', 'max:255'],
            'opis_autor_edit' => [''],
            'photoPath' => ['']

        ]);

        if ($file = $request->file('photoPath')) {
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/authors', $name);
            $input['photoPath'] = $name;

            if (file_exists($image = public_path() . $author->image)) {
                unlink($image);
            }
            $author->image = $input['photoPath'];
        } else {
            unset($input['photoPath']);
        }

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
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public
    function destroy(Author $author)
    {
        //
        if (file_exists($photoPath = public_path() . $author->image)){
            unlink($photoPath);
        }
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autor "' . $author->name . ' ' . $author->surname . '" je uspješno izbrisan');
    }

    /**
     * Remove the specified resourceS from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bulkDelete()
    {
        $names = [];
        $ids = explode(',', request('ids'));
        foreach ($ids as $id){
            $author = Author::find($id);
            if (file_exists($photoPath = public_path() . $author->image)){
                unlink($photoPath);
            }
            $author->delete();
            $names[] = $author->name . ' ' . $author->surname;
        }
        return redirect()->route('authors.index')->with('success', 'Autori: "' . implode(', ', $names) . '" su uspješno izbrisani');
    }
}
