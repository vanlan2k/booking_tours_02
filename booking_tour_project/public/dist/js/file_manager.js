$('#lfm_avata').filemanager('file');
$('#thumbnail_avata').on('change', function (e) {
    $('#avata').attr('src', $(this).val());
})
