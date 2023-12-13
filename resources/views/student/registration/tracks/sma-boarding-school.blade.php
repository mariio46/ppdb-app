@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMA', 'track' => 'Boarding School'])

@section('school-choices')
  <div class="card-header">
    <h5 class="card-title">Sekolah Pilihan</h5>
  </div>
  <div class="card-body">
    <x-student.select id="school1" label="Sekolah Pilihan" />
    <input id="school1Name" name="school1Name" type="hidden">
  </div>

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
