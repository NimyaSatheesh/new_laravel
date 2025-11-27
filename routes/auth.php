<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('register', [RegisterController::class, 'create'])->name('register');

    Route::post('register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('login', [LoginController::class, 'create'])->name('login');

    Route::post('login', [LoginController::class, 'store'])->name('auth.store');

});

Route::middleware('auth')->group(function () {

    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});
// Route::get('/force-logout', function () {
//     Auth::logout();
//     session()->invalidate();
//     session()->regenerateToken();
//     return 'You are fully logged out';
// });