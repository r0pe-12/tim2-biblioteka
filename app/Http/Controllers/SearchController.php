<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(){
        # code
        $s = \request()->post('searchWord');
        $books = Book::where('title', 'like', "%{$s}%");

        $students = Student::where('name', 'like', "%{$s}%")
                            ->orWhere('surname', 'like', "%{$s}%")
                            ->orWhere('username', 'like', "%{$s}%")
                            ->orWhere('jmbg', 'like', "%{$s}%")
                            ->orWhere('email', 'like', "%{$s}%");

        return response()->json([
            'books'=>$books->get(),
            'students'=>$students->get()
        ]);
    }
}
