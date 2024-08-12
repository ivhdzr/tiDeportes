<?php

use App\Http\Controllers\Api\MonitoreoController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

/* AUTENTICARSE Y OBTENER TOKENS */
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('/monitoreos', [MonitoreoController::class, 'index']);
    Route::get('/monitoreos/{id}', [MonitoreoController::class, 'show']);
    Route::post('/monitoreos', [MonitoreoController::class, 'store']);
});