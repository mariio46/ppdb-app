<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repositories\Student\RegistrationRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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

  /**
   * This page contains a list of phase tracks based on the phase code.
   */
  public function phase(string $code): Response
  {
    $data = [
      'phase_code'  => $code,
      'phase'       => json_decode(Crypt::decryptString($code))->phase
    ];

    return response()->view('student.registration.phase', $data);
  }

  public function track(string $code): Response|RedirectResponse
  {
    $decCode = json_decode(Crypt::decryptString($code));
    $phaseCode = Crypt::encryptString(json_encode(['phase' => $decCode->phase]));

    if (session()->get('stu_status_regis')) {
      return redirect()->to('/pendaftaran/tahap/' . $phaseCode);
    } else {
      $data = [
        'code'      => $decCode->track,
        'track'     => $this->tracks[$decCode->track],
        'phaseCode' => $phaseCode,
        'phase'     => $decCode->phase
      ];

      return response()->view('student.registration.track', $data);
    }
  }

  /**
   * untuk kebutuhan data disini, data yang diperlukan adalah data tahap dan id siswa.
   * ketika halaman bukti pendaftaran di akses, maka yang diminta sebenarnya adalah data pendaftaran
   * siswa berdasarkan tahap ke berapa yang aktif.
   */
  public function proof(string $phaseCode): Response
  {
    $decCode = json_decode(Crypt::decryptString($phaseCode));
    $data = [
      'phaseCode' => $phaseCode,
      'phase'     => $decCode->phase
    ];

    return response()->view('student.registration.proof', $data);
  }

  // --------------------------------------------------
  // FUNCTIONS
  public function postSchoolRegistration(string $trackCode, Request $request)
  {
    $code = Crypt::encryptString(json_encode(['phase' => $request->get('phaseCode')]));

    if (session()->get('stu_status_regis')) {
      return redirect()->to("/pendaftaran");
    } else {
      $save = $this->registrationRepo->postSaveRegistration($trackCode, $request);

      if ($save['success']) {
        return redirect()->to("/pendaftaran/bukti/$code");
      } else {
        return redirect()->back();
      }
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
