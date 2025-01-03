<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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

    public function rules(): array {
        return [
            'User_id' => 'required|exists:users,User_id',
            'Product_id' => 'required|exists:products,Products_id',
            'Status' => 'required|string|max:255',
            'TotalCost' => 'required|integer|min:0',
            'Payment' => 'required|string|max:255',
        ];
    }
}
