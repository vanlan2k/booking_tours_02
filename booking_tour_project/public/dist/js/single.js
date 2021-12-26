var formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'VND',
    maximumFractionDigits: 0,
});

function getTotalFunction() {
    //Update total adult
    let adult_data = parseInt($('#tickets').find('.qty_adult').data('adult'));
    let qty_adult = parseInt($('#tickets').find('.qty_adult').val());
    let total_adult = adult_data * qty_adult;
    $('#tickets').find('.total_adult .subtotal').text(formatter.format(total_adult));
    //    update total child
    let child_data = parseInt($('#tickets').find('.qty_child').data('child'));
    let qty_child = parseInt($('#tickets').find('.qty_child').val());
    let total_child = child_data * qty_child;
    $('#tickets').find('.total_child .subtotal').text(formatter.format(total_child));
    //    update total tour
    let total_tour = total_adult + total_child;
    $('#tickets').find('.total_tour').val(formatter.format(total_tour));
    $('#tickets').find('.total_tour').data('total', total_tour);
}


//Load More
$(document).ready(function () {

    var _token = $('input[name="_token"]').val();
    var id_tour = $('#tour_id').data('tour');
    load_data('', _token, id_tour);
    function load_data(id = "", _token) {
        $.ajax({
            url: "/loadmore",
            method: "POST",
            data: {id: id, _token: _token, id_tour: id_tour},
            success: function (data) {
                $('#load_more_button').remove();
                $('#review_data').append(data.output);
            }
        })
    }

    $(document).on('click', '#load_more_button', function () {
        var id = $(this).data('id');
        $('#load_more_button').html('<b>Loading...</b>');
        load_data(id, _token, id_tour, id_tour);
    });

})
