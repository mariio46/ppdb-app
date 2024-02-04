@extends('layouts.has-role.auth', ['title' => 'Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('vendorScripts')
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

        td.satuan-pendidikan {
            width: 150px;
        }

        td.nama-sekolah {
            width: 200px;
            font-weight: 600;
        }

        td.detail {
            width: 130px;
        }
    </style>
@endsection

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header" style="padding: 15px;">
                <div>
                    <h4 class="card-title fw-bolder text-primary">Sekolah</h4>
                    <p class="mb-0 fw-bold"><small>Tabel di bawah merupakan daftar sekolah tujuan.</small></p>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-schools">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">NAMA SEKOLAH</th>
                            <th scope="col">STATUS</th>
                            <th scope="col">NPSN</th>
                            <th scope="col">SATUAN PENDIDKAN</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">DETAIL</th>
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
        $(function() {
            'use strict';

            var table = $('.table-schools'),
                select = $('.select2');

            if (table.length) {
                var tb = table.DataTable({
                    ajax: {
                        url: '/panel/sekolah/json/schools-collections',
                        dataSrc: (response) => {
                            console.log(response);
                            return response.status === 'success' && parseInt(response.statusCode) === 200 ? response.data : []
                        },
                    },
                    columns: [{
                            data: 'nama_sekolah'
                        },
                        {
                            render: (data, type, row) => {
                                var status = setStatus(row.terverifikasi);
                                return `<span class="badge w-100 bg-light-${status.color}">${status.label}</span>`
                            }
                        },
                        {
                            data: 'npsn'
                        },
                        {
                            render: (data, type, row) => {
                                if (row.satuan_pendidikan === 'sma') {
                                    return 'SMA';
                                }
                                if (row.satuan_pendidikan === 'smk') {
                                    return 'SMK';
                                }
                                if (row.satuan_pendidikan === 'hbs' || row.satuan_pendidikan === 'fbs') {
                                    return 'Boarding School';
                                }
                                return 'Unknown';
                            }
                        },
                        {
                            data: 'alamat_jalan',
                            searchable: false
                        },
                        {
                            render: (data, type, row) => `<a href="/panel/sekolah/${row.id}/${row.satuan_pendidikan}/info-sekolah" class="btn btn-primary">Lihat Detail</a>`
                        },
                    ],

                    // Styling Table
                    columnDefs: [{
                            targets: [0],
                            className: 'nama-sekolah'
                        },
                        {
                            targets: [1],
                            className: 'text-center'
                        },
                        {
                            targets: [2],
                            className: 'text-center'
                        },
                        {
                            targets: [3],
                            className: 'text-center satuan-pendidikan'
                        },
                        {
                            targets: [5],
                            className: 'text-center detail'
                        },
                    ],

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

                function setStatus(school_status) {
                    var status = {
                        label: '',
                        color: '',
                    };
                    switch (school_status) {
                        case 'belum_simpan':
                            status = {
                                label: 'Belum Simpan',
                                color: 'danger'
                            }
                            break;
                        case 'simpan':
                            status = {
                                label: 'Sudah Simpan',
                                color: 'warning'
                            }
                            break;
                        case 'verifikasi':
                            status = {
                                label: 'Terverifikasi',
                                color: 'success'
                            }
                            break;

                        default:
                            status = {
                                label: 'Unknown',
                                color: 'danger'
                            }
                            break;
                    }

                    return status;
                }

                $("div.add-button, div.add-button-sm").html('<a href="/panel/sekolah/create" class="btn btn-success">+ Tambah Sekolah</a>');
                $("div.add-button").addClass('h-100 d-flex align-items-center justify-content-end me-1');
                $("div.add-button-sm").addClass('h-100 d-flex align-items-center justify-content-center mt-1');
            }
        })
    </script>
@endpush
