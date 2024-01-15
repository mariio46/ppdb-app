<?php

namespace App\Repositories\Student\Impl;

use App\Models\Student\RegistrationModel;
use App\Repositories\Student\RegistrationRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class RegistrationRepositoryImpl implements RegistrationRepository
{
    public function __construct(
        public RegistrationModel $registrationModel
    ) {
    }

    public function getSchedules(): array
    {
        $get = $this->registrationModel->getSchedules();

        return $get;
    }

    public function getRegistrationDataByPhase(string $phase): array
    {
        return $this->registrationModel->getRegistrationDataByPhase($phase);
    }

    public function getScheduleByPhaseCode(string $phase): array
    {
        // $phase = json_decode(Crypt::decryptString($code))->phase;

        $data = $this->registrationModel->getScheduleByPhaseCode($phase);

        foreach (['sma', 'smk'] as $schoolType) {
            if (isset($data['data'][$schoolType]) && is_array($data['data'][$schoolType])) {
                foreach ($data['data'][$schoolType] as &$track) {
                    $track['slug'] = $phase . '_' . $data['data']['tahap_id'] . '_' . $track['kode'];
                    $track['jalur'] = str_replace(['SMA', 'SMK'], "", $track['jalur']);
                    $track['info'] = $this->registrationModel->informations[$track['kode']];
                }
            }
        }

        // foreach ($data['data'] as &$tahap) {
        //     foreach (['sma', 'smk'] as $school) {
        //         foreach ($tahap[$school] as &$track) {
        //             $track['slug'] = Crypt::encryptString(json_encode(['phase' => $phase, 'track' => $track['kode']]));
        //             $track['jalur'] = str_replace(['SMA', 'SMK'], "", $track['jalur']);
        //             $track['info'] = $this->registrationModel->informations[$track['kode']];
        //         }
        //     }
        // }

        // $data['data']['jam_mulai'] = '00:00'; // format tt:mm
        // $data['data']['jam_selesai'] = '23:59';

        return $data;
    }

    public function postSaveRegistration(string $phase, string $phaseId, string $trackCode, Request $request): array
    {
        switch ($trackCode) {
            case 'AA':
                $data = [
                    "siswa_id"          => session()->get("stu_id"),
                    "tahap_id"          => $phaseId,
                    "tahap"             => $phase,
                    'jalur'             => $trackCode,
                    "jenis_afirmasi"    => $request->affirmationType,
                    "no_pkh"            => $request->affirmationNumber,
                    "sekolah1_id"       => $request->school1,
                    "sekolah2_id"       => $request->school2,
                    "sekolah3_id"       => $request->school3,
                    "sekolah_verif_id"  => $request->schoolVerif,

                    // 'affType' => $request->post('affirmationType'),
                    // 'affNum' => $request->post('affirmationNumber'),
                    // 'city1' => $request->post('city1'),
                    // 'city1Name' => $request->post('city1Name'),
                    // 'school1' => $request->post('school1'),
                    // 'school1Name' => $request->post('school1Name'),
                    // 'city2' => $request->post('city2'),
                    // 'city2Name' => $request->post('city2Name'),
                    // 'school2' => $request->post('school2'),
                    // 'school2Name' => $request->post('school2Name'),
                    // 'city3' => $request->post('city3'),
                    // 'city3Name' => $request->post('city3Name'),
                    // 'school3' => $request->post('school3'),
                    // 'school3Name' => $request->post('school3Name'),
                    // 'schoolVerif' => $request->post('schoolVerif'),
                    // 'schoolVerifName' => $request->post('schoolVerifName'),
                ];
                break;
            case 'AB':
                $data = [
                    'code' => $trackCode,
                    'city1' => $request->post('city1'),
                    'city1Name' => $request->post('city1Name'),
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                    'school2' => $request->post('school2'),
                    'school2Name' => $request->post('school2Name'),
                    'school3' => $request->post('school3'),
                    'school3Name' => $request->post('school3Name'),
                    'schoolVerif' => $request->post('schoolVerif'),
                    'schoolVerifName' => $request->post('schoolVerifName'),
                ];
                break;
            case 'AC':
                $data = [
                    'code' => $trackCode,
                    'city1' => $request->post('city1'),
                    'city1Name' => $request->post('city1Name'),
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                ];
                break;
            case 'AD':
                $data = [
                    'code' => $trackCode,
                    'city1' => $request->post('city1'),
                    'city1Name' => $request->post('city1Name'),
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                    'city2' => $request->post('city2'),
                    'city2Name' => $request->post('city2Name'),
                    'school2' => $request->post('school2'),
                    'school2Name' => $request->post('school2Name'),
                    'city3' => $request->post('city3'),
                    'city3Name' => $request->post('city3Name'),
                    'school3' => $request->post('school3'),
                    'school3Name' => $request->post('school3Name'),
                    'schoolVerif' => $request->post('schoolVerif'),
                    'schoolVerifName' => $request->post('schoolVerifName'),
                ];
                break;
            case 'AE':
                $data = [
                    'code' => $trackCode,
                    'achType' => $request->post('achievementType'),
                    'achLevel' => $request->post('achievementLevel'),
                    'achChamp' => $request->post('achievementChamp'),
                    'achName' => $request->post('achievementName'),
                    'city1' => $request->post('city1'),
                    'city1Name' => $request->post('city1Name'),
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                    'city2' => $request->post('city2'),
                    'city2Name' => $request->post('city2Name'),
                    'school2' => $request->post('school2'),
                    'school2Name' => $request->post('school2Name'),
                    'city3' => $request->post('city3'),
                    'city3Name' => $request->post('city3Name'),
                    'school3' => $request->post('school3'),
                    'school3Name' => $request->post('school3Name'),
                    'schoolVerif' => $request->post('schoolVerif'),
                    'schoolVerifName' => $request->post('schoolVerifName'),
                ];
                break;
            case 'AF':
                $data = [
                    'code' => $trackCode,
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                    'school2' => $request->post('school2'),
                    'school2Name' => $request->post('school2Name'),
                    'school3' => $request->post('school3'),
                    'school3Name' => $request->post('school3Name'),
                    'schoolVerif' => $request->post('schoolVerif'),
                    'schoolVerifName' => $request->post('schoolVerifName'),
                ];
                break;
            case 'AG':
                $data = [
                    'code' => $trackCode,
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                ];
                break;
            case 'KA':
                $data = [
                    'code' => $trackCode,
                    'affType' => $request->post('affirmationType'),
                    'affNum' => $request->post('affirmationNumber'),
                    'city1' => $request->post('city1'),
                    'city1Name' => $request->post('city1Name'),
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                    'depart1' => $request->post('department1'),
                    'depart1Name' => $request->post('department1Name'),
                    'city2' => $request->post('city2'),
                    'city2Name' => $request->post('city2Name'),
                    'school2' => $request->post('school2'),
                    'school2Name' => $request->post('school2Name'),
                    'depart2' => $request->post('department2'),
                    'depart2Name' => $request->post('department2Name'),
                    'city3' => $request->post('city3'),
                    'city3Name' => $request->post('city3Name'),
                    'school3' => $request->post('school3'),
                    'school3Name' => $request->post('school3Name'),
                    'depart3' => $request->post('department3'),
                    'depart3Name' => $request->post('department3Name'),
                    'schoolVerif' => $request->post('schoolVerif'),
                    'schoolVerifName' => $request->post('schoolVerifName'),
                ];
                break;
            case 'KB':
                $data = [
                    'code' => $trackCode,
                    'city1' => $request->post('city1'),
                    'city1Name' => $request->post('city1Name'),
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                    'depart1' => $request->post('department1'),
                    'depart1Name' => $request->post('department1Name'),
                    'school2' => $request->post('school2'),
                    'school2Name' => $request->post('school2Name'),
                    'depart2' => $request->post('department2'),
                    'depart2Name' => $request->post('department2Name'),
                    'school3' => $request->post('school3'),
                    'school3Name' => $request->post('school3Name'),
                    'depart3' => $request->post('department3'),
                    'depart3Name' => $request->post('department3Name'),
                    'schoolVerif' => $request->post('schoolVerif'),
                    'schoolVerifName' => $request->post('schoolVerifName'),
                ];
                break;
            case 'KC':
            case 'KG':
                $data = [
                    'code' => $trackCode,
                    'city1' => $request->post('city1'),
                    'city1Name' => $request->post('city1Name'),
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                    'depart1' => $request->post('department1'),
                    'depart1Name' => $request->post('department1Name'),
                    'depart2' => $request->post('department2'),
                    'depart2Name' => $request->post('department2Name'),
                    'depart3' => $request->post('department3'),
                    'depart3Name' => $request->post('department3Name'),
                ];
                break;
            case 'KD':
                $data = [
                    'code' => $trackCode,
                    'city1' => $request->post('city1'),
                    'city1Name' => $request->post('city1Name'),
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                    'depart1' => $request->post('department1'),
                    'depart1Name' => $request->post('department1Name'),
                    'city2' => $request->post('city2'),
                    'city2Name' => $request->post('city2Name'),
                    'school2' => $request->post('school2'),
                    'school2Name' => $request->post('school2Name'),
                    'depart2' => $request->post('department2'),
                    'depart2Name' => $request->post('department2Name'),
                    'city3' => $request->post('city3'),
                    'city3Name' => $request->post('city3Name'),
                    'school3' => $request->post('school3'),
                    'school3Name' => $request->post('school3Name'),
                    'depart3' => $request->post('department3'),
                    'depart3Name' => $request->post('department3Name'),
                    'schoolVerif' => $request->post('schoolVerif'),
                    'schoolVerifName' => $request->post('schoolVerifName'),
                ];
                break;
            case 'KE':
                $data = [
                    'code' => $trackCode,
                    'achType' => $request->post('achievementType'),
                    'achLevel' => $request->post('achievementLevel'),
                    'achChamp' => $request->post('achievementChamp'),
                    'achName' => $request->post('achievementName'),
                    'city1' => $request->post('city1'),
                    'city1Name' => $request->post('city1Name'),
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                    'depart1' => $request->post('department1'),
                    'depart1Name' => $request->post('department1Name'),
                    'city2' => $request->post('city2'),
                    'city2Name' => $request->post('city2Name'),
                    'school2' => $request->post('school2'),
                    'school2Name' => $request->post('school2Name'),
                    'depart2' => $request->post('department2'),
                    'depart2Name' => $request->post('department2Name'),
                    'city3' => $request->post('city3'),
                    'city3Name' => $request->post('city3Name'),
                    'school3' => $request->post('school3'),
                    'school3Name' => $request->post('school3Name'),
                    'depart3' => $request->post('department3'),
                    'depart3Name' => $request->post('department3Name'),
                    'schoolVerif' => $request->post('schoolVerif'),
                    'schoolVerifName' => $request->post('schoolVerifName'),
                ];
                break;
            case 'KF':
                $data = [
                    'code' => $trackCode,
                    'city1' => $request->post('city1'),
                    'city1Name' => $request->post('city1Name'),
                    'school1' => $request->post('school1'),
                    'school1Name' => $request->post('school1Name'),
                    'depart1' => $request->post('department1'),
                    'depart1Name' => $request->post('department1Name'),
                    'city2' => $request->post('city2'),
                    'city2Name' => $request->post('city2Name'),
                    'school2' => $request->post('school2'),
                    'school2Name' => $request->post('school2Name'),
                    'depart2' => $request->post('department2'),
                    'depart2Name' => $request->post('department2Name'),
                    'city3' => $request->post('city3'),
                    'city3Name' => $request->post('city3Name'),
                    'school3' => $request->post('school3'),
                    'school3Name' => $request->post('school3Name'),
                    'depart3' => $request->post('department3'),
                    'depart3Name' => $request->post('department3Name'),
                    'schoolVerif' => $request->post('schoolVerif'),
                    'schoolVerifName' => $request->post('schoolVerifName'),
                ];
                break;
            default:
                // code...
                break;
        }

        $save = $this->registrationModel->saveRegistration($data);

        if ($save['statusCode'] == 201) {
            session()->put('stu_status_regis', true);
        }

        return $save;
    }
}
