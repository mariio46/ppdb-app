@extends('layouts.has-role.auth', ['title' => 'Tambah Sekolah'])

@section('content')
    <div class="content-body">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah Sekolah</div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <a class="me-25 " href="#">
                        <img class="uploadedAvatar rounded me-50" id="account-upload-img" src="{{ Storage::url('images/static/default-upload.png') }}" alt="profil sekolah" height="100" width="100" />
                    </a>
                    <!-- upload and reset button -->
                    <div class="d-flex align-items-end mt-75 ms-1">
                        <div>
                            <label class="btn btn-primary mb-75 me-75" for="account-upload">Upload Logo Baru</label>
                            <input id="account-upload" type="file" hidden accept="image/*" />
                            <x-button class="mb-75" id="account-reset" type="button" variant="outline" color="secondary">
                                Reset Logo
                            </x-button>
                            <p class="mb-0">Format JPG, GIF or PNG, Max size of 800K</p>
                        </div>
                    </div>
                    <!--/ upload and reset button -->
                </div>

                <x-separator marginY="2" />

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Nama Sekolah</x-label>
                            <x-input id="nama_sekolah" name="nama_sekolah" />
                        </div>
                        <div class="mb-2">
                            <x-label>Nomor Pokok Sekolah Nasional</x-label>
                            <x-input id="npsn" name="npsn" />
                        </div>
                        <div class="mb-2">
                            <x-label>Nama Kepala Sekolah</x-label>
                            <x-input id="kepala_sekolah" name="kepala_sekolah" />
                        </div>
                        <div class="mb-2">
                            <x-label>NIP Kepala Sekolah</x-label>
                            <x-input id="nip_kepala_sekolah" name="nip_kepala_sekolah" />
                        </div>
                        <div class="mb-2">
                            <x-label>Nama Ketua PPDB</x-label>
                            <x-input id="nama_ketua_ppdb" name="nama_ketua_ppdb" />
                        </div>
                        <div class="mb-2">
                            <x-label>NIP Ketua PPDB</x-label>
                            <x-input id="nip_ketua_ppdb" name="nip_ketua_ppdb" />
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Alamat Jalan</x-label>
                            <x-input id="alamat_sekolah" name="alamat_sekolah" />
                        </div>
                        <div class="mb-2">
                            <x-label>Kabupaten/Kota</x-label>
                            <x-input id="kota" name="kota" />
                        </div>
                        <div class="mb-2">
                            <x-label>Kecamatan</x-label>
                            <x-input id="kecamatan" name="kecamatan" />
                        </div>
                        <div class="mb-2">
                            <x-label>Desa/Kelurahan</x-label>
                            <x-input id="kelurahan" name="kelurahan" />
                        </div>
                        <div class="mb-2">
                            <x-label>RT/RW</x-label>
                            <x-input id="rt_rw" name="rt_rw" />
                        </div>
                        <div class="mb-2">
                            <x-label>Koordinat Sekolah</x-label>
                            <x-input id="koordinat_sekolah" name="koordinat_sekolah" />
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-start gap-2">
                    <x-button color="success">Simpan Perubahan</x-button>
                    <a class="btn btn-outline-secondary " href="{{ route('sekolah-asal.index') }}">Batalkan</a>
                </div>
            </div>
        </div>
    </div>
@endsection
