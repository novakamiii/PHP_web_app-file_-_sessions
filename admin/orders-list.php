<?php
require_once '../misc/db.php';
session_start();

// Check if connection is valid
if (!isset($conn) || !$conn || !($conn instanceof mysqli)) {
    die("Database connection error. Please check your database configuration.");
}

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

// Order data with user mapping - linking to actual database users
$orders_data = [
    ['id' => '1001', 'user_id' => 1, 'amount' => '978.00', 'date' => '2025-01-12 14:30'],
    ['id' => '1002', 'user_id' => 2, 'amount' => '599.00', 'date' => '2025-01-10 10:15'],
    ['id' => '1003', 'user_id' => 1, 'amount' => '1,250.00', 'date' => '2025-01-08 16:45'],
    ['id' => '1004', 'user_id' => 2, 'amount' => '489.00', 'date' => '2025-01-15 09:20'],
    ['id' => '1005', 'user_id' => 1, 'amount' => '750.00', 'date' => '2025-01-14 11:30']
];

// Add orders from session (newly placed orders)
if (isset($_SESSION['user_orders'])) {
    foreach ($_SESSION['user_orders'] as $order_id => $order_data) {
        // Check if order already exists
        $exists = false;
        foreach ($orders_data as $existing_order) {
            if ($existing_order['id'] == $order_id) {
                $exists = true;
                break;
            }
        }
        
        if (!$exists) {
            // Format date for display
            $order_date = isset($order_data['date']) ? date('Y-m-d H:i', strtotime($order_data['date'])) : date('Y-m-d H:i');
            $orders_data[] = [
                'id' => $order_id,
                'user_id' => $order_data['user_id'],
                'amount' => str_replace(',', '', $order_data['total']),
                'date' => $order_date
            ];
        }
    }
}

// Fetch user details for orders
$user_ids = array_unique(array_column($orders_data, 'user_id'));
if (!empty($user_ids)) {
    $user_ids_str = implode(',', array_map('intval', $user_ids));
    $users_query = "SELECT id, name, email FROM users WHERE id IN ($user_ids_str)";
    $users_result = mysqli_query($conn, $users_query);
    $users_map = [];
    while ($user_row = mysqli_fetch_assoc($users_result)) {
        $users_map[$user_row['id']] = $user_row;
    }
} else {
    $users_map = [];
}

// Status mappings
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

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Orders List</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<div class="admin-layout">

  <!-- SIDEBAR -->
  <?php include 'sidebar.php'; ?> 

  <!-- MAIN -->
  <div class="main">

    <div class="topbar">
      <strong>Orders List</strong>
    </div>

    <div class="content">

      <h2>Sales Overview</h2>

      <div class="table-card">
        <table>
          <tr>
            <th>Order ID</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Order Date</th>
            <th>Action</th>
          </tr>

          <?php
          foreach ($orders_data as $order):
              $status = getOrderStatus($order['id']);
              $status_class = $status_classes[$status];
              $status_label = $status_labels[$status];
              
              // Get user info
              $user_info = isset($users_map[$order['user_id']]) ? $users_map[$order['user_id']] : null;
              $customer_name = $user_info ? htmlspecialchars($user_info['name']) : 'Unknown User';
              $customer_email = $user_info ? htmlspecialchars($user_info['email']) : 'N/A';
          ?>
          <tr>
            <td>ORD-<?php echo $order['id']; ?></td>
            <td><?php echo $customer_name; ?></td>
            <td><?php echo $customer_email; ?></td>
            <td>₱<?php echo $order['amount']; ?></td>
            <td><span class="status <?php echo $status_class; ?>"><?php echo $status_label; ?></span></td>
            <td><?php echo $order['date']; ?></td>
            <td>
              <a href="order-details.php?id=<?php echo $order['id']; ?>">View</a>
            </td>
          </tr>
          <?php endforeach; ?>

        </table>

        <!-- PAGINATION -->
        <ul class="pagination">
          <li><a href="#" class="active">1</a></li>
        </ul>

      </div>

    </div>

  </div>

</div>

</body>
</html>
