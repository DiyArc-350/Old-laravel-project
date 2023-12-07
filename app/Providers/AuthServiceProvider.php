<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        // /* define a admin user role */
        // Gate::define('isEmployee', function(User $user) {
        //     return $user->auth()->guard('employee')->user() != null;
        //  });
        
         /* define a manager user role */
         Gate::define('logged-in', function($user) {
             return $user;
         });
       
    }
}
