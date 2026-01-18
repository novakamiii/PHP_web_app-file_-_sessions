<?php
session_start();

// Initialize order statuses in session if not exists
if (!isset($_SESSION['order_statuses'])) {
    $_SESSION['order_statuses'] = [];
}

// Initialize refund statuses in session if not exists
if (!isset($_SESSION['order_refunds'])) {
    $_SESSION['order_refunds'] = [];
}

// Initialize shipping information in session if not exists
if (!isset($_SESSION['order_shipping'])) {
    $_SESSION['order_shipping'] = [];
}

// Handle refund processing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['process_refund'])) {
    $order_id = $_POST['order_id'];
    $refund_reason = isset($_POST['refund_reason']) ? $_POST['refund_reason'] : '';
    $refund_amount = $_POST['refund_amount'];
    
    // Mark order as refunded
    $_SESSION['order_refunds'][$order_id] = [
        'status' => 'refunded',
        'refunded_at' => date('Y-m-d H:i:s'),
        'refund_amount' => $refund_amount,
        'reason' => $refund_reason
    ];
    
    // Set order status to refunded
    $_SESSION['order_statuses'][$order_id] = 'refunded';
    
    header('Location: order-details.php?id=' . $order_id . '&refunded=1');
    exit;
}

// Handle status update (only if not refunded)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['status'];
    
    // Ensure order_id is string for consistent session key matching
    $order_id = (string)$order_id;
    
    // Don't allow status update if order is refunded
    if (!isset($_SESSION['order_refunds'][$order_id]) || $_SESSION['order_refunds'][$order_id]['status'] !== 'refunded') {
        $_SESSION['order_statuses'][$order_id] = $new_status;
        header('Location: order-details.php?id=' . $order_id . '&updated=1');
        exit;
    }
}

// Handle shipping information update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_shipping'])) {
    $order_id = $_POST['order_id'];
    $tracking = isset($_POST['tracking']) ? trim($_POST['tracking']) : '';
    $shipping_date = isset($_POST['shipping_date']) ? trim($_POST['shipping_date']) : '';
    $delivery_date = isset($_POST['delivery_date']) ? trim($_POST['delivery_date']) : '';
    
    // Store shipping information in session
    $_SESSION['order_shipping'][$order_id] = [
        'tracking' => $tracking,
        'shipping_date' => $shipping_date,
        'delivery_date' => $delivery_date
    ];
    
    header('Location: order-details.php?id=' . $order_id . '&shipping_updated=1');
    exit;
}

// Sample order data - in real app, this would come from database
$orders = [
    '1001' => [
        'id' => '1001',
        'customer' => 'John Doe',
        'email' => 'john.doe@email.com',
        'contact' => '09123456789',
        'address' => '123 Main Street, City, Province 1234',
        'total' => '978.00',
        'status' => 'delivered',
        'date' => 'January 12, 2025 2:30 PM',
        'items' => [
            ['name' => 'Clyde', 'qty' => 1, 'size' => 'small', 'price' => '80.00', 'img' => '../img/products/vision/clyde.jpg'],
            ['name' => 'Barbara', 'qty' => 2, 'size' => 'medium', 'price' => '798.00', 'img' => '../img/products/sunglasses/barbara.jpg']
        ],
        'shipping_method' => 'Standard Shipping',
        'tracking' => 'TRK123456789',
        'shipping_date' => 'January 13, 2025',
        'delivery_date' => 'January 15, 2025'
    ],
    '1002' => [
        'id' => '1002',
        'customer' => 'Jane Smith',
        'email' => 'jane.smith@email.com',
        'contact' => '09234567890',
        'address' => '456 Oak Avenue, Province',
        'total' => '599.00',
        'status' => 'shipped',
        'date' => 'January 10, 2025 10:15 AM',
        'items' => [
            ['name' => 'Liv', 'qty' => 1, 'size' => '', 'price' => '599.00', 'img' => '../img/products/sunglasses/liv.jpg']
        ],
        'shipping_method' => 'Express Shipping',
        'tracking' => 'TRK987654321',
        'shipping_date' => 'January 11, 2025',
        'delivery_date' => 'January 13, 2025'
    ],
    '1003' => [
        'id' => '1003',
        'customer' => 'Michael Brown',
        'email' => 'michael.brown@email.com',
        'contact' => '09345678901',
        'address' => '789 Pine Road, Metro',
        'total' => '1,250.00',
        'status' => 'processing',
        'date' => 'January 8, 2025 4:45 PM',
        'items' => [
            ['name' => 'Flora', 'qty' => 1, 'size' => 'large', 'price' => '980.00', 'img' => '../img/products/fashion/flora.jpg'],
            ['name' => 'Bonnie', 'qty' => 3, 'size' => '', 'price' => '270.00', 'img' => '../img/products/vision/bonnie.jpg']
        ],
        'shipping_method' => 'Standard Shipping',
        'tracking' => '',
        'shipping_date' => '',
        'delivery_date' => 'January 18, 2025'
    ],
    '1004' => [
        'id' => '1004',
        'customer' => 'Sarah Johnson',
        'email' => 'sarah.j@email.com',
        'contact' => '09456789012',
        'address' => '321 Elm Street, Town',
        'total' => '489.00',
        'status' => 'pending',
        'date' => 'January 15, 2025 9:20 AM',
        'items' => [
            ['name' => 'Aria', 'qty' => 1, 'size' => 'medium', 'price' => '489.00', 'img' => '../img/products/vision/aria.jpg']
        ],
        'shipping_method' => 'Standard Shipping',
        'tracking' => '',
        'shipping_date' => '',
        'delivery_date' => 'TBD'
    ],
    '1005' => [
        'id' => '1005',
        'customer' => 'David Wilson',
        'email' => 'david.wilson@email.com',
        'contact' => '09567890123',
        'address' => '654 Maple Drive, City',
        'total' => '750.00',
        'status' => 'shipped',
        'date' => 'January 14, 2025 11:30 AM',
        'items' => [
            ['name' => 'Clyden', 'qty' => 2, 'size' => 'small', 'price' => '158.00', 'img' => '../img/products/vision/clyden.jpg'],
            ['name' => 'Korange', 'qty' => 3, 'size' => 'medium', 'price' => '201.00', 'img' => '../img/products/vision/korange.jpg'],
            ['name' => 'One', 'qty' => 1, 'size' => 'large', 'price' => '391.00', 'img' => '../img/products/vision/one.jpg']
        ],
        'shipping_method' => 'Standard Shipping',
        'tracking' => 'TRK555666777',
        'shipping_date' => 'January 15, 2025',
        'delivery_date' => 'January 17, 2025'
    ],
    '1006' => [
        'id' => '1006',
        'customer' => 'Emily Davis',
        'email' => 'emily.d@email.com',
        'contact' => '09678901234',
        'address' => '987 Cedar Lane, Village',
        'total' => '320.00',
        'status' => 'delivered',
        'date' => 'January 11, 2025 1:45 PM',
        'items' => [
            ['name' => 'Masahiro', 'qty' => 1, 'size' => '', 'price' => '320.00', 'img' => '../img/products/vision/masahiro.jpg']
        ],
        'shipping_method' => 'Express Shipping',
        'tracking' => 'TRK111222333',
        'shipping_date' => 'January 12, 2025',
        'delivery_date' => 'January 14, 2025'
    ],
    '1007' => [
        'id' => '1007',
        'customer' => 'Robert Miller',
        'email' => 'robert.m@email.com',
        'contact' => '09789012345',
        'address' => '147 Birch Way, District',
        'total' => '899.00',
        'status' => 'processing',
        'date' => 'January 13, 2025 3:00 PM',
        'items' => [
            ['name' => 'Audrey', 'qty' => 1, 'size' => 'medium', 'price' => '899.00', 'img' => '../img/products/fashion/audrey.jpg']
        ],
        'shipping_method' => 'Standard Shipping',
        'tracking' => '',
        'shipping_date' => '',
        'delivery_date' => 'January 20, 2025'
    ],
    '1008' => [
        'id' => '1008',
        'customer' => 'Lisa Anderson',
        'email' => 'lisa.a@email.com',
        'contact' => '09890123456',
        'address' => '258 Spruce Court, Area',
        'total' => '1,089.00',
        'status' => 'delivered',
        'date' => 'January 9, 2025 10:10 AM',
        'items' => [
            ['name' => 'Bling', 'qty' => 1, 'size' => 'large', 'price' => '890.00', 'img' => '../img/products/fashion/bling.jpg'],
            ['name' => 'Riri', 'qty' => 1, 'size' => 'medium', 'price' => '199.00', 'img' => '../img/products/fashion/riri.jpg']
        ],
        'shipping_method' => 'Express Shipping',
        'tracking' => 'TRK444555666',
        'shipping_date' => 'January 10, 2025',
        'delivery_date' => 'January 12, 2025'
    ]
];

// Get orders from session (newly placed orders)
if (isset($_SESSION['user_orders'])) {
    foreach ($_SESSION['user_orders'] as $session_order_id => $session_order) {
        // Convert session order format to match orders array format
        $orders[$session_order_id] = [
            'id' => $session_order_id,
            'customer' => $session_order['customer_name'],
            'email' => $session_order['customer_email'],
            'contact' => $session_order['customer_contact'],
            'address' => $session_order['customer_address'],
            'total' => str_replace(',', '', $session_order['total']),
            'status' => isset($_SESSION['order_statuses'][$session_order_id]) ? $_SESSION['order_statuses'][$session_order_id] : 'pending',
            'date' => $session_order['date'],
            'items' => $session_order['items'],
            'shipping_method' => 'Standard Shipping',
            'tracking' => '',
            'shipping_date' => '',
            'delivery_date' => 'TBD'
        ];
    }
}

// Get order ID from URL parameter
$order_id = isset($_GET['id']) ? $_GET['id'] : '1001';

// Get order data or default to first order
if (isset($orders[$order_id])) {
    $order = $orders[$order_id];
} else {
    // If order not found, try to get from session
    if (isset($_SESSION['user_orders'][$order_id])) {
        $session_order = $_SESSION['user_orders'][$order_id];
        $order = [
            'id' => $order_id,
            'customer' => $session_order['customer_name'],
            'email' => $session_order['customer_email'],
            'contact' => $session_order['customer_contact'],
            'address' => $session_order['customer_address'],
            'total' => str_replace(',', '', $session_order['total']),
            'status' => isset($_SESSION['order_statuses'][$order_id]) ? $_SESSION['order_statuses'][$order_id] : 'pending',
            'date' => $session_order['date'],
            'items' => $session_order['items'],
            'shipping_method' => 'Standard Shipping',
            'tracking' => '',
            'shipping_date' => '',
            'delivery_date' => 'TBD'
        ];
    } else {
        $order = isset($orders['1001']) ? $orders['1001'] : null;
    }
}

// Check if order is refunded
$is_refunded = isset($_SESSION['order_refunds'][$order_id]) && $_SESSION['order_refunds'][$order_id]['status'] === 'refunded';
$refund_info = $is_refunded ? $_SESSION['order_refunds'][$order_id] : null;

// Override status from session if exists
if (isset($_SESSION['order_statuses'][$order_id])) {
    $order['status'] = $_SESSION['order_statuses'][$order_id];
}

// If refunded, set status to refunded
if ($is_refunded) {
    $order['status'] = 'refunded';
}

// Override shipping information from session if exists
if (isset($_SESSION['order_shipping'][$order_id])) {
    $shipping_info = $_SESSION['order_shipping'][$order_id];
    if (isset($shipping_info['tracking'])) {
        $order['tracking'] = $shipping_info['tracking'];
    }
    if (isset($shipping_info['shipping_date']) && !empty($shipping_info['shipping_date'])) {
        $order['shipping_date'] = $shipping_info['shipping_date'];
    }
    if (isset($shipping_info['delivery_date']) && !empty($shipping_info['delivery_date'])) {
        $order['delivery_date'] = $shipping_info['delivery_date'];
    }
}

// Status class mapping
$status_classes = [
    'pending' => 'pending',
    'processing' => 'processing',
    'shipped' => 'processing',
    'delivered' => 'completed',
    'cancelled' => 'pending',
    'refunded' => 'refunded'
];

$status_labels = [
    'pending' => 'Pending',
    'processing' => 'Processing',
    'shipped' => 'Shipped',
    'delivered' => 'Delivered',
    'cancelled' => 'Cancelled',
    'refunded' => 'Refunded'
];

$status_classes['refunded'] = 'pending'; // Use pending style for refunded
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order Detail</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .detail-section {
      background: #fff;
      padding: 20px 25px;
      border-radius: 12px;
      border: 1px solid #eee;
      margin-bottom: 20px;
    }

    .detail-section h3 {
      margin-bottom: 15px;
      padding-bottom: 10px;
      border-bottom: 1px solid #eee;
    }

    .detail-row {
      display: flex;
      justify-content: space-between;
      padding: 10px 0;
      border-bottom: 1px solid #f0f0f0;
    }

    .detail-row:last-child {
      border-bottom: none;
    }

    .detail-label {
      font-weight: 600;
      color: #666;
      min-width: 150px;
    }

    .detail-value {
      color: #333;
      flex: 1;
    }

    .order-items {
      margin-top: 15px;
    }

    .order-item-row {
      display: flex;
      align-items: center;
      padding: 12px 0;
      border-bottom: 1px solid #f0f0f0;
    }

    .order-item-row:last-child {
      border-bottom: none;
    }

    .order-item-img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 6px;
      margin-right: 15px;
    }

    .order-item-info {
      flex: 1;
    }

    .order-item-name {
      font-weight: 600;
      margin-bottom: 4px;
    }

    .order-item-details {
      font-size: 13px;
      color: #666;
    }

    .action-buttons {
      display: flex;
      gap: 10px;
      margin-top: 20px;
      flex-wrap: wrap;
    }

    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
      text-decoration: none;
      display: inline-block;
    }

    .btn-primary {
      background: #4f46e5;
      color: #fff;
    }

    .btn-primary:hover {
      background: #3730a3;
    }

    .btn-success {
      background: #10b981;
      color: #fff;
    }

    .btn-success:hover {
      background: #059669;
    }

    .btn-danger {
      background: #ef4444;
      color: #fff;
    }

    .btn-danger:hover {
      background: #dc2626;
    }

    .btn-secondary {
      background: #6b7280;
      color: #fff;
    }

    .btn-secondary:hover {
      background: #4b5563;
    }

    .status-select {
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      margin-left: 10px;
    }

    .alert {
      padding: 12px 20px;
      margin-bottom: 20px;
      border-radius: 6px;
      background: #d1e7dd;
      color: #0f5132;
      border: 1px solid #badbcc;
    }

    form {
      display: inline;
    }

    .refund-modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
    }

    .refund-modal-content {
      background-color: #fff;
      margin: 10% auto;
      padding: 25px;
      border-radius: 12px;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    .refund-modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid #eee;
    }

    .refund-modal-header h3 {
      margin: 0;
    }

    .close-modal {
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
      color: #666;
    }

    .close-modal:hover {
      color: #000;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
      color: #333;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      box-sizing: border-box;
    }

    .form-group textarea {
      resize: vertical;
      min-height: 80px;
    }

    .refund-actions {
      display: flex;
      gap: 10px;
      justify-content: flex-end;
      margin-top: 20px;
    }
  </style>
</head>
<body>

<div class="admin-layout">

  <!-- SIDEBAR -->
  <?php include 'sidebar.php'; ?> 

  <!-- MAIN -->
  <div class="main">

    <div class="topbar">
      <strong>Order Detail</strong>
    </div>

    <div class="content">

      <div style="margin-bottom: 20px;">
        <a href="orders-list.php" style="color: #4f46e5; text-decoration: none;">
          <i class="fas fa-arrow-left"></i> Back to Orders List
        </a>
      </div>

      <?php if (isset($_GET['updated']) && $_GET['updated'] == '1'): ?>
        <div class="alert">
          Order status updated successfully!
        </div>
      <?php endif; ?>

      <?php if (isset($_GET['refunded']) && $_GET['refunded'] == '1'): ?>
        <div class="alert" style="background: #d1e7dd; color: #0f5132; border: 1px solid #badbcc;">
          Refund processed successfully! Amount: ₱<?php echo isset($refund_info['refund_amount']) ? $refund_info['refund_amount'] : $order['total']; ?>
        </div>
      <?php endif; ?>

      <?php if (isset($_GET['shipping_updated']) && $_GET['shipping_updated'] == '1'): ?>
        <div class="alert" style="background: #d1e7dd; color: #0f5132; border: 1px solid #badbcc;">
          Shipping information updated successfully!
        </div>
      <?php endif; ?>

      <?php if ($is_refunded && $refund_info): ?>
        <div class="alert" style="background: #fff3cd; color: #856404; border: 1px solid #ffc107;">
          <strong>Refunded:</strong> This order was refunded on <?php echo date('F j, Y g:i A', strtotime($refund_info['refunded_at'])); ?>
          <?php if (!empty($refund_info['reason'])): ?>
            <br><small>Reason: <?php echo htmlspecialchars($refund_info['reason']); ?></small>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <h2>Order #ORD-<?php echo $order['id']; ?></h2>

      <!-- Order Information -->
      <div class="detail-section">
        <h3>Order Information</h3>
        <div class="detail-row">
          <span class="detail-label">Order ID:</span>
          <span class="detail-value">ORD-<?php echo $order['id']; ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Order Date:</span>
          <span class="detail-value"><?php echo $order['date']; ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Order Status:</span>
          <span class="detail-value">
            <span class="status <?php echo $status_classes[$order['status']]; ?>"><?php echo $status_labels[$order['status']]; ?></span>
            <?php if (!$is_refunded): ?>
            <form method="POST" style="display: inline-block;">
              <input type="hidden" name="update_status" value="1">
              <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
              <select name="status" class="status-select" onchange="this.form.submit()">
                <option value="pending" <?php echo $order['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="processing" <?php echo $order['status'] == 'processing' ? 'selected' : ''; ?>>Processing</option>
                <option value="shipped" <?php echo $order['status'] == 'shipped' ? 'selected' : ''; ?>>Shipped</option>
                <option value="delivered" <?php echo $order['status'] == 'delivered' ? 'selected' : ''; ?>>Delivered</option>
                <option value="cancelled" <?php echo $order['status'] == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
              </select>
            </form>
            <?php else: ?>
            <span style="color: #856404; font-size: 12px; margin-left: 10px;">(Status locked - Order refunded)</span>
            <?php endif; ?>
          </span>
        </div>
        <?php if ($is_refunded && $refund_info): ?>
        <div class="detail-row">
          <span class="detail-label">Refund Amount:</span>
          <span class="detail-value" style="color: #dc2626; font-weight: 600;">₱<?php echo number_format($refund_info['refund_amount'], 2); ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Refund Date:</span>
          <span class="detail-value"><?php echo date('F j, Y g:i A', strtotime($refund_info['refunded_at'])); ?></span>
        </div>
        <?php endif; ?>
        <div class="detail-row">
          <span class="detail-label">Total Amount:</span>
          <span class="detail-value" style="font-weight: 600; font-size: 18px;">₱<?php echo $order['total']; ?></span>
        </div>
      </div>

      <!-- Customer Information -->
      <div class="detail-section">
        <h3>Customer Information</h3>
        <div class="detail-row">
          <span class="detail-label">Name:</span>
          <span class="detail-value"><?php echo htmlspecialchars($order['customer']); ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Email:</span>
          <span class="detail-value"><?php echo htmlspecialchars($order['email']); ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Contact:</span>
          <span class="detail-value"><?php echo htmlspecialchars($order['contact']); ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Address:</span>
          <span class="detail-value"><?php echo htmlspecialchars($order['address']); ?></span>
        </div>
      </div>

      <!-- Order Items -->
      <div class="detail-section">
        <h3>Order Items</h3>
        <div class="order-items">
          <?php foreach ($order['items'] as $item): ?>
          <div class="order-item-row">
            <img src="<?php echo htmlspecialchars($item['img']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="order-item-img">
            <div class="order-item-info">
              <div class="order-item-name"><?php echo htmlspecialchars($item['name']); ?></div>
              <div class="order-item-details">
                Qty: <?php echo $item['qty']; ?>
                <?php if (!empty($item['size'])): ?>
                  • Size: <?php echo htmlspecialchars($item['size']); ?>
                <?php endif; ?>
              </div>
            </div>
            <div style="font-weight: 600;">₱<?php echo number_format($item['price'], 2); ?></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Shipping Information -->
      <div class="detail-section">
        <h3>Shipping Information</h3>
        <form method="POST" id="shipping-form">
          <input type="hidden" name="update_shipping" value="1">
          <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
          <div class="detail-row">
            <span class="detail-label">Shipping Method:</span>
            <span class="detail-value"><?php echo htmlspecialchars($order['shipping_method']); ?></span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Tracking Number:</span>
            <span class="detail-value">
              <input type="text" name="tracking" value="<?php echo htmlspecialchars($order['tracking']); ?>" style="padding: 6px; border: 1px solid #ccc; border-radius: 4px; width: 200px;" placeholder="Enter tracking number">
            </span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Shipping Date:</span>
            <span class="detail-value">
              <input type="date" name="shipping_date" value="<?php echo $order['shipping_date'] ? date('Y-m-d', strtotime($order['shipping_date'])) : ''; ?>" style="padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
              <?php if (empty($order['shipping_date'])): ?>
                <span style="color: #666; margin-left: 10px; font-size: 13px;">Not yet shipped</span>
              <?php endif; ?>
            </span>
          </div>
          <div class="detail-row">
            <span class="detail-label">Estimated Delivery:</span>
            <span class="detail-value">
              <input type="date" name="delivery_date" value="<?php echo (!empty($order['delivery_date']) && $order['delivery_date'] !== 'TBD') ? (is_numeric(strtotime($order['delivery_date'])) ? date('Y-m-d', strtotime($order['delivery_date'])) : '') : ''; ?>" style="padding: 6px; border: 1px solid #ccc; border-radius: 4px;">
              <?php if (empty($order['delivery_date']) || $order['delivery_date'] === 'TBD'): ?>
                <span style="color: #666; margin-left: 10px; font-size: 13px;">TBD</span>
              <?php endif; ?>
            </span>
          </div>
          <div class="detail-row" style="padding-top: 15px; border-top: 2px solid #eee; margin-top: 10px;">
            <span class="detail-label"></span>
            <span class="detail-value">
              <button type="submit" class="btn btn-success" style="margin: 0;">
                <i class="fas fa-save"></i> Save Shipping Information
              </button>
            </span>
          </div>
        </form>
      </div>

      <!-- Actions -->
      <div class="detail-section">
        <h3>Actions</h3>
        <div class="action-buttons">
          <?php if (!$is_refunded): ?>
          <button class="btn btn-primary" onclick="alert('Invoice will be sent to <?php echo htmlspecialchars($order['email']); ?>')">
            <i class="fas fa-file-invoice"></i> Send Invoice
          </button>
          <button class="btn btn-danger" onclick="openRefundModal()">
            <i class="fas fa-undo"></i> Process Refund
          </button>
          <?php else: ?>
          <button class="btn btn-secondary" disabled style="opacity: 0.6; cursor: not-allowed;">
            <i class="fas fa-undo"></i> Already Refunded
          </button>
          <?php endif; ?>
          <a href="orders-list.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Orders
          </a>
        </div>
      </div>

      <!-- Refund Modal -->
      <div id="refundModal" class="refund-modal">
        <div class="refund-modal-content">
          <div class="refund-modal-header">
            <h3>Process Refund</h3>
            <button class="close-modal" onclick="closeRefundModal()">&times;</button>
          </div>
          <form method="POST" id="refundForm">
            <input type="hidden" name="process_refund" value="1">
            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
            
            <div class="form-group">
              <label>Order Total:</label>
              <input type="text" value="₱<?php echo $order['total']; ?>" readonly style="background: #f3f4f6;">
            </div>

            <div class="form-group">
              <label for="refund_amount">Refund Amount <span style="color: #dc3545;">*</span>:</label>
              <input type="number" id="refund_amount" name="refund_amount" step="0.01" min="0" max="<?php echo str_replace(',', '', $order['total']); ?>" value="<?php echo str_replace(',', '', $order['total']); ?>" required>
            </div>

            <div class="form-group">
              <label for="refund_reason">Refund Reason (Optional):</label>
              <textarea id="refund_reason" name="refund_reason" placeholder="Enter reason for refund..."></textarea>
            </div>

            <div class="refund-actions">
              <button type="button" class="btn btn-secondary" onclick="closeRefundModal()">Cancel</button>
              <button type="submit" class="btn btn-danger" onclick="return confirmRefund()">
                <i class="fas fa-undo"></i> Process Refund
              </button>
            </div>
          </form>
        </div>
      </div>

      <script>
        function openRefundModal() {
          document.getElementById('refundModal').style.display = 'block';
        }

        function closeRefundModal() {
          document.getElementById('refundModal').style.display = 'none';
        }

        function confirmRefund() {
          const amount = document.getElementById('refund_amount').value;
          return confirm('Are you sure you want to process a refund of ₱' + parseFloat(amount).toFixed(2) + '? This action cannot be undone.');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
          const modal = document.getElementById('refundModal');
          if (event.target == modal) {
            closeRefundModal();
          }
        }
      </script>

    </div>

  </div>

</div>

</body>
</html>
