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
            'birthdate' => 'required|date',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required',
            'address_id' => 'required|exists:App\Models\Address,id',
            'role_id' => 'required|exists:App\Models\Role,id',
        ];
    }
}