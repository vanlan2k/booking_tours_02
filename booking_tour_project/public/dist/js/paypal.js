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
                    if(!result.error) {
                        window.location.href = '/'
                        return actions.payment.execute().then(function () {
                            // Show a confirmation message to the buyer
                            alert('You have successfully booked and paid for the tour');
                        });
                    }
                    else {
                        alert('You have failed to book and pay for the tour');
                    }
                }
            });
        }
    },
    '#paypal-button'
)
;
