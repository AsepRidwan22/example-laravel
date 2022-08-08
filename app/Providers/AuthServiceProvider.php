<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        // Paginator::useBootstrap();
        Gate::define('koordinator',  function (User $user) {
            return $user->roles === 'koordinator';
        });

        Gate::define('dosen',  function (User $user) {
            return $user->roles === 'dosen';
        });

        Gate::define('mahasiswa',  function (User $user) {
            return $user->roles === 'mahasiswa';
        });
    }
}
