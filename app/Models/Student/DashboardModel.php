<?php

namespace App\Models\Student;

use App\Models\Base;
use Illuminate\Http\Request;

class DashboardModel extends Base
{
    // 01.001
    public function getDataStudentById(string $id): array
    {
        $get = $this->swGetWithToken('siswa/byid?id='.$id);

        return $this->serverResponseWithGetMethod($get);
    }

    public function getDataScoreAll(string $id): array
    {
        $get = $this->swGetWithToken('siswa/nilai?id='.$id);

        return $this->serverResponseWithGetMethod($get);
    }

    public function getDataScoreBySemester(string $id, int $semester): array
    {
        $get = $this->swGetWithToken('siswa/nilai?id='.$id.'&semester='.$semester);

        return $this->serverResponseWithGetMethod($get);
    }

    //------------------------------------------------------------POST
    public function postFirstTimeLogin(array $data): array
    {
        $result = $this->swPostWithToken('siswa/pertama/login', $data);

        return $this->serverResponseWithPostMethod($result);
    }

    public function postUpdateStudentData(array $data): array
    {
        $result = $this->swPostWithToken('siswa/update', $data);

        return $this->serverResponseWithPostMethod($result);
    }

    public function postUpdateStudentProfile(Request $request): array
    {
        $upd = $this->swPostFileWithToken('siswa/update/profil', ['id' => session()->get('stu_id')], 'pasfoto', $request->file('profilePictureInput'));

        if ($upd['status_code'] == 200 || $upd['status_code'] == 201) {
            session()->put('stu_profile_img', $upd['response']['data']['pasfoto']);
        }

        return $this->serverResponseWithPostMethod($upd);
    }

    public function postUpdateStudentScore(array $data): array
    {
        $result = $this->swPostWithToken('siswa/nilai/update', $data);

        return $this->serverResponseWithPostMethod($result);
    }

    public function postLockStudentData(string $id): array
    {
        $result = $this->swPostWithToken('siswa/kunci', [
            'id' => $id,
        ]);

        return $this->serverResponseWithPostMethod($result);
    }
}
