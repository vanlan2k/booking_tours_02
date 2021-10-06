$('#lfm').filemanager('file');
$('#thumbnail').on('change', function (e) {
    $('#holder').attr('src', $(this).val())
});
$('#lfm_avata').filemanager('file');
$('#thumbnail_avata').on('change', function (e) {
    $('#avata').attr('src', $(this).val());
});
