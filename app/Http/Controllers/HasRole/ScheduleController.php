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
            'statusCode'    => 200,
            'status'        => 'success',
            'message'       => 'Berhasil mendapatkan data.',
            'data'          => [
                [
                    'tahap_id'              => '9ae85c84-0f44-461f-ae95-84d800c07331',
                    'tahap'                 => '1',
                    'pendaftaran_mulai'     => '2024-01-01',
                    'pendaftaran_selesai'   => '2024-01-04',
                    'verifikasi_mulai'      => '2024-01-01',
                    'verifikasi_selesai'    => '2024-01-04',
                    'pengumuman'            => '2024-01-05',
                    'daftar_ulang_mulai'    => '2024-01-05',
                    'daftar_ulang_selesai'  => '2024-01-06',
                ],
                [
                    'tahap_id'              => '55fdd760-7b58-437e-b8c1-638cbccb2a30',
                    'tahap'                 => '2',
                    'pendaftaran_mulai'     => '2024-01-08',
                    'pendaftaran_selesai'   => '2024-01-11',
                    'verifikasi_mulai'      => '2024-01-08',
                    'verifikasi_selesai'    => '2024-01-11',
                    'pengumuman'            => '2024-01-12',
                    'daftar_ulang_mulai'    => '2024-01-12',
                    'daftar_ulang_selesai'  => '2024-01-13',
                ],
                [
                    'tahap_id'              => 'f5793a90-4396-497f-af43-a7b0edd995fb',
                    'tahap'                 => '3',
                    'pendaftaran_mulai'     => '2024-01-15',
                    'pendaftaran_selesai'   => '2024-01-18',
                    'verifikasi_mulai'      => '2024-01-15',
                    'verifikasi_selesai'    => '2024-01-18',
                    'pengumuman'            => '2024-01-19',
                    'daftar_ulang_mulai'    => '2024-01-19',
                    'daftar_ulang_selesai'  => '2024-01-20',
                ],
            ]
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
            'statusCode' => 200
        ];

        if ($save['statusCode'] == 200) {
            return to_route('schedules.index')->with(['msg' => 'Berhasil menambahkan data.']);
        }
        return redirect()->back()->with(['msg' => 'Gagal menyimpan data. Silakan coba lagi nanti.']);
    }

    public function detail(string $id): View
    {
        $data = [
            'id' => $id
        ];
        return view('has-role.schedule.detail', $data);
    }

    public function removeData(): RedirectResponse
    {
        $remove = [
            'statusCode' => 200
        ];

        if ($remove['statusCode'] == 200) {
            return to_route('schedules.index')->with(['stat' => 'success', 'msg' => 'Berhasil menghapus data.']);
        }

        return redirect()->back()->with(['stat' => 'danger', 'msg' => 'Gagal menghapus data. Silakan coba lagi nanti.']);
    }
}
