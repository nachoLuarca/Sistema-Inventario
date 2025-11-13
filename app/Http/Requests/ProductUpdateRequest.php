<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        $productId = $this->route('product'); // nombre ruta resource -> product
        return [
            'name' => 'required|string|max:255',
            'sku' => 'nullable|unique:products,sku,'.$productId,
            'price' => 'required|numeric|min:0',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
        ];
    }
}
