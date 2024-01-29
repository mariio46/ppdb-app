<?php

namespace App\Models\Student;

use App\Models\Base;

class RegistrationModel extends Base
{
    /**
     * private $code = [
     *  'AA'  => 'sma afirmasi',
     *  'AB'  => 'sma mutasi / perpindahan tugas orang tua',
     *  'AC'  => 'sma anak guru',
     *  'AD'  => 'sma prestasi akademik',
     *  'AE'  => 'sma prestasi non akademik',
     *  'AF'  => 'sma zonasi',
     *  'AG'  => 'sma boarding school',
     *
     *  'KA'  => 'smk afirmasi',
     *  'KB'  => 'smk mutasi / perpindahan tugas orang tua',
     *  'KC'  => 'smk anak guru',
     *  'KD'  => 'smk prestasi akademik',
     *  'KE'  => 'smk prestasi non akademik',
     *  'KF'  => 'smk domisili',
     *  'KG'  => 'smk anak dudi'
     * ]; */
    // ------------------------------------------------------------------

    // 02.002
    public function getSchedules(): array
    {
        $get = $this->swGetWithToken('tahap/schedule');
        return $this->serverResponseWithGetMethod($get);
    }

    public function getScheduleByPhaseCode(string $phase): array
    {
        $get = $this->swGetWithToken("tahap/schedule/byid?tahap=$phase");
        return $this->serverResponseWithGetMethod($get);
    }

    public function getRegistrationDataByPhase(string $student_id, string $phase): array
    {
        $get = $this->swGetWithToken("pendaftaran/get?siswa_id=$student_id&tahap_id=$phase");
        return $this->serverResponseWithGetMethod($get);
    }

    public function saveRegistration(array $data): array
    {
        $register = $this->swPostWithToken('pendaftaran/siswa', $data);
        return $this->serverResponseWithPostMethod($register);
    }
}
