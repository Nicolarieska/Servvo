<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCareController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\ProductCareItemController;

// Route Home 
Route::get('/servvo', [HomeController::class, 'home'])->name('home');

// Route Forms (Login)
Route::get('/login', [LoginController::class, 'login'])->name('login');

// Route Post Login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

// Route Home 
Route::middleware(['auth:web'])->group(function () {
    Route::get('/user/{id}', [DashboardUserController::class, 'index'])->name('user');
});
