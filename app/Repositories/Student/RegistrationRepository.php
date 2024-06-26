<?php

namespace App\Repositories\Student;

use Illuminate\Http\Request;

interface RegistrationRepository
{
    public function getSchedules(): array;

    public function getScheduleByPhaseCode(string $code): array;

    public function postSaveRegistration(string $phase, string $phaseId, string $track, Request $request): array;

    public function getRegistrationDataByPhase(string $phase): array;
}
