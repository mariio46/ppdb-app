@extends('layouts.has-role.auth', ['title' => 'Wilayah Zonasi Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
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
                <h4 class="card-title fw-bolder text-primary">Informasi Wilayah Zonasi Sekolah</h4>
            </div>
            <div class="card-body p-0">
                <table class="table table-school-zone">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">PROVINSI</th>
                            <th scope="col">KABUPATEN/KOTA</th>
                            <th scope="col">KECAMATAN</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
        $(() => {
            'use strict';

            var lock_button = $('#button-kunci-sekolah'),
                school_edit_link = $('#link-edit-sekolah');

            var select = $('.select2'),
                table = $('.table-school-zone');

            select.each(function() {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                    // the following code is used to disable x-scrollbar when click in select input and
                    // take 100% width in responsive also
                    dropdownAutoWidth: true,
                    width: '100%',
                    dropdownParent: $this.parent()
                });
            });

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

                    loadSchoolZones(school)
                },
                complete: () => {
                    headerSchoolAction('onComplete')
                },
                error: (xhr, status, error) => {
                    console.error('Failed to get kuota.', xhr.status, error);
                }
            });

            // Get School Zone
            function loadSchoolZones(school) {
                var edit_button_disabled = `<button disabled class="btn btn-primary"><x-tabler-lock />Lihat Detail</button>`;
                if (table.length) {
                    var tb = table.DataTable({
                        ajax: {
                            url: `/panel/sekolah/json/zones/${school.id}`,
                            dataSrc: (response) => {
                                console.log('List Wilayah Zonasi : ', response.data);
                                return response.statusCode === 200 && response.status === 'success' ? response.data : [];
                            },
                        },
                        columns: [{
                            render: (data, type, row) => row.mwilayah.nama_provinsi ?? '',
                        }, {
                            render: (data, type, row) => row.mwilayah.nama_kabupaten ?? '',
                        }, {
                            render: (data, type, row) => row.mwilayah.nama_kecamatan ?? '',
                        }],

                        columnDefs: [{
                            className: 'text-uppercase',
                            targets: [0, 1, 2]
                        }],

                        dom: `<"d-none d-md-block align-items-center"<"row g-0"<"col-6 d-flex"lf><"col-6"<"add-button">>>>
                            <"d-block d-md-none align-items-center"<"row"<"col-12"<"add-button-sm">><"col-12"f>>>
                            <"table-responsive"<t>>
                            <"row g-0"<"col-sm-12 col-md-5 ps-1"i><"col-sm-12 pe-1 col-md-7"p>>`,

                        ordering: false,
                        lengthMenu: [
                            [10, 25, 50, 100],
                            [10, 25, 50, "100"]
                        ],
                        language: {
                            lengthMenu: "_MENU_",
                            search: "",
                            searchPlaceholder: "Cari Wilayah Zonasi",
                            info: "Display _START_ to _END_ of _TOTAL_ entries",
                            paginate: {
                                // remove previous & next text from pagination
                                previous: '&nbsp;',
                                next: '&nbsp;'
                            }
                        },
                        initComplete: function() {
                            $('#DataTables_Table_0_length select').select2({
                                width: "50%",
                                minimumResultsForSearch: -1,
                                dropdownParent: $('#DataTables_Table_0_length select').parent()
                            });
                        },
                    });

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
