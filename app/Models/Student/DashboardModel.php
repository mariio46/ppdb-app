<?php

namespace App\Models\Student;

use Illuminate\Http\Request;

class DashboardModel
{
  public function getDataStudentById(string $id): array
  {
    return [
      "id"              => "1",
      "nisn"            => "0123456789",
      "nik"             => "7272012345678909",
      "asal_sekolah"    => "SMP Negeri 2 Sukamaju",
      "jenis_kelamin"   => "p",
      "tempat_lahir"    => "Tangerang",
      "tanggal_lahir"   => "2006-02-13",
      "nomor_hp"        => "081234567890",
      "email"           => "freya.jayawardana@gmail.com",
      "kode_provinsi"   => "73",
      "provinsi"        => "Sulawesi Selatan",
      "kode_kabupaten"  => "73.71",
      "kabupaten"       => "Kota Makassar",
      "kode_kecamatan"  => "73.71.02",
      "kecamatan"       => "Kecamatan Mamajang",
      "kode_desa"       => "73.71.02.1001",
      "desa"            => "Kelurahan Sambung Jawa",
      "dusun"           => "Purwosari",
      "rtrw"            => "001/000",
      "alamat_jalan"    => "Lorong 5 A, Nomor 1",
      "nama_ibu"        => "Fulanah binti Fulan",
      "nomor_ibu"       => "081234567890",
      "nama_ayah"       => "Fulan bin Fulan",
      "nomor_ayah"      => "081234567890",
      "nama_wali"       => "Fulanwati binti Fulanwan",
      "nomor_wali"      => "081234567890",
      "pertama_login"   => "0", // pertama kali login = 1, sudah pernah login = 0
      "kunci"           => "0"
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

  /**
   * @param $id
   * @param $email
   * @param $phone
   * @param $newPassword
   * 
   * $id = student ID
   */
  public function postFirstTimeLogin(string $id, string $email, string $phone, string $newPassword): array
  {
    $result = [
      'success' => true
    ];
    return $result;
  }

  public function postUpdateStudentData(Request $request): array
  {
    $province = explode('|', $request->post('province'));
    $city = explode('|', $request->post('city'));
    $district = explode('|', $request->post('district'));
    $village = explode('|', $request->post('village'));

    $data = [
      'id'              => session()->get('stu_id'),
      'nik'             => $request->post('nik'),
      'jenis_kelamin'   => $request->post('gender'),
      'tempat_lahir'    => $request->post('birthPlace'),
      'tanggal_lahir'   => $request->post('birthYear') . '-' . $request->post('birthMonth') . '-' . $request->post('birthDay'),
      'nomor_telepon'   => $request->post('phone'),
      'email'           => $request->post('email'),
      'kode_provinsi'   => $province[0],
      'provinsi'        => $province[1],
      'kode_kabupaten'  => $city[0],
      'kabupaten'       => $city[1],
      'kode_kecamatan'  => $district[0],
      'kecamatan'       => $district[1],
      'kode_desa'       => $village[0],
      'desa'            => $village[1],
      'dusun'           => $request->post('hamlet'),
      'rtrw'            => $request->post('associations'),
      'alamat_jalan'    => $request->post('address'),
      'nama_ibu'        => $request->post('mothersName'),
      'nomor_ibu'       => $request->post('mothersPhone'),
      'nama_ayah'       => $request->post('fathersName'),
      'nomor_ayah'      => $request->post('fathersPhone'),
      'nama_wali'       => $request->post('guardsName'),
      'nomor_wali'      => $request->post('guardsPhone'),
    ];

    $result = [
      'success' => true
    ];
    return $result;
  }

  public function postUpdateStudentProfile(Request $request): array
  {
    $image = $request->file('profilePictureInput');

    $result = [
      'success' => true,
      'image' => $image
    ];

    return $result;
  }

  public function postLockStudentData(string $id): array
  {
    $result = [
      'success' => true
    ];
    return $result;
  }
}
