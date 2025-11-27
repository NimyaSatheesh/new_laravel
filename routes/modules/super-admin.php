<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\SuperAdmin\SuperAdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ChatController;


Route::middleware(['auth', 'role:super-admin'])->prefix('super-admin')->group(function () {

    Route::get('/index', [SuperAdminController::class, 'index'])->name('superadmin.index');


});
?>