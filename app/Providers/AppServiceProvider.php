<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth0\Login\Contract\Auth0UserRepository as Auth0Contract;
use Auth0\Login\Repository\Auth0UserRepository as UserRepo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Auth0 binding.
        $this->app->bind(
            Auth0Contract::class,
            UserRepo::class
        );
    }
}
