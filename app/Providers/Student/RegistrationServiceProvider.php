<?php

namespace App\Providers\Student;

use App\Repositories\Student\Impl\RegistrationRepositoryImpl;
use App\Repositories\Student\RegistrationRepository;
use Illuminate\Support\ServiceProvider;

class RegistrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RegistrationRepository::class, RegistrationRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
