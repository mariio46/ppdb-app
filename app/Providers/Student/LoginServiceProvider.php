<?php

namespace App\Providers\Student;

use App\Repositories\Student\Impl\LoginRepositoryImpl;
use App\Repositories\Student\LoginRepository;
use Illuminate\Support\ServiceProvider;

class LoginServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LoginRepository::class, LoginRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
