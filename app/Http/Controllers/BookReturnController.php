<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReturn;
use App\Models\BookStatus;
use App\Models\Borrow;
use App\Models\Student;
use Illuminate\Http\Request;

class BookReturnController extends Controller
{
    //
//    prikazi page za vracanje knjige
    public function vratiForm(Book $book){
        # code
        return view('book.vrati', [
            'book' => $book
        ]);
    }
//    END-prikazi page za vracanje knjige

//    vrati knjigu
    public function vrati(Book $book){
        # code
        \request()->validate([
            'toReturn' => 'required',
        ]);
        if (!is_array($ids = \request('toReturn'))){
            $ids = explode(',', $ids);
        }
        foreach ($ids as $id) {
            $borrow = Borrow::findOrFail($id);
            $borrow->active = 0;
            $borrow->save();

            if ($book->failed()->contains($borrow)){
                $newStatus = BookStatus::returned1();
            } else {
                $newStatus = BookStatus::returned();
            }

            $borrow->statuses()->attach($newStatus);
            $book->borrowedSaples--;
            $book->save();
        }
        return redirect()->back()->with('success', 'Knjiga: ' . $book->title . '  je uspješno vraćena');

    }
//    END-vrati knjigu

//    vracene tab
    public function vracene(){
        # code
        return view('izdavanje.vracene', [
            'returned' => BookReturn::returned()
        ]);
    }
//    END-vracene tab

//    vracene kopije jedne knjige
    public function vracene1(Book $book){
        # code
        return view('book.evidencija.vracene', [
            'book' => $book,
            'available' => $book->samples - $book->borrowedSaples
        ]);
    }
//    vracene kopije jedne knjige
}
