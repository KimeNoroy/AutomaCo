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
    
    Route::post('/logout', [AuthController::class, 'logout']);
    
    
});