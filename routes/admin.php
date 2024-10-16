<?php

use Illuminate\Support\Facades\Route;

Route::view('/','admin.dashboard')->name('dashboard');
Route::resource('/governorates','GovernorateController');
