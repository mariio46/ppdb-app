<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class OriginSchool extends Base
{
    //------------------------------------------------------------GET
    public function getAll(): array // A.03.001
    {
        $get = $this->getWithToken('sekolah/asal/all');
        if ($get['status_code'] == 200) {
            return $get['response'];
        } else {
            return [
                'statusCode' => $get['status_code'],
                'status' => 'failed',
                'messages' => 'Gagal memdapatkan data.',
                'data' => [],
            ];
        }
    }

    public function getSingleById(string $id): array // A.03.002
    {
        $get = $this->getWithToken("sekolah/asal/get?id=$id");

        if ($get['status_code'] == 200) {
            return $get['response'];
        } else {
            return [
                'statusCode' => $get['status_code'],
                'status' => 'failed',
                'messages' => 'Gagal memdapatkan data.',
                'data' => [],
            ];
        }
    }

    //------------------------------------------------------------POST
    public function store(Request $request): array //
    {
        $data = [
            'npsn' => $request->npsn,
            'nama' => $request->nama,
        ];

        $post = $this->postWithToken('sekolah/asal/add', $data);
        return $this->serverResponseWithPostMethod($post);
    }

    public function update(Request $request): array
    {
        $data = [
            'id' => $request->id,
            'npsn' => $request->npsn,
            'nama' => $request->nama,
        ];

        $update = $this->postWithToken('sekolah/asal/update', $data);

        if ($update['status_code'] == 200) {
            return $update['response'];
        } else {
            return [
                'statusCode' => $update['status_code'],
                'status' => 'failed',
                'messages' => 'Gagal menyimpan data.',
                'data' => [],
            ];
        }
    }
}
