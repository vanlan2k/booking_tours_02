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
