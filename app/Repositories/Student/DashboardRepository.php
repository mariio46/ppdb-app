<?php

namespace App\Repositories\Student;

use Illuminate\Http\JsonResponse;

interface DashboardRepository
{
  public function getDataStudent(): JsonResponse;

  public function getDataNilai(): JsonResponse;
}
