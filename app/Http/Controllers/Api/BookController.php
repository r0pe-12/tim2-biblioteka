<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Book\CreateRequest;
use App\Http\Resources\Book\BookByCategoryArrayCollection;
use App\Http\Resources\Book\BookByCategoryCollection;
use App\Http\Resources\Book\BookResource;
use App\Http\Resources\Book\EditBookCollection;
use App\Http\Resources\Book\EditBookResource;
use App\Http\Resources\Category\CategoriesWithBooksCollection;
use App\Http\Resources\Category\CategoryTileCollection;
use App\Models\Book;
use App\Models\BookReview;
use App\Models\Category;
use App\Models\ClosingReason;
use App\Models\Galery;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Arr;
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

    /**
     * Display the page for editing the spec resource
     *
     * @param Book $book
     * @return EditBookResource
     */
    public function edit(Book $book)
    {
        # code
        return new EditBookResource($book);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param CreateRequest $request
     * @param Book $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CreateRequest $request, Book $book)
    {
        # code
        $input = $request->validated();


//        if (!($present = $input['present'])){
//            $present = [];
//        }
//
//        if  (count($photos = $book->photos) > 0){
////            we are making array of ids which book has
//            foreach ($photos as $photo) {
//                $current[] = $photo->id;
//            }
//
//            $diff = array_diff($current, $present);
////            for every id that is deleted we are going to remove it from db and delete photo which is related to it
//            foreach ($diff as $id) {
//                $photo = Galery::find($id);
//
//                if (file_exists($photoPath = public_path() . $photo->path)){
//                    unlink($photoPath);
//                }
//
//                $photo->delete();
//            }
//        }

        $book->photos()->update([
            'cover' => 0
        ]);

//        if ($request->hasFile('pictures')){
//            foreach ($input['pictures'] as $file){
//                $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
//                $file->storeAs('/images/books', $name);
//                $book->photos()->create([
//                    'path' => $name,
//                    'cover' => $file->getClientOriginalName() == $input['cover']
//                ]);
//            }
//        }


        if (!($input['deletePdfs'] == 1)) {
            if ($request->hasFile('pdf')) {
                if ((!is_null($book->pdf)) && file_exists($pdfPath = public_path() . $book->pdf)) {
                    unlink($pdfPath);
                }

                $name = str_replace(' ', '_', $book->title . '.pdf');
                $input['pdf']->storeAs('/pdf', $name);
                $book->pdf = $name;
                $book->save();
            }
        } else {
            if ((!is_null($book->pdf)) && file_exists($pdfPath = public_path() . $book->pdf)) {
                unlink($pdfPath);
            }

            $book->pdf = null;
            $book->save();
        }

        if (is_numeric($input['cover'])) {
            Galery::find($input['cover'])->update([
                'cover' => 1
            ]);
        }
//        creating new record in books table
        $book->update(Arr::except($input, ['categories', 'genres', 'authors', 'pictures', 'cover', 'present', 'pdf', 'deletePdfs']));

//        attaching book to multiple authors
        $book->authors()->sync($input['authors']);

//        attaching book to multiple categories
        $book->categories()->sync($input['categories']);

//        attaching book to multiple genres
        $book->genres()->sync($input['genres']);

        return $this->sendResponse(new BookResource($book), 'Book successfully updated.', Response::HTTP_OK);
    }

    public function reserve(Book $book)
    {
        # code
        if (!($book->ableToBorrow())) {
            return $this->sendError('Not enough samples.', ['errors' => 'Nedovoljno primjeraka'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $student = Student::findOrFail(\request()->user()->id);
        if (!($student->ableToGet($book->id, true))) {
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
