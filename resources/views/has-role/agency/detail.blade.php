@extends('layouts.has-role.auth', ['title' => 'Detail Cabang Dinas'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Cabang Dinas</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('cabang-dinas.index') }}">Cabang Dinas</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Detail Cabang Dinas
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

    <div class="content-body row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Cabang Dinas</div>
                </div>
                <div class="card-body">
                    <form id="formUpdateAgency" action="/panel/cabang-dinas/update" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id_agency }}">

                        <div class="row">
                            {{-- name --}}
                            <div class="col-md-6 col-12 mb-1">
                                <x-label for="name">Nama Wilayah</x-label>
                                <x-input id="name" name="name" type="text" placeholder="Masukkan Nama Wilayah" />
                            </div>

                            {{-- phone number --}}
                            <div class="col-md-6 col-12 mb-1">
                                <x-label for="phone">Nomor Telepon</x-label>
                                <x-input id="phone" name="phone" type="text" placeholder="Masukkan Nomor Telepon" maxlength="13" />
                            </div>

                            {{-- service area --}}
                            <div class="col-md-6 col-12 mb-1">
                                <x-label for="serviceArea">Wilayah Kerja Pelayanan</x-label>
                                <x-select class="form-select select2" id="serviceArea" name="serviceArea[]" data-placeholder="Pilih Wilayah Kerja Pelayanan" multiple="multiple">
                                    <option value=""></option>
                                </x-select>
                            </div>

                            {{-- position --}}
                            <div class="col-md-6 col-12 mb-1">
                                <x-label for="position">Kedudukan <small class="text-muted">(Pilih wilayah kerja terlebih dahulu)</small></x-label>
                                <x-select class="form-select select2" id="position" name="position" data-placeholder="Pilih kedudukan wilayah" data-minimum-results-for-search="-1">
                                    <option value=""></option>
                                </x-select>
                            </div>

                            {{-- address --}}
                            <div class="col-md-6 col-12 mb-2">
                                <x-label for="address">Alamat</x-label>
                                <x-textarea id="address" name="address" placeholder="Masukkan Alamat Wilayah"></x-textarea>
                            </div>
                        </div>
                        <div>
                            <x-button type="submit" color="success">Simpan Perubahan</x-button>
                            <a class="btn btn-flat-secondary" href="{{ route('cabang-dinas.index') }}">Batalkan</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Hapus Cabang Dinas
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning p-1">
                        <p class="mb-0">Apakah anda yakin ingin menghapus Cabang Dinas ini?</p>
                    </div>

                    <div class="mb-1">
                        <x-checkbox identifier="isCheckRemove" label="Saya yakin untuk menghapus Cabang Dinas ini" variant="danger" />
                    </div>

                    <div class="mb-1">
                        <x-button id="btnForModal" data-bs-toggle="modal" data-bs-target="#modalRemove" type="button" color="danger" disabled>Hapus Data Cabang Dinas</x-button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade text-start" id="modalRemove" aria-labelledby="modalRemoveLabel" aria-hidden="true" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalRemoveLabel">Hapus Cabang Dinas</h4>
                                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-danger p-1">
                                        <h4 class="text-center text-danger fw-bolder" id="agencyName"></h4>
                                        <p>
                                            Anda yakin akan menghapus Cabang Dinas tersebut?
                                        </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('cabang-dinas.remove') }}" method="post">
                                        @csrf
                                        <input id="agencyId" name="agencyId" type="hidden" value="{{ $id_agency }}">
                                        <button class="btn btn-danger" type="submit">Ya, Hapus Cabang Dinas</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
        var idAgency = '{{ $id_agency ?? '' }}';
    </script>
    <script>
        $(function() {
            'use strict';

            var selectedOption = [],
                select = $('.select2'),
                serviceArea = $('#serviceArea'),
                position = $('#position'),
                form = $('#formUpdateAgency'),
                check = $('#isCheckRemove'),
                btnForModal = $('#btnForModal'),
                agencyId = $('#agencyId'),
                agencyName = $('#agencyName');

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
                url: '/panel/cabang-dinas/get-cabang-dinas-by-id/' + idAgency,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    let areas = data.wilayah.map(function(wilayah) {
                        return wilayah.kode + '|' + wilayah.nama;
                    });

                    console.log(data);

                    $('#name').val(data.nama);
                    $('#phone').val(data.nomor_telepon);
                    loadServiceArea(areas, data.kedudukan_kode + '|' + data.kedudukan);
                    $('#address').val(data.alamat);

                    // modal
                    agencyName.text(data.nama);
                },
                error: function(xhr, status, error) {
                    console.error("Failed to get data.", status, error);
                }
            });

            function loadServiceArea(serviceAreaArray, positionData) {
                $.ajax({
                    url: '/panel/get-city',
                    method: 'get',
                    dataType: 'json',
                    success: function(cities) {
                        serviceArea.empty().append('<option value=""></option>');

                        cities.forEach(city => {
                            let value = city.code + '|' + city.name;

                            let opt = $("<option></option>").val(value).text(city.name);

                            if (serviceAreaArray.indexOf(value) !== -1) {
                                opt.attr('selected', 'selected');

                                position.append('<option value="' + value + '" ' + ((value == positionData) ? 'selected' : '') + '>' + city.name + '</option>');
                            }

                            serviceArea.append(opt);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to get data.', status, error);
                    }
                });
            }

            serviceArea.change(function() {
                var selected = $(this).val();

                position.empty().append('<option value=""></option>');

                selectedOption = selected;

                $.each(selected, function(index, value) {
                    let s = value.split('|');
                    position.append('<option value="' + value + '">' + s[1] + '</option>');
                });
            });

            if (form.length) {
                form.validate({
                    rules: {
                        name: {
                            required: true
                        },
                        phone: {
                            required: true,
                            digits: true
                        },
                        serviceArea: {
                            required: true
                        },
                        position: {
                            required: true
                        },
                        address: {
                            required: true
                        }
                    },
                    messages: {
                        name: {
                            required: 'Harus diisi.'
                        },
                        phone: {
                            required: 'Harus diisi.',
                            digits: 'Nomor telepon tidak valid.'
                        },
                        serviceArea: {
                            required: 'Pilih minimal 1.'
                        },
                        position: {
                            required: 'Pilih salah satu.'
                        },
                        address: {
                            required: 'Harus diisi.'
                        }
                    }
                });
            }

            check.change(function() {
                btnForModal.prop('disabled', !this.checked);
            });
        });
    </script>
@endpush
