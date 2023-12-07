@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMA', 'track' => 'Afirmasi'])

@section('additional-data')
  <div class="card-body border-top">
    <h5>Data Berkas</h5>

    <div class="alert alert-warning p-1">
      <p class="mb-0">Silahkan lengkap data dibawah ini sesuai dengan afirmasi yang kamu miliki</p>
    </div>
    <div class="row">
      <div class="col-lg-6 col-12">
        <x-student.select id="affirmationType" label="Jenis Afirmasi" search="n">
          <option value="disabilitas">Disabilitas</option>
          <option value="pkh">PKH (Program Keluarga Harapan)</option>
        </x-student.select>
      </div>
      <div class="col-lg-6 col-12">
        <div class="mb-1" id="affirmationNumberSection" style="display: none;">
          <x-label for="affirmationNumber">Nomor PKH</x-label>
          <x-input id="affirmationNumber" name="affirmationNumber" placeholder="Nomor PKH" />
        </div>
      </div>
    </div>

  </div>
@endsection

@section('school-choices')
  <div class="card-header">
    <h4 class="card-title">Sekolah Pilihan</h4>
  </div>
  <div class="card-body">
    <h5 class="text-warning mt-1">Pilihan 1</h5>
    <div class="row">
      <div class="col-lg-6 col-12">
        <x-student.select id="city1" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
      </div>
      <div class="col-lg-6 col-12">
        <x-student.select id="school1" label="Sekolah Pilihan"></x-student.select>
      </div>
    </div>

    <h5 class="text-warning mt-2">Pilihan 2</h5>
    <div class="row">
      <div class="col-lg-6 col-12">
        <x-student.select id="city2" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
      </div>
      <div class="col-lg-6 col-12">
        <x-student.select id="school2" label="Sekolah Pilihan"></x-student.select>
      </div>
    </div>

    <h5 class="text-warning mt-2">Pilihan 3</h5>
    <div class="row">
      <div class="col-lg-6 col-12">
        <x-student.select id="city3" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
      </div>
      <div class="col-lg-6 col-12">
        <x-student.select id="school3" label="Sekolah Pilihan"></x-student.select>
      </div>
    </div>

    <input id="city1Name" name="city1Name" type="hidden">
    <input id="city2Name" name="city2Name" type="hidden">
    <input id="city3Name" name="city3Name" type="hidden">
    <input id="school1Name" name="school1Name" type="hidden">
    <input id="school2Name" name="school2Name" type="hidden">
    <input id="school3Name" name="school3Name" type="hidden">
    <input id="schoolVerif" name="schoolVerif" type="hidden">
    <input id="schoolVerifName" name="schoolVerifName" type="hidden">
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
            <tr>
              <td class="col-auto px-0" style="width: 40%;">Jenjang Pendidikan</td>
              <td class="col-auto">:</td>
              <td class="col-auto px-0 fw-bold" style="width: 55%;">SMA</td>
            </tr>
            <tr>
              <td class="col-auto px-0">Jalur</td>
              <td class="col-auto">:</td>
              <td class="col-auto px-0 fw-bold"><i>Afirmasi</i></td>
            </tr>
            <tr>
              <td class="col-auto px-0">Jenis Afirmasi</td>
              <td class="col-auto">:</td>
              <td class="col-auto px-0 fw-bold"><span id="affTypeShow"><i>null</i></span></td>
            </tr>
            <tr id="affTypeNumShowSection">
              <td class="col-auto px-0">Nomor PKH</td>
              <td class="col-auto">:</td>
              <td class="col-auto px-0 fw-bold"><span id="affTypeNumShow"><i>null</i></span></td>
            </tr>
          </table>
        </div>
        <div class="modal-body border-top">
          <h5>Sekolah Pilihan</h5>
          <table class="table table-borderless">
            <tr>
              <td class="col-auto px-0" style="width: 40%;">Pilihan 1</td>
              <td class="col-auto">:</td>
              <td class="col-auto px-0 fw-bold" style="width: 55%;"><span id="school1Show"></span></td>
            </tr>
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
          </table>
        </div>
        <div class="modal-body border-top">
          <h5>Sekolah Tempat Verifikasi</h5>

          <div class="alert alert-warning p-1">
            <small class="mb-0">Sekolah Tempat Verifikasi merupakan tempat kamu melakukan verifikasi berkas, dan <strong>BUKAN</strong> sekolah tempat kamu lulus.</small>
            <small class="mb-0">Pastikan kamu dapat mendatangi sekolah tempat verifikasi ini.</small>
          </div>

          <div class="mb-1">
            <x-label for="schoolForVerif">Sekolah tempat verifikasi</x-label>
            <select class="form-select select-in-modal" id="schoolForVerif" name="schoolForVerif">
              <option value=""></option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <x-button class="float-end mb-1" id="btnSendRegistration" type="button" color="success" withIcon="true"><x-bi-check /> Kirim Pendaftaran</x-button>
        </div>
      </div>
    </div>
  </div> --}}

  <x-student.registration-modal modalLevel="SMA" modalTrack="Afirmasi">
    <tr>
      <td class="col-auto px-0">Jenis Afirmasi</td>
      <td class="col-auto">:</td>
      <td class="col-auto px-0 fw-bold"><span id="affTypeShow"><i>null</i></span></td>
    </tr>
    <tr id="affTypeNumShowSection">
      <td class="col-auto px-0">Nomor PKH</td>
      <td class="col-auto">:</td>
      <td class="col-auto px-0 fw-bold"><span id="affTypeNumShow"><i>null</i></span></td>
    </tr>
  </x-student.registration-modal>
@endsection

{{-- @push('scripts')
  <script>
    $(function() {
      ('use strict');

      var affType = $('#affirmationType'),
        affNum = $('#affirmationNumber'),
        affNumSec = $('#affirmationNumberSection'),
        formRegister = $('#formSchoolRegister'),
        btnVerify = $('#btnVerify'),
        modalVerify = $('#verifySchoolModal'),
        selectInModal = $('.select-in-modal'),
        schoolForVerif = $('#schoolForVerif'),
        btnSendRegistration = $('#btnSendRegistration'),
        affTypeShow = $('#affTypeShow'),
        affTypeNumShowSection = $('#affTypeNumShowSection'),
        affTypeNumShow = $('#affTypeNumShow');

      modalVerify.on('shown.bs.modal', function() {
        selectInModal.select2({
          placeholder: 'Sekolah tempat verifikasi',
          minimumResultsForSearch: -1
        })
      });

      // aff type change
      // --------------------------------------------------------------------
      affType.change(function() {
        if ($(this).val() == 'pkh') {
          affNumSec.show();
        } else {
          affNumSec.hide();
          affNum.val('');
        }
      });

      // city select
      // --------------------------------------------------------------------
      function loadCity() {
        $.ajax({
          url: '/cities/73',
          method: 'get',
          dataType: 'json',
          success: function(cities) {
            $('#city1, #city2, #city3').empty().append('<option value=""></option>');

            cities.forEach(city => {
              $('#city1, #city2, #city3').append(`<option value="${city.code}">${city.name}</option>`);
            });
          },
          error: function(xhr, status, error) {
            console.error("Gagal mendapatkan data: ", status, error);
          }
        });
      }

      loadCity();

      // school select
      // --------------------------------------------------------------------
      function loadSchool(s, cityCode) {
        $.ajax({
          url: '/schools/by-city/' + cityCode + '/sma',
          method: 'get',
          dataType: 'json',
          success: function(schools) {
            $('#school' + s).empty().append('<option value=""></option>');

            schools.forEach(school => {
              $('#school' + s).append(`<option value="${school.id}">${school.name}</option>`);
            });
          },
          error: function(xhr, status, error) {
            console.error("Gagal mendapatakan data: ", status, error);
          }
        });
      }

      for (let n = 1; n <= 3; n++) {
        $('#city' + n).change(function() {
          let cityCode = $(this).val();
          loadSchool(n, cityCode);
        });
      }

      // validate
      // --------------------------------------------------------------------
      if (formRegister.length) {
        formRegister.validate({
          rules: {
            affirmationType: {
              required: true
            },
            affirmationNumber: {
              requiredIfPkh: 'affirmationType',
              // digits: true
              // maxlength: xx
              // minlength: xx
            },
            city1: {
              required: true
            },
            school1: {
              required: true,
              uniqueValue: "school2,school3"
            },
            school2: {
              uniqueValue: "school1,school3"
            },
            school3: {
              uniqueValue: "school1,school2"
            }
          },
          messages: {
            affirmationType: {
              required: '*Pilih salah satu.'
            },
            affirmationNumber: {
              requiredIfPkh: '*Bidang ini harus diisi.'
            },
            city1: {
              required: '*Pilih salah satu.'
            },
            school1: {
              required: '*Harus pilih salah satu sekolah.',
              uniqueValue: '*1 Sekolah hanya boleh dipilih 1 kali.'
            },
            school2: {
              uniqueValue: '*1 Sekolah hanya boleh dipilih 1 kali.'
            },
            school3: {
              uniqueValue: '*1 Sekolah hanya boleh dipilih 1 kali.'
            }
          }
        });
      }

      schoolForVerif.rules("add", {
        required: true,
        messages: {
          required: "*Pilih satu sekolah tempat verifikasi."
        }
      })

      $.validator.addMethod("requiredIfPkh", function(value, element, params) {
        var sourceValue = $("#" + params).val();

        // Jika input sumber memiliki nilai tertentu, maka target harus diisi
        return sourceValue !== "pkh" || value !== "";
      }, "Target harus diisi.");


      // verifying
      // --------------------------------------------------------------------
      btnVerify.click(function() {
        if (formRegister.valid()) {
          affTypeShow.text(affType.children(':selected').text());
          if (affType.val() == 'pkh') {
            affTypeNumShow.text(affNum.val())
            affTypeNumShowSection.show();
          } else {
            affTypeNumShow.text('');
            affTypeNumShowSection.hide();
          }

          schoolForVerif.empty().append('<option value=""></option>');
          for (let i = 1; i <= 3; i++) {
            let selectedSchoolCode = $('#school' + i).val();
            let selectedSchoolName = $('#school' + i).children(':selected').text();

            $('#school' + i + 'Show').text(selectedSchoolName);

            schoolForVerif.append(`<option value="${selectedSchoolCode}">${selectedSchoolName}</option>`);
          }
          modalVerify.modal('show');
        }
      });

      // send registration
      // --------------------------------------------------------------------
      btnSendRegistration.click(function() {
        if (schoolForVerif.valid()) {
          for (let a = 1; a <= 3; a++) {
            let cityName = $('#city' + a).children(':selected').text();
            let schoolName = $('#school' + a).children(':selected').text();

            $(`#city${a}Name`).val(cityName);
            $(`#school${a}Name`).val(schoolName);
          }

          $('#schoolVerif').val($('#schoolForVerif').val());
          $('#schoolVerifName').val($('#schoolForVerif').children(':selected').text());

          formRegister.submit();
        }
      });
    });
  </script>
@endpush --}}
