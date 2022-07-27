<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        return 'knjiga je otpisana';
    }
//  END-otpisi knjigu

//  Prekoracene knjige tab
    public function prekoracene(){
        # code
        return view('izdavanje.prekoracene');
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
