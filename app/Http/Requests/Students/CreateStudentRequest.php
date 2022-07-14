<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [    "name" => ['required', 'max:255'],
                    "surname" => ['required', 'max:255'],
                    "JMBG" => ['required', 'regex:/^[0-9]{13}+$/', 'min:13', 'max:13'],
                    "email" => ['required', 'email', 'max:255', 'unique:users'],
                    "username" => ['required', 'max:255', 'unique:users'],
                    "password" => ['confirmed','min:8' , 'max:255'],
                    "photoPath" => [''],

        ];
    }
    protected function prepareForValidation()
    {
        $this->replace([
            "name" => $this->imeUcenik,
            "surname" => $this->prezimeUcenik,
            "JMBG" => $this->jmbgUcenik,
            "email" => $this->emailUcenik,
            "username" => $this->usernameUcenik,
            "password" => $this->pwUcenik,
            "password_confirmation" => $this->pw2Ucenik,
            "photoPath" => $this->photoPath,
        ]);
    }
}

