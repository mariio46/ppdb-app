@extends('layouts.has-role.auth', ['title' => 'Detail Sekolah Asal'])

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Sekolah Asal</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('sekolah-asal.index') }}">Sekolah Asal</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Detail Sekolah
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

    <div class="content-body">
        <div class="card">
            <div class="card-header align-items-center px-3">
                <h4 class="card-title">Informasi detail sekolah</h4>

                <x-link href="{{ route('sekolah-asal.edit', $id) }}" color="success" withIcon="true">
                    <x-tabler-pencil />
                    Edit Sekolah
                </x-link>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <table class="table table-borderless">
                            <x-three-row-info identifier="npsn" label="NPSN" />
                            <x-three-row-info identifier="nama" label="Nama Sekolah" />
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var id = '{{ $id }}'
    </script>
    <script>
        $(function() {
            'use strict';
            getData();

            function getData() {
                $.ajax({
                    url: `/panel/sekolah-asal/json/get-single-data/${id}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        $('#npsn').text(data.npsn);
                        $('#nama').text(data.name);
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }
        });
    </script>
@endpush
