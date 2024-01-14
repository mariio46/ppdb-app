@extends('layouts.has-role.auth', ['title' => 'Info Kuota Sekolah'])

@section('vendorStyles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
@endsection

@section('content')
    <div class="content-body">
        <div id="user-profile">
            @include('has-role.school-data.partials.header')
        </div>
        <div class="d-flex gap-md-2">
            @include('has-role.school-data.partials.tab')
        </div>
        <div class="card">
            <div class="card-body">
                <section class="w-100">
                    <div class="d-inline-flex gap-1 align-items-center">
                        <h3 class="mb-0">Dokumen Pakta Integritas</h3>
                        <x-badge variant="light" color="success">Terupload</x-badge>
                    </div>
                    <div class="d-flex my-2 align-items-start w-100">
                        <div class="w-25">
                            <x-label class="btn btn-outline-primary cursor-pointer" for="document" style="display: inline-flex; align-items: center">
                                <x-tabler-upload style="margin-right: 0.25rem;" />
                                Upload Pakta Integritas Baru
                            </x-label>
                            <x-input id="document" name="document" type="file" accept=".pdf" hidden required />
                        </div>
                        <div class="w-75">
                            <iframe class="w-100 min-vh-100" src="http://repository.stei.ac.id/2422/3/JurnalSTEIIndonesia_21160000013_2020OK.pdf" frameborder="0"></iframe>
                        </div>
                    </div>
                </section>
                <x-separator class="my-5" />
                <section class="w-100">
                    <div class="d-inline-flex gap-1 align-items-center">
                        <h3 class="mb-0">Dokumen Pakta Integritas</h3>
                        <x-badge variant="light" color="warning">Belum Upload</x-badge>
                    </div>
                    <div class="d-flex my-2 align-items-start w-100">
                        <div class="w-25">
                            <x-label class="btn btn-outline-primary cursor-pointer" for="document" style="display: inline-flex; align-items: center">
                                <x-tabler-upload style="margin-right: 0.25rem;" />
                                Upload SK PPDB Baru
                            </x-label>
                            <x-input id="document" name="document" type="file" accept=".pdf" hidden required />
                        </div>
                        <div class="w-75">
                            {{-- <iframe src="http://repository.stei.ac.id/2422/3/JurnalSTEIIndonesia_21160000013_2020OK.pdf" class="w-100 min-vh-100" frameborder="0"></iframe> --}}
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
