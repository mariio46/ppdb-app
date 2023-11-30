<?php

namespace App\Repositories\Student;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface DashboardRepository
{
  public function getDataStudent(): JsonResponse;

  public function getDataScore(): JsonResponse;

  public function getScoreBySemester(int $semester): JsonResponse;

  public function postFirstTimeLogin(Request $request): Collection;

  public function getListProvince(): Collection|array;

  public function getListCity(string $provinceCode): Collection|array;

  public function getListDistrict(string $cityCode): Collection|array;

  public function getListVillage(string $districtCode): Collection|array;

  public function postUpdateStudentData(Request $request): Collection;

  public function postUpdateStudentProfile(Request $request): Collection|array;

  public function postUpdateStudentScore(int $semester, Request $request): Collection|array;

  public function postLockStudentData(): Collection;
}
