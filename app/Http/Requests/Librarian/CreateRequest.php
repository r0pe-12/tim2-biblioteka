<?php

namespace App\Http\Requests\Librarian;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        return [
            //
            "name" => ['required', 'max:255'],
            "surname" => ['required', 'max:255'],
            "jmbg" => ['required', 'regex:/^[0-9]{13}+$/', 'min:13', 'max:13'],
            "email" => ['required', 'email', 'max:255', 'unique:users'],
            "username" => ['required', 'max:255', 'unique:users', 'alpha_dash'],
            "password" => ['confirmed','min:8' , 'max:255'],
            "photoPath" => [''],
//            'photoPath' => ['mimes:jpg,bmp,png,jpeg,webp']
        ];
    }
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->replace([
            "name" => $this->firstname,
            "surname" => $this->lastname,
            "jmbg" => $this->jmbgBibliotekar,
            "email" => $this->emailBibliotekar,
            "username" => $this->usernameBibliotekar,
            "password" => $this->pwBibliotekar,
            "password_confirmation" => $this->pw2Bibliotekar,
            "photoPath" => $this->photoPath
        ]);
    }
}
