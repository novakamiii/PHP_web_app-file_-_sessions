<?php
include 'misc/headernavfooter.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silicon - Order Details</title>
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

        .invoice-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .invoice-header {
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 1.5rem;
            margin-bottom: 2rem;
        }

        .invoice-title {
            font-size: 2rem;
            font-weight: bold;
            color: #212529;
            margin-bottom: 0.5rem;
        }

        .invoice-section {
            margin-bottom: 2rem;
        }

        .invoice-section h5 {
            color: #495057;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #e9ecef;
        }

        .invoice-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .invoice-item:last-child {
            border-bottom: none;
        }

        .invoice-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 6px;
            margin-right: 1rem;
        }

        .invoice-item-details {
            flex: 1;
        }

        .invoice-summary {
            background: #f8f9fa;
            border-radius: 6px;
            padding: 1.5rem;
            margin-top: 2rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
        }

        .summary-row.total {
            border-top: 2px solid #dee2e6;
            margin-top: 0.5rem;
            padding-top: 1rem;
            font-size: 1.25rem;
            font-weight: bold;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-processing {
            background-color: #cfe2ff;
            color: #084298;
        }

        .status-shipped {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .status-delivered {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .status-cancelled {
            background-color: #f8d7da;
            color: #842029;
        }
    </style>
</head>

<body>
    <?php navbarcall(); ?>

    <section class="py-5 flex-grow-1">
        <div class="container">
            <div class="mb-3">
                <a href="profile/orders-list.php" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Orders
                </a>
            </div>

            <div class="invoice-container">
                <!-- Invoice Header -->
                <div class="invoice-header">
                    <div class="invoice-title">Invoice</div>
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <div>
                            <strong>Order #1001</strong><br>
                            <small class="text-muted">Date: January 12, 2025 2:30 PM</small>
                        </div>
                        <div class="text-end">
                            <span class="status-badge status-delivered">
                                Delivered
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Billing & Shipping Info -->
                <div class="row invoice-section">
                    <div class="col-md-6">
                        <h5>Billing Information</h5>
                        <div>
                            <strong>John Doe</strong><br>
                            john.doe@email.com<br>
                            09123456789
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Shipping Address</h5>
                        <div>
                            123 Main Street<br>
                            Barangay Poblacion<br>
                            City, Province 1234
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="invoice-section">
                    <h5>Order Items</h5>
                    <div>
                        <!-- Example item 1 - Backend will populate dynamically -->
                        <div class="invoice-item">
                            <img src="img/products/vision/clyde.jpg" alt="Clyde">
                            <div class="invoice-item-details">
                                <div class="fw-bold">Clyde</div>
                                <div class="text-muted small">
                                    Quantity: 1
                                    &middot; Size: small
                                </div>
                            </div>
                            <div class="text-end">
                                <div>₱80.00 × 1</div>
                                <div class="fw-bold">₱80.00</div>
                            </div>
                        </div>

                        <!-- Example item 2 -->
                        <div class="invoice-item">
                            <img src="img/products/sunglasses/barbara.jpg" alt="Barbara">
                            <div class="invoice-item-details">
                                <div class="fw-bold">Barbara</div>
                                <div class="text-muted small">
                                    Quantity: 2
                                    &middot; Size: medium
                                </div>
                            </div>
                            <div class="text-end">
                                <div>₱399.00 × 2</div>
                                <div class="fw-bold">₱798.00</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Information -->
                <div class="invoice-section">
                    <h5>Payment Information</h5>
                    <div>
                        <strong>Payment Method:</strong> Card<br>
                        <strong>Transaction ID:</strong> pi_1234567890abcdef<br>
                        <strong>Payment Status:</strong> 
                        <span class="status-badge status-delivered">
                            Delivered
                        </span>
                    </div>
                </div>

                <!-- Invoice Summary -->
                <div class="invoice-summary">
                    <div class="summary-row">
                        <span>Subtotal:</span>
                        <span>₱878.00</span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping:</span>
                        <span>₱100.00</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total:</span>
                        <span>₱978.00</span>
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
</body>

</html>
