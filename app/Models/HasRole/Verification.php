<?php

namespace App\Models\HasRole;

use App\Models\Base;

class Verification extends Base
{
    public function getAll(string $school_id): array
    {
        $get = $this->getWithToken("pendaftaran/sekolah/verif?sekolah_verif=$school_id");
        if ($get['status_code'] == 200) {
            return $get['response'];
        } else {
            return [
                "statusCode" => $get["status_code"],
                "status" => "failed",
                "messages" => "Terjadi kesalahan. Gagal mendapatkan data.",
                "data" => []
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
                "statusCode" => $get["status_code"],
                "status" => "failed",
                "messages" => "Terjadi kesalahan. Gagal mendapatkan data.",
                "data" => []
            ];
        }
    }
}
