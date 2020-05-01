$('.open-window').click(function (event) {
    event.preventDefault();
    $.ajax({
        url: $(this).data('path'),
        success: function (response) {
            $('#get-record').html(response);
            $('#open-record').modal('show');
        }
    });
    return false;
});

$('.open-count').click(function (event) {
    event.preventDefault();
    $.ajax({
        url: $(this).data('path'),
        success: function (response) {
            $('#get-count').html(response);
            $('#open-count').modal('show');
        }
    });
    return false;
});
