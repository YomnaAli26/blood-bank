<?php

use App\Http\Controllers\Api\Auth\{RegisterController,
    LoginController,
    ForgotPasswordController,
    ResetPasswordController,
    LogoutController
};
use App\Http\Controllers\Api\{DonationRequestController, MainController,
    ProfileController, PostController,FcmTokenController};
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'v1/'], function () {

    Route::post('register', RegisterController::class);
    Route::post('login', LoginController::class);
    Route::post('forgot-password', ForgotPasswordController::class);
    Route::patch('reset-password', ResetPasswordController::class);


    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', LogoutController::class);
        Route::put('/edit-profile/{client}', [ProfileController::class,'update']);
        Route::post('/notifications-settings', [ProfileController::class, 'storeNotificationsSettings']);
        Route::get('/client-governorates', [MainController::class, 'getClientGovernorates']);
        Route::get('/client-blood-types', [MainController::class, 'getClientBloodTypes']);
        Route::post('/contact-us', [MainController::class, 'contactUs']);
        Route::get('/governorates', [MainController::class, 'governorates']);
        Route::get('/cities', [MainController::class, 'cities']);
        Route::get('/categories', [MainController::class, 'categories']);
        Route::get('/settings', [MainController::class, 'settings']);
        Route::get('/blood-types', [MainController::class, 'bloodTypes']);

        Route::apiResource('posts', PostController::class)
            ->only(['index', 'show']);
        Route::get('favourite-posts', [PostController::class, 'getFavouritePosts']);
        Route::post('toggle-favourite-post', [PostController::class, 'toggleFavouritePost']);
        Route::apiResource('donation-requests', DonationRequestController::class)
            ->only(['index', 'show','store']);
        Route::post('fcm-token', [FcmTokenController::class,'store']);
        Route::delete('fcm-token', [FcmTokenController::class,'destroy']);



    });


});

