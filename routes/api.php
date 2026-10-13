<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/up', function () {
    return response()->json(['status' => 'ok']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [App\Http\Controllers\Api\AuthController::class, 'user']);
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::get('/profile', [App\Http\Controllers\Api\ProfileController::class, 'show']);
    Route::put('/profile', [App\Http\Controllers\Api\ProfileController::class, 'update']);
});

Route::get('/plans', [App\Http\Controllers\Api\PlanController::class, 'index']);
Route::post('/contact', [App\Http\Controllers\Api\ContactController::class, 'store']);
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
