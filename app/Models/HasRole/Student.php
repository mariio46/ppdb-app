<?php

namespace App\Models\HasRole;

use App\Models\Base;
use Illuminate\Http\Request;

class Student extends Base
{
    //------------------------------------------------------------GET
    public function getStudents(?string $creator = null, ?string $school = null): array // A.04.001
    {
        if ($creator !== null) {
            $get = $this->getWithToken("siswa/kreator/asal?kreator=$creator");
        }

        if ($school !== null) {
            $get = $this->getWithToken("siswa/kreator/asal?sekolah_asal_id=$school");
        }

        if ($get['status_code'] == 200) {
            return $get['response'];
        } else {
            return [
                'statusCode' => $get['status_code'],
                'status' => 'failed',
                'messages' => 'Gagal mendapatkan data.',
                'data' => [],
            ];
        }
    }

    public function getStudent(?string $student_id = null, ?string $nisn = null): array // A.04.002
    {
        if ($student_id !== null) {
            $get = $this->getWithToken("siswa/nisn/id?id=$student_id");
        }

        if ($nisn !== null) {
            $get = $this->getWithToken("siswa/nisn/id?nisn=$nisn");
        }

        if ($get['status_code'] == 200) {
            return $get['response'];
        } else {
            return [
                'statusCode' => $get['status_code'],
                'status' => 'failed',
                'messages' => 'Gagal mendapatkan data.',
                'data' => [],
            ];
        }
    }

    public function getScores(string $student_id): array
    {
        $get = $this->getWithToken("siswa/nilai?id=$student_id");
        if ($get['status_code'] == 200) {
            return $get['response'];
        } else {
            return [
                "statusCode" => $get["status_code"],
                "status"     => "failed",
                "messages"   => "Terjadi kesalahan.",
                "data"       => []
            ];
        }
    }

    public function getScore(string $student_id, string $semester): array
    {
        $get = $this->swGetWithToken("siswa/nilai?id=$student_id&semester=$semester");
        if ($get['status_code'] == 200) {
            return $get['response'];
        } else {
            return [
                "statusCode" => $get["status_code"],
                "status"     => "failed",
                "messages"   => "Terjadi kesalahan.",
                "data"       => []
            ];
        }
    }

    //------------------------------------------------------------POST
    public function store(Request $request): array
    {
        $sekolah_asal = explode('|', $request->sekolah_asal);
        $password = rand(100000, 999999);

        $data = [
            'nama' => $request->nama_lengkap,
            'nisn' => $request->nisn,
            'kata_sandi' => $password,
            'sandi_awal' => $password,
            'id_sekolah_asal' => $sekolah_asal[0],
            'sekolah_asal' => $sekolah_asal[1],
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'created_by' => session()->get('id'),
        ];

        $save = $this->postWithToken('siswa/create', $data);

        if ($save['status_code'] == 201 || $save['status_code'] == 200) {
            return $save['response'];
        } else {
            return [
                'statusCode' => $save['status_code'],
                'status' => 'failed',
                'messages' => 'Gagal menyimpan data.',
                'data' => [],
            ];
        }
    }

    public function update(string $id, Request $request): array
    {
        $origin_school = explode('|', $request->sekolah_asal);
        $data = [
            'id' => $id,
            'nama' => $request->nama_lengkap,
            'nisn' => $request->nisn,
            'id_sekolah_asal' => $origin_school[0],
            'sekolah_asal' => $origin_school[1],
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ];

        $update = $this->postWithToken('siswa/update', $data);

        if ($update['status_code'] == 200) {
            return $update['response'];
        } else {
            return [
                'statusCode' => $update['status_code'],
                'status' => 'failed',
                'messages' => 'Terjadi kesalahan. Gagal memperbarui data.',
                'data' => [],
            ];
        }
    }
}
