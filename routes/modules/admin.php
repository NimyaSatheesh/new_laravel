<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;



  Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [AdminLoginController::class, 'create'])->name('admin.login');

    Route::post('/login', [AdminLoginController::class, 'store'])->name('admin.store');
    
    Route::post('logout', [AdminLoginController::class, 'destroy'])->name('admin.logout');

});
Route::middleware('auth:admin')->prefix('admin')->group(function () {

    Route::get('/index', [AdminController::class, 'index'])->name('admin.index');


});
?>