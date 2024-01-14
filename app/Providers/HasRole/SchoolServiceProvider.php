<?php

namespace App\Providers\HasRole;

use App\Repositories\HasRole\Impl\SchoolRepositoryImpl;
use App\Repositories\HasRole\SchoolRepository;
use Illuminate\Support\ServiceProvider;

class SchoolServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SchoolRepository::class, SchoolRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
