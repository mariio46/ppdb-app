@extends('layouts.has-role.auth', ['title' => 'Info Kuota Sekolah'])

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

        @include('has-role.school-data.partials.header')

        @include('has-role.school-data.partials.tab')

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-quota">
                    <thead>
                        <div>
                            <div id="link-add-quota" style="display: none">
                                <div class="w-100 d-flex justify-content-end p-1" id="anchor-add-quota">
                                </div>
                            </div>
                            <div id="link-edit-quota" style="display: none">
                                <div class="w-100 d-flex justify-content-end p-1" id="anchor-edit-quota">
                                </div>
                            </div>
                            <div class="placeholder-glow p-1" id="btn-loader-table"></div>
                        </div>
                        <tr class="table-light">
                            <th scope="col">Jalur Pendaftaran</th>
                            <th class="text-center" scope="col">Jumlah Kuota Per-Jalur</th>
                        </tr>
                    </thead>
                    <tbody id="table-body-quota">
                        @if ($satuan_pendidikan == 'sma' || $satuan_pendidikan == 'hbs')
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
                        @if ($satuan_pendidikan == 'fbs' || $satuan_pendidikan == 'hbs')
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
        var school_id = '{{ $sekolah_id }}',
            unit = '{{ $satuan_pendidikan }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var table = $('.table-quota'),
                lock_button = $('#button-kunci-sekolah'),
                school_edit_link = $('#link-edit-sekolah'),
                select = $('.select2');

            var lock_button = $('#button-kunci-sekolah'),
                school_name = $('#nama-sekolah'),
                school_edit_link = $('#link-edit-sekolah');

            $.ajax({
                url: `/panel/data-sekolah/json/school/${school_id}`,
                method: 'get',
                dataType: 'json',
                beforeSend: function() {
                    buttonLoader();
                    buttonTableLoader();
                    showTableItemLoader();
                    headerSchoolAction('onLoad');
                },
                success: function(school) {
                    console.log('Sekolah : ', school);
                    if (school.logo) $('#logo-sekolah').attr('src', school.logo);
                    headerSchoolAction('onSuccess', school.nama_sekolah, school.npsn);

                    loadEditLink(school.terverifikasi);
                    loadLockSchoolButton(school.terverifikasi, school.id, school.satuan_pendidikan);

                    loadQuota(school);
                },
                complete: function() {
                    $('#btn-loader').html(``);
                    headerSchoolAction('onComplete');
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            })

            function loadQuota(school) {
                $.ajax({
                    url: `/panel/kuota-sekolah/json/quotas/${school.satuan_pendidikan}/${school.id}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(quota) {
                        console.log('Kuota : ', quota);
                        $('#btn-loader-table').html(``).removeClass('p-1');
                        if (quota.statusCode === 404) {
                            showLinkAddQuota()
                            hideTableItemLoaderWhen404()
                        }
                        if (quota.statusCode === 200) {
                            hideTableItemLoaderWhen200()
                            if (school.terverifikasi === 'belum_simpan') showLinkEditQuota(quota.data.id);
                            displayQuota(quota.data);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to get kuota.', status, error);
                    }
                })
            }

            // Show Link Create Quota when school still doesnt have quota
            function showLinkAddQuota() {
                $('#link-add-quota').show()
                $('#anchor-add-quota').html(() => `<a href="/panel/kuota-sekolah/create" class="btn btn-success">+ Tamabah Kuota</a>`)
            }

            // Show Link Edti Quota when school already have a quota
            function showLinkEditQuota(quota_id) {
                $('#link-edit-quota').show()
                $('#anchor-edit-quota').html(function() {
                    return `
                    <a href="/panel/kuota-sekolah/${quota_id}/edit" class="btn btn-success">
                        <x-tabler-pencil />
                        Edit Kuota Sekolah
                    </a>`
                })
            }

            // Show Skeleton when fetching data
            function showTableItemLoader() {
                $('#table-body-quota').addClass('placeholder-glow')
                $('#value-jalur-afirmasi,#value-jalur-mutasi,#value-jalur-anak-guru,#value-jalur-akademik,#value-jalur-non-akademik,#value-jalur-zonasi,#value-jalur-boarding').text('Memuat Data')
                    .addClass('text-dark text-center w-100 placeholder fw-bolder')
            }

            // Hide Skeleton when fetching data is = 404
            function hideTableItemLoaderWhen404() {
                $('#value-jalur-afirmasi,#value-jalur-mutasi,#value-jalur-anak-guru,#value-jalur-akademik,#value-jalur-non-akademik,#value-jalur-zonasi,#value-jalur-boarding').text(
                    'Belum Ada Kuota').addClass('text-danger text-center fw-bolder').removeClass('placeholder w-100')
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

            // Displaying Link Edit School when status === 'Belum simpan' 
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

            // Displaying Button Lock School when status === 'Belum simpan'
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

            function buttonTableLoader() {
                $('#btn-loader-table').html(function() {
                    return `
                        <div class="placeholder-glow d-flex w-100 justify-content-between gap-2">
                            <button class="btn btn-secondary disabled placeholder" style="width: 137px" aria-disabled="true"></button>
                            <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                        </div>
                        `
                });
            }

            function buttonLoader() {
                $("#btn-loader").html(function() {
                    return `
                        <div id="btn-loader" class="placeholder-glow d-flex gap-2">
                            <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                            <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                        </div>
                            `
                });
            }

            function headerSchoolAction(type, school_name = '', school_npsn = '') {
                switch (type) {
                    case 'onLoad':
                        $('#info-sekolah,#cover-logo-sekolah').addClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah,#logo-sekolah').text('Memuat Data').addClass('placeholder col-12');
                        break;
                    case 'onSuccess':
                        $('#nama-sekolah').text(school_name);
                        $('#npsn-sekolah').text(school_npsn);
                        break;
                    case 'onComplete':
                        $('#info-sekolah,#cover-logo-sekolah').removeClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah,#logo-sekolah').removeClass('placeholder');
                        break;
                }
            }
        })
    </script>
@endpush
