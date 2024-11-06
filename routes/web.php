<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\PostController;
use Illuminate\Support\Facades\Route;
require __DIR__ . '/client-auth.php';

Route::group(['as'=>'site.','middleware'=>'auth:web'], function () {
    Route::get('/',HomeController::class)->name('home');
    Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');
    Route::post('toggle-favourite-post', [PostController::class, 'toggle'])->name('posts.toggle');


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
