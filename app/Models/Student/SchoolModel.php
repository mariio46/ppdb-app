<?php

namespace App\Models\Student;

class SchoolModel
{
  public function getSchoolByCity(string $type, string $city): array
  {
    $data = [];

    if ($type == 'sma' && $city == '73.01') {
      $data = [
        [
          'id'    => '000011',
          'name'  => 'SMAN 1 Selayar'
        ],
        [
          'id'    => '000012',
          'name'  => 'SMAN 2 Selayar'
        ],
      ];
    } elseif ($type == 'sma' && $city == '73.71') {
      $data = [
        [
          'id'    => '000021',
          'name'  => 'SMAN 1 Makassar'
        ],
        [
          'id'    => '000022',
          'name'  => 'SMAN 2 Makassar'
        ],
      ];
    } elseif ($type == 'smk' && $city == '73.01') {
      $data = [
        [
          'id'    => '100011',
          'name'  => 'SMKN 1 Selayar'
        ],
        [
          'id'    => '100012',
          'name'  => 'SMKN 2 Selayar'
        ],
      ];
    } elseif ($type == 'smk' && $city == '73.71') {
      $data = [
        [
          'id'    => '100021',
          'name'  => 'SMKN 1 Makassar'
        ],
        [
          'id'    => '100022',
          'name'  => 'SMKN 2 Makassar'
        ],
      ];
    }

    return $data;
  }

  public function getSchoolByZone(): array
  {
    return [
      [
        'id'    => '000021',
        'name'  => 'SMAN 1 Makassar'
      ],
      [
        'id'    => '000022',
        'name'  => 'SMAN 2 Makassar'
      ],
    ];
  }

  public function getBoardingSchool(): array
  {
    return [
      [
        'id'    => '000021',
        'name'  => 'SMAN 1 Makassar'
      ],
      [
        'id'    => '000022',
        'name'  => 'SMAN 2 Makassar'
      ],
    ];
  }

  public function getDepartmentBySchool(string $schoolId): array
  {
    return match ($schoolId) {
      '100011' => [
        ["id" => '765432', "name" => "Pariwisata"],
        ["id" => '123456', "name" => "Akuntansi"]
      ],
      '100012' => [
        ["id" => '987654', "name" => "Teknik Otomotif"],
        ["id" => '456789', "name" => "Teknik Komputer dan Jaringan (TKJ)"]
      ],
      '100021' => [
        ["id" => '234567', "name" => "Bisnis dan Manajemen"],
        ["id" => '876543', "name" => "Teknik Komputer dan Jaringan (TKJ)"]
      ],
      '100022' => [
        ["id" => '543210', "name" => "Teknik Elektronika Industri"],
        ["id" => '789012', "name" => "Pariwisata"]
      ],
      default => []
    };
  }
}