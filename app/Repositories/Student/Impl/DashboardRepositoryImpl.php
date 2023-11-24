<?php

namespace App\Repositories\Student\Impl;

use App\Models\Student\DashboardModel;
use App\Repositories\Student\DashboardRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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

  public function postFirstTimeLogin(Request $request): Collection|array
  {
    $id     = session()->get('stu_id');
    $email  = $request->post('ftlEmail');
    $phone  = $request->post('ftlPhoneNumber');
    $pass   = $request->post('ftlNewPassword');

    $update = $this->dashboardModel->postFirstTimeLogin($id, $email, $phone, $pass);

    if ($update['success']) {
      return collect(['success' => true, "code" => 200, "message" => "success"]);
    } else {
      return collect(['success' => false, "code" => 401, "message" => "failed"]);
    }
  }
}
