@extends('layouts.has-role.auth', ['title' => 'Verifikasi Daftar Ulang'])

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
    </style>
@endsection

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-reregistration">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">NAMA SISWA</th>
                            <th scope="col">NISN</th>
                            <th scope="col">JALUR</th>
                            <th scope="col">STATUS</th>
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

            var table = $('.table-reregistration'),
                select = $('.select2'),
                tracks = {
                    'AA': 'Afirmasi',
                    'AB': 'Perpindahan Tugas Orang Tua',
                    'AC': 'Anak Guru',
                    'AD': 'Prestasi Akademik',
                    'AE': 'Prestasi Non Akademik',
                    'AF': 'Zonasi',
                    'AG': 'Boarding School',
                    'KA': 'Afirmasi',
                    'KB': 'Perpindahan Tugas Orang Tua',
                    'KC': 'Anak Guru',
                    'KD': 'Prestasi Akademik',
                    'KE': 'Prestasi Non Akademik',
                    'KF': 'Domisili Terdekat',
                    'KG': 'Anak DUDI'
                },
                statusMapping = {
                    'Afirmasi': 'AA',
                    'Perpindahan Tugas Orang Tua': 'AB',
                    'Anak Guru': 'AC',
                    'Prestasi Akademik': 'AD',
                    'Prestasi Non Akademik': 'AE',
                    'Zonasi': 'AF',
                    'Boarding School': 'AG',
                    'Afirmasi': 'KA',
                    'Perpindahan Tugas Orang Tua': 'KB',
                    'Anak Guru': 'KC',
                    'Prestasi Akademik': 'KD',
                    'Prestasi Non Akademik': 'KE',
                    'Domisili Terdekat': 'KF',
                    'Anak DUDI': 'KG',
                };

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

            if (table.length) {
                var tb = table.DataTable({
                    ajax: {
                        url: '/panel/daftar-ulang/json/students',
                        dataSrc: ''
                    },
                    columns: [{
                            data: "nama"
                        },
                        {
                            data: "nisn",
                            render: function(data, type, row) {
                                return `<span class="text-success">${data}</span>`;
                            }
                        },
                        {
                            data: "table_pengumuman",
                            render: function(data, type, row) {
                                return tracks[data.jalur];
                            }
                        },
                        {
                            data: "status",
                            render: function(data, type, row) {
                                let color, status;
                                switch (data) {
                                    case 'b':
                                        color = 'warning';
                                        status = 'Belum Daftar Ulang';
                                        break;
                                    case 's':
                                        color = 'success';
                                        status = 'Sudah Daftar Ulang';
                                        break;
                                    case 't':
                                        color = 'danger';
                                        status = 'Verifikasi ditolak';
                                        break;
                                    default:
                                        break;
                                }
                                return `<span class="mb-0 d-inline-block border-${color} text-${color} rounded" style="padding: 0.5rem; width: 150px;">${status}</span>`;
                            }
                        },
                        {
                            data: "nisn",
                            render: function(data, type, row) {
                                return `<a href="/panel/daftar-ulang/${data}" class="btn btn-primary">Lihat Detail</a>`;
                            }
                        }
                    ],

                    // Styling Table
                    columnDefs: [{
                        targets: [1, 3, 4],
                        className: 'text-center'
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
                        searchPlaceholder: "Cari Siswa",
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
            }
        })
    </script>
@endpush
