@extends('layouts.has-role.auth', ['title' => 'Detail Sekolah Asal'])

@section('content')
    <x-breadcrumb title="Sekolah Asal">
        <x-breadcrumb-item to="{{ route('sekolah-asal.index') }}" title="Sekolah Asal" />
        <x-breadcrumb-active title="Detail Sekolah Asal" />
    </x-breadcrumb>
    
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
                        $('#npsn').text(data.data.npsn);
                        $('#nama').text(data.data.nama);
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }
        });
    </script>
@endpush
