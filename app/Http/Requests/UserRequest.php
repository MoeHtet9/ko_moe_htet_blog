<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'role_id' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name လိုအပ်ပါသည်',
            'email.required',
            'password.required',
            'role_id.required',
        ];
    }
}
