<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
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
            'rating' =>'sometimes|required|numeric',
            'comment' => 'sometimes|string',
            'user_id' => 'exists:App\Models\User,id',
            'product_id' => 'exists:App\Models\Product,id',
        ];
    }
}
