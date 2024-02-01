@extends('layouts.has-role.auth', ['title' => 'Dokumen Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
@endsection

@section('content')
    <div class="content-body">

        @include('has-role.school.partials.school-header')

        @include('has-role.school.partials.school-tab')

        <div class="card">
            <div class="card-header">
                <h4 class="card-title fw-bolder text-primary">Informasi Dokumen Sekolah</h4>
            </div>
            <div class="card-body">
                <div class="nav-vertical">
                    <ul class="nav nav-tabs nav-left flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fw-bold active" id="tab-pakta-integritas" data-bs-toggle="tab" href="#tabDocument1" role="tab" aria-controls="tabDocument1" aria-selected="true">
                                PAKTA INTEGRITAS
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" id="tab-sk-ppdb" data-bs-toggle="tab" href="#tabDocument2" role="tab" aria-controls="tabDocument2" aria-selected="true">
                                SK PPDB
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabDocument1" role="tabpanel" aria-labelledby="tab-pakta-integritas">
                            <section class="w-100">
                                <div class="d-inline-flex gap-1 align-items-center">
                                    <h3 class="mb-0">Dokumen Pakta Integritas</h3>
                                    <p class="mt-1" id="badge-status-dokumen-pakta-integritas"></p>
                                </div>
                                <div class="my-2 w-100">
                                    <div class="w-75">
                                        <iframe id="dokumen-pakta-integritas"></iframe>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="tab-pane" id="tabDocument2" role="tabpanel" aria-labelledby="tab-sk-ppdb">
                            <section class="w-100">
                                <div class="d-inline-flex gap-1 align-items-center">
                                    <h3 class="mb-0">Dokumen SK PPDB</h3>
                                    <p class="mt-1" id="badge-status-dokumen-sk-ppdb"></p>
                                </div>
                                <div class="my-2 w-100">
                                    <div class="w-75">
                                        <iframe id="dokumen-sk-ppdb" frameborder="0"></iframe>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
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
        $(() => {
            'use strict'

            var lock_button = $('#button-kunci-sekolah'),
                school_edit_link = $('#link-edit-sekolah');

            var badgePaktaIntegritas = $('#badge-status-dokumen-pakta-integritas'),
                badgeSkPpdb = $('#badge-status-dokumen-sk-ppdb');

            $.ajax({
                url: `/panel/sekolah/json/single-school/${school_id}`,
                method: 'get',
                dataType: 'json',
                beforeSend: () => {
                    headerSchoolAction('onLoad');
                },
                success: (school) => {
                    console.log('Sekolah : ', school);
                    if (school.logo) $('#logo-sekolah').attr('src', school.logo);

                    headerSchoolAction('onSuccess', school);

                    loadPaktaIntegritas(school.pakta_integritas);
                    loadSkPpdb(school.sk_ppdb);
                },
                complete: () => {
                    headerSchoolAction('onComplete')
                },
                error: (xhr, status, error) => {
                    console.error('Failed to get kuota.', xhr.status, error);
                }
            });

            // Load Dokumen Pakta Integritas
            function loadPaktaIntegritas(document) {
                if (document) {
                    $('#dokumen-pakta-integritas').attr('src', document);
                    $('#dokumen-pakta-integritas').addClass('w-100 min-vh-100');
                    badgePaktaIntegritas.html(function() {
                        return `<span class="badge bg-light-success">Terupload</span>`
                    })
                } else {
                    badgePaktaIntegritas.html(function() {
                        return `<span class="badge bg-light-warning">Belum upload</span>`
                    })
                }
            }

            function loadSkPpdb(document) {
                if (document) {
                    $('#dokumen-sk-ppdb').attr('src', document);
                    $('#dokumen-sk-ppdb').addClass('w-100 min-vh-100');
                    badgeSkPpdb.html(function() {
                        return `<span class="badge bg-light-success">Terupload</span>`
                    })
                } else {
                    badgeSkPpdb.html(function() {
                        return `<span class="badge bg-light-warning">Belum upload</span>`
                    })
                }
            }

            // -----------For Header-----------
            function headerSchoolAction(type, school = '') {
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
