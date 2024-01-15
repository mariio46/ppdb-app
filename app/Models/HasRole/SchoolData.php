<?php

namespace App\Models\HasRole;

use App\Models\Base;

class SchoolData extends Base
{
    public function getSchool(string $school_id): array
    {
        $school = $this->getWithToken(endpoint: "sekolah/detail?id={$school_id}");

        if ($school['status_code'] == 200) {
            return $school['response'];
        } else {
            return [
                'statusCode' => $school['status_code'],
                'messages' => 'Gagal Menampilkan Data',
            ];
        }
    }
}
