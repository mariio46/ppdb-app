<?php

namespace App\Repositories\Student\Impl;

use App\Models\Student\LoginModel;
use App\Repositories\Student\LoginRepository;
use Illuminate\Support\Collection;

class LoginRepositoryImpl implements LoginRepository
{
  public function __construct(protected LoginModel $loginModel)
  {
  }

  public function doLogin(string $nisn, string $password): Collection
  {
    $result = [];

    $authenticate = $this->loginModel->login($nisn, $password);

    if ($authenticate['statusCode'] == 200) {
      // session()->put([
      //   'stu_id'            => data_get($authenticate, 'data.id'),
      //   'stu_name'          => data_get($authenticate, 'data.nama'),
      //   'stu_nisn'          => data_get($authenticate, 'data.nisn'),
      //   'stu_school'        => data_get($authenticate, 'data.sekolah_asal'),
      //   'stu_gender'        => data_get($authenticate, 'data.jenis_kelamin'),
      //   'stu_profile_img'   => data_get($authenticate, 'data.pasfoto'),
      //   'stu_token'         => data_get($authenticate, 'data.token'),
      //   'stu_status_regis'  => data_get($authenticate, 'data.status_pendaftaran' == 'belum_mendaftar' ? false : true),
      //   'stu_is_locked'     => data_get($authenticate, 'data.kunci' == '0' ? false : true),
      //   'is_login'          => true
      // ]);

      session()->put([
        'stu_id'          => $authenticate['data']['id'],
        'stu_name'        => $authenticate['data']['nama'],
        'stu_nisn'        => $authenticate['data']['nisn'],
        'stu_school'      => $authenticate['data']['sekolah_asal'],
        'stu_gender'      => $authenticate['data']['jenis_kelamin'],
        'stu_profile_img' => $authenticate['data']['pasfoto'],
        'stu_token'       => $authenticate['data']['token'],
        'stu_is_regis'    => $authenticate['data']['status_pendaftaran'] == 'belum_mendaftar' ? false : true,
        'stu_is_locked'   => $authenticate['data']['kunci'] == '0' ? false : true,
        'is_login'        => true
      ]);

      $result = ['success' => true, 'code' => 200, 'message' => "login berhasil."];
    } else {
      if ($authenticate['statusCode'] == 401) {
        $result = ['success' => false, 'code' => 401, 'message' => "NISN atau kata sandi salah."];
      } else {
        $result = ['success' => false, 'code' => 500, 'message' => "Oops, Server sibuk. Coba lagi nanti."];
      }
    }

    // dd($authenticate);

    return collect($result);
  }
}
