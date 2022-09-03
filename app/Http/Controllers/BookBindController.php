<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookBind;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;

class BookBindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $bookbinds = BookBind::latest()->get();
        return view('settings.bookBind.index', compact('bookbinds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('settings.bookBind.create');
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

            'nazivPovez' => 'required|string|max:255'

        ]);

        $bookbind = new BookBind([

            'name' => $request->nazivPovez

        ]);

        $bookbind->save();
       return \redirect()->route('bookbind.index')->with('success', 'Novi povez "' . $bookbind->name . '" je uspješno kreiran');

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
    public function edit(BookBind $bookbind)
    {
        //

        return view('settings.bookBind.edit', compact('bookbind'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, BookBind $bookbind)
    {
        //
        $request->validate([

            'nazivPovezEdit' => 'required|string|max:255'

        ]);

        $bookbind->name = $request->nazivPovezEdit;

        if ($bookbind->isClean()){
            throw ValidationException::withMessages([
                'nazivPovezEdit' => 'Polje je nepromijenjeno'
            ]);
        }
        $bookbind->save();
        return redirect()->route('bookbind.index')->with('success', 'Povez "' . $bookbind->name . '" uspješno izmijenjen');


    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(BookBind $bookbind)
    {
        //
        try {
            $bookbind->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Brisanje poveza "' . $bookbind->name . '" nije moguće');
        }
        return redirect()->route('bookbind.index')->with('success', 'Povez "' . $bookbind->name . '" je uspješno obrisan');

    }

    public function bulkDelete()
    {
//        $names = [];
        $ids = explode(',', request('ids'));
        $bookbinds = BookBind::whereIn('id', $ids);

//        we will try to delete genres
        try {
            $bookbinds->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Brisanje poveza nije moguće');
        }

        return redirect()->route('publisher.index')->with('success', 'Povezi su uspješno izbrisani');
    }
}
