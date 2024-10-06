<?php

use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::group(['prefix' => 'v1/'], function () {
    Route::post('register', RegisterController::class);
    Route::get('/governorates', [MainController::class, 'governorates']);
    Route::get('/cities', [MainController::class, 'cities']);
    Route::get('/settings', [MainController::class, 'settings']);
    Route::get('/blood-types', [MainController::class, 'bloodTypes']);

});

