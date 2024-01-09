<?php

namespace App\Http\Controllers\HasRole;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SchoolDataController extends Controller
{
    public function index(): View
    {
        $npsn = 2;
        $unit = 'SMA Half Boarding';

        return view('has-role.school-data.index', compact('npsn', 'unit'));
    }

    // --------------------------------------------------DATA JSON--------------------------------------------------
    protected function subdistrict(string $param): JsonResponse
    {
        $result = collect($this->subdistricts()->original)
            ->filter(fn ($subdistrict) => strpos($subdistrict['value'], $param) === 0)
            ->values();

        return response()->json($result);
    }

    protected function subdistricts(): JsonResponse
    {
        $subdistricts = [
            [
                'value' => '73.01.01',
                'label' => 'Kecamatan Benteng',
            ],
            [
                'value' => '73.01.02',
                'label' => 'Kecamatan Bontoharu',
            ],
            [
                'value' => '73.01.03',
                'label' => 'Kecamatan Bontomatene',
            ],
            [
                'value' => '73.01.04',
                'label' => 'Kecamatan Bontomanai',
            ],
            [
                'value' => '73.01.05',
                'label' => 'Kecamatan Bontosikuyu',
            ],
            [
                'value' => '73.01.06',
                'label' => 'Kecamatan Pasimasunggu',
            ],
            [
                'value' => '73.01.07',
                'label' => 'Kecamatan Pasimarannu',
            ],
            [
                'value' => '73.01.08',
                'label' => 'Kecamatan Taka Bonerate',
            ],
            [
                'value' => '73.01.09',
                'label' => 'Kecamatan Pasilambena',
            ],
            [
                'value' => '73.01.10',
                'label' => 'Kecamatan Pasimasunggu Timur',
            ],
            [
                'value' => '73.01.11',
                'label' => 'Kecamatan Buki',
            ],
            [
                'value' => '73.02.01',
                'label' => 'Kecamatan Gantorang',
            ],
            [
                'value' => '73.02.02',
                'label' => 'Kecamatan Ujung Bulu',
            ],
            [
                'value' => '73.02.03',
                'label' => 'Kecamatan Bonto Bahari',
            ],
            [
                'value' => '73.02.04',
                'label' => 'Kecamatan Bonto Tiro',
            ],
            [
                'value' => '73.02.05',
                'label' => 'Kecamatan Herlang',
            ],
            [
                'value' => '73.02.06',
                'label' => 'Kecamatan Kajang',
            ],
            [
                'value' => '73.02.07',
                'label' => 'Kecamatan Bulukumpa',
            ],
            [
                'value' => '73.02.08',
                'label' => 'Kecamatan Kindang',
            ],
            [
                'value' => '73.02.09',
                'label' => 'Kecamatan Ujungloe',
            ],
            [
                'value' => '73.02.10',
                'label' => 'Kecamatan Rilauale',
            ],
            [
                'value' => '73.03.01',
                'label' => 'Kecamatan Bissappu',
            ],
            [
                'value' => '73.03.02',
                'label' => 'Kecamatan Bantaeng',
            ],
            [
                'value' => '73.03.03',
                'label' => 'Kecamatan Eremerasa',
            ],
            [
                'value' => '73.03.04',
                'label' => 'Kecamatan Tompo Bulu',
            ],
            [
                'value' => '73.03.05',
                'label' => 'Kecamatan Pajukukang',
            ],
            [
                'value' => '73.03.06',
                'label' => 'Kecamatan Uluere',
            ],
            [
                'value' => '73.03.07',
                'label' => 'Kecamatan Gantarang Keke',
            ],
            [
                'value' => '73.03.08',
                'label' => 'Kecamatan Sinoa',
            ],
            [
                'value' => '73.04.01',
                'label' => 'Kecamatan Bangkala',
            ],
            [
                'value' => '73.04.02',
                'label' => 'Kecamatan Tamalatea',
            ],
            [
                'value' => '73.04.03',
                'label' => 'Kecamatan Binamu',
            ],
            [
                'value' => '73.04.04',
                'label' => 'Kecamatan Batang',
            ],
            [
                'value' => '73.04.05',
                'label' => 'Kecamatan Kelara',
            ],
            [
                'value' => '73.04.06',
                'label' => 'Kecamatan Bangkala Barat',
            ],
            [
                'value' => '73.04.07',
                'label' => 'Kecamatan Bontoramba',
            ],
            [
                'value' => '73.04.08',
                'label' => 'Kecamatan Turatea',
            ],
            [
                'value' => '73.04.09',
                'label' => 'Kecamatan Arungkeke',
            ],
            [
                'value' => '73.04.10',
                'label' => 'Kecamatan Rumbia',
            ],
            [
                'value' => '73.04.11',
                'label' => 'Kecamatan Tarowang',
            ],
            [
                'value' => '73.05.01',
                'label' => 'Kecamatan Mappakasunggu',
            ],
            [
                'value' => '73.05.02',
                'label' => 'Kecamatan Mangarabombang',
            ],
            [
                'value' => '73.05.03',
                'label' => 'Kecamatan Polombangkeng Selatan',
            ],
            [
                'value' => '73.05.04',
                'label' => 'Kecamatan Polombangkeng Utara',
            ],
            [
                'value' => '73.05.05',
                'label' => 'Kecamatan Galesong Selatan',
            ],
            [
                'value' => '73.05.06',
                'label' => 'Kecamatan Galesong Utara',
            ],
            [
                'value' => '73.05.07',
                'label' => 'Kecamatan Pattallassang',
            ],
            [
                'value' => '73.05.08',
                'label' => 'Kecamatan Sanrobone',
            ],
            [
                'value' => '73.05.09',
                'label' => 'Kecamatan Galesong',
            ],
            [
                'value' => '73.05.10',
                'label' => 'Kecamatan Kepulauan Tanakeke',
            ],
            [
                'value' => '73.06.01',
                'label' => 'Kecamatan Bontonompo',
            ],
            [
                'value' => '73.06.02',
                'label' => 'Kecamatan Bajeng',
            ],
            [
                'value' => '73.06.03',
                'label' => 'Kecamatan Tompobullu',
            ],
            [
                'value' => '73.06.04',
                'label' => 'Kecamatan Tinggimoncong',
            ],
            [
                'value' => '73.06.05',
                'label' => 'Kecamatan Parangloe',
            ],
            [
                'value' => '73.06.06',
                'label' => 'Kecamatan Bontomarannu',
            ],
            [
                'value' => '73.06.07',
                'label' => 'Kecamatan Palangga',
            ],
            [
                'value' => '73.06.08',
                'label' => 'Kecamatan Somba Upu',
            ],
            [
                'value' => '73.06.09',
                'label' => 'Kecamatan Bungaya',
            ],
            [
                'value' => '73.06.10',
                'label' => 'Kecamatan Tombolopao',
            ],
            [
                'value' => '73.06.11',
                'label' => 'Kecamatan Biringbulu',
            ],
            [
                'value' => '73.06.12',
                'label' => 'Kecamatan Barombong',
            ],
            [
                'value' => '73.06.13',
                'label' => 'Kecamatan Pattalasang',
            ],
            [
                'value' => '73.06.14',
                'label' => 'Kecamatan Manuju',
            ],
            [
                'value' => '73.06.15',
                'label' => 'Kecamatan Bontolempangang',
            ],
            [
                'value' => '73.06.16',
                'label' => 'Kecamatan Bontonompo Selatan',
            ],
            [
                'value' => '73.06.17',
                'label' => 'Kecamatan Parigi',
            ],
            [
                'value' => '73.06.18',
                'label' => 'Kecamatan Bajeng Barat',
            ],
            [
                'value' => '73.07.01',
                'label' => 'Kecamatan Sinjai Barat',
            ],
            [
                'value' => '73.07.02',
                'label' => 'Kecamatan Sinjai Selatan',
            ],
            [
                'value' => '73.07.03',
                'label' => 'Kecamatan Sinjai Timur',
            ],
            [
                'value' => '73.07.04',
                'label' => 'Kecamatan Sinjai Tengah',
            ],
            [
                'value' => '73.07.05',
                'label' => 'Kecamatan Sinjai Utara',
            ],
            [
                'value' => '73.07.06',
                'label' => 'Kecamatan Bulupoddo',
            ],
            [
                'value' => '73.07.07',
                'label' => 'Kecamatan Sinjai Borong',
            ],
            [
                'value' => '73.07.08',
                'label' => 'Kecamatan Tellu Limpoe',
            ],
            [
                'value' => '73.07.09',
                'label' => 'Kecamatan Pulau Sembilan',
            ],
        ];

        return response()->json($subdistricts);
    }

    protected function regencies(): JsonResponse
    {
        $regencies = [
            [
                'value' => '73.01',
                'label' => 'Kabupaten Selayar',
            ],
            [
                'value' => '73.02',
                'label' => 'Kabupaten Bulukumba',
            ],
            [
                'value' => '73.03',
                'label' => 'Kabupaten Bantaeng',
            ],
            [
                'value' => '73.04',
                'label' => 'Kabupaten Jeneponto',
            ],
            [
                'value' => '73.05',
                'label' => 'Kabupaten Takalar',
            ],
            [
                'value' => '73.06',
                'label' => 'Kabupaten Gowa',
            ],
            [
                'value' => '73.07',
                'label' => 'Kabupaten Sinjai',
            ],
            [
                'value' => '73.08',
                'label' => 'Kabupaten Bone',
            ],
            [
                'value' => '73.09',
                'label' => 'Kabupaten Maros',
            ],
            [
                'value' => '73.10',
                'label' => 'Kabupaten Pangkajene Kepulauan',
            ],
            [
                'value' => '73.11',
                'label' => 'Kabupaten Barru',
            ],
            [
                'value' => '73.12',
                'label' => 'Kabupaten Soppeng',
            ],
            [
                'value' => '73.13',
                'label' => 'Kabupaten Wajo',
            ],
            [
                'value' => '73.14',
                'label' => 'Kabupaten Sidenreng Rappang',
            ],
            [
                'value' => '73.15',
                'label' => 'Kabupaten Pinrang',
            ],
            [
                'value' => '73.16',
                'label' => 'Kabupaten Enrekang',
            ],
            [
                'value' => '73.17',
                'label' => 'Kabupaten Luwu',
            ],
            [
                'value' => '73.18',
                'label' => 'Kabupaten Tana Toraja',
            ],
            [
                'value' => '73.22',
                'label' => 'Kabupaten Luwu Utara',
            ],
            [
                'value' => '73.24',
                'label' => 'Kabupaten Luwu Timur',
            ],
            [
                'value' => '73.26',
                'label' => 'Kabupaten Toraja Utara',
            ],
            [
                'value' => '73.71',
                'label' => 'Kota Makassar',
            ],
            [
                'value' => '73.72',
                'label' => 'Kota Parepare',
            ],
            [
                'value' => '73.73',
                'label' => 'Kota Palopo',
            ],
        ];

        return response()->json($regencies);
    }

    protected function school(int|string $id): JsonResponse
    {
        $school = collect($this->schools()->original)->firstWhere('id', $id);

        return response()->json($school);
    }

    protected function schools(): JsonResponse
    {
        $schools = [
            [
                'id' => 1,
                'npsn' => '567822034',
                'nama_sekolah' => 'SMAN 1 Parepare',
                'satuan_pendidikan' => [
                    'value' => 1,
                    'label' => 'SMA',
                ],
                'nama_kepsek' => 'Ryan Rafli',
                'nip_kepsek' => '027332479',
                'nama_kappdb' => 'Aldi Taher',
                'nip_kappdb' => '098434756',
                'kode_provinsi' => '73',
                'provinsi' => 'Sulawesi Selatan',
                'kode_kabupaten' => '72',
                'kabupaten' => 'Parepare',
                'kode_kecamatan' => '03',
                'kecamatan' => 'Soreang',
                'desa' => 'Bukit Indah',
                'rtrw' => '001/002',
                'alamat_jalan' => 'Jalan Industri kecil',
                'wilayah_id' => '73.72.03',
                'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
                'lintang' => '-4763287324',
                'bujur' => '687980903',
                'pakta_integritas' => 'pdf.pdf',
                'terverifikasi' => [
                    'value' => 1,
                    'label' => 'Belum Simpan',
                ],

            ],
            [
                'id' => 2,
                'npsn' => '098438493',
                'nama_sekolah' => 'SMAN 2 Parepare',
                'satuan_pendidikan' => [
                    'value' => 4,
                    'label' => 'SMA Half Boarding',
                ],
                'nama_kepsek' => 'Aldi Taher',
                'nip_kepsek' => '987298633',
                'nama_kappdb' => 'Rafi Muis',
                'nip_kappdb' => '024087483',
                'kode_provinsi' => '73',
                'provinsi' => 'Sulawesi Selatan',
                'kode_kabupaten' => '72',
                'kabupaten' => 'Parepare',
                'kode_kecamatan' => '03',
                'kecamatan' => 'Soreang',
                'desa' => 'Bukit Indah',
                'rtrw' => '001/002',
                'alamat_jalan' => 'Jalan Jendral Sudirman',
                'wilayah_id' => '73.72.01',
                'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
                'lintang' => '-4763287324',
                'bujur' => '687980903',
                'pakta_integritas' => 'pdf.pdf',
                'terverifikasi' => [
                    'value' => 2,
                    'label' => 'Sudah Simpan',
                ],
            ],
            [
                'id' => 3,
                'npsn' => '927527534',
                'nama_sekolah' => 'SMKN 3 Parepare',
                'satuan_pendidikan' => [
                    'value' => 2,
                    'label' => 'SMK',
                ],
                'nama_kepsek' => 'Zoelkifli',
                'nip_kepsek' => '342987839',
                'nama_kappdb' => 'Aslan Bjir',
                'nip_kappdb' => '034854980',
                'kode_provinsi' => '73',
                'provinsi' => 'Sulawesi Selatan',
                'kode_kabupaten' => '72',
                'kabupaten' => 'Parepare',
                'kode_kecamatan' => '03',
                'kecamatan' => 'Soreang',
                'desa' => 'Lakessi',
                'rtrw' => '001/002',
                'alamat_jalan' => 'Jalan Karaeng Burane',
                'wilayah_id' => '73.72.03',
                'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
                'lintang' => '-4763287324',
                'bujur' => '687980903',
                'pakta_integritas' => 'pdf.pdf',
                'terverifikasi' => [
                    'value' => 3,
                    'label' => 'Revisi',
                ],
            ],
            [
                'id' => 4,
                'npsn' => '578232001',
                'nama_sekolah' => 'SMAN 5 Parepare',
                'satuan_pendidikan' => [
                    'value' => 3,
                    'label' => 'SMA Boarding',
                ],
                'nama_kepsek' => 'Mawardi',
                'nip_kepsek' => '020728103',
                'nama_kappdb' => 'Edy Siswanto',
                'nip_kappdb' => '001238923',
                'kode_provinsi' => '73',
                'provinsi' => 'Sulawesi Selatan',
                'kode_kabupaten' => '72',
                'kabupaten' => 'Parepare',
                'kode_kecamatan' => '02',
                'kecamatan' => 'Ujung',
                'desa' => 'Mallusetasi',
                'rtrw' => '001/004',
                'alamat_jalan' => 'Lumpue',
                'wilayah_id' => '73.72.02',
                'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
                'lintang' => '-4763287324',
                'bujur' => '687980903',
                'pakta_integritas' => 'pdf.pdf',
                'terverifikasi' => [
                    'value' => 4,
                    'label' => 'Terverifikasi',
                ],
            ],
            [
                'id' => 5,
                'npsn' => '567822034',
                'nama_sekolah' => 'SMAN 1 Parepare',
                'satuan_pendidikan' => [
                    'value' => 1,
                    'label' => 'SMA',
                ],
                'nama_kepsek' => 'Ryan Rafli',
                'nip_kepsek' => '027332479',
                'nama_kappdb' => 'Aldi Taher',
                'nip_kappdb' => '098434756',
                'kode_provinsi' => '73',
                'provinsi' => 'Sulawesi Selatan',
                'kode_kabupaten' => '72',
                'kabupaten' => 'Parepare',
                'kode_kecamatan' => '03',
                'kecamatan' => 'Soreang',
                'desa' => 'Bukit Indah',
                'rtrw' => '001/002',
                'alamat_jalan' => 'Jalan Industri kecil',
                'wilayah_id' => '73.72.03',
                'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
                'lintang' => '-4763287324',
                'bujur' => '687980903',
                'pakta_integritas' => 'pdf.pdf',
                'terverifikasi' => [
                    'value' => 1,
                    'label' => 'Belum Simpan',
                ],

            ],
            [
                'id' => 6,
                'npsn' => '098438493',
                'nama_sekolah' => 'SMAN 2 Parepare',
                'satuan_pendidikan' => [
                    'value' => 4,
                    'label' => 'SMA Half Boarding',
                ],
                'nama_kepsek' => 'Aldi Taher',
                'nip_kepsek' => '987298633',
                'nama_kappdb' => 'Rafi Muis',
                'nip_kappdb' => '024087483',
                'kode_provinsi' => '73',
                'provinsi' => 'Sulawesi Selatan',
                'kode_kabupaten' => '72',
                'kabupaten' => 'Parepare',
                'kode_kecamatan' => '03',
                'kecamatan' => 'Soreang',
                'desa' => 'Bukit Indah',
                'rtrw' => '001/002',
                'alamat_jalan' => 'Jalan Jendral Sudirman',
                'wilayah_id' => '73.72.01',
                'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
                'lintang' => '-4763287324',
                'bujur' => '687980903',
                'pakta_integritas' => 'pdf.pdf',
                'terverifikasi' => [
                    'value' => 2,
                    'label' => 'Sudah Simpan',
                ],
            ],
            [
                'id' => 7,
                'npsn' => '927527534',
                'nama_sekolah' => 'SMKN 3 Parepare',
                'satuan_pendidikan' => [
                    'value' => 2,
                    'label' => 'SMK',
                ],
                'nama_kepsek' => 'Zoelkifli',
                'nip_kepsek' => '342987839',
                'nama_kappdb' => 'Aslan Bjir',
                'nip_kappdb' => '034854980',
                'kode_provinsi' => '73',
                'provinsi' => 'Sulawesi Selatan',
                'kode_kabupaten' => '72',
                'kabupaten' => 'Parepare',
                'kode_kecamatan' => '03',
                'kecamatan' => 'Soreang',
                'desa' => 'Lakessi',
                'rtrw' => '001/002',
                'alamat_jalan' => 'Jalan Karaeng Burane',
                'wilayah_id' => '73.72.03',
                'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
                'lintang' => '-4763287324',
                'bujur' => '687980903',
                'pakta_integritas' => 'pdf.pdf',
                'terverifikasi' => [
                    'value' => 3,
                    'label' => 'Revisi',
                ],
            ],
            [
                'id' => 8,
                'npsn' => '578232001',
                'nama_sekolah' => 'SMAN 5 Parepare',
                'satuan_pendidikan' => [
                    'value' => 3,
                    'label' => 'SMA Boarding',
                ],
                'nama_kepsek' => 'Mawardi',
                'nip_kepsek' => '020728103',
                'nama_kappdb' => 'Edy Siswanto',
                'nip_kappdb' => '001238923',
                'kode_provinsi' => '73',
                'provinsi' => 'Sulawesi Selatan',
                'kode_kabupaten' => '72',
                'kabupaten' => 'Parepare',
                'kode_kecamatan' => '02',
                'kecamatan' => 'Ujung',
                'desa' => 'Mallusetasi',
                'rtrw' => '001/004',
                'alamat_jalan' => 'Lumpue',
                'wilayah_id' => '73.72.02',
                'logo' => Storage::url('images/static/profil-sekolah-sma.png'),
                'lintang' => '-4763287324',
                'bujur' => '687980903',
                'pakta_integritas' => 'pdf.pdf',
                'terverifikasi' => [
                    'value' => 4,
                    'label' => 'Terverifikasi',
                ],
            ],
        ];

        return response()->json($schools);
    }
}
