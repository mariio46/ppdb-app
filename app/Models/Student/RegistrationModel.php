<?php

namespace App\Models\Student;

use App\Models\Base;
use Illuminate\Support\Facades\Crypt;

class RegistrationModel extends Base
{
    /**
     * private $code = [
     *  'AA'  => 'sma afirmasi',
     *  'AB'  => 'sma mutasi / perpindahan tugas orang tua',
     *  'AC'  => 'sma anak guru',
     *  'AD'  => 'sma prestasi akademik',
     *  'AE'  => 'sma prestasi non akademik',
     *  'AF'  => 'sma zonasi',
     *  'AG'  => 'sma boarding school',
     *
     *  'KA'  => 'smk afirmasi',
     *  'KB'  => 'smk mutasi / perpindahan tugas orang tua',
     *  'KC'  => 'smk anak guru',
     *  'KD'  => 'smk prestasi akademik',
     *  'KE'  => 'smk prestasi non akademik',
     *  'KF'  => 'smk domisili',
     *  'KG'  => 'smk anak dudi'
     * ]; */
    // ------------------------------------------------------------------

    public $informations = [
        'AA' => 'sma afirmasi'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        'AB' => 'sma mutasi / perpindahan tugas orang tua'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        'AC' => 'sma anak guru'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        'AD' => 'sma prestasi akademik'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        'AE' => 'sma prestasi non akademik'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        'AF' => 'sma zonasi'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        'AG' => 'sma boarding school'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        //  *
        'KA' => 'smk afirmasi'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        'KB' => 'smk mutasi / perpindahan tugas orang tua'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        'KC' => 'smk anak guru'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        'KD' => '<p>Jalur prestasi nilai akademik diperuntukkan bagi calon peserta didik baru jenjang SMA/SMK, yang sistem penilaiannya merupakan gabungan rerata nilai rapor SMP/sederajat semester 1 sampai dengan semester 5, nilai akreditasi dari SMP/sederajat, dan indeks sekolah SMP/sederajat asal yang dimiliki oleh Dinas Pendidikan</p>'
            . '<p>Mata pelajaran yang digunakan untuk Jalur Prestasi Nilai Akademik adalah</p>'
            . '<ol>'
            . '<li>Matematika</li>'
            . '<li>Bahasa Indonesia</li>'
            . '<li>Bahasa Inggris</li>'
            . '<li>Ilmu Pengetahuan Alam</li>'
            . '<li>Ilmu Pengetahuan Sosial</li>'
            . '</ol>',
        'KE' => 'smk prestasi non akademik'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        'KF' => 'smk domisili'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
        'KG' => 'smk anak dudi'
            . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
            . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
            . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
            . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
            . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    ];

    private $p1 = ['start' => '2023-11-01', 'end' => '2023-11-30'];

    private $p2 = ['start' => '2023-12-01', 'end' => '2023-12-30'];

    private $p3 = ['start' => '2024-01-01', 'end' => '2024-01-30'];

    // 02.002
    public function getSchedules(): array
    {
        // return [
        //     [
        //         'code' => Crypt::encryptString(json_encode(['phase' => '1'])),
        //         'phase' => '1',
        //         'start' => $this->p1['start'],
        //         'end' => $this->p1['end'],
        //         'sma' => [
        //             ['jalur' => 'Boarding School'],
        //         ],
        //         'smk' => [
        //             ['jalur' => 'Afirmasi'],
        //             ['jalur' => 'Perpindahan Tugas Orang Tua'],
        //             ['jalur' => 'Anak Guru'],
        //             ['jalur' => 'Anak Dunia Usaha dan Dunia Industri'],
        //             ['jalur' => 'Prestasi Non Akademik'],
        //             ['jalur' => 'Domisili Terdekat'],
        //         ],
        //     ],
        //     [
        //         'code' => Crypt::encryptString(json_encode(['phase' => '2'])),
        //         'phase' => '2',
        //         'start' => $this->p2['start'],
        //         'end' => $this->p2['end'],
        //         'sma' => [
        //             ['jalur' => 'Afirmasi'],
        //             ['jalur' => 'Perpindahan Tugas Orang Tua'],
        //             ['jalur' => 'Anak Guru'],
        //             ['jalur' => 'Prestasi Akademik'],
        //             ['jalur' => 'Prestasi Non Akademik'],
        //         ],
        //         'smk' => [
        //             ['jalur' => 'Prestasi Akademik'],
        //         ],
        //     ],
        //     [
        //         'code' => Crypt::encryptString(json_encode(['phase' => '3'])),
        //         'phase' => '3',
        //         'start' => $this->p3['start'],
        //         'end' => $this->p3['end'],
        //         'sma' => [
        //             ['jalur' => 'Zonasi'],
        //         ],
        //         'smk' => [],
        //     ],
        // ];

        $get = $this->swGetWithToken('tahap/schedule');

        foreach ($get['response']['data'] as &$item) {
            $kodeValue = $item['tahap'];

            $item['code'] = Crypt::encryptString(json_encode(['phase' => $kodeValue]));
        }

        unset($item);

        return $get;
    }

    public function getScheduleByPhaseCode(string $phase): array
    {
        $get = $this->swGetWithToken("tahap/schedule/byid?tahap=$phase");

        if ($get['status_code'] == 200) {
            $data = $get['response'];
        } else {
            $data = [
                "statusCode" => $get["status_code"],
                "message" => "Gagal mendapatkan data.",
                "data" => []
            ];
        }

        return $data;
    }

    public function saveRegistration(array $data): array
    {
        $register = $this->swPostWithToken("pendaftaran/siswa", $data);

        if ($register['status_code'] == 200 || $register['status_code'] == 201) {
            return $register['response'];
        } else {
            return [
                "statusCode"    => $register["status_code"],
                "status"        => "failed",
                "message"       => "Gagal menyimpan data.",
                "data"          => []
            ];
        }
    }

    public function getRegistrationDataByPhase(string $phase): array
    {
        $studentId = session()->get('stu_id');

        // get student registration data (using student id) by phase
        $case = 'KG';

        $get = [ // case AB
            'phase' => '1',
            'track' => $case,
            'affirmation_type' => 'pkh',
            'affirmation_number' => '823748237482739237',
            'achievement_type' => 'Beregu',
            'achievement_level' => 'Internasional',
            'achievement_champ' => '1',
            'achievement_name' => 'Mobile Legend Bang Bang Championship',
            'school1' => 'SMA Negeri 1 Makassar',
            'department1' => 'Teknik Komputer dan Jaringan (TKJ)',
            'school2' => 'SMA Negeri 2 Makassar',
            'department2' => 'Otomotif',
            'school3' => 'SMA Negeri 1 Selayar',
            'department3' => 'Tata Boga',
            'school_verif' => 'SMA Negeri 1 Makassar',
            'end_verif' => '2023-12-31',
        ];

        return $get;
    }
}
