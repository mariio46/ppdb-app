@extends('layouts.student.auth')

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('styles')
    <link type="text/css" href="/css/student/pages/school/style.css" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5>Filter</h5>
                    <div class="row">
                        <div class="col-md-5 col-9 mb-1 pe-1">
                            <x-select class="form-select select2 w-100" id="eduType" data-placeholder="Satuan Pendidikan" data-minimum-results-for-search="-1">
                                <option value=""></option>
                                <option value="SMA">SMA</option>
                                <option value="SMK">SMK</option>
                            </x-select>
                        </div>
                        <div class="col-md-1 col-3 ps-0">
                            <x-button class="w-100 btn-md" id="btnResetTypeFilter" type="button" variant="outline" color="secondary">
                                <span class="d-lg-block d-none">Reset</span>
                                <span class="d-lg-none">&#10005;</span>
                            </x-button>
                        </div>

                        <div class="col-md-5 col-9 mb-1 pe-1">
                            <x-select class="form-select select2 w-100" id="city" data-placeholder="Kabupaten/Kota">
                                <option value=""></option>
                            </x-select>
                        </div>

                        <div class="col-md-1 col-3 ps-0">
                            <x-button class="w-100" id="btnResetCityFilter" type="button" variant="outline" color="secondary">
                                <span class="d-lg-block d-none">Reset</span>
                                <span class="d-lg-none">&#10005;</span>
                            </x-button>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top">
                    <table class="table" id="tableData">
                        <thead>
                            <tr>
                                <th>Nama Sekolah</th>
                                <th>NPSN</th>
                                <th>Satuan Pendidikan</th>
                                <th>Alamat</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="detailModal" aria-labelledby="modalLabel" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-white">
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center mb-3">Detail Sekolah</h5>

                    <table class="table table-borderless">
                        <tr>
                            <td class="col-auto px-0" style="width: 40%;">Nama Sekolah</td>
                            <td class="col-auto">:</td>
                            <td class="col-auto px-0"><span id="schoolName"></span></td>
                        </tr>
                        <tr>
                            <td class="col-auto px-0" style="width: 40%;">NPSN</td>
                            <td class="col-auto">:</td>
                            <td class="col-auto px-0"><span id="schoolId"></span></td>
                        </tr>
                        <tr>
                            <td class="col-auto px-0" style="width: 40%;">Alamat</td>
                            <td class="col-auto">:</td>
                            <td class="col-auto px-0"><span id="schoolAddress"></span></td>
                        </tr>
                    </table>
                </div>

                <div id="modalDepartment"></div>
            </div>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
@endsection

@push('scripts')
    <script src="/js/student/pages/school/index.js"></script>
@endpush
