<?php
include 'misc/headernavfooter.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silicon - Checkout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .order-summary {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
        }

        .cart-item-review {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #dee2e6;
        }

        .cart-item-review:last-child {
            border-bottom: none;
        }

        .cart-item-review img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            margin-right: 1rem;
        }

        .cart-item-details {
            flex: 1;
        }

        .payment-form-group {
            margin-bottom: 1rem;
        }

        .payment-form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #495057;
            font-size: 0.875rem;
        }

        .payment-input {
            width: 100%;
            padding: 0.75rem;
            border: 1.5px solid #ced4da;
            border-radius: 6px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background: white;
        }

        .payment-input:focus {
            outline: none;
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
        }

        .payment-input::placeholder {
            color: #adb5bd;
        }

        .payment-input-row {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1rem;
        }

        #card-errors {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.5rem;
            min-height: 1.25rem;
        }

        .payment-section {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <?php navbarcall(); ?>

    <section class="py-5 flex-grow-1">
        <div class="container checkout-container">
            <h2 class="mb-4">Checkout</h2>
            <div class="row">
                <!-- Order Summary -->
                <div class="col-md-5 mb-4">
                    <div class="order-summary">
                        <h4 class="mb-3">Order Summary</h4>
                        
                        <div class="mb-3">
                            <!-- Example cart item - Backend will populate dynamically -->
                            <div class="cart-item-review">
                                <img src="img/products/vision/clyde.jpg" alt="Clyde">
                                <div class="cart-item-details">
                                    <div class="fw-bold">Clyde</div>
                                    <div class="text-muted small">
                                        Qty: 1
                                        &middot; Size: small
                                    </div>
                                    <div class="mt-1">₱80.00</div>
                                </div>
                            </div>
                            
                            <div class="cart-item-review">
                                <img src="img/products/sunglasses/barbara.jpg" alt="Barbara">
                                <div class="cart-item-details">
                                    <div class="fw-bold">Barbara</div>
                                    <div class="text-muted small">
                                        Qty: 2
                                        &middot; Size: medium
                                    </div>
                                    <div class="mt-1">₱798.00</div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>₱<span id="checkout-subtotal">878.00</span></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping:</span>
                            <span>₱<span id="checkout-shipping">100.00</span></span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <strong>Total:</strong>
                            <strong>₱<span id="checkout-total">978.00</span></strong>
                        </div>
                    </div>
                </div>

                <!-- Payment Form -->
                <div class="col-md-7">
                    <div class="payment-section">
                        <h4 class="mb-4">Payment Information</h4>

                        <!-- Customer Info -->
                        <div class="mb-4">
                            <h5 class="mb-3">Shipping Address</h5>
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="customer-name" value="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="customer-email" value="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contact Number</label>
                                <input type="text" class="form-control" id="customer-contact" value="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Shipping Address</label>
                                <textarea class="form-control" id="customer-address" rows="3" required></textarea>
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="mb-4">
                            <h5 class="mb-3">Payment Method</h5>
                            <form id="payment-form" method="POST" action="">
                                <!-- Backend: Replace this form submission with your actual payment processing endpoint -->
                                
                                <div class="payment-form-group">
                                    <label for="card-number">Card Number</label>
                                    <input 
                                        type="text" 
                                        id="card-number" 
                                        class="payment-input" 
                                        placeholder="1234 5678 9012 3456" 
                                        maxlength="19"
                                        required
                                    >
                                </div>

                                <div class="payment-form-group">
                                    <div class="payment-input-row">
                                        <div>
                                            <label for="card-expiry">Expiry Date</label>
                                            <input 
                                                type="text" 
                                                id="card-expiry" 
                                                class="payment-input" 
                                                placeholder="MM/YY" 
                                                maxlength="5"
                                                required
                                            >
                                        </div>
                                        <div>
                                            <label for="card-cvc">CVC</label>
                                            <input 
                                                type="text" 
                                                id="card-cvc" 
                                                class="payment-input" 
                                                placeholder="123" 
                                                maxlength="4"
                                                required
                                            >
                                        </div>
                                    </div>
                                </div>

                                <div id="card-errors" role="alert"></div>

                                <button type="submit" id="submit-payment" class="btn btn-primary btn-lg w-100 mt-3">
                                    <span id="button-text">Pay ₱<span id="payment-total">978.00</span></span>
                                    <span id="spinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                                </button>
                            </form>
                        </div>

                        <div class="alert alert-info small">
                            <i class="fas fa-info-circle"></i> We keep your card information secure and encrypted. Your card's security code (CVC) will not be stored. You can remove your card anytime.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php
    footer();
    ?>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/checkout.js"></script>
</body>

</html>
