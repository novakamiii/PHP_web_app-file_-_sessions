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

      <h2>Order #ORD-1001</h2>

      <!-- Order Information -->
      <div class="detail-section">
        <h3>Order Information</h3>
        <div class="detail-row">
          <span class="detail-label">Order ID:</span>
          <span class="detail-value">ORD-1001</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Order Date:</span>
          <span class="detail-value">January 12, 2025 2:30 PM</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Order Status:</span>
          <span class="detail-value">
            <span class="status completed">Delivered</span>
            <select class="status-select">
              <option value="pending">Pending</option>
              <option value="processing">Processing</option>
              <option value="shipped">Shipped</option>
              <option value="delivered" selected>Delivered</option>
              <option value="cancelled">Cancelled</option>
            </select>
          </span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Total Amount:</span>
          <span class="detail-value" style="font-weight: 600; font-size: 18px;">₱978.00</span>
        </div>
      </div>

      <!-- Customer Information -->
      <div class="detail-section">
        <h3>Customer Information</h3>
        <div class="detail-row">
          <span class="detail-label">Name:</span>
          <span class="detail-value">John Doe</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Email:</span>
          <span class="detail-value">john.doe@email.com</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Contact:</span>
          <span class="detail-value">09123456789</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Address:</span>
          <span class="detail-value">123 Main Street, City, Province 1234</span>
        </div>
      </div>

      <!-- Order Items -->
      <div class="detail-section">
        <h3>Order Items</h3>
        <div class="order-items">
          <div class="order-item-row">
            <img src="../img/products/vision/clyde.jpg" alt="Clyde" class="order-item-img">
            <div class="order-item-info">
              <div class="order-item-name">Clyde</div>
              <div class="order-item-details">Qty: 1 • Size: small</div>
            </div>
            <div style="font-weight: 600;">₱80.00</div>
          </div>
          <div class="order-item-row">
            <img src="../img/products/sunglasses/barbara.jpg" alt="Barbara" class="order-item-img">
            <div class="order-item-info">
              <div class="order-item-name">Barbara</div>
              <div class="order-item-details">Qty: 2 • Size: medium</div>
            </div>
            <div style="font-weight: 600;">₱798.00</div>
          </div>
        </div>
      </div>

      <!-- Shipping Information -->
      <div class="detail-section">
        <h3>Shipping Information</h3>
        <div class="detail-row">
          <span class="detail-label">Shipping Method:</span>
          <span class="detail-value">Standard Shipping</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Tracking Number:</span>
          <span class="detail-value">
            <input type="text" value="TRK123456789" style="padding: 6px; border: 1px solid #ccc; border-radius: 4px; width: 200px;">
          </span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Shipping Date:</span>
          <span class="detail-value">January 13, 2025</span>
        </div>
        <div class="detail-row">
          <span class="detail-label">Estimated Delivery:</span>
          <span class="detail-value">January 15, 2025</span>
        </div>
      </div>

      <!-- Actions -->
      <div class="detail-section">
        <h3>Actions</h3>
        <div class="action-buttons">
          <button class="btn btn-success">
            <i class="fas fa-shipping-fast me-2"></i>Update Shipping Status
          </button>
          <button class="btn btn-primary">
            <i class="fas fa-file-invoice me-2"></i>Send Invoice
          </button>
          <button class="btn btn-danger">
            <i class="fas fa-undo me-2"></i>Process Refund
          </button>
          <a href="orders-list.php" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Orders
          </a>
        </div>
      </div>

    </div>

  </div>

</div>

</body>
</html>
