$(function() {
  'use strict';

  // --------------------------------------------------
  // VAR
  // common
  var select2 = $(".select2"),
    selectInModal = $('.select-in-modal');

  // content
  var regisForm = $('#formSchoolRegister'),
    verifyCheckbox = $('#checkVerify'),
    verifyButton = $('#btnVerify');

  // modal
  var regisModal = $('#verifySchoolModal'),
    schoolVerifSelect = $('#schoolForVerif'),
    submitButton = $('#btnSendRegistration');

  // page
  // KA
  var affType = $('#affirmationType'),
    affNum = $('#affirmationNumber'),
    affNumSec = $('#affirmationNumberSection'),
    affTypeShow = $('#affTypeShow'),
    affNumShow = $('#affNumShow'),
    affNumSecShow = $('#affShow');
  // KE
  var achType = $('#achievementType'),
    achLevel = $('#achievementLevel'),
    achChamp = $('#achievementChamp'),
    achName = $('#achievementName'),
    achTypeShow = $('#achTypeShow'),
    achLevelShow = $('#achLevelShow'),
    achChampShow = $('#achChampShow'),
    achNameShow = $('#achNameShow');

  // --------------------------------------------------
  // INIT
  // select2
  if (select2.length) {
    select2.each(function() {
      var $this = $(this);
      $this.wrap('<div class="position-relative"></div>');
      $this.select2({
        dropdownParent: $this.parent()
      });
    });
  }

  if (selectInModal.length) {
    regisModal.on('shown.bs.modal', function() {
      selectInModal.select2({
        minimumResultsForSearch: -1
      });
    });
  }

  // checkbox verify
  if (verifyCheckbox.length) {
    verifyCheckbox.click(function() {
      if (verifyCheckbox.is(":checked")) {
        verifyButton.removeAttr('disabled');
      } else {
        verifyButton.attr('disabled', true);
      }
    });
  }

  // jQuery Validations
  if (regisForm.length) {
    regisForm.validate({
      rules: {
        school1: {
          required: true,
        },
        department1: {
          required: true,
          uniqueValue: "department2,department3"
        },
        department2: {
          uniqueValue: "department1,department3"
        },
        department3: {
          uniqueValue: "department1,department2"
        }
      },
      messages: {
        school1: {
          required: "*Pilih salah satu sekolah.",
        },
        department1: {
          required: "*Pilih salah satu jurusan.",
          uniqueValue: "*Tidak boleh memilih jurusan yang sama lebih dari sekali."
        },
        department2: {
          uniqueValue: "*Tidak boleh memilih jurusan yang sama lebih dari sekali."
        },
        department3: {
          uniqueValue: "*Tidak boleh memilih jurusan yang sama lebih dari sekali."
        }
      }
    });

    $.validator.addMethod("uniqueValue", function(value, element, params) {
      var otherInputs = params.split(",");
  
      for (var i = 0; i < otherInputs.length; i++) {
        var otherInputValue = $("#" + otherInputs[i]).val();
  
        // Abaikan nilai null dan string kosong
        if (value !== null && value !== "" && otherInputValue !== null && otherInputValue !== "" && value === otherInputValue) {
          return false;
        }
      }
  
      return true;
    }, "Nilai harus unik.");
  }

  if (schoolVerifSelect.length) {
    schoolVerifSelect.rules("add", {
      required: true,
      messages: {
        required: "*Pilih sekolah tempat verifikasi kamu."
      }
    });
  }

  // verifying
  if (verifyButton.length) {
    verifyButton.click(function() {
      if (regisForm.valid()) {
        if (track === 'KA') {
          additionalFunctionVerifyKA();
        } else if (track === 'KE') {
          additionalFunctionVerifyKE();
        }

        schoolVerifSelect.empty().append('<option value=""></option>');

        for (let i = 1; i <= 3; i++) {
          if (schoolVerifSelect.length) {
            let sch = $('#school' + i);
            let schCode = sch.val();
            let schName = sch.children(':selected').text();
            let depName = $('#department' + i).children(':selected').text();

            $(`#school${i}Show`).text(schName);
            $(`#department${i}Show`).text(depName);

            if (!schoolVerifSelect.find("option[value='" + schCode + "']").length) {
              schoolVerifSelect.append('<option value="' + schCode + '">' + schName + '</option>');
            }
          } else {
            let schName = $('#school1').children(":selected").text();
            let depName = $('#department' + i).children(":selected").text();

            if (depName) {
              $(`#school${i}Show`).text(schName);
            }
            $(`#department${i}Show`).text(depName);
          }
        }

        regisModal.modal('show');
      }
    });
  }

  // submitting
  if (submitButton.length) {
    submitButton.click(function() {
      if (schoolVerifSelect.length) {
        if(schoolVerifSelect.valid()) {
          for (let i = 1; i <= 3; i++) {
            if ($('#city' + i).length) {
              let cityName = $('#city' + i).children(':selected').text();
              $(`#city${i}Name`).val(cityName);
            }

            if ($('#school' + i).length) {
              let schoolName = $('#school' + i).children(':selected').text();
              $(`#school${i}Name`).val(schoolName);
            }

            let deptName = $('#department' + i).children(':selected').text();
            $(`#department${i}Name`).val(deptName);
          }

          let verifCode = schoolVerifSelect.val();
          let verifName = schoolVerifSelect.children(":selected").text();
          $('#schoolVerif').val(verifCode);
          $('#schoolVerifName').val(verifName);

          regisForm.submit();
        }
      } else {
        for (let i = 1; i <= 3; i++) {
          if ($('#school' + i).length) {
            let schoolName = $('#school' + i).children(':selected').text();
            $(`#school${i}Name`).val(schoolName);
          }

          let deptName = $('#department' + i).children(':selected').text();
            $(`#department${i}Name`).val(deptName);
        }

        regisForm.submit();
      }
    });
  }

  // --------------------------------------------------
  // FUNC
  // load cities
  function loadCity() {
    $.ajax({
      url: '/cities/73',
      method: 'get',
      dataType: 'json',
      success: function(cities) {
        for (let i = 1; i <= 3; i++) {
          if ($('#city' + i).length) {
            $('#city' + i).empty().append('<option value=""></option>');

            cities.forEach(city => {
              $('#city' + i).append('<option value="' + city.code + '">' + city.name + '</option>');
            });
          }
        }
      },
      error: function(xhr, status, error) {
        console.error("Gagal mendapatkan data: ", status, error);
      }
    });
  }

  // load schools
  function loadSchool(i, cityCode = 0) {
    $.ajax({
      url: '/schools/by-city/' + cityCode + '/smk',
      method: 'get',
      dataType: 'json',
      success: function(schools) {
        $('#school' + i).empty().append('<option value=""></option>');

        schools.forEach(sch => {
          $('#school' + i).append('<option value="' + sch.id + '">' + sch.name + '</option>');
        });
      },
      error: function(xhr, status, error) {
        console.error('Gagal mendapatkan data: ', status, error);
      }
    });
  }

  // load departments
  function loadDepartment(i, schoolCode = '0') {
    $.ajax({
      url: '/schools/department/' + schoolCode,
      method: 'get',
      dataType: 'json',
      success: function(depts) {
        $('#department' + i).empty().append('<option value=""></option>');

        depts.forEach(dept => {
          $('#department' + i).append('<option value="' + dept.id + '">' + dept.name + '</option>');
        });
      },
      error: function(xhr, status, error) {
        console.error('Gagal mendapatkan data: ', status, error);
      }
    });
  }

  // --------------------------------------------------
  // PAGE
  if (track == 'KA') { // ka => affirmation
    // affirmation section
    if (affType.length && affNum.length && affNumSec.length) {
      affType.change(function() {
        if ($(this).val() == 'pkh') {
          affNumSec.show();
        } else {
          affNumSec.hide();
          affNum.val('');
        }
      });
    }

    // load city, school and department
    loadCity();

    for (let i = 1; i <= 3; i++) {
      $('#city' + i).change(function() {
        loadSchool(i, $(this).val());
        $('#department' + i).empty().append('<option value=""></option>');
      });

      $('#school' + i).change(function() {
        loadDepartment(i, $(this).val());
      });
    }

    // additional rules
    if (affType.length) {
      affType.rules("add", {
        required: true,
        messages: {
          required: "*Pilih Jenis Afirmasi kamu."
        }
      });
    }
    if (affNum.length) {
      affNum.rules("add", {
        requiredIfPkh: "affirmationType",
        messages: {
          requiredIfPkh: "*Nomor PKH harus diisi."
        }
      });
    }
    $.validator.addMethod("requiredIfPkh", function(value, element, params) {
      var sourceValue = $("#" + params).val();

      // Jika input sumber memiliki nilai tertentu, maka target harus diisi
      return sourceValue !== "pkh" || value !== "";
    }, "Target harus diisi.");
  } else if (track == 'KB') { // kb => mutation
    loadCity();

    for (let i = 1; i <= 3; i++) {
      $('#city1').change(function() {
        loadSchool(i, $(this).val());
      });

      $('#school' + i).change(function() {
        loadDepartment(i, $(this).val());
      });
    }
  } else if (track == 'KC' || track == 'KG') { // kc => teacher's child || kg => partner's child
    loadCity();

    $('#city1').change(function() {
      loadSchool(1, $(this).val());
      $('#department1, #department2, #department3').empty().append('<option value=""></option>');
    });

    for (let i = 1; i <= 3; i++) {
      $('#school1').change(function() {
        loadDepartment(i, $(this).val());
      });
    }
  } else if (track == 'KD') { // kd => academic
    // load cities, schools and departments
    loadCity();

    for (let i = 1; i <= 3; i++) {
      $('#city' + i).change(function() {
        loadSchool(i, $(this).val());
        $('#department' + i).empty().append('<option value=""></option>');
      });

      $('#school' + i).change(function() {
        loadDepartment(i, $(this).val());
      });
    }
  } else if (track == 'KE') { // ke => non academic
    // additional rules
    if (achType.length) {
      achType.rules("add", {
        required: true,
        messages: {
          required: "*Pilih salah satu."
        }
      });
    }
    if (achLevel.length) {
      achLevel.rules("add", {
        required: true,
        messages: {
          required: "*Pilih salah satu"
        }
      });
    }
    if (achChamp.length) {
      achChamp.rules("add", {
        required: true,
        messages: {
          required: "*Pilih salah satu."
        }
      });
    }
    if (achName.length) {
      achName.rules("add", {
        required: true,
        messages: {
          required: "*Pilih salah satu."
        }
      });
    }

    // load cities, schools and departments
    loadCity();
    for (let i = 1; i <= 3; i++) {
      $('#city' + i).change(function() {
        loadSchool(i, $(this).val());
        $('#department' + i).empty().append('<option value=""></option>');
      });

      $('#school' + i).change(function() {
        loadDepartment(i, $(this).val());
      });
    }
  } else if (track == 'KF') { // kf => domicile
    // load cities, schools and departments
    loadCity();

    for (let i = 1; i <= 3; i++) {
      $('#city' + i).change(function() {
        loadSchool(i, $(this).val());
        $('#department' + i).empty().append('<option value=""></option>');
      });

      $('#school' + i).change(function() {
        loadDepartment(i, $(this).val());
      });
    }
  }

  // --------------------------------------------------
  // ADD FUNC
  function additionalFunctionVerifyKA() { // ka
    let a = affType.children(':selected').text();
    let b = affNum.val();

    affTypeShow.text(a);

    if (affType.val() == 'pkh') {
      affNumSecShow.show();
      affNumShow.text(b);
    } else {
      affNumSecShow.hide();
      affNumShow.text('');
    }
  }

  function additionalFunctionVerifyKE() { // ke
    let kea = achType.children(":selected").text();
    let keb = achLevel.children(":selected").text();
    let kec = achChamp.val();
    let ked = achName.val();

    achTypeShow.text(kea);
    achLevelShow.text(keb);
    achChampShow.text(kec);
    achNameShow.text(ked);
  }
});