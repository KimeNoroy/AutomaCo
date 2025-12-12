<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordResetController;

/*Rutas Públicas (Cualquiera puede entrar)*/

Route::post("/register", [AuthController::class,"register"])->name("register");
Route::post('/login', [AuthController::class, 'login'])->name("login");
Route::post('/send-reset-link', [PasswordResetController::class, 'sendResetLink'])->name("send-reset-link");
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name("reset-password");


/*Rutas Protegidas (Necesitan estar autenticado)*/

Route::middleware('auth:sanctum')->group(function () {
    
    // Ruta para activar cuenta (no requiere cuenta activada)
    Route::post('/activate', [AuthController::class, 'activate'])->name("activate");
    
    // Rutas que requieren cuenta activada
    Route::middleware('account.active')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        
        // Aquí irán las rutas de descarga de DTE cuando las implemente
      
    });
    
});