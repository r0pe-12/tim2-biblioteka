<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\CreateRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookBind;
use App\Models\Category;
use App\Models\Format;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Script;
use Illuminate\Support\Arr;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        return view('book.index', [
            'books' => Book::all()->load('genres', 'authors', 'categories'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('book.create', [
            'categories' => Category::all(),
            'genres' => Genre::all(),
            'authors' => Author::all(),
            'publishers' => Publisher::all(),
            'scripts' => Script::all(),
            'bookbinds' => BookBind::all(),
            'formats' => Format::all()
        ]);
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

//        creating new record in books table
        $book = Book::create(Arr::except($input,['categories', 'genres', 'authors']));

//        attaching book to multiple authors
        $book->authors()->sync($input['authors']);

//        attaching book to multiple categories
        $book->categories()->sync($input['categories']);

//        attaching book to multiple genres
        $book->genres()->sync($input['genres']);

        return redirect()->route('books.index')->with('success', 'Nova knjiga "' . $book->title . '" je uspješno kreirana');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Book $book)
    {
        //
        return view('book.show', [
            'book' => $book->load('authors', 'categories', 'genres', 'publisher', 'script', 'bookBind', 'format')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Book $book)
    {
        //
        return view('book.edit', [
            'book' => $book->load('categories', 'genres', 'authors'),
            'categories' => Category::all(),
            'genres' => Genre::all(),
            'authors' => Author::all(),
            'publishers' => Publisher::all(),
            'scripts' => Script::all(),
            'bookbinds' => BookBind::all(),
            'formats' => Format::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreateRequest $request, Book $book)
    {
        //
        $input = $request->validated();

//        creating new record in books table
        $book->update(Arr::except($input,['categories', 'genres', 'authors']));

//        attaching book to multiple authors
        $book->authors()->sync($input['authors']);

//        attaching book to multiple categories
        $book->categories()->sync($input['categories']);

//        attaching book to multiple genres
        $book->genres()->sync($input['genres']);

        return redirect()->route('books.index')->with('success', 'Knjiga: "' . $book->title . '" je uspješno izmijenjena');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Knjiga: "' . $book->title . '" je uspješno izbrisana');
    }
}
