<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function edit()
    {
        # code
        return view('client.student.edit');
    }

    public function show(){
        # code
        return 'show';
    }
}
