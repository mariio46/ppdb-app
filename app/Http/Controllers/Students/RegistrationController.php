<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Track;
use App\Repositories\Student\RegistrationRepository;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct(
        protected RegistrationRepository $registrationRepo,
        protected Track $track
    ) {
    }

    //------------------------------------------------------------VIEW
    public function index(): View
    {
        return view('student.registration.index');
    }

    /**
     * This page contains a list of phase tracks based on the phase code.
     */
    public function phase(string $phase, string $phase_id): View
    {
        $data = [
            'phase_id' => $phase_id,
            'phase' => $phase,
            'icon' => $this->track->getIcon(),
        ];

        return view('student.registration.phase', $data);
    }

    public function track(string $phase, string $phase_id, string $track_code): View|RedirectResponse
    {
        // $decCode = json_decode(Crypt::decryptString($code));
        // $phaseCode = Crypt::encryptString(json_encode(['phase' => $decCode->phase]));

        if (session()->get('stu_status_regis')) {
            return to_route('student.regis.phase', [$phase, $phase_id]);
        } else {
            $data = [
                // 'code' => $decCode->track,
                'track' => $track_code,
                'track_code' => $track_code,
                'phase_id' => $phase_id,
                'phase' => $phase,
            ];

            return view('student.registration.track', $data);
        }
    }

    /**
     * untuk kebutuhan data disini, data yang diperlukan adalah data tahap dan id siswa.
     * ketika halaman bukti pendaftaran di akses, maka yang diminta sebenarnya adalah data pendaftaran
     * siswa berdasarkan tahap ke berapa yang aktif.
     */
    public function proof(string $phase, string $phaseId): View
    {
        $data = [
            'phase_id' => $phaseId,
            'phase' => $phase,
            'tracks' => $this->track->getCodeName(),
            'requirement' => $this->track->getRequirements(),
        ];

        return view('student.registration.proof', $data);
    }

    public function print(string $phase, string $phase_id)
    {
        $data = $this->registrationRepo->getRegistrationDataByPhase($phase_id);
        $pdf = PDF::loadView('student.registration.print', ['data' => $data['data'], 'name_track' => $this->track->getNameByCode($data['data']['kode_jalur'])]);
        return $pdf->stream('print-pdf');
        // return view('student.registration.print', ['data' => $data['data'], 'name_track' => $this->track->getNameByCode($data['data']['kode_jalur'])]);
    }

    //------------------------------------------------------------FUNC
    public function postSchoolRegistration(string $phase, string $phaseId, string $trackCode, Request $request): RedirectResponse
    {
        // $code = Crypt::encryptString(json_encode(['phase' => $request->get('phaseCode')]));

        if (session()->get('stu_is_regis')) {
            return redirect()->to('/pendaftaran');
        } else {
            $save = $this->registrationRepo->postSaveRegistration($phase, $phaseId, $trackCode, $request);

            if ($save['statusCode'] == 201) {
                return to_route('student.regis.proof', [$phase, $phaseId])->with(['stat' => 'success', 'msg' => $save['messages']]);
            } else {
                return redirect()->back()->with(['stat' => 'error', 'msg' => 'Gagal menyimpan data.']);
            }
        }
    }

    //------------------------------------------------------------JSON
    public function getSchedules(): JsonResponse
    {
        return response()->json($this->registrationRepo->getSchedules());
    }

    public function getScheduleByPhase(string $phase): JsonResponse
    {
        $get = $this->registrationRepo->getScheduleByPhaseCode($phase);

        return response()->json($get);
    }

    public function getDataByPhase(string $phase): JsonResponse
    {
        $get = $this->registrationRepo->getRegistrationDataByPhase($phase);

        return response()->json($get);
    }
}
