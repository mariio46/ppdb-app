<?php

namespace App\Providers\HasRole;

use App\Repositories\HasRole\AgencyRepository;
use App\Repositories\HasRole\Impl\AgencyRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class AgencyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AgencyRepository::class, AgencyRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
