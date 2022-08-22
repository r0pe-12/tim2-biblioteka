<?php

namespace App\Http\Requests\Librarian;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            "name" => ['required', 'max:255'],
            "surname" => ['required', 'max:255'],
            "jmbg" => ['required', 'regex:/^[0-9]{13}+$/', 'min:13', 'max:13'],
            "email" => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->id)],
            "username" => ['required', 'max:255', Rule::unique('users')->ignore($this->id), 'alpha_dash'],
            "password" => ['confirmed', 'max:255'],
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
            "id" => $this->id,
            "name" => $this->firstname,
            "surname" => $this->lastname,
            "jmbg" => $this->jmbgBibliotekarEdit,
            "email" => $this->emailBibliotekarEdit,
            "username" => $this->usernameBibliotekarEdit,
            "password" => $this->pwBibliotekarEdit,
            "password_confirmation" => $this->pw2BibliotekarEdit,
            "photoPath" => $this->photoPath
        ]);
    }
}
