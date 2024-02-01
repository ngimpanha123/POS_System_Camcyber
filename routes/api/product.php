<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Product\ProductController;

Route::get('/products',         [ProductController::class, 'listing']); // Read Many Records
Route::get('/products/{id}',    [ProductController::class, 'view']); // Read 1 Record
Route::post('/products',        [ProductController::class, 'create']);
Route::post('/products/{id}',   [ProductController::class, 'update']); // Update
Route::delete('/products/{id}', [ProductController::class, 'delete']);
