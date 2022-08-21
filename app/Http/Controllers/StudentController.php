<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\CreateStudentRequest;
use App\Http\Requests\Students\UpdateStudentRequest;
use App\Http\Requests\Students;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use League\CommonMark\Util\SpecReader;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $students = Student::all()->load('logins', 'role');
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateStudentRequest $request)
    {
        //
        $input = $request->validated();
        if ($file = $request->file('photoPath')){
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/users', $name);
            $input['photoPath'] = $name;
        }
        $student = new User($input);
        $role = Role::findOrNew(Student::ROLE);
        if (!$role->id){
            $role->id = Student::ROLE;
            $role->name = 'ucenik';
            $role->save();
        }
        $role->users()->save($student);
        return redirect()->route('students.index')->with('success', 'Ucenik "' . $student->name . ' ' . $student->surname . ': ' . $student->username . '" je uspješno kreiran');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($username)
    {
        //
        $student = Student::where('username', '=', $username)->first();
        if (is_null($student)) {
            abort('404');
        }
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($username)
    {
        //
        $student = User::where('username', '=', $username)->first();
        if (is_null($student)) {
            abort('404');
        }
        return view('student.edit', compact('student'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateStudentRequest $request, User $student)
    {
        //

        $input = $request->validated();
        if (is_null($input['password'])){
            unset($input['password']);
        }
        if ($file = $request->file('photoPath')){
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/users', $name);
            $input['photoPath'] = $name;

            if (file_exists($photoPath = public_path() . $student->photoPath)){
                unlink($photoPath);
            }

        } else{
            unset($input['photoPath']);
        }
        $student->update($input);
        return redirect()->route('students.show', $student->username)->with('success', 'Ucenik "' . $student->name . ' ' . $student->surname . ': ' . $student->username . '" uspješno izmijenjen');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($username)
    {
        //
        $student = User::where('username', '=', $username)->first();
        $this->authorize('delete', $student);

        $photo = $student->photoPath;

        try {
            $student->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', 'Brisanje ucenika "' . $student->name . ' ' . $student->surname . ': ' . $student->username . '" nije moguce');
        }

        if (file_exists($photoPath = public_path() . $photo)){
            unlink($photoPath);
        }
        return redirect()->route('students.index')->with('success', 'Ucenik "' . $student->name . ' ' . $student->surname . ': ' . $student->username . '" je uspješno izbrisan');
    }

    /**
     * Remove the specified resourceS from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bulkDelete()
    {
        //
        $unames = explode(',', request('unames'));
        $students = User::whereIn('username', $unames);

        $photos = [];
//        we will get all photopaths from students
        foreach ($students->get() as $item) {
            $photos[] = $item->photoPath;
        }

//        we will try to delete students
        try {
            $students->delete();
        } catch (\Exception $e){
            return redirect()->back()->with('fail', 'Brisanje ucenika nije moguce');
        }

//        if wee delete them we will delete photos from storage
        foreach ($photos as $photo) {
            if (file_exists($photoPath = public_path() . $photo)){
                unlink($photoPath);
            }
        }
        return redirect()->back()->with('success', 'Ucenici su uspješno izbrisani');
    }


    public function passwordReset(Request $request, User $user){

        $request['password'] = $request->pwResetUcenik;
        $request['password_confirmation'] = $request->pw2ResetUcenik;
        unset($request['pw2ResetUcenik'], $request['pw2ResetUcenik']);

        $request->validate([
            'password' => ['required', 'confirmed']
        ]);

        $user->password = $request->password;
        $user->save();
        return redirect()->back()->with('success', 'Šifra korisnika "' . $user->username . '" je uspješno resetovana');
    }


//    evidencija vezana za ucenika
    public function izdate(Student $student){
        # code
        return view('student.evidencija.izdate', [
            'student' => $student,
            'izdate' => $student->active()
        ]);
    }

    public function vracene(Student $student){
        # code
        return view('student.evidencija.vracene', [
            'student' => $student,
            'returned' => $student->returned()
        ]);
    }

    public function prekoracene(Student $student){
        # code
        return view('student.evidencija.prekoracene', [
            'student' => $student,
            'prekoracene' => $student->prekoracene()
        ]);
    }

    public function aktivne(User $student){
        # code
        return view('student.evidencija.aktivne', [
            'student' => $student
        ]);
    }

    public function arhivirane(User $student){
        # code
        return view('student.evidencija.arhivirane', [
            'student' => $student
        ]);
    }
//    END-evidencija vezana za ucenika
}
