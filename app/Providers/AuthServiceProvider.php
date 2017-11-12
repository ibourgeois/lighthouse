<?php

namespace Lighthouse\Providers;

use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Lighthouse\Project' => 'Lighthouse\Policies\ProjectPolicy',
        'Lighthouse\Profile' => 'Lighthouse\Policies\ProfilePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // give admins access to everything
        Gate::before(function ($user) {
            return $user->isAn('admin');
        });
    }
}
