@extends('layouts.has-role.auth', ['title' => 'Data Sekolah'])

@section('styles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">

        {{-- Header Profile --}}
        @include('has-role.school-data.partials.header')

        {{-- Tab Menu --}}
        @include('has-role.school-data.partials.tab')

        <div class="card">
            <div class="card-body">
                <section id="informasi-detail-sekolah">
                    <div class="d-flex align-items-center justify-content-between" style="margin-left: 2rem; margin-top: 1.5rem; margin-bottom: 1.5rem; margin-right: 2rem;">
                        <h4 class="text-primary">Informasi Detail Sekolah</h4>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="nama_sekolah" label="Nama Sekolah" />
                                <x-three-row-info identifier="nama_kepsek" label="Nama Kepala Sekolah" />
                                <x-three-row-info identifier="nip_kepsek" label="NIP Kepala Sekolah" />
                                <x-three-row-info identifier="nama_kappdb" label="Nama Ketua PPDB" />
                                <x-three-row-info identifier="nip_kappdb" label="NIP Ketua PPDB" />
                                <x-three-row-info identifier="alamat_jalan" label="Alamat Jalan" />
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="npsn" label="NPSN" />
                                <x-three-row-info identifier="kabupaten" label="Kabupaten/Kota" />
                                <x-three-row-info identifier="kecamatan" label="Kecamatan" />
                                <x-three-row-info identifier="desa" label="Desa Kelurahan" />
                                <x-three-row-info identifier="rtrw" label="RT/RW" />
                                <x-three-row-info identifier="koordinat_sekolah" label="Koordinat Sekolah" />
                            </table>
                        </div>
                    </div>
                </section>

                <x-separator marginY="3" />

                <section id="lokasi-sekolah">
                    <h4 class="text-primary" style="margin-left: 2rem; margin-top: 1.5rem">Lokasi Sekolah</h4>
                    <div class="w-100 p-2">
                        <img class="w-100" src="{{ Storage::url('images/static/lokasi-sekolah.png') }}" alt="Lokasi Sekolah">
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
    <script>
        var school_id = '{{ $sekolah_id }}',
            unit = '{{ $satuan_pendidikan }}';
    </script>
    <script>
        $(function() {
            'use strict';

            $.ajax({
                url: `/panel/data-sekolah/json/school/${school_id}`,
                method: 'get',
                dataType: 'json',
                success: function(school) {
                    console.log('Data Sekolah : ', school);
                    // // Column 1
                    $('#nama_sekolah').text(school.nama_sekolah)
                    $('#nama_kepsek').text(school.nama_kepsek)
                    $('#nip_kepsek').text(school.nip_kepsek)
                    $('#nama_kappdb').text(school.nama_kappdb)
                    $('#nip_kappdb').text(school.nip_kappdb)
                    $('#alamat_jalan').text(school.alamat_jalan)

                    // // Column 2
                    $('#npsn').text(school.npsn)
                    $('#kabupaten').text(school.kabupaten)
                    $('#kecamatan').text(school.kecamatan)
                    $('#desa').text(school.desa)
                    $('#rtrw').text(school.rtrw)
                    $('#koordinat_sekolah').text(`${school.bujur} , ${school.lintanh}`)
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            })
        })
    </script>
@endpush
