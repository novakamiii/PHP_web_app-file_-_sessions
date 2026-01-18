<?php
include '../misc/headernavfooter.php';

session_start();

// Default order statuses
$default_statuses = [
    '1001' => 'delivered',
    '1002' => 'shipped',
    '1003' => 'processing',
    '1004' => 'pending',
    '1005' => 'shipped',
    '1006' => 'delivered',
    '1007' => 'processing',
    '1008' => 'delivered'
];

// Initialize order statuses in session if not exists
if (!isset($_SESSION['order_statuses'])) {
    $_SESSION['order_statuses'] = $default_statuses;
}

// Get status with fallback to default
function getOrderStatus($order_id) {
    global $default_statuses;
    if (isset($_SESSION['order_statuses'][$order_id])) {
        return $_SESSION['order_statuses'][$order_id];
    }
    return isset($default_statuses[$order_id]) ? $default_statuses[$order_id] : 'pending';
}

// Status label mapping
$status_labels = [
    'pending' => 'Pending',
    'processing' => 'Processing',
    'shipped' => 'Shipped',
    'delivered' => 'Delivered',
    'cancelled' => 'Cancelled'
];

// Status class mapping
$status_classes = [
    'pending' => 'status-pending',
    'processing' => 'status-processing',
    'shipped' => 'status-shipped',
    'delivered' => 'status-delivered',
    'cancelled' => 'status-cancelled'
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Silicon - My Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="../styles.css" rel="stylesheet">
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

        .order-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: box-shadow 0.2s;
        }

        .order-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #dee2e6;
        }

        .order-status {
            padding: 0.25rem 0.75rem;
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

        .order-items {
            margin-top: 1rem;
        }

        .order-item {
            display: flex;
            align-items: center;
            padding: 0.75rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 1rem;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
        }

        .empty-state img {
            max-width: 200px;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <?php navbarcall(); ?>

    <section class="py-5 flex-grow-1">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>My Orders</h2>
                <a href="../products.php" class="btn btn-outline-primary">Continue Shopping</a>
            </div>

            <!-- Example orders - Backend will populate dynamically -->
            <div class="orders-list">
                <!-- Order 1 -->
                <div class="order-card">
                    <div class="order-header">
                        <div>
                            <h5 class="mb-1">Order #1001</h5>
                            <small class="text-muted">Placed on January 12, 2025 2:30 PM</small>
                        </div>
                        <div class="text-end">
                            <div class="order-status <?php echo $status_classes[getOrderStatus('1001')]; ?>">
                                <?php echo $status_labels[getOrderStatus('1001')]; ?>
                            </div>
                            <div class="mt-2">
                                <strong>₱978.00</strong>
                            </div>
                        </div>
                    </div>

                    <div class="order-items">
                        <div class="order-item">
                            <img src="../img/products/vision/clyde.jpg" alt="Clyde">
                            <div class="flex-fill">
                                <div class="fw-bold">Clyde</div>
                                <div class="text-muted small">
                                    Qty: 1
                                    &middot; Size: small
                                </div>
                            </div>
                            <div class="text-end">
                                ₱80.00
                            </div>
                        </div>
                        <div class="order-item">
                            <img src="../img/products/sunglasses/barbara.jpg" alt="Barbara">
                            <div class="flex-fill">
                                <div class="fw-bold">Barbara</div>
                                <div class="text-muted small">
                                    Qty: 2
                                    &middot; Size: medium
                                </div>
                            </div>
                            <div class="text-end">
                                ₱798.00
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 text-end">
                        <a href="../order-detail.php?id=1001" class="btn btn-outline-primary btn-sm">View Details</a>
                    </div>
                </div>

                <!-- Order 2 -->
                <div class="order-card">
                    <div class="order-header">
                        <div>
                            <h5 class="mb-1">Order #1002</h5>
                            <small class="text-muted">Placed on January 10, 2025 10:15 AM</small>
                        </div>
                        <div class="text-end">
                            <div class="order-status <?php echo $status_classes[getOrderStatus('1002')]; ?>">
                                <?php echo $status_labels[getOrderStatus('1002')]; ?>
                            </div>
                            <div class="mt-2">
                                <strong>₱599.00</strong>
                            </div>
                        </div>
                    </div>

                    <div class="order-items">
                        <div class="order-item">
                            <img src="../img/products/sunglasses/liv.jpg" alt="Liv">
                            <div class="flex-fill">
                                <div class="fw-bold">Liv</div>
                                <div class="text-muted small">
                                    Qty: 1
                                </div>
                            </div>
                            <div class="text-end">
                                ₱599.00
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 text-end">
                        <a href="../order-detail.php?id=1002" class="btn btn-outline-primary btn-sm">View Details</a>
                    </div>
                </div>

                <!-- Order 3 -->
                <div class="order-card">
                    <div class="order-header">
                        <div>
                            <h5 class="mb-1">Order #1003</h5>
                            <small class="text-muted">Placed on January 8, 2025 4:45 PM</small>
                        </div>
                        <div class="text-end">
                            <div class="order-status <?php echo $status_classes[getOrderStatus('1003')]; ?>">
                                <?php echo $status_labels[getOrderStatus('1003')]; ?>
                            </div>
                            <div class="mt-2">
                                <strong>₱1,250.00</strong>
                            </div>
                        </div>
                    </div>

                    <div class="order-items">
                        <div class="order-item">
                            <img src="../img/products/fashion/flora.jpg" alt="Flora">
                            <div class="flex-fill">
                                <div class="fw-bold">Flora</div>
                                <div class="text-muted small">
                                    Qty: 1
                                    &middot; Size: large
                                </div>
                            </div>
                            <div class="text-end">
                                ₱980.00
                            </div>
                        </div>
                        <div class="order-item">
                            <img src="../img/products/vision/bonnie.jpg" alt="Bonnie">
                            <div class="flex-fill">
                                <div class="fw-bold">Bonnie</div>
                                <div class="text-muted small">
                                    Qty: 3
                                </div>
                            </div>
                            <div class="text-end">
                                ₱270.00
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 text-end">
                        <a href="../order-detail.php?id=1003" class="btn btn-outline-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Empty state example ( if no orders) -->
            
            <!-- <div class="empty-state">
                <img src="../img/pageimg/empty-cart.png" alt="No orders">
                <h3>No orders yet</h3>
                <p class="text-muted">You haven't placed any orders yet. Start shopping to see your orders here.</p>
                <a href="../products.php" class="btn btn-primary mt-3">Browse Products</a>
            </div> -->
        
        </div>
    </section>

    <!-- FOOTER -->
    <?php
    footer();
    ?>


    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
