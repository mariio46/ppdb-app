<?php

namespace App\Providers\HasRole;

use App\Repositories\HasRole\Impl\SchoolQuotaRepositoryImpl;
use App\Repositories\HasRole\SchoolQuotaRepository;
use Illuminate\Support\ServiceProvider;

class SchoolQuotaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SchoolQuotaRepository::class, SchoolQuotaRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
