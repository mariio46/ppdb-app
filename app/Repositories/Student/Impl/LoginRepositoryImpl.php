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

    // authenticating: DUMMY DATA
    $authenticate = $this->loginModel->login($nisn, $password);

    if ($authenticate->get('code') == 200) {
      session()->put([
        'stu_name'  => $authenticate->get("data.name"),
        'stu_nisn'  => $authenticate->get('data.nisn'),
        'is_login'  => true
      ]);

      $result = ['success' => true, 'code' => 200, 'message' => "login berhasil."];
    } else {
      if ($authenticate->get('code') == 401) {
        $result = ['success' => false, 'code' => 401, 'message' => "NISN atau kata sandi salah."];
      } else {
        $result = ['success' => false, 'code' => 500, 'message' => "Oops, Server sibuk. Coba lagi nanti."];
      }
    }

    return collect($result);
  }
}
