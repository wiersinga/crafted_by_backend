<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'firstName' =>'required|string',
            'lastName' => 'required|string',
            'birthdate' => 'date',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|string|Password::min:10->mixedCase()',
            'address.street' => 'sometimes|required|string', // Street is required only if address is provided
            'address.zipcode' => 'sometimes|required|string', // Zipcode is required only if address is provided
            'address.city' => 'sometimes|required|string', // City is required only if address is provided
            'address.country' => 'sometimes|required|string', // Country is required only if address is provided
            'role.type' => 'required|exists:App\Models\Role,type',
        ];
//        return [
//            'firstName' =>'required|string',
//            'lastName' => 'required|string',
//            'birthdate' => 'date',
//            'email' => 'required|email:rfc,dns|unique:users',
//            'password' => 'required|string|Password::min(10)->mixedCase()',
////            'address_id' => 'required|exists:App\Models\Address,id',
//            'address.street' => 'required|string',
//            'address.zipcode' => 'required|string',
//            'address.city' => 'required|string',
//            'address.country' => 'required|string',
//            'role.type' => 'required|exists:App\Models\Role,id',
//        ];
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
            'password.min(10)'=>'Password must have at least 10 characters',
            'password.mixedCase'=> 'Password must have at least on uppercase and one lowercase',
//            'password.confirmed'=> 'Passwords are not identical'
        ];
    }
}
