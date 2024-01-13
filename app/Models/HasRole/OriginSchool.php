<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class OriginSchool extends Base
{
    //------------------------------------------------------------GET
    public function getAll(): array // A.03.001
    {
        $get = $this->getWithToken("sekolah/asal/all");
        if ($get['status_code'] == 200) {
            return $get['response'];
        } else {
            return [
                'statusCode' => $get['status_code'],
                'status' => 'failed',
                'messages' => 'Gagal memdapatkan data.',
                'data' => []
            ];
        }
    }

    //------------------------------------------------------------POST
    public function store(Request $request): array //
    {
        $data = [
            "npsn" => $request->npsn,
            "nama" => $request->nama
        ];

        $post = $this->postWithToken("sekolah/asal/add", $data);
        dd($post);

        if ($post['status_code'] == 201) {
            return $post['response'];
        } else {
            return [
                'statusCode' => $post['status_code'],
                'status' => 'failed',
                'messages' => 'Gagal menyimpan data.',
                'data' => []
            ];
        }
    }
}
