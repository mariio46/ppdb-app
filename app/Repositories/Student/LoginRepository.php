<?php

namespace App\Repositories\Student;

use Illuminate\Support\Collection;

interface LoginRepository
{
    public function doLogin(string $nisn, string $password): Collection;

    public function logout(): array;
}
