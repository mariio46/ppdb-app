@props(['modalLevel', 'modalTrack', 'multiSchool' => 'true', 'withSchoolVerif' => 'true'])
{{-- Modal --}}
<div class="modal fade modal-primary text-start" id="verifySchoolModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog {{ $modalLevel === 'SMK' ? 'modal-lg' : '' }}">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilihan Sekolah</h5>
                <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Data Diri</h5>
                <table class="table table-borderless">
                    <tr>
                        <td class="col-auto px-0" style="width: 40%;">Nama Lengkap</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0 fw-bold" style="width: 55%;">{{ session()->get('stu_name') }}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">NISN</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0 fw-bold">{{ session()->get('stu_nisn') }}</td>
                    </tr>
                    <tr>
                        <td class="col-auto px-0">Asal Sekolah</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0 fw-bold">{{ session()->get('stu_school') }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-body border-top">
                <h5>Pendaftaran</h5>
                <table class="table table-borderless">
                    {{-- <tr>
            <td class="col-auto px-0" style="width: 40%;">Jenjang Pendidikan</td>
            <td class="col-auto">:</td>
            <td class="col-auto px-0 fw-bold" style="width: 55%;">{{ $modalLevel }}</td>
          </tr> --}}
                    <tr>
                        <td class="col-auto px-0" style="width: 40%;">Jalur</td>
                        <td class="col-auto">:</td>
                        <td class="col-auto px-0 fw-bold" style="width: 55%;">{{ $modalLevel }} - {{ $modalTrack }}</td>
                    </tr>

                    {{ $slot }}

                </table>
            </div>
            <div class="modal-body border-top">
                <h5>Sekolah Pilihan</h5>
                <table class="table table-borderless">
                    @if ($modalLevel === 'SMA')
                        <tr>
                            <td class="col-auto px-0" style="width: 40%;">Pilihan 1</td>
                            <td class="col-auto">:</td>
                            <td class="col-auto px-0 fw-bold" style="width: 55%;"><span id="school1Show"></span></td>
                        </tr>
                        @if ($multiSchool === 'true')
                            <tr>
                                <td class="col-auto px-0">Pilihan 2</td>
                                <td class="col-auto">:</td>
                                <td class="col-auto px-0 fw-bold"><span id="school2Show">-</span></td>
                            </tr>
                            <tr>
                                <td class="col-auto px-0">Pilihan 3</td>
                                <td class="col-auto">:</td>
                                <td class="col-auto px-0 fw-bold"><span id="school3Show">-</span></td>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <td class="col-auto px-0" style="width: 40%;">Pilihan 1</td>
                            <td class="col-auto">:</td>
                            <td class="col-auto px-0 fw-bold" style="width: 55%;"><span id="school1Show"></span> - <span id="department1Show"></span></td>
                        </tr>
                        @if ($multiSchool === 'true')
                            <tr>
                                <td class="col-auto px-0">Pilihan 2</td>
                                <td class="col-auto">:</td>
                                <td class="col-auto px-0 fw-bold"><span id="school2Show"></span> - <span id="department2Show"></span></td>
                            </tr>
                            <tr>
                                <td class="col-auto px-0">Pilihan 3</td>
                                <td class="col-auto">:</td>
                                <td class="col-auto px-0 fw-bold"><span id="school3Show"></span> - <span id="department3Show"></span></td>
                            </tr>
                        @endif
                    @endif
                </table>
            </div>
            @if ($withSchoolVerif === 'true')
                <div class="modal-body border-top">
                    <h5>Sekolah Tempat Verifikasi</h5>

                    <div class="alert alert-warning p-1">
                        <small class="mb-0">Sekolah Tempat Verifikasi merupakan tempat kamu melakukan verifikasi berkas, dan <strong>BUKAN</strong> sekolah tempat kamu lulus.</small>
                        <small class="mb-0">Pastikan kamu dapat mendatangi sekolah tempat verifikasi ini.</small>
                    </div>

                    <div class="mb-1">
                        <x-label for="schoolForVerif">Sekolah tempat verifikasi</x-label>
                        <select class="form-select select-in-modal" id="schoolForVerif" name="schoolForVerif" data-placeholder="Sekolah tempat verifikasi">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
            @endif
            <div class="modal-footer">
                <x-button class="float-end mb-1" id="btnSendRegistration" type="button" color="success" withIcon="true"><x-tabler-check /> Kirim Pendaftaran</x-button>
            </div>
        </div>
    </div>
</div>
