<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtistRequest extends FormRequest
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
            'siret' =>'required|string',
            'history' => 'required|string',
            'craftingDescription' => 'required|string',
            'speciality_id'=> 'required|exists:App\Models\Speciality,id',
            'user_id'=> 'required|exists:App\Models\User,id',
            'theme_id'=> 'exists:App\Models\Theme,id',
        ];
    }

    public function messages(): array
    {
        return [
            'siret.required' => 'Siret is required',
            'history.required' => 'History is required',
            'craftingDescription.required' => 'the description of your method is required',
        ];
    }
}
