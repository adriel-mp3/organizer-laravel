<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.attempt');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
});
