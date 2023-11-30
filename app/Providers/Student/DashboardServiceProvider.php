<?php

namespace App\Providers\Student;

use App\Repositories\Student\DashboardRepository;
use App\Repositories\Student\Impl\DashboardRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DashboardRepository::class, DashboardRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
