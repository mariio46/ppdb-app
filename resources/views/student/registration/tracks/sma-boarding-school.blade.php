@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMA', 'track' => 'Boarding School'])

@section('school-choices')
  <div class="card-header">
    <h5 class="card-title">Sekolah Pilihan</h5>
  </div>
  <div class="card-body">
    <x-student.select id="school1" label="Sekolah Pilihan" />
    <input id="school1Name" name="school1Name" type="hidden">
  </div>

  {{-- Modal --}}
  {{-- <div class="modal fade modal-primary text-start" id="verifySchoolModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
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
              <td class="col auto px-0 fw-bold">{{ session()->get('stu_name') }}</td>
            </tr>
            <tr>
              <td class="col-auto px-0">NISN</td>
              <td class="col-auto">:</td>
              <td class="col auto px-0 fw-bold">{{ session()->get('stu_nisn') }}</td>
            </tr>
            <tr>
              <td class="col-auto px-0">Asal Sekolah</td>
              <td class="col-auto">:</td>
              <td class="col auto px-0 fw-bold">{{ session()->get('stu_school') }}</td>
            </tr>
          </table>
        </div>
        <div class="modal-body border-top">
          <h5>Pendaftaran</h5>
          <table class="table table-borderless">
            <tr>
              <td class="col-auto px-0" style="width: 40%;">Jenjang Pendidikan</td>
              <td class="col-auto">:</td>
              <td class="col auto px-0 fw-bold">SMA</td>
            </tr>
            <tr>
              <td class="col-auto px-0">Jalur</td>
              <td class="col-auto">:</td>
              <td class="col auto px-0 fw-bold"><i>Boarding School</i></td>
            </tr>
          </table>
        </div>
        <div class="modal-body border-top">
          <h5>Sekolah Pilihan</h5>
          <table class="table table-borderless">
            <tr>
              <td class="col-auto px-0" style="width: 40%;">Pilihan</td>
              <td class="col-auto">:</td>
              <td class="col auto px-0 fw-bold"><span id="school1Show"></span></td>
            </tr>
          </table>

        </div>
        <div class="modal-footer">
          <x-button class="float-end mb-1" id="btnSendRegistration" type="button" color="success" withIcon="true"><x-bi-check /> Kirim Pendaftaran</x-button>
        </div>
      </div>
    </div>
  </div> --}}

  <x-student.registration-modal modalLevel="SMA" modalTrack="Boarding School" multiSchool="false" withSchoolVerif="false"></x-student.registration-modal>
@endsection

{{-- @push('scripts')
  <script>
    $(function() {
      ('use strict');

      var school1 = $('#school1'),
        school1Name = $('#school1Name'),
        verifyBtn = $('#btnVerify'),
        formRegister = $('#formSchoolRegister'),
        registerModal = $('#verifySchoolModal'),
        showSchool1 = $('#school1Show'),
        registerBtn = $('#btnSendRegistration');

      // generate school options
      // --------------------------------------------------------------------
      $.ajax({
        url: '/schools/boarding-school',
        method: 'get',
        dataType: 'json',
        success: function(schools) {
          school1.empty().append('<option value=""></option>');

          schools.forEach(school => {
            school1.append(`<option value="${school.id}">${school.name}</option>`);
          });
        },
        error: function(xhr, status, error) {
          console.error("Gagal mengambil data:", status, error);
        }
      });

      // set school name selected
      // --------------------------------------------------------------------
      school1.change(function() {
        school1Name.val(school1.children(':selected').text());
      });

      // validating
      // --------------------------------------------------------------------
      if (formRegister.length) {
        formRegister.validate({
          rules: {
            school1: {
              required: true
            }
          },
          messages: {
            school1: {
              required: "*Sekolah harus dipilih"
            }
          }
        });
      };

      // clicking button verification
      // --------------------------------------------------------------------
      verifyBtn.click(function() {
        if (formRegister.valid()) {
          showSchool1.text(school1.children(':selected').text());
          registerModal.modal('show');
        }
      });

      // clicking button register
      // --------------------------------------------------------------------
      registerBtn.click(function() {
        formRegister.submit();
      });
    });
  </script>
@endpush --}}
