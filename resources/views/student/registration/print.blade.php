<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Bukti Pendaftaran</title>
        <style>
            html {
                font-family: Arial, sans-serif;
                background: #fff;
            }

            body {
                /* padding: 1rem 5rem; */
            }

            p {
                margin-top: 0;
                margin-bottom: 0;
            }

            small {
                font-size: .7rem;
            }

            .background {
                height: 100%;
                width: 100%;
            }

            .background img {
                height: auto;
                width: 100%;
                object-fit: contain;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .content {
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0%;
                left: 0%;
                z-index: 2;
            }

            .kop {
                width: 100%; 
            }

            .kop-img {
                height: 3rem;
                width: auto;
            }

            .kop-title {
                text-align: right;
            }

            .data {
                width: 100%;
            }

            .data td {
                padding: .5rem 0;
                vertical-align: top;
            }

            .data-title {
                font-weight: bold;
                font-size: 1rem;
            }

            .data-title td {
                padding: 1rem 0 0 0;
            }
            
            .data-title td div {
                padding: 0.75rem 1rem;
                background: #f1f5f9;
            }

            .data-item {
                font-size: 0.8rem;
                font-weight: normal;
            }

            .data-item-label {
                width: 17%;
                font-style: italic;
            }

            .data-item-colon {
                width: 3%;
                padding-left: 0px;
                padding-right: 0px;
            }

            .data-item-data {
                width: auto;
                padding-left: 0;
            }

            .footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                padding: 10px;
            }

            .footer p {
                border-top: 2px solid #FDD100;
                font-size: .8rem;
                padding-top: .35rem;
                color: #2C82B5;
            }
        </style>
    </head>
    <body>
        <div class="background">
            <img src="{{ asset('img/logo-bg.png') }}" alt="background">
        </div>

        <div class="content">
            <table class="kop">
                <tr>
                    <td>
                        <img src="{{ asset('img/logo-ppdb.png') }}" alt="Logo" class="kop-img">
                    </td>
                    <td class="kop-title">
                        <h3>Bukti Pendaftaran<br>PPDB ONLINE SULSEL 2024</h3>
                    </td>
                </tr>
            </table>
    
            <table class="data">
                <tr class="data-title">
                    <td colspan="6">
                        <div>BIODATA CALON PESERTA DIDIK</div>
                    </td>
                </tr>
                <tr class="data-item">
                    <td class="data-item-label">NISN</td>
                    <td class="data-item-colon">:</td>
                    <td class="data-item-data">{{ session()->get('stu_nisn') }}</td>
                    <td class="data-item-label">Asal Sekolah</td>
                    <td class="data-item-colon">:</td>
                    <td class="data-item-data">{{ session()->get('stu_school') }}</td>
                </tr>
                <tr class="data-item">
                    <td class="data-item-label">Nama Lengkap</td>
                    <td class="data-item-colon">:</td>
                    <td class="data-item-data" style="padding-right: 1rem;">{{ session()->get('stu_name') }}</td>
                    <td class="data-item-label">Jenis Kelamin</td>
                    <td class="data-item-colon">:</td>
                    <td class="data-item-data">{{ session()->get('stu_gender') === 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
                </tr>
            </table>
            {{--  --}}
            <table class="data">
                <tr class="data-title">
                    <td colspan="3">
                        <div>JALUR DAN PILIHAN SEKOLAH</div>
                    </td>
                </tr>
                <tr class="data-item">
                    <td class="data-item-label">Jalur Pendaftaran</td>
                    <td class="data-item-colon">:</td>
                    <td class="data-item-data">{{ 'SM' . substr($data['kode_jalur'], 0, 1) . ' - Jalur ' . $name_track }}</td>
                </tr>
                <tr class="data-item">
                    <td class="data-item-label">Pilihan 1</td>
                    <td class="data-item-colon">:</td>
                    <td class="data-item-data">{{ $data['sekolah1_nama'] }}{{ substr($data['kode_jalur'], 0, 1) == 'K' && $data['jurusan1_nama'] != null ? ' - ' . $data['jurusan1_nama'] : '' }}</td>
                </tr>
                @if ($data['kode_jalur'] !== 'AC' && $data['kode_jalur'] !== 'AG')
                    <tr class="data-item">
                        <td class="data-item-label">Pilihan 2</td>
                        <td class="data-item-colon">:</td>
                        <td class="data-item-data">{{ $data['sekolah2_nama'] ?? '-' }}{{ substr($data['kode_jalur'], 0, 1) == 'K' && $data['jurusan2_nama'] != null ? ' - ' . $data['jurusan2_nama'] : '' }}</td>
                    </tr>
                    <tr class="data-item">
                        <td class="data-item-label">Pilihan 3</td>
                        <td class="data-item-colon">:</td>
                        <td class="data-item-data">{{ $data['sekolah3_nama'] ?? '-' }}{{ substr($data['kode_jalur'], 0, 1) == 'K' && $data['jurusan3_nama'] != null ? ' - ' . $data['jurusan3_nama'] : '' }}</td>
                    </tr>
                @endif
            </table>
            {{--  --}}
            @if ($data['kode_jalur'] == 'AA' || $data['kode_jalur'] == 'KA')
                <table class="data">
                    <tr class="data-title">
                        <td colspan="6">
                            <div>DATA PENUNJANG</div>
                        </td>
                    </tr>
                    <tr class="data-item">
                        <td class="data-item-label">Jenis Afirmasi</td>
                        <td class="data-item-colon">:</td>
                        <td class="data-item-data">{{ $data['jenis_afirmasi'] }}</td>
                        @if ($data['jenis_afirmasi'] === 'pkh')
                            <td class="data-item-label">Nomor PKH</td>
                            <td class="data-item-colon">:</td>
                            <td class="data-item-data">{{ $data['no_pkh'] }}</td>
                        @endif
                    </tr>
                </table>
            @endif

            @if ($data['kode_jalur'] == 'AE' || $data['kode_jalur'] == 'KE')
                <table class="data">
                    <tr class="data-title">
                        <td colspan="6">
                            <div>DATA PENUNJANG</div>
                        </td>
                    </tr>
                    <tr class="data-item">
                        <td class="data-item-label">Tingkat Kejuaraan</td>
                        <td class="data-item-colon">:</td>
                        <td class="data-item-data">{{ ucwords($data['prestasi_tingkat']) }}</td>
                        <td class="data-item-label">Jenis Kejuaraan</td>
                        <td class="data-item-colon">:</td>
                        <td class="data-item-data">{{ ucwords(str_replace('_', ' ', $data['prestasi_jenis'])) }}</td>
                    </tr>
                    <tr class="data-item">
                        <td class="data-item-label">Nama Kejuaraan</td>
                        <td class="data-item-colon">:</td>
                        <td class="data-item-data" style="padding-right: 1rem;">{{ $data['prestasi_nama'] }}</td>
                        <td class="data-item-label">Juara yang diraih</td>
                        <td class="data-item-colon">:</td>
                        <td class="data-item-data">{{ $data['prestasi_juara'] }}</td>
                    </tr>
                </table>
            @endif
            {{--  --}}
            <table class="data">
                <tr class="data-title">
                    <td colspan="3">
                        <div>SEKOLAH VERIFIKASI BERKAS</div>
                    </td>
                </tr>
                <tr class="data-item">
                    <td class="data-item-label">Nama Sekolah</td>
                    <td class="data-item-colon">:</td>
                    <td class="data-item-data">{{ $data['sekolah_verif_id'] === $data['sekolah1_id'] ? $data['sekolah1_nama'] : ($data['sekolah_verif_id'] === $data['sekolah2_id'] ? $data['sekolah2_nama'] : $data['sekolah3_nama']) }}</td>
                </tr>
            </table>

            <div style="margin-top: 2rem;">
                <p><small><span style="color: red;">*</span>Tanggal Cetak Bukti Pendaftaran, <span style="color: green;">{{ date('d-m-Y, H:i') . ' WITA' }}</span></small></p>
                <p><small><span style="color: red;">*</span>Untuk mendapatkan informasi lebih lanjut, follow instagram<span style="color: green;">@ppdb.sulsel2024</span></small></p>
                <p><small><span style="color: red;">*</span>atau kunjungi website resmi PPDB Sulsel 2024, <span style="color: green;">www.ppdb.sulselprov.go.id</span></small></p>
            </div>

            <div style="margin-top: 2rem;">
                <p><small><span style="color: red;">*Harap untuk tidak menyebarkan bukti pendaftaran ini ke pihak selain pendaftar dan sekolah tujuan</span></small></p>
            </div>
    
            <div class="footer">
                <p>Penerimaan Peserta Didik Baru Online Sulawesi Selatan 2024</p>
            </div>
        </div>
    </body>
</html>