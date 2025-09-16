<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index')
    ->middleware(['auth:api', 'role:admin']);

Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show')
    ->middleware(['auth:api', 'role:admin']);

Route::post('/users', [UserController::class, 'store'])
    ->name('users.store')
    ->middleware(['auth:api', 'role:admin']);

Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('users.update')
    ->middleware(['auth:api', 'role:admin']);
