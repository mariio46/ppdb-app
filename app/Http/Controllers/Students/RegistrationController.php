<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\RegistrationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegistrationController extends Controller
{
  public function __construct(protected RegistrationRepository $registrationRepo)
  {
  }

  public function index(): Response
  {
    return response()->view('student.registration.index');
  }

  public function phase(string $code): Response
  {
    $data = [
      'phase_code' => $code
    ];

    return response()->view('student.registration.phase', $data);
  }

  // FUNCTIONS
  public function getSchedules(): JsonResponse
  {
    $get = $this->registrationRepo->getSchedules();
    return response()->json($get);
  }

  public function getScheduleByPhaseCode(string $code): JsonResponse
  {
    $get = $this->registrationRepo->getScheduleByPhaseCode($code);
    return response()->json($get);
  }
}
