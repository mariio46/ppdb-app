<?php

namespace App\Repositories\Student\Impl;

use App\Models\Student\RegistrationModel;
use App\Models\Track;
use App\Repositories\Student\RegistrationRepository;
use Illuminate\Http\Request;

class RegistrationRepositoryImpl implements RegistrationRepository
{
    public function __construct(
        public RegistrationModel $registrationModel,
        protected Track $track,
    ) {
    }

    public function getSchedules(): array
    {
        return $this->registrationModel->getSchedules();
    }

    public function getRegistrationDataByPhase(string $phase): array
    {
        $student_id = session()->get('stu_id');
        return $this->registrationModel->getRegistrationDataByPhase($student_id, $phase);
    }

    public function getScheduleByPhaseCode(string $phase): array
    {
        $data = $this->registrationModel->getScheduleByPhaseCode($phase);

        foreach (['sma', 'smk'] as $schoolType) {
            if (isset($data['data'][$schoolType]) && is_array($data['data'][$schoolType])) {
                foreach ($data['data'][$schoolType] as &$track) {
                    $track['slug'] = $phase . '_' . $data['data']['tahap_id'] . '_' . $track['kode'];
                    $track['jalur'] = str_replace(['SMA', 'SMK'], '', $track['jalur']);
                    $track['info'] = $this->track->getInfo($track['kode']);
                }
            }
        }

        // $data['data']['jam_mulai'] = '00:00'; // format tt:mm
        // $data['data']['jam_selesai'] = '23:59';

        return $data;
    }

    public function postSaveRegistration(string $phase, string $phaseId, string $trackCode, Request $request): array
    {
        $data = [
            'siswa_id' => session()->get('stu_id'),
            'tahap_id' => $phaseId,
            'tahap' => $phase,
            'kode_jalur' => $trackCode,
            'sekolah1_id' => $request->school1,
            'sekolah1_nama' => $request->school1Name,
            'nama_siswa' => session()->get('stu_name'),
            'nisn' => session()->get('stu_nisn'),
            'jenis_kelamin' => session()->get('stu_gender'),
        ];

        switch ($trackCode) {
            case 'AA': // afirmasi
                $data['jenis_afirmasi'] = $request->affirmationType;
                $data['no_pkh'] = $request->affirmationNumber;
                $data['sekolah2_id'] = $request->school2;
                $data['sekolah2_nama'] = $request->school2Name;
                $data['sekolah3_id'] = $request->school3;
                $data['sekolah3_nama'] = $request->school3Name;
                $data['sekolah_verif_id'] = $request->schoolVerif;
                break;
            case 'AB': // mutasi
            case 'AD': // prestasi akademik
            case 'AF': // zonasi
                $data['sekolah2_id'] = $request->school2;
                $data['sekolah2_nama'] = $request->school2Name;
                $data['sekolah3_id'] = $request->school3;
                $data['sekolah3_nama'] = $request->school3Name;
                $data['sekolah_verif_id'] = $request->schoolVerif;
                break;
            case 'AC': // anak guru
            case 'AG': // boarding school
                $data['sekolah_verif_id'] = $request->school1;
                break;
            case 'AE': // prestasi non akademik
                $data['prestasi_jenis'] = $request->achievementType;
                $data['prestasi_tingkat'] = $request->achievementLevel;
                $data['prestasi_juara'] = $request->achievementChamp;
                $data['prestasi_nama'] = $request->achievementName;
                $data['bobot'] = $request->achievementWeight;
                $data['sekolah2_id'] = $request->school2;
                $data['sekolah2_nama'] = $request->school2Name;
                $data['sekolah3_id'] = $request->school3;
                $data['sekolah3_nama'] = $request->school3Name;
                $data['sekolah_verif_id'] = $request->schoolVerif;
                break;
            case 'KA': // afirmasi
                $data['jenis_afirmasi'] = $request->affirmationType;
                $data['no_pkh'] = $request->affirmationNumber;
                $data['jurusan1_id'] = $request->department1;
                $data['jurusan1_nama'] = $request->department1Name;
                $data['sekolah2_id'] = $request->school2;
                $data['sekolah2_nama'] = $request->school2Name;
                $data['jurusan2_id'] = $request->department2;
                $data['jurusan2_nama'] = $request->department2Name;
                $data['sekolah3_id'] = $request->school3;
                $data['sekolah3_nama'] = $request->school3Name;
                $data['jurusan3_id'] = $request->department3;
                $data['jurusan3_nama'] = $request->department3Name;
                $data['sekolah_verif_id'] = $request->schoolVerif;
                break;
            case 'KB': // mutasi
            case 'KD': // prestasi akademik
            case 'KF': // domisili terdekat
                $data['jurusan1_id'] = $request->department1;
                $data['jurusan1_nama'] = $request->department1Name;
                $data['sekolah2_id'] = $request->school2;
                $data['sekolah2_nama'] = $request->school2Name;
                $data['jurusan2_id'] = $request->department2;
                $data['jurusan2_nama'] = $request->department2Name;
                $data['sekolah3_id'] = $request->school3;
                $data['sekolah3_nama'] = $request->school3Name;
                $data['jurusan3_id'] = $request->department3;
                $data['jurusan3_nama'] = $request->department3Name;
                $data['sekolah_verif_id'] = $request->schoolVerif;
                break;
            case 'KC': // anak guru
            case 'KG': // anak dudi
                $data['jurusan1_id'] = $request->department1;
                $data['jurusan1_nama'] = $request->department1Name;
                $data['sekolah2_id'] = $request->school1;      // hanya bisa memilih 1 sekolah
                $data['sekolah2_nama'] = $request->school1Name;  // hanya bisa memilih 1 sekolah
                $data['jurusan2_id'] = $request->department2;
                $data['jurusan2_nama'] = $request->department2Name;
                $data['sekolah3_id'] = $request->school1;      // hanya bisa memilih 1 sekolah
                $data['sekolah3_nama'] = $request->school1Name;  // hanya bisa memilih 1 sekolah
                $data['jurusan3_id'] = $request->department3;
                $data['jurusan3_nama'] = $request->department3Name;
                $data['sekolah_verif_id'] = $request->school1;      // hanya bisa memilih 1 sekolah
                break;
            case 'KE': // prestasi non akademik
                $data['prestasi_jenis'] = $request->achievementType;
                $data['prestasi_tingkat'] = $request->achievementLevel;
                $data['prestasi_juara'] = $request->achievementChamp;
                $data['prestasi_nama'] = $request->achievementName;
                $data['bobot'] = $request->achievementWeight;
                $data['jurusan1_id'] = $request->department1;
                $data['jurusan1_nama'] = $request->department1Name;
                $data['sekolah2_id'] = $request->school2;
                $data['sekolah2_nama'] = $request->school2Name;
                $data['jurusan2_id'] = $request->department2;
                $data['jurusan2_nama'] = $request->department2Name;
                $data['sekolah3_id'] = $request->school3;
                $data['sekolah3_nama'] = $request->school3Name;
                $data['jurusan3_id'] = $request->department3;
                $data['jurusan3_nama'] = $request->department3Name;
                $data['sekolah_verif_id'] = $request->schoolVerif;
                break;
            default:
                // code...
                break;
        }

        $save = $this->registrationModel->saveRegistration($data);

        if ($save['statusCode'] == 201) {
            session()->put('stu_is_regis', true);
        }

        return $save;
    }
}
