<?php

namespace App\Repositories\Student\Impl;

use App\Models\Student\DashboardModel;
use App\Models\Student\RegionModel;
use App\Repositories\Student\DashboardRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DashboardRepositoryImpl implements DashboardRepository
{
  public function __construct(private DashboardModel $dashboardModel, private RegionModel $regionModel)
  {
  }

  public function getDataStudent(): JsonResponse
  {
    $result = $this->dashboardModel->getDataStudentById(session()->get('stu_id'));

    return response()->json($result);
  }

  public function getDataScore(): JsonResponse
  {
    $result = $this->dashboardModel->getDataScoreAll(session()->get('stu_id'));
    return response()->json($result);
  }

  public function getScoreBySemester(int $semester): JsonResponse
  {
    $result = $this->dashboardModel->getDataScoreBySemester(session()->get('stu_id'), $semester);
    return response()->json($result);
  }

  public function postFirstTimeLogin(Request $request): Collection
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

  public function getListProvince(): Collection|array
  {
    $lists = $this->regionModel->getListProvince()->all();

    return $lists;
  }

  public function getListCity(string $provinceCode): Collection|array
  {
    $lists = $this->regionModel->getListCity()->where(function ($value, $key) use ($provinceCode) {
      return str_starts_with($value['code'], $provinceCode);
    });

    return $lists->values()->all();
  }

  public function getListDistrict(string $cityCode): Collection|array
  {
    $lists = $this->regionModel->getListDistrict()->where(function ($value, $key) use ($cityCode) {
      return str_starts_with($value['code'], $cityCode);
    });

    return $lists->values()->all();
  }

  public function getListVillage(string $districtCode): Collection|array
  {
    $lists = $this->regionModel->getListVillage()->where(function ($value, $key) use ($districtCode) {
      return str_starts_with($value['code'], $districtCode);
    });

    return $lists->values()->all();
  }

  public function postUpdateStudentData(Request $request): Collection
  {
    $update = $this->dashboardModel->postUpdateStudentData($request);

    if ($update['success']) {
      return collect(['success' => true, "code" => 200, "message" => "success"]);
    } else {
      return collect(['success' => false, "code" => 400, "message" => "failed"]);
    }
  }

  public function postUpdateStudentProfile(Request $request): Collection|array
  {
    $update = $this->dashboardModel->postUpdateStudentProfile($request);

    if ($update['success']) {
      return collect(['success' => true, "code" => 200, "message" => "success"]);
    } else {
      return collect(['success' => false, "code" => 400, "message" => "failed"]);
    }
  }

  public function postUpdateStudentScore(int $semester, Request $request): Collection|array
  {
    $update = $this->dashboardModel->postUpdateStudentScore($semester, $request);

    if ($update['success']) {
      return collect(['success' => true, "code" => 200, "message" => ['scoreStatus' => 'success', 'scoreMsg' => 'Data berhasil diperbarui.']]);
    } else {
      return collect(['success' => false, "code" => 400, "message" => ['scoreStatus' => 'danger', 'scoreMsg' => 'Data gagal diperbarui.']]);
    }
  }

  public function postLockStudentData(): Collection
  {
    $id = session()->get('stu_id');

    $lock = $this->dashboardModel->postLockStudentData($id);

    return collect($lock);
  }
}
