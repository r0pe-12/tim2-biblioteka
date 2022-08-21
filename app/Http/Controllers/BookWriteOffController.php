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
//  prikazi page za otpisivanje knjige
    public function otpisiForm(Book $book) {
        return view('book.otpisi', [
            'book' => $book
        ]);
    }
//  END-prikazi page za otpisivanje knjige

//  otpisi knjigu
    public function otpisi(Book $book) {
        \request()->validate([
            'toWriteoff' => 'required',
        ]);
        if (!is_array($ids = \request('toWriteoff'))){
            $ids = explode(',', $ids);
        }
        foreach ($ids as $id) {
            $borrow = Borrow::findOrFail($id);

            $newStatus = BookStatus::failed();

            $borrow->statuses()->sync($newStatus);
            $book->borrowedSaples--;
            $book->samples--;
            $book->save();
        }
        return redirect()->back()->with('success', 'Knjiga "'. $book->title .'" je uspješno otpisana');
    }
//  END-otpisi knjigu

//  Prekoracene knjige tab
    public function prekoracene(){
        # code
        return view('izdavanje.prekoracene',[
            'prekoracene' => WriteOff::prekoracene(),
        ]);
    }
//  END-Prekoracene knjige tab

// prekoracene kopije jedne knjige
    public function prekoracene1(Book $book){
        # code
        return view('book.evidencija.prekoracene', [
            'book' => $book,
            'available' => $book->samples - $book->borrowedSaples
        ]);
    }
// END-prekoracene kopije jedne knjige
}
