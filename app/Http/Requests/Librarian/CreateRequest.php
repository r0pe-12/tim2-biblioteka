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
            "name" => 'required',
            "JBMG" => ['required', 'numeric'],
            "email" => ['required', 'email'],
            "username" => ['required'],
            "password" => ['required', 'confirmed'],
            'photoPath' => ['mimes:jpg,bmp,png,jpeg,webp']
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
            "name" => $this->imePrezimeBibliotekar,
            "JBMG" => $this->jmbgBibliotekar,
            "email" => $this->emailBibliotekar,
            "username" => $this->usernameBibliotekar,
            "password" => $this->pwBibliotekar,
            "password_confirmation" => $this->pw2Bibliotekar,
            "photoPath" => $this->photoPath
        ]);
    }
}
