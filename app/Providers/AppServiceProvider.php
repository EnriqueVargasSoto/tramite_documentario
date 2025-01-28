<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Traits\RecordsAuditAuth;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

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

        // Registrar auditoría de inicio de sesión
        \Illuminate\Support\Facades\Event::listen(Login::class, function () {
            RecordsAuditAuth::logLogin();
        });

        // Registrar auditoría de cierre de sesión
        \Illuminate\Support\Facades\Event::listen(Logout::class, function () {
            RecordsAuditAuth::logLogout();
        });
    }
}
