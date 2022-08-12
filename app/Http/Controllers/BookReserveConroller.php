<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Carbon;
use App\Models\ClosingReason;
use App\Models\Reservation;
use App\Models\ReservationStatus;
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
//    prikazi page za rezervisanje knjige


//    rezervisi odredjenu knjigu
    public function reserve(Book $book){
        # code
        \request()->validate([
            'ucenik' => ['required', 'int'],
            'datumRezervisanja' => ['required', 'date'],
        ]);
//        \request()->dd();

        $reservation = new Reservation([
            'student_id' => \request()->ucenik,
            'librarian_id' => auth()->user()->id,
            'closingReason_id' => ClosingReason::open()->id,
            'submttingDate' => Carbon::parse(\request()->datumRezervisanja),
        ]);
        $book->reservations()->save($reservation);

        $status = ReservationStatus::reserved();
        $reservation->statuses()->attach($status);


        return redirect()->route('books.index')->with('success', 'Knjiga je uspješno rezervisana učeniku: ' . Student::find(\request()->ucenik)->name . ' ' . Student::find(\request()->ucenik)->surname);
    }
//    END-rezervisi odredjenu knjigu

//    prikazi sve aktivne rezervacije
    public function active(){
        # code
        return view('izdavanje.aktivne', [
            'reservations' => Reservation::all() // todo fix this later
        ]);
    }
//    prikazi sve aktivne rezervacije
}
