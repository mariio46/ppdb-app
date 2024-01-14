<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Models\HasRole\Schedule;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function __construct(protected Schedule $schedule)
    {
    }

    //------------------------------------------------------------VIEW
    public function index(): View
    {
        return view('has-role.schedule.index');
    }

    public function create(): View
    {
        return view('has-role.schedule.create');
    }

    public function detail(string $id): View
    {
        $data = [
            'id' => $id,
        ];

        return view('has-role.schedule.detail', $data);
    }

    public function edit(string $id): View
    {
        $data = [
            'id' => $id,
        ];

        return view('has-role.schedule.edit-phase', $data);
    }

    // registration
    public function editRegistration(string $id): View
    {
        $data = [
            'id' => $id,
        ];

        return view('has-role.schedule.edit-regis', $data);
    }

    // verification
    public function editVerification(string $id): View
    {
        $data = [
            'id' => $id,
        ];

        return view('has-role.schedule.edit-verif', $data);
    }

    // announcement
    public function editAnnouncement(string $id): View
    {
        $data = [
            'id' => $id,
        ];

        return view('has-role.schedule.edit-announce', $data);
    }

    // re registration
    public function editReRegistration(string $id): View
    {
        $data = [
            'id' => $id,
        ];

        return view('has-role.schedule.edit-reregis', $data);
    }

    //------------------------------------------------------------FUNC
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

    public function updateRegistration(Request $request): RedirectResponse
    {
        $length = $request->length;

        $data = [];

        for ($i = 1; $i <= $length; $i++) {
            $data[] = [
                'id' => $request->post('id'.$i),
                'tanggal' => $request->post('date'.$i),
                'jam_mulai' => $request->post('sH'.$i).'.'.$request->post('sM'.$i),
                'jam_selesai' => $request->post('eH'.$i).'.'.$request->post('eM'.$i),
                'jenis' => 'pendaftaran',
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

    public function updateVerification(Request $request): RedirectResponse
    {
        $length = $request->length;

        $data = [];

        for ($i = 1; $i <= $length; $i++) {
            $data[] = [
                'id' => $request->post('id'.$i),
                'tanggal' => $request->post('date'.$i),
                'jam_mulai' => $request->post('sH'.$i).'.'.$request->post('sM'.$i),
                'jam_selesai' => $request->post('eH'.$i).'.'.$request->post('eM'.$i),
                'jenis' => 'verifikasi',
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

    public function updateAnnouncement(Request $request): RedirectResponse
    {
        $data = [
            'id' => $request->post('id'),
            'tanggal' => $request->post('date'),
            'jam_mulai' => $request->post('hour').'.'.$request->post('minute'),
            'jenis' => 'pengumuman',
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

    public function updateReRegistration(Request $request): RedirectResponse
    {
        $length = $request->length;

        $data = [];

        for ($i = 1; $i <= $length; $i++) {
            $data[] = [
                'id' => $request->post('id'.$i),
                'tanggal' => $request->post('date'.$i),
                'jam_mulai' => $request->post('sH'.$i).'.'.$request->post('sM'.$i),
                'jam_selesai' => $request->post('eH'.$i).'.'.$request->post('eM'.$i),
                'jenis' => 'verifikasi',
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

    //------------------------------------------------------------JSON
    public function getDataSchedules(): JsonResponse
    {
        // $data = [
        //     'statusCode' => 200,
        //     'status' => 'success',
        //     'message' => 'Berhasil mendapatkan data.',
        //     'data' => [
        //         [
        //             'tahap_id' => '9ae85c84-0f44-461f-ae95-84d800c07331',
        //             'tahap' => '1',
        //             'pendaftaran_mulai' => '2024-01-01',
        //             'pendaftaran_selesai' => '2024-01-04',
        //             'verifikasi_mulai' => '2024-01-01',
        //             'verifikasi_selesai' => '2024-01-04',
        //             'pengumuman' => '2024-01-05',
        //             'daftar_ulang_mulai' => '2024-01-05',
        //             'daftar_ulang_selesai' => '2024-01-06',
        //         ],
        //         [
        //             'tahap_id' => '55fdd760-7b58-437e-b8c1-638cbccb2a30',
        //             'tahap' => '2',
        //             'pendaftaran_mulai' => '2024-01-08',
        //             'pendaftaran_selesai' => '2024-01-11',
        //             'verifikasi_mulai' => '2024-01-08',
        //             'verifikasi_selesai' => '2024-01-11',
        //             'pengumuman' => '2024-01-12',
        //             'daftar_ulang_mulai' => '2024-01-12',
        //             'daftar_ulang_selesai' => '2024-01-13',
        //         ],
        //         [
        //             'tahap_id' => 'f5793a90-4396-497f-af43-a7b0edd995fb',
        //             'tahap' => '3',
        //             'pendaftaran_mulai' => '2024-01-15',
        //             'pendaftaran_selesai' => '2024-01-18',
        //             'verifikasi_mulai' => '2024-01-15',
        //             'verifikasi_selesai' => '2024-01-18',
        //             'pengumuman' => '2024-01-19',
        //             'daftar_ulang_mulai' => '2024-01-19',
        //             'daftar_ulang_selesai' => '2024-01-20',
        //         ],
        //     ],
        // ];

        $data = $this->schedule->getDataSchedules();

        return response()->json($data['response'], $data['status_code']);
    }

    public function detailData(string $id): JsonResponse
    {
        // $data = [
        //     'statusCode' => 200,
        //     'status' => 'success',
        //     'message' => 'Berhasil mendapatkan data.',
        //     'data' => [
        //         'tahap_id' => '9ae85c84-0f44-461f-ae95-84d800c07331',
        //         'tahap' => '1',
        //         'pendaftaran_mulai' => '2024-01-01',
        //         'pendaftaran_selesai' => '2024-01-04',
        //         'pendaftaran_batas' => [
        //             [
        //                 'batas_id' => '1',
        //                 'tanggal' => '2024-01-01',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'pendaftaran'
        //             ],
        //             [
        //                 'batas_id' => '2',
        //                 'tanggal' => '2024-01-02',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'pendaftaran'
        //             ],
        //             [
        //                 'batas_id' => '3',
        //                 'tanggal' => '2024-01-03',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'pendaftaran'
        //             ],
        //             [
        //                 'batas_id' => '4',
        //                 'tanggal' => '2024-01-04',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '12.00',
        //                 'jenis' => 'pendaftaran'
        //             ],
        //         ],
        //         'verifikasi_mulai' => '2024-01-01',
        //         'verifikasi_selesai' => '2024-01-04',
        //         'verifikasi_batas' => [
        //             [
        //                 'batas_id' => '1',
        //                 'tanggal' => '2024-01-01',
        //                 'jam_mulai' => '09.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'verifikasi'
        //             ],
        //             [
        //                 'batas_id' => '2',
        //                 'tanggal' => '2024-01-02',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'verifikasi'
        //             ],
        //             [
        //                 'batas_id' => '3',
        //                 'tanggal' => '2024-01-03',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'verifikasi'
        //             ],
        //             [
        //                 'batas_id' => '4',
        //                 'tanggal' => '2024-01-04',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '17.00',
        //                 'jenis' => 'verifikasi'
        //             ],
        //         ],
        //         'pengumuman' => '2024-01-05',
        //         'pengumuman_batas_id' => '5',
        //         'pengumuman_jam_mulai' => '09.00',
        //         'daftar_ulang_mulai' => '2024-01-05',
        //         'daftar_ulang_selesai' => '2024-01-06',
        //         'daftar_ulang_batas' => [
        //             [
        //                 'batas_id' => '1',
        //                 'tanggal' => '2024-01-05',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'daftar ulang'
        //             ],
        //             [
        //                 'batas_id' => '2',
        //                 'tanggal' => '2024-01-06',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'daftar ulang'
        //             ],
        //         ]
        //     ]
        // ];

        $data = $this->schedule->getDetailData($id);

        return response()->json($data['response'], $data['status_code']);
    }

    public function getDataSchedule(string $id): JsonResponse
    {
        // $data = [
        //     "statusCode" => 200,
        //     "status" => "success",
        //     "message" => "Berhasil mendapatkan data.",
        //     "data" => [
        //         "tahap_id" => "9ae85c84-0f44-461f-ae95-84d800c07331",
        //         "tahap" => "1",
        //         "pendaftaran_mulai" => "2024-01-01",
        //         "pendaftaran_selesai" => "2024-01-04",
        //         "verifikasi_mulai" => "2024-01-01",
        //         "verifikasi_selesai" => "2024-01-04",
        //         "pengumuman" => "2024-01-05",
        //         "daftar_ulang_mulai" => "2024-01-05",
        //         "daftar_ulang_selesai" => "2024-01-06",
        //         "sma" => [
        //             [
        //                 "kode_jalur" => "AG",
        //                 "nama_jalur" => "Boarding School"
        //             ],
        //         ],
        //         "smk" => [
        //             [
        //                 "kode_jalur" => "KA",
        //                 "nama_jalur" => "Afirmasi"
        //             ],
        //             [
        //                 "kode_jalur" => "KB",
        //                 "nama_jalur" => "Perpindahan Tugas Orang Tua"
        //             ],
        //             [
        //                 "kode_jalur" => "KC",
        //                 "nama_jalur" => "Anak Guru"
        //             ],
        //             [
        //                 "kode_jalur" => "KF",
        //                 "nama_jalur" => "Domisili Terdekat"
        //             ],
        //             [
        //                 "kode_jalur" => "KG",
        //                 "nama_jalur" => "Anak DUDI"
        //             ],
        //         ],
        //     ]
        // ];

        $data = $this->schedule->getDataSchedule($id);

        return response()->json($data['response'], $data['status_code']);
    }

    public function getDataRegisSchedule(string $id): JsonResponse
    {
        // $data = [
        //     'statusCode' => 200,
        //     'status' => 'success',
        //     'message' => 'Berhasil mendapatkan data.',
        //     'data' => [
        //         'tahap_id' => '9ae85c84-0f44-461f-ae95-84d800c07331',
        //         'tahap' => '1',
        //         'pendaftaran_mulai' => '2024-01-01',
        //         'pendaftaran_selesai' => '2024-01-04',
        //         'batas' => [
        //             [
        //                 'batas_id' => '1',
        //                 'tanggal' => '2024-01-01',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'pendaftaran'
        //             ],
        //             [
        //                 'batas_id' => '2',
        //                 'tanggal' => '2024-01-02',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'pendaftaran'
        //             ],
        //             [
        //                 'batas_id' => '3',
        //                 'tanggal' => '2024-01-03',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'pendaftaran'
        //             ],
        //             [
        //                 'batas_id' => '4',
        //                 'tanggal' => '2024-01-04',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '12.00',
        //                 'jenis' => 'pendaftaran'
        //             ],
        //         ]
        //     ]
        // ];

        $data = $this->schedule->getDetailTime($id, 'pendaftaran');

        return response()->json($data['response'], $data['status_code']);
    }

    public function getDataVerifSchedule(string $id): JsonResponse
    {
        // $data = [
        //     'statusCode' => 200,
        //     'status' => 'success',
        //     'message' => 'Berhasil mendapatkan data.',
        //     'data' => [
        //         'tahap_id' => '9ae85c84-0f44-461f-ae95-84d800c07331',
        //         'tahap' => '1',
        //         'verifikasi_mulai' => '2024-01-01',
        //         'verifikasi_selesai' => '2024-01-04',
        //         'batas' => [
        //             [
        //                 'batas_id' => '1',
        //                 'tanggal' => '2024-01-01',
        //                 'jam_mulai' => '09.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'verifikasi'
        //             ],
        //             [
        //                 'batas_id' => '2',
        //                 'tanggal' => '2024-01-02',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'verifikasi'
        //             ],
        //             [
        //                 'batas_id' => '3',
        //                 'tanggal' => '2024-01-03',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '15.00',
        //                 'jenis' => 'verifikasi'
        //             ],
        //             [
        //                 'batas_id' => '4',
        //                 'tanggal' => '2024-01-04',
        //                 'jam_mulai' => '07.00',
        //                 'jam_selesai' => '17.00',
        //                 'jenis' => 'verifikasi'
        //             ],
        //         ]
        //     ]
        // ];
        $data = $this->schedule->getDetailTime($id, 'verifikasi');

        return response()->json($data['response'], $data['status_code']);
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
                'jam_mulai' => '09.00',
            ],
        ];

        return response()->json($data);
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
                        'jenis' => 'daftar ulang',
                    ],
                    [
                        'batas_id' => '2',
                        'tanggal' => '2024-01-06',
                        'jam_mulai' => '07.00',
                        'jam_selesai' => '15.00',
                        'jenis' => 'daftar ulang',
                    ],
                ],
            ],
        ];

        return response()->json($data);
    }

    // tracks
    public function getTracks(string $type): JsonResponse
    {
        if ($type == 'sma') {
            $data = [
                'data' => [
                    [
                        'kode_jalur' => 'AA',
                        'nama_jalur' => 'Afirmasi',
                    ],
                    [
                        'kode_jalur' => 'AB',
                        'nama_jalur' => 'Perpindahan Tugas Orang Tua',
                    ],
                    [
                        'kode_jalur' => 'AC',
                        'nama_jalur' => 'Anak Guru',
                    ],
                    [
                        'kode_jalur' => 'AD',
                        'nama_jalur' => 'Prestasi Akademik',
                    ],
                    [
                        'kode_jalur' => 'AE',
                        'nama_jalur' => 'Prestasi Non Akademik',
                    ],
                    [
                        'kode_jalur' => 'AF',
                        'nama_jalur' => 'Zonasi',
                    ],
                    [
                        'kode_jalur' => 'AG',
                        'nama_jalur' => 'Boarding School',
                    ],
                ],
            ];
        } else {
            $data = [
                'data' => [
                    [
                        'kode_jalur' => 'KA',
                        'nama_jalur' => 'Afirmasi',
                    ],
                    [
                        'kode_jalur' => 'KB',
                        'nama_jalur' => 'Perpindahan Tugas Orang Tua',
                    ],
                    [
                        'kode_jalur' => 'KC',
                        'nama_jalur' => 'Anak Guru',
                    ],
                    [
                        'kode_jalur' => 'KD',
                        'nama_jalur' => 'Prestasi Akademik',
                    ],
                    [
                        'kode_jalur' => 'KE',
                        'nama_jalur' => 'Prestasi Non Akademik',
                    ],
                    [
                        'kode_jalur' => 'KF',
                        'nama_jalur' => 'Domisili Terdekat',
                    ],
                    [
                        'kode_jalur' => 'KG',
                        'nama_jalur' => 'Anak DUDI',
                    ],
                ],
            ];
        }

        return response()->json($data);
    }
}
