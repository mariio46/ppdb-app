<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Models\HasRole\OriginSchool;
use App\Models\HasRole\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function __construct(
        protected Student $student,
        protected OriginSchool $originSchool
    ) {
    }

    public function index(): View
    {
        return view('has-role.student.index');
    }

    public function create(): View
    {
        return view('has-role.student.create');
    }

    public function show($id): View
    {
        return view('has-role.student.show', [
            'id' => $id,
        ]);
    }

    public function edit($id): View
    {
        return view('has-role.student.edit', [
            'id' => $id,
            // 'student' => $this->getSingleStudent($username),
            // 'months' => $this->getMoths(),
            // 'years' => $this->getYears(),
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

    //------------------------------------------------------------FUNC
    public function store(Request $request)
    {
        $save = $this->student->store($request);

        if ($save['statusCode'] == 201) {
            return to_route('siswa.index')->with(['stat' => 'success', 'msg' => $save['messages']]);
        }

        return redirect()->back()->withInput()->with(['stat' => 'danger', 'msg' => $save['messages']]);
    }

    public function update(string $id, Request $request): RedirectResponse
    {
        $upd = $this->student->update($id, $request);

        if ($upd['statusCode'] == 200) {
            return redirect()->back()->with(['stat' => 'success', 'msg' => $upd['messages']]);
        }

        return redirect()->back()->with(['stat' => 'danger', 'msg' => $upd['messages']]);
    }

    public function updateScore(string $username, string $semester, Request $request): RedirectResponse
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

        $upd = [
            'statusCode' => 200,
            'messages' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
        ];

        if ($upd['statusCode'] == 200) {
            return redirect()->back()->with(['scoreStatus' => 'success', 'scoreMsg' => $upd['messages']]);
        }

        return redirect()->back()->with(['scoreStatus' => 'danger', 'scoreMsg' => $upd['messages']]);
    }

    //------------------------------------------------------------JSON
    protected function getSingleStudent(string $id): JsonResponse
    {
        $student = $this->student->getStudent(student_id: $id);

        return response()->json($student);
    }

    protected function getSingleStudentByNisn(string $nisn): JsonResponse
    {
        $student = $this->student->getStudent(nisn: $nisn);

        return response()->json($student);
    }

    protected function getStudents(): JsonResponse // A.04.001
    {
        // $data = collect([
        //     (object) [
        //         'id' => '9ef555d7-21f9-47ef-9413-f69a6bcfda84',
        //         'nama' => 'Ryan Rafli',
        //         'sekolah_asal' => 'SMP NEGERI 19 Paleteang',
        //         'nisn' => 6564553453,
        //     ],
        //     (object) [
        //         'id' => '40fd7174-e24e-4775-9a28-78e5d0f2036f',
        //         'nama' => 'Al Muqtadir',
        //         'sekolah_asal' => 'SMPN 1 Parepare',
        //         'nisn' => 5454224678,
        //     ],
        //     (object) [
        //         'id' => 'f909d329-df1d-4a89-85e3-e4f727d2267c',
        //         'nama' => 'Ainun Putri',
        //         'sekolah_asal' => 'SMPN 3 Makassar',
        //         'nisn' => 10302913833,
        //     ],
        //     (object) [
        //         'id' => '899b3068-4f05-4a16-8ad1-683febc5b2f4',
        //         'nama' => 'Edy Siswanto Syarif',
        //         'sekolah_asal' => 'SMPN 10 Maros',
        //         'nisn' => 43242354815,
        //     ],
        //     (object) [
        //         'id' => 'f3bb95a4-0ffb-4c9e-9a67-eeebe0a2f8ea',
        //         'nama' => 'Muh Rafie Muis',
        //         'sekolah_asal' => 'SMPN 3 Pangkep',
        //         'nisn' => 42342356788,
        //     ],
        //     (object) [
        //         'id' => 'a054e49d-dc6a-4eee-9839-9ac3197d7177',
        //         'nama' => 'Vicky Giovaldi',
        //         'sekolah_asal' => 'SMP 1 Luwu Timur',
        //         'nisn' => 8787575645,
        //     ],
        //     (object) [
        //         'id' => 'f27f67a1-55fd-4950-9937-2f042c9e36cf',
        //         'nama' => 'Muh Raiz Muis',
        //         'sekolah_asal' => 'SMPN 1 Parepare',
        //         'nisn' => 2432545466,
        //     ],
        //     (object) [
        //         'id' => 'ed1f2c97-e75a-4de4-88bc-a0f916039a1e',
        //         'nama' => 'Zhafran',
        //         'sekolah_asal' => 'SMPN 2 Makassar',
        //         'nisn' => 34234234223,
        //     ],
        // ]);

        // $data = collect([]);

        // if role == admin sekolah asal -> get data by sekolah_asal_id
        // else if role == adm sekolah / adm cabang dinas / adm dinas / adm super user -> get data by kreator
        $data = $this->student->getStudents(creator: session()->get('id'));

        return response()->json($data);
    }

    protected function getOriginSchools(): JsonResponse // A.03.001
    {
        // $data = collect([
        //     [
        //         'id' => '13d55276-e0fe-4cef-8ddf-3c63e1e8ab18',
        //         'npsn' => '53858380',
        //         'nama' => 'SMP NEGERI 14 Balocci',
        //     ],
        //     [
        //         'id' => 'e93d7831-c6e1-4027-86fe-0f4e32f2f9f3',
        //         'npsn' => '23701847',
        //         'nama' => 'SMP NEGERI 19 Paleteang',
        //     ],
        //     [
        //         'id' => '6d241d92-71b2-4065-9e65-b7e3dc01a453',
        //         'npsn' => '40241267',
        //         'nama' => 'SMP NEGERI 16 Tellu Limpoe',
        //     ],
        //     [
        //         'id' => 'b77b131c-225f-458a-87af-256b2b70c882',
        //         'npsn' => '88290069',
        //         'nama' => 'SMP NEGERI 6 Pasirkembang Wetan',
        //     ],
        //     [
        //         'id' => '5a243cbc-573c-42ce-bb54-97ef6b8aa401',
        //         'npsn' => '96498610',
        //         'nama' => 'SMP NEGERI 13 Talangmarsum',
        //     ],
        //     [
        //         'id' => '017bc657-0c2c-42b4-9eef-db1c1eda1589',
        //         'npsn' => '58152069',
        //         'nama' => 'SMP NEGERI 17 Bojongkakak Satu',
        //     ],
        //     [
        //         'id' => 'dff0a3e4-5173-4228-ae7a-b8e4399687f6',
        //         'npsn' => '96275211',
        //         'nama' => 'SMP NEGERI 12 Bojongsirna',
        //     ],
        //     [
        //         'id' => '55510a61-4a69-43af-bca8-14d243625559',
        //         'npsn' => '14795405',
        //         'nama' => 'SMP NEGERI 2 Penombon',
        //     ],
        //     [
        //         'id' => 'd9d02748-a302-4236-835d-d675f9eef2a7',
        //         'npsn' => '29761345',
        //         'nama' => 'SMP NEGERI 17 Alongalong',
        //     ],
        //     [
        //         'id' => '9f459bb5-2a3d-4798-b695-9e9ddabf4f20',
        //         'npsn' => '57997791',
        //         'nama' => 'SMP NEGERI 10 Sungaitarab',
        //     ],
        // ]);

        $data = $this->originSchool->getAll();

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

    protected function getGrades(string $id): JsonResponse
    {
        // $data = collect([
        //     (object) [
        //         'mata_pelajaran' => 'Bahasa Indonesia',
        //         'semester_1' => '90',
        //         'semester_2' => '98',
        //         'semester_3' => '87',
        //         'semester_4' => '98',
        //         'semester_5' => '94',
        //     ],
        //     (object) [
        //         'mata_pelajaran' => 'Bahasa Inggris',
        //         'semester_1' => '87',
        //         'semester_2' => '78',
        //         'semester_3' => '79',
        //         'semester_4' => '76',
        //         'semester_5' => '87',
        //     ],
        //     (object) [
        //         'mata_pelajaran' => 'Matematika',
        //         'semester_1' => '70',
        //         'semester_2' => '99',
        //         'semester_3' => '76',
        //         'semester_4' => '98',
        //         'semester_5' => '98',
        //     ],
        //     (object) [
        //         'mata_pelajaran' => 'IPA',
        //         'semester_1' => '78',
        //         'semester_2' => '89',
        //         'semester_3' => '90',
        //         'semester_4' => '85',
        //         'semester_5' => '90',
        //     ],
        //     (object) [
        //         'mata_pelajaran' => 'IPS',
        //         'semester_1' => '95',
        //         'semester_2' => '76',
        //         'semester_3' => '87',
        //         'semester_4' => '93',
        //         'semester_5' => '71',
        //     ],
        // ]);

        $data = collect([
            'id' => '1',
            'siswa_id' => $id,
            'sm1_mtk' => '90',
            'sm1_ipa' => '98',
            'sm1_ips' => '87',
            'sm1_bid' => '98',
            'sm1_big' => '94',
            'sm2_mtk' => '87',
            'sm2_ipa' => '78',
            'sm2_ips' => '79',
            'sm2_bid' => '76',
            'sm2_big' => '87',
            'sm3_mtk' => '70',
            'sm3_ipa' => '99',
            'sm3_ips' => '76',
            'sm3_bid' => '98',
            'sm3_big' => '98',
            'sm4_mtk' => '78',
            'sm4_ipa' => '89',
            'sm4_ips' => '90',
            'sm4_bid' => '85',
            'sm4_big' => '90',
            'sm5_mtk' => '95',
            'sm5_ipa' => '76',
            'sm5_ips' => '87',
            'sm5_bid' => '93',
            'sm5_big' => '71',
        ]);

        return response()->json($data);
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
