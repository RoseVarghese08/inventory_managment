<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::post('/login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/products',[ProductController::class,'index']);
    Route::post('/stock',[StockController::class,'store']);
    Route::get('/warehouses/{id}/report',[WarehouseController::class,'report']);
});