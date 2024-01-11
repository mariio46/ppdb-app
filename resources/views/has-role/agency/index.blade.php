@extends('layouts.has-role.auth', ['title' => 'Cabang Dinas'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
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
    <div class="row">
        <div class="col-12">
            @if (session()->get('msg'))
                <div class="alert alert-{{ session()->get('stat') }} p-1">
                    <p class="text-center">{{ session()->get('msg') }}</p>
                </div>
            @endif

            <div class="card">
                <div class="card-body px-0 border-top">
                    <table class="table table-agency border-bottom">
                        <thead>
                            <tr>
                                <th>Nama Wilayah</th>
                                <th>Wilayah Kerja Pelayanan</th>
                                <th>Kedudukan</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
@endsection

@push('scripts')
    <script>
        $(function() {
            'use strict';

            var table = $('.table-agency'),
                select = $('.select2');

            if (table.length) {
                var tb = table.DataTable({
                    ajax: {
                        url: '/panel/cabang-dinas/get-cabang-dinas',
                        dataSrc: ""
                    },
                    columns: [{
                            data: "nama"
                        },
                        {
                            data: "wilayah",
                            render: function(data, type, row) {
                                let areas = data.map(function(data) {
                                    return data.nama;
                                });
                                return areas.join(", ");
                            }
                        },
                        {
                            data: "kedudukan"
                        },
                        {
                            data: "id",
                            render: function(data, type, row) {
                                return `<a href="/panel/cabang-dinas/d/${data}" class="btn btn-primary">Lihat Detail</a>`;
                            }
                        }
                    ],
                    columnDefs: [{
                        targets: 3, // Target the 'Action' column (zero-based index)
                        className: 'text-center' // Apply the custom CSS class
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
                        searchPlaceholder: "Cari Wilayah",
                        info: "Display _START_ to _END_ of _TOTAL_ entries",
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    },
                    initComplete: function() {
                        // Apply Select2 to the lengthMenu dropdown
                        $('#DataTables_Table_0_length select').select2({
                            width: "50%",
                            minimumResultsForSearch: -1,
                            dropdownParent: $('#DataTables_Table_0_length select').parent()
                        });
                    }
                });

                $("div.add-button, div.add-button-sm").html('<a href="/panel/cabang-dinas/create" class="btn btn-success">+ Tambah Wilayah</a>');
                $("div.add-button").addClass('h-100 d-flex align-items-center justify-content-end me-1');
                $("div.add-button-sm").addClass('h-100 d-flex align-items-center justify-content-center mt-1');
            }
        });
    </script>
@endpush
