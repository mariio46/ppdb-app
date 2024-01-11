@extends('layouts.has-role.auth', ['title' => 'Info Kuota Sekolah'])

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
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">

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
            <div class="card-body p-0">
                <table class="table table-quota">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">Jalur Pendaftaran</th>
                            <th scope="col">Jumlah Kuota Per-Jalur</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
    <script>
        var npsn = '{{ $npsn }}',
            unit = '{{ $unit }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var table = $('.table-quota'),
                select = $('.select2');

            $.ajax({
                url: `/panel/data-sekolah/json/school/${npsn}`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#logo-sekolah').attr('src', data.logo)
                    loadQuota(data.satuan_pendidikan.value);
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            })

            function loadQuota(params) {
                if (table.length) {
                    var tb = table.DataTable({
                        ajax: {
                            url: `/panel/data-sekolah/json/school-quota/${params}`,
                            dataSrc: '',
                        },
                        columns: [{
                            data: 'label'
                        }, {
                            data: 'value'
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
                    $("div.add-button, div.add-button-sm").html('<a href="/panel/data-sekolah/quota/add-quota" class="btn btn-success">+ Tambah Jurusan</a>');
                    $("div.add-button").addClass('h-100 d-flex align-items-center justify-content-end me-1');
                    $("div.add-button-sm").addClass('h-100 d-flex align-items-center justify-content-center mt-1');
                }
            }
        })
    </script>
@endpush
