<?php

namespace App\Models\Student;

use Illuminate\Support\Facades\Http;

class BaseModel
{
  // private $domain = "https://ppdbv2.infaltech.com/";
  protected $domain = "http://ppdbv2.test/";

  protected function get(string $endpoint): array
  {
    $response = Http::withHeaders([
      "waktu" => 5,
      "sw-code" => session()->get('stu_token')
    ])->get($this->domain . $endpoint);


    $status = $response->status();
    $json = $response->json();

    return [
      'status_code' => $status,
      'response'    => $json
    ];
  }

  protected function postWoToken(string $endpoint, array $data): array
  {
    $response = Http::post($this->domain . $endpoint, $data);

    $status = $response->status();
    $json = $response->json();

    return [
      'status_code' => $status,
      'response'    => $json
    ];
  }

  protected function post(string $endpoint, array $data): array
  {
    $response = Http::withHeaders([
      "waktu"   => 1,
      "sw-code" => session()->get('stu_token'),
    ])->post($this->domain . $endpoint, $data);

    $status = $response->status();
    $json = $response->json();

    return [
      'status_code' => $status,
      'response'    => $json
    ];
  }
}
