@extends('layouts.has-role.auth', ['title' => 'Tambah user'])

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
                <h4 class="card-title">Tambah Sekolah</h4>
            </div>
            <div class="card-body">

                <form action="#">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="nama_sekolah">Nama Sekolah</x-label>
                                <x-input id="nama_sekolah" name="nama_sekolah" placeholder="Masukkan nama sekolah" />
                            </div>
                            <div class="mb-2">
                                <x-label for="npsn">Nomor Pokok Sekolah Nasional</x-label>
                                <x-input id="npsn" name="npsn" placeholder="Masukkan NPSN" />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2">
                                <x-label for="kabupaten">Kabupaten/Kota</x-label>
                                <x-input id="kabupaten" name="kabupaten" placeholder="Masukkan Kabupaten/Kota" />
                            </div>
                            <div class="mb-2">
                                <x-label for="satuan_pendidikan">Satuan Pendidikan</x-label>
                                <x-select class="select2 form-select" id="satuan_pendidikan" name="satuan_pendidikan" data-placeholder="Pilih Satuan Pendidikan">
                                    <x-empty-option />
                                </x-select>
                            </div>
                        </div>
                    </div>
                    <x-separator marginY="2" />
                    <div class="d-flex align-items-center justify-content-start gap-2 mt-2">
                        <x-button color="success">Tambah Sekolah</x-button>
                        <x-link href="{{ route('sekolah.index') }}" color="secondary">Batalkan</x-link>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            'use strict';

            var select = $('.select2'),
                unit = $('#satuan_pendidikan')

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
                url: '/panel/sekolah/json/units',
                method: 'get',
                dataType: 'json',
                success: function(units) {
                    unit.empty().append('<option value=""></option>');

                    units.forEach(item => {
                        unit.append(`<option value="${item.id}">${item.label}</option>`)
                    })

                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data units.', status, error);
                }
            });
        })
    </script>
@endpush
