var options = "";
$("#LINENO").change(function() {
    var value = $(this).val();

    if (value.length < 2) {
        options = "<h4>Line number must be 2 characters long</h4>";
        $("#message")
            .html(options)
            .css("color", "#ff4a4a");
    } else {
        $("#message")
            .find("h4")
            .remove();
    }
});

$("#CMC").change(function() {
    if ($("#RCC").val() == 1 || $("#RCC").val() == 2 || $("#RCC").val() == 5) {
        if ($("#CMC").val() != 6) {
            $("#CMC").attr("style", "background-color:#ff5c5c; color:#ffffff;");
        } else {
            $("#CMC").removeAttr("style");
        }
    } else if ($("#RCC").val() == 3 || $("#RCC").val() == 6) {
        if (
            $("#CMC").val() == 1 ||
            $("#CMC").val() == 2 ||
            $("#CMC").val() == 3 ||
            $("#CMC").val() == 4
        ) {
            $("#CMC").removeAttr("style");
        } else {
            $("#CMC").attr("style", "background-color:#ff5c5c; color:#ffffff;");
        }
    } else if ($("#RCC").val() == 4) {
        if (
            $("#CMC").val() == 1 ||
            $("#CMC").val() == 2 ||
            $("#CMC").val() == 3 ||
            $("#CMC").val() == 4 ||
            $("#CMC").val() == 5
        ) {
            $("#CMC").removeAttr("style");
        } else {
            $("#CMC").attr("style", "background-color:#ff5c5c; color:#ffffff;");
        }
    }
});

$("#SRCCODE").change(function() {
    if ($("#SUPCODE").val() == 1) {
        if (
            $("#SRCCODE").val() == 1 ||
            $("#SRCCODE").val() == 2 ||
            $("#SRCCODE").val() == 3 ||
            $("#SRCCODE").val() == 4 ||
            $("#SRCCODE").val() == 5 ||
            $("#SRCCODE").val() == 6 ||
            $("#SRCCODE").val() == 7 ||
            $("#SRCCODE").val() == 8 ||
            $("#SRCCODE").val() == 9 ||
            $("#SRCCODE").val() == 10 ||
            $("#SRCCODE").val() == 11 ||
            $("#SRCCODE").val() == 14 ||
            $("#SRCCODE").val() == 15 ||
            $("#SRCCODE").val() == 18 ||
            $("#SRCCODE").val() == 19
        ) {
            $("#SRCCODE").removeAttr("style");
        } else {
            $("#SRCCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#SUPCODE").val() == 2) {
        if ($("#SRCCODE").val() == 14 || $("#SRCCODE").val() == 15) {
            $("#SRCCODE").removeAttr("style");
        } else {
            $("#SRCCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#SUPCODE").val() == 3) {
        if (
            $("#SRCCODE").val() == 1 ||
            $("#SRCCODE").val() == 2 ||
            $("#SRCCODE").val() == 3 ||
            $("#SRCCODE").val() == 4 ||
            $("#SRCCODE").val() == 5 ||
            $("#SRCCODE").val() == 6 ||
            $("#SRCCODE").val() == 7 ||
            $("#SRCCODE").val() == 8 ||
            $("#SRCCODE").val() == 9 ||
            $("#SRCCODE").val() == 10 ||
            $("#SRCCODE").val() == 11 ||
            $("#SRCCODE").val() == 12 ||
            $("#SRCCODE").val() == 13 ||
            $("#SRCCODE").val() == 14 ||
            $("#SRCCODE").val() == 15 ||
            $("#SRCCODE").val() == 18 ||
            $("#SRCCODE").val() == 19
        ) {
            $("#SRCCODE").removeAttr("style");
        } else {
            $("#SRCCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#SUPCODE").val() == 4) {
        if (
            $("#SRCCODE").val() == 2 ||
            $("#SRCCODE").val() == 12 ||
            $("#SRCCODE").val() == 14 ||
            $("#SRCCODE").val() == 15
        ) {
            $("#SRCCODE").removeAttr("style");
        } else {
            $("#SRCCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#SUPCODE").val() == 9) {
        if ($("#SRCCODE").val() == 16 || $("#SRCCODE").val() == 17) {
            $("#SRCCODE").removeAttr("style");
        } else {
            $("#SRCCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    }
});

$("#FOODCODE").change(function() {
    if ($("#FOODCODE").val() == "W001 - Water") {
        if (
            $("#RFCODE").val() == 4 ||
            $("#RFCODE").val() == 5 ||
            $("#RFCODE").val() == 6 ||
            $("#RFCODE").val() == 8
        ) {
            $("#RFCODE").removeAttr("style");
        } else {
            $("#RFCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if (
        $("#FOODCODE").val() == "W002 - Water" ||
        $("#FOODCODE").val() == "W003 - Water" ||
        $("#FOODCODE").val() == "W004 - Water" ||
        $("#FOODCODE").val() == "W005 - Water"
    ) {
        if ($("#RFCODE").val() == 8) {
            $("#RFCODE").removeAttr("style");
        } else {
            $("#RFCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#FOODCODE").val() != "W001 - Water") {
        if (
            $("#RFCODE").val() == 4 ||
            $("#RFCODE").val() == 5 ||
            $("#RFCODE").val() == 6 ||
            $("#RFCODE").val() == 8
        ) {
            $("#RFCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        } else {
            $("#RFCODE").removeAttr("style");
        }
    } else if (
        $("#FOODCODE").val() != "W002 - Water" ||
        $("#FOODCODE").val() != "W003 - Water" ||
        $("#FOODCODE").val() != "W004 - Water" ||
        $("#FOODCODE").val() != "W005 - Water"
    ) {
        if ($("#RFCODE").val() == 8) {
            $("#RFCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        } else {
            $("#RFCODE").removeAttr("style");
        }
    }
});

$("#RFCODE").change(function() {
    if (
        $("#RFCODE").val() == 1 ||
        $("#RFCODE").val() == 2 ||
        $("#RFCODE").val() == 3 ||
        $("#RFCODE").val() == 7
    ) {
        if (
            $("#FOODCODE").val() == "W001 - Water" ||
            $("#FOODCODE").val() == "W002 - Water" ||
            $("#FOODCODE").val() == "W003 - Water" ||
            $("#FOODCODE").val() == "W004 - Water" ||
            $("#FOODCODE").val() == "W005 - Water"
        ) {
            $("#RFCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        } else {
            $("#RFCODE").removeAttr("style");
        }
    } else if (
        $("#RFCODE").val() == 4 ||
        $("#RFCODE").val() == 5 ||
        $("#RFCODE").val() == 6
    ) {
        if ($("#FOODCODE").val() == "W001 - Water") {
            $("#RFCODE").removeAttr("style");
        } else {
            $("#RFCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    } else if ($("#RFCODE").val() == 8) {
        if (
            $("#FOODCODE").val() == "W001 - Water" ||
            $("#FOODCODE").val() == "W002 - Water" ||
            $("#FOODCODE").val() == "W003 - Water" ||
            $("#FOODCODE").val() == "W004 - Water" ||
            $("#FOODCODE").val() == "W005 - Water"
        ) {
            $("#RFCODE").removeAttr("style");
        } else {
            $("#RFCODE").attr(
                "style",
                "background-color:#ff5c5c; color:#ffffff;"
            );
        }
    }
});
