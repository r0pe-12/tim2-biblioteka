<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Carbon;
use App\Models\ClosingReason;
use App\Models\Policy;
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

        $reservationervation = new Reservation([
            'student_id' => \request()->ucenik,
            'librarian_id' => auth()->user()->id,
            'status_id' => ReservationStatus::reserved()->id,
            'closingReason_id' => ClosingReason::open()->id,
            'submttingDate' => Carbon::parse(\request()->datumRezervisanja)->format('Y-m-d'),
        ]);
        $book->reservations()->save($reservationervation);
        $book->reservedSamples++;
        $book->save();

        $status = ReservationStatus::reserved();

        return redirect()->route('books.index')->with('success', 'Knjiga je uspješno rezervisana učeniku: ' . Student::find(\request()->ucenik)->name . ' ' . Student::find(\request()->ucenik)->surname);
    }
//    END-rezervisi odredjenu knjigu

//    prikazi sve aktivne rezervacije
    public function active(){
        # code
        return view('izdavanje.aktivne', [
            'reservations' => Reservation::active(),
            'res_deadline' => Policy::reservation()
        ]);
    }
//    prikazi sve aktivne rezervacije

//    prikazi sve aktivne rezervacije jedne knjige
    public function active1(Book $book){
        # code
        return view('book.evidencija.aktivne', [
            'book' => $book,
            'reservations' => $book->activeRes(),
            'res_deadline' => Policy::reservation()

        ]);
    }
//    prikazi sve aktivne rezervacije jedne knige

//    prikazi sve arhivirane rezervacije
    public function archive(){
        # code
        return view('izdavanje.arhivirane', [
            'reservations' => Reservation::archive(),
            'res_deadline' => Policy::reservation()
        ]);
    }
//    prikazi sve arhivirane rezervacije

//    prikazi sve arhivirane rezervacije jedne knjige
    public function archive1(Book $book){
        # code
        return view('book.evidencija.arhivirane', [
            'book' => $book,
            'reservations' => $book->archiveRes(),
            'res_deadline' => Policy::reservation()
        ]);
    }
//    prikazi sve arhivirane rezervacije jedne knjige

//    otkazi rezervaciju
    public function cancel(Reservation $reservation){
        # code
        $reservation->closingReason_id = ClosingReason::cancelled()->id;
        $reservation->status_id = ReservationStatus::closed()->id;
        $reservation->closingDate = today("Europe/Belgrade");
        $reservation->save();
        $reservation->book->reservedSamples--;
        $reservation->book->save();
        return redirect()->back()->with('success', 'Rezervacija je uspjesno otkazana');
    }
//    END-otkazi rezervaciju
}
