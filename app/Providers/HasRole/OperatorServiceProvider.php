<?php

namespace App\Providers\HasRole;

use App\Repositories\HasRole\Impl\OperatorRepositoryImpl;
use App\Repositories\HasRole\OperatorRepository;
use Illuminate\Support\ServiceProvider;

class OperatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OperatorRepository::class, OperatorRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
