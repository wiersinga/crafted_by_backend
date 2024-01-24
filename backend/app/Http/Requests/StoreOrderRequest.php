<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'orderNum' =>'required|string',
            'paymentStatus' =>'required|boolean',
            'totalPrice' => 'required|decimal:2',
        ];
    }
    public function messages(): array
    {
        return [
            'orderNum.required' => 'OrderNum is required',
            'paymentStatus.required' => 'The paymentStatus is required',
            'totalPrice.required' => 'The birthdate is required',
        ];
    }
}
