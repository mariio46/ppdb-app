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
                        <x-button color="success">Simpan Perubahan</x-button>
                        <x-link href="{{ route('sekolah.index') }}" color="secondary">Batalkan</x-link>
                    </div>
                </form>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Hapus Data Sekolah</h5>

                <x-alert variant="danger">Apakah anda yakin ingin menghapus data sekolah ini?</x-alert>

                <x-checkbox class="form-check-danger" identifier="confirmation" label="Saya yakin untuk menghapus data sekolah ini" variant="danger" />

                <x-button class="mt-2" id="btn-delete-school" data-bs-toggle="modal" data-bs-target="#delete-school" type="button" color="danger" disabled>Hapus Data Sekolah</x-button>
                <x-modal modal_id="delete-school" label_by="deleteSchoolModal">
                    <x-modal.header>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                    </x-modal.header>
                    <x-modal.body>
                        <h5 class="text-center mt-2">Hapus Sekolah</h5>
                        <p>
                            Apakah Anda yakin ingin menghapus data sekolah ini? Data yang sudah di hapus tidak bisa di kembalikan kembali
                        </p>
                    </x-modal.body>
                    <x-modal.footer class="justify-content-center mb-3">
                        <x-button color="danger">Ya, Hapus</x-button>
                        <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                    </x-modal.footer>
                </x-modal>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var npsn = '{{ $npsn }}'
    </script>
    <script>
        $(function() {
            'use strict';

            var select = $('.select2'),
                check = $('#confirmation'),
                btnDeleteSchool = $('#btn-delete-school'),
                unit = $('#satuan_pendidikan');

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
                url: `/panel/sekolah/json/single-school/${npsn}`,
                method: 'get',
                dataType: 'json',
                success: function(school) {
                    console.log(school);
                    // console.log(school.unit.value);
                    $('#nama_sekolah').val(school.nama_sekolah)
                    $('#npsn').val(school.npsn)
                    $('#kabupaten').val(school.kabupaten)
                    loadUnit(school.unit.value)

                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data single user.", status, error, xhr);
                }
            })

            function loadUnit(value) {
                $.ajax({
                    url: '/panel/sekolah/json/units',
                    method: 'get',
                    dataType: 'json',
                    success: function(units) {
                        unit.empty().append('<option value=""></option>');

                        units.forEach(item => {
                            let selected = item.value === value ? 'selected' : ''
                            // console.log(value);
                            unit.append(`<option value="${item.value}" ${selected}>${item.label}</option>`)
                        })

                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to get data units.', status, error);
                    }
                })
            }

            check.change(function() {
                btnDeleteSchool.prop('disabled', !this.checked);
            });

        })
    </script>
@endpush
