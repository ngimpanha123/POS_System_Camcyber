<?php

use App\Http\Controllers\Sale\SaleController;
use Illuminate\Support\Facades\Route;

Route::get('/sales',            [SaleController::class, 'listing']);
Route::delete('/sales/{id}',    [SaleController::class, 'delete']);
