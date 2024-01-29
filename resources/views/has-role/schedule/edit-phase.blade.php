@extends('layouts.has-role.auth', ['title' => 'Edit Tahap'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    {{-- breadcrumbs --}}
    <x-breadcrumb title="Tahap & Jadwal">
        <x-breadcrumb-item to="{{ route('schedules.index') }}" title="Tahap & Jadwal" />
        <x-breadcrumb-item to="{{ route('schedules.detail', [$id]) }}" title="Lihat Detail" />
        <x-breadcrumb-active title="Edit Tahap" />
    </x-breadcrumb>
    
    {{-- content --}}
    <div class="content-body row">
        <div class="col-12">
            <div class="card">
                <form id="formData" action="{{ route('schedules.edit', [$id]) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <h5 class="text-primary mb-1">Pendaftaran Tahap</h5>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="phase">Pendaftaran Tahap</x-label>

                                    <x-input id="phase" name="phase" type="text" placeholder="Tahap" readonly />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h5 class="text-primary mb-1">Jalur Pendaftaran</h5>
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="mb-2">
                                    <x-label for="sma">SMA</x-label>
                                    <x-select class="form-select select2" id="sma" name="sma[]" data-placeholder="Pilih Jalur SMA" multiple>
                                        <option value=""></option>
                                    </x-select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="mb-2">
                                    <x-label for="smk">SMK</x-label>
                                    <x-select class="form-select select2" id="smk" name="smk[]" data-placeholder="Pilih Jalur SMK" multiple>
                                        <option value=""></option>
                                    </x-select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h5 class="text-primary mb-1">Jadwal Pendaftaran</h5>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="regisStart">Tanggal Mulai Pendaftaran</x-label>
                                    <x-input id="regisStart" name="regisStart" type="date" placeholder="Tanggal mulai" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="regisEnd">Tanggal Selesai Pendaftaran</x-label>
                                    <x-input id="regisEnd" name="regisEnd" type="date" placeholder="Tanggal selesai" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h5 class="text-primary mb-1">Jadwal Verifikasi</h5>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="verifStart">Tanggal Mulai Verifikasi</x-label>
                                    <x-input id="verifStart" name="verifStart" type="date" placeholder="Tanggal mulai" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="verifEnd">Tanggal Selesai Verifikasi</x-label>
                                    <x-input id="verifEnd" name="verifEnd" type="date" placeholder="Tanggal selesai" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h5 class="text-primary mb-1">Jadwal Pengumuman</h5>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="announcement">Tanggal Pengumuman</x-label>
                                    <x-input id="announcement" name="announcement" type="date" placeholder="Tanggal pengumuman" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <h5 class="text-primary mb-1">Jadwal Daftar Ulang</h5>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="reRegisStart">Tanggal Mulai Daftar Ulang</x-label>
                                    <x-input id="reRegisStart" name="reRegisStart" type="date" placeholder="Tanggal mulai" />
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-2">
                                    <x-label for="reRegisEnd">Tanggal Selesai Daftar Ulang</x-label>
                                    <x-input id="reRegisEnd" name="reRegisEnd" type="date" placeholder="Tanggal selesai" />
                                </div>
                            </div>
                        </div>

                        <div class="my-2">
                            <x-button id="submitBtn" type="submit" color="success">Simpan Perubahan</x-button>

                            <a class="btn btn-outline-secondary" type="button" href="{{ route('schedules.detail', [$id]) }}">Batalkan</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
    <script>
        var idSchedule = '{{ $id }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var select2 = $('.select2'),
                form = $('#formData'),
                tracksma = $('#sma'),
                tracksmk = $('#smk'),
                submit = $('#submitBtn');

            if (select2.length) {
                select2.each(function() {
                    var $this = $(this);
                    $this.wrap('<div class="position-relative"></div>');
                    $this.select2({
                        dropdownParent: $this.parent()
                    });
                });
            }

            getData();

            function getData() {
                $.ajax({
                    url: '/panel/tahap-jadwal/get-single-data/' + idSchedule,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        let d = data.data[0];
                        console.log(d);
                        let smaList = (d.sma) ? d.sma.map(function(sma) {
                            return sma.kode_jalur
                        }) : {};
                        let smkList = (d.smk) ? d.smk.map(function(smk) {
                            return smk.kode_jalur
                        }) : {};

                        console.log(smaList);

                        $('#phase').val("Tahap " + d.tahap);
                        generateSchools(tracksma, 'sma', smaList);
                        generateSchools(tracksmk, 'smk', smkList);
                        $('#regisStart').val(d.pendaftaran_mulai);
                        $('#regisEnd').val(d.pendaftaran_selesai);
                        $('#verifStart').val(d.verifikasi_mulai);
                        $('#verifEnd').val(d.verifikasi_selesai);
                        $('#announcement').val(d.pengumuman);
                        $('#reRegisStart').val(d.daftar_ulang_mulai);
                        $('#reRegisEnd').val(d.daftar_ulang_selesai);
                    },
                    error: function(xhr, status, error) {
                        console.error("get data failed.", status, error);
                    }
                });
            }

            if (form.length) {
                let fields = ["regisStart", "regisEnd", "verifStart", "verifEnd", "announcement", "reRegisStart", "reRegisEnd"];

                let validationConf = {
                    rules: {},
                    messages: {}
                };

                fields.forEach(field => {
                    validationConf.rules[field] = {
                        required: true
                    };
                    validationConf.messages[field] = "Bidang ini tidak boleh dikosongkan."
                });

                form.validate(validationConf);

                $('#sma').rules("add", {
                    requiredDepends: "#smk",
                    messages: {
                        requiredDepends: "Pilih minimal 1 Jalur SMA atau SMK."
                    }
                });
                $('#smk').rules("add", {
                    requiredDepends: "#sma",
                    messages: {
                        requiredDepends: "Pilih minimal 1 Jalur SMA atau SMK."
                    }
                });

                $.validator.addMethod("requiredDepends", function(value, element, params) {
                    var dependsValue = $(params).val();

                    var isDependsEmpty = (Array.isArray(dependsValue) && dependsValue.length === 0) || dependsValue === null;

                    // Jika nilai depends kosong, maka nilai saat ini harus diisi
                    return isDependsEmpty ? value.length !== 0 : true;
                }, "This field is required when the other select is empty.");
            }

            if (submit.length) {
                submit.click(function() {
                    if (form.valid()) {
                        form.submit();
                    }
                });
            }

            function generateSchools(element, type, selected) {
                $.ajax({
                    url: `/panel/tahap-jadwal/json/jalur/${type}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        element.empty().append('<option value=""></option>');

                        data.forEach(sch => {
                            element.append(`<option value="${sch.code}">${sch.name}</option>`);
                        });

                        element.val(selected).trigger('change');
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }
        });
    </script>
@endpush
