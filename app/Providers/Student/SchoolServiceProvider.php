<?php

namespace App\Providers\Student;

use App\Repositories\Student\Impl\SchoolRepositoryImpl;
use App\Repositories\Student\SchoolRepository;
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
