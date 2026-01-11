<!DOCTYPE html>
<html>
<head>
  <title>Add / Edit Product</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="admin-layout">

  <!-- SIDEBAR -->
  <?php include 'sidebar.php'; ?>

  <!-- MAIN CONTENT -->
  <div class="main">

    <div class="topbar">
      <strong>Add / Edit Product</strong>
    </div>

    <div class="content">

      <div class="form-card">
        <h2>Product Details</h2>

        <form action="product-save.php" method="post" enctype="multipart/form-data">
          <!-- Hidden field for editing existing product -->
          <input type="hidden" name="product_id" value="">

          <label for="prod_name">Product Name</label>
          <input type="text" id="prod_name" name="prod_name" placeholder="Enter product name" required>

          <label for="price">Price</label>
          <input type="number" step="0.01" id="price" name="price" placeholder="Enter price" required>

          <label for="category">Category</label>
          <input type="text" id="category" name="category" placeholder="Enter category" required>

          <label for="stock">Stock</label>
          <input type="number" id="stock" name="stock" placeholder="Enter quantity in stock" required>

          <label for="description">Description</label>
          <textarea id="description" name="description" rows="4" placeholder="Enter product description"></textarea>

          <label for="image">Product Image</label>
          <input type="file" id="image" name="image">

          <button type="submit">Save Product</button>
        </form>
      </div>

    </div>

  </div>

</div>

</body>
</html>
