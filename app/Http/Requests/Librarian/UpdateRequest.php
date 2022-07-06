<?php

namespace App\Http\Requests\Librarian;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            "password" => ['confirmed'],
            "photoPath" => ['']
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
            "name" => $this->imePrezimeBibliotekarEdit,
            "JBMG" => $this->jmbgBibliotekarEdit,
            "email" => $this->emailBibliotekarEdit,
            "username" => $this->usernameBibliotekarEdit,
            "password" => $this->pwBibliotekarEdit,
            "password_confirmation" => $this->pw2BibliotekarEdit,
            "photoPath" => $this->photoPath
        ]);
    }
}
