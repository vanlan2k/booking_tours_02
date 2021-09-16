function deleteUser(id, token, i) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete){
            $.ajax({
                url: '/admin/user/' + id,
                method: 'DELETE',
                data: {
                    _token: token
                },
                success: function (result){
                    if (!result.error){
                        $('.row-item'+ i).remove();
                        swal("Good job!", "Item deleted successfully!","success")
                            .then((value) => {
                                for (var j = 0; j < $('.stt').length;){
                                    $('.stt').eq(j).text(j+=1)
                                }
                            });
                        return;
                    }
                    swal("Failed!", "Some error occur, please contact administrator!","error");
                }
            })
        }else{ swal("Cancel!"); }
    })
}
