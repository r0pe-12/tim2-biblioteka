<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Book\BookByCategoryArrayCollection;
use App\Http\Resources\Book\BookByCategoryCollection;
use App\Http\Resources\Book\BookResource;
use App\Http\Resources\Category\CategoriesWithBooksCollection;
use App\Http\Resources\Category\CategoryTileCollection;
use App\Models\Book;
use App\Models\BookReview;
use App\Models\Category;
use App\Models\ClosingReason;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use App\Models\Student;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BookController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        //
        $books = Book::all();
        return BookResource::collection($books);
    }


    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return BookResource
     */
    public function show(Book $book)
    {
        //
        return new BookResource($book);
    }

    public function reserve(Book $book){
        # code
        if (!($book->ableToBorrow())) {
            return $this->sendError('Not enough samples.', ['errors' => 'Nedovoljno primjeraka'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $student = Student::findOrFail(\request()->user()->id);
        if (!($student->ableToGet($book->id, true))){
            $error = 'Nije moguće rezervisati knjigu: učenik već ima rezervisano ' . $student->activeRes()->count() . '. Primjeraka ove knjige ' . $student->activeRes()->where('book_id', $book->id)->count();

            $error = preg_replace('/(.*?).Primjeraka ove knjige 0/m', 'Učenik već ima knjigu kod sebe', $error);

            return $this->sendError('Failed', ['errors' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
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

        return $this->sendResponse('', 'Book successfully reserved.', Response::HTTP_OK);
    }

}
