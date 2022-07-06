<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        if ($reservation = Policy::where('name', '=', 'reservation_deadline')->first()){
            $reservation = $reservation->value;
        }
        if ($return = Policy::where('name', '=', 'return_deadline')->first()){
            $return = $return->value;
        }
        if ($conflict = Policy::where('name', '=', 'conflict_deadline')->first()){
            $conflict = $conflict->value;
        }
        return view('settings.policy.index', compact('reservation', 'return', 'conflict'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        if ($reservation = Policy::where('name', '=', 'reservation_deadline')->first()){
            $reservation = $reservation->value;
        }
        if ($return = Policy::where('name', '=', 'return_deadline')->first()){
            $return = $return->value;
        }
        if ($conflict = Policy::where('name', '=', 'conflict_deadline')->first()){
            $conflict = $conflict->value;
        }
        return view('settings.policy.index', compact('reservation', 'return', 'conflict'));

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
            'reservation_deadline' => ['integer', 'max:20'],
            'return_deadline' => ['integer', 'max:20'],
            'conflict_deadline' => ['integer', 'max:20']
        ]);
        $reservation = Policy::updateOrCreate(['name' => 'reservation_deadline'], ['name'=>'reservation_deadline', 'value'=>$request->reservation_deadline]);
        $return = Policy::updateOrCreate(['name' => 'return_deadline'], ['name'=>'return_deadline', 'value'=>$request->return_deadline]);
        $conflict = Policy::updateOrCreate(['name' => 'conflict_deadline'], ['name'=>'conflict_deadline', 'value'=>$request->conflict_deadline]);
        return back()->with('success', 'Varijable su uspješno sačuvane');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        //
        return redirect()->route('policy.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        //
        return redirect()->route('policy.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //
        return redirect()->route('policy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        return redirect()->route('policy.index');
    }
}
