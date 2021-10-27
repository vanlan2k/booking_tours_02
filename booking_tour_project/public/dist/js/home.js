$('#key_works').keyup(function () {
    var query = $(this).val();
    if (query) {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "/auto-complete",
            method: "POST",
            data: {query: query, _token: _token},
            success: function (result) {
                console.log(result.output);
                $('#auto-conplete').fadeIn();
                $('#auto-conplete').html(result.output);
            }
        })
    }
    else {
        $('#auto-conplete').fadeOut();
    }
});
