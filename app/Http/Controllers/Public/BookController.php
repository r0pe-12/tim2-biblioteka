<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;
use App\Models\Category;
use App\Models\ClosingReason;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends BaseController
{
    //
    public function index(){
        # code
        return view('client.book.index', [
            'books' => Book::all()
        ]);
    }

    public function search(){
        # code
        $s = \request()->post('searchWord');
//        $books = Book::where('title', 'like', "%{$s}%");

//        $booksByCat = Category::where('name', 'like', "%{$s}%")->with('books')->get();

        $books =
            Book::with(['categories', 'genres', 'authors', 'publisher', 'lang', 'bookBind'])
                ->where('title', 'like', "%{$s}%")
                ->orWhereHas('categories', function($q) use ($s) {
                    $q->where('name', 'like', "%{$s}%");
                })
                ->orWhereHas('genres', function($q) use ($s) {
                    $q->where('name', 'like', "%{$s}%");
                })
                ->orWhereHas('authors', function($q) use ($s) {
                    $q->where('name', 'like', "%{$s}%")->orWhere('surname', 'like', "%{$s}%");
                })
                ->orWhereHas('publisher', function($q) use ($s) {
                    $q->where('name', 'like', "%{$s}%");
                })
                ->orWhereHas('lang', function($q) use ($s) {
                    $q->where('name', 'like', "%{$s}%");
                })
                ->orWhereHas('bookBind', function($q) use ($s) {
                    $q->where('name', 'like', "%{$s}%");
                })
        ;


        return response()->json([
            'auth' => auth()->check() && auth()->user()->isStudent(),
            'books' => BookResource::collection($books->get()),
        ]);
    }

    public function reserve(Book $book){
        # code
        if (!($book->ableToBorrow())) {
            return $this->sendError('Not enough samples.', ['errors' => 'Nedovoljno primjeraka'], Response::HTTP_OK);
        }

        $student = Student::findOrFail(\request()->user()->id);
        if (!($student->ableToGet($book->id, true))){
//            $error = 'Nije moguće rezervisati knjigu: učenik već ima rezervisano ' . $student->activeRes()->count() . '. Primjeraka ove knjige ' . $student->activeRes()->where('book_id', $book->id)->count();
//
//            $error = preg_replace('/(.*?).Primjeraka ove knjige 0/m', 'Učenik već ima knjigu kod sebe', $error);

            $error = 'Nije moguće rezervisati knjigu.';

            return $this->sendError('Failed', ['errors' => $error], Response::HTTP_OK);
        }

//        \request()->dd();

        $reservation = new Reservation([
            'student_id' => \request()->user()->id,
            'librarian_id' => 1,
            'closingReason_id' => ClosingReason::open()->id,
            'submttingDate' => today('Europe/Belgrade')->format('Y-m-d'),
        ]);
        $book->reservations()->save($reservation);

        $resStatus = ReservationStatus::reserved();
        $reservation->statuses()->attach($resStatus);

        $book->reservedSamples++;
        $book->save();

        $status = ReservationStatus::reserved();

        return $this->sendResponse('', 'Knjiga je rezervisana.', Response::HTTP_OK);

    }
}
