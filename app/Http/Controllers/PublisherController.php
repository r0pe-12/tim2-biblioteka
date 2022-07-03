<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $publishers = Publisher::latest()->get();
        return view('settings.publisher.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('settings.publisher.create');
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
            'nazivIzdavac' => 'required|string'
        ]);

        $publisher = new Publisher([
            'name' => $request->nazivIzdavac,
        ]);

        $publisher->save();
        return \redirect()->route('publisher.index')->with('success', 'Novi izdavač "' . $publisher->name . '" je uspješno kreiran');
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
    public function edit(Publisher $publisher)
    {
        //
        return view('settings.publisher.edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Publisher $publisher)
    {
        //
        $request->validate([
            'nazivIzdavacEdit' => 'required|string'
        ]);

        $publisher->name = $request->nazivIzdavacEdit;

        if ($publisher->isClean()){
//            if publisher name is unchanged we throw form validation error
            throw ValidationException::withMessages([
                'nazivIzdavacEdit' => 'Polje je nepromijenjeno'
            ]);
        }
        $publisher->save();

        return redirect()->route('publisher.index')->with('success', 'Izdavač uspješno izmijenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Publisher $publisher)
    {
        //
        $publisher->delete();
        return redirect()->route('publisher.index')->with('success', 'Izdavač "' . $publisher->name . '" je uspješno obrisan');
    }
}
