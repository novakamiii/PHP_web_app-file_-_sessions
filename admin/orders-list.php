<?php
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

// Status mappings
$status_classes = [
    'pending' => 'pending',
    'processing' => 'processing',
    'shipped' => 'processing',
    'delivered' => 'completed',
    'cancelled' => 'pending'
];

$status_labels = [
    'pending' => 'Pending',
    'processing' => 'Processing',
    'shipped' => 'Shipped',
    'delivered' => 'Delivered',
    'cancelled' => 'Cancelled'
];
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
          $orders_data = [
              ['id' => '1001', 'name' => 'John Doe', 'email' => 'john.doe@email.com', 'amount' => '978.00', 'date' => '2025-01-12 14:30'],
              ['id' => '1002', 'name' => 'Jane Smith', 'email' => 'jane.smith@email.com', 'amount' => '599.00', 'date' => '2025-01-10 10:15'],
              ['id' => '1003', 'name' => 'Michael Brown', 'email' => 'michael.brown@email.com', 'amount' => '1,250.00', 'date' => '2025-01-08 16:45'],
              ['id' => '1004', 'name' => 'Sarah Johnson', 'email' => 'sarah.j@email.com', 'amount' => '489.00', 'date' => '2025-01-15 09:20'],
              ['id' => '1005', 'name' => 'David Wilson', 'email' => 'david.wilson@email.com', 'amount' => '750.00', 'date' => '2025-01-14 11:30'],
              ['id' => '1006', 'name' => 'Emily Davis', 'email' => 'emily.d@email.com', 'amount' => '320.00', 'date' => '2025-01-11 13:45'],
              ['id' => '1007', 'name' => 'Robert Miller', 'email' => 'robert.m@email.com', 'amount' => '899.00', 'date' => '2025-01-13 15:00'],
              ['id' => '1008', 'name' => 'Lisa Anderson', 'email' => 'lisa.a@email.com', 'amount' => '1,089.00', 'date' => '2025-01-09 10:10']
          ];

          foreach ($orders_data as $order):
              $status = getOrderStatus($order['id']);
              $status_class = $status_classes[$status];
              $status_label = $status_labels[$status];
          ?>
          <tr>
            <td>ORD-<?php echo $order['id']; ?></td>
            <td><?php echo htmlspecialchars($order['name']); ?></td>
            <td><?php echo htmlspecialchars($order['email']); ?></td>
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
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">Next</a></li>
        </ul>

      </div>

    </div>

  </div>

</div>

</body>
</html>
