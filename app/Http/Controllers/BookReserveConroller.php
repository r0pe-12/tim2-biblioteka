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
//    prikaži page za rezervisanje knjige
    public function reserveForm(Book $book){
        # code
        return view('book.reserve', [
            'book' => $book,
            'students' => Student::all()
        ]);
    }
//    prikaži page za rezervisanje knjige


//    rezerviši određenu knjigu
    public function reserve(Book $book){
        # code
        \request()->validate([
            'ucenik' => ['required', 'int'],
            'datumRezervisanja' => ['required', 'date'],
        ]);
        if (!($book->ableToBorrow())) {
            return redirect()->route('books.index')->with('fail', 'Nije moguće rezervisati knjigu: nedovoljno primjeraka');
        }
//        \request()->dd();

        $reservation = new Reservation([
            'student_id' => \request()->ucenik,
            'librarian_id' => auth()->user()->id,
            'closingReason_id' => ClosingReason::open()->id,
            'submttingDate' => Carbon::parse(\request()->datumRezervisanja)->format('Y-m-d'),
        ]);
        $book->reservations()->save($reservation);

        $resStatus = ReservationStatus::reserved();
        $reservation->statuses()->attach($resStatus);

        $book->reservedSamples++;
        $book->save();

        $status = ReservationStatus::reserved();

        return redirect()->route('books.index')->with('success', 'Knjiga je uspješno rezervisana učeniku: ' . Student::find(\request()->ucenik)->name . ' ' . Student::find(\request()->ucenik)->surname);
    }
//    END-rezerviši određenu knjigu

//    prikaži sve aktivne rezervacije
    public function active(){
        # code
//        dd(Reservation::active()->get());
        return view('izdavanje.aktivne', [
            'reservations' => Reservation::active()->get(),
            'res_deadline' => Policy::reservation()
        ]);
    }
//    prikaži sve aktivne rezervacije

//    prikaži sve aktivne rezervacije jedne knjige
    public function active1(Book $book){
        # code
        return view('book.evidencija.aktivne', [
            'book' => $book,
            'reservations' => $book->activeRes()->get(),
            'res_deadline' => Policy::reservation()

        ]);
    }
//    prikaži sve aktivne rezervacije jedne knige

//    prikaži sve arhivirane rezervacije
    public function archive(){
        # code
        return view('izdavanje.arhivirane', [
            'reservations' => Reservation::archive()->get(),
            'res_deadline' => Policy::reservation()
        ]);
    }
//    prikaži sve arhivirane rezervacije

//    prikaži sve arhivirane rezervacije jedne knjige
    public function archive1(Book $book){
        # code
        return view('book.evidencija.arhivirane', [
            'book' => $book,
            'reservations' => $book->archiveRes()->get(),
            'res_deadline' => Policy::reservation()
        ]);
    }
//    prikaži sve arhivirane rezervacije jedne knjige

//    otkaži rezervaciju
    public function cancel(Reservation $reservation){
        # code
        $reservation->closingReason_id = ClosingReason::cancelled()->id;
        $reservation->closingDate = today("Europe/Belgrade");
        $reservation->librarian1_id = auth()->user()->id;
        $reservation->save();

        $newResStatus = ReservationStatus::closed();
        $reservation->statuses()->attach($newResStatus);

        $reservation->book->reservedSamples--;
        $reservation->book->save();
        return redirect()->back()->with('success', 'Rezervacija je uspješno otkazana');
    }
//    END-otkaži rezervaciju

//    prikaz jedne rezervacije
    public function show(Book $book, Reservation $reservation){
        # code
        return view('book.evidencija.rezervacija1', [
            'book' => $book,
            'reservation' => $reservation,
            'res_deadline' => Policy::reservation()
        ]);
    }
//    END-prikaz jedne rezervacije

//    izbriši zapis
    public function destroy(Reservation $reservation){
        # code
        if ($reservation->isActive()) {
            return redirect()->back()->with('fail', 'Transakcija aktivna');
        }
//        todo da li ovako ili da stavimo cascade od delete u bazi???
        $reservation->statuses()->sync([]);
        $reservation->delete();
        return redirect()->route('dashboard.index')->with('success', 'Zapis rezervacije knjige "' . $reservation->book->title . '" je uspješno obrisan');
    }
//    END-izbriši zapis
}
