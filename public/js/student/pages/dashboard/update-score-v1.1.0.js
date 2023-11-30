$(function() {
  ('use strict');

  var formEditScore = $('#formEditScore');

  if (formEditScore.length) {
    formEditScore.validate({
      rules: {
        math: {
          required: true,
          number: true,
          min: 0,
          max: 100
        },
        indonesian: {
          required: true,
          number: true,
          min: 0,
          max: 100
        },
        english: {
          required: true,
          number: true,
          min: 0,
          max: 100
        },
        science: {
          required: true,
          number: true,
          min: 0,
          max: 100
        },
        social: {
          required: true,
          number: true,
          min: 0,
          max: 100
        }
      },
      messages: {
        math: {
          required: '*Nilai harus diisi.',
          number: '*Nilai harus dalam bentuk angka.',
          min: '*Masukkan minimal 0.',
          max: '*Masukkan maksimal 100.'
        },
        indonesian: {
          required: '*Nilai harus diisi.',
          number: '*Nilai harus dalam bentuk angka.',
          min: '*Masukkan minimal 0.',
          max: '*Masukkan maksimal 100.'
        },
        english: {
          required: '*Nilai harus diisi.',
          number: '*Nilai harus dalam bentuk angka.',
          min: '*Masukkan minimal 0.',
          max: '*Masukkan maksimal 100.'
        },
        science: {
          required: '*Nilai harus diisi.',
          number: '*Nilai harus dalam bentuk angka.',
          min: '*Masukkan minimal 0.',
          max: '*Masukkan maksimal 100.'
        },
        social: {
          required: '*Nilai harus diisi.',
          number: '*Nilai harus dalam bentuk angka.',
          min: '*Masukkan minimal 0.',
          max: '*Masukkan maksimal 100.'
        },
      }
    })
  }

  $.ajax({
    url: '/personal-data/get-student-score/' + semester,
    method: 'get',
    dataType: 'json',
    success: function(scores) {
      $('#math').val(scores.mtk);
      $('#indonesian').val(scores.bid);
      $('#english').val(scores.big);
      $('#science').val(scores.ipa);
      $('#social').val(scores.ips);
    }
  });
});