@extends('layouts.has-role.auth', ['title' => 'Detail Verifikasi Manual'])

@section('styles')
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@section('content')
    <x-breadcrumb title="Verifikasi">
        <x-breadcrumb-item to="{{ route('verifikasi.manual') }}" title="Verifikasi" />
        <x-breadcrumb-active title="Lihat Detail Siswa" />
    </x-breadcrumb>

    <x-loader key="loader" />

    <div class="content-body row" id="content" style="display: none;">
        <div class="col-12">

            {{-- personal data --}}
            <div class="card" id="card_info">
                <div class="card-body">
                    <h4 class="text-primary mb-2 ms-2">Data Diri</h4>

                    <div class="d-flex justify-content-center">
                        <img src="/img/base-profile.png" class="rounded" alt="foto siswa" id="photo" style="height: 200px; width: 175px; object-fit: cover;">
                    </div>

                    <div class="row px-2">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="name" label="Nama Lengkap" />

                                <x-three-row-info identifier="nisn" label="NISN" />

                                <x-three-row-info identifier="nik" label="NIK" />

                                <x-three-row-info identifier="originSchool" label="Asal Sekolah" />

                                <x-three-row-info identifier="gender" label="Jenis Kelamin" />
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="birthplace" label="Tempat Lahir" />

                                <x-three-row-info identifier="birthday" label="Tanggal Lahir" />

                                <x-three-row-info identifier="phone" label="Nomor HP" />

                                <x-three-row-info identifier="email" label="Email" />
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top">
                    <h4 class="text-primary mb-2 ms-2">Data Alamat</h4>

                    <div class="row px-2">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="province" label="Provinsi" />
                                <x-three-row-info identifier="city" label="Kabupaten / Kota" />
                                <x-three-row-info identifier="district" label="Kecamatan" />
                                <x-three-row-info identifier="village" label="Desa / Kelurahan" />
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="hamlet" label="Dusun / Lingkungan" />
                                <x-three-row-info identifier="rtrw" label="RT / RW" />
                                <x-three-row-info identifier="address" label="Alamat Jalan" />
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-body border-top">
                    <h4 class="text-primary mb-2 ms-2">Data Orang Tua / Wali</h4>

                    <div class="row px-2">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="motherName" label="Nama Ibu Kandung" />
                                <x-three-row-info identifier="motherPhone" label="Nomor HP" />
                                <x-three-row-info identifier="fatherName" label="Nama Ayah" />
                                <x-three-row-info identifier="fatherPhone" label="Nomor HP" />
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="guardName" label="Nama Wali" />
                                <x-three-row-info identifier="guardPhone" label="Nomor HP" />
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- scores --}}
            <div class="card" id="card_score">
                <div class="card-body px-0">
                    <div class="d-flex align-items-center mb-2 px-2">
                        <h4 class="text-primary mb-0 ms-2">Data Nilai Rapor</h4>
                        <a class="btn btn-primary ms-auto" id="score_edit_btn" href="{{ route('verifikasi.manual.score', ['id' => $id, 'semester' => '1']) }}">
                            <x-tabler-pencil-minus style="width: 14px; height: 14px;" />
                            Edit Nilai
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped border-bottom">
                            <thead>
                                <tr>
                                    <th class="py-2">Mata Pelajaran</th>
                                    <th class="text-center align-middle">Semester 1</th>
                                    <th class="text-center align-middle">Semester 2</th>
                                    <th class="text-center align-middle">Semester 3</th>
                                    <th class="text-center align-middle">Semester 4</th>
                                    <th class="text-center align-middle">Semester 5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2">Matematika</td>
                                    <td class="text-center text-success" id="sm1_mtk">0</td>
                                    <td class="text-center text-success" id="sm2_mtk">0</td>
                                    <td class="text-center text-success" id="sm3_mtk">0</td>
                                    <td class="text-center text-success" id="sm4_mtk">0</td>
                                    <td class="text-center text-success" id="sm5_mtk">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Bahasa Indonesia</td>
                                    <td class="text-center text-success" id="sm1_bid">0</td>
                                    <td class="text-center text-success" id="sm2_bid">0</td>
                                    <td class="text-center text-success" id="sm3_bid">0</td>
                                    <td class="text-center text-success" id="sm4_bid">0</td>
                                    <td class="text-center text-success" id="sm5_bid">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Bahasa Inggris</td>
                                    <td class="text-center text-success" id="sm1_big">0</td>
                                    <td class="text-center text-success" id="sm2_big">0</td>
                                    <td class="text-center text-success" id="sm3_big">0</td>
                                    <td class="text-center text-success" id="sm4_big">0</td>
                                    <td class="text-center text-success" id="sm5_big">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">IPA</td>
                                    <td class="text-center text-success" id="sm1_ipa">0</td>
                                    <td class="text-center text-success" id="sm2_ipa">0</td>
                                    <td class="text-center text-success" id="sm3_ipa">0</td>
                                    <td class="text-center text-success" id="sm4_ipa">0</td>
                                    <td class="text-center text-success" id="sm5_ipa">0</td>
                                </tr>
                                <tr>
                                    <td class="py-2">IPS</td>
                                    <td class="text-center text-success" id="sm1_ips">0</td>
                                    <td class="text-center text-success" id="sm2_ips">0</td>
                                    <td class="text-center text-success" id="sm3_ips">0</td>
                                    <td class="text-center text-success" id="sm4_ips">0</td>
                                    <td class="text-center text-success" id="sm5_ips">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- registration info --}}
            <div class="card" id="card_registration">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <h4 class="text-primary ms-2 mb-0">Pendaftaran</h4>

                        <div class="ms-auto d-none" id="achievement_btn_div">
                            <x-link href="{{ route('verifikasi.manual.achievement', [$id]) }}" color="primary" id="achievement_edit_btn">Edit Data Prestasi</x-link>
                        </div>
                    </div>

                    <div class="row px-2">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="track" label="Jalur Pendaftaran" />
                            </table>
                        </div>
                    </div>

                    <div class="row px-2" id="affirmation_data_div">
                        {{-- for affirmation --}}
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="affType" label="Jenis Afirmasi" />
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="affNum" label="Nomor PKH" />
                            </table>
                        </div>
                    </div>

                    {{-- non academic --}}
                    <div class="row px-2" id="achievement_data_div">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="achType" label="Jenis Prestasi" />
                                <x-three-row-info identifier="achLevel" label="Tingkatan Prestasi" />
                                <x-three-row-info identifier="achChamp" label="Juara" />
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="achName" label="Nama Prestasi" />
                                <x-three-row-info identifier="achWeight" label="Bobot" />
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top">
                    <h4 class="text-primary ms-2 mb-2">Sekolah Pilihan</h4>

                    <div class="row px-2">
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="school1" label="Sekolah Pilihan 1" />
                                <x-three-row-info identifier="dep1" label="Jurusan" color="warning" />
                                <x-three-row-info identifier="school2" label="Sekolah Pilihan 2" />
                                <x-three-row-info identifier="dep2" label="Jurusan" color="warning" />
                            </table>
                        </div>
                        <div class="col-lg-6 col-12">
                            <table class="table table-borderless">
                                <x-three-row-info identifier="school3" label="Sekolah Pilihan 3" />
                                <x-three-row-info identifier="dep3" label="Jurusan" color="warning" />
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- house point --}}
            <div id="card_map">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h4 class="text-primary mb-2 ms-2">Titik Rumah Calon Peserta Didik</h4>
    
                            <a class="ms-auto btn btn-primary ms-2" id="map_edit_btn" href="#">
                                <x-tabler-map-pin-filled style="width: 16px; height: 16px;" />
                                Masukkan Titik Rumah
                            </a>
                        </div>
    
                        <div class="row mb-2 px-2">
                            <div class="col-lg-6 col-12">
                                <table class="table table-borderless">
                                    <x-three-row-info identifier="coordinate" label="Koordinat Rumah" />
                                    <x-three-row-info identifier="distance1" label="Jarak Rumah ke Pilihan 1" />
                                </table>
                            </div>
                            <div class="col-lg-6 col-12">
                                <table class="table table-borderless">
                                    <x-three-row-info identifier="distance2" label="Jarak Rumah ke Pilihan 2" />
                                    <x-three-row-info identifier="distance3" label="Jarak Rumah ke Pilihan 3" />
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- color blind and height --}}
            <div id="card_additional">
                <div class="card">
                    <div class="card-body">
                        <h4 class="ms-2 mb-2 text-primary">Buta Warna dan Tinggi Badan</h4>
    
                        <div class="row px-2">
                            <div class="col-lg-6 col-12" id="blind_section">
                                {{-- color blind --}}
                                <x-button variant="outline" color="primary" data-bs-toggle="modal" data-bs-target="#color_blind_modal" id="color_blind_btn">Tandai Sebagai Buta Warna</x-button>
                                <p><small>Tekan tombol di atas hanya jika siswa adalah penderita buta warna.</small></p>
    
                                <div class="modal fade text-start" id="color_blind_modal" tabindex="-1" aria-labelledby="cb_modal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-white">
                                                <h4 class="modal-title" id="cb_modal">Calon Siswa ini Buta Warna?</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-warning p-1">
                                                    <p class="text-center text-danger"><x-tabler-alert-triangle width="64" height="64" /></p>
                                                    <p class="mb-2">Tekan tombol di bawah hanya jika siswa yang bersangkutan <strong class="text-danger">telah dikonfirmasi</strong> sebagai individu yang <strong class="text-danger">menderita buta warna</strong>.</p>
                                                    <div class="alert alert-danger p-1">
                                                        <p><small>Dengan menekan tombol di bawah, sebagian / seluruh pilihan jurusan calon siswa akan terpengaruh, dan jurusan yang terkena dampak akan dianggap tidak dipilih oleh siswa.</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('verifikasi.manual.color-blind', [$id]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" id="color_blind1" name="color_blind1" value="">
                                                    <input type="hidden" id="color_blind2" name="color_blind2" value="">
                                                    <input type="hidden" id="color_blind3" name="color_blind3" value="">
                                                    <button type="submit" class="btn btn-danger">Konfirmasi Buta Warna</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12" id="height_section">
                                {{-- body height --}}
                                <x-button variant="outline" color="primary" data-bs-toggle="modal" data-bs-target="#height_modal" id="height_btn">Identifikasi Tinggi Kurang</x-button>
                                <p><small>Tekan tombol di atas hanya jika siswa tidak memenuhi standar tinggi badan (laki-laki kurang dari 165 cm, perempuan kurang dari 155 cm).</small></p>
    
                                <div class="modal fade text-start" id="height_modal" tabindex="-1" aria-labelledby="tb_modal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-white">
                                                <h4 class="modal-title" id="tb_modal">Tinggi Badan di bawah standar?</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-warning p-1">
                                                    <p class="text-center text-danger"><x-tabler-alert-triangle width="64" height="64" /></p>
                                                    <p class="mb-2">Tekan tombol di bawah hanya jika calon siswa tidak memenuhi standar tinggi badan (tinggi badan siswa kurang dari standar).</p>
                                                    <ul>
                                                        <li>Laki-laki minimal 165 cm.</li>
                                                        <li>Perempuan minimal 155 cm.</li>
                                                    </ul>
                                                    <div class="alert alert-danger p-1">
                                                        <p><small>Dengan menekan tombol di bawah, sebagian / seluruh pilihan jurusan calon siswa akan terpengaruh, dan jurusan yang terkena dampak akan dianggap tidak dipilih oleh siswa.</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('verifikasi.manual.short', [$id]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" id="height1" name="height1" value="">
                                                    <input type="hidden" id="height2" name="height2" value="">
                                                    <input type="hidden" id="height3" name="height3" value="">
                                                    <button type="submit" class="btn btn-danger" >Konfirmasi Tinggi Badan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>

            {{-- verification's check --}}
            <div id="card_verification">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-2 ms-2">Verifikasi Pendaftaran</h4>
    
                        <div class="px-2" id="verification">
                            <div class="alert alert-primary p-1">
                                <p class="mb-0">Periksa kembali data calon peserta didik, Pastikan semuanya benar. Data yang sudah diverifikasi tidak dapat diubah lagi.</p>
                            </div>

                            <div id="verification_info"></div>
    
                            <div class="d-flex">
                                <x-button class="me-1" data-bs-toggle="modal" data-bs-target="#verifModal" color="success" id="verif_modal_btn">Verifikasi Data Siswa</x-button>
                                {{-- modal --}}
                                <div class="modal fade text-start" id="verifModal" role="dialog" aria-modal="true" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-white">
                                                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4 class="text-center">Verifikasi Data Siswa</h4>
    
                                                <p class="px-5 py-2">Apakah Anda yakin ingin memverifikasi data siswa ini? Data yang sudah diverifkasi tidak dapat diubah kembali.</p>
    
                                                <div class="d-flex justify-content-center mb-3">
                                                    <form id="acceptForm" action="{{ route('verifikasi.manual.accept', [$id]) }}" method="post">
                                                        @csrf
                                                        <x-input id="avg_total" name="avg_total" type="hidden" />
                                                        <x-input id="avg_mtk" name="avg_mtk" type="hidden" />
                                                        <x-input id="avg_bid" name="avg_bid" type="hidden" />
                                                        <x-input id="avg_big" name="avg_big" type="hidden" />
                                                        <x-input id="avg_ipa" name="avg_ipa" type="hidden" />
                                                        <x-input id="avg_ips" name="avg_ips" type="hidden" />
    
                                                        <x-button class="me-1" type="submit" color="success">Ya, Verifikasi</x-button>
                                                    </form>
    
                                                    <x-button data-bs-dismiss="modal" type="button" variant="flat" color="secondary">Batalkan</x-button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <x-button data-bs-toggle="modal" data-bs-target="#declineModal" color="danger" id="decline_modal_btn">Tolak Data</x-button>
                                {{-- modal --}}
                                <div class="modal fade text-start" id="declineModal" role="dialog" aria-modal="true" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-white">
                                                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-5">
                                                <h4 class="text-center">Tolak Verifikasi Data Siswa</h4>
    
                                                <p class="py-2">Apakah Anda yakin ingin menolak verifikasi data ini? Data yang sudah di tolak tidak bisa di kembalikan kembali.</p>
    
                                                <form id="declineForm" action="{{ route('verifikasi.manual.decline', [$id]) }}" method="post">
                                                    @csrf
                                                    <div class="mb-2">
                                                        <x-label for="declineMsg">Alasan Tolak Verifikasi</x-label>
                                                        <x-input id="declineMsg" name="declineMsg" placeholder="Masukkan alasan tolak.." />
                                                    </div>
    
                                                    <div class="d-flex justify-content-center mb-2">
                                                        <x-button class="me-1" type="submit" color="danger">Tolak</x-button>
                                                        <x-button data-bs-dismiss="modal" type="button" color="secondary" variant="flat">Batalkan</x-button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- verified --}}
            <div id="card_verified">
                <div class="card">
                    <div class="card-body">
                        <div class="px-2" id="verified">
                            <div class="row mb-2">
                                <div class="col-lg-6 col-12">
                                    <table class="table table-borderless">
                                        <x-three-row-info identifier="verificator" label="Nama Verifikator" />
                                    </table>
                                </div>
                            </div>
    
                            <div class="alert alert-success p-1">
                                <p class="mb-0">Data calon peserta didik ini sudah diverifikasi.</p>
                            </div>
    
                            <a class="btn btn-success" href="">
                                <x-tabler-printer />
                                Download Bukti Pendaftaran
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- declined --}}
            <div id="card_declined">
                <div class="card">
                    <div class="card-body">
                        <div class="px-2" id="declined">
                            <div class="row mb-2">
                                <div class="col-lg-6 col-12">
                                    <table class="table table-borderless">
                                        <x-three-row-info identifier="dverificator" label="Nama Verifikator" />
    
                                        <x-three-row-info identifier="reason" label="Alasan Data Ditolak" />
                                    </table>
                                </div>
                            </div>
    
                            <div class="alert alert-danger p-1">
                                <p class="mb-0">Data calon peserta didik ini ditolak.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var id = '{{ $id }}',
            tracks = {!! json_encode($tracks) !!};
    </script>
    <script>
        $(function() {
            'use strict';

            var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            var declineForm = $('#declineForm'),
                reasonInput = $('#declineMsg');

            if (declineForm.length) {
                declineForm.validate({
                    rules: {
                        declineMsg: {
                            required: true
                        }
                    },
                    messages: {
                        declineMsg: {
                            required: "*Alasan Harus diisi."
                        }
                    }
                });
            }

            $.ajax({
                url: `/panel/verifikasi-manual/d/${id}/get-data-detail`,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    let d = data.data;
                    let bd = new Date(d.tanggal_lahir);
                    
                    getTime();

                    $('#photo').attr("src", d.pasfoto);
                    $('#name').text(d.nama);
                    $('#nisn').text(d.nisn);
                    $('#nik').text(d.nik);
                    $('#originSchool').text(d.sekolah_asal);
                    $('#gender').text(d.jenis_kelamin == 'p' ? 'Perempuan' : 'Laki-laki');
                    $('#birthplace').text(d.tempat_lahir);
                    $('#birthday').text(`${bd.getDate()} ${months[bd.getMonth()]} ${bd.getFullYear()}`);
                    $('#phone').text(d.telepon);
                    $('#email').text(d.email);
                    $('#province').text(d.provinsi);
                    $('#city').text(d.kabupaten);
                    $('#district').text(d.kecamatan);
                    $('#village').text(d.desa);
                    $('#hamlet').text(d.dusun);
                    $('#rtrw').text(d.rtrw);
                    $('#address').text(d.alamat_jalan);
                    $('#motherName').text(d.nama_ibu);
                    $('#motherPhone').text(d.telepon_ibu);
                    $('#fatherName').text(d.nama_ayah);
                    $('#fatherPhone').text(d.telepon_ayah);
                    $('#guardName').text(d.nama_wali || '-');
                    $('#guardPhone').text(d.telepon_wali || '-');

                    getScore(d.siswa_id);

                    showStatus({status: d.status, verifikator: d.operator_nama, alasan_tolak: d.alasan_tolak});

                    showRegistration(d);
                    
                    showMap({track_code: d.kode_jalur, lat: d.lintang, long: d.bujur, distance1: d.jarak1, distance2: d.jarak2, distance3: d.jarak3, student_id: d.siswa_id});

                    showColorBlindOrHeightCard({bw1: d.jurusan1_bw, bw2: d.jurusan2_bw, bw3: d.jurusan3_bw, tb1: d.jurusan1_tb, tb2: d.jurusan2_tb, tb3: d.jurusan3_tb, ok1: d.jurusan1_ok, ok2: d.jurusan2_ok, ok3: d.jurusan3_ok, status: d.status})
                },
                error: function(xhr, status, error) {
                    console.error('Failed to get data.', status, error);
                }
            });

            function getTime() {
                $.ajax({
                    url: '/panel/json/verifikasi-manual/get-time',
                    method: 'get',
                    dataType: 'json',
                    success: function(time) {
                        if (time.statusCode == 200) {
                            let stats = cekWaktuDiAntaraJamMulaiDanSelesai(time.data.jam_mulai, time.data.jam_selesai);
                            if (stats !== 'now') {
                                $('#score_edit_btn, #achievement_edit_btn, #map_edit_btn, #color_blind_btn, #height_btn').attr('href', '#').addClass('disabled');
                                $('#verif_modal_btn, #decline_modal_btn').addClass('disabled').attr({'disabled': true, 'data-bs-target': '#'});
                                $('#verification_info').addClass('alert alert-warning p-1').text(`Verifikasi hari ini ${stats === 'pre' ? 'belum dibuka.' : 'sudah ditutup.'}`);
                            }
                        } else {
                            $('#score_edit_btn, #achievement_edit_btn, #map_edit_btn, #color_blind_btn, #height_btn').attr('href', '#').addClass('disabled');
                            $('#verif_modal_btn, #decline_modal_btn').addClass('disabled').attr({'disabled': true, 'data-bs-target': '#'});
                        }

                        $('#loader').hide();
                        $('#content').show();
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            function getScore(student_id) {
                $.ajax({
                    url: `/panel/siswa/json/get-scores/${student_id}`,
                    method: 'get',
                    dataType: 'json',
                    success: function(data) {
                        let score = data.data;
                        let total = 0,
                            sum_bid = 0,
                            sum_big = 0,
                            sum_ipa = 0,
                            sum_ips = 0,
                            sum_mtk = 0;

                        for (let i = 1; i <= 5; i++) {
                            $(`#sm${i}_bid`).text(score[`sm${i}_bid`]);
                            $(`#sm${i}_big`).text(score[`sm${i}_big`]);
                            $(`#sm${i}_mtk`).text(score[`sm${i}_mtk`]);
                            $(`#sm${i}_ipa`).text(score[`sm${i}_ipa`]);
                            $(`#sm${i}_ips`).text(score[`sm${i}_ips`]);

                            sum_bid += parseInt(score[`sm${i}_bid`]);
                            sum_big += parseInt(score[`sm${i}_big`]);
                            sum_mtk += parseInt(score[`sm${i}_mtk`]);
                            sum_ipa += parseInt(score[`sm${i}_ipa`]);
                            sum_ips += parseInt(score[`sm${i}_ips`]);
                            total += parseInt(score[`sm${i}_bid`]) + parseInt(score[`sm${i}_big`]) + parseInt(score[`sm${i}_mtk`]) + parseInt(score[`sm${i}_ipa`]) + parseInt(score[`sm${i}_ips`]);
                        }

                        $('#avg_bid').val(sum_bid / 5);
                        $('#avg_big').val(sum_big / 5);
                        $('#avg_mtk').val(sum_mtk / 5);
                        $('#avg_ipa').val(sum_ipa / 5);
                        $('#avg_ips').val(sum_ips / 5);
                        $('#avg_total').val(total / 25);
                    },
                    error: function(xhr, status, error) {
                        console.error('gagal mendapatkan data.', status, error);
                    }
                });
            }

            function showStatus(data) {
                const {status, verifikator, alasan_tolak} = data;

                if (status == 'mendaftar') {
                    $('#card_verified, #card_declined').html('');
                } else if (status == 'dikembalikan') {
                    $('#card_verification, #card_verified').html('');
                    $('#dverificator').text(verifikator);
                    $('#reason').text(alasan_tolak);
                } else {
                    $('#card_verification, #card_declined').html('');
                    $('#verificator').text(verifikator);
                }
            }

            function showRegistration(data) {
                $('#track').text(tracks[data.kode_jalur]);

                // cek jika jalur afirmasi maka tampilkan afirmasi
                const affirmation_code = ['AA', "KA"];
                const achievement_code = ['AE', "KE"];

                if (affirmation_code.indexOf(data.kode_jalur) !== -1) {
                    $('#achievement_btn_div, #achievement_data_div').html('');
                    $('#affType').text(data.jenis_afirmasi);
                    if (data.jenis_afirmasi === 'pkh') {
                        $("#affNum").text(data.no_pkh);
                    } else {
                        $("#traffNum").html('');
                    }
                } else if (achievement_code.indexOf(data.kode_jalur) !== -1) {
                    $('#affirmation_data_div').html('');

                    $('#achievement_btn_div').removeClass('d-none');
                    $('#achType').text(capitalizeEachWord(data.prestasi_jenis));
                    $('#achLevel').text(capitalizeEachWord(data.prestasi_tingkat));
                    $('#achChamp').text(data.prestasi_juara);
                    $('#achName').text(data.prestasi_nama);
                    $('#achWeight').text(`${data.bobot} poin`);
                } else {
                    $('#achievement_btn_div, #achievement_data_div, #affirmation_data_div').html('');
                }

                const onlyOne = ['AC', 'AG'];
                $('#school1').text(data.sekolah1);

                if (onlyOne.indexOf(data.kode_jalur) !== -1) {
                    $('#trschool2, #trschool3').html('');
                } else {
                    $('#school2').text(data.sekolah2);
                    $('#school3').text(data.sekolah3);
                }

                if (data.kode_jalur.charAt(0) == 'A') {
                    $('#trdep1, #trdep2, #trdep3').html('');
                } else {
                    for (let b = 1; b <= 3; b++) {
                        let bwtb = `${data[`jurusan${b}`]}`;
                        if (data.status == 'mendaftar') {
                            if (data[`jurusan${b}_ok`] != null) {
                                bwtb = `<del>${data[`jurusan${b}`]}</del><br><small class="text-muted">(tidak dapat dilanjutkan karena ${data[`jurusan${b}_ok`].replace(/_/g, ' ')})</small>`;
                            } else {
                                if (data[`jurusan${b}_bw`] === 'y') {
                                    $(`#color_blind${b}`).val('buta_warna');
                                    bwtb = `${data[`jurusan${b}`]}<br><small class="text-muted">(butuh verifikasi buta warna)</small>`;
                                }
                                
                                if (data[`jurusan${b}_tb`] === 'y') {
                                    $(`#height${b}`).val('tinggi_badan');
                                    bwtb = `${data[`jurusan${b}`]}<br><small class="text-muted">(butuh verifikasi tinggi badan)</small>`;
                                }
                            }
                        }
                        $(`#dep${b}`).html(bwtb || '-');
                    }
                }

            }

            function showMap(data) {
                const useMaps = [
                    'AA', // SMA AFIRMASI
                    'AB', // SMA PERPINDAHAN TUGAS ORANG TUA
                    'AF', // SMA ZONASI
                    'KF'  // SMK DOMISILI TERDEKAT
                ];

                const {track_code, lat, long, distance1, distance2, distance3, student_id} = data;

                if (useMaps.indexOf(track_code) !== -1) {
                    $('#map_edit_btn').attr('href', `/panel/verifikasi-manual/d/${id}/edit-titik-rumah/${student_id}`)

                    let coor = (lat.length && long.length) ? `${lat}, ${long}` : "-";
                    
                    $('#coordinate').text(coor);
                    $('#distance1').text(distance1 ? `${toM(distance1)} m` : '-');
                    $('#distance2').text(distance2 ? `${toM(distance2)} m` : '-');
                    $('#distance3').text(distance3 ? `${toM(distance3)} m` : '-');
                } else {
                    $('#card_map').html('');
                }
            }

            function showColorBlindOrHeightCard(data) {
                const {bw1, bw2, bw3, tb1, tb2, tb3, ok1, ok2, ok3, status} = data;
                const jurusan_bw = [bw1, bw2, bw3].some(bw => bw === 'y');
                const jurusan_tb = [tb1, tb2, tb3].some(tb => tb === 'y');
                const jurusan_ok = [ok1, ok2, ok3];

                if ((jurusan_bw || jurusan_tb) && status == 'mendaftar') {
                    if (!jurusan_bw) { // tampilkan tombol verifikasi buta warna
                        $('#blind_section').html('').removeClass('col-lg-6 col-12');
                    }
                    
                    if (!jurusan_tb) { // tampilkan tombol verifikasi tinggi badan
                        $('#height_section').html('').removeClass('col-lg-6 col-12');
                    }

                    if (jurusan_ok.some(ok => ok === 'buta_warna')) {
                        $('#color_blind_btn').attr('disabled', 'disabled').text('Calon siswa Buta Warna');
                    }

                    if (jurusan_ok.some(ok => ok === 'tinggi_badan')) {
                        $('#height_btn').attr('disabled', 'disabled').text('Tinggi Badan Calon Siswa Kurang');
                    }
                } else {
                    $('#card_additional').html('');
                }
            }

            function cekWaktuDiAntaraJamMulaiDanSelesai(jamMulai, jamSelesai) {
                const sekarang = new Date();
                const jamSekarang = sekarang.getHours();
                const menitSekarang = sekarang.getMinutes();
                const waktuSekarang = jamSekarang * 60 + menitSekarang;

                const jamMulaiArray = jamMulai.split(':').map(Number);
                const jamSelesaiArray = jamSelesai.split(':').map(Number);

                const waktuMulai = jamMulaiArray[0] * 60 + jamMulaiArray[1];
                const waktuSelesai = jamSelesaiArray[0] * 60 + jamSelesaiArray[1];

                if (waktuSekarang < waktuMulai) {
                    return "pre";
                } else if (waktuSekarang >= waktuMulai && waktuSekarang <= waktuSelesai) {
                    return "now";
                } else {
                    return "post";
                }
            }

            function capitalizeEachWord(inputString) {
                if (inputString) {
                    let words = inputString.split("_");
                    let capWord = words.map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(" ");
                    return capWord;
                } else {
                    return '-';
                }
            }

            function toM(distanceInMeters) {
                var formattedDistance = distanceInMeters.toLocaleString('id-ID', {
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                });
                return formattedDistance;
            }
        });
    </script>
@endpush