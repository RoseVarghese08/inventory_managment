<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;

class WarehouseController extends Controller
{
    public function report($id)
    {
        $warehouse = Warehouse::with('stocks.product')->findOrFail($id);

        return [
            'warehouse'=>$warehouse->name,
            'products'=>$warehouse->stocks->map(function($stock){
                return [
                    'product'=>$stock->product->name,
                    'quantity'=>$stock->quantity,
                    'near_expiry'=>$stock->expires_at &&
                        now()->diffInDays($stock->expires_at) <= 7
                ];
            })
        ];
    }
}