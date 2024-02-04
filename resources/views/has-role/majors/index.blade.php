@extends('layouts.has-role.auth', ['title' => 'List Jurusan'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
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
                <table class="table table-majors">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">NAMA JURUSAN</th>
                            <th scope="col">DETAIL</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <x-modal modal_id="add-new-major" label_by="createMajor" align="modal-dialog-centered">
            <x-modal.header>
                <h5 class="modal-title">Tambah Jurusan Baru</h5>
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </x-modal.header>
            <x-modal.body>
                <form id="form-add-major" action="{{ route('majors.store') }}" method="POST">
                    @csrf
                    <x-label for="jurusan" value="Nama Jurusan" />
                    <x-input id="jurusan" name="jurusan" type="text" placeholder="Masukkan Nama Jurusan" autofocus />
                    <div class="justify-content-center d-flex gap-1 my-1">
                        <x-button color="success">Simpan</x-button>
                        <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                    </div>
                </form>
            </x-modal.body>
        </x-modal>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            'use strict';

            var table = $('.table-majors'),
                form = $('#form-add-major'),
                select = $('.select2');

            // DataTable
            if (table.length) {
                var tb = table.DataTable({
                    ajax: {
                        url: '/panel/jurusan/json/majors',
                        dataSrc: (response) => {
                            console.log('List Jurusan : ', response);
                            return response.status === 'success' && response.statusCode === 200 ? response.data : [];
                        },
                    },
                    columns: [{
                            data: 'jurusan'
                        },
                        {
                            render: (data, type, row) => `<a href="/panel/jurusan/${row.id}/edit" class="btn btn-primary">Lihat Detail</a>`,
                        },
                    ],

                    // Styling Table
                    columnDefs: [{
                        targets: [1],
                        className: 'text-center'
                    }, ],

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
                        searchPlaceholder: "Cari Jurusan",
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

                $("div.add-button, div.add-button-sm").html('<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-new-major" type="button">+ Tambah Jurusan</button>');
                $("div.add-button").addClass('h-100 d-flex align-items-center justify-content-end me-1');
                $("div.add-button-sm").addClass('h-100 d-flex align-items-center justify-content-center mt-1');
            }

            // Form Validation
            if (form.length) {
                form.validate({
                    rules: {
                        jurusan: {
                            required: true,
                            minlength: 3,
                        },
                    },
                    messages: {
                        jurusan: {
                            required: 'Nama Jurusan tidak boleh kosong!',
                            minlength: 'Nama Jurusan harus lebih dari 3 karakter',
                        },
                    },
                })
            }

        })
    </script>
@endpush
