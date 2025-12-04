<?php

use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;

// Rutas Públicas (Cualquiera puede entrar)
Route::post("/register", [AuthController::class,"register"])->name("register");
Route::post('/login', [AuthController::class, 'login']);

// Rutas Protegidas (Necesitan estar autenticado)
Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    
    
});