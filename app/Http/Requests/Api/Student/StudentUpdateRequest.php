<?php

namespace App\Http\Requests\Api\Student;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentUpdateRequest extends FormRequest
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
        $user = $this->route('student') ?? auth()->user();
        return [
            //
            "name" => ['required', 'max:255'],
            "surname" => ['required', 'max:255'],
            "jmbg" => ['required', 'regex:/^[0-9]{13}+$/', 'min:13', 'max:13'],
            "email" => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            "username" => ['required', 'max:255', Rule::unique('users')->ignore($user->id), 'alpha_dash'],
            "password" => ['required', 'confirmed', 'max:255'],
            "photoPath" => ['nullable', 'url']
        ];
    }


    public $validator = null;

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $this->validator = $validator;
    }
}
