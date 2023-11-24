<?php

namespace App\Models\Student;

class DashboardModel
{
  public function getDataStudentById(string $id): array
  {
    return [
      "id"            => "1",
      "nisn"          => "0123456789",
      "nik"           => "727201234567890",
      "asal_sekolah"  => "SMP Negeri 2 Sukamaju",
      "jenis_kelamin" => "p",
      "tempat_lahir"  => "Tangerang",
      "tanggal_lahir" => "2006-02-13",
      "nomor_hp"      => "081234567890",
      "email"         => "freya.jayawardana@gmail.com",
      "provinsi"      => "Sulawesi Selatan",
      "kabupaten"     => "Luwu Utara",
      "kecamatan"     => "Sukamaju Selatan",
      "desa"          => "Mulyorejo",
      "dusun"         => "Purwosari",
      "rt"            => "001",
      "rw"            => "000",
      "alamat_jalan"  => "Lorong 5 A, Nomor 1",
      "nama_ibu"      => "Fulanah binti Fulan",
      "nomor_ibu"     => "081234567890",
      "nama_ayah"     => "Fulan bin Fulan",
      "nomor_ayah"    => "081234567890",
      "nama_wali"     => "Fulanwati binti Fulanwan",
      "nomor_wali"    => "081234567890",
    ];
  }

  public function getDataNilaiAll(string $id): array
  {
    return [
      'smt1bid' => '87',
      'smt1big' => '88',
      'smt1mtk' => '80',
      'smt1ipa' => '71',
      'smt1ips' => '93',
      'smt2bid' => '88',
      'smt2big' => '87',
      'smt2mtk' => '98',
      'smt2ipa' => '73',
      'smt2ips' => '70',
      'smt3bid' => '92',
      'smt3big' => '75',
      'smt3mtk' => '70',
      'smt3ipa' => '83',
      'smt3ips' => '99',
      'smt4bid' => '97',
      'smt4big' => '92',
      'smt4mtk' => '79',
      'smt4ipa' => '84',
      'smt4ips' => '99',
      'smt5bid' => '98',
      'smt5big' => '96',
      'smt5mtk' => '86',
      'smt5ipa' => '75',
      'smt5ips' => '80',
    ];
  }
}
