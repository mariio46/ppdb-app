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

        if ($get['status_code'] == '400') {
            return [
                'status_code' => 200,
                'response' => [
                    'data' => [
                        'sm1_bid' => '0',
                        'sm1_big' => '0',
                        'sm1_mtk' => '0',
                        'sm1_ipa' => '0',
                        'sm1_ips' => '0',
                        'sm2_bid' => '0',
                        'sm2_big' => '0',
                        'sm2_mtk' => '0',
                        'sm2_ipa' => '0',
                        'sm2_ips' => '0',
                        'sm3_bid' => '0',
                        'sm3_big' => '0',
                        'sm3_mtk' => '0',
                        'sm3_ipa' => '0',
                        'sm3_ips' => '0',
                        'sm4_bid' => '0',
                        'sm4_big' => '0',
                        'sm4_mtk' => '0',
                        'sm4_ipa' => '0',
                        'sm4_ips' => '0',
                        'sm5_bid' => '0',
                        'sm5_big' => '0',
                        'sm5_mtk' => '0',
                        'sm5_ipa' => '0',
                        'sm5_ips' => '0',
                    ],
                ],
            ];
        }

        return $get;
    }

    public function getDataScoreBySemester(string $id, int $semester): array
    {
        $get = $this->get('siswa/nilai?id='.$id.'&semester='.$semester);

        return $get;
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
        $sm = 'sm'.$semester.'_';

        $data = [
            'id' => session()->get('stu_id'),
            $sm.'mtk' => $request->post('math'),
            $sm.'ipa' => $request->post('science'),
            $sm.'ips' => $request->post('social'),
            $sm.'bid' => $request->post('indonesian'),
            $sm.'big' => $request->post('english'),
        ];

        $result = $this->post('siswa/nilai/update', $data);

        return $result;
    }

    public function postLockStudentData(string $id): array
    {
        $data = [
            'id' => $id,
        ];

        $result = $this->post('siswa/kunci', $data);

        return $result;
    }
}
