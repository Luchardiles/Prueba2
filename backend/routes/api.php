<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/products', [\App\Http\Controllers\ProductosController::class,'index']);
Route::post('/api/products',[\App\Http\Controllers\ProductosController::class,'store']);
Route::delete('/api/products/{id}',[\App\Http\Controllers\ProductosController::class,'destroy']);
Route::put('/api/products/{id}', [\App\Http\Controllers\ProductosController::class, 'update']);

