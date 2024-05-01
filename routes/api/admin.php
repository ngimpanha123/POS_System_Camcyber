<?php
use Illuminate\Support\Facades\Route;

// ============================================================================>> Custom Library
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\POSController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\PrintController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\UserController;

// ===========================================================================>> Dashboard
Route::get('/dashboard', [DashboardController::class, 'getDashboardInfo']);


