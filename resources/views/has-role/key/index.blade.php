@extends('layouts.has-role.auth', ['title' => 'Kunci Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
@endsection

@push('scripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/js/scripts/forms/form-select2.js"></script>
@endpush

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Filter</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5 col-12 mb-1 mb-sm-0">
                        <x-select class="select2 form-select" data-placeholder="Pilih Satuan Pendidikan">
                            <x-empty-option />
                            <option value="SMA">SMA</option>
                            <option value="SMK">SMK</option>
                            <option value="SMA Half Boarding">SMA Half Boarding</option>
                            <option value="SMA Boarding">SMA Boarding</option>
                        </x-select>
                    </div>
                    <div class="col-sm-5 col-12 mb-1 mb-sm-0">
                        <x-select class="select2 form-select" data-placeholder="Pilih Kabupaten/Kota">
                            <x-empty-option />
                            <option value="Pareapre">Pareapre</option>
                            <option value="Makassar">Makassar</option>
                            <option value="Maros">Maros</option>
                            <option value="Pangkep">Pangkep</option>
                            <option value="Pinrang">Pinrang</option>
                            <option value="Sidrap">Sidrap</option>
                            <option value="Enrekang">Enrekang</option>
                        </x-select>
                    </div>
                    <div class="col-sm-2 col-12 mb-1 mb-sm-0">
                        <x-button class="w-100" color="dark" disabled>Reset Filter</x-button>
                    </div>
                </div>
                <x-separator marginY="2" />
                <x-input class="w-25" id="search" name="search" placeholder="Cari user..." />
                <x-separator marginY="2" />
                <table class="table">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">NAMA</th>
                            <th scope="col">NPSN</th>
                            <th scope="col">SATUAN PENDIDIKAN</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collections as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->npsn }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    <x-button data-bs-toggle="modal" data-bs-target="#modal-buka-kunci-sekolah-{{ $item->npsn }}" type="button" color="success">Buka Kunci</x-button>
                                    <x-modal modal_id="modal-buka-kunci-sekolah-{{ $item->npsn }}" label_by="modalBukaKunciSekolah{{ $item->npsn }}">
                                        <x-modal.header>
                                            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                        </x-modal.header>
                                        <x-modal.body>
                                            <h5 class="text-center mt-2">Buka Kunci Sekolah {{ $item->name }}</h5>
                                            <p>Data sekolah yang kuncinya terbuka dapat mengedit kembali data sekolahnya kembali dengan benar, Apakah Anda ingin membuka kunci sekolah {{ $item->name }}?
                                            </p>
                                        </x-modal.body>
                                        <x-modal.footer class="justify-content-center mb-3">
                                            <x-button color="success">Buka Kunci</x-button>
                                            <x-button data-bs-dismiss="modal" color="secondary">Batalkan</x-button>
                                        </x-modal.footer>
                                    </x-modal>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
