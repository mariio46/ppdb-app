<?php

namespace App\Repositories\Student;

interface SchoolRepository
{
  public function getSchools(?string $schoolType, ?string $cityCode): array;

  public function getSchoolByCity(string $schoolType, string $cityCode): array;

  public function getSchoolByZone(): array;

  public function getBoardingSchool(): array;

  public function getDepartmentBySchool(string $schoolId): array;
}
