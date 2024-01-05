<?php

namespace App\Providers\HasRole;

use App\Repositories\HasRole\Impl\LoginRepositoryImpl;
use App\Repositories\HasRole\LoginRepository;
use Illuminate\Support\ServiceProvider;

class LoginServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(LoginRepository::class, LoginRepositoryImpl::class);
    }

    public function boot(): void
    {
        //
    }
}
