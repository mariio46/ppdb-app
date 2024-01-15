<?php

namespace App\Models;

use Illuminate\Support\Collection;

class Track
{
    protected function collection(): array
    {
        return [
            [
                'code' => 'AA',
                'type' => 'sma',
                'name' => 'Afirmasi',
            ],
            [
                'code' => 'AB',
                'type' => 'sma',
                'name' => 'Perpindahan Tugas Orang Tua',
            ],
            [
                'code' => 'AC',
                'type' => 'sma',
                'name' => 'Anak Guru',
            ],
            [
                'code' => 'AD',
                'type' => 'sma',
                'name' => 'Prestasi Akademik',
            ],
            [
                'code' => 'AE',
                'type' => 'sma',
                'name' => 'Prestasi Non Akademik',
            ],
            [
                'code' => 'AF',
                'type' => 'sma',
                'name' => 'Zonasi',
            ],
            [
                'code' => 'AG',
                'type' => 'sma',
                'name' => 'Boarding School',
            ],
            [
                'code' => 'KA',
                'type' => 'smk',
                'name' => 'Afirmasi',
            ],
            [
                'code' => 'KB',
                'type' => 'smk',
                'name' => 'Perpindahan Tugas Orang Tua',
            ],
            [
                'code' => 'KC',
                'type' => 'smk',
                'name' => 'Anak Guru',
            ],
            [
                'code' => 'KD',
                'type' => 'smk',
                'name' => 'Prestasi Akademik',
            ],
            [
                'code' => 'KE',
                'type' => 'smk',
                'name' => 'Prestasi Non Akademik',
            ],
            [
                'code' => 'KF',
                'type' => 'smk',
                'name' => 'Domisili Terdekat',
            ],
            [
                'code' => 'KG',
                'type' => 'smk',
                'name' => 'Anak DUDI',
            ],
        ];
    }

    public function get(string $type): Collection
    {
        return collect($this->collection())->where('type', '=', $type)->values();
    }
}
