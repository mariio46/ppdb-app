<?php

namespace App\Models\Student;

class StatusModel
{
  /**
   * @param string $s - date start
   * @param string $e - date end
   * @param string $p - phase number
   * @param string $c - track code
   * @param string $t - track name
   * @param string $ard - admission result date
   * @param string $sv - school verif
   * @param string $as - admission school
   * @param string $ad - admission department (if smk)
   * @param string $status - registered|verified|declined|accepted|completed
   */
  public function templateArray($status, $s = '2023-12-01', $e = '2023-12-15', $p = '1', $c = 'AG', $t = "Boarding School", $ard = '2023-12-20', $sv = 'SMAN 1 Makassar', $as = null, $ad = null)
  {
    return [
      'start'                 => $s,
      'end'                   => $e,
      'phase'                 => $p,
      'name'                  => session()->get('stu_name'),
      'nisn'                  => session()->get('stu_nisn'),
      'code'                  => $c,
      'track'                 => $t,
      'admission_result_date' => $ard,
      'school_verif'          => $sv,
      'admission_school'      => $as,
      'admission_department'  => $ad,
      'status'                => $status
    ];
  }

  public function getStudentStatus(string $studentId): array
  {
    $phase1 = $this->templateArray(s: "2023-11-15", e: "2023-11-30", status: 'declined');
    $phase2 = $this->templateArray(p: '2', status: 'registered');
    $phase3 = $this->templateArray(p: '3', status: '', s: "2023-12-15", e: "2023-12-31");

    return [
      $phase1,
      $phase2,
      $phase3,
    ];
  }
}
