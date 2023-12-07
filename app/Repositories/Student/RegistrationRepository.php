<?php

namespace App\Repositories\Student;

use Illuminate\Http\Request;

interface RegistrationRepository
{
  public function getSchedules(): array;

  public function getScheduleByPhaseCode(string $code): array;

  public function postSaveRegistration(string $track, Request $request): array;
}
