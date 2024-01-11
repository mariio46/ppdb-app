@extends('layouts.has-role.auth', ['title' => 'Akun Siswa'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
@endsection

@section('content')
    @if (session()->get('msg'))
        <div class="alert alert-{{ session()->get('stat') }} p-1">
            <p class="mb-0 text-center">{{ session()->get('msg') }}</p>
        </div>
    @endif

    <div class="content-body">
        <div class="d-flex mb-2">
            <x-link class="ms-auto" href="{{ route('siswa.create') }}" color="success">+ Tambah Siswa</x-link>
        </div>

        <div class="card">
            <div class="card-header">
                <div>
                    <h4 class="card-title">Cari Siswa</h4>
                    <p class="mb-0"><small>Cari data siswa yang secara global berdasarkan Nomor Induk Siswa Nasional (NISN).</small></p>
                </div>
            </div>
            <div class="card-body px-0">
                <form id="search-form" action="#">
                    <div class="px-2 row">
                        <div class="col-lg-6 col-12 mb-1">
                            <x-input id="nisn" name="nisn" placeholder="Cari NISN.." />
                        </div>
                        <div class="col-auto">
                            <x-button id="search-btn" type="button" withIcon="true"><x-tabler-search style="width: 1rem; height: 1rem;" /> Cari</x-button>
                            <x-button id="search-reset-btn" type="button" variant="outline" color="secondary">Reset</x-button>
                        </div>
                    </div>
                </form>

                <div class="mt-2" id="search-result" style="display: none;">
                    <table class="table border-bottom">
                        <thead>
                            <tr>
                                <th scope="col">NAMA SISWA</th>
                                <th class="text-center" scope="col">NISN</th>
                                <th scope="col">ASAL SEKOLAH</th>
                                <th class="text-end" scope="col">DETAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="search-result-tr"></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div>
                    <h4 class="card-title">Akun Siswa</h4>
                    <p class="mb-0"><small>Tabel di bawah merupakan daftar siswa yang Anda sudah masukkan.</small></p>
                </div>
            </div>
            <div class="card-body px-0">
                <div>
                    <table class="table table-hover border-bottom" id="data-table">
                        <thead>
                            <tr class="table-light">
                                <th scope="col">NAMA SISWA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">ASAL SEKOLAH</th>
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
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
    <script>
        $(function() {
            'use strict';

            var sform = $('#search-form'),
                snisn = $('#nisn'),
                sbtn = $('#search-btn'),
                sreset = $('#search-reset-btn'),
                sdiv = $('#search-result'),
                str = $('#search-result-tr'),
                table = $('#data-table'),
                select = $('.select2');

            if (sform.length) {
                sform.validate({
                    rules: {
                        nisn: {
                            required: true,
                            digits: true,
                            minlength: 10,
                            maxlength: 10,
                        }
                    },
                    messages: {
                        nisn: {
                            required: 'Harus diisi.',
                            digits: 'Harus dalam bentuk angka.',
                            minlength: 'Harus 10 karakter.',
                            maxlength: 'Harus 10 karakter',
                        }
                    }
                });
            }

            sbtn.click(function() {
                if (sform.valid()) {
                    sdiv.show();
                    str.html('');

                    $.ajax({
                        url: '/panel/siswa/json/search-nisn/' + snisn.val(),
                        method: 'get',
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                let html = `<td>${data.nama}</td>`;
                                html += `<td class="text-success text-center">${data.nisn}</td>`;
                                html += `<td>${data.sekolah_asal}</td>`;
                                html += `<td class="text-end"><a href="/panel/siswa/${data.id}" class="btn btn-primary">Lihat Detail</a></td>`;

                                str.append(html);
                            } else {
                                str.append('<td colspan="4" class="text-center"><i>Tidak ada data ditemukan.</i></td>');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('gagal mendapatkan data.', status, error);
                            str.append('<td colspan="4" class="text-center"><i>Terjadi kesalahan. Mohon coba lagi.</i></td>');
                        }
                    });
                }
            });

            sreset.click(function() {
                snisn.val('');
                sdiv.hide();
                str.html('');
            });

            if (table.length) {
                var tb = table.DataTable({
                    ajax: {
                        url: '/panel/siswa/json/get-list',
                        dataSrc: ""
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
                            data: "sekolah_asal"
                        },
                        {
                            data: "id",
                            render: function(data, type, row) {
                                return `<a href="/panel/siswa/${data}" class="btn btn-primary">Lihat Detail</a>`;
                            }
                        }
                    ],
                    columnDefs: [{
                            targets: 1,
                            className: 'text-center'
                        },
                        {
                            targets: 3,
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
                        searchPlaceholder: "Cari Siswa..",
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

                // $("div.add-button, div.add-button-sm").html('<a href="/panel/siswa/create" class="btn btn-success">+ Tambah Siswa</a>');
                // $("div.add-button").addClass('h-100 d-flex align-items-center justify-content-end');
                // $("div.add-button-sm").addClass('h-100 d-flex align-items-center justify-content-center mt-1');
            }
        });
    </script>
@endpush
