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
                    total: `1`,
                    currency: 'USD'
                }
            }]
        });
    },
    // Execute the payment
    onAuthorize: function (data, actions) {
        console.log(data)
        return actions.payment.execute().then(function () {
            // Show a confirmation message to the buyer
            window.alert('Thank you for your purchase!');
        });
    }
}, '#paypal-button');
