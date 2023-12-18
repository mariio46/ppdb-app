<?php

namespace App\Models\Student;

class LoginModel extends BaseModel
{
  public function login(string $nisn, string $password): array
  {
    $data = $this->postWoToken('siswa/login', ['nisn' => $nisn, 'kata_sandi' => $password, 'waktu' => 15]);

    // if ($nisn == '0123456789' && $password == 'sayang') {
    //   $data = [
    //     "status"      => "success",
    //     "statusCode"  => 200,
    //     "messages"    => "success",
    //     "data"        => [
    //       "id"                  => "7fc3c71c-1617-4b99-8e7c-790670f0ea06",
    //       "nama"                => "humaerah",
    //       "nisn"                => "115213621",
    //       "sekolah_asal"        => "SMP 1 Pinrang",
    //       "jenis_kelamin"       => "p",
    //       "pasfoto"             => "https://ppdbv2.infaltech.com/",
    //       "status_pendaftaran"  => "belum_mendaftar",
    //       "kunci"               => "0",
    //       "token"               => "ODFmNjdhNTQ2NTc0MWY0MTI3ODA0Yjk2MjY0NjlkNDAzZjNkODRmYTE3MDI3Mzk0MTE="
    //     ]
    //   ];
    // } else if ($nisn == '0123456789' && $password == 'server') {
    //   $data = ["code" => 500, "msg" => "server error", "data" => []];
    // } else {
    //   $data = ["code" => 401, "msg" => "login failed", "data" => []];
    // }

    if ($data['status_code'] != 200) {
      $response = ['statusCode' => $data['status_code'], "msg" => 'error', "data" => []];
    } else {
      $response = $data['response'];
    }

    return $response;
  }
}
