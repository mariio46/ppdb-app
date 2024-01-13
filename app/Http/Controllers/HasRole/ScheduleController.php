<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Models\HasRole\Schedule;
use App\Models\Track;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    public function __construct(protected Schedule $schedule, protected Track $track)
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
            'id' => $id
        ];

        return view('has-role.schedule.edit-phase', $data);
    }

    public function editTime(string $type, string $id): View
    {
        $data = [
            'type' => $type,
            'id' => $id
        ];

        return match ($type) {
            'pengumuman' => view('has-role.schedule.edit-announce')->with($data),
            'pendaftaran', 'verifikasi', 'daftar_ulang' => view('has-role.schedule.edit-time')->with($data),
            default => redirect()->back()
        };
    }

    //------------------------------------------------------------FUNC
    public function saveData(Request $request): RedirectResponse // A.12.002
    {
        $save = $this->schedule->insertPhase($request);

        if ($save['statusCode'] == 200 || $save['statusCode'] == 201) {
            return to_route('schedules.index')->with(['msg' => 'Berhasil menambahkan data.']);
        }

        return redirect()->back()->with(['msg' => 'Gagal menyimpan data. Silakan coba lagi nanti.']);
    }

    public function removeData(Request $request): RedirectResponse // A.12.004
    {
        $remove = $this->schedule->removePhase($request->remove_id);

        if ($remove['statusCode'] == 200) {
            return to_route('schedules.index')->with(['stat' => 'success', 'msg' => $remove['messages']]);
        }

        return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Gagal menghapus data. Silakan coba lagi nanti.']);
    }

    public function updateData(string $id, Request $request): RedirectResponse // A.12.006
    {
        $update = $this->schedule->updatePhase($request, $id);

        if ($update['statusCode'] == 200) {
            return to_route('schedules.detail', $id)->with(['stat' => 'success', 'msg' => 'Berhasil menyimpan perubahan data.']);
        }

        return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Gagal menyimpan perubahan data. Silakan coba lagi nanti.']);
    }

    public function updateTime(string $type, string $id, Request $request): RedirectResponse // A.12.008
    {
        if ($type == 'pengumuman') {
            $data = [
                'tahap_id' => $id,
                'tanggal' => $request->post('date'),
                'jam_mulai' => $request->post('time'),
                'jam_selesai' => null,
                'jenis' => 'pengumuman'
            ];

            ($request->post('id') != null) ? $data['id'] = $request->post('id') : '';

            if (substr($request->time, 0, 5) != substr($request->current_time, 0, 5)) {
                $save = $this->schedule->updateTime($data);

                if ($save) {
                    $msg = ["stat" => "success", "msg" => "Berhasil menyimpan perubahan data."];
                } else {
                    $msg = ["stat" => "danger", "msg" => "Gagal menyimpan perubahan data."];
                }
            } else {
                $msg = ["stat" => "info", "msg" => "Tidak ada perubahan data."];
            }

            return redirect()->back()->with($msg);
        } else {
            $length = $request->length;
            $countSuccess = 0;
            $dateFailed = [];

            for ($i = 1; $i <= $length; $i++) {
                $data = [
                    'tahap_id'      => $id,
                    'jam_mulai'     => $request->post("s_$i"),
                    'jam_selesai'   => $request->post("e_$i"),
                    'tanggal'       => $request->post("date_$i"),
                    'jenis'         => $type,
                ];

                ($request->post("id_$i") != null) ? $data['id'] = $request->post("id_$i") : '';

                $s  = substr($request->post("s_$i"), 0, 5); // start time changes
                $cs = substr($request->post("current_s_$i"), 0, 5); // current start time
                $e  = substr($request->post("e_$i"), 0, 5); // end time changes
                $es = substr($request->post("current_e_$i"), 0, 5); // current end time

                if ($s != $cs || $e != $es) {
                    $save = $this->schedule->updateTime($data);
                    if ($save) {
                        $countSuccess++;
                    } else {
                        $dateFailed[] = date("d-m-Y", $request->post("date_$i"));
                    }
                }
            }

            $failed = (count($dateFailed) != 0) ? "data tanggal " . implode(", ", $dateFailed) : "0 data.";
            $msg = "";

            if ($countSuccess == 0 && $dateFailed == []) {
                $msg .= "Tidak ada perubahan data";
            } else {
                if ($countSuccess != 0) {
                    $msg .= "Berhasil memperbarui $countSuccess data.";
                }

                if ($dateFailed != []) {
                    $msg .= "Gagal menyimpan $failed";
                }
            }

            return redirect()->back()->with(['stat' => 'info', 'msg' => $msg]);
        }
    }

    // public function updateAnnouncement(Request $request): RedirectResponse
    // {
    //     $data = [
    //         'id' => $request->post('id'),
    //         'tanggal' => $request->post('date'),
    //         'jam_mulai' => $request->post('hour') . '.' . $request->post('minute'),
    //         'jenis' => 'pengumuman'
    //     ];

    //     dd($data);

    //     $return = [
    //         'statusCode' => 200,
    //         // 'statusCode' => 404,
    //     ];

    //     if ($return['statusCode'] == 200) {
    //         return to_route('schedules.detail', [$request->phase])->with(['stat' => 'success', 'msg' => 'Berhasil menyimpan perubahan data.']);
    //     }

    //     return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Gagal menyimpan perubahan data. Silakan coba lagi nanti.']);
    // }

    //------------------------------------------------------------JSON
    public function getDataSchedules(): JsonResponse
    {
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

    public function getDataTime(string $type, string $id): JsonResponse
    {
        $data = $this->schedule->getDetailTime($id, $type);
        return response()->json($data['response'], $data['status_code']);
    }

    // tracks
    public function getTracks(string $type): JsonResponse
    {
        return response()->json($this->track->get($type));
    }
}
