<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [ // Asignamos a un modelo, una política de acceso
        // 'App\Models\Model' => 'App\Policies\UserPolicy', // queremos que el modelo user tenga asignada la política de acceso UserPolicy
        User::class => UserPolicy::class // Cambiamos la sintaxis
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create-projects', 'App\Policies\ProjectPolicy@create');

        Gate::define('view-deleted-projects', function($user){
            return $user->role === 'admin';
        });
    }
}
