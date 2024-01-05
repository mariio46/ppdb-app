<?php

namespace App\Models\Student;

class RegionModel extends BaseModel
{
    public function getListProvince(): array
    {
        $get = $this->get('wilayah/all/provinsi');

        return $get;
        // return collect([
        //   ['code' => '72', 'name' => 'Sulawesi Tengah'],
        //   ['code' => '73', 'name' => 'Sulawesi Selatan'],
        // ]);
    }

    public function getListCity(string $code): array
    {
        $get = $this->get('wilayah/all/kota?kode='.$code);

        return $get;

        // return collect([
        //   ['code' => '72.01', 'name' => 'Kabupaten Banggai'],
        //   ['code' => '72.71', 'name' => 'Kota Palu'],
        //   ['code' => '73.01', 'name' => 'Kabupaten Kepulauan Selayar'],
        //   ['code' => '73.71', 'name' => 'Kota Makassar'],
        // ]);
    }

    public function getListDistrict(string $code): array
    {
        $get = $this->get('wilayah/kota/kecamatan?kode='.$code);

        return $get;
        // return collect([
        //   ['code' => '72.01.01', 'name' => 'Kecamatan Batui'],
        //   ['code' => '72.01.02', 'name' => 'Kecamatan Bunta'],
        //   ['code' => '72.71.01', 'name' => 'Kecamatan Palu Timur'],
        //   ['code' => '72.71.02', 'name' => 'Kecamatan Palu Barat'],
        //   ['code' => '73.01.01', 'name' => 'Kecamatan Benteng'],
        //   ['code' => '73.01.02', 'name' => 'Kecamatan Bontoharu'],
        //   ['code' => '73.71.01', 'name' => 'Kecamatan Mariso'],
        //   ['code' => '73.71.02', 'name' => 'Kecamatan Mamajang'],
        // ]);
    }

    /**
     * @param  string  $code - district code
     */
    public function getListVillage(string $code): array
    {
        $get = $this->get('wilayah/kota/desa?kode='.$code);

        return $get;
        // return collect([
        //   ['code' => '72.01.01.2002', 'name' => 'Desa Nonong'],
        //   ['code' => '72.01.01.1006', 'name' => 'Kelurahan Bugis'],
        //   ['code' => '72.01.02.2015', 'name' => 'Desa Bohotokong'],
        //   ['code' => '72.01.02.1014', 'name' => 'Kelurahan Bunta I'],
        //   ['code' => '72.71.01.1004', 'name' => 'Kelurahan Besusu Barat'],
        //   ['code' => '72.71.01.1006', 'name' => 'Kelurahan Besusu Tengah'],
        //   ['code' => '72.71.02.1002', 'name' => 'Kelurahan Ujuna'],
        //   ['code' => '72.71.02.1005', 'name' => 'Kelurahan Balaroa'],
        //   ['code' => '73.01.01.1001', 'name' => 'Kelurahan Benteng Utara'],
        //   ['code' => '73.01.01.1002', 'name' => 'Kelurahan Benteng'],
        //   ['code' => '73.01.02.1001', 'name' => 'Kelurahan Putabangung'],
        //   ['code' => '73.01.02.2003', 'name' => 'Desa Bontosunggu'],
        //   ['code' => '73.71.01.1001', 'name' => 'Kelurahan Bontorannu'],
        //   ['code' => '73.71.01.1002', 'name' => 'Kelurahan Mattoangin'],
        //   ['code' => '73.71.02.1001', 'name' => 'Kelurahan Sambung Jawa'],
        //   ['code' => '73.71.02.1002', 'name' => 'Kelurahan Parang'],
        // ]);
    }
}
