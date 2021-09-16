$('#lfm').filemanager('file');
$('#thumbnail').on('change', function (e) {
    $('#holder').attr('src', $(this).val());
})
