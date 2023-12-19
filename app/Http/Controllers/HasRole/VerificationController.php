<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VerificationController extends Controller
{
    public function manual(): View
    {
        return view('has-role.verifications.manual');
    }

    public function manualGetData(): JsonResponse
    {
        $data = [
            [
                'id'        => '1',
                'nama'      => 'Muhammad Al Muqtadir',
                'nisn'      => '6564553453',
                'jalur'     => 'AA',
                'status'    => 's'
            ],
            [
                'id'        => '2',
                'nama'      => 'Ryan Rafli',
                'nisn'      => '5454224678',
                'jalur'     => 'AC',
                'status'    => 'b'
            ],
            [
                'id'        => '3',
                'nama'      => 'Ainun Putri',
                'nisn'      => '10302913833',
                'jalur'     => 'AE',
                'status'    => 'b'
            ],
            [
                'id'        => '4',
                'nama'      => 'Edy Siswanto Syarif',
                'nisn'      => '43242354815',
                'jalur'     => 'AG',
                'status'    => 'b'
            ],
            [
                'id'        => '5',
                'nama'      => 'Muh Rafie Muis',
                'nisn'      => '42342356788',
                'jalur'     => 'AE',
                'status'    => 'b'
            ],
            [
                'id'        => '6',
                'nama'      => 'Vicky Giovaldi',
                'nisn'      => '8787575645',
                'jalur'     => 'AE',
                'status'    => 't'
            ],
        ];

        return response()->json($data);
    }

    public function manualDetail(string $id): View
    {
        $data = [
            'id' => $id
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
            'semester' => $semester
        ];

        return view('has-role.verifications.manual-score', $data);
    }

    public function manualMap(string $id): View
    {
        $data = [
            'id' => $id
        ];

        return view('has-role.verifications.manual-map', $data);
    }

    public function manualAcceptVerification(string $id)
    {
        return redirect()->back();
    }

    public function manualDeclineVerification(string $id, Request $request)
    {
        $reason = $request->post('declineMsg');

        return redirect()->back();
    }

    // ------------------------------------------------------------

    public function reregistration(): View
    {
        return view('has-role.verifications.reregistration');
    }
}
