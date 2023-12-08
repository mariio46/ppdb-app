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
    $accepted = $this->templateArray(p: '4', c: 'KA', t: 'Afirmasi', as: 'SMKN 1 Sukamaju', ad: 'Pariwisata', status: 'accepted');
    $registered = $this->templateArray(status: 'registered');
    $verified = $this->templateArray(p: '2', status: 'verified');
    $declined = $this->templateArray(p: '3', status: 'declined');
    $completed = $this->templateArray(p: '5', c: 'KA', t: 'Afirmasi', as: 'SMKN 1 Sukamaju', ad: 'Pariwisata', status: 'completed');

    return [
      $registered,
      $verified,
      $declined,
      $accepted,
      $completed
    ];
  }
}
