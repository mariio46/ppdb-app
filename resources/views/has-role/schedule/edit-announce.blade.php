@extends('layouts.has-role.auth', ['title' => 'Edit Jadwal Pengumuman'])

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
                                Edit Jadwal Pengumuman
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
                <div class="card-body px-0">
                    <form id="formData" action="{{ route('schedules.update.announce', [$id]) }}" method="post">
                        @csrf
                        <h5 class="card-title text-primary mb-2 px-2">Jadwal Verifikasi Manual Tahap <span id="phase"></span></h5>

                        <input id="phase" name="phase" type="hidden" value="{{ $id }}">
                        <input id="length" name="length" type="hidden">

                        <table class="table table-striped border-bottom">
                            <thead>
                                <tr>
                                    <th class="py-2">Hari, Tanggal</th>
                                    <th class="py-2 text-end">Jam Pengumuman</th>
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
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <select class="form-select select2" id="hour" name="hour" data-placeholder="Jam" data-minimum-results-for-search="-1">
                                                    <option value=""></option>
                                                    @for ($h = 0; $h < 24; $h++)
                                                        <option value="{{ $h < 10 ? '0' . $h : $h }}">{{ $h < 10 ? '0' . $h : $h }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <select class="form-select select2" id="minute" name="minute" data-placeholder="Menit" data-minimum-results-for-search="-1">
                                                    <option value=""></option>
                                                    @for ($m = 0; $m < 60; $m++)
                                                        <option value="{{ $m < 10 ? '0' . $m : $m }}">{{ $m < 10 ? '0' . $m : $m }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
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
        var idSchedule = '{{ $id }}';
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
                        hour: {
                            required: true
                        },
                        minute: {
                            required: true
                        }
                    },
                    messages: {
                        hour: {
                            required: 'Harus diisi.'
                        },
                        minute: {
                            required: 'Harus diisi.'
                        }
                    }
                });
            }

            function generate() {
                $.ajax({
                    url: '/panel/tahap-jadwal/e-announce/' + idSchedule + '/get-data',
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        let d = data.data;
                        let dt = new Date(d.pengumuman);
                        let tm = d.jam_mulai.split(".");

                        $('#dateShow').text(days[dt.getDay()] + ', ' + dt.getDate() + ' ' + months[dt.getMonth()] + ' ' + dt.getFullYear());
                        $('#id').val(d.batas_id);
                        $('#date').val(d.pengumuman);
                        $('#hour').val(tm[0]).trigger('change');
                        $('#minute').val(tm[1]).trigger('change');
                    },
                    error: function(xhr, status, error) {
                        console.error("get data failed.", status, error);
                    }
                });
            }
        });
    </script>
@endpush
