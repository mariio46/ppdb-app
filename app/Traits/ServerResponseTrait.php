<?php

namespace App\Traits;

trait ServerResponseTrait
{
    // -------------------------SERVER RESPONSE-------------------------

    protected function serverResponseWithGetMethod(array $response): array
    {
        $server_status_code = $response['status_code'];

        if ($server_status_code == 500) {
            return $this->whenServerIsError(code: $server_status_code);
        }

        if ($server_status_code == 400 || $server_status_code == 404) {
            return $this->whenServerIsNotFound(code: $server_status_code);
        }

        return $response['response'];
    }

    protected function serverResponseWithPostMethod(array $data): array
    {
        $server_status_code = $data['status_code'];

        if ($server_status_code == 500) {
            return $this->whenServerIsError(code: $server_status_code);
        }

        if ($server_status_code == 400 || $server_status_code == 404) {
            return $this->whenServerIsNotFound(code: $server_status_code);
        }

        return $data['response'];
    }
    // -------------------------DEFAULT FAILED RETURN-------------------------

    protected function serverFailedResponse(array $error): array
    {
        $error_code = $error['status_code'];

        if ($error_code == 500) {
            return $this->whenServerIsError(code: $error_code);
        }

        return $this->whenServerIsNotFound(code: $error_code);
    }

    protected function whenServerIsNotFound(string $code): array
    {
        return [
            'statusCode' => $code,
            'status' => 'Failed',
            'messages' => 'Ada Kesalahan Dalam Mengakses Server!',
            'data' => [],
        ];
    }

    protected function whenServerIsError(string $code): array
    {
        return [
            'statusCode' => $code,
            'status' => 'Failed',
            'messages' => 'Server saat ini tidak bisa diakses!',
            'data' => [],
        ];
    }
}
