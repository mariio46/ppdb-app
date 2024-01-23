@extends('layouts.has-role.auth', ['title' => 'Info Kuota Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
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
        <div id="user-profile">
            @include('has-role.school-data.partials.header')
        </div>
        <div class="d-flex gap-md-2">
            @include('has-role.school-data.partials.tab')
        </div>
        <div class="card">
            {{-- <div class="card-header">
                <x-link :href="route('school-quota.create')">Tambah Kuota</x-link>
            </div> --}}
            <div class="card-body p-0">
                <table class="table table-quota">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">Nama Jurusan</th>
                            <th scope="col">Jumlah Kuota Jurusan</th>
                            <th scope="col">Detail</th>
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
        var school_id = '{{ $sekolah_id }}',
            unit = '{{ $satuan_pendidikan }}';
        // console.log('Id Sekolah : ', school_id);
        // console.log('Satuan Pendidikan Sekolah : ', unit);
    </script>
    <script>
        $(function() {
            'use strict';

            var table = $('.table-quota'),
                lock_button = $('#button-kunci-sekolah'),
                school_edit_link = $('#link-edit-sekolah'),
                select = $('.select2');

            $.ajax({
                url: `/panel/data-sekolah/json/school/${school_id}`,
                method: 'get',
                dataType: 'json',
                beforeSend: function() {
                    buttonLoader()
                },
                success: function(school) {
                    $("#btn-loader").hide();
                    console.log('Sekolah : ', school);
                    if (school.logo) $('#logo-sekolah').attr('src', school.logo);

                    loadEditLink(school.terverifikasi);
                    loadLockSchoolButton(school.terverifikasi);

                    loadQuota(school.satuan_pendidikan, school.id, school.terverifikasi);

                },
                complete: function() {
                    $('#btn-loader').html(``)
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            })

            function loadQuota(school_unit, id, school_status) {
                if (table.length) {
                    var tb = table.DataTable({
                        ajax: {
                            url: `/panel/kuota-sekolah/json/quotas/${school_unit}/${id}`,
                            dataSrc: function(data) {
                                console.log({
                                    data
                                });
                                return data.data ?? []
                            },
                        },
                        columns: [{
                                data: 'jurusan'
                            }, {
                                data: 'id',
                                render: function(data, type, row) {
                                    // console.log(row);
                                    let total_kuota = parseInt(row.afirmasi) + parseInt(row.mutasi) + parseInt(row.anak_guru) + parseInt(row.anak_dudi) + parseInt(row.akademik) +
                                        parseInt(row.non_akademik) + parseInt(row.domisili);
                                    return total_kuota;
                                }
                            },
                            {
                                data: 'id',
                                render: function(data, type, row) {
                                    if (school_status === 'belum_simpan') {
                                        return `<a href="/panel/kuota-sekolah/${data}/edit" class="btn btn-primary">Lihat Detail</a>`;
                                    } else {
                                        return `<button class="btn btn-primary" disabled="disabled">Lihat Detail</button>`
                                    }
                                }
                            },
                        ],

                        columnDefs: [{
                            className: 'text-center',
                            targets: [1, 2]
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
                            searchPlaceholder: "Cari Sekolah",
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
                        }
                    });
                    if (school_status === 'belum_simpan') {
                        $("div.add-button, div.add-button-sm").html('<a href="/panel/kuota-sekolah/create" class="btn btn-success">+ Tambah Jurusan dan Kuota</a>');
                        $("div.add-button").addClass('h-100 d-flex align-items-center justify-content-end me-1');
                        $("div.add-button-sm").addClass('h-100 d-flex align-items-center justify-content-center mt-1');
                    }
                }
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

            function loadLockSchoolButton(school_status) {
                if (school_status === 'belum_simpan') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                            <button id="modal-kunci-sekolah" class="btn btn-warning">
                                <x-tabler-lock-square-rounded />
                                Kunci Sekolah
                            </button>
                            `
                    });
                } else {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                            <button class="btn btn-danger" disabled>
                                <x-tabler-lock-square-rounded />
                                Sekolah Sudah Terkunci
                            </button>
                            `
                    });
                }
            }
        })
    </script>
@endpush
