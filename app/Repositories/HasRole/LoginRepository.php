<?php

namespace App\Repositories\HasRole;

use Illuminate\Support\Collection;

interface LoginRepository
{
    public function login(string $username, string $password): Collection;
    public function logout(): array;
}
