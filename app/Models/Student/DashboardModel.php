<?php

namespace App\Models\Student;

use Illuminate\Http\Request;

class DashboardModel extends BaseModel
{
  public function getDataStudentById(string $id): array
  {
    $get = $this->get('siswa/byid?id=' . $id);

    return $get;

    // return [
    //   "id"              => "1",
    //   "nisn"            => "0123456789",
    //   "nik"             => "7272012345678909",
    //   "asal_sekolah"    => "SMP Negeri 2 Sukamaju",
    //   "jenis_kelamin"   => "p",
    //   "tempat_lahir"    => "Tangerang",
    //   "tanggal_lahir"   => "2006-02-13",
    //   "nomor_hp"        => "081234567890",
    //   "email"           => "freya.jayawardana@gmail.com",
    //   "kode_provinsi"   => "73",
    //   "provinsi"        => "Sulawesi Selatan",
    //   "kode_kabupaten"  => "73.71",
    //   "kabupaten"       => "Kota Makassar",
    //   "kode_kecamatan"  => "73.71.02",
    //   "kecamatan"       => "Kecamatan Mamajang",
    //   "kode_desa"       => "73.71.02.1001",
    //   "desa"            => "Kelurahan Sambung Jawa",
    //   "dusun"           => "Purwosari",
    //   "rtrw"            => "001/000",
    //   "alamat_jalan"    => "Lorong 5 A, Nomor 1",
    //   "nama_ibu"        => "Fulanah binti Fulan",
    //   "nomor_ibu"       => "081234567890",
    //   "nama_ayah"       => "Fulan bin Fulan",
    //   "nomor_ayah"      => "081234567890",
    //   "nama_wali"       => "Fulanwati binti Fulanwan",
    //   "nomor_wali"      => "081234567890",
    //   "pas_foto"        => "/app-assets/images/profile.png",
    //   // "pas_foto"        => "",
    //   "pertama_login"   => "0", // pertama kali login = 1, sudah pernah login = 0
    //   "kunci"           => "0"
    // ];
  }

  public function getDataScoreAll(string $id): array
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

  public function getDataScoreBySemester(string $id, int $semester): array
  {
    $score = [];

    if ($semester == 1) {
      $score = [
        'bid' => '87',
        'big' => '88',
        'mtk' => '80',
        'ipa' => '71',
        'ips' => '93',
        'smt' => $semester
      ];
    } else if ($semester == 2) {
      $score = [
        'bid' => '88',
        'big' => '87',
        'mtk' => '98',
        'ipa' => '73',
        'ips' => '70',
        'smt' => $semester
      ];
    } else if ($semester == 3) {
      $score =  [
        'bid' => '92',
        'big' => '75',
        'mtk' => '70',
        'ipa' => '83',
        'ips' => '99',
        'smt' => $semester
      ];
    } else if ($semester == 4) {
      $score = [
        'bid' => '97',
        'big' => '92',
        'mtk' => '79',
        'ipa' => '84',
        'ips' => '99',
        'smt' => $semester
      ];
    } else if ($semester == 5) {
      $score = [
        'bid' => '98',
        'big' => '96',
        'mtk' => '86',
        'ipa' => '75',
        'ips' => '80',
        'smt' => $semester
      ];
    }

    return $score;
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
    $data = [
      'kata_sandi'  => $newPassword,
      'telepon'     => $phone,
      'email'       => $email,
      'id'          => $id
    ];

    $result = $this->post('siswa/pertama/login', $data);
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
      'image' => $image,
      'data' => [
        'profile' => '/app-assets/images/profile.png'
      ]
    ];

    return $result;
  }

  public function postUpdateStudentScore(int $semester, Request $request): array
  {
    $result = [
      'success' => true,
      'semester' => $semester
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
