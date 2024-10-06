<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=> 'required|email|regex:/^[\w\.-]+@[\w\.-]+\.[a-zA-Z]{2,}$/',
            'password'=> 'required|string|min:8'
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'Email is required',
            'email.email'=>'Input does not have the Email form',
            'password.required'=>'Password is required',
            'password.min:10'=>'Password must have at least 8 characters'
        ];
    }
}
