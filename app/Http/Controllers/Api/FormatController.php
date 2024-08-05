<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Book\CreateRequest;
use App\Http\Resources\Book\BookResource;
use App\Http\Resources\Book\CreateBookResource;
use App\Http\Resources\Book\EditBookResource;
use App\Http\Resources\Book\Evidencija\BookBorrowCollection;
use App\Http\Resources\Book\Evidencija\BookReservationCollection;
use App\Models\Book;
use App\Models\BookBind;
use App\Models\BookStatus;
use App\Models\Borrow;
use App\Models\ClosingReason;
use App\Models\Format;
use App\Models\Galery;
use App\Models\Language;
use App\Models\Reservation;
use App\Models\ReservationStatus;
use App\Models\Script;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class BookController extends BaseController
{
    public function formats(){
        $result = Format::all();
        return response()->json([
            'data' => $result
        ], Response::HTTP_OK);
    }
    public function scripts(){
        $result = Script::all();
        return response()->json([
            'data' => $result
        ], Response::HTTP_OK);

    }
    public function bookbinds(){
        $result = BookBind::all();
        return response()->json([
            'data' => $result
        ], Response::HTTP_OK);

    }
    public function languages(){
        $result = Language::all();
        return response()->json([
            'data' => $result
        ], Response::HTTP_OK);

    }
}
