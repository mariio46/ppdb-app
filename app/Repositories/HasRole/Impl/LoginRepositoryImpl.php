<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\Login;
use App\Repositories\HasRole\LoginRepository;

class LoginRepositoryImpl implements LoginRepository
{
    public function __construct(protected Login $login)
    {
        //
    }

    public function login(string $username, string $password): array
    {
        return $this->login->store(username: $username, password: $password);
    }

    public function logout(string $user_id): array
    {
        return $this->login->destroy(user_id: $user_id);
    }
}
