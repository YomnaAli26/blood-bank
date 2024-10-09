<?php

use App\Http\Controllers\Api\Auth\{RegisterController,LoginController,ForgotPasswordController,ResetPasswordController};
use App\Http\Controllers\Api\{MainController,ProfileController};
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1/'], function () {

    Route::post('register', RegisterController::class);
    Route::post('login', LoginController::class);
    Route::post('forgot-password', ForgotPasswordController::class);
    Route::patch('reset-password', ResetPasswordController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::put('/edit-profile/{client}', ProfileController::class);
        Route::get('/governorates', [MainController::class, 'governorates']);
        Route::get('/cities', [MainController::class, 'cities']);
        Route::get('/settings', [MainController::class, 'settings']);
        Route::get('/blood-types', [MainController::class, 'bloodTypes']);
    });


});

