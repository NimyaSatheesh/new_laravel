<?php

use App\Http\Controllers\User\Auth\ConfirmablePasswordController;
use App\Http\Controllers\User\Auth\LoginControler;
use App\Http\Controllers\User\Auth\PasswordController;
use App\Http\Controllers\User\Auth\RegisteredUserController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;



    Route::middleware(['auth', 'role:user'])->prefix('user')->group(function () {

        Route::get('/index', [UserController::class, 'index'])->name('user.index');
    
    
    });



?>