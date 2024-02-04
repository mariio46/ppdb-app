<?php

namespace App\Providers\HasRole;

use App\Repositories\HasRole\Impl\SchoolZoneRepositoryImpl;
use App\Repositories\HasRole\SchoolZoneRepository;
use Illuminate\Support\ServiceProvider;

class SchoolZoneServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SchoolZoneRepository::class, SchoolZoneRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
