@extends('student.registration.tracks.track-base', ['typeSchool' => 'SMA', 'track' => 'Prestasi Non Akademik'])

@section('additional-data')
  <div class="card-body border-top">
    <h5>Data Pendukung</h5>

    <div class="alert alert-warning p-1">
      <p class="mb-0">Silakan lengkapi data di bawah ini sesuai dengan prestasi terbaik yang pernah kamu miliki.</p>
    </div>

    <div class="row">
      <div class="col-md-6 col-12">
        {{-- achievement type --}}
        <x-student.select id="achievementType" label="Jenis Prestasi" search="n">
          <option value="a">Berjenjang Individu</option>
          <option value="b">Tidak Berjenjang Individu</option>
          <option value="c">Beregu</option>
        </x-student.select>
      </div>

      <div class="col-md-6 col-12">
        {{-- achievement level --}}
        <x-student.select id="achievementLevel" label="Tingkatan Prestasi" search="n">
          <option value="i">Internasional</option>
          <option value="n">Nasional</option>
          <option value="p">Provinsi</option>
          <option value="c">Kabupaten/Kota</option>
        </x-student.select>
      </div>

      <div class="col-md-6 col-12">
        {{-- achievement champ --}}
        <x-student.select id="achievementChamp" label="Juara yang didapatkan" ph="Juara ke" search="n">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </x-student.select>
      </div>

      <div class="col-md-6 col-12">
        {{-- achievement's name --}}
        <div class="mb-1">
          <x-label for="achievementName">Nama Prestasi/Kejuaraan</x-label>
          <x-input id="achievementName" name="achievementName" placeholder="Nama Prestasi/Kejuaraan" />
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
    {{-- school 1 --}}
    <h5 class="text-warning mt-0">Pilihan 1</h5>
    <div class="row">
      <div class="col-md-6 col-12">
        <x-student.select id="city1" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
      </div>
      <div class="col-md-6 col-12">
        <x-student.select id="school1" label="Sekolah Pilihan"></x-student.select>
      </div>
    </div>

    {{-- school 2 --}}
    <h5 class="text-warning mt-2">Pilihan 2</h5>
    <div class="row">
      <div class="col-md-6 col-12">
        <x-student.select id="city2" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
      </div>
      <div class="col-md-6 col-12">
        <x-student.select id="school2" label="Sekolah Pilihan"></x-student.select>
      </div>
    </div>

    {{-- school 3 --}}
    <h5 class="text-warning mt-2">Pilihan 3</h5>
    <div class="row">
      <div class="col-md-6 col-12">
        <x-student.select id="city3" label="Kabupaten/Kota Sekolah Pilihan" ph="Kabupaten/Kota"></x-student.select>
      </div>
      <div class="col-md-6 col-12">
        <x-student.select id="school3" label="Sekolah Pilihan"></x-student.select>
      </div>
    </div>

    {{-- others --}}
    <input id="city1Name" name="city1Name" type="hidden">
    <input id="school1Name" name="school1Name" type="hidden">
    <input id="city2Name" name="city2Name" type="hidden">
    <input id="school2Name" name="school2Name" type="hidden">
    <input id="city3Name" name="city3Name" type="hidden">
    <input id="school3Name" name="school3Name" type="hidden">
    <input id="schoolVerif" name="schoolVerif" type="hidden">
    <input id="schoolVerifName" name="schoolVerifName" type="hidden">
  </div>

  {{-- modal --}}
  <x-student.registration-modal modalLevel="SMA" modalTrack="Prestasi Non Akademik">
    <tr>
      <td class="col-auto px-0">Jenis Prestasi</td>
      <td class="col-auto">:</td>
      <td class="col-auto px-0 fw-bold"><span id="achTypeShow"></span></td>
    </tr>
    <tr>
      <td class="col-auto px-0">Prestasi</td>
      <td class="col-auto">:</td>
      <td class="col-auto px-0 fw-bold"><span id="achChampShow"></span></td>
    </tr>
    <tr>
      <td class="col-auto px-0">Nama Prestasi</td>
      <td class="col-auto">:</td>
      <td class="col-auto px-0 fw-bold"><span id="achNameShow"></span></td>
    </tr>
  </x-student.registration-modal>
@endsection

{{-- @push('scripts')
  <script>
    $(function() {
      'use strict';

      var achType = $('#achievementType'),
        achLevel = $('#achievementLevel'),
        achChamp = $('#achievementChamp'),
        achName = $('#achievementName'),
        formRegis = $('#formSchoolRegister'),
        btnVerify = $('#btnVerify');

      // modal
      var modalRegis = $('#verifySchoolModal'),
        selectInModal = $('.select-in-modal'),
        selectSchoolVerif = $('#schoolForVerif'),
        btnSubmit = $('#btnSendRegistration');

      // init
      // --------------------------------------------------
      // validate rules
      if (formRegis.length) {
        formRegis.validate({
          rules: {
            achievementType: {
              required: true
            },
            achievementLevel: {
              required: true
            },
            achievementChamp: {
              required: true
            },
            achievementName: {
              required: true
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
            achievementType: {
              required: "*Pilih salah satu."
            },
            achievementLevel: {
              required: '*Pilih salah satu.'
            },
            achievementChamp: {
              required: "*Pilih salah satu."
            },
            achievementName: {
              required: "*Harus diisi."
            },
            city1: {
              required: "*Pilih Kabupaten/Kota untuk mendapatkan daftar sekolah."
            },
            school1: {
              required: "*Sekolah Pertama harus dipilih.",
              uniqueValue: "*Sekolah hanya boleh dipilih satu kali."
            },
            school2: {
              uniqueValue: "*Sekolah hanya boleh dipilih satu kali."
            },
            school3: {
              uniqueValue: "*Sekolah hanya boleh dipilih satu kali."
            }
          }
        });
      }

      selectSchoolVerif.rules("add", {
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
            for (let i = 1; i <= 3; i++) {
              $('#city' + i).empty().append('<option value=""></option>');

              cities.forEach(city => {
                $('#city' + i).append('<option value="' + city.code + '">' + city.name + '</option>');
              });
            }
          },
          error: function(xhr, status, error) {
            console.error("Gagal mendapatkan data: ", status, error);
          }
        });
      }

      function loadSchool(n, cityCode = '0') {
        $.ajax({
          url: '/schools/by-city/' + cityCode + '/sma',
          method: 'get',
          dataType: 'json',
          success: function(schools) {
            $('#school' + n).empty().append('<option value=""></option>');

            schools.forEach(school => {
              $('#school' + n).append('<option value="' + school.id + '">' + school.name + '</option>');
            });
          },
          error: function(xhr, status, error) {
            console.error("Gagal mendapatkan data: ", status, error);
          }
        })
      }

      // load city
      // --------------------------------------------------
      loadCity();

      // load School
      // --------------------------------------------------
      for (let i = 1; i <= 3; i++) {
        $('#city' + i).change(function() {
          loadSchool(i, $(this).val());
        });
      }

      // verifying
      // --------------------------------------------------
      btnVerify.click(function() {
        if (formRegis.valid()) {
          let type = achType.children(':selected').text();
          let level = achLevel.children(':selected').text();
          let champ = achChamp.val();
          let name = achName.val();

          $('#achTypeShow').text(type);
          $('#achLevelShow').text(level);
          $('#achChampShow').text(champ);
          $('#achNameShow').text(name);

          selectSchoolVerif.empty().append('<option value=""></option>')
          for (let i = 1; i <= 3; i++) {
            let school = $('#school' + i);
            let schoolCode = school.val();
            let schoolName = school.children(':selected').text();

            $(`#school${i}Show`).text(schoolName);
            selectSchoolVerif.append('<option value="' + schoolCode + '">' + schoolName + '</option>');
          }

          modalRegis.modal('show');
        }
      });

      // submitting
      // --------------------------------------------------
      btnSubmit.click(function() {
        if (selectSchoolVerif.valid()) {
          for (let i = 1; i <= 3; i++) {
            let cityName = $('#city' + i).children(':selected').text();
            let schoolName = $('#school' + i).children(':selected').text();

            $(`#city${i}Name`).val(cityName);
            $(`#school${i}Name`).val(schoolName);
          }

          let verif = $('#schoolForVerif');
          $('#schoolVerif').val(verif.val());
          $('#schoolVerifName').val(verif.children(':selected').text());

          formRegis.submit();
        }
      });
    });
  </script>
@endpush --}}
