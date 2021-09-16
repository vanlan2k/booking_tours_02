function deleteUser(id, token) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete){
            $.ajax({
                url: '/user/' + id,
                method: 'DELETE',
                data: {
                    _token: token
                },
                success: function (result){
                    if (!result.error){
                        swal("Good job!", "Item deleted successfully!","success")
                            .then((value) => {
                                location.reload();
                            });
                        return;
                    }
                    swal("Failed!", "Some error occur, please contact administrator!","error");
                }
            })
        }else{ swal("Cancel!"); }
    })
}
