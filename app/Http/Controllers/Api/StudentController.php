<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\StudentUpdateRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends BaseController
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
     * Update the specified resource in storage.
     *
     * @param StudentUpdateRequest $request
     * @return JsonResponse
     */
    public function update(StudentUpdateRequest $request)
    {
        //
        if (isset($request->validator) && $request->validator->fails()) {
            return $this->sendError('Validation Error.', $request->validator->messages(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $student = $request->user();

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

        $success = new UserResource($student);

        return $this->sendResponse($success, 'User updated successfully.', Response::HTTP_OK);
    }
}
