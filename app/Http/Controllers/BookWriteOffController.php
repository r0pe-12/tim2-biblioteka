<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Borrow;
use App\Models\Student;
use App\Models\WriteOff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookWriteOffController extends Controller
{
    //
//  prikaži page za otpisivanje knjige
    public function otpisiForm(Book $book) {
        return view('book.otpisi', [
            'book' => $book
        ]);
    }
//  END-prikaži page za otpisivanje knjige

//  otpiši knjigu
    public function otpisi(Book $book) {
        \request()->validate([
            'toWriteoff' => 'required',
        ]);
        if (!is_array($ids = \request('toWriteoff'))){
            $ids = explode(',', $ids);
        }
        foreach ($ids as $id) {
            if (!(Borrow::find($id)->isActive())) {
                return redirect()->back()->with('fail', 'Transakcija neaktivna');
            }
        }
        foreach ($ids as $id) {
            $borrow = Borrow::findOrFail($id);

            $borrow->librarian1_id = auth()->user()->id;
            $borrow->active = 0;
            $borrow->mail = 0;
            $borrow->save();

            $newStatus = BookStatus::failed();

            $borrow->statuses()->attach($newStatus);
            $book->borrowedSamples--;
            $book->samples--;
            $book->save();
        }
        return redirect()->back()->with('success', 'Knjiga "'. $book->title .'" je uspješno otpisana');
    }
//  END-otpiši knjigu

//  Prekoračene knjige tab
    public function prekoracene(){
        # code
        return view('izdavanje.prekoracene',[
            'prekoracene' => WriteOff::prekoracene(),
        ]);
    }
//  END-Prekoračene knjige tab

// prekoračene kopije jedne knjige
    public function prekoracene1(Book $book){
        # code
        return view('book.evidencija.prekoracene', [
            'book' => $book,
            'available' => $book->samples - $book->borrowedSamples
        ]);
    }
// END-prekoračene kopije jedne knjige

// otpisane knjige tab
    public function otpisane(){
        # code
        return view('izdavanje.otpisane', [
            'otpisane' => WriteOff::otpisane(),
        ]);
    }
// END-otpisane knjige tab

// otpisane kopije jedne knjige
    public function otpisane1(Book $book){
        # code
        return view('book.evidencija.otpisane', [
            'book' => $book,
        ]);
    }
// END-otpisane kopije jedne knjige
}
