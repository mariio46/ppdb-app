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

        @include('has-role.school-data.partials.header')

        @include('has-role.school-data.partials.tab')

        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between" style="padding: 1rem;">
                <h4 class="card-title text-primary fw-bolder">Informasi Kuota Sekolah</h4>

                <div id="link-add-quota" style="display: none">
                    <div class="d-flex w-100 justify-content-end" id="anchor-add-quota"></div>
                </div>

                <div id="link-edit-quota" style="display: none">
                    <div class="d-flex w-100 justify-content-end" id="anchor-edit-quota"></div>
                </div>

                <div class="placeholder-glow" id="btn-loader-table"></div>
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
                select = $('.select2');

            var lock_button = $('#button-kunci-sekolah'),
                school_edit_link = $('#link-edit-sekolah');

            $.ajax({
                url: `/panel/data-sekolah/json/school/${school_id}`,
                method: 'get',
                dataType: 'json',
                beforeSend: () => {
                    headerSchoolAction('onLoad');

                    buttonTableLoader('onLoad');

                    tableLoaderAction('onLoad');
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
                    console.error('Failed to get data.', xhr.status);
                }
            })

            function loadQuota(school) {
                $.ajax({
                    url: `/panel/kuota-sekolah/json/quotas/${school.satuan_pendidikan}/${school.id}`,
                    method: 'get',
                    dataType: 'json',
                    success: (quota) => {
                        console.log('Kuota : ', quota);

                        buttonTableLoader('onSuccess');

                        if (quota.statusCode === 404) {
                            showLinkAddQuota();

                            tableLoaderAction('onEmpty');
                        }

                        if (quota.statusCode === 200) {
                            if (school.terverifikasi === 'belum_simpan') showLinkEditQuota(quota.data.id);

                            tableLoaderAction('onSuccess');

                            displayQuota(quota.data);
                        }
                    },
                    error: (xhr, status, error) => {
                        buttonTableLoader();
                        tableLoaderAction('onError', xhr);
                        toastr['error'](`Kuota Sekolah ${xhr.statusText} | ${xhr.status}`, 'Error!', {
                            positionClass: 'toast-top-right',
                        });
                        console.error('Failed to get kuota.', xhr.status);
                    }
                })
            }

            // -----------For Body-----------
            function tableLoaderAction(type, message = '') {
                switch (type) {
                    case 'onLoad':
                        $('#table-body-quota').addClass('placeholder-glow')
                        $('#value-jalur-afirmasi,#value-jalur-mutasi,#value-jalur-anak-guru,#value-jalur-akademik,#value-jalur-non-akademik,#value-jalur-zonasi,#value-jalur-boarding').text(
                                'Memuat Data')
                            .addClass('text-dark text-center w-100 placeholder fw-bolder');
                        break;
                    case 'onEmpty':
                        $('#value-jalur-afirmasi,#value-jalur-mutasi,#value-jalur-anak-guru,#value-jalur-akademik,#value-jalur-non-akademik,#value-jalur-zonasi,#value-jalur-boarding').text(
                            'Belum Ada Kuota').addClass('text-danger text-center fw-bolder').removeClass('placeholder w-100');
                        break;
                    case 'onSuccess':
                        $('#table-body-quota').removeClass('placeholder-glow')
                        $('#value-jalur-afirmasi,#value-jalur-mutasi,#value-jalur-anak-guru,#value-jalur-akademik,#value-jalur-non-akademik,#value-jalur-zonasi,#value-jalur-boarding').text('')
                            .removeClass('placeholder w-100 text-dark fw-normal');
                        break;
                    default:
                        $('#value-jalur-afirmasi,#value-jalur-mutasi,#value-jalur-anak-guru,#value-jalur-akademik,#value-jalur-non-akademik,#value-jalur-zonasi,#value-jalur-boarding').text(
                            message.statusText).addClass('text-danger text-center fw-bolder').removeClass('text-dark placeholder w-100');
                        break;
                }
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

            function buttonTableLoader(type) {
                switch (type) {
                    case 'onLoad':
                        $('#btn-loader-table').html(function() {
                            return `
                                <div class="placeholder-glow d-flex w-100 justify-content-end">
                                    <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                                </div>
                                `
                        });
                        break;

                    case 'onSuccess':
                        $('#btn-loader-table').html(``).removeClass('p-1').hide();
                        break;

                    default:
                        $('#btn-loader-table').html(``).removeClass('p-1').hide();
                        break;
                }
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
                        buttonForLockSchool(school)

                        // For Link Edit School
                        linkForEditingSchool(school)
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

            function buttonForLockSchool(school) {
                if (school.terverifikasi === 'belum_simpan') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                        <form id="form-kunci-sekolah" action="/panel/data-sekolah/${school.id}/${school.satuan_pendidikan}/lock" method="post">
                            @csrf
                            <button type="submit" id="modal-kunci-sekolah" class="btn btn-warning">
                                <x-tabler-lock-square-rounded />
                                Kunci Sekolah
                            </button>
                        </form>
                            `
                    });
                } else if (school.terverifikasi === 'simpan') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                            <button type="button" class="btn btn-danger" disabled>
                                <x-tabler-lock-square-rounded />
                                Sekolah Sudah Terkunci
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

            function linkForEditingSchool(school) {
                if (school.terverifikasi === 'belum_simpan') {
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
            // -----------For Header-----------
        })
    </script>
@endpush
