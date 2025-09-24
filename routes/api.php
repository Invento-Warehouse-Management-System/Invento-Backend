<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

//User Routes

Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->middleware(['auth:api', 'role:admin']);

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index')
    ->middleware(['auth:api', 'role:admin']);

Route::post('/users', [UserController::class, 'store'])
    ->name('users.store')
    ->middleware(['auth:api', 'role:admin']);

Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show')
    ->middleware(['auth:api', 'role:admin']);

Route::put('/users/{user}', [UserController::class, 'update'])
    ->name('users.update')
    ->middleware(['auth:api', 'role:admin']);


//Warehouse Routes

Route::delete('/warehouse/{warehouse}', [WarehouseController::class, 'destroy'])
    ->name('warehouse.destroy')
    ->middleware(['auth:api', 'role:admin']);

Route::post('/warehouse/register', [WarehouseController::class, 'store'])
    ->name('warehouse.register')
    ->middleware(['auth:api', 'role:admin']);

Route::post('/warehouse/login', [WarehouseController::class, 'login'])
    ->name('warehouse.login')
    ->middleware(['auth:api', 'role:admin']);

Route::get('/warehouse', [WarehouseController::class, 'index'])
    ->name('warehouse.index')
    ->middleware(['auth:api', 'role:admin']);

Route::get('/warehouse/{warehouse}', [WarehouseController::class, 'show'])
    ->name('warehouse.show')
    ->middleware(['auth:api', 'role:admin']);
