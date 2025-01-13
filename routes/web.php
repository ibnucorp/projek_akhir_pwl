<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonatorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/showall', [DashboardController::class, 'showall'])->middleware(['auth', 'verified'])->name('dashboard.showall');

Route::get('/dashboard/show/{id}', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.show');
Route::get('/dashboard/create', [DashboardController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.create');
// Login Admin
// username: admin
// password: admin

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/logout', [ProfileController::class, 'logout'])->name('profile.logout');
});

Route::post('posts', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('posts/show/{id}', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/edit/{id}', [PostController::class, 'editPost'])->name('posts.edit');
Route::put('posts/{id}', [PostController::class, 'update'])->name('posts.update');


Route::middleware(['auth'])->group(function () {
    Route::post('donators', [DonatorController::class, 'store'])->name('donators.store');
    Route::get('bayar/{id}', [PembayaranController::class, 'index'])->name('pembayaran.index');
});

Route::get('token', function () {
    return @csrf_token();
});

require __DIR__ . '/auth.php';
