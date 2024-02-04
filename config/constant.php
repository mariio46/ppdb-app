<?php

return [
    'TOTAL_ROMBEL' => env('SET_TOTAL_ROMBEL', 36),
    'PERCENTAGE_SMK' => [
        'afirmasi' => env('SET_SMK_PERCENTAGE_AFIRMASI', 0.1),
        'mutasi' => env('SET_SMK_PERCENTAGE_MUTASI', 0.2),
        'anak_guru' => env('SET_SMK_PERCENTAGE_ANAK_GURU', 0.25),
        'anak_dudi' => env('SET_SMK_PERCENTAGE_ANAK_DUDI', 0.05),
        'akademik' => env('SET_SMK_PERCENTAGE_AKADEMIK', 0.20),
        'non_akademik' => env('SET_SMK_PERCENTAGE_NON_AKADEMIK', 0.05),
        'zonasi' => env('SET_SMK_PERCENTAGE_ZONASI', 0.15),
    ],
    'PERCENTAGE_SMA' => [
        'afirmasi' => env('SET_SMA_PERCENTAGE_AFIRMASI', 0.1),
        'mutasi' => env('SET_SMA_PERCENTAGE_MUTASI', 0.1),
        'anak_guru' => env('SET_SMA_PERCENTAGE_ANAK_GURU', 0.1),
        'akademik' => env('SET_SMA_PERCENTAGE_AKADEMIK', 0.1),
        'non_akademik' => env('SET_SMA_PERCENTAGE_NON_AKADEMIK', 0.1),
        'zonasi' => env('SET_SMA_PERCENTAGE_ZONASI', 0.1),
    ],
];
