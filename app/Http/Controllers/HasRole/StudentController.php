<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        return view('has-role.student.index');
    }

    public function create(): View
    {
        return view('has-role.student.create', [
            'months' => $this->getMoths(),
            'years' => $this->getYears(),
        ]);
    }

    public function show($username): View
    {
        return view('has-role.student.show', [
            'student' => $this->getSingleStudent($username),
            'grades' => $this->getGrades(),
        ]);
    }

    public function edit($username): View
    {
        return view('has-role.student.edit', [
            'student' => $this->getSingleStudent($username),
            'months' => $this->getMoths(),
            'years' => $this->getYears(),
        ]);
    }

    public function score(string $username, string $semester): View
    {
        $data = [
            'username' => $username,
            'semester' => str_replace('semester-', '', $semester), // return only number
        ];

        return view('has-role.student.score', $data);
    }

    public function updateScore(string $username, string $semester, Request $request)
    {
        $data = [
            'username' => $username,
            'semester' => str_replace('semester-', '', $semester),
            'indonesian' => $request->post('indonesian'),
            'english' => $request->post('english'),
            'math' => $request->post('math'),
            'science' => $request->post('science'),
            'social' => $request->post('social'),
        ];

        return redirect()->back()->with(['scoreStatus' => 'success', 'scoreMsg' => json_encode($data)]);
    }

    protected function getSingleStudent($username)
    {
        $users = $this->getStudents()->where('username', $username);
        $data = json_decode($users, true);
        foreach ($data as $key => $item) {
            $user = (object) $item;
        }

        return $user;
    }

    protected function getStudents(): JsonResponse
    {
        $data = collect([
            (object) [
                'id' => "9ef555d7-21f9-47ef-9413-f69a6bcfda84",
                'nama' => 'Ryan Rafli',
                'sekolah_asal' => 'SMPN 1 Parepare',
                'nisn' => 6564553453,
            ],
            (object) [
                'id' => "40fd7174-e24e-4775-9a28-78e5d0f2036f",
                'nama' => 'Al Muqtadir',
                'sekolah_asal' => 'SMPN 1 Parepare',
                'nisn' => 5454224678,
            ],
            (object) [
                'id' => "f909d329-df1d-4a89-85e3-e4f727d2267c",
                'nama' => 'Ainun Putri',
                'sekolah_asal' => 'SMPN 3 Makassar',
                'nisn' => 10302913833,
            ],
            (object) [
                'id' => "899b3068-4f05-4a16-8ad1-683febc5b2f4",
                'nama' => 'Edy Siswanto Syarif',
                'sekolah_asal' => 'SMPN 10 Maros',
                'nisn' => 43242354815,
            ],
            (object) [
                'id' => "f3bb95a4-0ffb-4c9e-9a67-eeebe0a2f8ea",
                'nama' => 'Muh Rafie Muis',
                'sekolah_asal' => 'SMPN 3 Pangkep',
                'nisn' => 42342356788,
            ],
            (object) [
                'id' => "a054e49d-dc6a-4eee-9839-9ac3197d7177",
                'nama' => 'Vicky Giovaldi',
                'sekolah_asal' => 'SMP 1 Luwu Timur',
                'nisn' => 8787575645,
            ],
            (object) [
                'id' => "f27f67a1-55fd-4950-9937-2f042c9e36cf",
                'nama' => 'Muh Raiz Muis',
                'sekolah_asal' => 'SMPN 1 Parepare',
                'nisn' => 2432545466,
            ],
            (object) [
                'id' => "ed1f2c97-e75a-4de4-88bc-a0f916039a1e",
                'nama' => 'Zhafran',
                'sekolah_asal' => 'SMPN 2 Makassar',
                'nisn' => 34234234223,
            ],
        ]);

        // $data = collect([]);

        return response()->json($data);
    }

    protected function getMoths()
    {
        return collect([
            (object) [
                'label' => 'Januari',
                'value' => 'januari',
            ],
            (object) [
                'label' => 'Februari',
                'value' => 'februari',
            ],
            (object) [
                'label' => 'Maret',
                'value' => 'maret',
            ],
            (object) [
                'label' => 'April',
                'value' => 'april',
            ],
            (object) [
                'label' => 'Mei',
                'value' => 'mei',
            ],
            (object) [
                'label' => 'Juni',
                'value' => 'juni',
            ],
            (object) [
                'label' => 'Juli',
                'value' => 'juli',
            ],
            (object) [
                'label' => 'Agustus',
                'value' => 'agustus',
            ],
            (object) [
                'label' => 'Semptember',
                'value' => 'semptember',
            ],
            (object) [
                'label' => 'Oktober',
                'value' => 'oktober',
            ],
            (object) [
                'label' => 'November',
                'value' => 'november',
            ],
            (object) [
                'label' => 'Desember',
                'value' => 'desember',
            ],
        ]);
    }

    protected function getYears()
    {
        return collect([
            (object) [
                'label' => '2004',
                'value' => '2004',
            ],
            (object) [
                'label' => '2005',
                'value' => '2005',
            ],
            (object) [
                'label' => '2006',
                'value' => '2006',
            ],
            (object) [
                'label' => '2007',
                'value' => '2007',
            ],
            (object) [
                'label' => '2008',
                'value' => '2008',
            ],
            (object) [
                'label' => '2009',
                'value' => '2009',
            ],
            (object) [
                'label' => '2010',
                'value' => '2010',
            ],
            (object) [
                'label' => '2011',
                'value' => '2011',
            ],
            (object) [
                'label' => '2012',
                'value' => '2012',
            ],
            (object) [
                'label' => '2013',
                'value' => '2013',
            ],
            (object) [
                'label' => '2014',
                'value' => '2014',
            ],
            (object) [
                'label' => '2015',
                'value' => '2015',
            ],
        ]);
    }

    protected function getGrades()
    {
        return collect([
            (object) [
                'mata_pelajaran' => 'Bahasa Indonesia',
                'semester_1' => '90',
                'semester_2' => '98',
                'semester_3' => '87',
                'semester_4' => '98',
                'semester_5' => '94',
            ],
            (object) [
                'mata_pelajaran' => 'Bahasa Inggris',
                'semester_1' => '87',
                'semester_2' => '78',
                'semester_3' => '79',
                'semester_4' => '76',
                'semester_5' => '87',
            ],
            (object) [
                'mata_pelajaran' => 'Matematika',
                'semester_1' => '70',
                'semester_2' => '99',
                'semester_3' => '76',
                'semester_4' => '98',
                'semester_5' => '98',
            ],
            (object) [
                'mata_pelajaran' => 'IPA',
                'semester_1' => '78',
                'semester_2' => '89',
                'semester_3' => '90',
                'semester_4' => '85',
                'semester_5' => '90',
            ],
            (object) [
                'mata_pelajaran' => 'IPS',
                'semester_1' => '95',
                'semester_2' => '76',
                'semester_3' => '87',
                'semester_4' => '93',
                'semester_5' => '71',
            ],
        ]);
    }

    protected function getScores(string $username, string $semester): JsonResponse
    {
        switch ($semester) {
            case '1':
                $data = [
                    'bid' => '90',
                    'big' => '87',
                    'mtk' => '70',
                    'ipa' => '78',
                    'ips' => '95',
                ];
                break;
            case '2':
                $data = [
                    'bid' => '98',
                    'big' => '78',
                    'mtk' => '99',
                    'ipa' => '89',
                    'ips' => '76',
                ];
                break;
            case '3':
                $data = [
                    'bid' => '87',
                    'big' => '79',
                    'mtk' => '76',
                    'ipa' => '90',
                    'ips' => '87',
                ];
                break;
            case '4':
                $data = [
                    'bid' => '98',
                    'big' => '76',
                    'mtk' => '98',
                    'ipa' => '85',
                    'ips' => '93',
                ];
                break;
            case '5':
                $data = [
                    'bid' => '94',
                    'big' => '87',
                    'mtk' => '98',
                    'ipa' => '90',
                    'ips' => '71',
                ];
                break;
            default:
                $data = [
                    'bid' => '0',
                    'big' => '0',
                    'mtk' => '0',
                    'ipa' => '0',
                    'ips' => '0',
                ];
                break;
        }

        return response()->json($data);
    }
}
