var regex = /^(.*)(\d)+$/i;
var cindex = 1;

$("input.tr_clone_add").on('click', function () {
    var $tr = $(this).closest('.tr_clone');
    var $clone = $tr.clone(true);
    cindex++;
    $clone.find('.remove').click(function (e) {

        // target row
        var $remove = $(this).closest('.tr_clone');

        // show the modal
        $('#remove-clone').modal('show');

        // remove the clone
        $('#proceed').click(function (e) {
            $remove.remove();
            $('#remove-clone').modal('hide');
        });
        
        e.preventDefault();
    });
    $clone.find(':text').val('');
    $clone.find('#LINENO').val('');
    $clone.find('#FOODWEIGHT').val('');
    $clone.find('#UNITCOST').val('');
    $clone.find('#UNITWGT').val('');
    $clone.find('#PW_WGT').val('');
    $clone.find('#GO_WGT').val('');
    $clone.find('#LO_WGT').val('');
    $clone.find('#CMC').removeAttr('style');
    $clone.find('#SRCCODE').removeAttr('style');
    $clone.find('#RFCODE').removeAttr('style');
    $clone.attr('id', 'line-' + (cindex)); //update row id
    //update ids of elements in row
    $clone.find("*").each(function () {
        var id = this.id || "";
        var match = id.match(regex) || [];
        if (match.length == 3) {
            this.id = match[1] + (cindex);
        }
    });

    $clone.find("#CMC").change(function () {
        if ($clone.find("#RCC").val() == 1 || $clone.find("#RCC").val() == 2 || $clone.find("#RCC").val() == 5) {
            if ($clone.find("#CMC").val() != 6) {
                $clone.find("#CMC").attr("style", "background-color:#ff5c5c; color:#ffffff;");
            } else {
                $clone.find("#CMC").removeAttr("style");
            }
        } else if ($clone.find("#RCC").val() == 3 || $clone.find("#RCC").val() == 6) {
            if (
                $clone.find("#CMC").val() == 1 ||
                $clone.find("#CMC").val() == 2 ||
                $clone.find("#CMC").val() == 3 ||
                $clone.find("#CMC").val() == 4
            ) {
                $clone.find("#CMC").removeAttr("style");
            } else {
                $clone.find("#CMC").attr("style", "background-color:#ff5c5c; color:#ffffff;");
            }
        } else if ($clone.find("#RCC").val() == 4) {
            if (
                $clone.find("#CMC").val() == 1 ||
                $clone.find("#CMC").val() == 2 ||
                $clone.find("#CMC").val() == 3 ||
                $clone.find("#CMC").val() == 4 ||
                $clone.find("#CMC").val() == 5
            ) {
                $clone.find("#CMC").removeAttr("style");
            } else {
                $clone.find("#CMC").attr("style", "background-color:#ff5c5c; color:#ffffff;");
            }
        }
    });

    $clone.find("#SRCCODE").change(function () {
        if ($clone.find("#SUPCODE").val() == 1) {
            if (
                $clone.find("#SRCCODE").val() == 1 ||
                $clone.find("#SRCCODE").val() == 2 ||
                $clone.find("#SRCCODE").val() == 3 ||
                $clone.find("#SRCCODE").val() == 4 ||
                $clone.find("#SRCCODE").val() == 5 ||
                $clone.find("#SRCCODE").val() == 6 ||
                $clone.find("#SRCCODE").val() == 7 ||
                $clone.find("#SRCCODE").val() == 8 ||
                $clone.find("#SRCCODE").val() == 9 ||
                $clone.find("#SRCCODE").val() == 10 ||
                $clone.find("#SRCCODE").val() == 11 ||
                $clone.find("#SRCCODE").val() == 14 ||
                $clone.find("#SRCCODE").val() == 15 ||
                $clone.find("#SRCCODE").val() == 18 ||
                $clone.find("#SRCCODE").val() == 19
            ) {
                $clone.find("#SRCCODE").removeAttr("style");
            } else {
                $clone.find("#SRCCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#SUPCODE").val() == 2) {
            if ($clone.find("#SRCCODE").val() == 14 || $clone.find("#SRCCODE").val() == 15) {
                $clone.find("#SRCCODE").removeAttr("style");
            } else {
                $clone.find("#SRCCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#SUPCODE").val() == 3) {
            if (
                $clone.find("#SRCCODE").val() == 1 ||
                $clone.find("#SRCCODE").val() == 2 ||
                $clone.find("#SRCCODE").val() == 3 ||
                $clone.find("#SRCCODE").val() == 4 ||
                $clone.find("#SRCCODE").val() == 5 ||
                $clone.find("#SRCCODE").val() == 6 ||
                $clone.find("#SRCCODE").val() == 7 ||
                $clone.find("#SRCCODE").val() == 8 ||
                $clone.find("#SRCCODE").val() == 9 ||
                $clone.find("#SRCCODE").val() == 10 ||
                $clone.find("#SRCCODE").val() == 11 ||
                $clone.find("#SRCCODE").val() == 12 ||
                $clone.find("#SRCCODE").val() == 13 ||
                $clone.find("#SRCCODE").val() == 14 ||
                $clone.find("#SRCCODE").val() == 15 ||
                $clone.find("#SRCCODE").val() == 18 ||
                $clone.find("#SRCCODE").val() == 19
            ) {
                $clone.find("#SRCCODE").removeAttr("style");
            } else {
                $clone.find("#SRCCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#SUPCODE").val() == 4) {
            if (
                $clone.find("#SRCCODE").val() == 2 ||
                $clone.find("#SRCCODE").val() == 12 ||
                $clone.find("#SRCCODE").val() == 14 ||
                $clone.find("#SRCCODE").val() == 15
            ) {
                $clone.find("#SRCCODE").removeAttr("style");
            } else {
                $clone.find("#SRCCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#SUPCODE").val() == 9) {
            if ($clone.find("#SRCCODE").val() == 16 || $clone.find("#SRCCODE").val() == 17) {
                $clone.find("#SRCCODE").removeAttr("style");
            } else {
                $clone.find("#SRCCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        }
    });

    $clone.find("#FOODCODE").change(function () {
        if ($clone.find("#FOODCODE").val() === "W001 - Water") {
            if (
                $clone.find("#RFCODE").val() == 4 ||
                $clone.find("#RFCODE").val() == 5 ||
                $clone.find("#RFCODE").val() == 6 ||
                $clone.find("#RFCODE").val() == 8
            ) {
                $clone.find("#RFCODE").removeAttr("style");
            } else {
                $clone.find("#RFCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#FOODCODE").val() === "W002 - Water" || $clone.find("#FOODCODE").val() === "W003 - Water" || $clone.find("#FOODCODE").val() === "W004 - Water" || $clone.find("#FOODCODE").val() === "W005 - Water") {
            if ($clone.find("#RFCODE").val() == 8) {
                $clone.find("#RFCODE").removeAttr("style");
            } else {
                $clone.find("#RFCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#FOODCODE").val() != "W001 - Water") {
            if (
                $clone.find("#RFCODE").val() == 4 ||
                $clone.find("#RFCODE").val() == 5 ||
                $clone.find("#RFCODE").val() == 6 ||
                $clone.find("#RFCODE").val() == 8
            ) {
                $clone.find("#RFCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            } else {
                $clone.find("#RFCODE").removeAttr("style");
            }
        } else if ($clone.find("#FOODCODE").val() != "W002 - Water" || $clone.find("#FOODCODE").val() != "W003 - Water" || $clone.find("#FOODCODE").val() != "W004 - Water" || $clone.find("#FOODCODE").val() != "W005 - Water") {
            if ($clone.find("#RFCODE").val() == 8) {
                $clone.find("#RFCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            } else {
                $clone.find("#RFCODE").removeAttr("style");
            }
        }
    });

    $clone.find("#RFCODE").change(function () {
        if ($clone.find("#RFCODE").val() == 1 || $clone.find("#RFCODE").val() == 2 || $clone.find("#RFCODE").val() == 3 || $clone.find("#RFCODE").val() == 7) {
            if ($clone.find("#FOODCODE").val() == "W001 - Water" || $clone.find("#FOODCODE").val() == "W002 - Water" || $clone.find("#FOODCODE").val() == "W003 - Water" || $clone.find("#FOODCODE").val() == "W004 - Water" || $clone.find("#FOODCODE").val() == "W005 - Water") {
                $clone.find("#RFCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            } else {
                $clone.find("#RFCODE").removeAttr("style");
            }
        } else if ($clone.find("#RFCODE").val() == 4 || $clone.find("#RFCODE").val() == 5 || $clone.find("#RFCODE").val() == 6) {
            if ($clone.find("#FOODCODE").val() == "W001 - Water") {
                $clone.find("#RFCODE").removeAttr("style");
            } else {
                $clone.find("#RFCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        } else if ($clone.find("#RFCODE").val() == 8) {
            if ($clone.find("#FOODCODE").val() == "W001 - Water" || $clone.find("#FOODCODE").val() == "W002 - Water" || $clone.find("#FOODCODE").val() == "W003 - Water" || $clone.find("#FOODCODE").val() == "W004 - Water" || $clone.find("#FOODCODE").val() == "W005 - Water") {
                $clone.find("#RFCODE").removeAttr("style");
            } else {
                $clone.find("#RFCODE").attr(
                    "style",
                    "background-color:#ff5c5c; color:#ffffff;"
                );
            }
        }
    });

    $tr.after($clone);
});
