<?php

namespace App\Providers\Student;

use App\Repositories\Student\Impl\RegionRepositoryImpl;
use App\Repositories\Student\RegionRepository;
use Illuminate\Support\ServiceProvider;

class RegionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(RegionRepository::class, RegionRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
