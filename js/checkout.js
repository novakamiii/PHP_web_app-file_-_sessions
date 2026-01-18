// checkout.js - Payment form handling (Frontend simulation)
// Backend: Replace the simulation with actual AJAX call to your payment endpoint

$(function () {
    const form = document.getElementById('payment-form');
    const submitButton = document.getElementById('submit-payment');
    const buttonText = document.getElementById('button-text');
    const spinner = document.getElementById('spinner');
    const cardErrors = document.getElementById('card-errors');
    
    // Format card number input (add spaces every 4 digits)
    $('#card-number').on('input', function() {
        let value = $(this).val().replace(/\s/g, '');
        let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
        $(this).val(formattedValue);
    });
    
    // Format expiry date input (MM/YY)
    $('#card-expiry').on('input', function() {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2, 4);
        }
        $(this).val(value);
    });
    
    // Format CVC input (numbers only)
    $('#card-cvc').on('input', function() {
        $(this).val($(this).val().replace(/\D/g, ''));
    });
    
    // Handle form submission
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        
        // Clear previous errors
        cardErrors.textContent = '';
        
        // Basic validation
        const cardNumber = $('#card-number').val().replace(/\s/g, '');
        const cardExpiry = $('#card-expiry').val();
        const cardCvc = $('#card-cvc').val();
        
        if (cardNumber.length < 13 || cardNumber.length > 19) {
            cardErrors.textContent = 'Please enter a valid card number';
            return;
        }
        
        if (!/^\d{2}\/\d{2}$/.test(cardExpiry)) {
            cardErrors.textContent = 'Please enter a valid expiry date (MM/YY)';
            return;
        }
        
        if (cardCvc.length < 3 || cardCvc.length > 4) {
            cardErrors.textContent = 'Please enter a valid CVC';
            return;
        }
        
        // Disable button and show loading state
        submitButton.disabled = true;
        buttonText.textContent = 'Processing...';
        spinner.classList.remove('d-none');
        
        // Process checkout via AJAX
        $.ajax({
            url: 'misc/process_checkout.php',
            method: 'POST',
            data: {
                customer_name: $('#customer-name').val(),
                customer_email: $('#customer-email').val(),
                customer_contact: $('#customer-contact').val(),
                customer_address: $('#customer-address').val()
            },
            dataType: 'json',
            success: function(response) {
                console.log('Checkout response:', response); // Debug log
                if (response && response.success) {
                    // Redirect to success page with order ID
                    window.location.href = 'checkout-success.php?order_id=' + response.order_id;
                } else {
                    // Handle error
                    cardErrors.textContent = (response && response.message) ? response.message : 'Payment failed. Please try again.';
                    submitButton.disabled = false;
                    buttonText.textContent = 'Pay ₱' + $('#payment-total').text();
                    spinner.classList.add('d-none');
                }
            },
            error: function(xhr, status, error) {
                console.error('Checkout error:', xhr, status, error); // Debug log
                // Handle error
                let errorMessage = 'Payment failed. Please try again.';
                try {
                    if (xhr.responseText) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.message) {
                            errorMessage = response.message;
                        }
                    }
                } catch (e) {
                    console.error('Error parsing response:', e);
                    // If response is not JSON, show server error
                    if (xhr.status === 404) {
                        errorMessage = 'Checkout handler not found. Please contact support.';
                    } else if (xhr.status === 500) {
                        errorMessage = 'Server error. Please try again later.';
                    }
                }
                cardErrors.textContent = errorMessage;
                submitButton.disabled = false;
                buttonText.textContent = 'Pay ₱' + $('#payment-total').text();
                spinner.classList.add('d-none');
            }
        });
    });
});
