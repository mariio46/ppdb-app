@extends('layouts.has-role.auth', ['title' => 'Edit Tahap'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
{{-- breadcrumbs --}}
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Tahap & Jadwal</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('schedules.index') }}">
                                Tahap & Jadwal
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('schedules.detail', [$id]) }}">
                                Detail Tahap
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            Edit Tahap
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session()->get('msg'))
    <div class="alert alert-{{ session()->get('stat') }} p-1">
        <p class="mb-0 text-center">{{ session()->get('msg') }}</p>
    </div>
@endif

{{-- content --}}
<div class="content-body row">
    <div class="col-12">
        <div class="card">
            <form action="{{ route('schedules.edit') }}" method="post" id="formData">
                @csrf
                <div class="card-body">
                    <h5 class="text-primary mb-1">Pendaftaran Tahap</h5>
                    
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                <x-label for="phase">Pendaftaran Tahap</x-label>
                        
                                <x-input type="text" name="phase" id="phase" placeholder="Tahap" readonly />
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
                                <x-select class="form-select select2" name="sma[]" id="sma" data-placeholder="Pilih Jalur SMA" multiple>
                                    <option value=""></option>
                                    <option value="smaafirmasi">Afirmasi</option>
                                    <option value="boardingschool">Boarding School</option>
                                </x-select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="mb-2">
                                <x-label for="smk">SMK</x-label>
                                <x-select class="form-select select2" name="smk[]" id="smk" data-placeholder="Pilih Jalur SMK" multiple>
                                    <option value=""></option>
                                    <option value="smkafirmasi">Afirmasi</option>
                                    <option value="smkanakdudi">Anak DUDI</option>
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
                                <x-input type="date" name="regisStart" id="regisStart" placeholder="Tanggal mulai" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                <x-label for="regisEnd">Tanggal Selesai Pendaftaran</x-label>
                                <x-input type="date" name="regisEnd" id="regisEnd" placeholder="Tanggal selesai" />
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
                                <x-input type="date" name="verifStart" id="verifStart" placeholder="Tanggal mulai" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                <x-label for="verifEnd">Tanggal Selesai Verifikasi</x-label>
                                <x-input type="date" name="verifEnd" id="verifEnd" placeholder="Tanggal selesai" />
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
                                <x-input type="date" name="announcement" id="announcement" placeholder="Tanggal pengumuman" />
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
                                <x-input type="date" name="reRegisStart" id="reRegisStart" placeholder="Tanggal mulai" />
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                <x-label for="reRegisEnd">Tanggal Selesai Daftar Ulang</x-label>
                                <x-input type="date" name="reRegisEnd" id="reRegisEnd" placeholder="Tanggal selesai" />
                            </div>
                        </div>
                    </div>
        
                    <div class="my-2">
                        <x-button color="success" type="submit" id="submitBtn">Simpan Perubahan</x-button>
                    
                        <a href="{{ route('schedules.detail', [$id]) }}" class="btn btn-outline-secondary" type="button">Batalkan</a>
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

    function getData()
    {
        $.ajax({
            url: '/panel/tahap-jadwal/get-single-data/' + idSchedule,
            method: 'get',
            dataType: 'json',
            success: function(data) {
                let d = data.data;

                $('#phase').val("Tahap " + d.tahap);
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
        form.validate({
            rules: {
                "sma[]": {
                    requiredDepends: "#smk"
                },
                "smk[]": {
                    requiredDepends: "#sma"
                },
                regisStart: {
                    required: true
                },
                regisEnd: {
                    required: true
                },
                verifStart: {
                    required: true
                },
                verifEnd: {
                    required: true
                },
                announcement: {
                    required: true
                },
                reRegisStart: {
                    required: true
                },
                reRegisEnd: {
                    required: true
                },
            },
            messages: {
                "sma[]": {
                    requiredDepends: "Harus dipilih minimal Jalur SMA atau SMK."
                },
                "smk[]": {
                    requiredDepends: "Harus dipilih minimal Jalur SMA atau SMK"
                },
                regisStart: {
                    required: "Bidang ini harus diisi."
                },
                regisEnd: {
                    required: "Bidang ini harus diisi."
                },
                verifStart: {
                    required: "Bidang ini harus diisi."
                },
                verifEnd: {
                    required: "Bidang ini harus diisi."
                },
                announcement: {
                    required: "Bidang ini harus diisi."
                },
                reRegisStart: {
                    required: "Bidang ini harus diisi."
                },
                reRegisEnd: {
                    required: "Bidang ini harus diisi."
                },
            }
        });

        $.validator.addMethod("requiredDepends", function (value, element, params) {
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
});
</script>
@endpush