<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class Major extends Base
{
    protected string $url = 'jurusan/add/update';

    public function getMajors(): array
    {
        $majors = $this->getWithToken(endpoint: 'jurusan');

        return $this->serverResponseWithGetMethod(response: $majors);
    }

    public function getSingleMajor(string $major_id): array
    {
        $major = $this->getWithToken(endpoint: "jurusan/detail?id={$major_id}");

        return $this->serverResponseWithGetMethod(response: $major);
    }

    public function createMajor(Request $request): array
    {
        $response = $this->postWithToken(endpoint: $this->url, data: ['jurusan' => $request->jurusan]);

        return $this->serverResponseWithPostMethod(data: $response);
    }

    public function updateMajor(Request $request, string $major_id): array
    {
        $body = [
            'id' => $major_id,
            'jurusan' => $request->jurusan,
        ];

        $response = $this->postWithToken(endpoint: $this->url, data: $body);

        return $this->serverResponseWithPostMethod(data: $response);
    }

    public function deleteMajor(string $major_id): array
    {
        $response = $this->postWithToken(endpoint: 'jurusan/hapus', data: ['id' => $major_id]);

        return $this->serverResponseWithPostMethod(data: $response);
    }
}
