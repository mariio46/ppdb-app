@extends('layouts.has-role.auth', ['title' => "Detail {$school->school_name}"])

@section('styles')
    <link type="text/css" href="/app-assets/css/pages/page-profile.css" rel="stylesheet">
@endsection

@push('scripts')
    <script src="/app-assets/js/scripts/pages/page-profile.js"></script>
@endpush

@section('content')
    <div class="content-body">
        <div id="user-profile">
            @include('has-role.school.partials.school-header')
        </div>
        <div class="d-flex" style="gap: 5px;">
            @include('has-role.school.partials.school-tab')
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <x-input class="w-25" id="search" name="search" placeholder="Cari Sekolah..." />
                    <x-link href="#" color="success">
                        <x-tabler-pencil style="width: 16px; height: 16px;" />
                        Edit Kuota Sekolah
                    </x-link>
                </div>
                <x-separator marginY="2" />
                <table class="table">
                    <thead>
                        <tr class="table-light">
                            <th scope="col">PROVINSI</th>
                            <th scope="col">KABUPATEN/KOTA</th>
                            <th scope="col">KECAMATAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zones as $zone)
                            <tr>
                                <td>{{ $zone->province }}</td>
                                <td>{{ $zone->city }}</td>
                                <td>{{ $zone->subdistrict }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
