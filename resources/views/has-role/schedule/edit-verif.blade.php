@extends('layouts.has-role.auth', ['title' => 'Edit Jadwal Verifikasi'])

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
                            Edit Jadwal Verifikasi
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
            <form action="{{ route('schedules.update.verif', [$id]) }}" method="post" id="formData">
                @csrf
                <div class="card-body px-0">
                    <h5 class="card-title text-primary mb-2 px-2">Jadwal Verifikasi Manual Tahap <span id="phase"></span></h5>

                    <input type="hidden" name="phase" id="phase" value="{{ $id }}">
                    <input type="hidden" name="length" id="length">

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
                    
                    <div class="px-2 mt-2">
                        <x-button type="submit" id="btnSubmit" color="success">Simpan Perubahan</x-button>
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
            url: '/panel/tahap-jadwal/e-verif/' + idSchedule + '/get-data',
            method: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);
                let d = data.data;

                var start = new Date(d.verifikasi_mulai);
                var end = new Date(d.verifikasi_selesai);
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
                        });

                        id = rangeData.batas_id;
    
                        let sData = rangeData.jam_mulai.split('.');
                        sh = sData[0];
                        sm = sData[1];
                        
                        let eData = rangeData.jam_selesai.split('.');
                        eh = eData[0];
                        em = eData[1];
                    }

                    let j = i + 1;
                    let row = '<tr>'
                        + '<td>'
                        + generateDate(j, id, range[i])
                        + '</td>'
                        + '<td class="py-2"><div class="row">'
                        + generateHours('sH' + j, sh)
                        + generateMinutes('sM' + j, sm)
                        + '</div></td>'
                        + '<td><div class="row">'
                        + generateHours('eH' + j, eh)
                        + generateMinutes('eM' + j, em)
                        + '</div></td>'
                        + '</tr>';

                    section.append(row);

                    $('.select2').each(function() {
                        var $this = $(this);
                        $this.wrap('<div class="position-relative"></div>');
                        $this.select2({
                            dropdownParent: $this.parent()
                        });
                    });

                    $('#sH' + j).rules('add', {required: true, messages: {'required': 'Harus diisi.'}});
                    $('#sM' + j).rules('add', {required: true, messages: {'required': 'Harus diisi.'}});
                    $('#eH' + j).rules('add', {required: true, messages: {'required': 'Harus diisi.'}});
                    $('#eM' + j).rules('add', {required: true, messages: {'required': 'Harus diisi.'}});
                }
            },
            error: function (xhr, status, error) {
                console.error("get data failed.", status, error);
            }
        });
    }

    function generateDate(n, id, date) {
        let d = (new Date(date)).toISOString().split('T')[0];

        return days[date.getDay()] + ', ' + date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear()
            + `<input type="hidden" name="id${n}" id="id${n}" value="${id}">`
            + `<input type="hidden" name="date${n}" id="date${n}" value="${d}">`;
    }

    function generateHours(id, value = null) {
        let html = `<div class="col-md-6 col-12"><select class="form-select select2" name="${id}" id="${id}" data-placeholder="Jam" data-minimum-results-for-search="-1"><option value=""></option>`;
        
        for (let h = 0; h < 24; h++) {
            let s = (h < 10) ? '0' + h : h;
            let sel = (s == value) ? 'selected' : '';
            html += `<option value="${s}" ${sel}>${s}</option>`;
        }
        
        html += `</select></div>`;


        return html;
    }

    function generateMinutes(id, value = null) {
        let html = `<div class="col-md-6 col-12"><select class="form-select select2" name="${id}" id="${id}" data-placeholder="Menit" data-minimum-results-for-search="-1"><option value=""></option>`;

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