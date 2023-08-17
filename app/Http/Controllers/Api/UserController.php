<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Student\StudentCreateRequest;
use App\Http\Requests\Api\Student\StudentUpdateRequest;
use App\Http\Resources\User\UserAllBorrowsResource;
use App\Http\Resources\User\UserAllReservationsResource;
use App\Http\Resources\User\UserResource;
use App\Models\Librarian;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends BaseController
{
    /**
     * Display a listing of my profile.
     *
     * @return UserResource
     */
    public function me()
    {
        //
        return new UserResource(request()->user());
    }

    /**
     * Display a listing of my izdavanja.
     *
     * @return UserAllBorrowsResource
     */
    public function izdavanjaMe()
    {
        //
        $user = Student::findOrFail(request()->user()->id);

        return new UserAllBorrowsResource($user);
    }

    /**
     * Display a listing of my rezervacije.
     *
     * @return UserAllReservationsResource
     */
    public function rezervacijeMe()
    {
        //
        $user = Student::findOrFail(request()->user()->id);

        return new UserAllReservationsResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentUpdateRequest $request
     * @return JsonResponse
     */
    public function updateMe(StudentUpdateRequest $request)
    {
        //
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->sendError('Validation Error.', $request->validator->messages(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $student = $request->user();

        $input = $request->validated();
        if (is_null($input['password'])) {
            unset($input['password']);
        }
        if ($file = $request->file('photoPath')) {
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/users', $name);
            $input['photoPath'] = $name;

            if (file_exists($photoPath = public_path() . $student->photoPath)) {
                unlink($photoPath);
            }

        } else {
            unset($input['photoPath']);
        }
        $student->update($input);

        $success = new UserResource($student);

        return $this->sendResponse($success, 'User updated successfully.', Response::HTTP_OK);
    }

    /**
     * List all users (based on role id)
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        //
        $request->validate([
            'role_id' => ['int']
        ]);

        $users = match ($request->role_id) {
            Librarian::ROLE => Librarian::all(),
            Student::ROLE => Student::all(),
            default => User::all(),
        };

        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        //
        return new UserResource($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(StudentCreateRequest $request)
    {
        //
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->sendError('Validation Error.', $request->validator->messages(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $input = $request->validated();
        if ($file = $request->file('photoPath')) {
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/users', $name);
            $input['photoPath'] = $name;
        }
        $student = new User(\Arr::except($input, 'role_id'));

        $role = Role::findOrFail($input['role_id']);
        $role->users()->save($student);

        return $this->sendResponse(new UserResource($student), 'User successfully created.', Response::HTTP_OK);
    }

    /**
     * @param Student $student
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Student $student, StudentUpdateRequest $request)
    {
        $input = $request->validated();
        if (is_null($input['password'])) {
            unset($input['password']);
        }
        if ($file = $request->file('photoPath')) {
            $name = now('Europe/Belgrade')->format('Y_m_d\_H_i_s') . '_' . $file->getClientOriginalName();
            $file->storeAs('/images/users', $name);
            $input['photoPath'] = $name;

            if (file_exists($photoPath = public_path() . $student->photoPath)) {
                unlink($photoPath);
            }

        } else {
            unset($input['photoPath']);
        }
        $student->update($input);

        $success = new UserResource($student);

        return $this->sendResponse($success, 'User updated successfully.', Response::HTTP_OK);
    }

    public function destroy(User $user)
    {
        # code
        try {
            $user->delete();
        } catch (\Exception $e) {
            $error = 'Brisanje ucenika nije moguće';
            return $this->sendError('Failed', ['errors' => $error], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        return $this->sendResponse('', 'User successfully removed.', Response::HTTP_OK);
    }
}
