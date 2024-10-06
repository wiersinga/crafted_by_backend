<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
//     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>'required|string',
            'description' => 'string',
            'price' => 'required|decimal:2',
            'MaterialName'=> 'required|exists:App\Models\Material,name',
            'categoryName'=> 'required|exists:App\Models\Category,name',
            'artist_id'=> 'required|exists:App\Models\Artist,id',
            'product_image'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock'=>'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The Name is required',
            'price.required' => 'The price is required',
            'MaterialName.required' => 'Material(s) is/are required',
            'categoryName.required'=> 'Category is required',
            'artist.required'=>'Artist is required',
            'product_image.required'=>'Product image is required',
            'product_image.image'=>'Product image must be an image',
        ];
    }
}
