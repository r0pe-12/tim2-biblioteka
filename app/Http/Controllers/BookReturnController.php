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
//    prikaži page za vraćanje knjige
    public function vratiForm(Book $book){
        # code
        return view('book.vrati', [
            'book' => $book
        ]);
    }
//    END-prikaži page za vraćanje knjige

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
            if (!(Borrow::find($id)->isActive())) {
                return redirect()->back()->with('fail', 'Transakcija neaktivna');
            }
        }
        foreach ($ids as $id) {
            $borrow = Borrow::findOrFail($id);

            if ($book->failed()->contains($borrow)){
                $newStatus = BookStatus::returned1();
            } else {
                $newStatus = BookStatus::returned();
            }

            $borrow->librarian1_id = auth()->user()->id;
            $borrow->active = 0;
            $borrow->mail = 0;
            $borrow->save();

            $borrow->statuses()->attach($newStatus);
            $book->borrowedSamples--;
            $book->save();
        }
        return redirect()->back()->with('success', 'Knjiga: ' . $book->title . '  je uspješno vraćena');

    }
//    END-vrati knjigu

//    vraćene tab
    public function vracene(){
        # code
        return view('izdavanje.vracene', [
            'returned' => BookReturn::returned()
        ]);
    }
//    END-vraćene tab

//    vraćene kopije jedne knjige
    public function vracene1(Book $book){
        # code
        return view('book.evidencija.vracene', [
            'book' => $book,
            'available' => $book->samples - $book->borrowedSamples
        ]);
    }
//    vraćene kopije jedne knjige
}
