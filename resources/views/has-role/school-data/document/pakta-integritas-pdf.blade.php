<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Pakta Integritas Sekolah</title>
        <link href="{{ asset('css/school/pakta-integritas-sekolah.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="bg-image-cover">
            <img src="{{ Storage::url('images/static/logo-bg-3.png') }}" alt="Background Image Logo" width="500px" height="500px">
        </div>
        <div class="page-1">
            <header>
                <h1>PAKTA INTEGRITAS SEKOLAH TUJUAN</h1>
            </header>
            <main>
                <div class="content">
                    <p>Surat pakta integritas ini diunduh pada: 07-05-2023 14:04:35 di website ppdb.sulselprov.go.id</p>
                    <p>Saya yang bertanda tangan dibawah ini</p>

                    <table class="table-info">
                        <tr>
                            <th class="title">Nama</th>
                            <td class="colon">:</td>
                            <td class="body">Ryan Rafli, S.Pd</td>
                        </tr>
                        <tr>
                            <th class="title">NIP</th>
                            <td class="colon">:</td>
                            <td class="body">1234567890</td>
                        </tr>
                        <tr>
                            <th class="title">Asal Sekolah</th>
                            <td class="colon">:</td>
                            <td class="body">SMA Negeri 1 Parepare</td>
                        </tr>
                    </table>

                    <p>Menyatakan bahwa data yang dikirimkan telah benar dan sesuai dengan fakta di lapangan tanpa ada rekayasa dan saya bertanggungjawab jika dikemudian hari ditemukan ketidaksesuaian
                        antara data yang dikirimkan dengan fakta.</p>

                    <table class="table-signature">
                        <tr>
                            <td class="head-1">Penanggung Jawab</td>
                            <td class="head-2">Pelaksana</td>
                        </tr>
                        <tr>
                            <td class="head-1">Kepala Sekolah</td>
                            <td class="head-2">Ketua PPDB</td>
                        </tr>
                        <div class="divider"></div>
                        <tr>
                            <td class="head-1 name">Ryan Rafli, S.Pd</td>
                            <td class="head-2 name">Muhammad Al-Muqtadir, S.pd</td>
                        </tr>
                        <tr>
                            <td class="head-1">NIP. 12345678903232</td>
                            <td class="head-2">NIP. 098765432123</td>
                        </tr>
                    </table>
                </div>
            </main>
            <footer>
                <p>Penerimaan Peserta Didik Baru Online Sulawesi Selatan 2024</p>
            </footer>
        </div>
        <div class="end-page" />
        <div class="bg-image-cover">
            <img src="{{ Storage::url('images/static/logo-bg-3.png') }}" alt="Background Image Logo" width="500px" height="500px">
        </div>
        <div class="page-2">
            <header>
                <h1>LAMPIRAN</h1>
            </header>
            <main>
                <h2>Data Sekolah</h2>
                <div class="content">
                    <table class="table-school-data">
                        <tr>
                            <td class="key">Nama Sekolah</td>
                            <td class="value">SMA Negeri 1 Parepare</td>
                        </tr>
                        <tr>
                            <td class="key">NPSN</td>
                            <td class="value">1234567890</td>
                        </tr>
                        <tr>
                            <td class="key">Kabupaten/Kota</td>
                            <td class="value">Kota Parepare</td>
                        </tr>
                        <tr>
                            <td class="key">Kecamatan</td>
                            <td class="value">Ujung</td>
                        </tr>
                        <tr>
                            <td class="key">Kelurahan</td>
                            <td class="value">Galung Maloang</td>
                        </tr>
                        <tr>
                            <td class="key">RT/RW</td>
                            <td class="value">001/002</td>
                        </tr>
                        <tr>
                            <td class="key">Alamat Jalan</td>
                            <td class="value">Jalan Cendrawasi No.40</td>
                        </tr>
                        <tr>
                            <td class="key">Koordinat</td>
                            <td class="value">-2.604199886322, 120.545303344727</td>
                        </tr>
                        <tr>
                            <td class="key">Peta Sekolah</td>
                            <td class="value"><img src="{{ Storage::url('images/static/dokumen-lokasi-sekolah.png') }}" alt="Lokasi Sekolah"></td>
                        </tr>
                        <tr>
                            <td class="key">Total Kuota</td>
                            <td class="value">910 Orang</td>
                        </tr>
                    </table>
                </div>
            </main>
            <footer>
                <p>Penerimaan Peserta Didik Baru Online Sulawesi Selatan 2024</p>
            </footer>
        </div>
        <div class="end-page" />
        <div class="bg-image-cover">
            <img src="{{ Storage::url('images/static/logo-bg-3.png') }}" alt="Background Image Logo" width="500px" height="500px">
        </div>
        <div class="page-3">
            <main>
                <h2>Kuota Sekolah</h2>
                <div class="content">
                    <table class="table-head-school-quota">
                        <tr>
                            <th class="key">Nama Jurusan</th>
                            <td class="value-1">Afirmasi </td>
                            <td class="value-2">Mutasi </td>
                            <td class="value-3">Anak Guru </td>
                            <td class="value-4">Anak Dudi </td>
                            <td class="value-5">Akademik </td>
                            <td class="value-6">Non Akademik </td>
                            <td class="value-7">Domisili Terdekat </td>
                            <td class="value-8">Total </td>
                        </tr>
                    </table>
                    @php
                        $default = 15;
                        $array = [
                            [
                                'id' => 1,
                                'jurusan' => 'Agribisnis Pengolahan Hasil Pertanian',
                            ],
                            [
                                'id' => 2,
                                'jurusan' => 'Agribisnis Perikanan',
                            ],
                            [
                                'id' => 3,
                                'jurusan' => 'Agribisnis Perikanan Air Payau dan Laut',
                            ],
                            [
                                'id' => 4,
                                'jurusan' => 'Agribisnis Perikanan Air Tawar',
                            ],
                            [
                                'id' => 5,
                                'jurusan' => 'Agribisnis Tanaman',
                            ],
                            [
                                'id' => 6,
                                'jurusan' => 'Agribisnis Tanaman Pangan dan Hortikultura',
                            ],
                            [
                                'id' => 7,
                                'jurusan' => 'Agribisnis Tanaman Perkebunan',
                            ],
                            [
                                'id' => 8,
                                'jurusan' => 'Agribisnis Ternak',
                            ],
                            [
                                'id' => 9,
                                'jurusan' => 'Agribisnis Ternak Ruminansia',
                            ],
                            [
                                'id' => 10,
                                'jurusan' => 'Agribisnis Ternak Unggas',
                            ],
                            [
                                'id' => 11,
                                'jurusan' => 'Agriteknologi Pengolahan Hasil Pertanian',
                            ],
                            [
                                'id' => 12,
                                'jurusan' => 'Airframe Power Plant',
                            ],
                            [
                                'id' => 13,
                                'jurusan' => 'Akuntansi dan Keuangan Lembaga',
                            ],
                            [
                                'id' => 14,
                                'jurusan' => 'Alat Mesin Pertanian',
                            ],
                        ];
                    @endphp
                    <table class="table-school-quota">
                        @foreach ($array as $item)
                            <tr>
                                <th class="key">{{ $item['jurusan'] }}</th>
                                <td class="value-1">32</td>
                                <td class="value-2">32</td>
                                <td class="value-3">32</td>
                                <td class="value-4">32</td>
                                <td class="value-5">32</td>
                                <td class="value-6">32</td>
                                <td class="value-7">32</td>
                                <td class="value-8">32</td>
                            </tr>
                        @endforeach
                        {{-- @for ($i = 0; $i < $default; $i++)
                        <tr>
                            <th class="key">Agribisnis Ternak Unggas</th>
                            <td class="value-1">32</td>
                            <td class="value-2">32</td>
                            <td class="value-3">32</td>
                            <td class="value-4">32</td>
                            <td class="value-5">32</td>
                            <td class="value-6">32</td>
                            <td class="value-7">32</td>
                            <td class="value-8">32</td>
                        </tr>
                    @endfor --}}
                    </table>
                </div>
            </main>
            <footer>
                <p>Penerimaan Peserta Didik Baru Online Sulawesi Selatan 2024</p>
            </footer>
        </div>
    </body>

</html>
