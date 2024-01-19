<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;

class Base
{
    protected $BASE_API_URL = 'https://api-ppdb.labkraf.id/';

    // -------------------------DEFAULT HEADERS-------------------------
    protected function defaultHeaders(int $time = 5, string $token = 'token'): array
    {
        return ['waktu' => $time, 'Dn-Code' => session()->get($token)];
    }

    // -------------------------SERVER ACTION-------------------------

    protected function postWithoutToken(string $endpoint, array $data): array
    {
        $response = Http::post($this->BASE_API_URL.$endpoint, $data);

        return [
            'status_code' => $response->status(),
            'response' => $response->json(),
        ];
    }

    protected function postWithToken(string $endpoint, array $data)
    {
        $response = Http::withHeaders($this->defaultHeaders())->post($this->BASE_API_URL.$endpoint, $data);

        return [
            'status_code' => $response->status(),
            'response' => $response->json(),
        ];
    }

    protected function postWithTokenAndWithFile(string $endpoint, array $data, string $key, object $file): array
    {
        $response = Http::withHeaders($this->defaultHeaders())
            ->attach($key, file_get_contents($file->path()), $file->getClientOriginalName())
            ->post(url: $this->BASE_API_URL.$endpoint, data: $data);

        return [
            'status_code' => $response->status(),
            'response' => $response->json(),
        ];
    }

    protected function getWithToken(string $endpoint)
    {
        $response = Http::withHeaders($this->defaultHeaders())->get($this->BASE_API_URL.$endpoint);

        return [
            'status_code' => $response->status(),
            'response' => $response->json(),
        ];
    }

    protected function swGetWithToken(string $endpoint)
    {
        $response = Http::withHeaders([
            'waktu' => 5,
            'sw-code' => session()->get('stu_token'),
        ])->get($this->BASE_API_URL.$endpoint);

        return [
            'status_code' => $response->status(),
            'response' => $response->json(),
        ];
    }

    protected function swPostWithToken(string $endpoint, array $data): array
    {
        $response = Http::withHeaders([
            'waktu' => 5,
            'sw-code' => session()->get('stu_token'),
        ])->post($this->BASE_API_URL.$endpoint, $data);

        return [
            'status_code' => $response->status(),
            'response' => $response->json(),
        ];
    }

    // -------------------------SERVER RESPONSE-------------------------

    protected function serverResponseWithGetMethod(array $response): array
    {
        return $response['status_code'] == 200 ? $response['response'] : $this->serverFailedResponse(error: $response);
    }

    protected function serverResponseWithPostMethod(array $data): array
    {
        return $data['status_code'] == 201 || $data['status_code'] == 200 ? $data['response'] : $this->serverFailedResponse(error: $data);
    }

    // -------------------------DEFAULT FAILED RETURN-------------------------
    protected function serverFailedResponse(array $error): array
    {
        return [
            'statusCode' => $error['status_code'],
            'messages' => 'Gagal Menampilkan Data',
            'data' => [],
        ];
    }
}
