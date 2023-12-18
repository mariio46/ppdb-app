$(document).ready(function() {
  // get data
  $.ajax({
    url: "/get-data-pribadi-siswa",
    method: 'get',
    dataType: 'json',
    success: function(data) {
      let d = data.data;

      if (d.pertama_login == 't' && d.kunci == '0') {
        $('#btnEditData, #btnEditScore, #cardLock').removeClass("d-none");
      } else if (d.pertama_login == 'y') {
        $('#firstTimeLoginModal').modal('show');
      }
      
      $('#profileImage').attr('src', d.pas_foto || '/img/base-profile.png'); // profile image
      $('#selfNik').text(d.nik); // personal's data
      $('#selfFromSchool').text(d.sekolah_asal);
      $('#selfGender').text((d.jenis_kelamin == 'l') ? 'Laki-laki' : 'Perempuan');
      $('#selfBirthPlace').text(d.tempat_lahir);
      $('#selfBirthDay').text(d.tanggal_lahir);
      $('#selfPhoneNumber').text(d.telepon);
      $('#selfEmail').text(d.email);
      $('#selfProvince').text(d.provinsi); // address's data
      $('#selfCity').text(d.kabupaten);
      $('#selfSubDistrict').text(d.kecamatan);
      $('#selfVillage').text(d.desa);
      $('#selfHamlet').text(d.dusun);
      $('#selfRtRw').text(d.rtrw);
      $('#selfAddress').text(d.alamat_jalan);
      $('#selfMothersName').text(d.nama_ibu); // parent's data
      $('#selfMothersPhone').text(d.telepon_ibu);
      $('#selfFathersName').text(d.nama_ayah);
      $('#selfFathersPhone').text(d.telepon_ayah);
      $('#selfGuardsName').text(d.nama_wali);
      $('#selfGuardsPhone').text(d.telepon_wali);
    }
  });

  $.ajax({
    url: "/get-data-nilai-siswa",
    method: 'get',
    dataType: 'json',
    success: function(score) {
      $('#smt1Bid').text(score.smt1bid);
      $('#smt2Bid').text(score.smt2bid);
      $('#smt3Bid').text(score.smt3bid);
      $('#smt4Bid').text(score.smt4bid);
      $('#smt5Bid').text(score.smt5bid);
      $('#smt1Big').text(score.smt1big);
      $('#smt2Big').text(score.smt2big);
      $('#smt3Big').text(score.smt3big);
      $('#smt4Big').text(score.smt4big);
      $('#smt5Big').text(score.smt5big);
      $('#smt1Mtk').text(score.smt1mtk);
      $('#smt2Mtk').text(score.smt2mtk);
      $('#smt3Mtk').text(score.smt3mtk);
      $('#smt4Mtk').text(score.smt4mtk);
      $('#smt5Mtk').text(score.smt5mtk);
      $('#smt1Ipa').text(score.smt1ipa);
      $('#smt2Ipa').text(score.smt2ipa);
      $('#smt3Ipa').text(score.smt3ipa);
      $('#smt4Ipa').text(score.smt4ipa);
      $('#smt5Ipa').text(score.smt5ipa);
      $('#smt1Ips').text(score.smt1ips);
      $('#smt2Ips').text(score.smt2ips);
      $('#smt3Ips').text(score.smt3ips);
      $('#smt4Ips').text(score.smt4ips);
      $('#smt5Ips').text(score.smt5ips);
    }
  });
});

$(function () {
  'use strict';

  var firstTimeLoginForm = $('#ftlForm'),
    lockDataCheckbox = $('#lockCheck'),
    lockDataBtn = $('#lockCheckBtn');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (firstTimeLoginForm.length) {
    firstTimeLoginForm.validate({
      rules: {
        'ftlEmail': {
          required: true,
          email: true
        },
        'ftlPhoneNumber': {
          required: true,
          digits: true,
          rangelength: [10, 13]
        },
        'ftlNewPassword': {
          required: true,
          minlength: 6
        },
        'ftlConfirmPassword': {
          required: true,
          minlength: 6,
          equalTo: "#ftlNewPassword"
        }
      },
      messages: {
        'ftlEmail': {
          required: "*Bidang ini harus diisi.",
          email: "*Mohon masukkan alamat email yang valid."
        },
        'ftlPhoneNumber': {
          required: "*Bidang ini harus diisi.",
          digits: "*Mohon masukkan nomor telepon yang valid.",
          rangelength: "*Mohon masukkan nomor telepon yang valid."
        },
        'ftlNewPassword': {
          required: "*Bidang ini harus diisi.",
          minlength: "*Mohon masukkan minimal 6 karakter."
        },
        'ftlConfirmPassword': {
          required: "*Bidang ini harus diisi.",
          minlength: "*Mohon masukkan minimal 6 karakter.",
          equalTo: "*Ulangi kata sandi harus sama dengan kata sandi baru."
        },
      }
    });
  }

  // Lock Data
  // --------------------------------------------------------------------
  lockDataCheckbox.click(function() {
    if (lockDataCheckbox.is(":checked")) {
      lockDataBtn.removeAttr('disabled');
    } else {
      lockDataBtn.attr('disabled', true);
    }
  });
});