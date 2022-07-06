<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $formats = Format::latest()->get();
        return view('settings.format.index', compact('formats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('settings.format.create');
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
            'nazivFormat' => ['required', 'max:255']
        ]);

        $format = new Format([
            'name' => $request->nazivFormat
        ]);

        $format->save();
        return redirect()->route('format.index')->with('success', 'Novi format "' . $format->name . '" je uspješno kreiran');
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
    public function edit(Format $format)
    {
        //
        return view('settings.format.edit', compact('format'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Format $format)
    {
        //
        $request->validate([
            'nazivFormatEdit' => ['required', 'max:255']
        ]);

        $format->name = $request->nazivFormatEdit;

        if ($format->isClean()){
//            if format name is unchanged we throw form validation error
            throw ValidationException::withMessages([
                'nazivFormatEdit' => 'Polje je nepromijenjeno'
            ]);
        }
        $format->save();

        return redirect()->route('format.index')->with('success', 'Format uspješno izmijenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Format $format)
    {
        //
        $format->delete();
        return redirect()->route('format.index')->with('success', 'Format "' . $format->name . '" je uspješno obrisan');

    }
}
