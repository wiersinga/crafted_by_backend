<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|decimal:2',
            'material_id'=> 'sometimes|required|exists:App\Models\Material,id',
            'category_id'=> 'sometimes|required|exists:App\Models\Category,id',
            'artist_id'=> 'sometimes|required|exists:App\Models\Artist,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The Name is required',
            'price.required' => 'The price is required',
            'material.required' => 'Material(s) is/are required',
            'category.required'=> 'Category is required',
            'artist.required'=>'Artist is required',
        ];
    }
}
