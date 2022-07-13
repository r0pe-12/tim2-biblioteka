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
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

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
        $book->authors()->sync(explode(',', $input['authors']));

//        attaching book to multiple categories
        $book->categories()->sync(explode(',', $input['categories']));

//        attaching book to multiple genres
        $book->genres()->sync(explode(',', $input['genres']));

        return redirect()->route('books.index')->with('success', 'Nova knjiga "' . $book->title . '" je uspješno kreirana');
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
