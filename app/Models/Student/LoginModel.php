<?php

namespace App\Models\Student;

use Illuminate\Support\Collection;

class LoginModel
{
  public function login(string $nisn, string $password): Collection
  {
    if ($nisn == '0123456789' && $password == 'sayang') {
      $data = [
        "code" => 200,
        "msg"  => "login success",
        "data" => [
          "id"            => '1',
          "name"          => "Freya Jayawardana",
          "nisn"          => "0123456789",
          "school"        => "SMP Negeri 2 Sukamaju",
          "regis_status"  => 'n'
        ]
      ];
    } else if ($nisn == '0123456789' && $password == 'server') {
      $data = ["code" => 500, "msg" => "server error", "data" => []];
    } else {
      $data = ["code" => 401, "msg" => "login failed", "data" => []];
    }

    return collect($data);
  }
}
