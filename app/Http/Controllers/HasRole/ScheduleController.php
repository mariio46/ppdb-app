<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function index(): View
    {
        return view('has-role.schedule.index');
    }

    public function getDataSchedules(): JsonResponse
    {
        $data = [
            'statusCode' => 200,
            'status' => 'success',
            'message' => 'Berhasil mendapatkan data.',
            'data' => [
                [
                    'tahap_id' => '9ae85c84-0f44-461f-ae95-84d800c07331',
                    'tahap' => '1',
                    'pendaftaran_mulai' => '2024-01-01',
                    'pendaftaran_selesai' => '2024-01-04',
                    'verifikasi_mulai' => '2024-01-01',
                    'verifikasi_selesai' => '2024-01-04',
                    'pengumuman' => '2024-01-05',
                    'daftar_ulang_mulai' => '2024-01-05',
                    'daftar_ulang_selesai' => '2024-01-06',
                ],
                [
                    'tahap_id' => '55fdd760-7b58-437e-b8c1-638cbccb2a30',
                    'tahap' => '2',
                    'pendaftaran_mulai' => '2024-01-08',
                    'pendaftaran_selesai' => '2024-01-11',
                    'verifikasi_mulai' => '2024-01-08',
                    'verifikasi_selesai' => '2024-01-11',
                    'pengumuman' => '2024-01-12',
                    'daftar_ulang_mulai' => '2024-01-12',
                    'daftar_ulang_selesai' => '2024-01-13',
                ],
                [
                    'tahap_id' => 'f5793a90-4396-497f-af43-a7b0edd995fb',
                    'tahap' => '3',
                    'pendaftaran_mulai' => '2024-01-15',
                    'pendaftaran_selesai' => '2024-01-18',
                    'verifikasi_mulai' => '2024-01-15',
                    'verifikasi_selesai' => '2024-01-18',
                    'pengumuman' => '2024-01-19',
                    'daftar_ulang_mulai' => '2024-01-19',
                    'daftar_ulang_selesai' => '2024-01-20',
                ],
            ],
        ];

        return response()->json($data);
    }

    public function create(): View
    {
        return view('has-role.schedule.create');
    }

    public function saveData(Request $request): RedirectResponse
    {
        $save = [
            'statusCode' => 200,
        ];

        if ($save['statusCode'] == 200) {
            return to_route('schedules.index')->with(['msg' => 'Berhasil menambahkan data.']);
        }

        return redirect()->back()->with(['msg' => 'Gagal menyimpan data. Silakan coba lagi nanti.']);
    }

    public function detail(string $id): View
    {
        $data = [
            'id' => $id,
        ];

        return view('has-role.schedule.detail', $data);
    }

    public function removeData(): RedirectResponse
    {
        $remove = [
            'statusCode' => 200,
        ];

        if ($remove['statusCode'] == 200) {
            return to_route('schedules.index')->with(['stat' => 'success', 'msg' => 'Berhasil menghapus data.']);
        }

        return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Gagal menghapus data. Silakan coba lagi nanti.']);
    }

    public function edit(string $id): View
    {
        $data = [
            'id' => $id
        ];

        return view('has-role.schedule.edit-phase', $data);
    }

    public function getDataSchedule(string $id): JsonResponse
    {
        $data = [
            'statusCode' => 200,
            'status' => 'success',
            'message' => 'Berhasil mendapatkan data.',
            'data' => [
                'tahap_id' => '9ae85c84-0f44-461f-ae95-84d800c07331',
                'tahap' => '1',
                'pendaftaran_mulai' => '2024-01-01',
                'pendaftaran_selesai' => '2024-01-04',
                'verifikasi_mulai' => '2024-01-01',
                'verifikasi_selesai' => '2024-01-04',
                'pengumuman' => '2024-01-05',
                'daftar_ulang_mulai' => '2024-01-05',
                'daftar_ulang_selesai' => '2024-01-06',
            ]
        ];

        return response()->json($data);
    }

    public function updateData(Request $request): RedirectResponse
    {
        $remove = [
            'statusCode' => 200,
            // 'statusCode' => 404,
        ];

        if ($remove['statusCode'] == 200) {
            return to_route('schedules.detail', [$request->phase])->with(['stat' => 'success', 'msg' => 'Berhasil menyimpan perubahan data.']);
        }

        return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Gagal menyimpan perubahan data. Silakan coba lagi nanti.']);
    }

    // registration
    public function editRegistration(string $id): View
    {
        $data = [
            'id' => $id
        ];

        return view('has-role.schedule.edit-regis', $data);
    }

    public function getDataRegisSchedule(string $id): JsonResponse
    {
        $data = [
            'statusCode' => 200,
            'status' => 'success',
            'message' => 'Berhasil mendapatkan data.',
            'data' => [
                'tahap_id' => '9ae85c84-0f44-461f-ae95-84d800c07331',
                'tahap' => '1',
                'pendaftaran_mulai' => '2024-01-01',
                'pendaftaran_selesai' => '2024-01-04',
                'batas' => [
                    [
                        'batas_id' => '1',
                        'tanggal' => '2024-01-01',
                        'jam_mulai' => '07.00',
                        'jam_selesai' => '15.00',
                        'jenis' => 'pendaftaran'
                    ],
                    [
                        'batas_id' => '2',
                        'tanggal' => '2024-01-02',
                        'jam_mulai' => '07.00',
                        'jam_selesai' => '15.00',
                        'jenis' => 'pendaftaran'
                    ],
                    [
                        'batas_id' => '3',
                        'tanggal' => '2024-01-03',
                        'jam_mulai' => '07.00',
                        'jam_selesai' => '15.00',
                        'jenis' => 'pendaftaran'
                    ],
                    [
                        'batas_id' => '4',
                        'tanggal' => '2024-01-04',
                        'jam_mulai' => '07.00',
                        'jam_selesai' => '12.00',
                        'jenis' => 'pendaftaran'
                    ],
                ]
            ]
        ];
        return response()->json($data);
    }

    public function updateRegistration(Request $request): RedirectResponse
    {
        $length = $request->length;

        $data = [];

        for ($i = 1; $i <= $length; $i++) {
            $data[] = [
                'id' => $request->post('id' . $i),
                'tanggal' => $request->post('date' . $i),
                'jam_mulai' => $request->post('sH' . $i) . '.' . $request->post('sM' . $i),
                'jam_selesai' => $request->post('eH' . $i) . '.' . $request->post('eM' . $i),
                'jenis' => 'pendaftaran'
            ];
        }

        $return = [
            'statusCode' => 200,
        ];

        if ($return['statusCode'] == 200) {
            return to_route('schedules.detail', [$request->phase])->with(['stat' => 'success', 'msg' => 'Berhasil menyimpan perubahan data.']);
        }

        return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Gagal menyimpan perubahan data. Silakan coba lagi nanti.']);
    }

    // verification
    public function editVerification(string $id): View
    {
        $data = [
            'id' => $id
        ];

        return view('has-role.schedule.edit-verif', $data);
    }

    public function getDataVerifSchedule(string $id): JsonResponse
    {
        $data = [
            'statusCode' => 200,
            'status' => 'success',
            'message' => 'Berhasil mendapatkan data.',
            'data' => [
                'tahap_id' => '9ae85c84-0f44-461f-ae95-84d800c07331',
                'tahap' => '1',
                'pendaftaran_mulai' => '2024-01-01',
                'pendaftaran_selesai' => '2024-01-04',
                'batas' => [
                    [
                        'batas_id' => '1',
                        'tanggal' => '2024-01-01',
                        'jam_mulai' => '09.00',
                        'jam_selesai' => '15.00',
                        'jenis' => 'pendaftaran'
                    ],
                    [
                        'batas_id' => '2',
                        'tanggal' => '2024-01-02',
                        'jam_mulai' => '07.00',
                        'jam_selesai' => '15.00',
                        'jenis' => 'pendaftaran'
                    ],
                    [
                        'batas_id' => '3',
                        'tanggal' => '2024-01-03',
                        'jam_mulai' => '07.00',
                        'jam_selesai' => '15.00',
                        'jenis' => 'pendaftaran'
                    ],
                    [
                        'batas_id' => '4',
                        'tanggal' => '2024-01-04',
                        'jam_mulai' => '07.00',
                        'jam_selesai' => '17.00',
                        'jenis' => 'pendaftaran'
                    ],
                ]
            ]
        ];
        return response()->json($data);
    }

    public function updateVerification(Request $request): RedirectResponse
    {
        $length = $request->length;

        $data = [];

        for ($i = 1; $i <= $length; $i++) {
            $data[] = [
                'id' => $request->post('id' . $i),
                'tanggal' => $request->post('date' . $i),
                'jam_mulai' => $request->post('sH' . $i) . '.' . $request->post('sM' . $i),
                'jam_selesai' => $request->post('eH' . $i) . '.' . $request->post('eM' . $i),
                'jenis' => 'verifikasi'
            ];
        }

        $return = [
            // 'statusCode' => 200,
            'statusCode' => 404,
        ];

        if ($return['statusCode'] == 200) {
            return to_route('schedules.detail', [$request->phase])->with(['stat' => 'success', 'msg' => 'Berhasil menyimpan perubahan data.']);
        }

        return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Gagal menyimpan perubahan data. Silakan coba lagi nanti.']);
    }

    // announcement
    public function editAnnouncement(string $id): View
    {
        $data = [
            'id' => $id
        ];

        return view('has-role.schedule.edit-announce', $data);
    }

    public function getDataAnnounceSchedule(string $id): JsonResponse
    {
        $data = [
            'statusCode' => 200,
            'status' => 'success',
            'message' => 'Berhasil mendapatkan data.',
            'data' => [
                'tahap_id' => '9ae85c84-0f44-461f-ae95-84d800c07331',
                'tahap' => '1',
                'pengumuman' => '2024-01-05',
                'batas_id' => '5',
                'jam_mulai' => '09.00'
            ]
        ];
        return response()->json($data);
    }

    public function updateAnnouncement(Request $request): RedirectResponse
    {
        $data = [
            'id' => $request->post('id'),
            'tanggal' => $request->post('date'),
            'jam_mulai' => $request->post('hour') . '.' . $request->post('minute'),
            'jenis' => 'pengumuman'
        ];

        $return = [
            'statusCode' => 200,
            // 'statusCode' => 404,
        ];

        if ($return['statusCode'] == 200) {
            return to_route('schedules.detail', [$request->phase])->with(['stat' => 'success', 'msg' => 'Berhasil menyimpan perubahan data.']);
        }

        return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Gagal menyimpan perubahan data. Silakan coba lagi nanti.']);
    }

    // re registration
    public function editReRegistration(string $id): View
    {
        $data = [
            'id' => $id
        ];

        return view('has-role.schedule.edit-reregis', $data);
    }

    public function getDataReRegisSchedule(string $id): JsonResponse
    {
        $data = [
            'statusCode' => 200,
            'status' => 'success',
            'message' => 'Berhasil mendapatkan data.',
            'data' => [
                'tahap_id' => '9ae85c84-0f44-461f-ae95-84d800c07331',
                'tahap' => '1',
                'daftar_ulang_mulai' => '2024-01-05',
                'daftar_ulang_selesai' => '2024-01-06',
                'batas' => [
                    [
                        'batas_id' => '1',
                        'tanggal' => '2024-01-05',
                        'jam_mulai' => '07.00',
                        'jam_selesai' => '15.00',
                        'jenis' => 'daftar ulang'
                    ],
                    [
                        'batas_id' => '2',
                        'tanggal' => '2024-01-06',
                        'jam_mulai' => '07.00',
                        'jam_selesai' => '15.00',
                        'jenis' => 'daftar ulang'
                    ],
                ]
            ]
        ];
        return response()->json($data);
    }

    public function updateReRegistration(Request $request): RedirectResponse
    {
        $length = $request->length;

        $data = [];

        for ($i = 1; $i <= $length; $i++) {
            $data[] = [
                'id' => $request->post('id' . $i),
                'tanggal' => $request->post('date' . $i),
                'jam_mulai' => $request->post('sH' . $i) . '.' . $request->post('sM' . $i),
                'jam_selesai' => $request->post('eH' . $i) . '.' . $request->post('eM' . $i),
                'jenis' => 'verifikasi'
            ];
        }

        $return = [
            'statusCode' => 200,
            // 'statusCode' => 404,
        ];

        if ($return['statusCode'] == 200) {
            return to_route('schedules.detail', [$request->phase])->with(['stat' => 'success', 'msg' => 'Berhasil menyimpan perubahan data.']);
        }

        return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Gagal menyimpan perubahan data. Silakan coba lagi nanti.']);
    }
}
