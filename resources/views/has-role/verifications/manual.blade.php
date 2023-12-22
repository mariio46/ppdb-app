@extends('layouts.has-role.auth', ['title' => 'Verifikasi Manual'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4>Filter</h4>

                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="mb-1">
                                <x-select class="form-select select2" id="filterStatus" name="filterStatus" data-placeholder="Status" data-minimum-results-for-search="-1">
                                    <option value=""></option>
                                    <option value="All">Semua</option>
                                    <option value="Belum diverifikasi">Belum Diverifikasi</option>
                                    <option value="Sudah diverifikasi">Sudah Diverifikasi</option>
                                    <option value="Verifikasi ditolak">Verifikasi Ditolak</option>
                                </x-select>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12">
                            <div class="mb-1">
                                <x-select class="form-select select2" id="filterTrack" name="filterTrack" data-placeholder="Jalur Pendaftaran" data-minimum-results-for-search="-1">
                                    <option value=""></option>
                                    <option value="All">Semua</option>
                                    <option value="Afirmasi">Afirmasi</option>
                                    <option value="Perpindahan Tugas Orang Tua">Perpindahan Tugas Orang Tua</option>
                                    <option value="Anak Guru">Anak Guru</option>
                                    <option value="Prestasi Akademik">Prestasi Akademik</option>
                                    <option value="Prestasi Non Akademik">Prestasi Non Akademik</option>
                                    <option value="Zonasi">Zonasi</option>
                                    <option value="Boarding School">Boarding School</option>
                                </x-select>
                            </div>
                        </div>
                        <div class="mb-1 col-2">
                            <x-button id="filterReset" variant="outline" color="secondary">Reset</x-button>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top p-0">
                    <div>
                        <table class="table border-bottom" id="tableList">
                            <thead>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <th>NISN</th>
                                    <th>Jalur</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
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

            var select = $('.select2'),
                table = $('#tableList'),
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
                };;

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
                        url: '/panel/verifikasi-manual/get-data',
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
                            data: "jalur",
                            render: function(data, type, row) {
                                return tracks[data];
                            }
                        },
                        {
                            data: "status",
                            render: function(data, type, row) {
                                let color, status;
                                switch (data) {
                                    case 'b':
                                        color = 'warning';
                                        status = 'Belum diverifikasi';
                                        break;
                                    case 's':
                                        color = 'success';
                                        status = 'Sudah diverifikasi';
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
                            data: "id",
                            render: function(data, type, row) {
                                return `<a href="/panel/verifikasi-manual/d/${data}" class="btn btn-primary">Lihat Detail</a>`;
                            }
                        }
                    ],
                    columnDefs: [{
                        targets: [1, 3, 4], // Target the 'Action' column (zero-based index)
                        className: 'text-center' // Apply the custom CSS class
                    }],
                    dom: `<"d-none d-md-block align-items-center"<"row g-0"<"col-12 px-2 d-flex"lf>>>
                    <"table-responsive"<t>>
                    <"row g-0"<"col-sm-12 col-md-5 px-2"i><"col-sm-12 px-2 col-md-7"p>>`,
                    // ordering: false,
                    order: [
                        [3, 'asc']
                    ],
                    lengthMenu: [
                        [10, 25, 50, 100],
                        [10, 25, 50, "100"]
                    ],
                    language: {
                        lengthMenu: "_MENU_",
                        search: "",
                        searchPlaceholder: "Cari Siswa...",
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

                $('#filterTrack').change(function() {
                    // 
                });

                $('#filterStatus').change(function() {
                    //
                });
            }
        });
    </script>
@endpush
