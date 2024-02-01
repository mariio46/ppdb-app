<?php

namespace App\Providers\HasRole;

use App\Repositories\HasRole\Impl\SchoolCoordinateRepositoryImpl;
use App\Repositories\HasRole\SchoolCoordinateRepository;
use Illuminate\Support\ServiceProvider;

class SchoolCoordinateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SchoolCoordinateRepository::class, SchoolCoordinateRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
