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
        
        // Simulate payment processing (1.5 seconds delay)
        setTimeout(function() {
            
            // Redirect to success page
            window.location.href = 'success.php';
            
            // Backend: Replace the above setTimeout and alert with your actual AJAX call:
            // 
            // $.ajax({
            //     url: 'your-payment-endpoint.php',
            //     method: 'POST',
            //     data: {
            //         card_number: cardNumber,
            //         card_expiry: cardExpiry,
            //         card_cvc: cardCvc,
            //         customer_name: $('#customer-name').val(),
            //         customer_email: $('#customer-email').val(),
            //         customer_contact: $('#customer-contact').val(),
            //         customer_address: $('#customer-address').val(),
            //         total: $('#payment-total').text()
            //     },
            //     success: function(response) {
            //         // Handle success response
            //         window.location.href = 'success.html';
            //     },
            //     error: function(xhr) {
            //         // Handle error
            //         cardErrors.textContent = 'Payment failed. Please try again.';
            //         submitButton.disabled = false;
            //         buttonText.textContent = 'Pay ₱' + $('#payment-total').text();
            //         spinner.classList.add('d-none');
            //     }
            // });
        }, 1500);
    });
});
