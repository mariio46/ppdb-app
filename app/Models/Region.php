<?php

namespace App\Models;

use App\Models\Base;

class Region extends Base
{
    public function getListProvince(): array
    {
        $get = [];

        if (session()->get('token')) {
            $get = $this->getWithToken('wilayah/all/provinsi');
        } else if (session()->get('stu_token')) {
            $get = $this->swGetWithToken('wilayah/all/provinsi');
        }

        return $get;
    }

    public function getListCity(string $provinceCode)
    {
        $get = [];

        if (session()->get('token')) {
            $get = $this->getWithToken('wilayah/all/kota?kode=' . $provinceCode);
        } else if (session()->get('stu_token')) {
            $get = $this->swGetWithToken('wilayah/all/kota?kode=' . $provinceCode);
        }
        return $get;
    }

    public function getListDistrict(string $code): array
    {
        if (session()->get('token')) {
            $get = $this->getWithToken('wilayah/kota/kecamatan?kode=' . $code);
        } else if (session()->get('stu_token')) {
            $get = $this->swGetWithToken('wilayah/kota/kecamatan?kode=' . $code);
        }

        return $get;
    }

    /**
     * @param  string  $code - district code
     */
    public function getListVillage(string $code): array
    {
        if (session()->get('token')) {
            $get = $this->getWithToken('wilayah/kota/desa?kode=' . $code);
        } else if (session()->get('stu_token')) {
            $get = $this->swGetWithToken('wilayah/kota/desa?kode=' . $code);
        }

        return $get;
    }
}
