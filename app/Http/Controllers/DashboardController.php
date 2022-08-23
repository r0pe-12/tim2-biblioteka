<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReturn;
use App\Models\Borrow;
use App\Models\Reservation;
use App\Models\User;
use App\Models\WriteOff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function dashboard(){

        return view('dashboard.index', [
            //'izdate' => Borrow::latest()->get(),
            'izdateAll' => Borrow::izdavanja(),
            'izdate' => Borrow::allOrdered()->take(10)->get(),
            'rezervisaneAll' => Reservation::active()->get(),
            'rezervisane' => Reservation::active()->orderBy('id', 'desc')->take(4)->get(),
            'prekoracene' => WriteOff::prekoracene()
        ]);
    }

    public function activity(){
        /*$activity = Borrow::izdavanja()->merge(BookReturn::returned())->sortByDesc('datum');
        dd($activity);*/
//        dd(Reservation::allOrdered()->get());
            return view('dashboard.activity', [
                'izdate' => Borrow::allOrdered()->get(),
                'returned' => BookReturn::returned()
            ]);
    }
}
