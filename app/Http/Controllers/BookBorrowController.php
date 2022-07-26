<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookStatus;
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
        $return = Policy::findOrNew(Policy::RETURN);
        if (!$return->id){
            $return->id = Policy::RETURN;
            $return->name = Policy::RETURN_NAME;
            $return->value = 0;
            $return->save();
        }
        return view('book.izdaj', [
            'book' => $book,
            'available' => $book->samples - $book->borrowedSaples,
            'students' => Student::all(),
            'return' => $return,
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

        $status = BookStatus::borrowed();
        $borrow->statuses()->attach($status);

        $book->borrowedSaples = $book->borrowedSaples + 1;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Knjiga je uspješno izdata učeniku: ' . Student::find(\request()->ucenik)->name . ' ' . Student::find(\request()->ucenik)->surname);
    }
//    END-izdaj odredjenu knjigu


//    Izdavanje knjiga tab
    public function izdate(){
        # code
        return view('izdavanje.izdate',[
            'izdate' => Borrow::izdavanja(),
        ]);
    }
//    END-Izdavanje knjiga tab

//    izdate kopije jedne knjige
    public function izdate1(Book $book){
        # code
        return view('book.evidencija.izdate', [
            'book' => $book,
            'available' => $book->samples - $book->borrowedSaples
        ]);
    }
//    izdate kopije jedne knjige

//    prikaz jedne transakcije
    public function show(Book $book, Borrow $borrow){
        # code
        return view('book.evidencija.izdate1', [
            'book' => $book,
            'borrow' => $borrow
        ]);
    }
//    END-prikaz jedne transakcije
}