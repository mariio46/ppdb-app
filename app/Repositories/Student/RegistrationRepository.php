<?php

namespace App\Repositories\Student;

interface RegistrationRepository
{
  public function getSchedules(): array;

  public function getScheduleByPhaseCode(string $code): array;
}
