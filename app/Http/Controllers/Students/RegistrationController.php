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

  // FUNCTIONS
  public function getSchedules(): JsonResponse
  {
    $update = $this->registrationRepo->getSchedules();
    return response()->json($update);
  }
}
