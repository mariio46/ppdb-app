@extends('layouts.base-landing')

@section('x-styles')
    <style>
    #content {
        margin-top: 3rem;
        background: #F6F5F8;
        padding: 5rem;
    }      
    </style>
@endsection

@section('x-content')
    <div id="content">
        <div class="card border-0 rounded-xl">
            <div class="card-body p-5">
                <h2 class="fw-bold">Pengumuman</h2>
                <p class="text-muted">Lengkapi data dibawah untuk melihat daftar nama yang lulus.</p>

                <div class="row align-items-end">
                    <div class="col-3">
                        <div class="">
                            <label for="" class="form-label">Kabupaten/Kota</label>
                            <select class="form-control" name="" id="">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="">
                            <label for="" class="form-label">Sekolah</label>
                            <select class="form-control" name="" id="">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="">
                            <label for="" class="form-label">Jalur Pendaftaran</label>
                            <select class="form-control" name="" id="">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <x-button color="success">Cari</x-button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card rounded-xl">
            <div class="card-body p-5">
                <h2>Jalur</h2>
            </div>
        </div>
    </div>
@endsection