<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\DonationRequestController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\MainController;
use App\Http\Controllers\Site\PostController;
use Illuminate\Support\Facades\Route;
require __DIR__ . '/client-auth.php';

Route::group(['as'=>'site.','middleware'=>'auth'], function () {
    Route::view('/about', 'site.about')->name('about');
    Route::view('/who-are', 'site.who-are')->name('who-are');
    Route::view('/contact-us', 'site.contact-us')->name('contact-us');
    Route::post('/contact-us', [MainController::class,'contactUs'])->name('contact-us');
    Route::resource('posts', PostController::class)->only('index','show');
    Route::get('toggle-favourite-post/{id}', [PostController::class, 'toggle'])->name('posts.toggle');
    Route::get('category-posts/{category}', [PostController::class, 'categoryPosts'])->name('posts.category');
    Route::resource('requests', DonationRequestController::class)->except('destroy','edit','update');
    Route::get('/',HomeController::class)->name('home');


});


