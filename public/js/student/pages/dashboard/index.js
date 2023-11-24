$(document).ready(function() {
  // get data
  $.ajax({
    url: "/get-data-pribadi-siswa",
    method: 'get',
    dataType: 'json',
    success: function(data) {
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
      $('#selfRtRw').text(data.rt + ' / ' + data.rw);
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