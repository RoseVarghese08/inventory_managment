<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStockRequest extends FormRequest
{
    public function rules()
    {
        return [
            'product_id'=>'required|exists:products,id',
            'warehouse_id'=>'required|exists:warehouses,id',
            'quantity'=>'required|integer|min:1',
            'expires_at'=>'nullable|date'
        ];
    }
}