<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class Schedule extends Base
{
    //------------------------------------------------------------GET
    public function getDataSchedules(): array // A.12.001
    {
        return $this->serverResponseWithGetMethod($this->getWithToken('tahap'));
    }

    public function getDetailData(string $id): array // A.12.003
    {
        $get = $this->getWithToken("tahap/batas?id=$id");
        return $this->serverResponseWithGetMethod($get);
    }

    public function getDataSchedule(string $id): array // A.12.005
    {
        $get = $this->getWithToken("tahap/detail?id=$id");
        return $this->serverResponseWithGetMethod($get);
    }

    public function getDetailTime(string $id, string $type): array // A.12.007
    {
        $get = $this->getWithToken("batas/jenis?id=$id&tipe=$type");
        return $this->serverResponseWithGetMethod($get);
    }

    //------------------------------------------------------------POST
    public function insertPhase(Request $request): array // A.12.002
    {
        $data = [
            'tahap' => $request->phase,
            'pendaftaran_mulai' => $request->regis_start,
            'pendaftaran_selesai' => $request->regis_end,
            'verifikasi_mulai' => $request->verif_start,
            'verifikasi_selesai' => $request->verif_end,
            'pengumuman' => $request->announcement,
            'daftar_ulang_mulai' => $request->re_regis_start,
            'daftar_ulang_selesai' => $request->re_regis_end,
            'sma' => $request->sma ?? [],
            'smk' => $request->smk ?? [],
        ];

        $save = $this->postWithToken('tahap/create', $data);
        return $this->serverResponseWithPostMethod($save);
    }

    public function updatePhase(Request $request, string $id): array // A.12.006
    {
        $data = [
            'tahap_id' => $id,
            'pendaftaran_mulai' => $request->regisStart,
            'pendaftaran_selesai' => $request->regisEnd,
            'verifikasi_mulai' => $request->verifStart,
            'verifikasi_selesai' => $request->verifEnd,
            'pengumuman' => $request->announcement,
            'daftar_ulang_mulai' => $request->reRegisStart,
            'daftar_ulang_selesai' => $request->reRegisEnd,
            'sma' => $request->sma ?? [],
            'smk' => $request->smk ?? [],
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
        $del = $this->postWithToken('tahap/hapus', [
            'id' => $id,
        ]);

        return $this->serverResponseWithPostMethod($del);
    }

    public function updateTime(array $data): bool // A.12.008
    {
        $upd = $this->postWithToken('batas/create', $data);

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
