<?php

namespace App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardModel extends BaseModel
{
    public function getDataStudentById(string $id): array
    {
        $get = $this->get('siswa/byid?id='.$id);

        return $get;
    }

    public function getDataScoreAll(string $id): array
    {
        $get = $this->get('siswa/nilai?id='.$id);

        return $get;
        // return [
        //   'smt1bid' => '87',
        //   'smt1big' => '88',
        //   'smt1mtk' => '80',
        //   'smt1ipa' => '71',
        //   'smt1ips' => '93',
        //   'smt2bid' => '88',
        //   'smt2big' => '87',
        //   'smt2mtk' => '98',
        //   'smt2ipa' => '73',
        //   'smt2ips' => '70',
        //   'smt3bid' => '92',
        //   'smt3big' => '75',
        //   'smt3mtk' => '70',
        //   'smt3ipa' => '83',
        //   'smt3ips' => '99',
        //   'smt4bid' => '97',
        //   'smt4big' => '92',
        //   'smt4mtk' => '79',
        //   'smt4ipa' => '84',
        //   'smt4ips' => '99',
        //   'smt5bid' => '98',
        //   'smt5big' => '96',
        //   'smt5mtk' => '86',
        //   'smt5ipa' => '75',
        //   'smt5ips' => '80',
        // ];
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
                'smt' => $semester,
            ];
        } elseif ($semester == 2) {
            $score = [
                'bid' => '88',
                'big' => '87',
                'mtk' => '98',
                'ipa' => '73',
                'ips' => '70',
                'smt' => $semester,
            ];
        } elseif ($semester == 3) {
            $score = [
                'bid' => '92',
                'big' => '75',
                'mtk' => '70',
                'ipa' => '83',
                'ips' => '99',
                'smt' => $semester,
            ];
        } elseif ($semester == 4) {
            $score = [
                'bid' => '97',
                'big' => '92',
                'mtk' => '79',
                'ipa' => '84',
                'ips' => '99',
                'smt' => $semester,
            ];
        } elseif ($semester == 5) {
            $score = [
                'bid' => '98',
                'big' => '96',
                'mtk' => '86',
                'ipa' => '75',
                'ips' => '80',
                'smt' => $semester,
            ];
        }

        return $score;
    }

    /**
     * @param $newPassword
     *
     * $id = student ID
     */
    public function postFirstTimeLogin(string $id, string $email, string $phone, string $newPassword): array
    {
        $data = [
            'kata_sandi' => $newPassword,
            'telepon' => $phone,
            'email' => $email,
            'id' => $id,
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
            'nik' => $request->post('nik'),
            'tanggal_lahir' => $request->post('birthYear').'-'.$request->post('birthMonth').'-'.$request->post('birthDay'),
            'tempat_lahir' => $request->post('birthPlace'),
            'jenis_kelamin' => $request->post('gender'),
            'email' => $request->post('email'),
            'telepon' => $request->post('phone'),
            'rtrw' => $request->post('associations'),
            'nama_ayah' => $request->post('fathersName'),
            'telepon_ayah' => $request->post('fathersPhone'),
            'nama_ibu' => $request->post('mothersName'),
            'telepon_ibu' => $request->post('mothersPhone'),
            'nama_wali' => $request->post('guardsName'),
            'telepon_wali' => $request->post('guardsPhone'),
            'kode_provinsi' => $province[0],
            'provinsi' => $province[1],
            'kode_kabupaten' => $city[0],
            'kabupaten' => $city[1],
            'kode_kecamatan' => $district[0],
            'kecamatan' => $district[1],
            'kode_desa' => $village[0],
            'desa' => $village[1],
            'dusun' => $request->post('hamlet'),
            'alamat_jalan' => $request->post('address'),
            'kode_wilayah' => $district[0],
            // 'wilayah_id'      => ?
            'id' => session()->get('stu_id'),
        ];

        $result = $this->post('siswa/update', $data);

        return $result;
    }

    public function postUpdateStudentProfile(Request $request): array
    {
        $file = $request->file('profilePictureInput');
        $data = ['id' => session()->get('stu_id')];

        $response = Http::withHeaders(['waktu' => 1, 'sw-code' => session()->get('stu_token')])
            ->attach('pasfoto', file_get_contents($file->path()), $file->getClientOriginalName())
            ->post($this->domain.'siswa/update/profil', $data);

        return [
            'status_code' => $response->status(),
            'response' => $response->json(),
        ];
    }

    public function postUpdateStudentScore(int $semester, Request $request): array
    {
        $result = [
            'success' => true,
            'semester' => $semester,
        ];

        return $result;
    }

    public function postLockStudentData(string $id): array
    {
        $result = [
            'success' => true,
        ];

        return $result;
    }
}
