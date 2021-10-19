$('#selectbox').on('change', function () {
    var filter = $(this).val();
    window.location.href = '/tour?sort='+ filter
})
