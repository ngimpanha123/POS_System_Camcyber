<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyProfile\MyProfileController;

Route::group(['prefix' => 'myInfo'], function () {

    Route::get('/',                 [MyProfileController::class, 'view']);
    Route::post('/',                [MyProfileController::class, 'update']);
    Route::post('/change-password', [MyProfileController::class, 'changePassword']);
    Route::post('/update',                [MyProfileController::class, 'update']);
    Route::post('/changePassword', [MyProfileController::class, 'changePassword']);
    
});
    
