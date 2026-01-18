<?php
include '../misc/headernavfooter.php';
// Session is already started in headernavfooter.php

// Get logged-in user ID
$user_id = isset($_SESSION['user_id']) ? intval($_SESSION['user_id']) : 0;

// Redirect if not logged in
if ($user_id <= 0) {
    header('Location: ../index.php');
    exit;
}

// Debug: Uncomment to check user_id
// error_log("Current user_id: " . $user_id);

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

// Initialize refund statuses in session if not exists
if (!isset($_SESSION['order_refunds'])) {
    $_SESSION['order_refunds'] = [];
}

// Order data with user mapping
$orders_mapping = [
    '1001' => ['user_id' => 1, 'date' => 'January 12, 2025 2:30 PM', 'total' => '978.00', 'items' => [
        ['name' => 'Clyde', 'qty' => 1, 'size' => 'small', 'price' => '80.00', 'img' => '../img/products/vision/clyde.jpg'],
        ['name' => 'Barbara', 'qty' => 2, 'size' => 'medium', 'price' => '798.00', 'img' => '../img/products/sunglasses/barbara.jpg']
    ]],
    '1002' => ['user_id' => 2, 'date' => 'January 10, 2025 10:15 AM', 'total' => '599.00', 'items' => [
        ['name' => 'Liv', 'qty' => 1, 'size' => '', 'price' => '599.00', 'img' => '../img/products/sunglasses/liv.jpg']
    ]],
    '1003' => ['user_id' => 1, 'date' => 'January 8, 2025 4:45 PM', 'total' => '1,250.00', 'items' => [
        ['name' => 'Flora', 'qty' => 1, 'size' => 'large', 'price' => '980.00', 'img' => '../img/products/fashion/flora.jpg'],
        ['name' => 'Bonnie', 'qty' => 3, 'size' => '', 'price' => '270.00', 'img' => '../img/products/vision/bonnie.jpg']
    ]],
    '1004' => ['user_id' => 2, 'date' => 'January 15, 2025 9:20 AM', 'total' => '489.00', 'items' => [
        ['name' => 'Aria', 'qty' => 1, 'size' => 'medium', 'price' => '489.00', 'img' => '../img/products/vision/aria.jpg']
    ]],
    '1005' => ['user_id' => 1, 'date' => 'January 14, 2025 11:30 AM', 'total' => '750.00', 'items' => [
        ['name' => 'Berlin', 'qty' => 1, 'size' => '', 'price' => '199.00', 'img' => '../img/products/sunglasses/berlin.jpg'],
        ['name' => 'Jess', 'qty' => 1, 'size' => '', 'price' => '389.00', 'img' => '../img/products/sunglasses/jess.jpg']
    ]]
];

// Get orders for this user - ensure proper integer comparison
$user_orders = [];
foreach ($orders_mapping as $order_id => $order_data) {
    // Ensure both are integers for strict comparison
    $order_user_id = intval($order_data['user_id']);
    if ($order_user_id === $user_id) {
        $order_data['id'] = $order_id;
        // Add status to order data
        $order_data['status'] = getOrderStatus($order_id);
        $user_orders[] = $order_data;
    }
}

// Sort orders by date (newest first)
usort($user_orders, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

// Get status with fallback to default
function getOrderStatus($order_id) {
    global $default_statuses;
    // Check if order is refunded first
    if (isset($_SESSION['order_refunds'][$order_id]) && $_SESSION['order_refunds'][$order_id]['status'] === 'refunded') {
        return 'refunded';
    }
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
    'cancelled' => 'Cancelled',
    'refunded' => 'Refunded'
];

// Status class mapping
$status_classes = [
    'pending' => 'status-pending',
    'processing' => 'status-processing',
    'shipped' => 'status-shipped',
    'delivered' => 'status-delivered',
    'cancelled' => 'status-cancelled',
    'refunded' => 'status-cancelled' // Use cancelled style for refunded
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

            <!-- Orders List - Dynamic based on logged-in user -->
            <div class="orders-list">
                <?php if (!empty($user_orders)): ?>
                    <?php foreach ($user_orders as $order): 
                        // Use status from order data if available, otherwise get it
                        $status = isset($order['status']) ? $order['status'] : getOrderStatus($order['id']);
                    ?>
                    <div class="order-card">
                        <div class="order-header">
                            <div>
                                <h5 class="mb-1">Order #<?php echo $order['id']; ?></h5>
                                <small class="text-muted">Placed on <?php echo $order['date']; ?></small>
                            </div>
                            <div class="text-end">
                                <div class="order-status <?php echo $status_classes[$status]; ?>">
                                    <?php echo $status_labels[$status]; ?>
                                </div>
                                <div class="mt-2">
                                    <strong>₱<?php echo $order['total']; ?></strong>
                                </div>
                            </div>
                        </div>

                        <div class="order-items">
                            <?php foreach ($order['items'] as $item): ?>
                            <div class="order-item">
                                <img src="<?php echo htmlspecialchars($item['img']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                                <div class="flex-fill">
                                    <div class="fw-bold"><?php echo htmlspecialchars($item['name']); ?></div>
                                    <div class="text-muted small">
                                        Qty: <?php echo $item['qty']; ?>
                                        <?php if (!empty($item['size'])): ?>
                                            &middot; Size: <?php echo htmlspecialchars($item['size']); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="text-end">
                                    ₱<?php echo number_format($item['price'], 2); ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="mt-3 text-end">
                            <a href="../order-detail.php?id=<?php echo $order['id']; ?>" class="btn btn-outline-primary btn-sm">View Details</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Empty state -->
                    <div class="empty-state">
                        <img src="../img/pageimg/empty-cart.png" alt="No orders">
                        <h3>No orders yet</h3>
                        <p class="text-muted">You haven't placed any orders yet. Start shopping to see your orders here.</p>
                        <a href="../products.php" class="btn btn-primary mt-3">Browse Products</a>
                    </div>
                <?php endif; ?>
            </div>
        
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
