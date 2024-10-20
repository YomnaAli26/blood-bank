<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/admin-auth.php';

Route::middleware('auth:admin')->group(function () {
    Route::view('/','admin.dashboard')->name('dashboard');
    Route::resource('/governorates','GovernorateController');
    Route::resource('/cities','CityController');
    Route::resource('/categories','CategoryController');
    Route::resource('/posts','PostController');
    Route::resource('/clients','ClientController');
    Route::patch('clients/{id}/toggle-status', 'ClientController@toggleStatus')->name('admin.clients.toggleStatus');
});



