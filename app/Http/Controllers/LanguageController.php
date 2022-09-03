<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $languages = Language::latest()->get();
        return view('settings.language.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('settings.language.create');
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
            'nazivJezik' => 'required|string'
        ]);

        $language = new Language([
            'name' => $request->nazivJezik,
        ]);

        $language->save();
        return \redirect()->route('language.index')->with('success', 'Novi jezik "' . $language->name . '" je uspješno kreiran');

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
    public function edit(Language $language)
    {
        //
        return view('settings.language.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Language $language)
    {
        //
        $request->validate([
            'nazivJezik' => 'required|string'
        ]);

        $language->name = $request->nazivJezik;

        if ($language->isClean()){
//            if publisher name is unchanged we throw form validation error
            throw ValidationException::withMessages([
                'nazivJezik' => 'Polje je nepromijenjeno'
            ]);
        }
        $language->save();

        return redirect()->route('language.index')->with('success', 'Jezik je uspješno izmijenjen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
        //
        try {
            $language->delete();
        }catch (\Exception $e){
            return redirect()->back()->with('fail', 'Brisanje jezika "' . $language->name . '" nije moguće');
        }
        return redirect()->route('language.index')->with('success', 'Jezik "' . $language->name . '" je uspješno obrisan');
    }

    public function bulkDelete()
    {
//        $names = [];
        $ids = explode(',', request('ids'));
        $languages = Language::whereIn('id', $ids);

//        we will try to delete genres
        try {
            $languages->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Brisanje jezika nije moguće');
        }
        return redirect()->route('genre.index')->with('success', 'Jezici su uspješno izbrisani');
    }
}
