<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Stock;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
{
    // Create login user
    User::create([
        'name' => 'Test User',
        'email' => 'test@test.com',
        'password' => bcrypt('123456')
    ]);

    // Products
    $p1 = Product::create(['name'=>'Laptop','base_price'=>50000]);
    $p2 = Product::create(['name'=>'Phone','base_price'=>20000]);

    // Warehouse
    $w1 = Warehouse::create([
        'name'=>'Kochi Hub',
        'latitude'=>9.9312,
        'longitude'=>76.2673
    ]);

    // Stock cases (IMPORTANT for pricing logic)

    // Low stock (<10) → +30%
    Stock::create([
        'product_id'=>$p1->id,
        'warehouse_id'=>$w1->id,
        'quantity'=>5,
        'expires_at'=>now()->addDays(5) // near expiry
    ]);

    // Medium stock (10–50) → +10%
    Stock::create([
        'product_id'=>$p2->id,
        'warehouse_id'=>$w1->id,
        'quantity'=>30,
        'expires_at'=>now()->addDays(15)
    ]);

    // High stock (>100) → -20%
    Stock::create([
        'product_id'=>$p2->id,
        'warehouse_id'=>$w1->id,
        'quantity'=>120,
        'expires_at'=>now()->addDays(20)
    ]);
}
}
