<?php

namespace App\Http\Requests\Api\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            "name" => ['required', 'max:255'],
            "surname" => ['required', 'max:255'],
            "jmbg" => ['required', 'regex:/^[0-9]{13}+$/', 'min:13', 'max:13'],
            "email" => ['required', 'email', 'max:255', 'unique:users'],
            "username" => ['required', 'max:255', 'unique:users', 'alpha_dash'],
            "password" => ['required', 'confirmed', 'min:8', 'max:255'],
            "role_id" => ['required', 'int'],
            "photoPath" => [''],
        ];
    }

    public $validator = null;

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }
}
