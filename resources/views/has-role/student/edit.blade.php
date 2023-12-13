@extends('layouts.has-role.auth', ['title' => 'Tambah Siswa'])

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
                <h4 class="card-title">Edit Siswa</h4>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <a class="me-25 " href="#">
                        <img class="uploadedAvatar rounded me-50" id="account-upload-img" src="{{ Storage::url('images/static/profil-siswa.png') }}" alt="profil siswa" height="200" width="150" />
                    </a>
                    <!-- upload and reset button -->
                    <div class="d-flex align-items-center ms-1">
                        <div>
                            <label class="btn btn-primary mb-75 me-75" for="account-upload">Upload Foto</label>
                            <input id="account-upload" type="file" hidden accept="image/*" />
                            <x-button class="mb-75" id="account-reset" type="button" variant="outline" color="secondary">
                                Hapus Logo
                            </x-button>
                            <p class="mb-0">Upload Foto ukuran 3x4 dengan format JPG, GIF or PNG, Max size of 500K</p>
                        </div>
                    </div>
                    <!--/ upload and reset button -->
                </div>

                <x-separator marginY="3" />

                <div class="row">
                    <div class="col-sm-6 ">
                        <div class="mb-2">
                            <x-label>Nama Lengkap</x-label>
                            <x-input id="nama_lengkap" name="nama_lengkap" :value="$student->name" />
                        </div>
                        <div class="mb-2">
                            <x-label>NISN</x-label>
                            <x-input id="nisn" name="nisn" :value="$student->nisn" />
                        </div>
                        <div class="mb-2">
                            <x-label>NIK</x-label>
                            <x-input id="nik" name="nik" value="737201234567890" />
                        </div>
                        <div class="mb-2">
                            <x-label>Asal Sekolah</x-label>
                            <x-input id="asal_sekolah" name="asal_sekolah" :value="$student->asal_sekolah" />
                        </div>
                        <div class="mb-2">
                            <x-label>Jenis Kelamin</x-label>
                            <x-select class="select2 form-select">
                                <option value="lakilaki" selected>Lakilaki</option>
                                <option value="perempuan">Perempuan</option>
                            </x-select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Tempat Lahir</x-label>
                            <x-input id="tempat_lahir" name="tempat_lahir" value="Parepare" />
                        </div>
                        <div class="mb-2">
                            <x-label>Tanggal Lahir</x-label>
                            <div class="row">
                                <div class="col-4">
                                    <x-select class="select2 form-select w-100">
                                        <option selected disabled>Tanggal</option>
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}" {{ $i == 1 ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </x-select>
                                </div>
                                <div class="col-4">
                                    <x-select class="select2 form-select w-100">
                                        <option selected disabled>Bulan</option>
                                        @foreach ($months as $item)
                                            <option value="{{ $item->value }}" {{ $item->value == 'januari' ? 'selected' : '' }}>{{ $item->label }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                                <div class="col-4">
                                    <x-select class="select2 form-select w-100">
                                        <option selected disabled>Tahun</option>
                                        @foreach ($years as $item)
                                            <option value="{{ $item->value }}" {{ $item->value == '2004' ? 'selected' : '' }}>{{ $item->label }}</option>
                                        @endforeach
                                    </x-select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <x-label>Nomor HP</x-label>
                            <x-input id="nomor_hp" name="nomor_hp" value="+621234567890" />
                        </div>
                        <div class="mb-2">
                            <x-label>Email</x-label>
                            <x-input id="email" name="email" value="nadya.putri@gmail.com" />
                        </div>
                    </div>
                </div>

                <x-separator marginY="3" />

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Kabupaten / Kota</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Kabupaten / Kota</option>
                                <option value="parepare" selected>Parepare</option>
                                <option value="pangkep">Pangkep</option>
                                <option value="maros">Maros</option>
                                <option value="makassar">Makassar</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>kecamatan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Kecamatan</option>
                                <option value="parepare">Cappa Ujung</option>
                                <option value="pangkep" selected>Soreang</option>
                                <option value="maros">Bacukiki</option>
                                <option value="makassar">Ujung Bulu</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>Desa / Kelurahan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Desa / Kelurahan</option>
                                <option value="parepare" selected>Cappa Ujung</option>
                                <option value="pangkep">Soreang</option>
                                <option value="maros">Bacukiki</option>
                                <option value="makassar">Ujung Bulu</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>Dusun / Lingkungan</x-label>
                            <x-input id="lingkungan" name="lingkungan" value="-" />
                        </div>
                    </div>
                    <div class="col-sm-6 col-12 mb-1 mb-sm-2">
                        <div class="mb-2">
                            <x-label>RT / RW</x-label>
                            <x-input id="rtrw" name="rtrw" value="001/002" />
                        </div>
                        <div class="mb-2">
                            <x-label>Alamat Jalan</x-label>
                            <x-input id="alamat" name="alamat" value="BTN Indah Permai 2" />
                        </div>
                    </div>
                </div>

                <x-separator marginY="3" />

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Nama Ibu Kandung</x-label>
                            <x-input id="ibu_kandung" name="ibu_kandung" value="Sukriani" />
                        </div>
                        <div class="mb-2">
                            <x-label>Pekerjaan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Pekerjaan</option>
                                <option value="wiraswasta" selected>wiraswasta</option>
                                <option value="pangkep">Pangkep</option>
                                <option value="maros">Maros</option>
                                <option value="makassar">Makassar</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>Penghasilan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Penghasilan</option>
                                <option value="2">2 Juta</option>
                                <option value="4" selected>4 Juta</option>
                                <option value="6">6 Juta</option>
                                <option value="8">8 Juta</option>
                            </x-select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <x-label>Nama Ayah Kandung</x-label>
                            <x-input id="ayah_kandung" name="ayah_kandung" value="Al Muqtadir" />
                        </div>
                        <div class="mb-2">
                            <x-label>Pekerjaan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Pekerjaan</option>
                                <option value="wiraswasta" selected>wiraswasta</option>
                                <option value="pangkep">Pangkep</option>
                                <option value="maros">Maros</option>
                                <option value="makassar">Makassar</option>
                            </x-select>
                        </div>
                        <div class="mb-2">
                            <x-label>Penghasilan</x-label>
                            <x-select class="select2 form-select">
                                <option selected disabled>Pilih Penghasilan</option>
                                <option value="2">2 Juta</option>
                                <option value="4">4 Juta</option>
                                <option value="6" selected>6 Juta</option>
                                <option value="8">8 Juta</option>
                            </x-select>
                        </div>
                    </div>
                </div>

                <x-separator marginY="3" />

                <div class="d-flex align-items-center justify-content-start gap-2">
                    <x-button color="success">Simpan Perubahan</x-button>
                    <a class="btn btn-outline-secondary " href="{{ route('siswa.show', $student->username) }}">Batalkan</a>
                </div>
                </separator>
            </div>
        </div>
    @endsection
