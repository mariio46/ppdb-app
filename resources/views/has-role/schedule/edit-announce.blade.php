@extends('layouts.has-role.auth', ['title' => 'Edit Jadwal Pengumuman'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    {{-- breadcrumbs --}}
    <x-breadcrumb title="Tahap & Jadwal">
        <x-breadcrumb-item title="Tahap & Jadwal" to="{{ route('schedules.index') }}" />
        <x-breadcrumb-item title="Detail Tahap" to="{{ route('schedules.detail', [$id]) }}" />
        <x-breadcrumb-active title="Edit Jadwal Pengumuman" />
    </x-breadcrumb>

    @if (session()->get('msg'))
        <div class="alert alert-{{ session()->get('stat') }} p-1">
            <p class="mb-0 text-center">{{ session()->get('msg') }}</p>
        </div>
    @endif

    {{-- content --}}
    <div class="content-body row">
        <div class="col-12">
            <div class="card">
                <div class="card-body px-0">
                    <form id="formData" action="{{ route('schedules.update.time', ['pengumuman', $id]) }}" method="post">
                        @csrf
                        <h5 class="card-title text-primary mb-2 px-2">Jadwal Verifikasi Manual Tahap <span id="phs"></span></h5>

                        <input id="length" name="length" type="hidden">

                        <table class="table table-striped border-bottom">
                            <thead>
                                <tr>
                                    <th class="py-2 col-9">Hari, Tanggal</th>
                                    <th class="py-2 text-end col-3">Jam Pengumuman</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span id="dateShow"></span>
                                        <input id="id" name="id" type="hidden">
                                        <input id="date" name="date" type="hidden">
                                    </td>
                                    <td>
                                        <x-input type="hidden" name="current_time" id="current_time" />
                                        <x-input type="time" name="time" id="time" placeholder="hh.mm" step="60" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="px-2 mt-2">
                            <x-button id="btnSubmit" type="submit" color="success">Simpan Perubahan</x-button>
                            <x-link href="{{ route('schedules.detail', [$id]) }}" color="secondary" variant="outline">Batalkan</x-link>
                        </div>
                    </form>
                </div>
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
        var id_schedule = '{{ $id }}',
            type_schedule = '{{ $type }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var select2 = $('.select2'),
                form = $('#formData'),
                submit = $('#submitBtn'),
                months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

            generate();

            select2.each(function() {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                    dropdownParent: $this.parent()
                });
            });

            if (form.length) {
                form.validate({
                    rules: {
                        time: {
                            required: true
                        }
                    },
                    messages: {
                        time: {
                            required: 'Harus diisi.'
                        }
                    }
                });
            }

            function generate() {
                $.ajax({
                    url: `/panel/tahap-jadwal/json/e-${type_schedule}/${id_schedule}/get-data`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        let d = data.data;
                        $('#phs').text(d.tahap);
                        
                        let dt = new Date(d.pengumuman);

                        $('#dateShow').text(`${days[dt.getDay()]}, ${dt.getDate()} ${months[dt.getMonth()]} ${dt.getFullYear()}`);
                        $('#date').val(d.pengumuman);
                        
                        if (d.batas.length) {
                            $('#id').val(d.batas[0].batas_id);
                            $('#time').val(d.batas[0].jam_mulai);
                            $('#current_time').val(d.batas[0].jam_mulai);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("get data failed.", status, error);
                    }
                });
            }
        });
    </script>
@endpush
