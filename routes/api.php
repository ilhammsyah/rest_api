<?php

use App\Http\Controllers\authController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    return response()->json([
        'status' => false,
        'message' => 'akses tidak diperbolehkan'
    ],401);
})->name('login');

Route::post('registerUser', [authController::class, 'registerUser']);
Route::post('loginUser', [authController::class, 'loginUser']);
