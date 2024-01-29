<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class Verification extends Base
{
    public function getAll(string $school_id): array
    {
        $get = $this->getWithToken("pendaftaran/sekolah/verif?sekolah_verif=$school_id");
        if ($get['status_code'] == 200) {
            return $get['response'];
        } else {
            return [
                'statusCode' => $get['status_code'],
                'status' => 'failed',
                'messages' => 'Terjadi kesalahan. Gagal mendapatkan data.',
                'data' => [],
            ];
        }
    }

    public function getSingle(string $registration_id): array
    {
        $get = $this->getWithToken("pendaftaran/manual/verif?pendaftaran_id=$registration_id");

        if ($get['status_code'] == 200) {
            return $get['response'];
        } else {
            return [
                'statusCode' => $get['status_code'],
                'status' => 'failed',
                'messages' => 'Terjadi kesalahan. Gagal mendapatkan data.',
                'data' => [],
            ];
        }
    }

    public function getTimeVerification(): array
    {
        $get = $this->getWithToken("batas/jadwal/verifikasi");
        return $this->serverResponseWithGetMethod($get);
    }

    public function getCoordinate(string $student_id): array
    {
        $get = $this->getWithToken("siswa/byid?id=$student_id");
        return $this->serverResponseWithGetMethod($get);
    }

    //------------------------------------------------------------POST
    public function updateAchievement(string $registration_id, Request $request): array
    {
        $data = [
            'pendaftaran_id' => $registration_id,
            'prestasi_jenis' => $request->prestasi_jenis,
            'prestasi_tingkat' => $request->prestasi_tingkat,
            'prestasi_juara' => $request->prestasi_juara,
            'prestasi_nama' => $request->prestasi_nama,
            'bobot' => $request->bobot,
        ];

        $upd = $this->postWithToken('pendaftaran/update/prestasi', $data);

        if ($upd['status_code'] == 200 || $upd['status_code'] == 201) {
            return $upd['response'];
        } else {
            return [
                'statusCode' => $upd['status_code'],
                'status' => 'failed',
                'messages' => 'Terjadi kesalahan. Gagal menyimpan data.',
                'data' => [],
            ];
        }
    }

    public function updateScore(Request $request): array
    {
        $data = [
            'id' => $request->student_id,
            'sm' . $request->semester . '_mtk' => $request->mtk,
            'sm' . $request->semester . '_ipa' => $request->ipa,
            'sm' . $request->semester . '_ips' => $request->ips,
            'sm' . $request->semester . '_bid' => $request->bid,
            'sm' . $request->semester . '_big' => $request->big,
        ];

        $upd = $this->postWithToken('siswa/nilai/update', $data);

        if ($upd['status_code'] == 200 || $upd['status_code'] == 201) {
            return $upd['response'];
        } else {
            return [
                'statusCode' => $upd['status_code'],
                'status' => 'failed',
                'messages' => 'Terjadi kesalahan.',
                'data' => [],
            ];
        }
    }

    public function updateCoordinate(string $id, Request $request): array
    {
        $data = [
            'pendaftaran_id' => $id,
            'lintang' => $request->lintang,
            'bujur' => $request->bujur,
        ];

        $upd = $this->postWithToken('pendaftaran/update/titik/siswa', $data);

        if ($upd['status_code'] == 200 || $upd['status_code'] == 201) {
            return $upd['response'];
        } else {
            return [
                'statusCode' => $upd['status_code'],
                'status' => 'failed',
                'messages' => 'Terjadi kesalahan.',
                'data' => [],
            ];
        }
    }

    public function updateIsColorBlindOrShort(string $id, ?string $jurusan1ok, ?string $jurusan2ok, ?string $jurusan3ok): array
    {
        $data = [
            "jurusan1_ok"       => $jurusan1ok,
            "jurusan2_ok"       => $jurusan2ok,
            "jurusan3_ok"       => $jurusan3ok,
            "pendaftaran_id"    => $id
        ];
        $upd = $this->postWithToken('pendaftaran/update/bwtb', $data);
        return $this->serverResponseWithPostMethod($upd);
    }

    public function acceptRegistration(string $registration_id, Request $request): array
    {
        $data = [
            'rerata_rapor' => $request->avg_total,
            'rerata_mtk' => $request->avg_mtk,
            'rerata_ipa' => $request->avg_ipa,
            'rerata_ips' => $request->avg_ips,
            'rerata_bid' => $request->avg_bid,
            'rerata_big' => $request->avg_big,
            'pendaftaran_id' => $registration_id,
            'operator_verifikasi' => session()->get('id'),
        ];

        $acc = $this->postWithToken('pendaftaran/update/verifikasi', $data);

        if ($acc['status_code'] == 200) {
            return $acc['response'];
        } else {
            return [
                'statusCode' => $acc['status_code'],
                'status' => 'failed',
                'messages' => 'Terjadi kesalahan. Gagal memverifikasi data.',
                'data' => [],
            ];
        }
    }

    public function declineRegistration(string $registration_id, Request $request): array
    {
        $data = [
            'pendaftaran_id' => $registration_id,
            'operator_verifikasi' => session()->get('id'),
            'alasan_tolak' => $request->declineMsg,
        ];

        $dec = $this->postWithToken('pendaftaran/update/tolak', $data);
        return $this->serverResponseWithPostMethod($dec);
    }
}
