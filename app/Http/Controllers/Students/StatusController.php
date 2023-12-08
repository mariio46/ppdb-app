<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\StatusRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StatusController extends Controller
{
  public function __construct(
    private StatusRepository $statusRepository
  ) {
  }

  public function index(): Response
  {
    return response()->view('student.status.index');
  }

  public function getStatus(): JsonResponse
  {
    $get = $this->statusRepository->getStatus();
    return response()->json($get);
  }
}
