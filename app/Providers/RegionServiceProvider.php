<?php

namespace App\Providers;

use App\Repositories\Impl\RegionRepositoryImpl;
use App\Repositories\RegionRepository;
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
