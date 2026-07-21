<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Ruta raíz de bienvenida
Route::get('/', function () {
    return response()->json([
        'status' => 'online',
        'message' => 'Bienvenido a la API de LTGCact4_t4. Consulta la colección de Postman para ver los endpoints disponibles.',
        'version' => '1.0.0'
    ]);
});

// Rutas públicas
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas por Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('products', ProductController::class);
});