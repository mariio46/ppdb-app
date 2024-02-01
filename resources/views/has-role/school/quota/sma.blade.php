@extends('layouts.has-role.auth', ['title' => 'Kuota Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
@endsection

@section('styles')
    <style>
        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0 !important;
        }

        @media (min-width: 768px) {
            div.dataTables_wrapper div.dataTables_filter {
                text-align: left !important;
            }

            div.dataTables_wrapper div.dataTables_filter input,
            div.dataTables_wrapper div.dataTables_length label {
                margin-left: 0.75rem !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="content-body">

        @include('has-role.school.partials.school-header')

        @include('has-role.school.partials.school-tab')

        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder text-primary">Informasi Kuota Sekolah</h4>
            </div>
            <div class="card-body p-0">
                <table class="table table-quota">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">Jalur Pendaftaran</th>
                            <th class="text-center" scope="col">Jumlah Kuota Per-Jalur</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-quota">
                        @if ($unit == 'sma' || $unit == 'hbs')
                            <tr>
                                <td>Jalur Afirmasi</td>
                                <td id="value-jalur-afirmasi"></td>
                            </tr>
                            <tr>
                                <td>Jalur Perpindahan Tugas Orang Tua</td>
                                <td id="value-jalur-mutasi"></td>
                            </tr>
                            <tr>
                                <td>Jalur Anak Guru</td>
                                <td id="value-jalur-anak-guru"></td>
                            </tr>
                            <tr>
                                <td>Jalur Prestasi Akademik</td>
                                <td id="value-jalur-akademik"></td>
                            </tr>
                            <tr>
                                <td>Jalur Prestasi Non Akademik</td>
                                <td id="value-jalur-non-akademik"></td>
                            </tr>
                            <tr>
                                <td>Jalur Zonasi</td>
                                <td id="value-jalur-zonasi"></td>
                            </tr>
                        @endif
                        @if ($unit == 'fbs' || $unit == 'hbs')
                            <tr>
                                <td>Boarding School</td>
                                <td id="value-jalur-boarding"></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var school_id = '{{ $id }}',
            unit = '{{ $unit }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var table = $('.table-quota'),
                lock_button = $('#button-kunci-sekolah'),
                school_edit_link = $('#link-edit-sekolah'),
                select = $('.select2');

            $.ajax({
                url: `/panel/sekolah/json/single-school/${school_id}`,
                method: 'get',
                dataType: 'json',
                beforeSend: () => {
                    headerSchoolAction('onLoad');

                    showTableItemLoader();
                },
                success: (school) => {
                    console.log('Sekolah : ', school);
                    if (school.logo) $('#logo-sekolah').attr('src', school.logo);

                    headerSchoolAction('onSuccess', school);

                    loadQuota(school);
                },
                complete: () => {
                    headerSchoolAction('onComplete');
                },
                error: (xhr, status, error) => {
                    console.error('Failed to get data.', status, error);
                }
            })

            function loadQuota(school) {
                $.ajax({
                    url: `/panel/sekolah/json/quotas/${school.satuan_pendidikan}/${school.id}`,
                    method: 'get',
                    dataType: 'json',
                    success: (quota) => {
                        console.log('Kuota : ', quota);
                        if (quota.statusCode === 404) {
                            hideTableItemLoaderWhen404()
                        }
                        if (quota.statusCode === 200) {
                            hideTableItemLoaderWhen200()
                            displayQuota(quota.data);
                        }
                    },
                    error: (xhr, status, error) => {
                        hideTableItemLoaderWhen404(`${xhr.status} | ${error}`)
                        console.error('Failed to get kuota.', xhr.status, error);
                    }
                })
            }

            // -----------For Body-----------
            // Show Skeleton when fetching data
            function showTableItemLoader() {
                $('#table-body-quota').addClass('placeholder-glow')
                $('#value-jalur-afirmasi,#value-jalur-mutasi,#value-jalur-anak-guru,#value-jalur-akademik,#value-jalur-non-akademik,#value-jalur-zonasi,#value-jalur-boarding').text('Memuat Data')
                    .addClass('text-dark text-center w-100 placeholder fw-bolder')
            }

            // Hide Skeleton when fetching data is = 404
            function hideTableItemLoaderWhen404(text = 'Belum Ada Kuota') {
                $('#value-jalur-afirmasi,#value-jalur-mutasi,#value-jalur-anak-guru,#value-jalur-akademik,#value-jalur-non-akademik,#value-jalur-zonasi,#value-jalur-boarding').text(
                    text).addClass('text-danger text-center fw-bolder').removeClass('placeholder w-100')
            }

            // Hide Skeleton when fetching data is = 200
            function hideTableItemLoaderWhen200() {
                $('#table-body-quota').removeClass('placeholder-glow')
                $('#value-jalur-afirmasi,#value-jalur-mutasi,#value-jalur-anak-guru,#value-jalur-akademik,#value-jalur-non-akademik,#value-jalur-zonasi,#value-jalur-boarding').text('')
                    .removeClass('placeholder w-100 text-dark fw-normal')
            }

            // Displaying Quota in table
            function displayQuota(school_quota) {
                var boarding_total = parseInt(school_quota.bs_lakilaki) + parseInt(school_quota.bs_perempuan);
                $('#value-jalur-afirmasi').text(school_quota.afirmasi)
                $('#value-jalur-mutasi').text(school_quota.mutasi)
                $('#value-jalur-anak-guru').text(school_quota.anak_guru)
                $('#value-jalur-akademik').text(school_quota.akademik)
                $('#value-jalur-non-akademik').text(school_quota.non_akademik)
                $('#value-jalur-zonasi').text(school_quota.zonasi)
                $('#value-jalur-boarding').text(boarding_total)
            }
            // -----------/For Body-----------

            // -----------For Header-----------
            function headerSchoolAction(type, school) {
                switch (type) {
                    case 'onLoad':
                        // For Name, Npsn, And Status
                        $('#info-sekolah').addClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah,#status-sekolah').text('Memuat Data').addClass('placeholder col-12');

                        // Button Skeleton
                        buttonSkeletonForEditAndLockSchool()
                        break;

                    case 'onSuccess':
                        // For Name, Npsn, And Status
                        $('#nama-sekolah').html(() => {
                            var verifiedCheck = `<x-tabler-discount-check-filled style="color: #0369a1" />`;
                            let showVerified = school.terverifikasi === 'verifikasi' ? verifiedCheck : '';
                            return `${school.nama_sekolah} ${showVerified}`
                        });
                        $('#npsn-sekolah').text(school.npsn);
                        $('#status-sekolah').html(() => {
                            if (school.terverifikasi === 'belum_simpan') {
                                return `Status : <span class="badge bg-light-danger">Belum Simpan</span>`
                            }
                            if (school.terverifikasi === 'simpan') {
                                return `Status : <span class="badge bg-light-warning">Sudah Simpan</span>`
                            }
                            if (school.terverifikasi === 'verifikasi') {
                                return `Status : <span class="badge bg-light-success">Terverifikasi</span>`
                            }
                            return `Status : <span class="badge bg-light-warning">Status Tidak Diketahui</span>`
                        })

                        // For School Verified Button
                        buttonForVerifiyingSchool(school)

                        // For Link Edit School
                        linkForEditingSchoolInfo(school)
                        break;

                    case 'onComplete':
                        // For Name, Npsn, And Status
                        $('#info-sekolah').removeClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah,#status-sekolah').removeClass('placeholder');

                        // Button Skeleton
                        $('#btn-loader').html('');

                        break;
                }
            }

            function buttonSkeletonForEditAndLockSchool() {
                $("#btn-loader").html(() => {
                    return `
                            <div id="btn-loader" class="placeholder-glow d-flex gap-2">
                                <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                                <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                            </div>
                            `
                });
            }

            function buttonForVerifiyingSchool(school) {
                if (school.terverifikasi === 'simpan') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                            <button type="button" class="btn btn-warning">
                                <x-tabler-checkup-list />
                                Verifikasi Sekolah
                            </button>`
                    });
                } else if (school.terverifikasi === 'verifikasi') {
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

            function linkForEditingSchoolInfo(school) {
                if (school.terverifikasi === 'belum_simpan') {
                    school_edit_link.show()
                    school_edit_link.html(function() {
                        return `
                            <a href="/panel/sekolah/${school.id}/${school.satuan_pendidikan}/edit" class="btn btn-success">
                                <x-tabler-pencil />
                                Edit Info Sekolah
                            </a>`
                    })
                }
            }
            // -----------For Header-----------
        })
    </script>
@endpush
