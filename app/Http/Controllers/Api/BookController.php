<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Book\CreateRequest;
use App\Http\Resources\Book\BookResource;
use App\Http\Resources\Book\CreateBookResource;
use App\Http\Resources\Book\EditBookResource;
use App\Http\Resources\Book\Evidencija\BookBorrowCollection;
use App\Http\Resources\Book\Evidencija\BookReservationCollection;
use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Borrow;
use App\Models\ClosingReason;
use App\Models\Galery;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Arr;
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
     * @return CreateBookResource
     */
    public function create()
    {
        # code
        return new CreateBookResource([]);
    }

    /**
     * Store resource to db
     *
     * @param CreateRequest $request
     * @return JsonResponse
     */
    public function store(CreateRequest $request)
    {
        # code
        $input = $request->validated();

//        creating new record in books table
        $book = Book::create(Arr::except($input, ['categories', 'genres', 'authors', 'pdf', 'deletePdfs']));

//        if ($request->hasFile('pictures')) {
//            foreach ($input['pictures'] as $file) {
//                $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
//                $file->storeAs('/images/books', $name);
//                $book->photos()->create([
//                    'path' => $name,
//                    'cover' => $file->getClientOriginalName() == $input['cover']
//                ]);
//            }
//        }
//
//        if ($request->hasFile('pdf')) {
//            $name = str_replace(' ', '_', $book->title . '.pdf');
//            $input['pdf']->storeAs('/pdf', $name);
//            $book->pdf = $name;
//            $book->save();
//        }

//        attaching book to multiple authors
        $book->authors()->sync($input['authors']);

//        attaching book to multiple categories
        $book->categories()->sync($input['categories']);

//        attaching book to multiple genres
        $book->genres()->sync($input['genres']);

        return $this->sendResponse(new BookResource($book), 'Book successfully created.', Response::HTTP_OK);
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

    /**
     * Destroy resource from storage
     *
     * @param Book $book
     * @return JsonResponse
     */
    public function destroy(Book $book)
    {
        # code
        $photos = [];
        $photos = $book->photos;

        try {
            $book->delete();
        } catch (\Exception $e) {
            $error = 'Brisanje knjige "' . $book->title . '" nije moguće';
            return $this->sendError('Failed', ['errors' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        foreach ($photos as $photo) {
            if (file_exists($photoPath = public_path() . $photo->path)) {
                unlink($photoPath);
            }
        }
        return $this->sendResponse('', 'Book successfully removed.', Response::HTTP_OK);
    }

    public function bulkDelete(Request $request)
    {
        # code
        $request->validate([
            'ids' => ['required', 'array']
        ]);
        $ids = $request->ids;
        $books = Book::whereIn('id', $ids);

        $galery = [];
        foreach ($books->get() as $book) {
            $galery[] = $book->photos;
        }


        try {
            $books->delete();
        } catch (\Exception $e) {
            $error = 'Brisanje knjiga nije moguće';
            return $this->sendError('Failed', ['errors' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        foreach ($galery as $photos) {
            foreach ($photos as $photo) {
                if (file_exists($photoPath = public_path() . $photo->path)) {
                    unlink($photoPath);
                }
            }
        }
        return $this->sendResponse('', 'Books successfully removed.', Response::HTTP_OK);

    }



//    BOOK RESERVATIONS AND BORROWS

    /**
     * @param Book $book
     * @param Request $request
     * @return JsonResponse
     */
    public function reserve(Book $book, Request $request)
    {
        # code

        $request->validate([
            'student_id' => ['required'],
            'datumRezervisanja' => ['date'],
        ]);

        $date = $request->datumRezervisanja ? Carbon::parse($request->datumRezervisanja) : today('Europe/Belgrade');

        if (!($book->ableToBorrow())) {
            return $this->sendError('Not enough samples.', ['errors' => 'Nedovoljno primjeraka'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $student = Student::findOrFail($request->student_id);

        if (!($student->ableToGet($book->id, true))) {
            $error = 'Nije moguće rezervisati knjigu: učenik već ima rezervisano ' . $student->activeRes()->count() . '. Primjeraka ove knjige ' . $student->activeRes()->where('book_id', $book->id)->count();

            $error = preg_replace('/(.*?).Primjeraka ove knjige 0/m', 'Učenik već ima knjigu kod sebe', $error);

            return $this->sendError('Failed', ['errors' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

//        \request()->dd();

        $reservation = new Reservation([
            'student_id' => $request->student_id,
            'librarian_id' => auth()->user()->id,
            'closingReason_id' => ClosingReason::open()->id,
            'submttingDate' => $date->format('Y-m-d'),
        ]);
        $book->reservations()->save($reservation);

        $resStatus = ReservationStatus::reserved();
        $reservation->statuses()->attach($resStatus);

        $book->reservedSamples++;
        $book->save();

        $status = ReservationStatus::reserved();

        return $this->sendResponse('', 'Book successfully reserved.', Response::HTTP_OK);
    }

    /**
     * Return all reservations for single book or every book
     *
     * @param Request $request
     * @return BookReservationCollection
     */
    public function reservations(Request $request)
    {
        # code
        $request->validate([
            'book_id' => ['int']
        ]);

        $book = null;
        if ($id = $request->book_id) {
            $book = Book::findOrFail($id);
        }
        return new BookReservationCollection(['book' => $book]);
    }

    /**
     * Cancel single reservation
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function cancelReservation(Request $request)
    {
        # code
        $request->validate([
            'reservation_id' => ['required', 'int']
        ]);

        $reservation = Reservation::findOrFail($request->reservation_id);

        $reservation->closingReason_id = ClosingReason::cancelled()->id;
        $reservation->closingDate = today("Europe/Belgrade");
        $reservation->librarian1_id = auth()->user()->id;
        $reservation->save();

        $newResStatus = ReservationStatus::closed();
        $reservation->statuses()->attach($newResStatus);

        $reservation->book->reservedSamples--;
        $reservation->book->save();
        return $this->sendResponse('', 'Rezervacija je uspješno otkazana', Response::HTTP_OK);
    }

    /**
     * Delete zapis
     *
     * @param Reservation $reservation
     * @return JsonResponse
     */
    public function deleteReservation(Reservation $reservation)
    {
        # code
        if ($reservation->isActive()) {
            $error = 'Transakcija aktivna';
            return $this->sendError('failed', ['errors' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $reservation->statuses()->sync([]);
        $reservation->delete();
        $msg = 'Zapis rezervacije knjige "' . $reservation->book->title . '" je uspješno obrisan';
        return $this->sendResponse('', $msg, Response::HTTP_OK);
    }

    /**
     * Izdaj knjigu
     *
     * @param Book $book
     * @param Request $request
     * @return JsonResponse
     */
    public function izdaj(Book $book, Request $request)
    {
        # code
        $request->validate([
            'student_id' => ['required', 'int'],
            'datumIzdavanja' => ['required', 'date'],
            'datumVracanja' => ['required', 'date'],
        ]);

        $student = Student::findOrFail($request->student_id);
        if (!($student->ableToGet($book->id))) {
            $error = 'Nije moguće izdati knjigu: učenik već ima ' . $student->active()->count() . ' kod sebe. Primjeraka ove knjige ' . $student->active()->where('book_id', $book->id)->count();

            return $this->sendError('Failed', ['errors' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $borrow = new Borrow([
            'active' => 1,
            'librarian_id' => auth()->user()->id,
            'student_id' => $request->student_id,
            'borrow_date' => Carbon::parse($request->datumIzdavanja),
            'return_date' => Carbon::parse($request->datumVracanja),
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
                $error = "Nije moguće izdati knjigu: nedovoljno primjeraka";
                return $this->sendError('Failed', ['errors' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $status = BookStatus::borrowed();
        }

        $borrow->statuses()->attach($status);

        $book->borrowedSamples = $book->borrowedSamples + 1;
        $book->save();

        if ($isRes) {
            $msg = 'Knjiga je uspješno izdata učeniku po rezervaciji: ' . Student::find($request->student_id)->name . ' ' . Student::find($request->student_id)->surname;
        } else {
            $msg = 'Knjiga je uspješno izdata učeniku: ' . Student::find($request->student_id)->name . ' ' . Student::find($request->student_id)->surname;
        }

        return $this->sendResponse('', $msg, Response::HTTP_OK);
    }

    /**
     * Return a book
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function vrati(Request $request)
    {
        # code
        $request->validate([
            'toReturn' => 'required',
        ]);
        if (!is_array($ids = $request->toReturn)) {
            $ids = explode(',', $ids);
        }
        foreach ($ids as $id) {
            if (!(Borrow::find($id)->isActive())) {
                $error = 'Transakcija neaktivna';
                return $this->sendError('failed', ['errors' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
        foreach ($ids as $id) {
            $borrow = Borrow::findOrFail($id);
            $book = $borrow->book()->first();

            if ($book->failed()->contains($borrow)) {
                $newStatus = BookStatus::returned1();
            } else {
                $newStatus = BookStatus::returned();
            }

            $borrow->librarian1_id = auth()->user()->id;
            $borrow->active = 0;
            $borrow->mail = 0;
            $borrow->save();

            $borrow->statuses()->attach($newStatus);
            $book->borrowedSamples--;
            $book->save();
        }
        $msg = 'Knjiga: ' . $book->title . '  je uspješno vraćena';
        return $this->sendResponse('', $msg, Response::HTTP_OK);
    }

    /**
     * Otpisi book
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function otpisi(Request $request)
    {
        # code
        $request->validate([
            'toWriteoff' => 'required',
        ]);
        if (!is_array($ids = $request->toWriteoff)) {
            $ids = explode(',', $ids);
        }
        foreach ($ids as $id) {
            if (!(Borrow::find($id)->isActive())) {
                $error = 'Transakcija neaktivna';
                return $this->sendError('failed', ['errors' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }
        foreach ($ids as $id) {
            $borrow = Borrow::findOrFail($id);
            $book = $borrow->book()->first();

            $borrow->librarian1_id = auth()->user()->id;
            $borrow->active = 0;
            $borrow->mail = 0;
            $borrow->save();

            $newStatus = BookStatus::failed();

            $borrow->statuses()->attach($newStatus);
            $book->borrowedSamples--;
            $book->samples--;
            $book->save();
        }
        $msg = 'Knjiga: ' . $book->title . '  je uspješno otpisana';
        return $this->sendResponse('', $msg, Response::HTTP_OK);
    }

    /**
     * Delete zapis
     *
     * @param Borrow $borrow
     * @return JsonResponse
     */
    public function deleteBorrow(Borrow $borrow)
    {
        # code
        if ($borrow->isActive()) {
            $error = 'Transakcija aktivna';
            return $this->sendError('failed', ['errors' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $borrow->statuses()->sync([]);
        $borrow->delete();
        $msg = 'Zapis izdavanja knjige "' . $borrow->book->title . '" je uspješno obrisan';
        return $this->sendResponse('', $msg, Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return BookBorrowCollection
     */
    public function borrows(Request $request)
    {
        # code
        $request->validate([
            'book_id' => ['int']
        ]);

        $book = null;
        if ($id = $request->book_id) {
            $book = Book::findOrFail($id);
        }

        return new BookBorrowCollection(['book' => $book]);
    }
}
