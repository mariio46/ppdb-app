$(document).ready(function() {
  // get data
  $.ajax({
    url: "/get-data-pribadi-siswa",
    method: 'get',
    dataType: 'json',
    success: function(data) {
      if (data.pertama_login == '0' && data.kunci == '0') {
        $('#btnEditData, #btnEditScore, #cardLock').removeClass("d-none");
      } else if (data.pertama_login == '1') {
        $('#firstTimeLoginModal').modal('show');
      }
      
      $('#selfNik').text(data.nik); // personal's data
      $('#selfFromSchool').text(data.asal_sekolah);
      $('#selfGender').text((data.jenis_kelamin == 'l') ? 'Laki-laki' : 'Perempuan');
      $('#selfBirthPlace').text(data.tempat_lahir);
      $('#selfBirthDay').text(data.tanggal_lahir);
      $('#selfPhoneNumber').text(data.nomor_hp);
      $('#selfEmail').text(data.email);
      $('#selfProvince').text(data.provinsi); // address's data
      $('#selfCity').text(data.kabupaten);
      $('#selfSubDistrict').text(data.kecamatan);
      $('#selfVillage').text(data.desa);
      $('#selfHamlet').text(data.dusun);
      $('#selfRtRw').text(data.rtrw);
      $('#selfAddress').text(data.alamat_jalan);
      $('#selfMothersName').text(data.nama_ibu); // parent's data
      $('#selfMothersPhone').text(data.nomor_ibu);
      $('#selfFathersName').text(data.nama_ayah);
      $('#selfFathersPhone').text(data.nomor_ayah);
      $('#selfGuardsName').text(data.nama_wali);
      $('#selfGuardsPhone').text(data.nomor_wali);
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