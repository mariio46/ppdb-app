<?php

namespace App\Repositories\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface LoginRepository
{
  public function doLogin(string $nisn, string $password): Collection;
}