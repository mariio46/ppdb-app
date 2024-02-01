@extends('layouts.has-role.auth', ['title' => 'Data Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
@endsection

@section('content')
    <div class="content-body">

        {{-- Header Profile --}}
        @include('has-role.school-data.partials.header')

        {{-- Tab Menu --}}
        @include('has-role.school-data.partials.tab')

        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-primary">Informasi Detail Sekolah</h4>
            </div>
            <div class="card-body">
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
                        <table class="table table-borderless placeholder-glow">
                            <x-three-row-info identifier="npsn" label="NPSN" />
                            <x-three-row-info identifier="kabupaten" label="Kabupaten/Kota" />
                            <x-three-row-info identifier="kecamatan" label="Kecamatan" />
                            <x-three-row-info identifier="desa" label="Desa Kelurahan" />
                            <x-three-row-info identifier="rtrw" label="RT/RW" />
                            <x-three-row-info identifier="koordinat_sekolah" label="Koordinat Sekolah" />
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var school_id = '{{ $sekolah_id }}',
            unit = '{{ $satuan_pendidikan }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var lock_button = $('#button-kunci-sekolah'),
                school_name = $('#nama-sekolah'),
                school_edit_link = $('#link-edit-sekolah');

            $.ajax({
                url: `/panel/data-sekolah/json/school/${school_id}`,
                method: 'get',
                dataType: 'json',
                beforeSend: function() {
                    buttonLoader();
                    headerSchoolAction('onLoad');
                    detailSchoolSekeletonAction('onLoad');
                },
                success: function(school) {
                    console.log('Data Sekolah : ', school);
                    headerSchoolAction('onSuccess', school.nama_sekolah, school.npsn);

                    loadEditLink(school.terverifikasi);
                    loadLockSchoolButton(school.terverifikasi, school.id, school.satuan_pendidikan);

                    showSchoolDetail(school);
                },
                complete: function() {
                    $('#btn-loader').html(``);
                    detailSchoolSekeletonAction('onComplete');
                    headerSchoolAction('onComplete');
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            })

            function detailSchoolSekeletonAction(type) {
                switch (type) {
                    case 'onLoad':
                        $('#nama_sekolah,#nama_kepsek,#nip_kepsek,#nama_kappdb,#nip_kappdb,#alamat_jalan,#npsn,#kabupaten,#kecamatan,#desa,#rtrw,#koordinat_sekolah').text('Sedang Memuat Data')
                        $('#trnama_sekolah,#trnama_kepsek,#trnip_kepsek,#trnama_kappdb,#trnip_kappdb,#tralamat_jalan,#trnpsn,#trkabupaten,#trkecamatan,#trdesa,#trrtrw,#trkoordinat_sekolah,#cover-logo-sekolah')
                            .addClass('placeholder-glow')
                        $('#nama_sekolah,#nama_kepsek,#nip_kepsek,#nama_kappdb,#nip_kappdb,#alamat_jalan,#npsn,#kabupaten,#kecamatan,#desa,#rtrw,#koordinat_sekolah,#logo-sekolah').addClass(
                            'placeholder')
                        break;
                    case 'onComplete':
                        $('#trnama_sekolah,#trnama_kepsek,#trnip_kepsek,#trnama_kappdb,#trnip_kappdb,#tralamat_jalan,#trnpsn,#trkabupaten,#trkecamatan,#trdesa,#trrtrw,#trkoordinat_sekolah,#cover-logo-sekolah')
                            .removeClass('placeholder-glow');
                        $('#nama_sekolah,#nama_kepsek,#nip_kepsek,#nama_kappdb,#nip_kappdb,#alamat_jalan,#npsn,#kabupaten,#kecamatan,#desa,#rtrw,#koordinat_sekolah,#logo-sekolah').removeClass(
                            'placeholder');
                        break;
                }
            }

            function showSchoolDetail(school) {
                // Column 1
                $('#nama_sekolah').text(school.nama_sekolah)
                $('#nama_kepsek').text(school.nama_kepsek)
                $('#nip_kepsek').text(school.nip_kepsek)
                $('#nama_kappdb').text(school.nama_kappdb)
                $('#nip_kappdb').text(school.nip_kappdb)
                $('#alamat_jalan').text(school.alamat_jalan)
                if (school.logo) $('#logo-sekolah').attr('src', school.logo)

                // Column 2
                $('#npsn').text(school.npsn)
                $('#kabupaten').text(school.kabupaten)
                $('#kecamatan').text(school.kecamatan)
                $('#desa').text(school.desa)
                $('#rtrw').text(school.rtrw)
                $('#koordinat_sekolah').text(`${school.bujur} , ${school.lintang}`)
            }

            function buttonLoader() {
                $("#btn-loader").html(function() {
                    return `
                        <div id="btn-loader" class="placeholder-glow d-flex gap-2">
                            <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                            <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                        </div>`
                });
            }

            function loadEditLink(school_status) {
                if (school_status === 'belum_simpan') {
                    school_edit_link.show()
                    school_edit_link.html(function() {
                        return `
                            <a href="/panel/data-sekolah/edit" class="btn btn-success">
                                <x-tabler-pencil />
                                Edit Info Sekolah
                            </a>`
                    })
                }
            }

            function loadLockSchoolButton(school_status, school_id, unit) {
                if (school_status === 'belum_simpan') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                        <form id="form-kunci-sekolah" action="/panel/data-sekolah/${school_id}/${unit}/lock" method="post">
                            @csrf
                            <button type="submit" id="modal-kunci-sekolah" class="btn btn-warning">
                                <x-tabler-lock-square-rounded />
                                Kunci Sekolah
                            </button>
                        </form>
                            `
                    });
                } else if (school_status === 'simpan') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                            <button type="button" class="btn btn-danger" disabled>
                                <x-tabler-lock-square-rounded />
                                Sekolah Sudah Terkunci
                            </button>`
                    });
                } else if (school_status === 'verifikasi') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                            <button type="button" class="btn btn-success" disabled>
                                <x-tabler-discount-check />
                                Sekolah Sudah Terverifikasi
                            </button>`
                    });
                }
            }

            function headerSchoolAction(type, school_name = '', school_npsn = '') {
                switch (type) {
                    case 'onLoad':
                        $('#info-sekolah').addClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah').text('Memuat Data').addClass('placeholder col-12');
                        break;
                    case 'onSuccess':
                        $('#nama-sekolah').text(school_name);
                        $('#npsn-sekolah').text(school_npsn);
                        break;
                    case 'onComplete':
                        $('#info-sekolah').removeClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah').removeClass('placeholder');
                        break;
                }
            }
        })
    </script>
@endpush
