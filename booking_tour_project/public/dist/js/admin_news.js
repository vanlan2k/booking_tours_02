function deleteTour(id, token, i) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: '/admin/news/' + id,
                method: 'DELETE',
                data: {
                    _token: token
                },
                success: function (result) {
                    if (!result.error) {
                        $('.row-item'+ i).remove();
                        swal("Good job!", "Item deleted successfully!", "success")
                            .then((value) => {
                                for (var j = 0; j <= $('.stt').length; j++){
                                    var z = j + 1;
                                    $('.stt').eq(j).text(z)
                                }
                            });
                        return;
                    }
                    swal("Failed!", "Some error occur, please contact administrator!", "error");
                }
            })
        } else {
            swal("Cancel!");
        }
    })
}

var options = {
    filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
    filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token='
};

CKEDITOR.replace('my-editor', options);
