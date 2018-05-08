<?php

namespace App\Providers;

use App\Admin;
use App\Policies\AdminPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Admin::class => AdminPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //開発者のみ許可
        Gate::define('system-only', function ($admin) {
            return $admin->role === Admin::SYSTEM_ADMIN;
        });

        //オーナー以上（＝開発者とオーナー）のみ許可
        Gate::define('owner-higher', function ($admin) {
            return $admin->role <= Admin::OWNER && $admin->role >= Admin::SYSTEM_ADMIN;
        });
    }
}
