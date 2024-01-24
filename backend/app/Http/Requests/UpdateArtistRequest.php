<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArtistRequest extends FormRequest
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
            'siret' =>'sometimes|required|string',
            'history' => 'sometimes|required|string',
            'craftingDescription' => 'sometimes|required|string',
            'speciality_id'=> 'sometimes|required|exists:App\Models\Speciality,id',
            'user_id'=> 'sometimes|required|exists:App\Models\User,id',
            'theme_id'=> 'sometimes|exists:App\Models\Theme,id',
        ];
    }
    public function messages(): array
    {
        return [
            'siret.required' => 'Siret is required',
            'history.required' => 'The Name is required',
            'craftingDescription.required' => 'The birthdate is required',
        ];
    }
}
