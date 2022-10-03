<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Policy;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    //
    public function edit()
    {
        # code
        return view('client.student.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(){
        # code
        $student = auth()->user();

        $input = \Validator::validate(request()->all(), [
            "firstname" => ['required', 'max:255'],
            "lastname" => ['required', 'max:255'],
            "username" => ['required', 'max:255', Rule::unique('users')->ignore($student->id), 'alpha_dash'],
            "password" => ['confirmed', 'max:255'],
            "photoPath" => ['']
        ]);


        if (is_null($input['password'])){
            unset($input['password']);
        }
        if ($file = request()->file('photoPath')){
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/users', $name);
            $input['photoPath'] = $name;

            if (file_exists($photoPath = public_path() . $student->photoPath)){
                unlink($photoPath);
            }

        } else{
            unset($input['photoPath']);
        }

        $new = $input;

        $new['name'] = $input['firstname'];
        unset($new['firstname']);
        $new['surname'] = $input['lastname'];
        unset($new['lastname']);

        $student->update($new);
        return redirect()->route('me.edit')->with('success', 'Promjene su uspješno sačuvane');

    }

    public function show(){
        # code
        return 'show';
    }

    public function rezervisane(){
        # code
        $student = Student::findOrFail(auth()->user()->id);
        return view('client.student.rezervisane', [
            'activeRes' => $student->activeRes()->get(),
            'archiveRes' => $student->archiveRes()->get(),
            'res_deadline' => Policy::reservation()
        ]);
    }

    public function izdate(){
        # code
        $student = Student::findOrFail(auth()->user()->id);
        return view('client.student.izdate', [
            'izdate' => $student->active(),
            'returned' => $student->returned(),
            'otpisane' => $student->otpisane(),
            'prekoracene' => $student->prekoracene()
        ]);
    }
}
