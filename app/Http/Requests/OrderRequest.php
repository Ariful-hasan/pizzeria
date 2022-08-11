<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:App\Models\User,id',
            'pizza' => 'required|exists:App\Models\Product,id',
            'bottom' => 'required|exists:App\Models\ProductCategory,id',
            'topping' => 'required|exists:App\Models\ProductCategory,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'pizza.required' => 'Pizza is required',
            'pizza.exists' => 'Pizza not found',
        ];
    }
}
