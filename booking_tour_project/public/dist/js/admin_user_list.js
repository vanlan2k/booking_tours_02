function deleteUser(id, token, i) {
    swal({
        title: "Xác nhận",
        text: "Sau khi xóa, bạn sẽ không thể khôi phục nội dung này!",
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
                        swal("Thành công!", "Xóa nội dung thành công!","success")
                            .then((value) => {
                                for (var j = 0; j <= $('.stt').length; j++){
                                    var z = j + 1;
                                    $('.stt').eq(j).text(z)
                                }
                            });
                        return;
                    }
                    swal("Lỗi!", "Đã xảy ra lỗi, vui lòng liên hệ quản trị viên!","error");
                }
            })
        }else{ swal("Đã Hủy!", "", "success"); }
    })
}
