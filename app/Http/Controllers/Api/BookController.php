<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Book\BookByCategoryCollection;
use App\Http\Resources\Book\BookNoFilterCollection;
use App\Http\Resources\Book\BookResource;
use App\Http\Resources\Category\CategoryTileCollection;
use App\Models\Book;
use App\Models\BookReview;
use App\Models\Carbon;
use App\Models\Category;
use App\Models\ClosingReason;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

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

        return BookNoFilterCollection::collection($books);
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function categories()
    {
        //
        $categories = Category::all();

        return CategoryTileCollection::collection($categories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function byCategory(Category $category)
    {
        //
        $books = $category->books;

        return BookByCategoryCollection::collection($books);
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
            return $this->sendError('Not enough samples.', ['errors' => 'Nedovoljno primjeraka'], \Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY);
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

        return $this->sendResponse('', 'Book successfully reserved.', \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }

    public function review(Book $book){
        # code
        $validator = Validator::make(\request()->all(), [
            'review' => ['required'],
            'star' => ['required', 'integer', 'between:0,5']
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->messages(), \Symfony\Component\HttpFoundation\Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $review = new BookReview([
            'book_id' => $book->id,
            'student_id' => \request()->user()->id,
            'body' => \request('review'),
            'star' => \request('star')
        ]);

        $review->save();

        return $this->sendResponse('', 'Book review successfully created.', \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }
}
