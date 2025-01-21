<?php

use App\Http\Controllers\WebController\PermissionController;
use App\Http\Controllers\WebController\RoleController;
use App\Http\Controllers\WebController\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('users', UserController::class);
