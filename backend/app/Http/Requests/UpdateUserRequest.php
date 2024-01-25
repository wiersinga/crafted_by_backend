<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'firstName' =>'sometimes|required|string',
            'lastName' => 'sometimes|required|string',
            'birthdate' => 'sometimes|required|date',
            'email' => 'sometimes|required|email:rfc,dns',
            'password' => 'sometimes|required|string|Password::min(10)->mixedCase()',
            'address_id' => 'exists:App\Models\Address,id',
            'role_id' => 'exists:App\Models\Role,id',
        ];
    }

    public function messages(): array
    {
        return [
            'firstName.required' => 'The Name is required',
            'lastName.required' => 'The Name is required',
            'birthdate.required' => 'The birthdate is required',
            'email.required' => 'An Email address is required',
            'email.rfc'=> 'Check the Email',
            'email.dns'=>'Check the Email',
            'password.required' => 'Password is required',
            'password.min(8)'=>'Password must have at least 12 characters',
            'password.mixedCase'=> 'Password must have at least on uppercase and one lowercase',
            'password.confirmed'=> 'Passwords are not identical'
        ];
    }



}
