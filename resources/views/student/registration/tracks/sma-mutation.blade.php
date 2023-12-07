@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMA', 'track' => 'Perpindahan Tugas Orang Tua'])

@section('school-choices')
  <div class="card-header">
    <h4 class="card-title">Sekolah Pilihan</h4>
  </div>
  <div class="card-body">
    <x-student.select id="city1" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>

    {{-- sekolah pilihan 1 --}}
    <h5 class="text-warning mt-0">Pilihan 1</h5>
    <x-student.select id="school1" label="Sekolah Pilihan"></x-student.select>

    {{-- sekolah pilihan 2 --}}
    <h5 class="text-warning mt-1">Pilihan 2</h5>
    <x-student.select id="school2" label="Sekolah Pilihan"></x-student.select>

    {{-- sekolah pilihan 3 --}}
    <h5 class="text-warning mt-1">Pilihan 3</h5>
    <x-student.select id="school3" label="Sekolah Pilihan"></x-student.select>
  </div>

  <input id="city1Name" name="city1Name" type="hidden">
  <input id="school1Name" name="school1Name" type="hidden">
  <input id="school2Name" name="school2Name" type="hidden">
  <input id="school3Name" name="school3Name" type="hidden">
  <input id="schoolVerif" name="schoolVerif" type="hidden">
  <input id="schoolVerifName" name="schoolVerifName" type="hidden">

  <x-student.registration-modal modalLevel="SMA" modalTrack="Perpindahan Tugas Orang Tua"></x-student.registration-modal>
@endsection

{{-- @push('scripts')
  <script>
    $(function() {
      "use strict";

      var selectCity = $('#city1'),
        formRegister = $('#formSchoolRegister'),
        btnVerify = $('#btnVerify'),
        modalRegis = $('#verifySchoolModal'),
        selectInModal = $('.select-in-modal'),
        selectSchoolForVerif = $('#schoolForVerif'),
        btnSubmit = $('#btnSendRegistration');

      // init
      // --------------------------------------------------
      // validate rules
      if (formRegister.length) {
        formRegister.validate({
          rules: {
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
            city1: {
              required: "*Pilih salah satu kabupaten/kota.",
            },
            school1: {
              required: "*Sekolah Pilihan 1 harus dipilih.",
              uniqueValue: "*Sekolah hanya boleh dipilih sekali."
            },
            school2: {
              uniqueValue: "*Sekolah hanya boleh dipilih sekali."
            },
            school3: {
              uniqueValue: "*Sekolah hanya boleh dipilih sekali."
            },
          }
        })
      }

      selectSchoolForVerif.rules("add", {
        required: true,
        messages: {
          required: "*Pilih sekolah tempat verifikasi kamu."
        }
      });

      // select2 in modal
      modalRegis.on('shown.bs.modal', function() {
        selectInModal.select2({
          placeholder: "Sekolah tempat verifikasi",
          minimumResultsForSearch: -1
        });
      });

      // functions
      // --------------------------------------------------
      function loadCity() {
        $.ajax({
          url: '/cities/73',
          method: 'get',
          dataType: 'json',
          success: function(cities) {
            selectCity.empty().append('<option value=""></option>');

            cities.forEach(city => {
              selectCity.append('<option value="' + city.code + '">' + city.name + '</option>');
            });
          },
          error: function(xhr, status, error) {
            console.error("Gagal mendapatkan data: ", status, error);
          }
        });
      }

      function loadSchool(cityCode = '0') {
        $.ajax({
          url: '/schools/by-city/' + cityCode + '/sma',
          method: 'get',
          dataType: 'json',
          success: function(schools) {
            for (let i = 1; i <= 3; i++) {
              $('#school' + i).empty().append('<option value=""></option>');

              schools.forEach(school => {
                $('#school' + i).append('<option value="' + school.id + '">' + school.name + '</option>');
              });
            }
          },
          error: function(xhr, status, error) {
            console.error("Gagal mendapatkan data: ", status, error);
          }
        })
      }

      // load city
      // --------------------------------------------------
      loadCity();

      // load schools
      // --------------------------------------------------
      selectCity.change(function() {
        loadSchool($(this).val());
      });

      // verifying
      // --------------------------------------------------
      btnVerify.click(function() {
        if (formRegister.valid()) {
          selectSchoolForVerif.empty().append('<option value=""></option>');
          for (let i = 1; i <= 3; i++) {
            let school = $('#school' + i);
            let selectedCode = school.val();
            let selectedName = school.children(':selected').text();

            $(`#school${i}Show`).text(selectedName);
            selectSchoolForVerif.append(`<option value="${selectedCode}">${selectedName}</option>`);
          }

          modalRegis.modal('show');
        }
      });

      // submitting
      // --------------------------------------------------
      btnSubmit.click(function() {
        if (selectSchoolForVerif.valid()) {
          // set city1 name
          let cityName = selectCity.children(':selected').text();
          $('#city1Name').val(cityName);

          // set school's name
          for (let i = 1; i <= 3; i++) {
            let schoolName = $('#school' + i).children(':selected').text();
            $(`#school${i}Name`).val(schoolName);
          }

          // set school for verification
          $("#schoolVerif").val(selectSchoolForVerif.val());
          $("#schoolVerifName").val(selectSchoolForVerif.children(":selected").text());

          formRegister.submit();
        }
      });
    });
  </script>
@endpush --}}
