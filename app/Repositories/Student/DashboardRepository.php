<?php

namespace App\Repositories\Student;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface DashboardRepository
{
  public function getDataStudent(): JsonResponse;

  public function getDataNilai(): JsonResponse;

  public function postFirstTimeLogin(Request $request): Collection|array;
}
