@extends('layouts.has-role.auth', ['title' => 'Detail Verifikasi Manual'])

@section('styles')
    <style>
        .w-35 {
            width: 35%;
        }

        .w-5 {
            width: 5%;
        }

        .w-60 {
            width: 60%;
        }
    </style>
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
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Nama Lengkap</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">Freyanashifa Jayawardhana</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">NISN</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">0123456789</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">NIK</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">1234567890123456</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Asal Sekolah</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">SMP Negeri 1 Sukamaju</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Jenis Kelamin</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">Perempuan</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Tempat Lahir</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%">Sukamaju</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Tanggal Lahir</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%">29 Januari 2009</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Nomor HP</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%">081234567890</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;"><i>Email</i></td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%">freya.jayawardhana@email.com</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top">
                    <h4 class="text-primary mb-2 ms-2">Data Alamat</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Kabupaten/Kota</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">LUWU UTARA</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Kecamatan</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">SUKAMAJU SELATAN</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Desa/Kelurahan</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">MULYOREJO</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Dusun/Lingkungan</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">PURWOSARI</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pe-0" style="width: 35%;">RT/RW</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">001/001</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Alamat Jalan</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">jl. Sedap Malam No. 5 A</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top">
                    <h4 class="text-primary mb-2 ms-2">Data Orang Tua</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Nama Ibu Kandung</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">Fulanah</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Nomor HP</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">081234567890</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Nama Ayah</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">Fulan</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Nomor HP</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">081234567890</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top">
                    <h4 class="text-primary mb-2 ms-2">Data Wali</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Nama Wali</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">-</td>
                                </tr>
                                <tr>
                                    <td class="pe-0" style="width: 35%;">Nomor HP</td>
                                    <td style="width: 5%;">:</td>
                                    <td class="ps-0" style="width: 60%;">-</td>
                                </tr>
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
                        <a class="btn btn-success ms-auto" href="{{ route('verifikasi.manual.score', ['id' => $id, 'semester' => '1']) }}"><x-tabler-pencil-minus style="width: 16px; height: 16px;" />
                            Edit Nilai</a>
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
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Bahasa Inggris</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Matematika</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">IPA</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">IPS</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
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
                                <tr>
                                    <td class="pe-0 w-35">Jalur Pendaftaran</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">Jalur Prestasi Akademik</td>
                                </tr>

                                {{-- for affirmation --}}
                                <tr>
                                    <td class="pe-0 w-35">Jenis Afirmasi</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">PKH</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35">Nomor PKH</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">1234567890123456</td>
                                </tr>

                                {{-- for non academic achievement --}}
                                <tr>
                                    <td class="pe-0 w-35">Jenis Prestasi</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">Beregu</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35">Tingkatan Prestasi</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">Internasional</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35">Juara</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">1</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35">Nama Prestasi</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">Olympic</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top">
                    <h4 class="text-primary ms-2 mb-2">Sekolah Pilihan</h4>

                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pe-0 w-35">Sekolah Pilihan 1</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">SMA NEGERI 1 MAKASSAR</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35 text-warning">Jurusan</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">TEKNIK KOMPUTER DAN JARINGAN</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35">Sekolah Pilihan 2</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">SMA NEGERI 2 MAKASSAR</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35 text-warning">Jurusan</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">TEKNIK KOMPUTER DAN JARINGAN</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35">Sekolah Pilihan 3</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">SMA NEGERI 3 MAKASSAR</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35 text-warning">Jurusan</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">TEKNIK KOMPUTER DAN JARINGAN</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- house point --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="text-primary mb-2 ms-2">Tambah Titik Rumah Calon Peserta Didik</h4>

                    <div class="row mb-2">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <tr>
                                    <td class="pe-0 w-35">Koordinat Rumah</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">-2.649099922180, 120.320098876953</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35">Jarak Rumah ke Sekolah 1</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">2,1 Km</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35">Jarak Rumah ke Sekolah 2</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">2,6 Km</td>
                                </tr>
                                <tr>
                                    <td class="pe-0 w-35">Jarak Rumah ke Sekolah 3</td>
                                    <td class="w-5">:</td>
                                    <td class="ps-0 w-60">12,1 Km</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <a class="btn btn-primary ms-2" href="{{ route('verifikasi.manual.map', [$id]) }}"><x-tabler-map-pin-filled style="width: 16px; height: 16px;" /> Masukkan Titik Rumah</a>
                </div>
            </div>

            {{-- color blind and height --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="ms-2 mb-2 text-primary">Buta Warna dan Tinggi Badan</h4>

                    <p class="ms-2 text-muted">ALURNYA HARUS DIPERBAIKI.</p>
                </div>
            </div>

            {{-- verification's check --}}
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-2">Verifikasi Pendaftaran</h4>

                    <div class="alert alert-primary p-1">
                        <p class="mb-0">Periksa kembali data calon peserta didik, Pastikan semuanya benar. Data yang sudah diverifikasi tidak dapat diubah lagi.</p>
                    </div>

                    <div class="d-flex">
                        <x-button class="me-1" color="success">Verifikasi Data Siswa</x-button>
                        <x-button class="" color="danger">Tolak Data</x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
