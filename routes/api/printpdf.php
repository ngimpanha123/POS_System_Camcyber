<?php

use App\Http\Controllers\PrintPDF\PrintController;
use Illuminate\Support\Facades\Route;

Route::get('/order-invoice/{receipt_number}',   [PrintController::class, 'printInvioceOrder']);
