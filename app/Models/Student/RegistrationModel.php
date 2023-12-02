<?php

namespace App\Models\Student;

class RegistrationModel
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

  private $infomations = [
    'AA'  =>  'sma afirmasi'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    'AB'  => 'sma mutasi / perpindahan tugas orang tua'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    'AC'  => 'sma anak guru'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    'AD'  => 'sma prestasi akademik'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    'AE'  => 'sma prestasi non akademik'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    'AF'  => 'sma zonasi'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    'AG'  => 'sma boarding school'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    //  * 
    'KA'  => 'smk afirmasi'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    'KB'  => 'smk mutasi / perpindahan tugas orang tua'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    'KC'  => 'smk anak guru'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    'KD'  => '<p>Jalur prestasi nilai akademik diperuntukkan bagi calon peserta didik baru jenjang SMA/SMK, yang sistem penilaiannya merupakan gabungan rerata nilai rapor SMP/sederajat semester 1 sampai dengan semester 5, nilai akreditasi dari SMP/sederajat, dan indeks sekolah SMP/sederajat asal yang dimiliki oleh Dinas Pendidikan</p>'
      . '<p>Mata pelajaran yang digunakan untuk Jalur Prestasi Nilai Akademik adalah</p>'
      . '<ol>'
      . '<li>Matematika</li>'
      . '<li>Bahasa Indonesia</li>'
      . '<li>Bahasa Inggris</li>'
      . '<li>Ilmu Pengetahuan Alam</li>'
      . '<li>Ilmu Pengetahuan Sosial</li>'
      . '</ol>',
    'KE'  => 'smk prestasi non akademik'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    'KF'  => 'smk domisili'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
    'KG'  => 'smk anak dudi'
      . '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>'
      . '<p>Eaque quam accusantium fugiat ipsa deleniti corporis at, distinctio accusamus error aliquam eos dolore ut necessitatibus possimus vero recusandae ratione voluptatibus commodi enim ullam dolores repellendus quod, architecto dolorem.</p>'
      . '<p>Perspiciatis error optio mollitia consequatur, reprehenderit dolorem veritatis vel velit enim impedit et quaerat inventore minima accusantium esse quis, fuga ullam dicta odio nemo harum quisquam dolorum natus modi.</p>'
      . '<p>Doloribus molestiae ducimus officiis ipsam aperiam numquam distinctio ex iste quam.</p>'
      . '<p>Asperiores corrupti, sit alias distinctio magnam itaque officia nisi perspiciatis mollitia reprehenderit numquam voluptas quo aspernatur, architecto repudiandae nostrum dolorem culpa, praesentium nihil!</p>',
  ];

  public function getSchedules(): array
  {
    return [
      [
        'code'  => '5eb0e33ccbe50bb2777ed6937cb6b440d125dfffcea3df3434b7f529199422e3',
        'start' => "2023-12-01",
        'end'   => "2023-12-31",
        'sma'   => [
          ['jalur' => 'Boarding School']
        ],
        'smk'   => [
          ['jalur' => 'Afirmasi'],
          ['jalur' => 'Perpindahan Tugas Orang Tua'],
          ['jalur' => 'Anak Guru'],
          ['jalur' => 'Anak Dunia Usaha dan Dunia Industri'],
          ['jalur' => 'Prestasi Non Akademik'],
          ['jalur' => 'Domisili Terdekat']
        ]
      ],
      [
        'code'  => "a6a69cc6839f539d6ee8c237ba52784b4abd0a327462a10717222d0288c64986",
        'start' => "2023-12-01",
        'end'   => "2023-12-31",
        'sma'   => [
          ['jalur' => 'Afirmasi'],
          ['jalur' => 'Perpindahan Tugas Orang Tua'],
          ['jalur' => 'Anak Guru'],
          ['jalur' => 'Prestasi Akademik'],
          ['jalur' => 'Prestasi Non Akademik'],
        ],
        'smk'   => [
          ['jalur' => 'Prestasi Akademik'],
        ]
      ],
      [
        'code'  => "cbb6824fda925fca4165cba41ffdb38b9fbc6808c761c2a7b77a0e22f48ef8ca",
        'start' => "2023-12-01",
        'end'   => "2023-12-31",
        'sma'   => [
          ['jalur' => 'Zonasi']
        ],
        'smk'   => []
      ],
    ];
  }

  public function getScheduleByPhaseCode(string $code): array
  {
    $data = [];
    if ($code == '5eb0e33ccbe50bb2777ed6937cb6b440d125dfffcea3df3434b7f529199422e3') {
      $data = [
        'phase' => '1',
        'start' => "2023-12-01",
        'end'   => "2023-12-31",
        'sma'   => [
          [
            'slug'  => '129a6140e8b4198c8d0d54098ff29fdfaff8b17169c051de5728beccfa15972f',
            'code'  => 'AG',
            'jalur' => 'Boarding School',
            'info'  => $this->infomations['AG']
          ]
        ],
        'smk'   => [
          [
            'slug'  => '7c2d8bd07ef5750e0fe7091150c57634fb88a1fbd95e7ee9609961de15346f7d',
            'code'  => 'KA',
            'jalur' => 'Afirmasi',
            'info'  => $this->infomations['KA']
          ],
          [
            'slug'  => 'e7fd86daf0344d3a7307cc7314f5cbed5d6697fc51286091c3b3a7b750503a19',
            'code'  => 'KB',
            'jalur' => 'Perpindahan Tugas Orang Tua',
            'info'  => $this->infomations['KB']
          ],
          [
            'slug'  => '546a7226de44be987ea08399b959d91e9682bf0fc5a86db7947b55a54ce2c3a8',
            'code'  => 'KC',
            'jalur' => 'Anak Guru',
            'info'  => $this->infomations['KC']
          ],
          [
            'slug'  => '1bd067bd2a781f95eff778aa5784c89025c9c0e62d6e2dd3963bafb25b0ebe3f',
            'code'  => 'KG',
            'jalur' => 'Anak Dunia Usaha dan Dunia Industri',
            'info'  => $this->infomations['KG']
          ],
          [
            'slug'  => '63290047ee523565068c9948004c01a4eb5107756c416518b4a0ef99002051a3',
            'code'  => 'KE',
            'jalur' => 'Prestasi Non Akademik',
            'info'  => $this->infomations['KE']
          ],
          [
            'slug'  => '39eefe1a006928659cf238eadb3e512f851a32b178346a6bd4391adbc67972d3',
            'code'  => 'KF',
            'jalur' => 'Domisili Terdekat',
            'info'  => $this->infomations['KF']
          ]
        ]
      ];
    } elseif ($code == 'a6a69cc6839f539d6ee8c237ba52784b4abd0a327462a10717222d0288c64986') {
      $data = [
        'phase' => '2',
        'start' => "2023-12-01",
        'end'   => "2023-12-31",
        'sma'   => [
          [
            'slug'  => '3a49138015e4c0df7d4125be81e7c6b916fdbc84bcbb093098043bbf0f33651c',
            'code'  => 'AA',
            'jalur' => 'Afirmasi',
            'info'  => $this->infomations['AA']
          ],
          [
            'slug' => '7aed572b8c37d1da189ad3bea1c96deec6a2189e1690c9265c11063abb1f2ad0',
            'code' => 'AB',
            'jalur' => 'Perpindahan Tugas Orang Tua',
            'info'  => $this->infomations['AB']
          ],
          [
            'slug' => '553db886041904311c340b84eababcf0b5be8611fd0ac0826c6eeb1a82900ac8',
            'code' => 'AC',
            'jalur' => 'Anak Guru',
            'info'  => $this->infomations['AC']
          ],
          [
            'slug' => 'dd027a32efadaf5d1116bd6c8247b614ee960bc012c4a967a743e768543e6c5b',
            'code' => 'AD',
            'jalur' => 'Prestasi Akademik',
            'info'  => $this->infomations['AD']
          ],
          [
            'slug' => '6dba6d7afeb17742265bb41d6af9fc2716370d7867215303fd1f24a190bfa03e',
            'code' => 'AE',
            'jalur' => 'Prestasi Non Akademik',
            'info'  => $this->infomations['AE']
          ],
        ],
        'smk'   => [
          [
            'slug' => 'ea4a13cf67864382d889a3e315128a32643e9f81e5e3ac97da2c03d49ca38f82',
            'code' => 'KD',
            'jalur' => 'Prestasi Akademik',
            'info'  => $this->infomations['KD']
          ],
        ]
      ];
    } elseif ($code == 'cbb6824fda925fca4165cba41ffdb38b9fbc6808c761c2a7b77a0e22f48ef8ca') {
      $data = [
        'phase' => '3',
        'start' => "2023-12-01",
        'end'   => "2023-12-31",
        'sma'   => [
          [
            'slug' => '32bc4b1af00d5c18d13eca61c77b0e62c04f46797444b7d51f36a4b1798e6843',
            'code' => 'AF',
            'jalur' => 'Zonasi',
            'info'  => $this->infomations['AF']
          ]
        ],
        'smk'   => []
      ];
    }

    $data['time_start'] = '00:00'; // format tt:mm
    $data['time_end'] = '23:59';

    return $data;
  }
}
