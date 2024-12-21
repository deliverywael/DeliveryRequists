<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required|string|max:255',
            'product_quantity' => 'required|integer|min:1',
            'product_photo' => 'nullable|image|max:2048',
            'product_price' => 'required|integer|min:0',
            'Store_id' => 'required|exists:stores,Store_id'
        ];
    }
}
