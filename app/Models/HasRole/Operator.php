<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class Operator extends Base
{
    public function getOperators(string $key, string $param): array
    {
        $response = $this->getWithToken("admin/operator/list?{$key}={$param}");

        if ($response['status_code'] == 200) {
            return $response['response'];
        } else {
            return [
                'statusCode' => $response['status_code'],
                'messages' => 'Gagal Menampilkan Data',
            ];
        }
    }

    public function getSingleOperator(string $param): array
    {
        $response = $this->getWithToken(endpoint: "admin/operator/get?id={$param}");

        if ($response['status_code'] == 200) {
            return $response['response'];
        } else {
            return [
                'statusCode' => $response['status_code'],
                'messages' => 'Gagal Menampilkan Data',
            ];
        }
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

        if ($data['status_code'] == 201 || $data['status_code'] == 200) {
            $response = $data['response'];
        } else {
            $response = [
                'statusCode' => $data['status_code'],
                'messages' => 'Gagal Menyimpan Data!',
                'data' => [],
            ];
        }

        return $response;
    }
}
