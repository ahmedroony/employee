<?php

use App\Http\Controllers\Api\Shifts;
use App\Http\Controllers\Api\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/shifts', [Shifts::class, 'index']);
Route::post('/shifts', [Shifts::class, 'store']);

Route::put('/shifts/{shift}', [Shifts::class, 'update']);
Route::delete('/shifts/{shift}', [Shifts::class, 'destroy']);
// api Users
Route::get('/users', [Users::class, 'index']);
Route::post('/users', [Users::class, 'store']);
Route::put('/users/{user}', [Users::class, 'update']);
Route::delete('/users/{user}', [Users::class, 'destroy']);
//Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
