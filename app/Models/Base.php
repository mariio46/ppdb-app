<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class Base
{
    protected $BASE_API_URL = 'https://api-ppdb.labkraf.id/';
    // https://api-ppdb.labkraf.id/

    protected function postWithoutToken(string $endpoint, array $data): array
    {
        $response = Http::post($this->BASE_API_URL . $endpoint, $data);

        return [
            'status_code' => $response->status(),
            'response' => $response->json(),
        ];
    }

    protected function postWithToken(string $endpoint, array $data)
    {
        $response = Http::withHeaders([
            "waktu" => 5,
            'dn-code' => session()->get('token')
        ])->post($this->BASE_API_URL . $endpoint, $data);

        return [
            'status_code' => $response->status(),
            'response' => $response->json(),
        ];
    }
}
