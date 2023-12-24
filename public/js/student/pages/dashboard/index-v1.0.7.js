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
      
      $('#profileImage').attr('src', d.pasfoto || '/img/base-profile.png'); // profile image
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
      let s = score.data;
      $('#smt1Bid').text(s.sm1_bid);
      $('#smt2Bid').text(s.sm2_bid);
      $('#smt3Bid').text(s.sm3_bid);
      $('#smt4Bid').text(s.sm4_bid);
      $('#smt5Bid').text(s.sm5_bid);
      $('#smt1Big').text(s.sm1_big);
      $('#smt2Big').text(s.sm2_big);
      $('#smt3Big').text(s.sm3_big);
      $('#smt4Big').text(s.sm4_big);
      $('#smt5Big').text(s.sm5_big);
      $('#smt1Mtk').text(s.sm1_mtk);
      $('#smt2Mtk').text(s.sm2_mtk);
      $('#smt3Mtk').text(s.sm3_mtk);
      $('#smt4Mtk').text(s.sm4_mtk);
      $('#smt5Mtk').text(s.sm5_mtk);
      $('#smt1Ipa').text(s.sm1_ipa);
      $('#smt2Ipa').text(s.sm2_ipa);
      $('#smt3Ipa').text(s.sm3_ipa);
      $('#smt4Ipa').text(s.sm4_ipa);
      $('#smt5Ipa').text(s.sm5_ipa);
      $('#smt1Ips').text(s.sm1_ips);
      $('#smt2Ips').text(s.sm2_ips);
      $('#smt3Ips').text(s.sm3_ips);
      $('#smt4Ips').text(s.sm4_ips);
      $('#smt5Ips').text(s.sm5_ips);
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