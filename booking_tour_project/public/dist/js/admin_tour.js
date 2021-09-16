function deleteTour(id, token, i) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete){
            $.ajax({
                url: '/admin/tour/' + id,
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


var options = {
    filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
    filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token='
};

CKEDITOR.replace('my-editor', options);
CKEDITOR.replace('my-editor1', options);

var x = $('.program').length, y = $('.list_img').length;
function clickAddElementFunction() {
    x++;
    $('#add_item').append('<div class="ml-3 program"><label>Program #' + x + '</label><input type="text" name="title[]" class="form-control mb-3" placeholder="Enter title program"><textarea id="my-editor' + x + '" name="program[]" class="form-control"></textarea><div class="form-group col-md-5 mt-3 d-flex align-items-end add-button"><div class="form-group col-12 d-flex align-items-end" ><div class="btn_delete btn btn-danger btn-outline js-addSize">Remove Collumn</div ></div ></div></div>')
    CKEDITOR.replace('my-editor' + x, options);
    $(".btn_delete").click(function () {
        if ($('.program').length > 1) {
            $(this).closest('.program').remove();
        }
    });
}
$(document).ready(function () {
    $(".btn_delete").click(function () {
        console.log($('.program').length);
        if ($('.program').length > 1) {
            $(this).closest('.program').remove();
        }
    });
    $(".btn_minus").click(function () {
        if ($('.list_img').length > 1) {
            $(this).closest('.list_img').remove();
        }
    });
});


for(var i = 1; i <= x ; i++) {
    const z = i;
    $('#lfm'+i).filemanager('file');
    $('#thumbnail' + i).on('change', function (e) {
        $('#holder' + z).attr('src', $(this).val());
    })
}


function clickAddImg() {
    console.log()
    y ++;
    $('#add_img').append('<div class="list_img"><label>Image #'+y+'</label><div class="input-group"><span class="input-group-btn"><a data-input="thumbnail'+y+'" id="lfm'+y+'" data-preview="holder'+y+'" class="btn btn-primary"><i class="fa fa-picture-o"></i> Choose</a></span><input id="thumbnail'+y+'"class="form-control" type="text" name="image[]"><div class="form-group col-md-2 d-flex align-items-end"><button type="button" class="btn_minus btn btn-danger btn-outline js-addSize" ><i class="fa fa-minus"></i></button></div></div><img id="holder'+y+'" style="margin-top:15px;max-height:100px;"></div>')
    $('#lfm'+y).filemanager('file');
    $('#thumbnail'+y).on('change', function (e) {
        $('#holder'+y).attr('src', $(this).val());
    })
    $(".btn_minus").click(function () {
        if ($('.list_img').length > 1) {
            $(this).closest('.list_img').remove();
        }
    });
}
