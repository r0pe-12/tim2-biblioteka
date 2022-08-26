<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(){
        # code
        $s = \request()->post('searchWord');
        $books = Book::where('title', 'like', "%{$s}%");
        return response()->json([
            'books'=>$books->get()
        ]);
    }
}
