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

          <!-- Example rows -->
          <tr>
            <td>1</td>
            <td>John Doe</td>
            <td>john.doe@email.com</td>
            <td>09123456789</td>
            <td>123 Main Street, City</td>
            <td>2025-01-01 10:00</td>
            <td>2025-01-15 14:30</td>
            <td>
              <a href="user-details.php?id=1">View</a>
            </td>
          </tr>

          <tr>
            <td>2</td>
            <td>Jane Smith</td>
            <td>jane.smith@email.com</td>
            <td>09234567890</td>
            <td>456 Oak Avenue, Province</td>
            <td>2025-01-02 11:15</td>
            <td>2025-01-14 09:20</td>
            <td>
              <a href="user-details.php?id=2">View</a>
            </td>
          </tr>

          <tr>
            <td>3</td>
            <td>Michael Brown</td>
            <td>michael.brown@email.com</td>
            <td>09345678901</td>
            <td>789 Pine Road, Metro</td>
            <td>2025-01-03 08:45</td>
            <td>2025-01-13 16:00</td>
            <td>
              <a href="user-details.php?id=3">View</a>
            </td>
          </tr>

          <tr>
            <td>4</td>
            <td>Sarah Johnson</td>
            <td>sarah.j@email.com</td>
            <td>09456789012</td>
            <td>321 Elm Street, Town</td>
            <td>2025-01-04 14:20</td>
            <td>2025-01-15 10:45</td>
            <td>
              <a href="user-details.php?id=4">View</a>
            </td>
          </tr>

          <tr>
            <td>5</td>
            <td>David Wilson</td>
            <td>david.wilson@email.com</td>
            <td>09567890123</td>
            <td>654 Maple Drive, City</td>
            <td>2025-01-05 09:30</td>
            <td>2025-01-12 15:20</td>
            <td>
              <a href="user-details.php?id=5">View</a>
            </td>
          </tr>

          <tr>
            <td>6</td>
            <td>Emily Davis</td>
            <td>emily.d@email.com</td>
            <td>09678901234</td>
            <td>987 Cedar Lane, Village</td>
            <td>2025-01-06 13:10</td>
            <td>2025-01-11 11:30</td>
            <td>
              <a href="user-details.php?id=6">View</a>
            </td>
          </tr>

          <tr>
            <td>7</td>
            <td>Robert Miller</td>
            <td>robert.m@email.com</td>
            <td>09789012345</td>
            <td>147 Birch Way, District</td>
            <td>2025-01-07 10:25</td>
            <td>2025-01-10 09:15</td>
            <td>
              <a href="user-details.php?id=7">View</a>
            </td>
          </tr>

          <tr>
            <td>8</td>
            <td>Lisa Anderson</td>
            <td>lisa.a@email.com</td>
            <td>09890123456</td>
            <td>258 Spruce Court, Area</td>
            <td>2025-01-08 12:40</td>
            <td>2025-01-15 08:00</td>
            <td>
              <a href="user-details.php?id=8">View</a>
            </td>
          </tr>

          <tr>
            <td>9</td>
            <td>James Taylor</td>
            <td>james.t@email.com</td>
            <td>09901234567</td>
            <td>369 Willow Boulevard, Zone</td>
            <td>2025-01-09 15:50</td>
            <td>2025-01-14 13:45</td>
            <td>
              <a href="user-details.php?id=9">View</a>
            </td>
          </tr>

          <tr>
            <td>10</td>
            <td>Patricia Martinez</td>
            <td>patricia.m@email.com</td>
            <td>09012345678</td>
            <td>741 Ash Street, Region</td>
            <td>2025-01-10 07:20</td>
            <td>2025-01-13 17:30</td>
            <td>
              <a href="user-details.php?id=10">View</a>
            </td>
          </tr>

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
