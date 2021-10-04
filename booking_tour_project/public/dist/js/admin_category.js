function deleteCategory(id, token) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '/admin/category/' + id,
                    type: 'DELETE',
                    data: {
                        _token: token
                    },
                    success: function (result) {
                        console.log(result.error);
                        if (!result.error) {
                            swal("Good job!", "Delete product successfully!", "success")
                                .then((value) => {
                                    location.reload();
                                });
                            console.log(result.name);
                            return;
                        }
                        swal("Oh noes!", "Delete failed product!");

                    }
                })
            } else {
                swal("Your imaginary file is safe!");
            }
        });
}
