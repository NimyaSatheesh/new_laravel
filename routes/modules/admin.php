<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ChatController;


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');

    
    Route::group(['prefix' => 'profile'], function () {

      Route::get('/index', [ProfileController::class, 'index'])->name('admin.profile.index');

    });


    Route::group(['prefix' => 'chat'], function () {

      Route::get('/index', [ChatController::class, 'index'])->name('admin.chat.index');

    });



});
?>