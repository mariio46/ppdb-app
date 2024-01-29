<?php

namespace App\Repositories\HasRole;

interface LoginRepository
{
    public function login(string $username, string $password): array;

    public function logout(string $user_id): array;
}
