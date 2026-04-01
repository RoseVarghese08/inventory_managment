<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Requests\StoreStockRequest;

class StockController extends Controller
{
    public function store(StoreStockRequest $request)
    {
        $stock = Stock::updateOrCreate(
            [
                'product_id'=>$request->product_id,
                'warehouse_id'=>$request->warehouse_id
            ],
            $request->validated()
        );

        return response()->json($stock);
    }
}