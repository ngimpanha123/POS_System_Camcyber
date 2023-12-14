<?php

use App\Http\Controllers\PrintPDF\printController;
use Illuminate\Support\Facades\Route;

Route::get('/order-invoice/{receipt_number}',   [printController::class, 'printInvioceOrder']);
