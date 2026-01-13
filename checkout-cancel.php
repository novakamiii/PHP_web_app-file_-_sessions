<?php
include 'misc/headernavfooter.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silicon - Payment Cancelled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            background: #f8f9fa;
        }

        .cancel-container {
            max-width: 700px;
            margin: 0 auto;
        }

        .cancel-card {
            background: white;
            border-radius: 12px;
            padding: 3rem 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .cancel-icon {
            width: 80px;
            height: 80px;
            background: #dc3545;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: shake 0.6s ease-out;
        }

        .cancel-icon i {
            font-size: 2.5rem;
            color: white;
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translateX(-5px);
            }
            20%, 40%, 60%, 80% {
                transform: translateX(5px);
            }
        }

        .info-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 1rem 1.5rem;
            margin: 2rem 0;
            text-align: left;
            border-radius: 4px;
        }

        /* Override global h6 styles from main stylesheet so headings stay inside the box */
        .info-box h6,
        .help-item-content h6 {
            color: #856404;
            margin: 0 0 0.5rem 0;
            font-weight: 600;
            padding: 0;
            width: auto;
            text-align: left;
            font-size: 1rem;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        .info-box ul {
            padding-left: 1.25rem;
            margin-bottom: 0;
        }

        .info-box p {
            color: #856404;
            margin-bottom: 0;
            font-size: 0.9rem;
        }

        .btn-primary-custom {
            background: #0d6efd;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin: 0.5rem;
            transition: all 0.3s ease;
            border: none;
            font-weight: 500;
        }

        .btn-primary-custom:hover {
            background: #0b5ed7;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
        }

        .btn-secondary-custom {
            background: #6c757d;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin: 0.5rem;
            transition: all 0.3s ease;
            border: none;
            font-weight: 500;
        }

        .btn-secondary-custom:hover {
            background: #5c636a;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        }

        .btn-outline-custom {
            background: transparent;
            color: #6c757d;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin: 0.5rem;
            border: 2px solid #6c757d;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-outline-custom:hover {
            background: #6c757d;
            color: white;
            transform: translateY(-2px);
        }

        .help-section {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #dee2e6;
        }

        .help-item {
            display: flex;
            align-items: start;
            margin-bottom: 1rem;
            text-align: left;
        }

        .help-item i {
            color: #0d6efd;
            margin-right: 1rem;
            margin-top: 0.25rem;
            font-size: 1.2rem;
        }

        .help-item-content h6 {
            margin-bottom: 0.25rem;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .help-item-content p {
            margin-bottom: 0;
            font-size: 0.875rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <?php navbarcall(); ?>

    <section class="py-5 flex-grow-1">
        <div class="container cancel-container">
            <div class="cancel-card">
                <div class="cancel-icon">
                    <i class="fas fa-times"></i>
                </div>
                
                <h1 class="mb-3">Payment Cancelled</h1>
                <p class="text-muted mb-4">Your payment was not completed. Your order has not been placed.</p>

                <div class="info-box">
                    <h6><i class="fas fa-info-circle me-2"></i>What happened?</h6>
                    <p>The payment process was cancelled or interrupted. This could be because:</p>
                    <ul class="mt-2 mb-0">
                        <li>You cancelled the payment</li>
                        <li>The payment timed out</li>
                        <li>There was an issue with your payment method</li>
                        <li>The transaction was declined by your bank</li>
                    </ul>
                </div>

                <div class="alert alert-info mt-4 text-start">
                    <strong><i class="fas fa-shield-alt me-2"></i>Don't worry!</strong><br>
                    No charges have been made to your account. Your cart items are still saved.
                </div>

                <!-- Action Buttons -->
                <div class="mt-4">
                    <a href="checkout.php" class="btn-primary-custom">
                        <i class="fas fa-redo me-2"></i>Try Again
                    </a>
                    <a href="cart.php" class="btn-secondary-custom">
                        <i class="fas fa-shopping-cart me-2"></i>Review Cart
                    </a>
                </div>

                <div class="mt-3">
                    <a href="products.php" class="btn-outline-custom">
                        <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                    </a>
                </div>

                <!-- Help Section -->
                <div class="help-section">
                    <h5 class="mb-4">Need Assistance?</h5>
                    
                    <div class="help-item">
                        <i class="fas fa-headset"></i>
                        <div class="help-item-content">
                            <h6>Contact Support</h6>
                            <p>Our team is here to help with any payment issues</p>
                            <a href="contact-us.php" class="text-decoration-none small">Get Help →</a>
                        </div>
                    </div>

                    <div class="help-item">
                        <i class="fas fa-credit-card"></i>
                        <div class="help-item-content">
                            <h6>Payment Methods</h6>
                            <p>We accept various payment options for your convenience</p>
                        </div>
                    </div>

                    <div class="help-item">
                        <i class="fas fa-lock"></i>
                        <div class="help-item-content">
                            <h6>Secure Checkout</h6>
                            <p>All transactions are encrypted and secure</p>
                        </div>
                    </div>
                </div>

                <!-- Additional Links -->
                <div class="mt-4 pt-3 border-top">
                    <p class="text-muted small mb-2">Common Solutions:</p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="#" class="text-decoration-none small">Check Payment Details</a>
                        <span class="text-muted">•</span>
                        <a href="#" class="text-decoration-none small">Update Billing Info</a>
                        <span class="text-muted">•</span>
                        <a href="contact-us.php" class="text-decoration-none small">Contact Support</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php footer(); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
