<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // السماح بتنفيذ الطلب
    }

    public function rules(): array {
        return [
            'User_id' => 'required|exists:users,User_id',
            'Product_id' => 'required|exists:products,Products_id',
            'Products_Number' => 'required|integer|min:1',
        ];
    }
}
