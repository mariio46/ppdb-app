<?php

namespace App\Providers\Student;

use App\Repositories\Student\FaqRepository;
use App\Repositories\Student\Impl\FaqRepositoryImpl;
use Illuminate\Support\ServiceProvider;

class FaqServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(FaqRepository::class, FaqRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
