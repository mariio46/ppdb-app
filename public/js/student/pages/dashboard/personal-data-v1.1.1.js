$(function() {
  ('use strict');

  var select2 = $('.select2'),
    profilePictureInput = $('#profilePictureInput'),
    profilePicturePreview = $('#profilePicturePrev'),
    nik = $('#nik'),
    associations = $('#associations'),
    phone = $('.phone-mask'),
    formEditData = $('#formEditData'),
    formEditProfile = $('#formEditProfile'),
    provinceElement = $('#province'),
    cityElement = $('#city'),
    districtElement = $('#district'),
    villageElement = $('#village');

  // select2
  // --------------------------------------------------------------------
  if (select2.length) {
    select2.each(function() {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        dropdownParent: $this.parent()
      });
    });
  }

  // cleave
  // --------------------------------------------------------------------
  if (nik.length) {
    new Cleave(nik, {
      numericOnly: true,
      blocks: [16]
    });
  }

  if (associations.length) {
    new Cleave(associations, {
      numericOnly: true,
      delimiters: ['/'],
      blocks: [3, 3]
    });
  }

  if (phone.length) {
    phone.toArray().forEach(function(field) {
      new Cleave(field, {
        numericOnly: true,
        delimiters: [' ', ' '],
        blocks: [4, 4, 5]
      });
    });
  }

  // jquery validation
  // --------------------------------------------------------------------
  if (formEditData.length) {
    formEditData.validate({
      rules: {
        'nik': {
          required: true,
          minlength: 16
        },
        'gender': {
          required: true
        },
        'birthPlace': {
          required: true
        },
        'birthDay': {
          required: true
        },
        'birthMonth': {
          required: true
        },
        'birthYear': {
          required: true
        },
        'phone': {
          required: true,
          minlength: 12,
          maxlength: 15
        },
        'email': {
          required: true,
          email: true
        },
        'province': {
          required: true
        },
        'city': {
          required: true
        },
        'district': {
          required: true
        },
        'village': {
          required: true
        },
        'hamlet': {
          required: true
        },
        'associations': {
          required: true
        },
        'address': {
          required: true
        },
        'mothersName': {
          required: true
        },
        'mothersPhone': {
          required: true,
          minlength: 12,
          maxlength: 15
        },
        'fathersName': {
          required: true
        },
        'fathersPhone': {
          required: true,
          minlength: 12,
          maxlength: 15
        },
        'guardsPhone': {
          minlength: 12,
          maxlength: 15
        }
      },
      messages: {
        'nik': {
          required: '*Bidang ini harus diisi.',
          minlength: '*NIK terdiri atas 16 digit angka'
        },
        'gender': {
          required: '*Bidang ini harus dipilih.'
        },
        'birthPlace': {
          required: '*Bidang ini harus diisi.'
        },
        'birthDay': {
          required: '*Bidang ini harus dipilih.'
        },
        'birthMonth': {
          required: '*Bidang ini harus dipilih.'
        },
        'birthYear': {
          required: '*Bidang ini harus dipilih.'
        },
        'phone': {
          required: '*Bidang ini harus diisi.',
          minlength: '*Mohon masukkan nomor telepon yang valid.',
          maxlength: '*Mohon masukkan nomor telepon yang valid.',
        },
        'email': {
          required: '*Bidang ini harus diisi.',
          email: '*Mohon masukkan alamat email yang valid.'
        },
        'province': {
          required: '*Bidang ini harus dipilih.'
        },
        'city': {
          required: '*Bidang ini harus dipilih.'
        },
        'district': {
          required: '*Bidang ini harus dipilih.'
        },
        'village': {
          required: '*Bidang ini harus dipilih.'
        },
        'hamlet': {
          required: '*Bidang ini harus diisi.'
        },
        'associations': {
          required: '*Bidang ini harus diisi.'
        },
        'address': {
          required: '*Bidang ini harus diisi.'
        },
        'mothersName': {
          required: '*Bidang ini harus diisi.'
        },
        'mothersPhone': {
          required: '*Bidang ini harus diisi.',
          minlength: '*Mohon masukkan nomor telepon yang valid.',
          maxlength: '*Mohon masukkan nomor telepon yang valid.',
        },
        'fathersName': {
          required: '*Bidang ini harus diisi.'
        },
        'fathersPhone': {
          required: '*Bidang ini harus diisi.',
          minlength: '*Mohon masukkan nomor telepon yang valid.',
          maxlength: '*Mohon masukkan nomor telepon yang valid.',
        },
        'guardsPhone': {
          minlength: '*Mohon masukkan nomor telepon yang valid.',
          maxlength: '*Mohon masukkan nomor telepon yang valid.',
        }
      }
    });
  }

  if (formEditProfile.length) {
    formEditProfile.validate({
      ignore: [],
      rules: {
        profilePictureInput: {
          required: true,
          extension: "jpg|jpeg|png",
          filesize: 500 * 1024,
        }
      },
      messages: {
        profilePictureInput: {
          required: "*Gambar harus diisi.",
          extension: "*Hanya menerima file gambar dengan format jpg, jpeg atau png.",
          filesize: "*Ukuran gambar tidak boleh lebih dari 500 KB."
        }
      },
      errorPlacement: function(error, element) {
        console.log(error);
        console.log(element);
        $('#profilePictureErrorMsg').html('<p class="text-center mb-0"><small>' + error.text() + '</small></p>');
        $('#profilePictureErrorMsg').show();
      },
    });
  }
  
  $.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param);
  }, 'File size must be less than {0}');

  // provinces
  // --------------------------------------------------------------------
  generateSelectProvince();

  function generateSelectProvince(selected = null) {
    $.ajax({
      url: '/provinces',
      method: 'get',
      dataType: 'json',
      success: function(provinces) {
        provinceElement.empty().append('<option value></value>');

        provinces.forEach(province => {
          let v = province.code + '|' + province.name;
          provinceElement.append('<option value="' + v + '" ' + (v == selected ? 'selected' : '') + '>' + province.name + '</option>');
        });
      }
    });
  }

  provinceElement.change(function() { generateSelectCity(this.value) });

  // cities
  // --------------------------------------------------------------------
  function generateSelectCity(provinceCode, selected = null)
  {
    cityElement.empty().append('<option value=""></value>');
    districtElement.empty().append('<option value=""></value>');
    villageElement.empty().append('<option value=""></value>');

    let code = provinceCode.split('|');

    $.ajax({
      url: '/cities/' + code[0],
      method: 'get',
      dataType: 'json',
      success: function(cities) {
        cities.forEach(city => {
          let v = city.code + '|' + city.name;
          cityElement.append('<option value="' + v + '" ' + (v == selected ? 'selected' : '') + '>' + city.name + '</option>');
        });
      }
    });
  }

  cityElement.change(function() { generateSelectDistrict(this.value) });

  // district
  // --------------------------------------------------------------------
  function generateSelectDistrict(cityCode, selected = null) {
    districtElement.empty().append('<option value=""></value>');
    villageElement.empty().append('<option value=""></value>');

    let code = cityCode.split('|');

    $.ajax({
      url: '/districts/' + code[0],
      method: 'get',
      dataType: 'json',
      success: function(districts) {
        districts.forEach(district => {
          let v = district.code + '|' + district.name;
          districtElement.append('<option value="' + v + '" ' + (v == selected ? 'selected' : '') + '>' + district.name + '</option>');
        });
      }
    });
  }

  districtElement.change(function() { generateSelectVillage(this.value) });

  // villages
  // --------------------------------------------------------------------
  function generateSelectVillage(districtCode, selected = null) {
    villageElement.empty().append('<option value=""></value>');

    let code = districtCode.split('|');

    $.ajax({
      url: '/villages/' + code[0],
      method: 'get',
      dataType: 'json',
      success: function(villages) {
        villages.forEach(village => {
          let v = village.code + '|' + village.name;
          villageElement.append('<option value="' + v + '" ' + (v == selected ? 'selected' : '') + '>' + village.name + '</option>');
        });
      }
    });
  }

  // get student's data
  $.ajax({
    url: "/get-data-pribadi-siswa",
    method: 'get',
    dataType: 'json',
    success: function(studentData) {
      date = new Date(studentData.tanggal_lahir);

      $('#profilePreview, #profilePicturePrev').attr('src', studentData.pas_foto || '/app-assets/images/base-profile.png');

      $('#nik').val(studentData.nik);
      $('#gender').val(studentData.jenis_kelamin).change();
      $('#birthPlace').val(studentData.tempat_lahir);
      $('#birthDay').val(date.getDate()).change();
      $('#birthMonth').val(date.getMonth() + 1).change(); // month start from 0 to 11
      $('#birthYear').val(date.getFullYear()).change();
      $('#phone').val(studentData.nomor_hp.substring(0, 4) + ' ' + studentData.nomor_hp.substring(4, 8) + ' ' + studentData.nomor_hp.substring(8));
      $('#email').val(studentData.email);
      
      generateSelectProvince(studentData.kode_provinsi + '|' + studentData.provinsi);
      generateSelectCity(studentData.kode_provinsi + '|' + studentData.provinsi, studentData.kode_kabupaten + '|' + studentData.kabupaten);
      generateSelectDistrict(studentData.kode_kabupaten + '|' + studentData.kabupaten, studentData.kode_kecamatan + '|' + studentData.kecamatan);
      generateSelectVillage(studentData.kode_kecamatan + '|' + studentData.kecamatan, studentData.kode_desa + '|' + studentData.desa);
      $('#hamlet').val(studentData.dusun);
      $('#associations').val(studentData.rtrw);
      $('#address').val(studentData.alamat_jalan);

      $('#mothersName').val(studentData.nama_ibu);
      $('#mothersPhone').val(studentData.nomor_ibu.substring(0, 4) + ' ' + studentData.nomor_ibu.substring(4, 8) + ' ' + studentData.nomor_ibu.substring(8));
      $('#fathersName').val(studentData.nama_ayah);
      $('#fathersPhone').val(studentData.nomor_ayah.substring(0, 4) + ' ' + studentData.nomor_ayah.substring(4, 8) + ' ' + studentData.nomor_ayah.substring(8));
      $('#guardsName').val(studentData.nama_wali);
      $('#guardsPhone').val(studentData.nomor_wali.substring(0, 4) + ' ' + studentData.nomor_wali.substring(4, 8) + ' ' + studentData.nomor_wali.substring(8));
    }
  });

  // when profile picture is selected
  // --------------------------------------------------------------------
  profilePictureInput.change(function() {
    previewProfilePict();
  });

  function previewProfilePict() {
    let input = profilePictureInput[0],
      preview = profilePicturePreview[0];
      
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function (e) {
        preview.src = e.target.result;
      };
      
      reader.readAsDataURL(input.files[0]);
    }
  }

  // when modal dismiss
  $("#uploadProfilePictureModal").on("hidden.bs.modal", function () {
    profilePictureInput.val('');
    profilePicturePreview.attr("src", profilePicture ? profilePicture : "/app-assets/images/base-profile.png");
    $('#profilePictureErrorMsg').css("display", "none");
  });
});
