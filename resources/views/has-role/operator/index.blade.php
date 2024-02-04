@extends('layouts.has-role.auth', ['title' => 'Operator'])

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
                <table class="table table-operators">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">NAMA</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">NAMA SEKOLAH</th>
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
        var key = '{{ $key }}',
            param = '{{ $param }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var table = $('.table-operators'),
                select = $('.select2');

            if (table.length) {
                var tb = table.DataTable({
                    ajax: {
                        url: `/panel/operators/json/operators/${key}/${param}`,
                        dataSrc: (response) => {
                            console.log(response);
                            return response.data ?? []
                        }
                    },
                    columns: [{
                            data: 'nama'
                        },
                        {
                            data: 'nama_pengguna'
                        },
                        {
                            data: 'nama_sekolah'
                        },
                        {
                            data: 'status_aktif',
                            render: (data, type, row) => {
                                if (data === 'v') {
                                    return ` <x-badge class="w-75" variant="light" color="warning">Menunggu Verifikasi</x-badge> `;
                                }
                                if (data === 'a') {
                                    return ` <x-badge class="w-75" variant="light" color="success">Aktif</x-badge> `;
                                }
                                if (data === 'n') {
                                    return ` <x-badge class="w-75" variant="light" color="danger">Tidak Aktif</x-badge> `;
                                }
                                return ` <x-badge class="w-75" variant="light" color="danger">Unknown</x-badge> `;
                            }
                        },
                        {
                            data: 'id',
                            render: (data, type, row) => {
                                return `<a href="/panel/operators/${data}" class="btn btn-primary">Lihat Detail</a>`;
                            }
                        },
                    ],

                    // Styling Table
                    columnDefs: [{
                        targets: [2, 3, 4],
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
                        searchPlaceholder: "Cari User",
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

                if (key === 'sekolah_id') {
                    $("div.add-button, div.add-button-sm").html(`<a href="{{ route('operators.create') }}" class="btn btn-success">+ Tambah Operator</a>`);
                    $("div.add-button").addClass('h-100 d-flex align-items-center justify-content-end me-1');
                    $("div.add-button-sm").addClass('h-100 d-flex align-items-center justify-content-center mt-1');
                }

            }
        })
    </script>
@endpush
