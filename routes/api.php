<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\productController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'status' => false,
        'message' => 'akses tidak diperbolehkan'
    ],401);
})->name('login');

Route::post('registerUser', [authController::class, 'registerUser']);
Route::post('loginUser', [authController::class, 'loginUser']);

Route::get('product', [productController::class, 'index'])->middleware('auth:sanctum');
