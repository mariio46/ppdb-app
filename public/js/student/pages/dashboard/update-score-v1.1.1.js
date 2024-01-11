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
      let score = scores.data;
      let sm = "sm" + semester + "_";

      $('#math').val(score[sm + 'mtk']);
      $('#indonesian').val(score[sm + 'bid']);
      $('#english').val(score[sm + 'big']);
      $('#science').val(score[sm + 'ipa']);
      $('#social').val(score[sm + 'ips']);
    }
  });
});