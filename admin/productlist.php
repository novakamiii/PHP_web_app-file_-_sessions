<!DOCTYPE html>
<html>
<head>
  <title>Products List</title>
  <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<div class="admin-layout">

  <!-- SIDEBAR -->
  <?php include 'sidebar.php'; ?> 

  <!-- MAIN -->
  <div class="main">

    <div class="topbar">
      <strong>Products List</strong>
     
    </div>

    <div class="content">

      <h2>Products</h2>

      <div class="table-card">
        <table>
          <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Description</th>
            <th>Image</th>
            <th>Date Added</th>
            <th>Action</th>
          </tr>
<!-- Example rows -->
<tr>
  <td>101</td>
  <td>Classic Aviator</td>
  <td>₱249.99</td>
  <td>Sunglasses</td>
  <td>15</td>
  <td>Lightweight metal frame</td>
  <td><img src="assets/img/aviator.jpg" class="product-img" alt="Classic Aviator"></td>
  <td>2024-01-05</td>
  <td>
    <a href="product-form.php?id=101">Edit</a> | 
    <a href="#">Delete</a>
  </td>
</tr>

<tr>
  <td>102</td>
  <td>Retro Round</td>
  <td>₱189.99</td>
  <td>Sunglasses</td>
  <td>25</td>
  <td>Round frames for retro style</td>
  <td><img src="assets/img/retro.jpg" class="product-img" alt="Retro Round"></td>
  <td>2024-01-06</td>
  <td>
    <a href="product-form.php?id=102">Edit</a> | 
    <a href="#">Delete</a>
  </td>
</tr>

<tr>
  <td>103</td>
  <td>Round Retro</td>
  <td>₱210.00</td>
  <td>Eyewear</td>
  <td>8</td>
  <td>Classic retro style</td>
  <td><img src="assets/img/round-retro.jpg" class="product-img" alt="Round Retro"></td>
  <td>2024-01-07</td>
  <td>
    <a href="product-form.php?id=103">Edit</a> | 
    <a href="#">Delete</a>
  </td>
</tr>

<tr>
  <td>104</td>
  <td>Wayfarer Black</td>
  <td>₱275.50</td>
  <td>Sunglasses</td>
  <td>20</td>
  <td>Modern wayfarer design</td>
  <td><img src="assets/img/wayfarer.jpg" class="product-img" alt="Wayfarer Black"></td>
  <td>2024-01-08</td>
  <td>
    <a href="product-form.php?id=104">Edit</a> | 
    <a href="#">Delete</a>
  </td>
</tr>

<tr>
  <td>105</td>
  <td>Aviator Gold</td>
  <td>₱320.00</td>
  <td>Sunglasses</td>
  <td>12</td>
  <td>Premium gold metal frame</td>
  <td><img src="assets/img/aviator-gold.jpg" class="product-img" alt="Aviator Gold"></td>
  <td>2024-01-09</td>
  <td>
    <a href="product-form.php?id=105">Edit</a> | 
    <a href="#">Delete</a>
  </td>
</tr>

<tr>
  <td>106</td>
  <td>Cat Eye Pink</td>
  <td>₱199.99</td>
  <td>Sunglasses</td>
  <td>18</td>
  <td>Trendy cat eye frame</td>
  <td><img src="assets/img/cateye-pink.jpg" class="product-img" alt="Cat Eye Pink"></td>
  <td>2024-01-10</td>
  <td>
    <a href="product-form.php?id=106">Edit</a> | 
    <a href="#">Delete</a>
  </td>
</tr>

<tr>
  <td>107</td>
  <td>Square Classic</td>
  <td>₱225.50</td>
  <td>Eyewear</td>
  <td>14</td>
  <td>Modern square frame</td>
  <td><img src="assets/img/square-classic.jpg" class="product-img" alt="Square Classic"></td>
  <td>2024-01-11</td>
  <td>
    <a href="product-form.php?id=107">Edit</a> | 
    <a href="#">Delete</a>
  </td>
</tr>

<tr>
  <td>108</td>
  <td>Wayfarer Blue</td>
  <td>₱280.00</td>
  <td>Sunglasses</td>
  <td>22</td>
  <td>Classic wayfarer with blue tint</td>
  <td><img src="assets/img/wayfarer-blue.jpg" class="product-img" alt="Wayfarer Blue"></td>
  <td>2024-01-12</td>
  <td>
    <a href="product-form.php?id=108">Edit</a> | 
    <a href="#">Delete</a>
  </td>
</tr>

<tr>
  <td>109</td>
  <td>Retro Oval</td>
  <td>₱195.00</td>
  <td>Sunglasses</td>
  <td>10</td>
  <td>Oval frame retro style</td>
  <td><img src="assets/img/retro-oval.jpg" class="product-img" alt="Retro Oval"></td>
  <td>2024-01-13</td>
  <td>
    <a href="product-form.php?id=109">Edit</a> | 
    <a href="#">Delete</a>
  </td>
</tr>

<tr>
  <td>110</td>
  <td>Round Gold</td>
  <td>₱310.00</td>
  <td>Eyewear</td>
  <td>7</td>
  <td>Elegant round gold frame</td>
  <td><img src="assets/img/round-gold.jpg" class="product-img" alt="Round Gold"></td>
  <td>2024-01-14</td>
  <td>
    <a href="product-form.php?id=110">Edit</a> | 
    <a href="#">Delete</a>
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
