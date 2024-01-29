@extends('layouts.has-role.auth', ['title' => 'Info Wilayah Zonasi Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
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

        @include('has-role.school-data.partials.header')

        @include('has-role.school-data.partials.tab')

        <div class="card">
            <div class="card-body p-0">
                <table class="table table-school-zone">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">PROVINSI</th>
                            <th scope="col">KABUPATEN/KOTA</th>
                            <th scope="col">KECAMATAN</th>
                            <th scope="col">Detail</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        @include('has-role.school-data.zones.partials.modal-create')

    </div>
@endsection

@push('scripts')
    <script>
        var school_id = '{{ $sekolah_id }}',
            unit = '{{ $satuan_pendidikan }}';
        // console.log('Id Sekolah : ', school_id);
        // console.log('Satuan Pendidikan : ', unit);
    </script>
    <script>
        $(function() {
            'use strict';

            var select = $('.select2'),
                selectInModal = $('.select2-in-modal'),
                submitButton = $('#save-school-zone'),
                form = $('#form-add-zone'),
                provinsi = $('#provinsi'),
                kabupaten = $('#kabupaten'),
                kecamatan = $('#kecamatan'),
                table = $('.table-school-zone');

            var lock_button = $('#button-kunci-sekolah'),
                school_name = $('#nama-sekolah'),
                school_edit_link = $('#link-edit-sekolah');

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

            $('#add-new-zone').on('shown.bs.modal', function() {
                selectInModal.each(function() {
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
            });

            // Get School Data
            $.ajax({
                url: `/panel/data-sekolah/json/school/${school_id}`,
                method: 'get',
                dataType: 'json',
                beforeSend: function() {
                    buttonLoader();
                    headerSchoolAction('onLoad');
                },
                success: function(school) {
                    // console.log('Sekolah : ', school);
                    if (school.logo) $('#logo-sekolah').attr('src', school.logo);
                    headerSchoolAction('onSuccess', school.nama_sekolah, school.npsn);
                    loadEditLink(school.terverifikasi);
                    loadLockSchoolButton(school.terverifikasi, school.id, school.satuan_pendidikan);

                    loadSchoolZones(school.terverifikasi)
                },
                complete: function() {
                    $('#btn-loader').html(``);
                    headerSchoolAction('onComplete')
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            })

            // Get School Zone
            function loadSchoolZones(school_status) {
                var edit_button_disabled = `<button disabled class="btn btn-primary"><x-tabler-lock />Lihat Detail</button>`;
                if (table.length) {
                    var tb = table.DataTable({
                        ajax: {
                            url: `/panel/zonasi-sekolah/json/zones/${school_id}`,
                            dataSrc: (response) => {
                                getProvinces();
                                return response.statusCode === 200 && response.status === 'success' ? response.data : [];
                            },
                        },
                        columns: [{
                            render: (data, type, row) => row.mwilayah.nama_provinsi ?? '',
                        }, {
                            render: (data, type, row) => row.mwilayah.nama_kabupaten ?? '',
                        }, {
                            render: (data, type, row) => row.mwilayah.nama_kecamatan ?? '',
                        }, {
                            render: (data, type, row) => school_status === 'belum_simpan' ?
                                `<a href="/panel/zonasi-sekolah/${row.id}" class="btn btn-primary">Lihat Detail</a>` : edit_button_disabled,
                        }, ],

                        columnDefs: [{
                                className: 'text-center',
                                targets: [3]
                            },
                            {
                                className: 'text-uppercase',
                                targets: [0, 1, 2]
                            }
                        ],

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
                            searchPlaceholder: "Cari Wilayah Zonasi",
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
                        },
                    });

                    if (school_status === 'belum_simpan') {
                        $("div.add-button, div.add-button-sm").html(
                            '<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-new-zone" type="button">+ Tambah Wilayah Zonasi</button>');
                        $("div.add-button").addClass('h-100 d-flex align-items-center justify-content-end me-1');
                        $("div.add-button-sm").addClass('h-100 d-flex align-items-center justify-content-center mt-1');
                    }
                }
            }

            // Form Add New School Zone Validation
            if (form.length) {
                form.validate({
                    rules: {
                        provinsi: {
                            required: true,
                        },
                        kabupaten: {
                            required: true,
                        },
                        kecamatan: {
                            required: true,
                        },
                    },
                    messages: {
                        provinsi: {
                            required: 'Pilih salah satu Provinsi',
                        },
                        kabupaten: {
                            required: 'Pilih salah satu Kabupaten/Kota',
                        },
                        kecamatan: {
                            required: 'Pilih salah satu Kecamatan',
                        },
                    },
                })
            }

            // Get Provinces List Form Data
            function getProvinces() {
                $.ajax({
                    url: `/panel/zonasi-sekolah/json-form-data/provinces`,
                    method: 'get',
                    dataType: 'json',
                    beforeSend: () => {
                        submitButton.prop('disabled', true);
                    },
                    success: (provinces) => {
                        provinsi.empty().append('<option value=""></option>');
                        provinces.forEach((item) => provinsi.append(`<option value="${item.value}">${item.label}</option>`))
                    },
                    error: (xhr, status, error) => console.error('Failed to get data.', status, error),
                })
            }

            // Province Select Trigger
            provinsi.change(() => getCities(provinsi.val()))

            // Get Cities List Form Data
            function getCities(province_code) {
                $.ajax({
                    url: `/panel/zonasi-sekolah/json-form-data/cities/${province_code}`,
                    method: 'get',
                    dataType: 'json',
                    beforeSend: () => {
                        kabupaten.prop('disabled', true);
                        submitButton.prop('disabled', true);
                    },
                    success: (cities) => {
                        kabupaten.empty().append('<option value=""></option>');
                        cities.forEach((item) => kabupaten.append(`<option value="${item.value}">${item.label}</option>`));
                        kabupaten.prop('disabled', false);
                    },
                    error: (xhr, status, error) => console.error('Failed to get data.', status, error),
                })
            }

            // Kabupaten Select Trigger
            kabupaten.change(() => getDistricts(kabupaten.val()))

            // Get Districts List Form Data
            const getDistricts = (city_code) => {
                $.ajax({
                    url: `/panel/zonasi-sekolah/json-form-data/districts/${city_code}`,
                    method: 'get',
                    dataType: 'json',
                    beforeSend: () => {
                        kecamatan.prop('disabled', true);
                        submitButton.prop('disabled', true);
                    },
                    success: (districts) => {
                        kecamatan.empty().append('<option value=""></option>');
                        districts.forEach((item) => kecamatan.append(`<option value="${item.value}">${item.label}</option>`))
                        kecamatan.prop('disabled', false);
                    },
                    error: (xhr, status, error) => console.error('Failed to get data.', status, error),
                })
            }

            kecamatan.change(() => submitButton.prop('disabled', false));

            function loadEditLink(school_status) {
                if (school_status === 'belum_simpan') {
                    school_edit_link.show()
                    school_edit_link.html(function() {
                        return `
                            <a href="/panel/data-sekolah/edit" class="btn btn-success">
                                <x-tabler-pencil />
                                Edit Info Sekolah
                            </a>`
                    })
                }
            }

            function loadLockSchoolButton(school_status, school_id, unit) {
                if (school_status === 'belum_simpan') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                        <form id="form-kunci-sekolah" action="/panel/data-sekolah/${school_id}/${unit}/lock" method="post">
                            @csrf
                            <button type="submit" id="modal-kunci-sekolah" class="btn btn-warning">
                                <x-tabler-lock-square-rounded />
                                Kunci Sekolah
                            </button>
                        </form>
                            `
                    });
                } else if (school_status === 'simpan' || school_status === 'verifikasi') {
                    lock_button.show();
                    lock_button.html(function() {
                        return `
                            <button type="button" class="btn btn-danger" disabled>
                                <x-tabler-lock-square-rounded />
                                Sekolah Sudah Terkunci
                            </button>`
                    });
                }
            }

            function buttonLoader() {
                $("#btn-loader").html(function() {
                    return `
                        <div id="btn-loader" class="placeholder-glow d-flex gap-2">
                            <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                            <button class="btn btn-secondary disabled placeholder" style="width: 237px" aria-disabled="true"></button>
                        </div>
                            `
                });
            }

            function headerSchoolAction(type, school_name = '', school_npsn = '') {
                switch (type) {
                    case 'onLoad':
                        $('#info-sekolah,#cover-logo-sekolah').addClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah,#logo-sekolah').text('Memuat Data').addClass('placeholder col-12');
                        break;
                    case 'onSuccess':
                        $('#nama-sekolah').text(school_name);
                        $('#npsn-sekolah').text(school_npsn);
                        break;
                    case 'onComplete':
                        $('#info-sekolah,#cover-logo-sekolah').removeClass('placeholder-glow');
                        $('#nama-sekolah,#npsn-sekolah,#logo-sekolah').removeClass('placeholder');
                        break;
                }
            }
        })
    </script>
@endpush
