<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\CreateRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookBind;
use App\Models\Category;
use App\Models\Format;
use App\Models\Galery;
use App\Models\Genre;
use App\Models\Language;
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
            'books' => Book::all()->load('genres', 'authors', 'categories', 'photos'),
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
            'languages' => Language::all(),
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
        $book = Book::create(Arr::except($input,['categories', 'genres', 'authors', 'pdf', 'deletePdfs']));

        if ($request->hasFile('pictures')){
            foreach ($input['pictures'] as $file){
                $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
                $file->storeAs('/images/books', $name);
                $book->photos()->create([
                    'path' => $name,
                    'cover' => $file->getClientOriginalName() == $input['cover']
                ]);
            }
        }

        if ($request->hasFile('pdf')){
            $name = str_replace(' ', '_', $book->title . '.pdf');
            $input['pdf']->storeAs('/pdf', $name);
            $book->pdf = $name;
            $book->save();
        }

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
            'book' => $book->load('authors', 'categories', 'genres', 'publisher', 'script', 'bookBind', 'format'),
            'available' => $book->samples - $book->borrowedSamples,
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
            'languages' => Language::all(),
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

        if (!($present = $input['present'])){
            $present = [];
        }

        if  (count($photos = $book->photos) > 0){
//            we are making array of ids which book has
            foreach ($photos as $photo) {
                $current[] = $photo->id;
            }

            $diff = array_diff($current, $present);
//            for every id that is deleted we are going to remove it from db and delete photo which is related to it
            foreach ($diff as $id) {
                $photo = Galery::find($id);

                if (file_exists($photoPath = public_path() . $photo->path)){
                    unlink($photoPath);
                }

                $photo->delete();
            }
        }

        $book->photos()->update([
            'cover' => 0
        ]);

        if ($request->hasFile('pictures')){
            foreach ($input['pictures'] as $file){
                $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
                $file->storeAs('/images/books', $name);
                $book->photos()->create([
                    'path' => $name,
                    'cover' => $file->getClientOriginalName() == $input['cover']
                ]);
            }
        }


        if (!($input['deletePdfs'] == 1)) {
            if ($request->hasFile('pdf')){
                if ((!is_null($book->pdf)) && file_exists($pdfPath = public_path() . $book->pdf)){
                    unlink($pdfPath);
                }

                $name = str_replace(' ', '_', $book->title . '.pdf');
                $input['pdf']->storeAs('/pdf', $name);
                $book->pdf = $name;
                $book->save();
            }
        } else {
            if ((!is_null($book->pdf)) && file_exists($pdfPath = public_path() . $book->pdf)){
                unlink($pdfPath);
            }

            $book->pdf = null;
            $book->save();
        }

        if (is_numeric($input['cover'])){
            Galery::find($input['cover'])->update([
                'cover' => 1
            ]);
        }
//        creating new record in books table
        $book->update(Arr::except($input,['categories', 'genres', 'authors', 'pictures', 'cover', 'present', 'pdf', 'deletePdfs']));

//        attaching book to multiple authors
        $book->authors()->sync($input['authors']);

//        attaching book to multiple categories
        $book->categories()->sync($input['categories']);

//        attaching book to multiple genres
        $book->genres()->sync($input['genres']);

        return redirect()->back()->with('success', 'Knjiga: "' . $book->title . '" je uspješno izmijenjena');
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
        $photos = [];
        $photos = $book->photos;

        try {
            $book->delete();
        } catch (\Exception $e){
            return redirect()->back()->with('fail', 'Brisanje knjige "' . $book->title . '" nije moguće');
        }

        foreach ($photos as $photo){
            if (file_exists($photoPath = public_path() . $photo->path)){
                unlink($photoPath);
            }
        }
        return redirect()->route('books.index')->with('success', 'Knjiga: "' . $book->title . '" je uspješno izbrisana');
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
        $ids = explode(',', request('ids'));
        $books = Book::whereIn('id', $ids);

        $galery = [];
        foreach ($books->get() as $book) {
            $galery[] = $book->photos;
        }


        try {
            $books->delete();
        } catch (\Exception $e){
            return redirect()->back()->with('fail', 'Brisanje knjiga nije moguće');
        }

        foreach ($galery as $photos){
            foreach ($photos as $photo) {
                if (file_exists($photoPath = public_path() . $photo->path)){
                    unlink($photoPath);
                }
            }
        }
        return redirect()->back()->with('success', 'Knjige su uspješno izbrisane');
    }
}
