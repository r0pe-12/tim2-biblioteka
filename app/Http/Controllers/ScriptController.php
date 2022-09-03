<?php

namespace App\Http\Controllers;

use App\Models\Script;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ScriptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $scripts = Script::latest()->get();
        return view('settings.script.index', compact('scripts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //

        return view('settings.script.create');

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
         'nazivPismo'=> 'required|string|max:255'

     ]);
     $script = new Script([
         'name'=> $request->nazivPismo,


     ]);
     $script->save();

        return redirect()->route('script.index')->with('success', 'Novo pismo "' . $script->name . '" je uspješno kreirano');

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
    public function edit(Script $script)
    {
        //
        return view('settings.script.edit', compact('script'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Script $script)
    {
        //
        $request->validate([
           'nazivPismoEdit'=> 'required|string|max:255'
        ]);
        $script->name = $request->nazivPismoEdit;

        if
        ($script->isClean()){

            throw ValidationException::withMessages([
                'nazivPismoEdit' => 'Polje je nepromijenjeno'
            ]);
        }
        $script->save();

        return redirect()->route('script.index')->with('success', 'Pismo uspješno izmijenjeno');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Script $script)
    {
        //
        //$script->delete();
        try {
            $script->delete();
        }catch (\Exception $e){
            return redirect()->back()->with('fail', 'Brisanje pisma "' . $script->name . '" nije moguće');
        }
        return redirect()->route('script.index')->with('success', 'Pismo "' . $script->name . '" je uspješno obrisano');
    }

    public function bulkDelete()
    {
//        $names = [];
        $ids = explode(',', request('ids'));
        $scripts = Script::whereIn('id', $ids);

//        we will try to delete genres
        try {
            $scripts->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Brisanje pisama nije moguće');
        }

        return redirect()->route('publisher.index')->with('success', 'Pisma su uspješno izbrisana');
    }
}
