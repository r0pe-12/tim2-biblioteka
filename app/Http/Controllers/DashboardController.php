<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookReturn;
use App\Models\BookStatus;
use App\Models\Borrow;
use App\Models\Carbon;
use App\Models\Librarian;
use App\Models\Reservation;
use App\Models\Student;
use App\Models\User;
use App\Models\WriteOff;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function dashboard(){

        return view('dashboard.index', [
            //'izdate' => Borrow::latest()->get(),
            'izdateAll' => Borrow::izdavanja(),
            'izdate' => Borrow::allOrdered()->take(10)->get(),
            'rezervisaneAll' => Reservation::active()->get(),
            'rezervisane' => Reservation::orderBy('updated_at', 'desc')->take(4)->get(),
            'prekoracene' => WriteOff::prekoracene()
        ]);
    }

    public function activity(){
//        dd(Reservation::allOrdered()->get());
        $students = Student::all();
        $librarians = Librarian::all();
        $books = Book::all();

        $borrows = Borrow::allOrdered();
        $reservations = Reservation::allOrdered();

        \request()->whenFilled('ucenik', function ($ucenik) use ($borrows, $reservations) {
            $borrows->whereIn('student_id', $ucenik);
            $reservations->whereIn('student_id', $ucenik);
        });
        \request()->whenFilled('bibliotekar', function ($bibliotekar) use ($borrows, $reservations) {
            $borrows->whereIn('librarian_id', $bibliotekar);
            $reservations->whereIn('librarian_id', $bibliotekar);
        });
        \request()->whenFilled('knjiga', function ($knjiga) use ($borrows, $reservations) {
            $borrows->whereIn('book_id', $knjiga);
            $reservations->whereIn('book_id', $knjiga);
        });
        \request()->whenFilled('transakcija', function ($transakcija) use ($borrows) {
            $transakcija = array_map(function ($val) {
                $new = null;
                switch ($val) {
                    case 'izdavanjeRez': $new = BookStatus::RESERVED;break;
                    case 'izdavanje': $new = BookStatus::BORROWED;break;
                    case 'vracanje': $new = BookStatus::RETURNED;break;
                    case 'vracanjePrek': $new = BookStatus::RETURNED1;break;
                    case 'otpis': $new = BookStatus::FAILED;break;
                }
                return $new;
            }, $transakcija);
            $borrows->whereIn('bookStatus_id', $transakcija);
        });
        \request()->whenFilled('od', function ($od) use ($borrows, $reservations) {
            $od = Carbon::parse($od);
            $borrows->where('datum', '>', $od);
            $reservations->where('datum', '>', $od);
        });
        \request()->whenFilled('do', function ($do) use ($borrows, $reservations) {
            $do = Carbon::parse($do)->addDay();
            $borrows->where('datum', '<', $do);
            $reservations->where('datum', '<', $do);
        });


        if(\request()->wantsJson()) {
            return response()->json([
                'borrows' => $borrows->get(),
                'reservations' => $reservations->get(),
            ]);
        }

            return view('dashboard.activity', [
                'borrows' => $borrows->get(),
                'reservations' => $reservations->get(),
                'students' => $students,
                'librarians' => $librarians,
                'books' => $books,
            ]);
    }
}
