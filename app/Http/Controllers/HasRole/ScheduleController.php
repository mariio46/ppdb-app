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
            'id' => $id,
        ];

        return view('has-role.schedule.edit-phase', $data);
    }

    public function editTime(string $type, string $id): View
    {
        $data = [
            'type' => $type,
            'id' => $id,
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
            return to_route('schedules.index')->with(['stat' => 'success', 'msg' => $save['messages']]);
        }

        return redirect()->back()->with(['stat' => 'error', 'msg' => $save['messages']]);
    }

    public function removeData(Request $request): RedirectResponse // A.12.004
    {
        $remove = $this->schedule->removePhase($request->remove_id);

        if ($remove['statusCode'] == 200) {
            return to_route('schedules.index')->with(['stat' => 'success', 'msg' => $remove['messages']]);
        }

        return redirect()->back()->with(['stat' => 'error', 'msg' => 'Gagal menghapus data. Silakan coba lagi nanti.']);
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
                'tahap_id'      => $id,
                'tanggal'       => $request->post('date'),
                'jam_mulai'     => $request->post('time'),
                'jam_selesai'   => null,
                'jenis'         => 'pengumuman',
            ];

            ($request->post('id') != null) ? $data['id'] = $request->post('id') : '';

            if (substr($request->time, 0, 5) != substr($request->current_time, 0, 5)) {
                $save = $this->schedule->updateTime($data);

                if ($save) {
                    $msg = ['stat' => 'success', 'msg' => 'Berhasil menyimpan perubahan data.'];
                } else {
                    $msg = ['stat' => 'error', 'msg' => 'Gagal menyimpan perubahan data.'];
                }
            } else {
                $msg = ['stat' => 'info', 'msg' => 'Tidak ada perubahan data.'];
            }

            return redirect()->back()->with($msg);
        } else {
            $length = $request->length;
            $countSuccess = 0;
            $dateFailed = [];

            for ($i = 1; $i <= $length; $i++) {
                $data = [
                    'tahap_id' => $id,
                    'jam_mulai' => $request->post("s_$i"),
                    'jam_selesai' => $request->post("e_$i"),
                    'tanggal' => $request->post("date_$i"),
                    'jenis' => $type,
                ];

                ($request->post("id_$i") != null) ? $data['id'] = $request->post("id_$i") : '';

                $s = substr($request->post("s_$i"), 0, 5); // start time changes
                $cs = substr($request->post("current_s_$i"), 0, 5); // current start time
                $e = substr($request->post("e_$i"), 0, 5); // end time changes
                $es = substr($request->post("current_e_$i"), 0, 5); // current end time

                if ($s != $cs || $e != $es) {
                    $save = $this->schedule->updateTime($data);
                    if ($save) {
                        $countSuccess++;
                    } else {
                        $dateFailed[] = date('d-m-Y', $request->post("date_$i"));
                    }
                }
            }

            $failed = (count($dateFailed) != 0) ? 'data tanggal ' . implode(', ', $dateFailed) : '0 data.';
            $msg = '';

            if ($countSuccess == 0 && $dateFailed == []) {
                $msg .= 'Tidak ada perubahan data';
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

    //------------------------------------------------------------JSON
    public function getDataSchedules(): JsonResponse
    {
        $data = $this->schedule->getDataSchedules();
        return response()->json($data);
    }

    public function detailData(string $id): JsonResponse
    {
        $data = $this->schedule->getDetailData($id);
        return response()->json($data);
    }

    public function getDataSchedule(string $id): JsonResponse
    {
        $data = $this->schedule->getDataSchedule($id);
        return response()->json($data);
    }

    public function getDataTime(string $type, string $id): JsonResponse
    {
        $data = $this->schedule->getDetailTime($id, $type);
        return response()->json($data);
    }

    //------------------------------------------------------------TRACKS
    public function getTracks(string $type): JsonResponse
    {
        return response()->json($this->track->get($type));
    }
}
