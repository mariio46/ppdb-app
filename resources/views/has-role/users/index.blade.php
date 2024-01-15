@extends('layouts.has-role.auth', ['title' => 'Users'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
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
        @if (session()->get('stat'))
            <div class="alert alert-{{ session()->get('stat') }} p-1">
                <p class="text-center mb-0">{{ session()->get('msg') }}</p>
            </div>
        @endif
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-users">
                    <thead>
                        <tr class="table-light ">
                            <th scope="col">NAMA</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">ROLE</th>
                            {{-- <th scope="col">ID</th> --}}
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

@section('vendorScripts')
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
@endsection

@push('scripts')
    <script>
        $(function() {
            'use strict';

            var table = $('.table-users'),
                select = $('.select2');

            if (table.length) {
                var tb = table.DataTable({
                    ajax: {
                        url: '/panel/users/json/users',
                        dataSrc: ''
                    },
                    columns: [{
                            data: 'nama'
                        },
                        {
                            data: 'nama_pengguna'
                        },
                        {
                            data: 'role_id',
                            render: function(data, type, row) {
                                return getRoleName(data);
                            }
                        },
                        {
                            data: 'status_aktif',
                            render: function(data, type, row) {
                                if (data === 'a') {
                                    return ` <x-badge class="w-100" variant="light" color="success">Aktif</x-badge> `;
                                } else if (data === 'v') {
                                    return ` <x-badge class="w-100" variant="light" color="warning">Belum Diverifikasi</x-badge> `;
                                } else {
                                    return ` <x-badge class="w-100" variant="light" color="danger">Tidak Aktif</x-badge> `;
                                }
                            }
                        },
                        {
                            data: 'id',
                            render: function(data, type, row) {
                                return `<a href="/panel/users/${data}" class="btn btn-primary">Lihat Detail</a>`;
                            }
                        },
                    ],

                    // Styling Table
                    columnDefs: [{
                        targets: [3, 4],
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

                $("div.add-button, div.add-button-sm").html('<a href="/panel/users/create" class="btn btn-success">+ Tambah User</a>');
                $("div.add-button").addClass('h-100 d-flex align-items-center justify-content-end me-1');
                $("div.add-button-sm").addClass('h-100 d-flex align-items-center justify-content-center mt-1');

            }

            function getRoleName(role_id) {
                switch (role_id) {
                    case 1:
                        return 'Super Admin'
                        break;
                    case 2:
                        return 'Admin Provinsi'
                        break;
                    case 3:
                        return 'Admin Cabang Dinas'
                        break;
                    case 4:
                        return 'Admin Sekolah'
                        break;
                    case 5:
                        return 'Admin Sekolah Asal'
                        break;
                    case 6:
                        return 'Operator Sekolah'
                        break;
                    default:
                        return 'Role Tidak Ada!'
                        break;
                }
            }
        })
    </script>
@endpush
