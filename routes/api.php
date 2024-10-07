<?php

use App\Http\Controllers\Api\Auth\{RegisterController,LoginController,ForgotPasswordController};
use App\Http\Controllers\Api\MainController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1/'], function () {

    Route::post('register', RegisterController::class);
    Route::post('login', LoginController::class);
    Route::post('forgot-password', ForgotPasswordController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/governorates', [MainController::class, 'governorates'])->middleware('auth:sanctum');
        Route::get('/cities', [MainController::class, 'cities']);
        Route::get('/settings', [MainController::class, 'settings']);
        Route::get('/blood-types', [MainController::class, 'bloodTypes']);
    });


});

