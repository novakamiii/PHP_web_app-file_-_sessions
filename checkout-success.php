<?php
session_start();
include 'misc/headernavfooter.php';

// Get order ID from URL or session
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : null;

// Get order from session
$order = null;
if ($order_id && isset($_SESSION['user_orders'][$order_id])) {
    $order = $_SESSION['user_orders'][$order_id];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silicon - Order Successful</title>
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

        .success-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .success-card {
            background: white;
            border-radius: 12px;
            padding: 3rem 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 2rem;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            animation: scaleIn 0.5s ease-out;
        }

        .success-icon i {
            font-size: 2.5rem;
            color: white;
        }

        @keyframes scaleIn {
            0% { transform: scale(0); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .order-summary-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
        }

        .order-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 1rem;
        }

        .order-item-details {
            flex: 1;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f1f3f5;
        }

        .info-row:last-child {
            border-bottom: none;
            font-weight: 600;
            font-size: 1.1rem;
            padding-top: 1rem;
            margin-top: 0.5rem;
            border-top: 2px solid #dee2e6;
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
        }

        .btn-secondary-custom:hover {
            background: #5c636a;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
        }
    </style>
</head>
<body>
    <?php navbarcall(); ?>

    <section class="py-5 flex-grow-1">
        <div class="container success-container">
            <!-- Success Message -->
            <div class="success-card">
                <div class="success-icon">
                    <i class="fas fa-check"></i>
                </div>
                <h1 class="mb-3">Thank You for Your Order!</h1>
                <p class="text-muted mb-4">Your order has been successfully placed and is being processed.</p>
                
                <?php if ($order): ?>
                    <div class="alert alert-info">
                        <strong>Order ID:</strong> #<?php echo $order['id']; ?>
                    </div>
                    <p class="mb-0">A confirmation email has been sent to <strong><?php echo htmlspecialchars($order['customer_email']); ?></strong></p>
                <?php else: ?>
                    <p class="mb-0">A confirmation email will be sent to your registered email address.</p>
                <?php endif; ?>
            </div>

            <!-- Order Summary -->
            <?php if ($order): ?>
                <div class="order-summary-card">
                    <h4 class="mb-4">Order Summary</h4>
                    
                    <!-- Order Items -->
                    <div class="mb-4">
                        <?php foreach ($order['items'] as $item): ?>
                            <div class="order-item">
                                <img src="<?php echo htmlspecialchars($item['img']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                                <div class="order-item-details">
                                    <div class="fw-bold"><?php echo htmlspecialchars($item['name']); ?></div>
                                    <div class="text-muted small">
                                        Qty: <?php echo $item['qty']; ?>
                                        <?php if (!empty($item['size'])): ?>
                                            &middot; Size: <?php echo htmlspecialchars($item['size']); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="fw-bold">₱<?php echo $item['price']; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Order Totals -->
                    <div class="info-row">
                        <span>Subtotal:</span>
                        <span>₱<?php echo $order['subtotal']; ?></span>
                    </div>
                    <div class="info-row">
                        <span>Shipping:</span>
                        <span>₱<?php echo $order['shipping']; ?></span>
                    </div>
                    <div class="info-row">
                        <span>Total:</span>
                        <span>₱<?php echo $order['total']; ?></span>
                    </div>

                    <!-- Shipping Information -->
                    <div class="mt-4 pt-4 border-top">
                        <h5 class="mb-3">Shipping Information</h5>
                        <p class="mb-1"><strong><?php echo htmlspecialchars($order['customer_name']); ?></strong></p>
                        <p class="mb-1 text-muted"><?php echo nl2br(htmlspecialchars($order['customer_address'])); ?></p>
                        <p class="mb-0 text-muted"><?php echo htmlspecialchars($order['customer_contact']); ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Action Buttons -->
            <div class="text-center">
                <?php if ($order): ?>
                    <a href="profile/orders-list.php" class="btn-primary-custom">
                        <i class="fas fa-shopping-bag me-2"></i>View My Orders
                    </a>
                <?php endif; ?>
                <a href="products.php" class="btn-secondary-custom">
                    <i class="fas fa-shopping-bag me-2"></i>Continue Shopping
                </a>
            </div>

            <!-- Additional Info -->
            <div class="text-center mt-4">
                <p class="text-muted small mb-1">Need help with your order?</p>
                <a href="contact-us.php" class="text-decoration-none">Contact our support team</a>
            </div>
        </div>
    </section>

    <?php footer(); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
