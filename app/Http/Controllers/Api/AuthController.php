<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends BaseController
{
    //
    /**
     * Login api
     *
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(['username', 'password', 'device']), [
            'username' => ['required'],
            'password' => ['required'],
            'device' => ['required']
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            $student = Auth::user();
            $success['token'] = $student->createToken($request->device)->plainTextToken;
            $success['name'] = $student->username;

            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorized.', ['error'=>'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Register api
     *
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => ['required', 'max:255'],
            "surname" => ['required', 'max:255'],
//            "jmbg" => ['required', 'regex:/^[0-9]{13}+$/', 'min:13', 'max:13'],
            "email" => ['required', 'email', 'max:255', 'unique:users'],
            "username" => ['required', 'max:255', 'unique:users', 'alpha_dash'],
            "password" => ['confirmed','min:8' , 'max:255'],
//            "photoPath" => [''],
            "device" => ['required']
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $student = User::create($input);
        $role = Role::student();
        $role->users()->save($student);
        $success['token'] = $student->createToken($request->device)->plainTextToken;
        $success['name'] = $student->username;

        return $this->sendResponse($success, 'User registered successfully.', Response::HTTP_CREATED);
    }
}
