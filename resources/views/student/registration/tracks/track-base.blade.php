<form id="formSchoolRegister" action="/registration/{{ $code }}/register" method="post" enctype="multipart/form-data">
  @csrf
  <div class="card">
    <div class="card-header border-bottom">
      <h4 class="card-title">Pendaftaran <span id="schoolType">{{ $typeSchool }}</span> Jalur <span id="trackType">{{ $track }}</span></h4>
    </div>
    <div class="card-body mt-1">
      <h5>Data Diri</h5>

      <div class="row">
        <div class="col-md-6 col-12">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td class="col-auto px-0" style="width: 40%;">Nama Lengkap</td>
                <td class="col-auto px-0">:</td>
                <td class="col-auto">{{ session()->get('stu_name') }}</td>
              </tr>
              <tr>
                <td class="col-auto px-0" style="width: 40%;">NISN</td>
                <td class="col-auto px-0">:</td>
                <td class="col-auto">{{ session()->get('stu_nisn') }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-6 col-12">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td class="col-auto px-0" style="width: 40%;">Jenis Kelamin</td>
                <td class="col-auto px-0">:</td>
                <td class="col-auto">?</td>
              </tr>
              <tr>
                <td class="col-auto px-0" style="width: 40%;">Asal Sekolah</td>
                <td class="col-auto px-0">:</td>
                <td class="col-auto">{{ session()->get('stu_school') }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @yield('additional-data')
  </div>

  <div class="card">
    @yield('school-choices')
  </div>

  <div class="card">
    <div class="card-body">
      <h5>Verifikasi Pendaftaran</h5>

      <div class="alert alert-info p-1 mt-1">
        <p class="mb-0">
          Periksa kembali Sekolah dan Jurusan pilihan kamu, Pastikan semuanya benar, dan jangan lupa baca doa sebelum menekan tombol daftar.
        </p>
      </div>

      <x-checkbox identifier="checkVerify" label="Saya yakin telah memilih sekolah pilihan dengan benar" />

      <x-button class="mt-2" id="btnVerify" type="button" color="success" disabled>Ya, Daftar</x-button>
    </div>
  </div>
</form>
