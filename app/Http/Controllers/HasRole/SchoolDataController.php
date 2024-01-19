<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use App\Repositories\HasRole\SchoolDataRepository as SchoolData;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class SchoolDataController extends Controller
{
    public function __construct(protected SchoolData $school_data)
    {
        // School Data Repository
    }

    public function index(): View
    {
        $satuan_pendidikan = session()->has('satuan_pendidikan') ? session()->get('satuan_pendidikan') : null;

        $sekolah_id = session()->get('sekolah_id');

        return view('has-role.school-data.index', compact('sekolah_id', 'satuan_pendidikan'));
    }

    public function edit(): View
    {
        $sekolah_id = session()->get('sekolah_id');

        return view('has-role.school-data.edit', compact('sekolah_id'));
    }

    // public function quota(): View
    // {
    //     $satuan_pendidikan = session()->has('satuan_pendidikan') ? session()->get('satuan_pendidikan') : null;

    //     $sekolah_id = session()->get('sekolah_id');

    //     return $unit == 2
    //         ? view('has-role.school-data.quota-smk', compact('npsn', 'unit'))
    //         : view('has-role.school-data.quota', compact('npsn', 'unit'));
    // }

    // --------------------------------------------------DATA API JSON--------------------------------------------------

    protected function school(string $school_id): JsonResponse
    {
        $school = $this->school_data->index(school_id: $school_id);

        return response()->json($school['data']);
    }

    // public function document(): View
    // {
    //     $npsn = $this->id;
    //     $unit = $this->unit;

    //     return view('has-role.school-data.document', compact('npsn', 'unit'));
    // }

    // public function addQuota(): View
    // {
    //     $npsn = $this->id;
    //     $unit = $this->unit;
    //     $json = $this->formDataPercentage();
    //     $default = 36;

    //     return $unit == 2
    //         ? view('has-role.school-data.add-quota-smk', compact('npsn', 'unit', 'json', 'default'))
    //         : view('has-role.school-data.add-quota', compact('npsn', 'unit'));
    // }

    // public function editQuota(string $identifier): View
    // {
    //     $json = $this->formDataPercentage();
    //     $default = 36;

    //     return view('has-role.school-data.edit-quota-smk', compact('identifier', 'json', 'default'));
    // }

    // // --------------------------------------------------DATA JSON--------------------------------------------------
    // protected function formDataPercentage(): string
    // {
    //     $percentage = [
    //         'afirmasi' => 0.1,
    //         'mutasi' => 0.2,
    //         'anak_guru' => 0.25,
    //         'akademik' => 0.25,
    //         'non_akademik' => 0.05,
    //         'zonasi' => 0.15,
    //     ];

    //     return json_encode($percentage);
    // }

    // protected function majorQuota(string $identifier): JsonResponse
    // {
    //     $quota = collect($this->schoolsQuota($this->unit)->original)->firstWhere('identifier', $identifier);

    //     return response()->json($quota);
    // }

    // protected function schoolsQuota($unit): JsonResponse
    // {
    //     $quota_smk = [
    //         [
    //             'label' => 'Teknik Komputer dan Jaringan',
    //             'identifier' => 479305,
    //             'value' => 144,
    //         ],
    //         [
    //             'label' => 'Teknik Kendaraan Ringan',
    //             'identifier' => 114565,
    //             'value' => 72,
    //         ],
    //         [
    //             'label' => 'Pemodelan dan Informasi Bangunan',
    //             'identifier' => 911899,
    //             'value' => 108,
    //         ],
    //         [
    //             'label' => 'Administrasi Perkantoran',
    //             'identifier' => 238415,
    //             'value' => 216,
    //         ],
    //         [
    //             'label' => 'Tata Rias dan Kecantikan',
    //             'identifier' => 598110,
    //             'value' => 252,
    //         ],
    //         [
    //             'label' => 'Perbankan dan Keuangan Syariah',
    //             'identifier' => 922020,
    //             'value' => 72,
    //         ],
    //     ];

    //     $quota_sma = [
    //         [
    //             // Afirmasi
    //             'label' => 'Jalur Afirmasi',
    //             'identifier' => 333992,
    //             'value' => 150,
    //         ],
    //         [
    //             // Mutasi
    //             'label' => 'Jalur Perpindahan Tugas Orang Tua',
    //             'identifier' => 476632,
    //             'value' => 75,
    //         ],
    //         [
    //             // Anak Guru
    //             'label' => 'Jalur Anak Guru',
    //             'identifier' => 939003,
    //             'value' => 100,
    //         ],
    //         [
    //             // Akademik
    //             'label' => 'Jalur Prestasi Akademik',
    //             'identifier' => 589846,
    //             'value' => 50,
    //         ],
    //         [
    //             // Non Akademik
    //             'label' => 'Jalur Prestasi Non Akademik',
    //             'identifier' => 891432,
    //             'value' => 200,
    //         ],
    //         [
    //             // Zonasi
    //             'label' => 'Jalur Zonasi',
    //             'identifier' => 505066,
    //             'value' => 250,
    //         ],
    //     ];

    //     $quota_sma_full_boarding = [
    //         [
    //             'label' => 'Jalur Boarding School',
    //             'identifier' => 919851,
    //             'value' => 500,
    //         ],
    //     ];

    //     $quota_sma_half_boarding = array_merge($quota_sma, $quota_sma_full_boarding);

    //     if ($unit == 1) {
    //         return response()->json($quota_sma);
    //     } elseif ($unit == 2) {
    //         return response()->json($quota_smk);
    //     } elseif ($unit == 3) {
    //         return response()->json($quota_sma_full_boarding);
    //     } elseif ($unit == 4) {
    //         return response()->json($quota_sma_half_boarding);
    //     } else {
    //         return response()->json(['error' => 'Quota Tidak Ditemukan'], 404);
    //     }
    // }

    // protected function school(int|string $id): JsonResponse
    // {
    //     $school = collect($this->schools()->original)->firstWhere('id', $id);

    //     return response()->json($school);
    // }

    // protected function schools(): JsonResponse
    // {
    //     $schools = [
    //         [
    //             'id' => 1,
    //             'npsn' => '567822034',
    //             'nama_sekolah' => 'SMAN 1 Parepare',
    //             'satuan_pendidikan' => [
    //                 'value' => 1,
    //                 'label' => 'SMA',
    //             ],
    //             'nama_kepsek' => 'Ryan Rafli',
    //             'nip_kepsek' => '027332479',
    //             'nama_kappdb' => 'Aldi Taher',
    //             'nip_kappdb' => '098434756',
    //             'kode_provinsi' => '73',
    //             'provinsi' => 'Sulawesi Selatan',
    //             'kode_kabupaten' => '72',
    //             'kabupaten' => 'Parepare',
    //             'kode_kecamatan' => '03',
    //             'kecamatan' => 'Soreang',
    //             'desa' => 'Bukit Indah',
    //             'rtrw' => '001/002',
    //             'alamat_jalan' => 'Jalan Industri kecil',
    //             'wilayah_id' => '73.72.03',
    //             'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
    //             'lintang' => '-4763287324',
    //             'bujur' => '687980903',
    //             'pakta_integritas' => 'pdf.pdf',
    //             'terverifikasi' => [
    //                 'value' => 1,
    //                 'label' => 'Belum Simpan',
    //             ],

    //         ],
    //         [
    //             'id' => 2,
    //             'npsn' => '098438493',
    //             'nama_sekolah' => 'SMAN 2 Parepare',
    //             'satuan_pendidikan' => [
    //                 'value' => 4,
    //                 'label' => 'SMA Half Boarding',
    //             ],
    //             'nama_kepsek' => 'Aldi Taher',
    //             'nip_kepsek' => '987298633',
    //             'nama_kappdb' => 'Rafi Muis',
    //             'nip_kappdb' => '024087483',
    //             'kode_provinsi' => '73',
    //             'provinsi' => 'Sulawesi Selatan',
    //             'kode_kabupaten' => '72',
    //             'kabupaten' => 'Parepare',
    //             'kode_kecamatan' => '03',
    //             'kecamatan' => 'Soreang',
    //             'desa' => 'Bukit Indah',
    //             'rtrw' => '001/002',
    //             'alamat_jalan' => 'Jalan Jendral Sudirman',
    //             'wilayah_id' => '73.72.01',
    //             'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
    //             'lintang' => '-4763287324',
    //             'bujur' => '687980903',
    //             'pakta_integritas' => 'pdf.pdf',
    //             'terverifikasi' => [
    //                 'value' => 2,
    //                 'label' => 'Sudah Simpan',
    //             ],
    //         ],
    //         [
    //             'id' => 3,
    //             'npsn' => '927527534',
    //             'nama_sekolah' => 'SMKN 3 Parepare',
    //             'satuan_pendidikan' => [
    //                 'value' => 2,
    //                 'label' => 'SMK',
    //             ],
    //             'nama_kepsek' => 'Zoelkifli',
    //             'nip_kepsek' => '342987839',
    //             'nama_kappdb' => 'Aslan Bjir',
    //             'nip_kappdb' => '034854980',
    //             'kode_provinsi' => '73',
    //             'provinsi' => 'Sulawesi Selatan',
    //             'kode_kabupaten' => '72',
    //             'kabupaten' => 'Parepare',
    //             'kode_kecamatan' => '03',
    //             'kecamatan' => 'Soreang',
    //             'desa' => 'Lakessi',
    //             'rtrw' => '001/002',
    //             'alamat_jalan' => 'Jalan Karaeng Burane',
    //             'wilayah_id' => '73.72.03',
    //             'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
    //             'lintang' => '-4763287324',
    //             'bujur' => '687980903',
    //             'pakta_integritas' => 'pdf.pdf',
    //             'terverifikasi' => [
    //                 'value' => 3,
    //                 'label' => 'Revisi',
    //             ],
    //         ],
    //         [
    //             'id' => 4,
    //             'npsn' => '578232001',
    //             'nama_sekolah' => 'SMAN 5 Parepare',
    //             'satuan_pendidikan' => [
    //                 'value' => 3,
    //                 'label' => 'SMA Boarding',
    //             ],
    //             'nama_kepsek' => 'Mawardi',
    //             'nip_kepsek' => '020728103',
    //             'nama_kappdb' => 'Edy Siswanto',
    //             'nip_kappdb' => '001238923',
    //             'kode_provinsi' => '73',
    //             'provinsi' => 'Sulawesi Selatan',
    //             'kode_kabupaten' => '72',
    //             'kabupaten' => 'Parepare',
    //             'kode_kecamatan' => '02',
    //             'kecamatan' => 'Ujung',
    //             'desa' => 'Mallusetasi',
    //             'rtrw' => '001/004',
    //             'alamat_jalan' => 'Lumpue',
    //             'wilayah_id' => '73.72.02',
    //             'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
    //             'lintang' => '-4763287324',
    //             'bujur' => '687980903',
    //             'pakta_integritas' => 'pdf.pdf',
    //             'terverifikasi' => [
    //                 'value' => 4,
    //                 'label' => 'Terverifikasi',
    //             ],
    //         ],
    //         [
    //             'id' => 5,
    //             'npsn' => '567822034',
    //             'nama_sekolah' => 'SMAN 1 Parepare',
    //             'satuan_pendidikan' => [
    //                 'value' => 1,
    //                 'label' => 'SMA',
    //             ],
    //             'nama_kepsek' => 'Ryan Rafli',
    //             'nip_kepsek' => '027332479',
    //             'nama_kappdb' => 'Aldi Taher',
    //             'nip_kappdb' => '098434756',
    //             'kode_provinsi' => '73',
    //             'provinsi' => 'Sulawesi Selatan',
    //             'kode_kabupaten' => '72',
    //             'kabupaten' => 'Parepare',
    //             'kode_kecamatan' => '03',
    //             'kecamatan' => 'Soreang',
    //             'desa' => 'Bukit Indah',
    //             'rtrw' => '001/002',
    //             'alamat_jalan' => 'Jalan Industri kecil',
    //             'wilayah_id' => '73.72.03',
    //             'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
    //             'lintang' => '-4763287324',
    //             'bujur' => '687980903',
    //             'pakta_integritas' => 'pdf.pdf',
    //             'terverifikasi' => [
    //                 'value' => 1,
    //                 'label' => 'Belum Simpan',
    //             ],

    //         ],
    //         [
    //             'id' => 6,
    //             'npsn' => '098438493',
    //             'nama_sekolah' => 'SMAN 2 Parepare',
    //             'satuan_pendidikan' => [
    //                 'value' => 4,
    //                 'label' => 'SMA Half Boarding',
    //             ],
    //             'nama_kepsek' => 'Aldi Taher',
    //             'nip_kepsek' => '987298633',
    //             'nama_kappdb' => 'Rafi Muis',
    //             'nip_kappdb' => '024087483',
    //             'kode_provinsi' => '73',
    //             'provinsi' => 'Sulawesi Selatan',
    //             'kode_kabupaten' => '72',
    //             'kabupaten' => 'Parepare',
    //             'kode_kecamatan' => '03',
    //             'kecamatan' => 'Soreang',
    //             'desa' => 'Bukit Indah',
    //             'rtrw' => '001/002',
    //             'alamat_jalan' => 'Jalan Jendral Sudirman',
    //             'wilayah_id' => '73.72.01',
    //             'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
    //             'lintang' => '-4763287324',
    //             'bujur' => '687980903',
    //             'pakta_integritas' => 'pdf.pdf',
    //             'terverifikasi' => [
    //                 'value' => 2,
    //                 'label' => 'Sudah Simpan',
    //             ],
    //         ],
    //         [
    //             'id' => 7,
    //             'npsn' => '927527534',
    //             'nama_sekolah' => 'SMKN 3 Parepare',
    //             'satuan_pendidikan' => [
    //                 'value' => 2,
    //                 'label' => 'SMK',
    //             ],
    //             'nama_kepsek' => 'Zoelkifli',
    //             'nip_kepsek' => '342987839',
    //             'nama_kappdb' => 'Aslan Bjir',
    //             'nip_kappdb' => '034854980',
    //             'kode_provinsi' => '73',
    //             'provinsi' => 'Sulawesi Selatan',
    //             'kode_kabupaten' => '72',
    //             'kabupaten' => 'Parepare',
    //             'kode_kecamatan' => '03',
    //             'kecamatan' => 'Soreang',
    //             'desa' => 'Lakessi',
    //             'rtrw' => '001/002',
    //             'alamat_jalan' => 'Jalan Karaeng Burane',
    //             'wilayah_id' => '73.72.03',
    //             'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
    //             'lintang' => '-4763287324',
    //             'bujur' => '687980903',
    //             'pakta_integritas' => 'pdf.pdf',
    //             'terverifikasi' => [
    //                 'value' => 3,
    //                 'label' => 'Revisi',
    //             ],
    //         ],
    //         [
    //             'id' => 8,
    //             'npsn' => '578232001',
    //             'nama_sekolah' => 'SMAN 5 Parepare',
    //             'satuan_pendidikan' => [
    //                 'value' => 3,
    //                 'label' => 'SMA Boarding',
    //             ],
    //             'nama_kepsek' => 'Mawardi',
    //             'nip_kepsek' => '020728103',
    //             'nama_kappdb' => 'Edy Siswanto',
    //             'nip_kappdb' => '001238923',
    //             'kode_provinsi' => '73',
    //             'provinsi' => 'Sulawesi Selatan',
    //             'kode_kabupaten' => '72',
    //             'kabupaten' => 'Parepare',
    //             'kode_kecamatan' => '02',
    //             'kecamatan' => 'Ujung',
    //             'desa' => 'Mallusetasi',
    //             'rtrw' => '001/004',
    //             'alamat_jalan' => 'Lumpue',
    //             'wilayah_id' => '73.72.02',
    //             'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
    //             'lintang' => '-4763287324',
    //             'bujur' => '687980903',
    //             'pakta_integritas' => 'pdf.pdf',
    //             'terverifikasi' => [
    //                 'value' => 4,
    //                 'label' => 'Terverifikasi',
    //             ],
    //         ],
    //     ];

    //     return response()->json($schools);
    // }
}
