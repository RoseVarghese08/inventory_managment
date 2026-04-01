<?php
namespace App\Services;
use Carbon\Carbon;

class DynamicPricingService
{
   public function calculate($product)
{
    $totalStock = $product->stocks->sum('quantity');
    $basePrice = $product->base_price;

    
    if ($totalStock < 10) $basePrice *= 1.3;
    elseif ($totalStock <= 50) $basePrice *= 1.1;
    elseif ($totalStock > 100) $basePrice *= 0.8;

    $totalValue = 0;
    $totalQty = 0;

    foreach ($product->stocks as $stock) {

        $price = $basePrice;

        // Apply expiry discount ONLY to that stock
        if ($stock->expires_at &&
            now()->diffInDays($stock->expires_at) <= 7) {
            $price *= 0.75;
        }

        $totalValue += $price * $stock->quantity;
        $totalQty += $stock->quantity;
    }

    return $totalQty > 0 ? round($totalValue / $totalQty, 2) : $basePrice;
}
}