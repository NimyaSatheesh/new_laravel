<?php

use App\Http\Controllers\User\Auth\ConfirmablePasswordController;
use App\Http\Controllers\User\Auth\LoginControler;
use App\Http\Controllers\User\Auth\PasswordController;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

   Route::group(['prefix' => 'user'], function () {

        Route::get('register', [RegisteredUserController::class, 'create'])->name('user.register');

        Route::post('register', [RegisteredUserController::class, 'store'])->name('user.register.store');

        Route::get('/login', [LoginControler::class, 'create'])->name('user.login');

        Route::post('/login', [LoginControler::class, 'store'])->name('user.store');

        Route::post('logout', [LoginControler::class, 'destroy']) ->name('user.logout');
    });


    Route::middleware('auth:user')->prefix('user')->group(function () {

        Route::get('/index', [UserController::class, 'index'])->name('user.index');
    
    
    });



?>