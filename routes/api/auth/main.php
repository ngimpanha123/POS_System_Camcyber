<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/login',                   [AuthController::class, 'login']);
Route::post('/register',                [AuthController::class, 'register']);
Route::post('/logout',                  [AuthController::class, 'logout']);
Route::post('/refresh',                 [AuthController::class, 'refresh']);
Route::post('/change-password',         [AuthController::class, 'changePassword']);
Route::post('/request-security-code',   [AuthController::class, 'getSecurityCode']);
Route::post('/verify-security-code',    [AuthController::class, 'verifyCode']);
Route::post('/reset-password',          [AuthController::class, 'resetPassword']);
Route::delete('/delete/{id}',           [AuthController::class, 'delete']);
Route::get('/',                         [AuthController::class, 'view']);
