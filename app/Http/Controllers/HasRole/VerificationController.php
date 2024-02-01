<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Models\HasRole\Verification;
use App\Models\Track;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VerificationController extends Controller
{
    public function __construct(
        protected Verification $verification,
        protected Track $track
    ) {
    }

    public function manual(): View
    {
        return view('has-role.verifications.manual');
    }

    public function manualDetail(string $id): View
    {
        $data = [
            'id' => $id,
            'tracks' => $this->track->getCodeName(),
        ];

        return view('has-role.verifications.manual-detail', $data);
    }

    public function manualScore(string $id, Request $request): View
    {
        $semester = $request->get('semester');

        if ($semester < 1 || $semester > 5) {
            $semester = 1;
        }

        $data = [
            'id' => $id,
            'semester' => $semester,
        ];

        return view('has-role.verifications.manual-score', $data);
    }

    public function manualMap(string $id, string $student_id): View
    {
        $data = [
            'id' => $id,
            'student_id' => $student_id,
        ];

        return view('has-role.verifications.manual-map', $data);
    }

    public function manualAchievement(string $id): View
    {
        return view('has-role.verifications.manual-achievement', [
            'id' => $id,
        ]);
    }

    //------------------------------------------------------------FUNC
    public function manualUpdateAchievement(string $registration_id, Request $request): RedirectResponse
    {
        $upd = $this->verification->updateAchievement($registration_id, $request);

        if ($upd['statusCode'] == 200 || $upd['statusCode'] == 201) {
            return to_route('verifikasi.manual.detail', [$registration_id])->with(['stat' => 'success', 'msg' => $upd['messages']]);
        } else {
            return redirect()->back()->with(['stat' => 'error', 'msg' => $upd['messages']]);
        }
    }

    public function manualUpdateScore(Request $request): RedirectResponse
    {
        $upd = $this->verification->updateScore($request);

        $stat = ($upd['statusCode'] == 200 || $upd['statusCode'] == 201) ? 'success' : 'error';

        return redirect()->back()->with(['stat' => $stat, 'msg' => $upd['messages']]);
    }

    public function manualUpdateMap(string $id, Request $request): RedirectResponse
    {
        $save = $this->verification->updateCoordinate($id, $request);

        if ($save['statusCode'] == 200 || $save['statusCode'] == 201) {
            return to_route('verifikasi.manual.detail', [$id])->with(['stat' => 'success', 'msg' => $save['messages']]);
        } else {
            return redirect()->back()->with(['stat' => 'error', 'msg' => $save['messages']]);
        }
    }

    public function manualUpdateColorBlind(string $id, Request $request): RedirectResponse
    {
        $upd = $this->verification->updateIsColorBlindOrShort(id: $id, jurusan1ok: $request->color_blind1, jurusan2ok: $request->color_blind2, jurusan3ok: $request->color_blind3);

        return redirect()->back()->with([
            'stat' => $upd['statusCode'] == 200 || $upd['statusCode'] == 201 ? 'success' : 'error',
            'msg' => $upd['messages'],
        ]);
    }

    public function manualUpdateShort(string $id, Request $request): RedirectResponse
    {
        $upd = $this->verification->updateIsColorBlindOrShort(id: $id, jurusan1ok: $request->height1, jurusan2ok: $request->height2, jurusan3ok: $request->height3);

        return redirect()->back()->with([
            'stat' => $upd['statusCode'] == 200 || $upd['statusCode'] == 201 ? 'success' : 'error',
            'msg' => $upd['messages'],
        ]);
    }

    public function manualAcceptVerification(string $id, Request $request): RedirectResponse
    {
        $acc = $this->verification->acceptRegistration($id, $request);

        $stat = ($acc['statusCode'] == 200) ? 'success' : 'error';

        return redirect()->back()->with(['stat' => $stat, 'msg' => $acc['messages']]);
    }

    public function manualDeclineVerification(string $id, Request $request): RedirectResponse
    {
        $dec = $this->verification->declineRegistration($id, $request);
        if ($dec['statusCode'] == 200 || $dec['statusCode'] == 201) {
            return to_route('verifikasi.manual')->with(['stat' => 'success', 'msg' => $dec['messages']]);
        } else {
            return redirect()->back()->with(['stat' => 'error', 'msg' => $dec['messages']]);
        }
    }

    //------------------------------------------------------------JSON
    public function manualGetData(): JsonResponse
    {
        $data = $this->verification->getAll(session()->get('sekolah_id'));

        return response()->json($data);
    }

    public function manualGetDetailData(string $id): JsonResponse
    {
        $get = $this->verification->getSingle($id);

        return response()->json($get);
    }

    public function getTimeVerification(): JsonResponse
    {
        return response()->json($this->verification->getTimeVerification());
    }

    public function getCoordinate(string $student_id): JsonResponse
    {
        $result = $this->verification->getCoordinate($student_id);

        $data = [
            'statusCode' => $result['statusCode'],
            'status' => $result['status'],
            'messages' => $result['messages'],
            'data' => [
                'lintang' => $result['data']['lintang'] ?? null,
                'bujur' => $result['data']['bujur'] ?? null,
            ],
        ];

        return response()->json($data);
    }
}
