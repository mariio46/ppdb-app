<?php

namespace App\Providers\HasRole;

use App\Repositories\HasRole\Impl\SchoolDataRepositoryImpl;
use App\Repositories\HasRole\SchoolDataRepository;
use Illuminate\Support\ServiceProvider;

class SchoolDataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SchoolDataRepository::class, SchoolDataRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
