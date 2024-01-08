@extends('layouts.has-role.auth', ['title' => 'Sekolah asal'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Sekolah Asal</h4>
            </div>
            <div class="card-body px-0">
                <div>
                    <table class="table table-hover border-bottom" id="table-data">
                        <thead>
                            <tr class="table-light">
                                <th scope="col">NAMA</th>
                                <th scope="col">NPSN</th>
                                <th scope="col">DETAIL</th>
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

            var table = $('#table-data'),
                select = $('.select2');

            if (table.length) {
                var tb = table.DataTable({
                    ajax: {
                        url: '/panel/sekolah-asal/json/get-all-data',
                        dataSrc: ""
                    },
                    columns: [{
                            data: "name"
                        },
                        {
                            data: "npsn",
                            render: function(data, type, row) {
                                return `<span class="text-success">${data}</span>`;
                            }
                        },
                        {
                            data: "id",
                            render: function(data, type, row) {
                                return `<a href="/panel/sekolah-asal/${data}" class="btn btn-primary">Lihat Detail</a>`;
                            }
                        }
                    ],
                    columnDefs: [
                        {
                            targets: 1,
                            className: 'text-center'
                        },
                        {
                            targets: 2,
                            className: 'text-end'
                        }
                    ],
                    dom: `<"d-none d-md-block align-items-center"<"row px-2 g-0"<"col-6 d-flex"lf><"col-6"<"add-button">>>>
                    <"d-block d-md-none align-items-center"<"row"<"col-12"<"add-button-sm">><"col-12"f>>>
                    <"table-responsive"<t>>
                    <"row px-2 g-0"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>`,
                    ordering: false,
                    lengthMenu: [
                        [10, 25, 50, 100],
                        [10, 25, 50, "100"]
                    ],
                    language: {
                        lengthMenu: "_MENU_",
                        search: "",
                        searchPlaceholder: "Cari NPSN, Sekolah..",
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

                $("div.add-button, div.add-button-sm").html('<a href="/panel/sekolah-asal/create" class="btn btn-success">+ Tambah Sekolah Asal</a>');
                $("div.add-button").addClass('h-100 d-flex align-items-center justify-content-end');
                $("div.add-button-sm").addClass('h-100 d-flex align-items-center justify-content-center mt-1');
            }
        });
    </script>
@endpush