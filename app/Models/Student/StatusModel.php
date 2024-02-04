<?php

namespace App\Models\Student;

use App\Models\Base;

class StatusModel extends Base
{
    /**
     * @param  string  $s - date start
     * @param  string  $e - date end
     * @param  string  $p - phase number
     * @param  string  $c - track code
     * @param  string  $t - track name
     * @param  string  $ard - admission result date
     * @param  string  $sv - school verif
     * @param  string  $as - admission school
     * @param  string  $ad - admission department (if smk)
     * @param  string  $status - registered|verified|declined|accepted|completed
     */
    public function templateArray($status, $s = '2023-12-01', $e = '2023-12-15', $p = '1', $c = 'AG', $t = 'Boarding School', $ard = '2023-12-20', $sv = 'SMAN 1 Makassar', $as = null, $ad = null)
    {
        return [
            'start' => $s,
            'end' => $e,
            'phase' => $p,
            'name' => session()->get('stu_name'),
            'nisn' => session()->get('stu_nisn'),
            'code' => $c,
            'track' => $t,
            'admission_result_date' => $ard,
            'school_verif' => $sv,
            'admission_school' => $as,
            'admission_department' => $ad,
            'status' => $status,
        ];
    }

    public function getStudentStatus(string $studentId): array
    {
        $get = $this->swGetWithToken("siswa/status?id=$studentId");

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
}
