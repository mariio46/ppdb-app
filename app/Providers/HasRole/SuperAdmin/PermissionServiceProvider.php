<?php

namespace App\Providers\HasRole\SuperAdmin;

use App\Repositories\HasRole\SuperAdmin\Impl\PermissionRepositoryImpl;
use App\Repositories\HasRole\SuperAdmin\PermissionRepository;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PermissionRepository::class, PermissionRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
