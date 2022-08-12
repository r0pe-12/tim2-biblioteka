<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;

class BookReserveConroller extends Controller
{
    //
//    prikazi page za rezervisanje knjige
    public function reserveForm(Book $book){
        # code
        return view('book.reserve', [
            'book' => $book,
            'students' => Student::all()
        ]);
    }
}
