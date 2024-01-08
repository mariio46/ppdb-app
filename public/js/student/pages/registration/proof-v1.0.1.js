$(function() {
  'use strict';

  var schoolType = $('#schoolType'),
    chosenTrack = $('#chosenTrack'),
    addDataSect = $('#additionalDataSect'),
    chosenSchoolSect = $('#chosenSchoolSect'),
    schoolVerif = $('#schoolVerif'),
    endVerif = $('#endVerif'),
    tracks = {
      'AA': 'Afirmasi',
      'AB': 'Perpindahan Tugas Orang Tua',
      'AC': 'Anak Guru',
      'AD': 'Prestasi Akademik',
      'AE': 'Prestasi Non Akademik',
      'AF': 'Zonasi',
      'AG': 'Boarding School',
      'KA': 'Afirmasi',
      'KB': 'Perpindahan Tugas Orang Tua',
      'KC': 'Anak Guru',
      'KD': 'Prestasi Akademik',
      'KE': 'Prestasi Non Akademik',
      'KF': 'Domisili Terdekat',
      'KG': 'Anak DUDI',
    },
    months = [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember"
    ];

  $.ajax({
    url: '/registration/get-data/' + phase,
    method: 'get',
    dataType: 'json',
    success: function(data) {
      let t = data.track;
      let j = t.charAt(0);
      let d = new Date(data.end_verif);

      schoolType.text(j === 'A' ? 'SMA' : 'SMK');
      chosenTrack.text(tracks[t]);

      if (t == 'AA' || t == 'KA') { // if the track is sma or smk affirmation
        let a = [{"label" : "Jenis Afirmasi", "value" : data.affirmation_type}];

        if (data.affirmation_type == 'pkh') {
          a.push({"label" : "Nomor PKH", "value" : data.affirmation_number});
        }

        addDataSect.append(addDataHtml(a));
      }

      if (t == 'AE' || t == 'KE') {
        let a = [
          {"label" : "Jenis Prestasi", "value" : data.achievement_type},
          {"label" : "Tingkatan Prestasi", "value" : data.achievement_level},
          {"label" : "Juara", "value" : data.achievement_champ},
          {"label" : "Nama Prestasi", "value" : data.achievement_name}
        ];

        addDataSect.append(addDataHtml(a));
      }

      chosenSchoolSect.html('');
      if (j == 'A') { // if the type of school is high school (SMA)
        if (t == 'AC' || t == 'AG') { // if the track is teacher's child or boarding school
          chosenSchoolSect.append(chosenSchoolHtml(data.school1));
        } else {
          chosenSchoolSect.append(chosenSchoolHtml(data.school1, '1'));
          chosenSchoolSect.append(chosenSchoolHtml(data.school2, '2'));
          chosenSchoolSect.append(chosenSchoolHtml(data.school3, '3'));
        }
      } else if (j == 'K') { // if the type of school is vocational school (SMK)
        chosenSchoolSect.append(chosenSchoolHtml(data.school1, '1', 'y', data.department1));
        chosenSchoolSect.append(chosenSchoolHtml(data.school2, '2', 'y', data.department2));
        chosenSchoolSect.append(chosenSchoolHtml(data.school3, '3', 'y', data.department3));
      }

      schoolVerif.text(data.school_verif);
      endVerif.text(d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear());
    },
    error: function(xhr, status, error) {
      console.error('Failed to get data.', status, error);
    }
  });

  function addDataHtml(arrayData) {
    let data = '';
    arrayData.forEach(d => {
      data +=  `
      <div class="col-md-6 col-12">
        <div class="d-flex align-items-center mb-1">
          <div style="width: 35%;">${d.label}</div>
          <div class="mx-1">:</div>
          <div style="width: 60%;">${d.value}</div>
        </div>
      </div>`;
    });

    return `
    <div class="card-body border-top">
      <h5 class="mb-2">Data Penunjang</h5>
      <div class="row">
        ${data}
      </div>
    </div>
    `;
  }

  function chosenSchoolHtml(schoolName, n = '', withDept = 'n', deptName = '') {
    let dept = (withDept == 'y') ?
      `<div class="d-flex align-items-center mb-2">
        <div style="width: 35%;">Jurusan</div>
        <div class="mx-1">:</div>
        <div style="width: 60%;">${deptName}</div>
      </div>` : '';

    return `
    <h5 class="text-warning">Pilihan ${n}</h5>

    <div class="d-flex align-items-center mb-1">
      <div style="width: 35%;">Sekolah Pilihan</div>
      <div class="mx-1">:</div>
      <div style="width: 60%;">${schoolName}</div>
    </div>
    
    ${dept}`;
  }
});