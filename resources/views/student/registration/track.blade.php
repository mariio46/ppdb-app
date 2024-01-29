@extends('layouts.student.auth')

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')

    <x-breadcrumb title="Pendaftaran">
        <x-breadcrumb-item to="{{ route('student.regis') }}" title="Pendaftaran" />
        <x-breadcrumb-item to="{{ route('student.regis.phase', [$phase, $phase_id]) }}" title="Pendaftaran Tahap {{ $phase }}" />
        <x-breadcrumb-active title="Pendaftaran Jalur {{ $track }}" />
    </x-breadcrumb>

    <div class="content-body">
        <div class="row">
            <div class="col-12">
                @switch($track)
                    @case('AA')
                        @include('student.registration.tracks.sma-affirmation');
                    @break

                    @case('AB')
                        @include('student.registration.tracks.sma-mutation');
                    @break

                    @case('AC')
                        @include('student.registration.tracks.sma-teachers-child');
                    @break

                    @case('AD')
                        @include('student.registration.tracks.sma-academic');
                    @break

                    @case('AE')
                        @include('student.registration.tracks.sma-non-academic');
                    @break

                    @case('AF')
                        @include('student.registration.tracks.sma-zoning');
                    @break

                    @case('AG')
                        @include('student.registration.tracks.sma-boarding-school');
                    @break

                    @case('KA')
                        @include('student.registration.tracks.smk-affirmation');
                    @break

                    @case('KB')
                        @include('student.registration.tracks.smk-mutation');
                    @break

                    @case('KC')
                        @include('student.registration.tracks.smk-teachers-child');
                    @break

                    @case('KD')
                        @include('student.registration.tracks.smk-academic');
                    @break

                    @case('KE')
                        @include('student.registration.tracks.smk-non-academic');
                    @break

                    @case('KF')
                        @include('student.registration.tracks.smk-domicile');
                    @break

                    @case('KG')
                        @include('student.registration.tracks.smk-partners-child');
                    @break

                    @default
                @endswitch
            </div>
        </div>
    </div>
@endsection

@section('vendorScripts')
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
@endsection

@push('scripts')
    <script>
        var track = '{{ $track }}';

        function countBobot(type, level, n) {
            let bobot = 0;
            if (type == "berjenjang" && level == "internasional" && n == 1) {
                bobot = 100;
            } else if (type == "berjenjang" && level == "internasional" && n == 2) {
                bobot = 95;
            } else if (type == "berjenjang" && level == "internasional" && n == 3) {
                bobot = 90;
            } else if (type == "berjenjang" && level == "nasional" && n == 1) {
                bobot = 85;
            } else if (type == "berjenjang" && level == "nasional" && n == 2) {
                bobot = 80;
            } else if (type == "berjenjang" && level == "nasional" && n == 3) {
                bobot = 75;
            } else if (type == "berjenjang" && level == "provinsi" && n == 1) {
                bobot = 70;
            } else if (type == "berjenjang" && level == "provinsi" && n == 2) {
                bobot = 65;
            } else if (type == "berjenjang" && level == "provinsi" && n == 3) {
                bobot = 60;
            } else if (type == "berjenjang" && level == "kabupaten" && n == 1) {
                bobot = 55;
            } else if (type == "berjenjang" && level == "kabupaten" && n == 2) {
                bobot = 50;
            } else if (type == "berjenjang" && level == "kabupaten" && n == 3) {
                bobot = 45;
            } else if (type == "tidak_berjenjang" && level == "internasional" && n == 1) {
                bobot = 85;
            } else if (type == "tidak_berjenjang" && level == "internasional" && n == 2) {
                bobot = 80;
            } else if (type == "tidak_berjenjang" && level == "internasional" && n == 3) {
                bobot = 75;
            } else if (type == "tidak_berjenjang" && level == "nasional" && n == 1) {
                bobot = 70;
            } else if (type == "tidak_berjenjang" && level == "nasional" && n == 2) {
                bobot = 65;
            } else if (type == "tidak_berjenjang" && level == "nasional" && n == 3) {
                bobot = 60;
            } else if (type == "tidak_berjenjang" && level == "provinsi" && n == 1) {
                bobot = 55;
            } else if (type == "tidak_berjenjang" && level == "provinsi" && n == 2) {
                bobot = 50;
            } else if (type == "tidak_berjenjang" && level == "provinsi" && n == 3) {
                bobot = 45;
            } else if (type == "tidak_berjenjang" && level == "kabupaten" && n == 1) {
                bobot = 40;
            } else if (type == "tidak_berjenjang" && level == "kabupaten" && n == 2) {
                bobot = 35;
            } else if (type == "tidak_berjenjang" && level == "kabupaten" && n == 3) {
                bobot = 30;
            } else if (type == "beregu" && level == "internasional" && n == 1) {
                bobot = 70;
            } else if (type == "beregu" && level == "internasional" && n == 2) {
                bobot = 65;
            } else if (type == "beregu" && level == "internasional" && n == 3) {
                bobot = 60;
            } else if (type == "beregu" && level == "nasional" && n == 1) {
                bobot = 55;
            } else if (type == "beregu" && level == "nasional" && n == 2) {
                bobot = 50;
            } else if (type == "beregu" && level == "nasional" && n == 3) {
                bobot = 45;
            } else if (type == "beregu" && level == "provinsi" && n == 1) {
                bobot = 40;
            } else if (type == "beregu" && level == "provinsi" && n == 2) {
                bobot = 35;
            } else if (type == "beregu" && level == "provinsi" && n == 3) {
                bobot = 30;
            } else if (type == "beregu" && level == "kabupaten" && n == 1) {
                bobot = 25;
            } else if (type == "beregu" && level == "kabupaten" && n == 2) {
                bobot = 20;
            } else if (type == "beregu" && level == "kabupaten" && n == 3) {
                bobot = 15;
            }

            return bobot;
        }
    </script>
    @if (substr($track, 0, 1) == 'A')
        {{-- <script src="/js/student/pages/registration/track-base-sma-v1.0.1.js"></script> --}}
        <script>
            $(function() {
                'use strict';

                var select2 = $('.select2'),
                    selectInModal = $('.select-in-modal');

                // content section
                var regisForm = $('#formSchoolRegister'),
                    ct1 = $('#city1'),
                    ct2 = $('#city2'),
                    ct3 = $('#city3'),
                    sch1 = $('#school1'),
                    sch2 = $('#school2'),
                    sch3 = $('#school3');

                // verify section
                var verifyCheckbox = $('#checkVerify'),
                    verifyBtn = $('#btnVerify');

                // modal
                var regisModal = $('#verifySchoolModal'),
                    schVerif = $('#schoolForVerif'),
                    submitBtn = $('#btnSendRegistration');

                // variable pages
                // AA
                var affType = $('#affirmationType'),
                    affNum = $('#affirmationNumber'),
                    affNumSec = $('#affirmationNumberSection'),
                    affTypeShow = $('#affTypeShow'),
                    affTypeNumShowSection = $('#affTypeNumShowSection'),
                    affTypeNumShow = $('#affTypeNumShow');

                // AE
                var achType = $('#achievementType'),
                    achLevel = $('#achievementLevel'),
                    achChamp = $('#achievementChamp'),
                    achName = $('#achievementName');

                /**
                 * --------------------------------------------------
                 * INIT
                 * --------------------------------------------------
                 */
                // select2
                // --------------------------------------------------
                if (select2.length) {
                    select2.each(function() {
                        var $this = $(this);
                        $this.wrap('<div class="position-relative"></div>');
                        $this.select2({
                            dropdownParent: $this.parent(),
                            language: {
                                noResults: function() {
                                    return "Tidak ada data ditemukan.";
                                }
                            },
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
                // --------------------------------------------------------------------
                verifyCheckbox.click(function() {
                    if (verifyCheckbox.is(":checked")) {
                        verifyBtn.removeAttr('disabled');
                    } else {
                        verifyBtn.attr('disabled', true);
                    }
                });

                // load city
                // --------------------------------------------------------------------
                function loadCity(i) {
                    $.ajax({
                        url: '/json/cities/73',
                        method: 'get',
                        dataType: 'json',
                        success: function(cities) {
                            $(`#city${i}`).empty().append('<option value=""></option>');

                            cities.forEach(city => {
                                $(`#city${i}`).append(`<option value="${city.code}">${city.name}</option>`);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Gagal mendapatkan data: ", status, error);
                        }
                    });
                }

                // load school
                // --------------------------------------------------------------------
                function loadSchool(n, cityCode = '0') {
                    $(`#school${n}`).empty().append('<option value="0" selected disabled>memuat...</option>');
                    $.ajax({
                        url: `/schools/by-city/${cityCode}/sma`,
                        method: 'get',
                        dataType: 'json',
                        success: function(schools) {
                            console.log(schools);
                            $(`#school${n}`).empty().append('<option value=""></option>');

                            schools.data.forEach(school => {
                                $(`#school${n}`).append(`<option value="${school.id}">${school.nama_sekolah}</option>`);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Gagal mendapatkan data: ", status, error);
                            $(`#school${n}`).empty().append('<option value=""></option>');
                        }
                    })
                }

                function loadSchoolZone() {
                    $.ajax({
                        url: '/schools/by-zone',
                        method: 'get',
                        dataType: 'json',
                        success: function(schools) {
                            for (let n = 1; n <= 3; n++) {
                                if ($(`#school${n}`).length) {
                                    $(`#school${n}`).empty().append('<option value=""></option>');

                                    schools.forEach(school => {
                                        $(`#school${n}`).append(`<option value="${school.id}">${school.name}</option>`);

                                    });
                                }
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Gagal mendapatkan data: ", status, error);
                        }
                    });
                }

                function loadSchoolBoarding() {
                    $.ajax({
                        url: '/json/schools/boarding-school',
                        method: 'get',
                        dataType: 'json',
                        success: function(schools) {
                            $('#school1').empty().append('<option value=""></option>');

                            schools.data.forEach(school => {
                                $('#school1').append(`<option value="${school.id}">${school.nama_sekolah}</option>`);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Gagal mendapatkan data: ", status, error);
                        }
                    });
                }

                // pembobotan
                if (achType.length && achLevel.length && achChamp.length) {
                    $('#achievementType, #achievementLevel, #achievementChamp').change(function() {
                        let bobot = countBobot(achType.val(), achLevel.val(), achChamp.val());
                        $('#bobotx').text(bobot);
                        $('#achievementWeight').val(bobot);
                    });
                }

                // jQuery validation
                // --------------------------------------------------------------------
                if (regisForm.length) {
                    if (sch2.length && sch3.length) {
                        regisForm.validate({
                            rules: {
                                school1: {
                                    required: true,
                                    uniqueValue: "school2,school3"
                                },
                                school2: {
                                    uniqueValue: "school1,school3"
                                },
                                school3: {
                                    uniqueValue: "school1,school2"
                                }
                            },
                            messages: {
                                school1: {
                                    required: "*Sekolah Pertama harus dipilih.",
                                    uniqueValue: "*Sekolah hanya boleh dipilih sekali."
                                },
                                school2: {
                                    uniqueValue: "*Sekolah hanya boleh dipilih sekali."
                                },
                                school3: {
                                    uniqueValue: "*Sekolah hanya boleh dipilih sekali."
                                }
                            }
                        });
                    } else {
                        regisForm.validate({
                            rules: {
                                school1: {
                                    required: true,
                                },
                            },
                            messages: {
                                school1: {
                                    required: "*Sekolah harus dipilih.",
                                }
                            }
                        });
                    }
                }

                if (schVerif.length) {
                    schVerif.rules("add", {
                        required: true,
                        messages: {
                            required: "*Pilih sekolah tempat verifikasi kamu."
                        }
                    });
                }

                $.validator.addMethod("uniqueValue", function(value, element, params) {
                    var otherInputs = params.split(",");

                    for (var i = 0; i < otherInputs.length; i++) {
                        var otherInputValue = $(`#${otherInputs[i]}`).val();

                        // Abaikan nilai null dan string kosong
                        if (value !== null && value !== "" && otherInputValue !== null && otherInputValue !== "" && value === otherInputValue) {
                            return false;
                        }
                    }

                    return true;
                }, "Nilai harus unik.");

                // verifying
                // --------------------------------------------------------------------
                verifyBtn.click(function() {
                    if (regisForm.valid()) {
                        // call in specific page
                        if (track == 'AA') {
                            additionalFunctionVerifyAA();
                        } else if (track == 'AE') {
                            additionalFunctionVerifyAE();
                        }

                        if (sch2.length && sch3.length) { // form can choose multiple school
                            schVerif.empty().append('<option value=""></option>')
                            for (let i = 1; i <= 3; i++) {
                                let school = $('#school' + i);
                                let schoolCode = school.val();
                                let schoolName = school.children(':selected').text();

                                $(`#school${i}Show`).text(schoolName);
                                if (schoolCode) {
                                    schVerif.append(`<option value="${schoolCode}">${schoolName}</option>`);
                                }
                            }
                        } else { // form only choose one school
                            let schoolName = $('#school1').children(":selected").text();
                            $('#school1Show').text(schoolName);
                        }

                        regisModal.modal('show');
                    }
                });

                // submitting
                // --------------------------------------------------------------------
                submitBtn.click(function() {
                    // if select in modal exist, that means there is multiple school in form
                    if (schVerif.length) {
                        if (schVerif.valid()) { // select in modal required
                            for (let i = 1; i <= 3; i++) {
                                if ($(`#city${i}`).length) {
                                    let cityName = $(`#city${i}`).children(':selected').text();
                                    $(`#city${i}Name`).val(cityName);
                                }

                                let schoolName = $(`#school${i}`).children(':selected').text();

                                $(`#school${i}Name`).val(schoolName);
                            }

                            $('#schoolVerif').val(schVerif.val());
                            $('#schoolVerifName').val(schVerif.children(':selected').text());

                            regisForm.submit();
                        }
                    } else {
                        if (ct1.length) $('#city1Name').val(ct1.children(":selected").text());
                        $('#school1Name').val(sch1.children(":selected").text());

                        regisForm.submit();
                    }
                });

                /**
                 * --------------------------------------------------
                 * PAGES
                 * --------------------------------------------------
                 */
                if (track === 'AA') {
                    // affirmation type change
                    // --------------------------------------------------------------------
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

                    // load cities and schools
                    // --------------------------------------------------------------------
                    for (let i = 1; i <= 3; i++) {
                        loadCity(i);

                        $('#city' + i).change(function() {
                            loadSchool(i, $(this).val());
                        });
                    }

                    // validation for sma affirmation
                    // --------------------------------------------------------------------
                    affType.rules("add", {
                        required: true,
                        messages: {
                            required: "*Pilih salah satu."
                        }
                    });
                    affNum.rules("add", {
                        requiredIfPkh: 'affirmationType',
                        messages: {
                            requiredIfPkh: "*Harus diisi."
                        }
                    });
                    $.validator.addMethod("requiredIfPkh", function(value, element, params) {
                        var sourceValue = $("#" + params).val();

                        // Jika input sumber memiliki nilai tertentu, maka target harus diisi
                        return sourceValue !== "pkh" || value !== "";
                    }, "Target harus diisi.");

                } else if (track === 'AB') {
                    // load cities and schools
                    loadCity(1);

                    ct1.change(function() {
                        for (let i = 1; i <= 3; i++) {
                            loadSchool(i, $(this).val());
                        }
                    });
                } else if (track === 'AC') {
                    loadCity(1);

                    if (ct1.length) {
                        ct1.change(function() {
                            loadSchool(1, $(this).val());
                        });
                    }
                } else if (track === 'AD') {
                    for (let i = 1; i <= 3; i++) {
                        loadCity(i);

                        $('#city' + i).change(function() {
                            loadSchool(i, $(this).val());
                        });
                    }
                } else if (track === 'AE') {
                    for (let i = 1; i <= 3; i++) {
                        loadCity(i);

                        $('#city' + i).change(function() {
                            loadSchool(i, $(this).val());
                        });
                    }

                    // add rules
                    // --------------------------------------------------------------------
                    achType.rules("add", {
                        required: true,
                        messages: {
                            required: "*Pilih salah satu."
                        }
                    });
                    achLevel.rules("add", {
                        required: true,
                        messages: {
                            required: "*Pilih salah satu."
                        }
                    });
                    achChamp.rules("add", {
                        required: true,
                        messages: {
                            required: "*Pilih salah satu."
                        }
                    });
                    achName.rules("add", {
                        required: true,
                        messages: {
                            required: "*Harus diisi."
                        }
                    });
                } else if (track === 'AF') {
                    loadSchoolZone();
                } else if (track === 'AG') {
                    loadSchoolBoarding();
                }

                // additional verifying data
                // --------------------------------------------------------------------
                function additionalFunctionVerifyAA() {
                    affTypeShow.text(affType.children(':selected').text());
                    if (affType.val() == 'pkh') {
                        affTypeNumShow.text(affNum.val())
                        affTypeNumShowSection.show();
                    } else {
                        affTypeNumShow.text('');
                        affTypeNumShowSection.hide();
                    }
                }

                function additionalFunctionVerifyAE() {
                    let type = achType.children(':selected').text();
                    let level = achLevel.children(':selected').text();
                    let champ = achChamp.val();
                    let name = achName.val();

                    $('#achTypeShow').text(type);
                    $('#achChampShow').text(champ + ' ' + level);
                    $('#achNameShow').text(name);
                }
            });
        </script>
    @else
        {{-- <script src="/js/student/pages/registration/track-base-smk-v1.0.1.js"></script> --}}
        <script>
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
                    $(`#city1, #city2, #city3`).empty().append('<option value="#" selected disabled>memuat..</option>');
                    $.ajax({
                        url: '/json/cities/73',
                        method: 'get',
                        dataType: 'json',
                        success: function(cities) {
                            console.log(cities);
                            for (let i = 1; i <= 3; i++) {
                                $(`#city${i}`).empty().append('<option value=""></option>');
                                if ($(`#city${i}`).length) {
                                    cities.forEach(city => {
                                        $(`#city${i}`).append(`<option value="${city.code}">${city.name}</option>`);
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
                    $(`#school${i}`).empty().append('<option value="#" selected disabled>memuat..</option>');
                    $.ajax({
                        url: `/schools/by-city/${cityCode}/smk`,
                        method: 'get',
                        dataType: 'json',
                        success: function(schools) {
                            $(`#school${i}`).empty().append('<option value=""></option>');

                            if (schools.data) {
                                schools.data.forEach(sch => {
                                    $(`#school${i}`).append(`<option value="${sch.id}">${sch.nama_sekolah}</option>`);
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Gagal mendapatkan data: ', status, error);
                        }
                    });
                }

                // load departments
                function loadDepartment(i, schoolCode = '0') {
                    $(`#department${i}`).empty().append('<option value="#" selected disabled>memuat..</option>');
                    $.ajax({
                        url: `/schools/department/${schoolCode}`,
                        method: 'get',
                        dataType: 'json',
                        success: function(depts) {
                            console.log(depts);
                            $(`#department${i}`).empty().append('<option value=""></option>');

                            if (depts.data) {
                                depts.data.forEach(dept => {
                                    $(`#department${i}`).append(`<option value="${dept.id}">${dept.nama_jurusan}</option>`);
                                });
                            }
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
        </script>
    @endif
@endpush
