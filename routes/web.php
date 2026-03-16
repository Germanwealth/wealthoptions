<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function (): void {
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
});

Route::controller(ContactController::class)->group(function (): void {
    Route::post('/contact', 'store')->name('contact.store');
});

Route::controller(AuthController::class)->group(function (): void {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.submit');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.submit');
    Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('dashboard')->name('dashboard.')->group(function (): void {
    // Future middleware example:
    // Route::middleware(['auth', 'role:user'])->group(...);
    Route::get('/', [DashboardController::class, 'user'])->name('user');
});

Route::prefix('admin')->name('admin.')->group(function (): void {
    // Future middleware example:
    // Route::middleware(['auth', 'role:admin'])->group(...);
    Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
});
