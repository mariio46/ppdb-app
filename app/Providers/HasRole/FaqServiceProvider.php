<?php

namespace App\Providers\HasRole;

use App\Repositories\HasRole\FaqRepository;
use App\Repositories\HasRole\Impl\FaqRepositoryImpl;
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
