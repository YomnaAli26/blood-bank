<?php

use Illuminate\Support\Facades\Route;

Route::view('/','admin.dashboard')->name('dashboard');
Route::resource('/governorates','GovernorateController');
Route::resource('/cities','CityController');
Route::resource('/categories','CategoryController');
Route::resource('/clients','ClientController')->only('index','destroy');
Route::resource('/posts','PostController');
