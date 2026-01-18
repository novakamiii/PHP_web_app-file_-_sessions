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

      <h2>User #1 - John Doe</h2>

      <!-- User Information -->
      <div class="detail-section">
        <h3>User Information</h3>
        <div class="detail-row">
          <span class="detail-label">User ID:</span>
          <span class="detail-value">1</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Full Name:</span>
          <span class="detail-value">John Doe</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Email:</span>
          <span class="detail-value">john.doe@email.com</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Contact Number:</span>
          <span class="detail-value">09123456789</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Address:</span>
          <span class="detail-value">123 Main Street, City, Province 1234</span>
        </div>
      </div>

      <!-- Account Information -->
      <div class="detail-section">
        <h3>Account Information</h3>
        <div class="detail-row">
          <span class="detail-label">Registration Date:</span>
          <span class="detail-value">January 1, 2025 10:00 AM</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Last Session:</span>
          <span class="detail-value">January 15, 2025 2:30 PM</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Account Status:</span>
          <span class="detail-value">
            <span class="status completed">Active</span>
          </span>
        </div>
      </div>

      <!-- Order History -->
      <div class="detail-section">
        <h3>Order History</h3>
        <div class="table-card" style="margin-top: 15px;">
          <table>
            <tr>
              <th>Order ID</th>
              <th>Date</th>
              <th>Total Amount</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <tr>
              <td>ORD-1001</td>
              <td>2025-01-12</td>
              <td>₱978.00</td>
              <td><span class="status completed">Delivered</span></td>
              <td><a href="orders-details.php?id=1001">View</a></td>
            </tr>
            <tr>
              <td>ORD-1005</td>
              <td>2025-01-08</td>
              <td>₱450.00</td>
              <td><span class="status completed">Delivered</span></td>
              <td><a href="orders-details.php?id=1005">View</a></td>
            </tr>
            <tr>
              <td>ORD-1009</td>
              <td>2025-01-05</td>
              <td>₱320.00</td>
              <td><span class="status processing">Shipped</span></td>
              <td><a href="orders-details.php?id=1009">View</a></td>
            </tr>
          </table>
        </div>
      </div>

      <!-- Actions -->
      <div class="detail-section">
        <h3>Actions</h3>
        <div class="action-buttons">
          <button class="btn btn-primary">
            <i class="fas fa-envelope me-2"></i>Send Email
          </button>
          <button class="btn btn-danger">
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
