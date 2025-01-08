<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');
Route::get('login', function () {
    return view('session.login');
});

Route::get('register', function () {
    return view('session.register');
});

Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts', [PostController::class, 'store'])->name('posts.store');
