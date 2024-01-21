<?php

namespace App\Repositories\Student\Impl;

use App\Models\Region;
use App\Models\Student\DashboardModel;
use App\Repositories\Student\DashboardRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DashboardRepositoryImpl implements DashboardRepository
{
    public function __construct(private DashboardModel $dashboardModel, private Region $regionModel)
    {
    }

    //------------------------------------------------------------GET
    public function getDataStudent(): array
    {
        return $this->dashboardModel->getDataStudentById(session()->get('stu_id'));
    }

    public function getDataScore(): array
    {
        return $this->dashboardModel->getDataScoreAll(session()->get('stu_id'));
    }

    public function getScoreBySemester(int $semester): array
    {
        return $this->dashboardModel->getDataScoreBySemester(session()->get('stu_id'), $semester);
    }

    //------------------------------------------------------------POST
    public function postFirstTimeLogin(Request $request): array
    {
        return $this->dashboardModel->postFirstTimeLogin([
            'kata_sandi'    => $request->post('ftlNewPassword'),
            'telepon'       => $request->post('ftlPhoneNumber'),
            'email'         => $request->post('ftlEmail'),
            'id'            => session()->get('stu_id'),
        ]);
    }

    public function postUpdateStudentData(Request $request): array
    {
        $province   = explode('|', $request->post('province'));
        $city       = explode('|', $request->post('city'));
        $district   = explode('|', $request->post('district'));
        $village    = explode('|', $request->post('village'));
        $month      = ($request->post('birthMonth')) < 10 ? '0' . $request->post('birthMonth') : $request->post('birthMonth');
        $date       = ($request->post('birthDay')) < 10 ? '0' . $request->post('birthDay') : $request->post('birthDay');

        $data = [
            'nik'               => $request->post('nik'),
            'tanggal_lahir'     => $request->post('birthYear') . '-' . $month . '-' . $date,
            'tempat_lahir'      => $request->post('birthPlace'),
            'jenis_kelamin'     => $request->post('gender'),
            'email'             => $request->post('email'),
            'telepon'           => str_replace(' ', '', $request->post('phone')),
            'rtrw'              => $request->post('associations'),
            'nama_ayah'         => $request->post('fathersName'),
            'telepon_ayah'      => str_replace(' ', '', $request->post('fathersPhone')),
            'nama_ibu'          => $request->post('mothersName'),
            'telepon_ibu'       => str_replace(' ', '', $request->post('mothersPhone')),
            'nama_wali'         => $request->post('guardsName'),
            'telepon_wali'      => str_replace(' ', '', $request->post('guardsPhone')),
            'kode_provinsi'     => $province[0],
            'provinsi'          => $province[1],
            'kode_kabupaten'    => $city[0],
            'kabupaten'         => $city[1],
            'kode_kecamatan'    => $district[0],
            'kecamatan'         => $district[1],
            'kode_desa'         => $village[0],
            'desa'              => $village[1],
            'dusun'             => $request->post('hamlet'),
            'alamat_jalan'      => $request->post('address'),
            'kode_wilayah'      => $district[0],
            'id'                => session()->get('stu_id'),
        ];

        return $this->dashboardModel->postUpdateStudentData($data);
    }

    public function postUpdateStudentProfile(Request $request): array
    {
        return $this->dashboardModel->postUpdateStudentProfile($request);
    }

    public function postUpdateStudentScore(int $semester, Request $request): array
    {
        $sm = 'sm' . $semester . '_';

        $data = [
            'id' => session()->get('stu_id'),
            $sm . 'mtk' => $request->post('math'),
            $sm . 'ipa' => $request->post('science'),
            $sm . 'ips' => $request->post('social'),
            $sm . 'bid' => $request->post('indonesian'),
            $sm . 'big' => $request->post('english'),
        ];

        return $this->dashboardModel->postUpdateStudentScore($data);
    }

    public function postLockStudentData(): array
    {
        $lock = $this->dashboardModel->postLockStudentData(session()->get('stu_id'));

        if ($lock['statusCode'] == 200) {
            session()->put('stu_is_locked', true);
        }

        return $lock;
    }
}
