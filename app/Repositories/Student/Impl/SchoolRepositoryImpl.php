<?php

namespace App\Repositories\Student\Impl;

use App\Models\Student\SchoolModel;
use App\Repositories\Student\SchoolRepository;

class SchoolRepositoryImpl implements SchoolRepository
{
  public function __construct(public SchoolModel $schoolModel)
  {
  }

  public function getSchools(?string $schoolType, ?string $cityCode): array
  {
    return $this->schoolModel->getSchools(type: $schoolType ?? '', city: $cityCode ?? '');
  }

  public function getSchoolByCity(string $schoolType, string $cityCode): array
  {
    return $this->schoolModel->getSchoolByCity($schoolType, $cityCode);
  }

  public function getSchoolByZone(): array
  {
    return $this->schoolModel->getSchoolByZone();
  }

  public function getBoardingSchool(): array
  {
    return $this->schoolModel->getBoardingSchool();
  }

  public function getDepartmentBySchool(string $schoolId): array
  {
    return $this->schoolModel->getDepartmentBySchool($schoolId);
  }
}
