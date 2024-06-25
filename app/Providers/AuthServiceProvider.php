<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Contracts\AuthRepositoryContract;
use App\Repositories\PassportAuthRepository;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    public function register(): void
    {
        $this->app->bind(
            AuthRepositoryContract::class,
            PassportAuthRepository::class
        );
    }
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
      
    }
}
