<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VerificationController extends Controller
{
    public function manual(): View
    {
        return view('has-role.verifications.manual');
    }

    public function reregistration(): View
    {
        return view('has-role.verifications.reregistration', [
            'collections' => $this->reRegistratioVerifications(),
        ]);
    }

    public function reregistrationShow($nisn): View
    {
        return view('has-role.verifications.reregistration-show', [
            'registrant' => $this->reRegistratioSingleVerification($nisn),
        ]);
    }

    protected function reRegistratioSingleVerification(int $nisn)
    {
        $reRegistratioVerifications = $this->reRegistratioVerifications()->where('nisn', $nisn);
        $data = json_decode($reRegistratioVerifications, true);
        foreach ($data as $key => $item) {
            $resgistrant = (object) $item;
        }
        return $resgistrant;
    }

    protected function reRegistratioVerifications()
    {
        return collect([
            (object)[
                'id' => 1,
                'name' => 'Al Muqtadir',
                'unit' => 'SMA',
                'nisn' => 6564553453,
                'path' => 'Prestasi Akademik',
                'status' => 'Belum daftar ulang',
            ],
            (object)[
                'id' => 2,
                'name' => 'Ryan Rafli',
                'unit' => 'SMK',
                'nisn' => 5454224678,
                'path' => 'Anak Guru',
                'status' => 'Belum daftar ulang',
            ],
            (object)[
                'id' => 3,
                'name' => 'Ainun Putri',
                'unit' => 'SMA Boarding',
                'nisn' => 10302913833,
                'path' => 'Prestasi Non Akademik',
                'status' => 'Belum daftar ulang',
            ],
            (object)[
                'id' => 4,
                'name' => 'Edy Siswanto Syarif',
                'unit' => 'SMA Half Boarding',
                'nisn' => 43242354815,
                'path' => 'Anak DUDI',
                'status' => 'Belum daftar ulang',
            ],
            (object)[
                'id' => 5,
                'name' => 'Muh Raiz Muis',
                'unit' => 'SMA',
                'nisn' => 42342356788,
                'path' => 'Prestasi Non Akademik',
                'status' => 'Belum daftar ulang',
            ],
            (object)[
                'id' => 6,
                'name' => 'Vicky Giovaldi',
                'unit' => 'SMA Half Boarding',
                'nisn' => 8787575645,
                'path' => 'Domisili Terdekat',
                'status' => 'Belum daftar ulang',
            ],
            (object)[
                'id' => 7,
                'name' => 'Muh Rafie Muis',
                'unit' => 'SMA',
                'nisn' => 2432545466,
                'path' => 'Perpindahan Tugas Ortu',
                'status' => 'Sudah daftar ulang',
            ],
            (object)[
                'id' => 8,
                'name' => 'Zhafran',
                'unit' => 'SMA',
                'nisn' => 34234234223,
                'path' => 'Anak DUDI',
                'status' => 'Sudah daftar ulang',
            ],
        ]);
    }
}
