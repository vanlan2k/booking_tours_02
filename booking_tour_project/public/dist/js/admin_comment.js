$('.checkbox1').on('change', function (e) {
    let status = e.target.checked ? 'on' : 'off';
    let id = $(this).val();
    var _token = $('input[name="_token"]').val();
    $.ajax({
        url: '/admin/comment/' + id,
        method: 'PUT',
        data: {status: status, _token: _token},
        success: function (result){
            if (!result.error){
                alert('Hide comment successfully');
            }
            else {
                alert('Hide comment failed');
            }
        }
    });
})
