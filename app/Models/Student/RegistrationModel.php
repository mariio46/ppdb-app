<?php

namespace App\Models\Student;

class RegistrationModel
{
    public function getSchedules(): array
    {
        return [
            [
                'code'  => '5eb0e33ccbe50bb2777ed6937cb6b440d125dfffcea3df3434b7f529199422e3',
                'start' => "2023-12-01",
                'end'   => "2023-12-07",
                'sma'   => [
                    ['jalur' => 'Boarding School']
                ],
                'smk'   => [
                    ['jalur' => 'Anak Guru'],
                    ['jalur' => 'Anak Dunia Usaha dan Dunia Industri'],
                    ['jalur' => 'Prestasi Non Akademik'],
                    ['jalur' => 'Domisili Terdekat']
                ]
            ],
            [
                'code'  => "a6a69cc6839f539d6ee8c237ba52784b4abd0a327462a10717222d0288c64986",
                'start' => "2023-12-08",
                'end'   => "2023-12-14",
                'sma'   => [
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
                'start' => "2023-12-15",
                'end'   => "2023-12-21",
                'sma'   => [
                    ['jalur' => 'Zonasi']
                ],
                'smk'   => []
            ],
        ];
    }
}
