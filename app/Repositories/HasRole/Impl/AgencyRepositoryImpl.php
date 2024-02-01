<?php

namespace App\Repositories\HasRole\Impl;

use App\Models\HasRole\Agency;
use App\Repositories\HasRole\AgencyRepository;
use Illuminate\Http\Request;

class AgencyRepositoryImpl implements AgencyRepository
{
    public function __construct(protected Agency $agency)
    {
    }

    public function getAgency(): array
    {
        $get = $this->agency->getAllAgency();

        return $get;
    }

    public function getById(string $id): array
    {
        $get = $this->agency->getById($id);

        return $get;
    }

    public function create(Request $request): array
    {
        $position = explode('|', $request->post('position'));

        $areas = array_map(function ($item) {
            $parts = explode('|', $item);

            return $parts[0];
        }, $request->post('serviceArea'));

        $data = [
            'nama' => $request->post('name'),
            'alamat' => $request->post('address'),
            'nomor_telepon' => $request->post('phone'),
            'kedudukan' => $position[1],
            'kedudukan_kode' => $position[0],
            'wilayah' => $areas,
        ];

        $save = $this->agency->create($data);

        return $save;
    }

    public function update(Request $request): array
    {
        $position = explode('|', $request->post('position'));

        $areas = array_map(function ($item) {
            $parts = explode('|', $item);

            return $parts[0];
        }, $request->post('serviceArea'));

        $data = [
            'nama' => $request->post('name'),
            'alamat' => $request->post('address'),
            'nomor_telepon' => $request->post('phone'),
            'kedudukan' => $position[1],
            'kedudukan_kode' => $position[0],
            'wilayah' => $areas,
            'id' => $request->post('id'),
        ];

        $save = $this->agency->update($data);

        return $save;
    }

    public function remove(string $id): array
    {
        $del = $this->agency->delete($id);

        return $del;
    }
}
