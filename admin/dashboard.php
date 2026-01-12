<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="assets/css/style.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


</head>
<body>

<div class="admin-layout">

  <!-- SIDEBAR -->
  <aside class="sidebar">

    <div class="brand">
      <div class="brand-circle">E</div>
      <div>
        <strong>Eyewear</strong><br>
        <small>Admin Panel</small>
      </div>
    </div>

    <div class="menu-title">MENU</div>

    <a href="dashboard.php" class="menu-link">Dashboard</a>

    <input type="checkbox" id="products">
    <label for="products" class="menu-link">Products</label>
    <div class="submenu">
      <a href="productlist.php">Products List</a>
      <a href="product-form.php">Add Product</a>
    </div>

    <input type="checkbox" id="orders">
    <label for="orders" class="menu-link">Orders</label>
    <div class="submenu">
      <a href="orders-list.php">Orders List</a>
      <a href="order-details.php">Order Details</a>
    </div>

    <input type="checkbox" id="users">
    <label for="users" class="menu-link">Users</label>
    <div class="submenu">
      <a href="users-list.php">Users List</a>
      <a href="user-details.php">User Details</a>
    </div>

    <a href="payments.php" class="menu-link">Payments</a>
    <a href="messages.php" class="menu-link">Messages</a>

  </aside>

  <!-- MAIN -->
  <div class="main">

<div class="topbar">
  <strong>Admin Dashboard</strong>

  <div class="profile-dropdown">
    <!-- Checkbox to toggle dropdown -->
    <input type="checkbox" id="profile-toggle">
    <label for="profile-toggle" class="profile-icon">
      <i class="fas fa-user-circle"></i> <!-- FontAwesome icon -->
    </label>

    <div class="dropdown-menu">
      <a href="login.php">Logout</a>
    </div>
  </div>
</div>



 <div class="content">

  <h1>Dashboard</h1>
  <p>Welcome back! Here’s what’s happening with your store.</p>

  <!-- STATS CARDS -->
  <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:20px; margin:30px 0;">

    <div style="background:#fff; padding:20px; border-radius:10px;">
      <small>Total Products</small>
      <h2>248</h2>
      <small>5 Low Stock • 15 Best Sellers</small>
    </div>

    <div style="background:#fff; padding:20px; border-radius:10px;">
      <small>Total Orders</small>
      <h2>20</h2>
      <small>12 Pending • 156 Completed</small>
    </div>

    <div style="background:#fff; padding:20px; border-radius:10px;">
      <small>Total Users</small>
      <h2>1,284</h2>
      <small>+23 This Week</small>
    </div>

  </div>

  <!-- RECENT ORDERS -->
  <div class="table-card">
    <h3>Recent Orders</h3>
    <small>Latest orders from your eyewear store</small>

    <table>
      <tr>
        <th>Order ID</th>
        <th>Customer</th>
        <th>Product</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Date</th>
      </tr>

      <tr>
        <td>ORD-001</td>
        <td>Sarah Johnson</td>
        <td>Classic Aviator</td>
        <td>₱249.99</td>
        <td><span class="status pending">Pending</span></td>
        <td>2024-01-15</td>
      </tr>

      <tr>
        <td>ORD-002</td>
        <td>Michael Chen</td>
        <td>Retro Round</td>
        <td>₱189.99</td>
        <td><span class="status completed">Completed</span></td>
        <td>2024-01-15</td>
      </tr>

      <tr>
        <td>ORD-003</td>
        <td>Linda Smith</td>
        <td>Round Retro</td>
        <td>₱210.00</td>
        <td><span class="status processing">Processing</span></td>
        <td>2024-01-14</td>
      </tr>

    </table>
  </div>

</div>
