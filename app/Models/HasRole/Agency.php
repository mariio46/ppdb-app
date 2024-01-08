<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class Agency extends Base
{
    public function getAllAgency(): array
    {
        $get = $this->getWithToken('cabdin/index');
        if ($get['status_code'] == '200') {
            return $get['response'];
        } else {
            return [
                'statusCode' => $get['status_code'],
                'messages' => 'Gagal mendapatkan data.',
                'data' => []
            ];
        }
    }

    public function getById(string $id): array
    {
        $get = $this->getWithToken('cabdin/?id=' . $id);

        if ($get['status_code'] == '200') {
            return $get['response'];
        } else {
            return [
                'statusCode' => $get['status_code'],
                'status' => 'failed',
                'messages' => 'Gagal mendapatkan data.',
                'data' => []
            ];
        }
    }

    public function create(array $data): array
    {
        $save = $this->postWithToken('cabdin/create', $data);
        return $save;
    }

    public function update(array $data): array
    {
        $upd = $this->postWithToken('cabdin/update', $data);
        return $upd;
    }

    public function delete(string $id): array
    {
        $del = $this->postWithToken('cabdin/hapus', [
            "id" => $id
        ]);
        return $del;
    }
}
