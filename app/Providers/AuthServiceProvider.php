<?php

namespace App\Providers;

use Carbon\Carbon;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Passport::routes();
        
        //Passport::tokensExpireIn(Carbon::now()->addDays(15));
        
        //Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        
		\Gate::define('quarx', function ($user) {
			return ($user->roles->first()->name === 'admin');
		});
		\Gate::define('admin', function ($user) {
			return ($user->roles->first()->name === 'admin');
		});

        //
    }
}
