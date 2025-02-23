<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * Aqui eu posso criar um provider para autenticação.
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
        // Essa função verifica se o usuário é administrador para executar uma ação
        Gate::define('is-admin', function (User $user): bool {
            return $user->isAdm();
        });

        // Essa função verifica se o usuário é dono do registro para executar uma ação
        Gate::define('is-owner', function (User $user, object $register): bool {
            return $user->id === $register->user_id;
        });
    }
}
