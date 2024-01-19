<?php

namespace App\Providers\HasRole\SuperAdmin;

use App\Repositories\HasRole\SuperAdmin\Impl\RoleRepositoryImpl;
use App\Repositories\HasRole\SuperAdmin\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(RoleRepository::class, RoleRepositoryImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
