<?php
include 'misc/headernavfooter.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$order_id = isset($_GET['id']) ? $_GET['id'] : null;

// Initialize order statuses and refunds
if (!isset($_SESSION['order_statuses'])) {
    $_SESSION['order_statuses'] = [];
}
if (!isset($_SESSION['order_refunds'])) {
    $_SESSION['order_refunds'] = [];
}

// Sample orders (for backward compatibility)
$sample_orders = [
    '1001' => [
        'id' => '1001',
        'user_id' => 1,
        'date' => 'January 12, 2025 2:30 PM',
        'total' => '978.00',
        'subtotal' => '878.00',
        'shipping' => '100.00',
        'customer_name' => 'John Doe',
        'customer_email' => 'john.doe@email.com',
        'customer_contact' => '09123456789',
        'customer_address' => '123 Main Street, City, Province 1234',
        'items' => [
            ['name' => 'Clyde', 'qty' => 1, 'size' => 'small', 'price' => '80.00', 'unit_price' => '80.00', 'img' => 'img/products/vision/clyde.jpg'],
            ['name' => 'Barbara', 'qty' => 2, 'size' => 'medium', 'price' => '798.00', 'unit_price' => '399.00', 'img' => 'img/products/sunglasses/barbara.jpg']
        ]
    ],
    '1002' => [
        'id' => '1002',
        'user_id' => 2,
        'date' => 'January 10, 2025 10:15 AM',
        'total' => '599.00',
        'subtotal' => '499.00',
        'shipping' => '100.00',
        'customer_name' => 'Jane Smith',
        'customer_email' => 'jane.smith@email.com',
        'customer_contact' => '09234567890',
        'customer_address' => '456 Oak Avenue, Province',
        'items' => [
            ['name' => 'Liv', 'qty' => 1, 'size' => '', 'price' => '599.00', 'unit_price' => '599.00', 'img' => 'img/products/sunglasses/liv.jpg']
        ]
    ]
];

// Get order from session or sample orders
$order = null;
if ($order_id) {
    // Check session orders first
    if (isset($_SESSION['user_orders'][$order_id])) {
        $session_order = $_SESSION['user_orders'][$order_id];
        // Verify it belongs to current user
        if ($session_order['user_id'] == $user_id) {
            $order = [
                'id' => $order_id,
                'date' => $session_order['date'],
                'total' => $session_order['total'],
                'subtotal' => $session_order['subtotal'],
                'shipping' => $session_order['shipping'],
                'customer_name' => $session_order['customer_name'],
                'customer_email' => $session_order['customer_email'],
                'customer_contact' => $session_order['customer_contact'],
                'customer_address' => $session_order['customer_address'],
                'items' => $session_order['items']
            ];
        }
    } 
    // Check sample orders
    elseif (isset($sample_orders[$order_id])) {
        $sample_order = $sample_orders[$order_id];
        // Verify it belongs to current user
        if ($sample_order['user_id'] == $user_id) {
            $order = $sample_order;
        }
    }
}

// Redirect if order not found or doesn't belong to user
if (!$order) {
    header('Location: profile/orders-list.php');
    exit;
}

// Get order status
function getOrderStatus($order_id) {
    if (isset($_SESSION['order_refunds'][$order_id]) && $_SESSION['order_refunds'][$order_id]['status'] === 'refunded') {
        return 'refunded';
    }
    if (isset($_SESSION['order_statuses'][$order_id])) {
        return $_SESSION['order_statuses'][$order_id];
    }
    return 'pending';
}

$order_status = getOrderStatus($order_id);
$status_labels = [
    'pending' => 'Pending',
    'processing' => 'Processing',
    'shipped' => 'Shipped',
    'delivered' => 'Delivered',
    'cancelled' => 'Cancelled',
    'refunded' => 'Refunded'
];
$status_classes = [
    'pending' => 'status-pending',
    'processing' => 'status-processing',
    'shipped' => 'status-shipped',
    'delivered' => 'status-delivered',
    'cancelled' => 'status-cancelled',
    'refunded' => 'status-cancelled'
];
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
                            <strong>Order #<?php echo $order['id']; ?></strong><br>
                            <small class="text-muted">Date: <?php echo htmlspecialchars($order['date']); ?></small>
                        </div>
                        <div class="text-end">
                            <span class="status-badge <?php echo $status_classes[$order_status]; ?>">
                                <?php echo $status_labels[$order_status]; ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Billing & Shipping Info -->
                <div class="row invoice-section">
                    <div class="col-md-6">
                        <h5>Billing Information</h5>
                        <div>
                            <strong><?php echo htmlspecialchars($order['customer_name']); ?></strong><br>
                            <?php echo htmlspecialchars($order['customer_email']); ?><br>
                            <?php echo htmlspecialchars($order['customer_contact']); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Shipping Address</h5>
                        <div>
                            <?php echo nl2br(htmlspecialchars($order['customer_address'])); ?>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="invoice-section">
                    <h5>Order Items</h5>
                    <div>
                        <?php foreach ($order['items'] as $item): 
                            $unit_price = isset($item['unit_price']) ? $item['unit_price'] : (floatval($item['price']) / floatval($item['qty']));
                        ?>
                        <div class="invoice-item">
                            <img src="<?php echo htmlspecialchars($item['img']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                            <div class="invoice-item-details">
                                <div class="fw-bold"><?php echo htmlspecialchars($item['name']); ?></div>
                                <div class="text-muted small">
                                    Quantity: <?php echo $item['qty']; ?>
                                    <?php if (!empty($item['size'])): ?>
                                        &middot; Size: <?php echo htmlspecialchars($item['size']); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="text-end">
                                <div>₱<?php echo number_format($unit_price, 2); ?> × <?php echo $item['qty']; ?></div>
                                <div class="fw-bold">₱<?php echo $item['price']; ?></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Payment Information -->
                <div class="invoice-section">
                    <h5>Payment Information</h5>
                    <div>
                        <strong>Payment Method:</strong> Card<br>
                        <strong>Transaction ID:</strong> <?php echo 'TXN-' . $order['id']; ?><br>
                        <strong>Payment Status:</strong> 
                        <span class="status-badge <?php echo $status_classes[$order_status]; ?>">
                            <?php echo $status_labels[$order_status]; ?>
                        </span>
                    </div>
                </div>

                <!-- Invoice Summary -->
                <div class="invoice-summary">
                    <div class="summary-row">
                        <span>Subtotal:</span>
                        <span>₱<?php echo $order['subtotal']; ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Shipping:</span>
                        <span>₱<?php echo $order['shipping']; ?></span>
                    </div>
                    <div class="summary-row total">
                        <span>Total:</span>
                        <span>₱<?php echo $order['total']; ?></span>
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
