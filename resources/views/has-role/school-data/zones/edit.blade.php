@extends('layouts.has-role.auth', ['title' => 'Edit Wilayah Zonasi Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@section('content')
    <div class="content-body">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Wilayah Zonasi</h4>
            </div>
            <div class="card-body">
                <form id="form-edit-zone" action="{{ route('school-zone.update', $id) }}" method="post">
                    @csrf
                    <div class="row match-height">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <x-label for="provinsi">Provinsi</x-label>
                                <x-select class="select2 form-select" id="provinsi" name="provinsi" data-placeholder="Pilih Provinsi">
                                    <x-empty-option />
                                </x-select>
                            </div>
                            <div class="mb-2">
                                <x-label for="kabupaten">Kabupaten/Kota</x-label>
                                <x-select class="select2 form-select" id="kabupaten" name="kabupaten" data-placeholder="Pilih Kabupaten/Kota" disabled>
                                    <x-empty-option />
                                </x-select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <x-label for="kecamatan">Kecamatan</x-label>
                                <x-select class="select2 form-select" id="kecamatan" name="kecamatan" data-placeholder="Pilih Kecamatan" disabled>
                                    <x-empty-option />
                                </x-select>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-center d-flex gap-1 my-1">
                        <x-button id="save-school-zone" type="submit" color="success">Simpan</x-button>
                        <x-link :href="route('school-zone.index')" color="secondary">Batalkan</x-link>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Hapus Wilayah Zonasi</h5>

                <x-alert variant="danger">Apakah anda yakin ingin menghapus Wilayah Zonasi ini?</x-alert>

                <x-checkbox class="form-check-danger" identifier="confirmation" label="Saya yakin untuk menghapus data sekolah ini" variant="danger" />

                <x-button class="mt-2" id="btn-delete-zone" data-bs-toggle="modal" data-bs-target="#delete-zone" type="button" color="danger" disabled>Hapus Data Wilayah Zonasi</x-button>
                <x-modal modal_id="delete-zone" label_by="deleteSchoolZone" align="modal-dialog-centered">
                    <x-modal.header>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </x-modal.header>
                    <x-modal.body>
                        <h5 class="text-center mt-2">Hapus Wilayah Zonasi</h5>
                        <p>
                            Apakah Anda yakin ingin menghapus data wilayah zonasi ini? Data yang sudah di hapus tidak bisa di kembalikan lagi!
                        </p>
                    </x-modal.body>
                    <x-modal.footer class="justify-content-center mb-3">
                        <form action="{{ route('school-zone.destroy', $id) }}" method="POST">
                            @csrf
                            <x-button color="danger">Ya, Hapus</x-button>
                        </form>
                        <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                    </x-modal.footer>
                </x-modal>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var zone_id = '{{ $id }}';
    </script>
    <script>
        $(() => {
            'use strict';

            var select = $('.select2'),
                submitButton = $('#save-school-zone'),
                provinsi = $('#provinsi'),
                kabupaten = $('#kabupaten'),
                kecamatan = $('#kecamatan'),
                check = $('#confirmation'),
                btnDeleteZone = $('#btn-delete-zone'),
                form = $('#form-edit-zone');


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

            $.ajax({
                url: `/panel/zonasi-sekolah/json/zone/${zone_id}`,
                method: 'GET',
                dataType: 'json',
                beforeSend: () => {
                    provinsi.prop('disabled', true);
                    submitButton.prop('disabled', true);
                },
                success: (zone) => {
                    provinsi.prop('disabled', false);
                    getProvinces(zone.data.kode)
                },
                error: (xhr, status, error) => console.error('Failed to get single zone.', status, error),
            })

            // Get Provinces List Form Data
            function getProvinces(zoneCode = '') {
                $.ajax({
                    url: `/panel/zonasi-sekolah/json-form-data/provinces`,
                    method: 'get',
                    dataType: 'json',
                    beforeSend: () => {
                        submitButton.prop('disabled', true);
                    },
                    success: (provinces) => {
                        var code = zoneCodeSeparator(zoneCode);
                        // console.log(code);
                        provinsi.empty().append('<option value=""></option>');
                        provinces.forEach((item) => {
                            var selected = item.value === code.province ? 'selected' : '';
                            provinsi.append(`<option value="${item.value}" ${selected}>${item.label}</option>`);
                        })
                        getCities(code.province, zoneCode);
                    },
                    error: (xhr, status, error) => console.error('Failed to get data.', status, error),
                })
            }

            // Province Select Trigger
            provinsi.change(() => getCities(provinsi.val()))

            // Get Cities List Form Data
            function getCities(province_code, zoneCode = '') {
                $.ajax({
                    url: `/panel/zonasi-sekolah/json-form-data/cities/${province_code}`,
                    method: 'get',
                    dataType: 'json',
                    beforeSend: () => {
                        kabupaten.prop('disabled', true);
                        submitButton.prop('disabled', true);
                    },
                    success: (cities) => {
                        var code = zoneCodeSeparator(zoneCode);
                        kabupaten.empty().append('<option value=""></option>');
                        cities.forEach((item) => {
                            var selected = item.value === code.city ? 'selected' : '';
                            kabupaten.append(`<option value="${item.value}" ${selected}>${item.label}</option>`);
                        });
                        kabupaten.prop('disabled', false);
                        getDistricts(code.city, zoneCode)
                    },
                    error: (xhr, status, error) => console.error('Failed to get data.', status, error),
                })
            }

            // Kabupaten Select Trigger
            kabupaten.change(() => getDistricts(kabupaten.val()));

            // Get Districts List Form Data
            const getDistricts = (city_code, zoneCode = '') => {
                $.ajax({
                    url: `/panel/zonasi-sekolah/json-form-data/districts/${city_code}`,
                    method: 'get',
                    dataType: 'json',
                    beforeSend: () => {
                        kecamatan.prop('disabled', true);
                        submitButton.prop('disabled', true);
                    },
                    success: (districts) => {
                        var code = zoneCodeSeparator(zoneCode);
                        kecamatan.empty().append('<option value=""></option>');
                        districts.forEach((item) => {
                            var selected = item.value === code.district ? 'selected' : ''
                            kecamatan.append(`<option value="${item.value}" ${selected}>${item.label}</option>`)
                        })
                        kecamatan.prop('disabled', false);
                        // submitButton.prop('disabled', false);
                        if (kecamatan.val() != '') kecamatan.val(code.district).trigger('change');
                    },
                    error: (xhr, status, error) => console.error('Failed to get data.', status, error),
                })
            }

            kecamatan.change(() => submitButton.prop('disabled', false));

            const zoneCodeSeparator = (code) => {
                var value = code.split('.');
                var province = value[0];
                var city = `${value[0]}.${value[1]}`;
                var district = `${value[0]}.${value[1]}.${value[2]}`;
                return {
                    province,
                    city,
                    district
                }
            }

            check.change(function() {
                btnDeleteZone.prop('disabled', !this.checked)
            });
        })
    </script>
@endpush
