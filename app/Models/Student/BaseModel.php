<?php

namespace App\Models\Student;

use Illuminate\Support\Facades\Http;

class BaseModel
{
  private $domain = "https://ppdbv2.infaltech.com/";

  protected function get(string $endpoint)
  {
    $response = Http::withHeaders([
      "waktu" => 1,
      "sw-code" => session()->get('stu_token')
    ])->get($this->domain . $endpoint);


    $status = $response->status();
    $json = $response->json();

    return [
      'status_code' => $status,
      'response'    => $json
    ];
  }

  protected function post(string $endpoint, array $data)
  {
    $response = Http::post($this->domain . $endpoint, $data);

    // dd($response);

    $status = $response->status();
    $json = $response->json();

    return [
      'status_code' => $status,
      'response'    => $json
    ];
  }
}
