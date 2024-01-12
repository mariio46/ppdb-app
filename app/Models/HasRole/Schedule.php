<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class Schedule extends Base
{
    //------------------------------------------------------------GET
    public function getDataSchedules(): array
    {
        return $this->getWithToken('tahap');
    }

    public function getDetailData(string $id): array
    {
        return $this->getWithToken("tahap/batas?id=$id");
    }

    public function getDataSchedule(string $id): array
    {
        return $this->getWithToken("tahap/detail?id=$id");
    }

    public function getDetailTime(string $id, string $type): array
    {
        return $this->getWithToken("batas/jenis?id=$id&tipe=$type");
    }

    //------------------------------------------------------------POST
    public function insertPhase(Request $request): array
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

    public function updatePhase(Request $request, string $id): array
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

    public function removePhase(string $id)
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

    public function updateTime(array $data): bool
    {
        $upd = $this->postWithToken("batas/create", $data);

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
