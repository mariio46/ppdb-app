<?php

namespace App\Repositories\Student\Impl;

use App\Models\Student\DashboardModel;
use App\Repositories\Student\DashboardRepository;
use Illuminate\Http\JsonResponse;

class DashboardRepositoryImpl implements DashboardRepository
{
  public function __construct(private DashboardModel $dashboardModel)
  {
  }

  public function getDataStudent(): JsonResponse
  {
    $result = $this->dashboardModel->getDataStudentById(session()->get('stu_id'));

    return response()->json($result);
  }

  public function getDataNilai(): JsonResponse
  {
    $result = $this->dashboardModel->getDataNilaiAll(session()->get('stu_id'));

    return response()->json($result);
  }
}
