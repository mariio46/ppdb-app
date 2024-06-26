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

                <form id="form-edit-school" action="{{ route('sekolah.update', ['id' => $id, 'unit' => $unit]) }}" method="POST">
                    @csrf
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
                                <x-label for="kabupaten">Kota/Kabupaten</x-label>
                                <x-select class="select2 form-select" id="kabupaten" name="kabupaten" data-placeholder="Pilih Kota/Kabupaten">
                                    <x-empty-option />
                                </x-select>
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
                        <x-link href="{{ route('sekolah.detail', ['id' => $id, 'unit' => $unit]) }}" color="secondary">Batalkan</x-link>
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
                        <form action="{{ route('sekolah.destroy', ['id' => $id, 'unit' => $unit]) }}" method="post">
                            @csrf
                            <x-button type="submit" color="danger">Ya, Hapus</x-button>
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
        var id = '{{ $id }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var select = $('.select2'),
                check = $('#confirmation'),
                btnDeleteSchool = $('#btn-delete-school'),
                kabupaten = $('#kabupaten'),
                form = $('#form-edit-school'),
                unit = $('#satuan_pendidikan');

            var user = $('#user');

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

            // Form Validation
            if (form.length) {
                form.validate({
                    rules: {
                        nama_sekolah: {
                            required: true,
                        },
                        npsn: {
                            required: true,
                            digits: true,
                            maxlength: 8,
                        },
                        kabupaten: {
                            required: true,
                        },
                        satuan_pendidikan: {
                            required: true,
                        },
                    },
                    messages: {
                        nama_sekolah: {
                            required: 'Nama Sekolah tidak boleh kosong.',
                        },
                        npsn: {
                            required: 'NPSN tidak boleh kosong.',
                            digits: 'NPSN hanya mengandung angka.',
                            maxlength: 'NPSN tidak boleh lebih dari 8 digit.'
                        },
                        kabupaten: {
                            required: 'Pilih salah satu Kabupaten.',
                        },
                        satuan_pendidikan: {
                            required: 'Pilih salah satu Satuan Pendidikan.',
                        },
                    }
                })
            }

            // Get Single School
            $.ajax({
                url: `/panel/sekolah/json/single-school/${id}`,
                method: 'get',
                dataType: 'json',
                success: (school) => {
                    console.log('Data Sekolah : ', school);
                    $('#nama_sekolah').val(school.nama_sekolah)
                    $('#npsn').val(school.npsn)
                    $('#kabupaten').val(school.kabupaten)
                    loadCities(school.kode_kabupaten, school.kabupaten)
                    loadUnit(school.satuan_pendidikan)

                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data single user.", status, error, xhr);
                }
            })

            // Get Data Kota / Kabupaten
            function loadCities(code, name) {
                $.ajax({
                    url: '/panel/get-city',
                    method: 'get',
                    dataType: 'json',
                    success: function(cities) {
                        kabupaten.empty().append('<option value=""></option>');
                        cities.forEach(item => {
                            let merge = `${code}|${name}`;
                            let value = `${item.code}|${item.name}`;
                            let selected_item = value === merge ? 'selected' : '';
                            // console.log('Merge : ', merge);
                            // console.log('Value : ', value);
                            kabupaten.append(`<option value="${value}" ${selected_item}>${item.name}</option>`)
                        })

                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to get data units.', status, error);
                    }
                })
            }

            // Get Data Unit
            function loadUnit(value) {
                $.ajax({
                    url: '/panel/sekolah/json/units',
                    method: 'get',
                    dataType: 'json',
                    success: (units) => {
                        unit.empty().append('<option value=""></option>');

                        units.forEach(item => {
                            let selected = item.value === value ? 'selected' : ''
                            unit.append(`<option value="${item.value}" ${selected}>${item.label}</option>`)
                        })

                    },
                    error: (xhr, status, error) => {
                        console.error('Failed to get kuota.', xhr.status, error);
                    }
                })
            }

            check.change(function() {
                btnDeleteSchool.prop('disabled', !this.checked);
            });

        })
    </script>
@endpush
