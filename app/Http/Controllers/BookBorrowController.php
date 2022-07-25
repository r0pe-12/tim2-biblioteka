<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Policy;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookBorrowController extends Controller
{
    //
    //    prikazi formu za izdavanje odredjene knjige
    public function izdajForm(Book $book){
        # code
        return view('book.izdaj', [
            'book' => $book,
            'available' => $book->samples - $book->borrowedSaples,
            'students' => Student::all(),
            'return' => Policy::where('name', '=', 'return_deadline')->first()->value,
        ]);
    }
//    END-prikazi formu za izdavanje odredjene knjige

//    izdaj odredjenu knjigu
    public function izdaj(Book $book){
        # code
        \request()->validate([
            'ucenik' => ['required', 'int'],
            'datumIzdavanja' => ['required', 'date'],
            'datumVracanja' => ['required', 'date'],
        ]);

        $borrow = new Borrow([
            'librarian_id' => auth()->user()->id,
            'student_id' => \request()->ucenik,
            'borrow_date' => Carbon::parse(\request()->datumIzdavanja),
            'return_date' => Carbon::parse(\request()->datumVracanja),
        ]);
        $book->borrows()->save($borrow);
        $book->borrowedSaples = $book->borrowedSaples + 1;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Knjiga je uspješno izdata učeniku: ' . Student::find(\request()->ucenik)->name . ' ' . Student::find(\request()->ucenik)->surname);
    }
//    END-izdaj odredjenu knjigu


//    Izdavanje knjiga tab
    public function izdate(){
        # code
        return view('izdavanje.izdate',[
            'izdate' => Borrow::all(),
        ]);
    }
//    END-Izdavanje knjiga tab
}
