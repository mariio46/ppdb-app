@extends('layouts.has-role.auth', ['title' => 'Detail Sekolah'])

@section('styles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <div id="user-profile">
            @include('has-role.school.partials.school-header')
        </div>
        <div class="d-flex gap-md-2">
            @include('has-role.school.partials.school-tab')
        </div>
        <div class="card">
            <div class="card-body">
                <section id="informasi-detail-sekolah">
                    <div class="d-flex align-items-center justify-content-between" style="margin-left: 2rem; margin-top: 1.5rem; margin-bottom: 1.5rem; margin-right: 2rem;">
                        <h4 class="text-primary">Informasi Detail Sekolah</h4>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="nama_kepsek" label="Nama Kepala Sekolah" />
                                <x-three-row-info identifier="nip_kepsek" label="NIP Kepala Sekolah" />
                                <x-three-row-info identifier="nama_kappdb" label="Nama Ketua PPDB" />
                                <x-three-row-info identifier="nip_kappdb" label="NIP Ketua PPDB" />
                                <x-three-row-info identifier="alamat_jalan" label="Alamat Jalan" />
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-borderless">
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
        var npsn = '{{ $npsn }}',
            unit = '{{ $unit }}'
    </script>
    <script>
        $(function() {
            'use strict';

            $.ajax({
                url: `/panel/sekolah/json/single-school/${npsn}`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    // Column 1
                    $('#nama_kepsek').text(data.nama_kepsek)
                    $('#nip_kepsek').text(data.nip_kepsek)
                    $('#nama_kappdb').text(data.nama_kappdb)
                    $('#nip_kappdb').text(data.nip_kappdb)
                    $('#alamat_jalan').text(data.alamat_jalan)

                    // Column 2
                    $('#kabupaten').text(data.kabupaten)
                    $('#kecamatan').text(data.kecamatan)
                    $('#desa').text(data.desa)
                    $('#rtrw').text(data.rtrw)
                    $('#koordinat_sekolah').text(`${data.bujur} , ${data.lintang}`)
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            })
        })
    </script>
@endpush
