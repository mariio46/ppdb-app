<?php

namespace App\Providers\Student;

use App\Repositories\Student\Impl\StatusRepositoryImpl;
use App\Repositories\Student\StatusRepository;
use Illuminate\Support\ServiceProvider;

class StatusServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StatusRepository::class, StatusRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
