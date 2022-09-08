<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Borrow;
use App\Models\ClosingReason;
use App\Models\Policy;
use App\Models\ReservationStatus;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookBorrowController extends Controller
{
    //
    //    prikazi formu za izdavanje određene knjige
    public function izdajForm(Book $book){
        # code
        $return = Policy::return();
        return view('book.izdaj', [
            'book' => $book,
            'available' => $book->samples - $book->borrowedSamples,
            'students' => Student::all(),
            'return' => $return,
        ]);
    }
//    END-prikazi formu za izdavanje određene knjige

//    izdaj odredjenu knjigu
    public function izdaj(Book $book){
        # code
        \request()->validate([
            'ucenik' => ['required', 'int'],
            'datumIzdavanja' => ['required', 'date'],
            'datumVracanja' => ['required', 'date'],
        ]);

        $student = Student::findOrFail(\request()->ucenik);
        if (!($student->ableToGet())) {
            return redirect()->route('books.index')->with('fail', 'Nije moguće izdati knjigu: učenik već ima ' . $student->active()->count() . ' kod sebe');
        }

        $borrow = new Borrow([
            'active' => 1,
            'librarian_id' => auth()->user()->id,
            'student_id' => \request()->ucenik,
            'borrow_date' => Carbon::parse(\request()->datumIzdavanja),
            'return_date' => Carbon::parse(\request()->datumVracanja),
        ]);
        $book->borrows()->save($borrow);
        $isRes = false;
        if ($book->activeRes()->get()->contains($res = $book->activeRes()->where('student_id', '=', $borrow->student_id)->first())) {
            $res->closingReason_id = ClosingReason::bookBorrowed()->id;
            $res->closingDate = today("Europe/Belgrade");
            $res->librarian1_id = auth()->user()->id;
            $res->save();

            $newResStatus = ReservationStatus::closed();
            $res->statuses()->attach($newResStatus);

            $res->book->reservedSamples--;
            $res->book->save();

            $status = BookStatus::reserved();
            $isRes = true;
        } else {
            if (!($book->ableToBorrow())) {
                return redirect()->route('books.index')->with('fail', 'Nije moguće izdati knjigu: nedovoljno primjeraka');
            }
            $status = BookStatus::borrowed();
        }

        $borrow->statuses()->attach($status);

        $book->borrowedSamples = $book->borrowedSamples + 1;
        $book->save();

        if ($isRes) {
            return redirect()->route('books.index')->with('success', 'Knjiga je uspješno izdata učeniku po rezervaciji: ' . Student::find(\request()->ucenik)->name . ' ' . Student::find(\request()->ucenik)->surname);
        } else {
            return redirect()->route('books.index')->with('success', 'Knjiga je uspješno izdata učeniku: ' . Student::find(\request()->ucenik)->name . ' ' . Student::find(\request()->ucenik)->surname);
        }
    }
//    END-izdaj određenu knjigu


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
            'available' => $book->samples - $book->borrowedSamples
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

//    izbriši zapis
    public function destroy(Borrow $borrow){
        # code
        if ($borrow->isActive()) {
            return redirect()->back()->with('fail', 'Transakcija aktivna');
        }
//        todo da li ovako ili da stavimo cascade od delete u bazi???
        $borrow->statuses()->sync([]);
        $borrow->delete();
        return redirect()->route('dashboard.index')->with('success', 'Zapis izdavanja knjige "' . $borrow->book->title . '" je uspješno obrisan');
    }
//    END-izbriši zapis
}
