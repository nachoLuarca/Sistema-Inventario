<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'sku' => 'nullable|unique:products,sku',
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'initial_quantity' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ];
    }
}
