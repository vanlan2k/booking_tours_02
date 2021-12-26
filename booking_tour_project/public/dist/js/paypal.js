var total = $('#input_total').val();
paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
            sandbox: 'demo_sandbox_client_id',
            production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'large',
            color: 'gold',
            shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function (data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: `${total}`,
                        currency: 'USD'
                    }
                }]
            });
        },
        // Execute the payment
        onAuthorize: function (data, actions) {
            $.ajax({
                url: '/booking?payment=true',
                method: 'GET',
                success: function (result) {
                    if (!result.error) {
                        return actions.payment.execute().then(function () {
                            // Show a confirmation message to the buyer
                            toastr.success('Bạn đã thanh toán và đặt tour du lịch thành công!', '', {timeOut: 5000});
                            window.location.href = '/'
                        });
                    } else {
                        swal("Lỗi!", "Đã xảy ra lỗi, vui lòng liên hệ quản trị viên!", "error");
                        $.ajax({
                            url: '/booking?payment=false',
                            method: 'GET',
                            success: function (result) {
                                toastr.success('Thanh toán không thành công!', '', {timeOut: 5000});
                                window.location.href = '/';
                            }
                        });
                    }
                }
            });
        }
    },
    '#paypal-button'
);
