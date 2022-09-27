<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Librarian;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(){
        # code
        $s = \request()->post('searchWord');
        $books = Book::where('title', 'like', "%{$s}%");

        $authors = Author::where('name', 'like', "%{$s}%")
                            ->orWhere('surname', 'like', "%{$s}%");

        $students = User::where('role_id', '=', Student::ROLE)
                            ->where(function ($q) use ($s) {
                                $q->where('name', 'like', "%{$s}%")
                                    ->orWhere('surname', 'like', "%{$s}%")
                                    ->orWhere('username', 'like', "%{$s}%")
                                    ->orWhere('jmbg', 'like', "%{$s}%")
                                    ->orWhere('email', 'like', "%{$s}%");
                            });

        $librarians = User::where('role_id', '=', Librarian::ROLE)
                            ->where(function ($q) use ($s) {
                                $q->where('name', 'like', "%{$s}%")
                                    ->orWhere('surname', 'like', "%{$s}%")
                                    ->orWhere('username', 'like', "%{$s}%")
                                    ->orWhere('jmbg', 'like', "%{$s}%")
                                    ->orWhere('email', 'like', "%{$s}%");
                            });

        return response()->json([
            'books' => $books->get(),
            'students' => $students->get(),
            'librarians' => $librarians->get(),
            'authors' => $authors->get(),
        ]);
    }
}
