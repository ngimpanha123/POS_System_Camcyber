<?php

use App\Http\Controllers\PrintPDF\printController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'print-pdf'], function () {
    Route::get('/order-invoice',            [printController::class, 'printInvioceOrder']);
    Route::get('/sales-invoice/{number}',   [printController::class, 'printSale']);
});
