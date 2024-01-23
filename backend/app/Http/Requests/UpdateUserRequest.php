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
            'password' => 'sometimes|required|string',
            'address_id' => 'exists:App\Models\Address,id',
            'role_id' => 'exists:App\Models\Role,id',
        ];
    }
}
