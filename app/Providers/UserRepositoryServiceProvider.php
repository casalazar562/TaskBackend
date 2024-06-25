<?php

namespace App\Providers;

use App\Contracts\UserRepositoryContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\EloquentUserRepository;


class UserRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryContract::class,
            EloquentUserRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
