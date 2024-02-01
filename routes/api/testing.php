<?php

use App\Http\Controllers\Testing\TestingController;
use Illuminate\Support\Facades\Route;

Route::get('/send-telegram-bot',        [TestingController::class, 'sendTelegramBot']);

// Route::get('/loop',                     [TestingController::class, 'looping']);
// Route::get('/loop-1',                   [TestingController::class, 'looping']);
// Route::get('/loop-2',                   [TestingController::class, 'looping']);


