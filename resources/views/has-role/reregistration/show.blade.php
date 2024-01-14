@extends('layouts.has-role.auth', ['title' => 'Detail Verifikasi Daftar Ulang'])

@section('styles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">

        @include('has-role.reregistration.partials.header')

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Pendaftaran Ulang SMA</h2>
            </div>
            <div class="card-body">
                <x-separator class="mb-2" marginY="0" />
                <h5 class="fw-bolder">Data Diri</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <table class="table table-borderless">
                            <x-three-row-info identifier="nama" label="Nama Lengkap" />
                            <x-three-row-info identifier="nisn" label="NISN" />
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-borderless">
                            <x-three-row-info identifier="jenis_kelamin" label="Jenis Kelamin" />
                            <x-three-row-info identifier="sekolah_asal" label="Asal Sekolah" />
                        </table>
                    </div>
                </div>
                <x-separator class="my-2" marginY="0" />
                <h5 class="fw-bolder">Pendaftaran</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <table class="table table-borderless">
                            <x-three-row-info identifier="nama_jalur" label="Jalur Pendaftaran" />
                            <x-three-row-info identifier="jurusan_nama" label="Jurusan" />
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Verifikasi Daftar Ulang</h2>
            </div>
            <div class="card-body">
                <x-separator marginY="0" />
                <x-alert>Data yang telah diverifikasi tidak dapat diubah kembali</x-alert>
                <x-button color="success">Verifikasi Daftar Ulang Siswa</x-button>
            </div>
        </div>
    </div>
@endsection
