// Tick A
$(document).ready(function () {

    handleStatusChanged();

});

function handleStatusChanged() {
    $('#toggleElement_A').on('change', function () {
        toggleStatus_A();
    });
}

function toggleStatus_A() {
    if ($('#toggleElement_A').is(':checked')) {
        $('#elementsToOperateOn_A :input').removeAttr('disabled');
    } else {
        $('#elementsToOperateOn_A :input').attr('disabled', true);
    }
}

// Tick B
$(document).ready(function () {

    handleStatusChanged();

});

function handleStatusChanged() {
    $('#toggleElement_B').on('change', function () {
        toggleStatus_B();
    });
}

function toggleStatus_B() {
    if ($('#toggleElement_B').is(':checked')) {
        $('#elementsToOperateOn_B :input').removeAttr('disabled');
    } else {
        $('#elementsToOperateOn_B :input').attr('disabled', true);
    }
}


// Tick C
$(document).ready(function () {

    handleStatusChanged();

});

function handleStatusChanged() {
    $('#toggleElement_C').on('change', function () {
        toggleStatus_C();
    });
}

function toggleStatus_C() {
    if ($('#toggleElement_C').is(':checked')) {
        $('#elementsToOperateOn_C :input').removeAttr('disabled');
    } else {
        $('#elementsToOperateOn_C :input').attr('disabled', true);
    }
}


// Tick D
$(document).ready(function () {

    handleStatusChanged();

});

function handleStatusChanged() {
    $('#toggleElement_D').on('change', function () {
        toggleStatus_D();
    });
}

function toggleStatus_D() {
    if ($('#toggleElement_D').is(':checked')) {
        $('#elementsToOperateOn_D :input').removeAttr('disabled');
    } else {
        $('#elementsToOperateOn_D :input').attr('disabled', true);
    }
}


// Tick E
$(document).ready(function () {

    handleStatusChanged();

});

function handleStatusChanged() {
    $('#toggleElement_E').on('change', function () {
        toggleStatus_E();
    });
}

function toggleStatus_E() {
    if ($('#toggleElement_E').is(':checked')) {
        $('#elementsToOperateOn_E :input').removeAttr('disabled');
    } else {
        $('#elementsToOperateOn_E :input').attr('disabled', true);
    }
}


// Tick F
$(document).ready(function () {

    handleStatusChanged();

});

function handleStatusChanged() {
    $('#toggleElement_F').on('change', function () {
        toggleStatus_F();
    });
}

function toggleStatus_F() {
    if ($('#toggleElement_F').is(':checked')) {
        $('#elementsToOperateOn_F :input').removeAttr('disabled');
    } else {
        $('#elementsToOperateOn_F :input').attr('disabled', true);
    }
}

// ********** Disable input when selected daily ********** //

// Q1 
$('select[name=BF_1]').change(function () {
    $('input[name=BF_1_OTH]').attr('disabled', $(this).val() == '1');
});

$('select[name=LU_1]').change(function () {
    $('input[name=LU_1_OTH]').attr('disabled', $(this).val() == '1');
});
$('select[name=SU_1]').change(function () {
    $('input[name=SU_1_OTH]').attr('disabled', $(this).val() == '1');
});

// Q2
$('select[name=BF_2]').change(function () {
    $('input[name=BF_2_OTH]').attr('disabled', $(this).val() == '1');
});

$('select[name=LU_2]').change(function () {
    $('input[name=LU_2_OTH]').attr('disabled', $(this).val() == '1');
});
$('select[name=SU_2]').change(function () {
    $('input[name=SU_2_OTH]').attr('disabled', $(this).val() == '1');
});

// Q4
$('select[name=BF_4]').change(function () {
    $('input[name=BF_4_OTH]').attr('disabled', $(this).val() == '1');
});

$('select[name=LU_4]').change(function () {
    $('input[name=LU_4_OTH]').attr('disabled', $(this).val() == '1');
});
$('select[name=SU_4]').change(function () {
    $('input[name=SU_4_OTH]').attr('disabled', $(this).val() == '1');
});


// Q6
$('select[name=BF_6]').change(function () {
    $('input[name=BF_6_OTH]').attr('disabled', $(this).val() == '1');
});

$('select[name=LU_6]').change(function () {
    $('input[name=LU_6_OTH]').attr('disabled', $(this).val() == '1');
});
$('select[name=SU_6]').change(function () {
    $('input[name=SU_6_OTH]').attr('disabled', $(this).val() == '1');
});

// Q7
$('select[name=BF_7]').change(function () {
    $('input[name=BF_7_OTH]').attr('disabled', $(this).val() != '4');
});

$('select[name=LU_7]').change(function () {
    $('input[name=LU_7_OTH]').attr('disabled', $(this).val() != '4');
});
$('select[name=SU_7]').change(function () {
    $('input[name=SU_7_OTH]').attr('disabled', $(this).val() != '4');
});


// Q9
$('select[name=BF_9]').change(function () {
    $('input[name=BF_9_OTH]').attr('disabled', $(this).val() == '1');
});

$('select[name=LU_9]').change(function () {
    $('input[name=LU_9_OTH]').attr('disabled', $(this).val() == '1');
});
$('select[name=SU_9]').change(function () {
    $('input[name=SU_9_OTH]').attr('disabled', $(this).val() == '1');
});

// Q11
$('select[name=BF_11]').change(function () {
    $('input[name=BF_11_OTH]').attr('disabled', $(this).val() == '1');
});

$('select[name=LU_11]').change(function () {
    $('input[name=LU_11_OTH]').attr('disabled', $(this).val() == '1');
});
$('select[name=SU_11]').change(function () {
    $('input[name=SU_11_OTH]').attr('disabled', $(this).val() == '1');
});

// Q12
$('select[name=BF_12]').change(function () {
    $('input[name=BF_12_OTH]').attr('disabled', $(this).val() != '4');
});

$('select[name=LU_12]').change(function () {
    $('input[name=LU_12_OTH]').attr('disabled', $(this).val() != '4');
});
$('select[name=SU_12]').change(function () {
    $('input[name=SU_12_OTH]').attr('disabled', $(this).val() != '4');
});
