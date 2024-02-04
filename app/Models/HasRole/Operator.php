<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class Operator extends Base
{
    public function getOperators(string $key, string $param): array
    {
        $response = $this->getWithToken("admin/operator/list?{$key}={$param}");

        return $this->serverResponseWithGetMethod(response: $response);
    }

    public function getSingleOperator(string $operator_id): array
    {
        $response = $this->getWithToken(endpoint: "admin/operator/get?id={$operator_id}");

        return $this->serverResponseWithGetMethod(response: $response);
    }

    public function createOperator(Request $request, string $param): array
    {
        $body = [
            'nama' => $request->nama,
            'nama_pengguna' => $request->nama_pengguna,
            'kata_sandi' => $request->password,
            'sekolah_id' => $param,
        ];

        $data = $this->postWithTokenAndWithFile(endpoint: 'admin/operator/pengajuan', data: $body, key: 'dokumen', file: $request->file('dokumen'));

        return $this->serverResponseWithPostMethod(data: $data);
    }

    public function verifyOperator(string $operator_id): array
    {
        $response = $this->postWithToken(endpoint: 'admin/operator/verif', data: ['id' => $operator_id]);

        return $this->serverResponseWithPostMethod(data: $response);
    }

    public function updateOperatorStatus(Request $request, string $operator_id): array
    {
        $body = [
            'id' => $operator_id,
            'status_aktif' => $request->status,
        ];

        $response = $this->postWithToken(endpoint: 'admin/operator/status/update', data: $body);

        return $this->serverResponseWithPostMethod(data: $response);
    }
}
