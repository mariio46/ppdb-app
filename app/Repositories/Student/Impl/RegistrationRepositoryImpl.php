<?php

namespace App\Repositories\Student\Impl;

use App\Models\Student\RegistrationModel;
use App\Repositories\Student\RegistrationRepository;

class RegistrationRepositoryImpl implements RegistrationRepository
{
  public function __construct(public RegistrationModel $registrationModel)
  {
  }

  public function getSchedules(): array
  {
    $get = $this->registrationModel->getSchedules();
    return $get;
  }

  public function getScheduleByPhaseCode(string $code): array
  {
    return $this->registrationModel->getScheduleByPhaseCode($code);
  }
}
