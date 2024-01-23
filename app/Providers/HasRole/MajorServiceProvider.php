<?php

namespace App\Providers\HasRole;

use App\Repositories\HasRole\Impl\MajorRepositoryImpl;
use App\Repositories\HasRole\MajorRepository;
use Illuminate\Support\ServiceProvider;

class MajorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MajorRepository::class, MajorRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
