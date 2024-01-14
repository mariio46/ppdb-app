@extends('layouts.has-role.auth', ['title' => 'Kunci Sekolah'])

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
                <table class="table table-schools">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">NAMA SEKOLAH</th>
                            <th scope="col">NPSN</th>
                            <th scope="col">SATUAN PENDIDKAN</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">AKSI</th>
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
                        url: '/panel/kunci-sekolah/json/schools',
                        dataSrc: ''
                    },
                    columns: [{
                            data: 'name'
                        },
                        {
                            data: 'npsn'
                        },
                        {
                            data: 'unit'
                        },
                        {
                            data: 'address'
                        },
                        {
                            data: 'npsn',
                            render: function(data, type, row) {
                                return `
                                <button data-bs-toggle="modal" data-bs-target="#modal-buka-kunci-sekolah-${row.npsn}" type="button" class="btn btn-success">Buka Kunci</button>
                                <div id="modal-buka-kunci-sekolah-${row.npsn}" aria-labelledby="modalBukaKunciSekolah${row.npsn}" aria-hidden="true" tabindex="-1" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="text-center mt-2">Buka Kunci Sekolah ${row.name}</h5>
                                                <p>
                                                    Data sekolah yang kuncinya terbuka dapat mengedit kembali data sekolahnya kembali dengan benar, Apakah Anda ingin membuka kunci sekolah ${row.name}?
                                                </p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button class="btn btn-success">Buka Kunci</button>
                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                `;
                            }
                        },
                    ],

                    // Styling Table
                    columnDefs: [{
                        targets: [1, 2, 4],
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

            }
        })
    </script>
@endpush
