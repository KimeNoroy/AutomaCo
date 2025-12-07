<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword; // <-- IMPORTANTE: Agregar esto


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function ($user, $token) {
            // Apuntamos al puerto 3000 (donde correrá React) o al dominio del frontend
            return 'http://localhost:3000/reset-password?token=' . $token . '&email=' . $user->email;
        });
    }
}
