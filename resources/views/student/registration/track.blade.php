@extends('layouts.student.auth')

@section('vendorStyles')
    <link type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css" rel="stylesheet">
    <link type="text/css" href="/app-assets/css/plugins/forms/form-validation.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Pendaftaran</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb breadcrumb-slash">
                            <li class="breadcrumb-item">
                                <a href="{{ route('student.regis') }}">Pendaftaran</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('student.regis.phase', [$phase, $phase_id]) }}">Pendaftaran Tahap {{ $phase }}</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Pendaftaran Jalur {{ $track }}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        url: '/schools/boarding-school',
                        method: 'get',
                        dataType: 'json',
                        success: function(schools) {
                            $('#school1').empty().append('<option value=""></option>');

                            schools.forEach(school => {
                                $('#school1').append(`<option value="${school.id}">${school.name}</option>`);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error("Gagal mendapatkan data: ", status, error);
                        }
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
        <script src="/js/student/pages/registration/track-base-smk-v1.0.1.js"></script>
    @endif
@endpush
