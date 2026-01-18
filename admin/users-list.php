<?php
require_once '../misc/db.php';

// Check if connection is valid
if (!$conn || !($conn instanceof mysqli)) {
    die("Database connection error. Please check your database configuration.");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Users List</title>
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
      <strong>Users List</strong>
    </div>

    <div class="content">

      <h2>Registered Users</h2>

      <div class="table-card">
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Registration Date</th>
            <th>Last Session</th>
            <th>Action</th>
          </tr>

          <?php
          // Fetch all users from database
          $query = "SELECT id, name, email, contact, address, reg_date, last_session FROM users ORDER BY id ASC";
          $result = mysqli_query($conn, $query);
          
          if ($result && mysqli_num_rows($result) > 0) {
              while ($user = mysqli_fetch_assoc($result)):
                  // Format dates
                  $reg_date = $user['reg_date'] ? date('Y-m-d H:i', strtotime($user['reg_date'])) : 'N/A';
                  $last_session = $user['last_session'] ? date('Y-m-d H:i', strtotime($user['last_session'])) : 'Never';
          ?>
          <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['contact']); ?></td>
            <td><?php echo htmlspecialchars($user['address']); ?></td>
            <td><?php echo $reg_date; ?></td>
            <td><?php echo $last_session; ?></td>
            <td>
              <a href="user-details.php?id=<?php echo $user['id']; ?>">View</a>
            </td>
          </tr>
          <?php 
              endwhile;
          } else {
          ?>
          <tr>
            <td colspan="8" style="text-align: center; padding: 20px; color: #666;">
              No users found in the database.
            </td>
          </tr>
          <?php
          }
          mysqli_close($conn);
          ?>

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
