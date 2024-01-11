@extends('layouts.has-role.auth', ['title' => 'Edit Sekolah'])

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
                <div class="card-title">Edit Informasi Sekolah</div>
            </div>
            <div class="card-body">

                <form action="#">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="nama_kepsek">Nama Kepala Sekolah</x-label>
                                <x-input id="nama_kepsek" name="nama_kepsek" placeholder="Masukkan nama kepala sekolah" />
                            </div>
                            <div class="mb-2">
                                <x-label for="nip_kepsek">NIP Kepala Sekolah</x-label>
                                <x-input id="nip_kepsek" name="nip_kepsek" placeholder="Masukkan NIP Kepala Sekolah" />
                            </div>
                            <div class="mb-2">
                                <x-label for="nama_kappdb">Nama Ketua PPDB</x-label>
                                <x-input id="nama_kappdb" name="nama_kappdb" placeholder="Masukkan nama ketua PPDB" />
                            </div>
                            <div class="mb-2">
                                <x-label for="nip_kappdb">NIP Ketua PPDB</x-label>
                                <x-input id="nip_kappdb" name="nip_kappdb" placeholder="Masukkan NIP ketua PPDB" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="alamat_jalan">Alamat Jalan</x-label>
                                <x-input id="alamat_jalan" name="alamat_jalan" placeholder="Masukkan Alamat Jalan Sekolah" />
                            </div>
                            <div class="mb-2">
                                <x-label for="kabupaten">Kabupaten</x-label>
                                <x-select class="select2 form-select" id="kabupaten" name="kabupaten" data-placeholder="Pilih Kabupaten">
                                    <x-empty-option />
                                </x-select>
                            </div>
                            <div class="mb-2" id="input-kecamatan" style="display: none">
                                <x-label for="kecamatan">Kecamatan</x-label>
                                <x-select class="select2 form-select" id="kecamatan" name="kecamatan" data-placeholder="Pilih Wilayah">
                                    <x-empty-option />
                                </x-select>
                            </div>
                            <div class="mb-2">
                                <x-label for="desa">Kelurahan</x-label>
                                <x-input id="desa" name="desa" placeholder="Masukkan nama ketua PPDB" />
                            </div>
                        </div>
                    </div>
                    <x-separator marginY="2" />
                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button color="success">Simpan Perubahan</x-button>
                        <x-link href="{{ route('school-data.index') }}" color="secondary">Batalkan</x-link>
                    </div>
                </form>

            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        var id = '{{ $id }}'
    </script>
    <script>
        $(function() {
            'use strict';

            var select = $('.select2'),
                kabupaten = $('#kabupaten'),
                kecamatan = $('#kecamatan');

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

            $.ajax({
                url: `/panel/data-sekolah/json/school/${id}`,
                method: 'get',
                dataType: 'json',
                success: function(school) {
                    let city_code = `${school.kode_provinsi}.${school.kode_kabupaten}`;
                    let district_code = `${school.kode_provinsi}.${school.kode_kabupaten}.${school.kode_kecamatan}`;

                    $('#nama_kepsek').val(school.nama_kepsek);
                    $('#nip_kepsek').val(school.nip_kepsek);
                    $('#nama_kappdb').val(school.nama_kappdb);
                    $('#nip_kappdb').val(school.nip_kappdb);
                    $('#alamat_jalan').val(school.alamat_jalan);
                    $('#desa').val(school.desa);

                    loadCities(city_code);
                    loadDistrict(city_code, district_code);
                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data single school.", status, error, xhr);
                }
            });

            function loadCities(params = '') {
                $.ajax({
                    url: '/panel/get-city',
                    method: 'get',
                    dataType: 'json',
                    success: function(cities) {
                        kabupaten.empty().append('<option value=""></option>');

                        cities.forEach(item => {
                            let selected = item.code === params ? 'selected' : '';
                            let value = `${item.code}|${item.name}`;
                            kabupaten.append(`<option value="${value}" ${selected}>${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error("Failed to get data kabupaten.", status, error, xhr);
                    }
                });
            }

            function loadDistrict(identifier, params = '') {
                $.ajax({
                    url: `/panel/get-district/${identifier}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(districts) {
                        $('#input-kecamatan').show();
                        kecamatan.empty().append('<option value=""></option>');

                        districts.forEach(item => {
                            let selected = item.code === params ? 'selected' : '';
                            let value = `${item.code}|${item.name}`;
                            kecamatan.append(`<option value="${value}" ${selected}>${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error("Failed to get data kabupaten.", status, error, xhr);
                    }
                });
            }

            $('#kabupaten').change(function() {
                let value = $(this).val().split('|');
                let result = value[0];
                console.log(result);
                loadDistrict(result)
            })
        })
    </script>
@endpush
