@extends('layouts.has-role.auth', ['title' => 'Edit Data Siswa'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    {{-- breadcrumbs --}}
    <x-breadcrumb title="Akun Siswa">
        <x-breadcrumb-item to="{{ route('siswa.index') }}" title="Akun Siswa" />
        <x-breadcrumb-item to="{{ route('siswa.show', [$id]) }}" title="Detail Siswa" />
        <x-breadcrumb-active title="Edit Data Siswa" />
    </x-breadcrumb>
    
    {{-- content --}}
    <div class="content-body row">
        <div class="col-12">
            <div class="card">
                <form id="formData" action="{{ route('schedules.update.time', [$type, $id]) }}" method="post">
                    @csrf
                    <div class="card-body px-0">
                        <h5 class="card-title text-primary mb-2 px-2">Jadwal {{ ucwords(strtr($type, '_', ' ')) }} Tahap <span id="phs"></span></h5>

                        <input id="length" name="length" type="hidden">

                        <table class="table table-striped border-bottom">
                            <thead>
                                <tr>
                                    <th class="py-2 col-6">Hari, Tanggal</th>
                                    <th class="py-2 col-3">Jam Mulai</th>
                                    <th class="py-2 col-3">Jam Selesai</th>
                                </tr>
                            </thead>
                            <tbody id="dateSections">
                                <tr>
                                    <td colspan="3">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="spinner-grow spinner-grow-sm me-1" role="status"></span>
                                            Loading...
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="px-2 mt-2">
                            <x-button id="btnSubmit" type="submit" color="success">Simpan Perubahan</x-button>
                            <x-link href="{{ route('schedules.detail', [$id]) }}" color="secondary" variant="outline">Batalkan</x-link>
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
        var id_schedule = '{{ $id }}',
            type_schedule = '{{ $type }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var select2 = $('.select2'),
                section = $('#dateSections'),
                form = $('#formData'),
                submit = $('#submitBtn'),
                months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

            generate();

            if (form.length) {
                form.validate();
            }

            function generate() {
                $.ajax({
                    url: `/panel/tahap-jadwal/json/e-${type_schedule}/${id_schedule}/get-data`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        section.empty();

                        let d = data.data;
                        console.log(d);
                        $('#phs').text(d.tahap);

                        var start = new Date(d[`${type_schedule}_mulai`]);
                        var end = new Date(d[`${type_schedule}_selesai`]);
                        var range = [];

                        // looping to get dates of range
                        while (start <= end) {
                            range.push(new Date(start));
                            start.setDate(start.getDate() + 1); // Tambah satu hari
                        }

                        $('#length').val(range.length);

                        for (var i = 0; i < range.length; i++) {
                            let dt = range[i].toISOString().split('T')[0].toString();
                            let id = null,
                                start_time = null,
                                end_time;
                            if (d.batas.length > 0) {
                                let rangeData = d.batas.find(function(batas) {
                                    return batas.tanggal == dt;
                                }) || {};

                                if (Object.entries(rangeData).length > 0) {
                                    id = rangeData.batas_id;
                                    start_time = rangeData.jam_mulai;
                                    end_time = rangeData.jam_selesai;
                                }
                            }

                            let j = i + 1;
                            let r = `<tr>
                                <td>
                                    ${generateDate(j, id, range[i])}
                                </td>
                                <td class="py-2">
                                    <div class="row">
                                        <input type="time" class="form-control" name="s_${j}" id="s_${j}" placeholder="Waktu Mulai" value="${start_time}">
                                        <input type="hidden" name="current_s_${j}" id="current_s_${j}" value="${start_time}">
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <input type="time" class="form-control" name="e_${j}" id="e_${j}" placeholder="Waktu Selesai" value="${end_time}">
                                        <input type="hidden" name="current_e_${j}" id="current_e_${j}" value="${end_time}">
                                    </div>
                                </td>
                            </tr>`;

                            section.append(r);

                            $('.select2').each(function() {
                                var $this = $(this);
                                $this.wrap('<div class="position-relative"></div>');
                                $this.select2({
                                    dropdownParent: $this.parent()
                                });
                            });

                            $(`#s_${j}`).rules('add', {
                                required: true,
                                messages: {
                                    'required': 'Harus diisi.'
                                }
                            });
                            $(`#e_${j}`).rules('add', {
                                required: true,
                                messages: {
                                    'required': 'Harus diisi.'
                                }
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("get data failed.", status, error);
                    }
                });
            }

            function generateDate(n, id, date) {
                let d = (new Date(date)).toISOString().split('T')[0];

                return `${days[date.getDay()]}, ${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}
                <input type="hidden" name="id_${n}" id="id_${n}" value="${id}">
                <input type="hidden" name="date_${n}" id="date_${n}" value="${d}">`;
            }
        });
    </script>
@endpush
