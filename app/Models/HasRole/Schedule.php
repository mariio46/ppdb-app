<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class Schedule extends Base
{
    //------------------------------------------------------------GET
    public function getDataSchedules(): array // A.12.001
    {
        return $this->getWithToken('tahap');
    }

    public function getDetailData(string $id): array // A.12.003
    {
        return $this->getWithToken("tahap/batas?id=$id");
    }

    public function getDataSchedule(string $id): array // A.12.005
    {
        return $this->getWithToken("tahap/detail?id=$id");
    }

    public function getDetailTime(string $id, string $type): array // A.12.007
    {
        return $this->getWithToken("batas/jenis?id=$id&tipe=$type");
    }

    //------------------------------------------------------------POST
    public function insertPhase(Request $request): array // A.12.002
    {
        $data = [
            "tahap" => $request->phase,
            "pendaftaran_mulai" => $request->regis_start,
            "pendaftaran_selesai" => $request->regis_end,
            "verifikasi_mulai" => $request->verif_start,
            "verifikasi_selesai" => $request->verif_end,
            "pengumuman" => $request->announcement,
            "daftar_ulang_mulai" => $request->re_regis_start,
            "daftar_ulang_selesai" => $request->re_regis_end,
            "sma" => $request->sma,
            "smk" => $request->smk
        ];

        $save = $this->postWithToken("tahap/create", $data);

        if ($save["status_code"] == 201 || $save['status_code'] == 200) {
            return $save['response'];
        } else {
            return [
                'statusCode' => $save['status_code'],
                'messages' => 'Gagal menyimpan data.',
                'data' => [],
            ];
        }
    }

    public function updatePhase(Request $request, string $id): array // A.12.006
    {
        $data = [
            "tahap_id" => $id,
            "pendaftaran_mulai" =>  $request->regisStart,
            "pendaftaran_selesai" =>  $request->regisEnd,
            "verifikasi_mulai"  =>  $request->verifStart,
            "verifikasi_selesai"  =>  $request->verifEnd,
            "pengumuman"  =>  $request->announcement,
            "daftar_ulang_mulai"  =>  $request->reRegisStart,
            "daftar_ulang_selesai"  =>  $request->reRegisEnd,
            "sma" => $request->post('sma'),
            "smk" => $request->post('smk')
        ];

        $upd = $this->postWithToken('tahap/update', $data);

        if ($upd['status_code'] == 200) {
            return $upd['response'];
        } else {
            return [
                'statusCode' => $upd['status_code'],
                'messages' => 'Gagal mendapatkan data.',
                'data' => [],
            ];
        }
    }

    public function removePhase(string $id) // A.12.004
    {
        $del = $this->postWithToken("tahap/hapus", [
            "id" => $id
        ]);

        if ($del['status_code'] == 200) {
            return $del['response'];
        } else {
            return [
                'statusCode' => $del['status_code'],
                'messages' => 'Gagal menghapus data.',
                'data' => [],
            ];
        }
    }

    public function updateTime(array $data): bool // A.12.008
    {
        $upd = $this->postWithToken("batas/create", $data);
        // dd($upd);

        if ($upd['status_code'] == 200 || $upd['status_code'] == 201) {
            if ($upd['response']['statusCode'] == 200 || $upd['response']['statusCode'] == 201) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
