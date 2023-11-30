$(function () {
  'use strict';

  var pageLoginForm = $('#login-form');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageLoginForm.length) {
    pageLoginForm.validate({
      rules: {
        'nisn': {
          required: true,
          digits: true,
          maxlength: 10,
          minlength: 10
        },
        'password': {
          required: true,
          minlength: 6
        }
      },
      messages: {
        'nisn': {
          required: '*Bidang ini harus diisi.',
          digits: '*Mohon masukkan hanya angka.',
          maxlength: '*Mohon tidak memasukkan lebih dari 10 karakter.',
          minlength: '*Mohon tidak memasukkan kurang dari 10 karakter.'
        },
        'password': {
          required: '*Bidang ini harus diisi.',
          minlength: '*Mohon tidak memasukkan kurang dari 6 karakter.'
        }
      }
    });
  }
});