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
    Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
    Route::post('toggle-favourite-post', [PostController::class, 'toggle'])->name('posts.toggle');
    Route::get('/',HomeController::class)->name('home');
    Route::get('/requests/{request}',[DonationRequestController::class,'show'])->name('requests.show');
    Route::get('/requests',[DonationRequestController::class,'index'])->name('requests.index');

});


//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});
