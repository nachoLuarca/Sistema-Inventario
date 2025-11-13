<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockMovementRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'nullable|exists:warehouses,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|in:in,out,adjustment',
            'reference' => 'nullable|string',
            'notes' => 'nullable|string',
        ];
    }
}
