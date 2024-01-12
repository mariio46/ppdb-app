<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VerificationController extends Controller
{
    public function manual(): View
    {
        return view('has-role.verifications.manual');
    }

    public function manualGetData(): JsonResponse
    {
        $data = [
            [
                'id' => '1',
                'nama' => 'Muhammad Al Muqtadir',
                'nisn' => '6564553453',
                'jalur' => 'AA',
                'status' => 's',
            ],
            [
                'id' => '2',
                'nama' => 'Ryan Rafli',
                'nisn' => '5454224678',
                'jalur' => 'AC',
                'status' => 'b',
            ],
            [
                'id' => '3',
                'nama' => 'Ainun Putri',
                'nisn' => '10302913833',
                'jalur' => 'AE',
                'status' => 'b',
            ],
            [
                'id' => '4',
                'nama' => 'Edy Siswanto Syarif',
                'nisn' => '43242354815',
                'jalur' => 'AG',
                'status' => 'b',
            ],
            [
                'id' => '5',
                'nama' => 'Muh Rafie Muis',
                'nisn' => '42342356788',
                'jalur' => 'AE',
                'status' => 'b',
            ],
            [
                'id' => '6',
                'nama' => 'Vicky Giovaldi',
                'nisn' => '8787575645',
                'jalur' => 'AE',
                'status' => 't',
            ],
        ];

        return response()->json($data);
    }

    public function manualDetail(string $id): View
    {
        $data = [
            'id' => $id,
        ];

        return view('has-role.verifications.manual-detail', $data);
    }

    public function manualGetDetailData(string $id): JsonResponse
    {
        return response()->json([
            'status_code' => '200',
            'message' => 'success',
            'data' => [
                'id' => '1',
                'nama' => 'Freyanashifa Jayawardhana',
                'nisn' => '0123456789',
                'nik' => '1234567890123456',
                'asal_sekolah' => 'SMP NEGERI 2 SUKAMAJU',
                'pasfoto' => '/app-assets/images/profile.png',
                'jenis_kelamin' => 'p',
                'tempat_lahir' => 'Sukamaju',
                'tanggal_lahir' => '2009-11-10',
                'telepon' => '081234567890',
                'email' => 'freya.jayawardhana@email.com',
                'provinsi' => 'SULAWESI SELATAN',
                'kabupaten' => 'LUWU UTARA',
                'kecamatan' => 'SUKAMAJU SELATAN',
                'desa' => 'MULYOREJO',
                'dusun' => 'DS. PURWOSARI',
                'rtrw' => '001/001',
                'alamat_jalan' => 'jln. Sedap Malam No. 5 A',
                'nama_ibu_kandung' => 'Fulanah',
                'telepon_ibu' => '081234567891',
                'nama_ayah' => 'Fulan',
                'telepon_ayah' => '081234567892',
                'nama_wali' => '',
                'telepon_wali' => '',
                'sm1_bid' => '79',
                'sm1_big' => '69',
                'sm1_mtk' => '70',
                'sm1_ipa' => '92',
                'sm1_ips' => '94',
                'sm2_bid' => '73',
                'sm2_big' => '77',
                'sm2_mtk' => '95',
                'sm2_ipa' => '75',
                'sm2_ips' => '85',
                'sm3_bid' => '73',
                'sm3_big' => '82',
                'sm3_mtk' => '89',
                'sm3_ipa' => '66',
                'sm3_ips' => '71',
                'sm4_bid' => '90',
                'sm4_big' => '79',
                'sm4_mtk' => '92',
                'sm4_ipa' => '69',
                'sm4_ips' => '89',
                'sm5_bid' => '91',
                'sm5_big' => '89',
                'sm5_mtk' => '77',
                'sm5_ipa' => '66',
                'sm5_ips' => '76',
                'jalur' => 'AE',
                'jenis_afirmasi' => 'disabilitas',
                'no_pkh' => '',
                'prestasi_jenis' => 'Beregu',
                'prestasi_tingkat' => 'Internasional',
                'prestasi_juara' => '1',
                'prestasi_nama' => 'Lomba Panjat Pinang Se Asia',
                'sekolah1' => 'SMA NEGERI 1 SUKAMAJU',
                'jurusan1' => 'Teknik Komputer dan Jaringan',
                'sekolah2' => 'SMA NEGERI 2 SUKAMAJU',
                'jurusan2' => 'Tata Boga',
                'sekolah3' => '',
                'jurusan3' => '',
                'verifikator' => 'Burhan',
                'sekolah_verif' => 'SMA NEGERI 2 SUKAMAJU',
                'lintang' => '-2.649099922180',
                'bujur' => '120.320098876953',
                'jarak1' => '',
                'jarak2' => '',
                'jarak3' => '',
                'syarat_butawarna' => 'n',
                'syarat_tinggibadan' => 'n',
                'status' => 'mendaftar',
                'alasan_tolak' => 'Mukanya menyebalkan.',
            ],
        ]);
    }

    public function manualScore(string $id, Request $request): View
    {
        $semester = $request->get('semester');

        if ($semester < 1 || $semester > 5) {
            $semester = 1;
        }

        $data = [
            'id' => $id,
            'semester' => $semester,
        ];

        return view('has-role.verifications.manual-score', $data);
    }

    public function manualMap(string $id): View
    {
        $data = [
            'id' => $id,
        ];

        return view('has-role.verifications.manual-map', $data);
    }

    public function manualAcceptVerification(string $id)
    {
        return redirect()->back();
    }

    public function manualDeclineVerification(string $id, Request $request)
    {
        $reason = $request->post('declineMsg');

        return redirect()->back();
    }

    // ------------------------------------------------------------

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
            (object) [
                'id' => 1,
                'name' => 'Al Muqtadir',
                'unit' => 'SMA',
                'nisn' => 6564553453,
                'path' => 'Prestasi Akademik',
                'status' => 'Belum daftar ulang',
            ],
            (object) [
                'id' => 2,
                'name' => 'Ryan Rafli',
                'unit' => 'SMK',
                'nisn' => 5454224678,
                'path' => 'Anak Guru',
                'status' => 'Belum daftar ulang',
            ],
            (object) [
                'id' => 3,
                'name' => 'Ainun Putri',
                'unit' => 'SMA Boarding',
                'nisn' => 10302913833,
                'path' => 'Prestasi Non Akademik',
                'status' => 'Belum daftar ulang',
            ],
            (object) [
                'id' => 4,
                'name' => 'Edy Siswanto Syarif',
                'unit' => 'SMA Half Boarding',
                'nisn' => 43242354815,
                'path' => 'Anak DUDI',
                'status' => 'Belum daftar ulang',
            ],
            (object) [
                'id' => 5,
                'name' => 'Muh Raiz Muis',
                'unit' => 'SMA',
                'nisn' => 42342356788,
                'path' => 'Prestasi Non Akademik',
                'status' => 'Belum daftar ulang',
            ],
            (object) [
                'id' => 6,
                'name' => 'Vicky Giovaldi',
                'unit' => 'SMA Half Boarding',
                'nisn' => 8787575645,
                'path' => 'Domisili Terdekat',
                'status' => 'Belum daftar ulang',
            ],
            (object) [
                'id' => 7,
                'name' => 'Muh Rafie Muis',
                'unit' => 'SMA',
                'nisn' => 2432545466,
                'path' => 'Perpindahan Tugas Ortu',
                'status' => 'Sudah daftar ulang',
            ],
            (object) [
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
