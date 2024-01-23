<?php

namespace App\Repositories\Student;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface DashboardRepository
{
    public function getDataStudent(): array;

    public function getDataScore(): array;

    public function getScoreBySemester(int $semester): array;

    public function postFirstTimeLogin(Request $request): array;

    public function postUpdateStudentData(Request $request): array;

    public function postUpdateStudentProfile(Request $request): array;

    public function postUpdateStudentScore(int $semester, Request $request): array;

    public function postLockStudentData(): array;
}
