@extends('layouts.has-role.auth', ["title" => "Edit Data Prestasi"])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@section('content')
    <x-breadcrumb title="Verifikasi Manual">
        <x-breadcrumb-item to="{{ route('verifikasi.manual') }}" title="Verifikasi Manual" />
        <x-breadcrumb-item to="{{ route('verifikasi.manual.detail', [$id]) }}" title="Lihat Detail Siswa" />
        <x-breadcrumb-active title="Edit Data Prestasi" />
    </x-breadcrumb>

    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Data Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('verifikasi.manual.update-achievement', [$id]) }}" method="post" id="update-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="mb-1">
                                        <x-label for="prestasi_jenis">Jenis Prestasi</x-label>
                                        <x-select class="form-select select2" id="prestasi_jenis" name="prestasi_jenis" data-placeholder="Jenis Prestasi" data-minimum-results-for-search="-1">
                                            <option value=""></option>
                                            <option value="berjenjang">Individu Berjenjang</option>
                                            <option value="tidak_berjenjang">Individu Tidak Berjenjang</option>
                                            <option value="beregu">Beregu</option>
                                        </x-select>
                                    </div>

                                    <div class="mb-1">
                                        <x-label for="prestasi_tingkat">Tingkatan Prestasi</x-label>
                                        <x-select class="form-select select2" id="prestasi_tingkat" name="prestasi_tingkat" data-placeholder="Tingkatan Prestasi" data-minimum-results-for-search="-1">
                                            <option value=""></option>
                                            <option value="internasional">Internasional</option>
                                            <option value="nasional">Nasional</option>
                                            <option value="provinsi">Provinsi</option>
                                            <option value="kabupaten">Kabupaten</option>
                                        </x-select>
                                    </div>

                                    <div class="mb-2">
                                        <p>Bobot: <span id="bobotshow">0</span> poin</p>
                                        <x-input type="hidden" name="bobot" id="bobot"></x-input>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-1">
                                        <x-label for="prestasi_juara">Juara ke</x-label>
                                        <x-select class="form-select select2" id="prestasi_juara" name="prestasi_juara" data-placeholder="Juara ke" data-minimum-results-for-search="-1">
                                            <option value=""></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </x-select>
                                    </div>

                                    <div class="mb-1">
                                        <x-label for="prestasi_nama">Nama Prestasi</x-label>
                                        <x-input name="prestasi_nama" id="prestasi_nama" placeholder="Nama Prestasi" />
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <x-button type="submit" color="success">Simpan Perubahan</x-button>
                                    <x-link color="secondary" variant="outline" href="{{ route('verifikasi.manual.detail', [$id]) }}">Kembali</x-link>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var id = "{{ $id }}";
    </script>
    <script>
        $(function() {
            'use strict';

            var select = $(".select2"),
                atype = $('#prestasi_jenis'),
                alevel = $('#prestasi_tingkat'),
                achamp = $('#prestasi_juara'),
                aname = $('#prestasi_nama'),
                aweight = $('#bobotshow'),
                form = $('#update-form');

            select.each(function() {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    dropdownParent: $this.parent()
                });
            });

            //------------------------------------------------------------
            getData();

            //------------------------------------------------------------
            if (form.length) {
                let r = {required: true};
                let m = {required: "Tidak boleh dikosongkan."}

                form.validate({
                    rules: {
                        prestasi_jenis: r,
                        prestasi_tingkat: r,
                        prestasi_juara: r,
                        prestasi_nama: r,
                    },
                    messages: {
                        prestasi_jenis: m,
                        prestasi_tingkat: m,
                        prestasi_juara: m,
                        prestasi_nama: m,
                    }
                });
            }

            if (atype.length && alevel.length && achamp.length) {
                $('#prestasi_jenis, #prestasi_tingkat, #prestasi_juara').change(function() {
                    let w = countBobot(atype.val(), alevel.val(), achamp.val());
                    // console.log(w, atype.val(), alevel.val(), achamp.val());
                    aweight.text(w);
                    $('#bobot').val(w);
                });
            }

            function countBobot(type, level, n) {
                let bobot = 0;
                if (type == "berjenjang" && level == "internasional" && n == 1) {
                    bobot = 100;
                } else if (type == "berjenjang" && level == "internasional" && n == 2) {
                    bobot = 95;
                } else if (type == "berjenjang" && level == "internasional" && n == 3) {
                    bobot = 90;
                } else if (type == "berjenjang" && level == "nasional" && n == 1) {
                    bobot = 85;
                } else if (type == "berjenjang" && level == "nasional" && n == 2) {
                    bobot = 80;
                } else if (type == "berjenjang" && level == "nasional" && n == 3) {
                    bobot = 75;
                } else if (type == "berjenjang" && level == "provinsi" && n == 1) {
                    bobot = 70;
                } else if (type == "berjenjang" && level == "provinsi" && n == 2) {
                    bobot = 65;
                } else if (type == "berjenjang" && level == "provinsi" && n == 3) {
                    bobot = 60;
                } else if (type == "berjenjang" && level == "kabupaten" && n == 1) {
                    bobot = 55;
                } else if (type == "berjenjang" && level == "kabupaten" && n == 2) {
                    bobot = 50;
                } else if (type == "berjenjang" && level == "kabupaten" && n == 3) {
                    bobot = 45;
                } else if (type == "tidak_berjenjang" && level == "internasional" && n == 1) {
                    bobot = 85;
                } else if (type == "tidak_berjenjang" && level == "internasional" && n == 2) {
                    bobot = 80;
                } else if (type == "tidak_berjenjang" && level == "internasional" && n == 3) {
                    bobot = 75;
                } else if (type == "tidak_berjenjang" && level == "nasional" && n == 1) {
                    bobot = 70;
                } else if (type == "tidak_berjenjang" && level == "nasional" && n == 2) {
                    bobot = 65;
                } else if (type == "tidak_berjenjang" && level == "nasional" && n == 3) {
                    bobot = 60;
                } else if (type == "tidak_berjenjang" && level == "provinsi" && n == 1) {
                    bobot = 55;
                } else if (type == "tidak_berjenjang" && level == "provinsi" && n == 2) {
                    bobot = 50;
                } else if (type == "tidak_berjenjang" && level == "provinsi" && n == 3) {
                    bobot = 45;
                } else if (type == "tidak_berjenjang" && level == "kabupaten" && n == 1) {
                    bobot = 40;
                } else if (type == "tidak_berjenjang" && level == "kabupaten" && n == 2) {
                    bobot = 35;
                } else if (type == "tidak_berjenjang" && level == "kabupaten" && n == 3) {
                    bobot = 30;
                } else if (type == "beregu" && level == "internasional" && n == 1) {
                    bobot = 70;
                } else if (type == "beregu" && level == "internasional" && n == 2) {
                    bobot = 65;
                } else if (type == "beregu" && level == "internasional" && n == 3) {
                    bobot = 60;
                } else if (type == "beregu" && level == "nasional" && n == 1) {
                    bobot = 55;
                } else if (type == "beregu" && level == "nasional" && n == 2) {
                    bobot = 50;
                } else if (type == "beregu" && level == "nasional" && n == 3) {
                    bobot = 45;
                } else if (type == "beregu" && level == "provinsi" && n == 1) {
                    bobot = 40;
                } else if (type == "beregu" && level == "provinsi" && n == 2) {
                    bobot = 35;
                } else if (type == "beregu" && level == "provinsi" && n == 3) {
                    bobot = 30;
                } else if (type == "beregu" && level == "kabupaten" && n == 1) {
                    bobot = 25;
                } else if (type == "beregu" && level == "kabupaten" && n == 2) {
                    bobot = 20;
                } else if (type == "beregu" && level == "kabupaten" && n == 3) {
                    bobot = 15;
                }

                return bobot;
            }

            function getData() {
                $.ajax({
                    url: `/panel/verifikasi-manual/d/${id}/get-data-detail`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        let d = data.data;

                        atype.val(d.prestasi_jenis).trigger('change');
                        alevel.val(d.prestasi_tingkat).trigger('change');
                        achamp.val(d.prestasi_juara).trigger('change');
                        aname.val(d.prestasi_nama);
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }
        });
    </script>
@endpush