<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        Gate::define('admin', function (User $user) {
            return $user->role->name === 'Admin';
        });

        Gate::define('user', function (User $user) {
            return $user->role->name !== 'Admin';
        });

        Gate::define('engineer', function (User $user) {
            return $user->role->name == 'Engineer';
        });
        
        Gate::define('pic', function (User $user) {
            return $user->role->name == 'PIC';
        });

        Gate::define('qualityinspector', function (User $user) {
            return $user->role->name == 'Quality Inspector';
        });


    }
}