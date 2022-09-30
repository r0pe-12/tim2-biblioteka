<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index(){
        # code
        return view('client.book.index', [
            'books' => Book::all()
        ]);
    }
}
