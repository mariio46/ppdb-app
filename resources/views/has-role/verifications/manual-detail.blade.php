@extends('layouts.has-role.auth', ['title' => 'Detail Verifikasi Manual'])

@section('styles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Verifikasi Manual</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('verifikasi.manual') }}">
                                    Verifikasi Manual
                                </a>
                            </li>
                            <li class="breadcrumb-item active">
                                Lihat Detail Siswa
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body row">
        <div class="col-12">

            {{-- personal data --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="text-primary mb-2 ms-2">Data Diri</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="name" label="Nama Lengkap" />

                                <x-three-row-info identifier="nisn" label="NISN" />

                                <x-three-row-info identifier="nik" label="NIK" />

                                <x-three-row-info identifier="originSchool" label="Asal Sekolah" />

                                <x-three-row-info identifier="gender" label="Jenis Kelamin" />
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="birthplace" label="Tempat Lahir" />

                                <x-three-row-info identifier="birthday" label="Tanggal Lahir" />

                                <x-three-row-info identifier="phone" label="Nomor HP" />

                                <x-three-row-info identifier="email" label="Email" />
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top">
                    <h4 class="text-primary mb-2 ms-2">Data Alamat</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="province" label="Provinsi" />

                                <x-three-row-info identifier="city" label="Kabupaten/Kota" />

                                <x-three-row-info identifier="district" label="Kecamatan" />

                                <x-three-row-info identifier="village" label="Desa/Kelurahan" />
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="hamlet" label="Dusun/Lingkungan" />

                                <x-three-row-info identifier="rtrw" label="RT/RW" />

                                <x-three-row-info identifier="address" label="Alamat Jalan" />
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top">
                    <h4 class="text-primary mb-2 ms-2">Data Orang Tua</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="motherName" label="Nama Ibu Kandung" />

                                <x-three-row-info identifier="motherPhone" label="Nomor HP" />
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="fatherName" label="Nama Ayah" />

                                <x-three-row-info identifier="fatherPhone" label="Nomor HP" />
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top">
                    <h4 class="text-primary mb-2 ms-2">Data Wali</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="guardName" label="Nama Wali" />

                                <x-three-row-info identifier="guardPhone" label="Nomor HP" />
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- scores --}}
            <div class="card">
                <div class="card-body px-0">
                    <div class="d-flex align-items-center mb-2 px-2">
                        <h4 class="text-primary mb-0 ms-2">Data Nilai Rapor</h4>
                        <a class="btn btn-success ms-auto" id="btnScore" href="{{ route('verifikasi.manual.score', ['id' => $id, 'semester' => '1']) }}" style="display: none;">
                            <x-tabler-pencil-minus style="width: 16px; height: 16px;" />
                            Edit Nilai
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped border-bottom">
                            <thead>
                                <tr>
                                    <th class="py-2">Mata Pelajaran</th>
                                    <th class="text-center align-middle">Semester 1</th>
                                    <th class="text-center align-middle">Semester 2</th>
                                    <th class="text-center align-middle">Semester 3</th>
                                    <th class="text-center align-middle">Semester 4</th>
                                    <th class="text-center align-middle">Semester 5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2">Bahasa Indonesia</td>
                                    <td class="text-center text-success" id="sm1_bid">0</td>
                                    <td class="text-center text-success" id="sm2_bid">0</td>
                                    <td class="text-center text-success" id="sm3_bid">0</td>
                                    <td class="text-center text-success" id="sm4_bid">0</td>
                                    <td class="text-center text-success" id="sm5_bid">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Bahasa Inggris</td>
                                    <td class="text-center text-success" id="sm1_big">0</td>
                                    <td class="text-center text-success" id="sm2_big">0</td>
                                    <td class="text-center text-success" id="sm3_big">0</td>
                                    <td class="text-center text-success" id="sm4_big">0</td>
                                    <td class="text-center text-success" id="sm5_big">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Matematika</td>
                                    <td class="text-center text-success" id="sm1_mtk">0</td>
                                    <td class="text-center text-success" id="sm2_mtk">0</td>
                                    <td class="text-center text-success" id="sm3_mtk">0</td>
                                    <td class="text-center text-success" id="sm4_mtk">0</td>
                                    <td class="text-center text-success" id="sm5_mtk">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">IPA</td>
                                    <td class="text-center text-success" id="sm1_ipa">0</td>
                                    <td class="text-center text-success" id="sm2_ipa">0</td>
                                    <td class="text-center text-success" id="sm3_ipa">0</td>
                                    <td class="text-center text-success" id="sm4_ipa">0</td>
                                    <td class="text-center text-success" id="sm5_ipa">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">IPS</td>
                                    <td class="text-center text-success" id="sm1_ips">0</td>
                                    <td class="text-center text-success" id="sm2_ips">0</td>
                                    <td class="text-center text-success" id="sm3_ips">0</td>
                                    <td class="text-center text-success" id="sm4_ips">0</td>
                                    <td class="text-center text-success" id="sm5_ips">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- registration info --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="text-primary ms-2 mb-2">Pendaftaran</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="track" label="Jalur Pendaftaran" />

                                {{-- for affirmation --}}
                                <x-three-row-info identifier="affType" label="Jenis Afirmasi" hide="y" />

                                <x-three-row-info identifier="affNum" label="Nomor PKH" hide="y" />

                                {{-- for non academic achievement --}}
                                <x-three-row-info identifier="achType" label="Jenis Prestasi" hide="y" />

                                <x-three-row-info identifier="achLevel" label="Tingkatan Prestasi" hide="y" />

                                <x-three-row-info identifier="achChamp" label="Juara" hide="y" />

                                <x-three-row-info identifier="achName" label="Nama Prestasi" hide="y" />
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top">
                    <h4 class="text-primary ms-2 mb-2">Sekolah Pilihan</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="school1" label="Sekolah Pilihan 1" />

                                <x-three-row-info identifier="dep1" label="Jurusan" color="warning" hide="y" />

                                <x-three-row-info identifier="school2" label="Sekolah Pilihan 2" hide="y" />

                                <x-three-row-info identifier="dep2" label="Jurusan" color="warning" hide="y" />

                                <x-three-row-info identifier="school3" label="Sekolah Pilihan 3" hide="y" />

                                <x-three-row-info identifier="dep3" label="Jurusan" color="warning" hide="y" />
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- house point --}}
            <div class="card" id="cardMap" style="display: none;">
                <div class="card-body">
                    <h4 class="text-primary mb-2 ms-2">Tambah Titik Rumah Calon Peserta Didik</h4>

                    <div class="row mb-2">
                        <div class="col-lg-6 col-12 ps-3">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="coordinate" label="Koordinat Rumah" />

                                <x-three-row-info identifier="distance1" label="Jarak Rumah ke Sekolah 1" />
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="distance2" label="Jarak Rumah ke Sekolah 2" />

                                <x-three-row-info identifier="distance3" label="Jarak Rumah ke Sekolah 3" />
                            </table>
                        </div>
                    </div>

                    <a class="btn btn-primary ms-2" id="btnMap" href="{{ route('verifikasi.manual.map', [$id]) }}" style="display: none;">
                        <x-tabler-map-pin-filled style="width: 16px; height: 16px;" />
                        Masukkan Titik Rumah
                    </a>
                </div>
            </div>

            {{-- color blind and height --}}
            <div class="card" id="cardAdditional">
                <div class="card-body">
                    <h4 class="ms-2 mb-2 text-primary">Buta Warna dan Tinggi Badan</h4>

                    <p class="ms-2 text-muted">ALURNYA HARUS DIPERBAIKI.</p>
                </div>
            </div>

            {{-- verification's check --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-2">Verifikasi Pendaftaran</h4>

                    <div id="verification" style="display: none;">
                        <div class="alert alert-primary p-1">
                            <p class="mb-0">Periksa kembali data calon peserta didik, Pastikan semuanya benar. Data yang sudah diverifikasi tidak dapat diubah lagi.</p>
                        </div>

                        <div class="d-flex">
                            <x-button class="me-1" data-bs-toggle="modal" data-bs-target="#verifModal" color="success">Verifikasi Data Siswa</x-button>
                            {{-- modal --}}
                            <div class="modal fade text-start" id="verifModal" role="dialog" aria-modal="true" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-white">
                                            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="text-center">Verifikasi Data Siswa</h4>

                                            <p class="px-5 py-2">Apakah Anda yakin ingin memverifikasi data siswa ini? Data yang sudah diverifkasi tidak dapat diubah kembali.</p>

                                            <div class="d-flex justify-content-center mb-3">
                                                <form id="acceptForm" action="{{ route('verifikasi.manual.accept', [$id]) }}" method="post">
                                                    @csrf

                                                    <x-button class="me-1" type="submit" color="success">Ya, Verifikasi</x-button>
                                                </form>

                                                <x-button data-bs-dismiss="modal" type="button" variant="flat" color="secondary">Batalkan</x-button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <x-button data-bs-toggle="modal" data-bs-target="#declineModal" color="danger">Tolak Data</x-button>
                            {{-- modal --}}
                            <div class="modal fade text-start" id="declineModal" role="dialog" aria-modal="true" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-white">
                                            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body px-5">
                                            <h4 class="text-center">Tolak Verifikasi Data Siswa</h4>

                                            <p class="py-2">Apakah Anda yakin ingin menolak verifikasi data ini? Data yang sudah di tolak tidak bisa di kembalikan kembali.</p>

                                            <form id="declineForm" action="{{ route('verifikasi.manual.decline', [$id]) }}" method="post">
                                                @csrf
                                                <div class="mb-2">
                                                    <x-label for="declineMsg">Alasan Tolak Verifikasi</x-label>
                                                    <x-input id="declineMsg" name="declineMsg" placeholder="Masukkan alasan tolak.." />
                                                </div>

                                                <div class="d-flex justify-content-center mb-2">
                                                    <x-button class="me-1" type="submit" color="danger">Tolak</x-button>
                                                    <x-button data-bs-dismiss="modal" type="button" color="secondary" variant="flat">Batalkan</x-button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="verified" style="display: none;">
                        <div class="row mb-2">
                            <div class="col-lg-6 col-12">
                                <table class="table table-borderless">
                                    <x-three-row-info identifier="verificator" label="Nama Verifikator" />
                                </table>
                            </div>
                        </div>

                        <div class="alert alert-success p-1">
                            <p class="mb-0">Data calon peserta didik ini sudah diverifikasi.</p>
                        </div>

                        <a class="btn btn-success" href="">
                            <x-tabler-printer />
                            Download Bukti Pendaftaran
                        </a>
                    </div>

                    <div id="declined" style="display: none;">
                        <div class="row mb-2">
                            <div class="col-lg-6 col-12">
                                <table class="table table-borderless">
                                    <x-three-row-info identifier="dverificator" label="Nama Verifikator" />

                                    <x-three-row-info identifier="reason" label="Alasan Data Ditolak" />
                                </table>
                            </div>
                        </div>

                        <div class="alert alert-danger p-1">
                            <p class="mb-0">Data calon peserta didik ini ditolak.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
    <script>
        var id = '{{ $id }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var declineForm = $('#declineForm'),
                reasonInput = $('#declineMsg'),
                tracks = {
                    "AA": "Afirmasi",
                    "AB": "Perpindahan Tugas Orang Tua",
                    "AC": "Anak Guru",
                    "AD": "Prestasi Akademik",
                    "AE": "Prestasi Non Akademik",
                    "AF": "Zonasi",
                    "AG": "Boarding School",
                    "KA": "Afirmasi",
                    "KB": "Perpindahan Tugas Orang Tua",
                    "KC": "Anak Guru",
                    "KD": "Prestasi Akademik",
                    "KE": "Prestasi Non Akademik",
                    "KF": "Domisili Terdekat",
                    "KG": "Anak DUDI"
                };

            if (declineForm.length) {
                declineForm.validate({
                    rules: {
                        declineMsg: {
                            required: true
                        }
                    },
                    messages: {
                        declineMsg: {
                            required: "*Alasan Harus diisi."
                        }
                    }
                });
            }

            $.ajax({
                url: `/panel/verifikasi-manual/d/${id}/get-data-detail`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    let d = data.data;
                    console.log(d);

                    $('#name').text(d.nama);
                    $('#nisn').text(d.nisn);
                    $('#nik').text(d.nik);
                    $('#originSchool').text(d.sekolah_asal);
                    $('#gender').text(d.jenis_kelamin == 'p' ? 'Perempuan' : 'Laki-laki');
                    $('#birthplace').text(d.tempat_lahir);
                    $('#birthday').text(d.tanggal_lahir);
                    $('#phone').text(d.telepon);
                    $('#email').text(d.email);
                    $('#province').text(d.provinsi);
                    $('#city').text(d.kabupaten);
                    $('#district').text(d.kecamatan);
                    $('#village').text(d.desa);
                    $('#hamlet').text(d.dusun);
                    $('#rtrw').text(d.rtrw);
                    $('#address').text(d.alamat_jalan);
                    $('#motherName').text(d.nama_ibu);
                    $('#motherPhone').text(d.telepon_ibu);
                    $('#fatherName').text(d.nama_ayah);
                    $('#fatherPhone').text(d.telepon_ayah);
                    $('#guardName').text(d.nama_wali || '-');
                    $('#guardPhone').text(d.telepon_wali || '-');

                    getScore(d.siswa_id);

                    $('#track').text(tracks[d.kode_jalur]);
                    if (d.kode_jalur == 'AA' || d.kode_jalur == 'KA') { // affirmation
                        $('#traffType').show();
                        $('#affType').text(d.jenis_afirmasi);

                        if (d.jenis_afirmasi == 'pkh') {
                            $('#traffNum').show();
                            $('#affNum').text(d.no_pkh);
                        }
                    }
                    if (d.kode_jalur == 'AE' || d.kode_jalur == 'KE') { // non academic achievement
                        $('#trachType, #trachLevel, #trachChamp, #trachName').show();
                        $('#achType').text(capitalizeEachWord(d.prestasi_jenis));
                        $('#achLevel').text(capitalizeEachWord(d.prestasi_tingkat));
                        $('#achChamp').text(d.prestasi_juara);
                        $('#achName').text(d.prestasi_nama);
                    }

                    $('#school1').text(d.sekolah1);
                    if (d.kode_jalur != 'AC' && d.kode_jalur != 'AG' && d.kode_jalur != 'KC' && d.kode_jalur != 'KG') { // not teacher's child (A & K) and boarding school (A) and partner's child (K)
                        $('#trschool2, #trschool3').show();
                        $('#school2').text(d.sekolah2 || '-');
                        $('#school3').text(d.sekolah3 || '-');
                    }
                    if (d.kode_jalur.charAt(0) == 'K') {
                        $('#trdep1, #trdep2, #trdep3').show();
                        $('#dep1').text(d.jurusan1);
                        $('#dep2').text(d.jurusan2 || '-');
                        $('#dep3').text(d.jurusan3 || '-');
                    }

                    if (d.kode_jalur === 'AA' || d.kode_jalur === 'AB' || d.kode_jalur === 'AF' || d.kode_jalur === 'KF') {
                        $('#cardMap').show();

                        let coor = (d.lintang.length && d.bujur.length) ? `${d.lintang}, ${d.bujur}` : "-";

                        $('#coordinate').text(coor);
                        $('#distance1').text(d.jarak1 ? `${d.jarak1} m` : '-');
                        $('#distance2').text(d.jarak2 ? `${d.jarak2} m` : '-');
                        $('#distance3').text(d.jarak3 ? `${d.jarak3} m` : '-');
                    }

                    if (d.status == 'mendaftar') {
                        $('#verification, #btnScore, #btnMap').show();
                    } else if (d.status == 'dikembalikan') {
                        $('#declined').show();
                        $('#dverificator').text(d.verifikator);
                        $('#reason').text(d.alasan_tolak);
                    } else {
                        $('#verified').show();
                        $('#verificator').text(d.verifikator);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            });

            function getScore(student_id) {
                $.ajax({
                    url: `/panel/siswa/json/get-grades/${student_id}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        for (let i = 1; i <= 5; i++) {
                            $(`#sm${i}_bid`).text(data[`sm${i}_bid`]);
                            $(`#sm${i}_big`).text(data[`sm${i}_big`]);
                            $(`#sm${i}_mtk`).text(data[`sm${i}_mtk`]);
                            $(`#sm${i}_ipa`).text(data[`sm${i}_ipa`]);
                            $(`#sm${i}_ips`).text(data[`sm${i}_ips`]);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            function capitalizeEachWord(inputString) {
                let words = inputString.split("_");
                let capWord = words.map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ");
                return capWord;
            }
        });
    </script>
@endpush
