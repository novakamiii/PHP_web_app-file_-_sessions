<?php
require_once '../misc/db.php';
session_start();

// Check if connection is valid
if (!isset($conn) || !$conn || !($conn instanceof mysqli)) {
    die("Database connection error. Please check your database configuration.");
}

// Initialize refund statuses in session if not exists
if (!isset($_SESSION['order_refunds'])) {
    $_SESSION['order_refunds'] = [];
}

// Initialize order statuses in session if not exists
if (!isset($_SESSION['order_statuses'])) {
    $_SESSION['order_statuses'] = [];
}

// Function to get order status (checking refunds first)
function getOrderStatusForUser($order_id) {
    // Check if order is refunded first
    if (isset($_SESSION['order_refunds'][$order_id]) && $_SESSION['order_refunds'][$order_id]['status'] === 'refunded') {
        return 'refunded';
    }
    // Check regular status
    if (isset($_SESSION['order_statuses'][$order_id])) {
        return $_SESSION['order_statuses'][$order_id];
    }
    return 'pending';
}

// Order data with user mapping
$orders_mapping = [
    '1001' => ['user_id' => 1, 'date' => '2025-01-12 14:30', 'total' => '978.00', 'items' => [
        ['name' => 'Clyde', 'qty' => 1, 'size' => 'small', 'price' => '80.00'],
        ['name' => 'Barbara', 'qty' => 2, 'size' => 'medium', 'price' => '798.00']
    ]],
    '1002' => ['user_id' => 2, 'date' => '2025-01-10 10:15', 'total' => '599.00', 'items' => [
        ['name' => 'Liv', 'qty' => 1, 'size' => '', 'price' => '599.00']
    ]],
    '1003' => ['user_id' => 1, 'date' => '2025-01-08 16:45', 'total' => '1,250.00', 'items' => [
        ['name' => 'Audrey', 'qty' => 1, 'size' => 'medium', 'price' => '899.00'],
        ['name' => 'Seine', 'qty' => 1, 'size' => '', 'price' => '299.00']
    ]],
    '1004' => ['user_id' => 2, 'date' => '2025-01-15 09:20', 'total' => '489.00', 'items' => [
        ['name' => 'Aria', 'qty' => 1, 'size' => 'small', 'price' => '68.00'],
        ['name' => 'Bonnie', 'qty' => 1, 'size' => 'medium', 'price' => '90.00']
    ]],
    '1005' => ['user_id' => 1, 'date' => '2025-01-14 11:30', 'total' => '750.00', 'items' => [
        ['name' => 'Berlin', 'qty' => 1, 'size' => '', 'price' => '199.00'],
        ['name' => 'Jess', 'qty' => 1, 'size' => '', 'price' => '389.00']
    ]]
];

// Default order statuses
$default_statuses = [
    '1001' => 'delivered',
    '1002' => 'shipped',
    '1003' => 'processing',
    '1004' => 'pending',
    '1005' => 'shipped'
];

// Get user ID from URL parameter
$user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($user_id <= 0) {
    header('Location: users-list.php');
    exit;
}

// Fetch user data from database
$query = "SELECT id, name, email, contact, address, reg_date, last_session FROM users WHERE id = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$user) {
    header('Location: users-list.php');
    exit;
}

// Fetch cart items for this user
$cart_query = "SELECT prod_name, quantity, price, frame_size, dateadded FROM cart WHERE usr_id = ? ORDER BY dateadded DESC";
$cart_stmt = mysqli_prepare($conn, $cart_query);
mysqli_stmt_bind_param($cart_stmt, "i", $user_id);
mysqli_stmt_execute($cart_stmt);
$cart_result = mysqli_stmt_get_result($cart_stmt);
$cart_items = [];
while ($cart_item = mysqli_fetch_assoc($cart_result)) {
    $cart_items[] = $cart_item;
}
mysqli_stmt_close($cart_stmt);

// Get orders for this user
$user_orders = [];
foreach ($orders_mapping as $order_id => $order_data) {
    if ($order_data['user_id'] == $user_id) {
        $order_data['id'] = $order_id;
        $order_data['status'] = getOrderStatusForUser($order_id);
        if ($order_data['status'] === 'pending' && isset($default_statuses[$order_id])) {
            $order_data['status'] = $default_statuses[$order_id];
        }
        $user_orders[] = $order_data;
    }
}

// Sort orders by date (newest first)
usort($user_orders, function($a, $b) {
    return strtotime($b['date']) - strtotime($a['date']);
});

// Format dates
$reg_date = $user['reg_date'] ? date('F j, Y g:i A', strtotime($user['reg_date'])) : 'N/A';
$last_session = $user['last_session'] ? date('F j, Y g:i A', strtotime($user['last_session'])) : 'Never';

// Status class mapping for orders
$order_status_classes = [
    'pending' => 'pending',
    'processing' => 'processing',
    'shipped' => 'processing',
    'delivered' => 'completed',
    'cancelled' => 'pending',
    'refunded' => 'refunded'
];

$order_status_labels = [
    'pending' => 'Pending',
    'processing' => 'Processing',
    'shipped' => 'Shipped',
    'delivered' => 'Delivered',
    'cancelled' => 'Cancelled',
    'refunded' => 'Refunded'
];

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Detail</title>
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

    .action-buttons {
      display: flex;
      gap: 10px;
      margin-top: 20px;
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

    .cart-item-row {
      display: flex;
      align-items: center;
      padding: 10px 0;
      border-bottom: 1px solid #f0f0f0;
    }

    .cart-item-row:last-child {
      border-bottom: none;
    }

    .cart-item-name {
      font-weight: 600;
      margin-bottom: 4px;
    }

    .cart-item-details {
      font-size: 13px;
      color: #666;
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
      <strong>User Detail</strong>
    </div>

    <div class="content">

      <div style="margin-bottom: 20px;">
        <a href="users-list.php" style="color: #4f46e5; text-decoration: none;">
          <i class="fas fa-arrow-left"></i> Back to Users List
        </a>
      </div>

      <h2>User #<?php echo $user['id']; ?> - <?php echo htmlspecialchars($user['name']); ?></h2>

      <!-- User Information -->
      <div class="detail-section">
        <h3>User Information</h3>
        <div class="detail-row">
          <span class="detail-label">User ID:</span>
          <span class="detail-value"><?php echo $user['id']; ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Full Name:</span>
          <span class="detail-value"><?php echo htmlspecialchars($user['name']); ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Email:</span>
          <span class="detail-value"><?php echo htmlspecialchars($user['email']); ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Contact Number:</span>
          <span class="detail-value"><?php echo htmlspecialchars($user['contact']); ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Address:</span>
          <span class="detail-value"><?php echo htmlspecialchars($user['address']); ?></span>
        </div>
      </div>

      <!-- Account Information -->
      <div class="detail-section">
        <h3>Account Information</h3>
        <div class="detail-row">
          <span class="detail-label">Registration Date:</span>
          <span class="detail-value"><?php echo $reg_date; ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Last Session:</span>
          <span class="detail-value"><?php echo $last_session; ?></span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Account Status:</span>
          <span class="detail-value">
            <span class="status completed">Active</span>
          </span>
        </div>
      </div>

      <!-- Cart Items -->
      <div class="detail-section">
        <h3>Cart Items</h3>
        <?php if (!empty($cart_items)): ?>
        <div class="table-card" style="margin-top: 15px;">
          <table>
            <tr>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Size</th>
              <th>Price</th>
              <th>Date Added</th>
            </tr>
            <?php 
            $total_cart_value = 0;
            foreach ($cart_items as $item): 
                $total_cart_value += $item['price'];
                $date_added = date('Y-m-d H:i', strtotime($item['dateadded']));
            ?>
            <tr>
              <td><?php echo htmlspecialchars($item['prod_name']); ?></td>
              <td><?php echo $item['quantity']; ?></td>
              <td><?php echo htmlspecialchars($item['frame_size'] ?: 'N/A'); ?></td>
              <td>₱<?php echo number_format($item['price'], 2); ?></td>
              <td><?php echo $date_added; ?></td>
            </tr>
            <?php endforeach; ?>
            <tr style="background: #f3f4f6; font-weight: 600;">
              <td colspan="3" style="text-align: right;">Total Cart Value:</td>
              <td colspan="2">₱<?php echo number_format($total_cart_value, 2); ?></td>
            </tr>
          </table>
        </div>
        <?php else: ?>
        <p style="color: #666; margin-top: 15px;">This user has no items in their cart.</p>
        <?php endif; ?>
      </div>

      <!-- Order History -->
      <div class="detail-section">
        <h3>Order History</h3>
        <?php if (!empty($user_orders)): ?>
        <div class="table-card" style="margin-top: 15px;">
          <table>
            <tr>
              <th>Order ID</th>
              <th>Date</th>
              <th>Total Amount</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <?php foreach ($user_orders as $order): 
                $order_date = date('Y-m-d H:i', strtotime($order['date']));
                $status = $order['status'];
            ?>
            <tr>
              <td>ORD-<?php echo $order['id']; ?></td>
              <td><?php echo $order_date; ?></td>
              <td>₱<?php echo $order['total']; ?></td>
              <td><span class="status <?php echo $order_status_classes[$status]; ?>"><?php echo $order_status_labels[$status]; ?></span></td>
              <td><a href="order-details.php?id=<?php echo $order['id']; ?>">View</a></td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <?php else: ?>
        <p style="color: #666; margin-top: 15px;">This user has no orders yet.</p>
        <?php endif; ?>
      </div>

      <!-- Actions -->
      <div class="detail-section">
        <h3>Actions</h3>
        <div class="action-buttons">
          <button class="btn btn-primary" onclick="alert('Email will be sent to <?php echo htmlspecialchars($user['email']); ?>')">
            <i class="fas fa-envelope me-2"></i>Send Email
          </button>
          <button class="btn btn-danger" onclick="if(confirm('Are you sure you want to suspend this account?')) { alert('Account suspended'); }">
            <i class="fas fa-ban me-2"></i>Suspend Account
          </button>
          <a href="users-list.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Users
          </a>
        </div>
      </div>

    </div>

  </div>

</div>

</body>
</html>
