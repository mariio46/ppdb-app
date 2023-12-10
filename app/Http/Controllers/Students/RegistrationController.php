<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\RegistrationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;

class RegistrationController extends Controller
{
  private $tracks = [
    'AA'  => 'Afirmasi',
    'AB'  => 'Perpindahan Tugas Orang Tua',
    'AC'  => 'Anak Guru',
    'AD'  => 'Prestasi Akademik',
    'AE'  => 'Prestasi Non Akademik',
    'AF'  => 'Zonasi',
    'AG'  => 'Boarding School',
    'KA'  => 'Afirmasi',
    'KB'  => 'Perpindahan Tugas Orang Tua',
    'KC'  => 'Anak Guru',
    'KD'  => 'Prestasi Akademik',
    'KE'  => 'Prestasi Non Akademik',
    'KF'  => 'Domisili Terdekat',
    'KG'  => 'Anak DUDI'
  ];

  public function __construct(
    protected RegistrationRepository $registrationRepo
  ) {
  }

  // --------------------------------------------------
  // VIEWS
  public function index(): Response
  {
    return response()->view('student.registration.index');
  }

  public function phase(string $code): Response
  {
    $data = [
      'phase_code'  => $code,
      'phase'       => Crypt::decryptString($code)
    ];

    return response()->view('student.registration.phase', $data);
  }

  public function track(string $code, string $phaseCode): Response
  {
    $data = [
      'code'      => $code,
      'track'     => $this->tracks[$code],
      'phaseCode' => $phaseCode,
      'phase'     => Crypt::decryptString($phaseCode)
    ];

    return response()->view('student.registration.track', $data);
  }

  public function proof(string $code): Response
  {
    $data = [
      'phaseCode' => $code,
      'phase'     => Crypt::decryptString($code)
    ];

    return response()->view('student.registration.proof', $data);
  }

  // --------------------------------------------------
  // FUNCTIONS
  public function postSchoolRegistration(string $trackCode, Request $request)
  {
    $save = $this->registrationRepo->postSaveRegistration($trackCode, $request);

    if ($save['success']) {
      $code = Crypt::encryptString($request->get('phaseCode'));
      return redirect()->to("/pendaftaran/bukti/$code");
    } else {
      return redirect()->back();
    }
  }

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

  public function getDataByPhase(string $phase)
  {
    $get = $this->registrationRepo->getRegistrationDataByPhase($phase);
    return response()->json($get);
  }
}
