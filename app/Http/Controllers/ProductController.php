<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\DynamicPricingService;

class ProductController extends Controller
{
    public function index(DynamicPricingService $pricing)
    {
        $products = Product::with('stocks')->get();

        return $products->map(function ($product) use ($pricing) {
            return [
                'id'=>$product->id,
                'name'=>$product->name,
                'base_price'=>$product->base_price,
                'dynamic_price'=>$pricing->calculate($product)
            ];
        });
    }
}