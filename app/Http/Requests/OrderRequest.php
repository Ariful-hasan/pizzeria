<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
     * E=Email, S=SMS
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // user need to be checked by JWT or else.
        // return [
        //     'user' => 'required|numeric',
        //     'pizza' => 'required|numeric|exists:App\Models\Product,id',
        //     'bottom' => 'required|numeric|exists:App\Models\ProductCategory,id',
        //     'topping' => 'required|numeric|exists:App\Models\ProductCategory,id',
        //     'notification' => 'required', Rule::in(config('constants.ORDER_NOTIFICATION_METHODS')),
        // ];

        return [
            'user' => 'required|numeric',
            'notification' => 'required', Rule::in(config('constants.ORDER_NOTIFICATION_METHODS')),
            'products.*.product' => 'required|numeric|exists:App\Models\Product,id',
            'products.*.topping' => 'required|numeric|exists:App\Models\ProductCategory,id',
            'products.*.bottom' => 'required|numeric|exists:App\Models\ProductCategory,id',
        ];
    }
}
