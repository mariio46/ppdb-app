@extends('layouts.has-role.auth', ['title' => 'Edit Jadwal Pendaftaran'])

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
                                Edit Jadwal Pendaftaran
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
                <form id="formData" action="{{ route('schedules.update.regis', [$id]) }}" method="post">
                    @csrf
                    <div class="card-body px-0">
                        <h5 class="card-title text-primary mb-2 px-2">Jadwal Pendaftaran Tahap 1</h5>

                        <input id="phase" name="phase" type="hidden" value="{{ $id }}">
                        <input id="length" name="length" type="hidden">

                        <table class="table table-striped border-bottom">
                            <thead>
                                <tr>
                                    <th class="py-2">Hari, Tanggal</th>
                                    <th class="py-2">Jam Mulai</th>
                                    <th class="py-2">Jam Selesai</th>
                                </tr>
                            </thead>
                            <tbody id="dateSections"></tbody>
                        </table>

                        {{-- <div class="row">
                        <div class="mb-1 col-lg-4 col-12">
                            <label for="date1" class="form-label">Tanggal</label>
                            <input type="date" class="form-control w-100" name="date1" id="date1" readonly>
                        </div>

                        <div class="mb-1 col-lg-4 col-md-6 col-12">
                            <label for="sH1" class="form-label">Jam Mulai Pendaftaran</label>
                            <div class="d-flex">
                                <div class="flex-fill me-1">
                                    <select class="form-select select2" name="sH1" id="sH1" data-placeholder="Jam" data-minimum-results-for-search="-1">
                                        <option value=""></option>
                                        <?php for ($sh = 0; $sh < 24 ; $sh++) : ?>
                                            <option value="<?= $sh < 10 ? '0' . $sh : $sh ?>"><?= $sh < 10 ? '0' . $sh : $sh ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                                <div class="flex-fill ms-1">
                                    <select class="form-select select2" name="sM1" id="sM1" data-placeholder="Menit" data-minimum-results-for-search="-1">
                                        <option value=""></option>
                                        <?php for ($sm = 0; $sm < 59 ; $sm++) : ?>
                                            <option value="<?= $sm < 10 ? '0' . $sm : $sm ?>"><?= $sm < 10 ? '0' . $sm : $sm ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-1 col-lg-4 col-md-6 col-12">
                            <label for="sH1" class="form-label">Jam Selesai Pendaftaran</label>
                            <div class="d-flex">
                                <div class="flex-fill me-1">
                                    <select class="form-select select2" name="eH1" id="eH1" data-placeholder="Jam" data-minimum-results-for-search="-1">
                                        <option value=""></option>
                                        <?php for ($eh = 0; $eh < 24 ; $eh++) : ?>
                                            <option value="<?= $eh < 10 ? '0' . $eh : $eh ?>"><?= $eh < 10 ? '0' . $eh : $eh ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                                <div class="flex-fill ms-1">
                                    <select class="form-select select2" name="eM1" id="eM1" data-placeholder="Menit" data-minimum-results-for-search="-1">
                                        <option value=""></option>
                                        <?php for ($em = 0; $em < 59 ; $em++) : ?>
                                            <option value="<?= $em < 10 ? '0' . $em : $em ?>"><?= $em < 10 ? '0' . $em : $em ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> --}}

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
        var idSchedule = '{{ $id }}';
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
                    url: '/panel/tahap-jadwal/e-regis/' + idSchedule + '/get-data',
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        let d = data.data;

                        var start = new Date(d.pendaftaran_mulai);
                        var end = new Date(d.pendaftaran_selesai);
                        var range = [];

                        // looping to get dates of range
                        while (start <= end) {
                            range.push(new Date(start));
                            start.setDate(start.getDate() + 1); // Tambah satu hari
                        }

                        $('#length').val(range.length);

                        for (var i = 0; i < range.length; i++) {
                            let dt = range[i].toISOString().split('T')[0].toString();
                            let id, sh, sm, eh, em;
                            if (d.batas.length > 0) {
                                let rangeData = d.batas.find(function(batas) {
                                    return batas.tanggal == dt;
                                }) || [];

                                if (rangeData.length > 0) {
                                    id = rangeData.batas_id;

                                    let sData = rangeData.jam_mulai.split('.');
                                    sh = sData[0];
                                    sm = sData[1];

                                    let eData = rangeData.jam_selesai.split('.');
                                    eh = eData[0];
                                    em = eData[1];
                                } else {
                                    id = null;
                                    sh = null;
                                    sm = null;
                                    eh = null;
                                    em = null;
                                }
                            }

                            let j = i + 1;
                            let row = '<tr>' +
                                '<td>' +
                                generateDate(j, id, range[i]) +
                                '</td>' +
                                '<td class="py-2"><div class="row">' +
                                generateHours('sH' + j, sh) +
                                generateMinutes('sM' + j, sm) +
                                '</div></td>' +
                                '<td><div class="row">' +
                                generateHours('eH' + j, eh) +
                                generateMinutes('eM' + j, em) +
                                '</div></td>' +
                                '</tr>';

                            section.append(row);

                            $('.select2').each(function() {
                                var $this = $(this);
                                $this.wrap('<div class="position-relative"></div>');
                                $this.select2({
                                    dropdownParent: $this.parent()
                                });
                            });

                            $('#sH' + j).rules('add', {
                                required: true,
                                messages: {
                                    'required': 'Harus diisi.'
                                }
                            });
                            $('#sM' + j).rules('add', {
                                required: true,
                                messages: {
                                    'required': 'Harus diisi.'
                                }
                            });
                            $('#eH' + j).rules('add', {
                                required: true,
                                messages: {
                                    'required': 'Harus diisi.'
                                }
                            });
                            $('#eM' + j).rules('add', {
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

                // return `<div class="mb-1 col-lg-4 col-12">
            //             <label for="date${n}" class="form-label">Tanggal</label>
            //             <input type="date" class="form-control w-100" name="date${n}" id="date${n}" value="${d}" readonly>
            //         </div>`;
                return days[date.getDay()] + ', ' + date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear() +
                    `<input type="hidden" name="id${n}" id="id${n}" value="${id}">` +
                    `<input type="hidden" name="date${n}" id="date${n}" value="${d}">`;
                // return `<input type="date" class="form-control w-100" name="date${n}" id="date${n}" value="${d}" readonly>`;
            }

            function generateHours(id, value = null) {
                // let html = `<div class="flex-fill me-1">
            //             <select class="form-select select2" name="${id}" id="${id}" data-placeholder="Jam" data-minimum-results-for-search="-1">
            //                 <option value=""></option>`;
                let html =
                    `<div class="col-md-6 col-12"><select class="form-select select2" name="${id}" id="${id}" data-placeholder="Jam" data-minimum-results-for-search="-1"><option value=""></option>`;

                for (let h = 0; h < 24; h++) {
                    let s = (h < 10) ? '0' + h : h;
                    let sel = (s == value) ? 'selected' : '';
                    html += `<option value="${s}" ${sel}>${s}</option>`;
                }

                html += `</select></div>`;


                return html;
            }

            function generateMinutes(id, value = null) {
                // let html = `<div class="flex-fill ms-1">
            //             <select class="form-select select2" name="${id}" id="${id}" data-placeholder="Menit" data-minimum-results-for-search="-1">
            //                 <option value=""></option>`;
                let html =
                    `<div class="col-md-6 col-12"><select class="form-select select2" name="${id}" id="${id}" data-placeholder="Menit" data-minimum-results-for-search="-1"><option value=""></option>`;

                for (let m = 0; m < 60; m++) {
                    let s = (m < 10) ? '0' + m : m;
                    let sel = (s == value) ? 'selected' : '';
                    html += `<option value="${s}" ${sel}>${s}</option>`;
                }

                html += `</select></div>`;

                return html;
            }
        });
    </script>
@endpush
