<?php
include 'misc/disp_products.php';
include 'misc/headernavfooter.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEyewear - Products</title>
  <link href="styles.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/login-modal.js"></script>
</head>

<body>

  <!-- NAVBAR -->
  <?php navbarcall(); ?>

  <!-- HERO -->
  <header class="product text-center text-white py-3 bg-dark"
    style="background:url('https://i.pinimg.com/1200x/cc/c8/d1/ccc8d1cbc54f9aeed28b3b44fa0f6599.jpg') center/cover no-repeat;">
    <div class="container">
      <h1 class="productdisplay-10">WEyewear</h1>
      <p class="lead2">PRODUCTS</p>
    </div>
  </header>

  <!-- ===== PRODUCTS SECTION ===== -->

  <!-- VISION CORRECTION -->
  <section class="product-section py-5">
    <div class="container">
      <h2 class="category-title">Vision Correction</h2>
      <div class="scroll-container Vision">
        <?php displayProductsbyCateg('vision'); ?>
      </div>
    </div>
  </section>

  <!-- PROTECTION -->
  <section class="product-section py-5">
    <div class="container">
      <h2 class="category-title">Protection</h2>
      <div class="scroll-container protection">
        <?php displayProductsbyCateg('protection'); ?>
      </div>
    </div>
  </section>

  <!-- SUNGLASSES -->
  <section class="product-section py-5">
    <div class="container">
      <h2 class="category-title">Sunglasses</h2>
      <div class="scroll-container sunglasses">
        <?php displayProductsbyCateg('sunglasses'); ?>
      </div>
    </div>
  </section>

  <!-- FASHION -->
  <section class="product-section py-5">
    <div class="container">
      <h2 class="category-title">Fashion</h2>
      <div class="scroll-container Fashionbox">
        <?php displayProductsbyCateg('fashion'); ?>
      </div>
    </div>
  </section>

  <!-- ABOUT US -->
  <section class="down py-3">
    <div class="container">
      <h4 class="text-justify mb-4">WEyewear</h4>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">ADDRESS: GMA, Cavite</li>
        <li class="list-group-item">EMAIL: weyewear@gmail.com</li>
        <li class="list-group-item">CONTACT NO: (202) 345-6789</li>
        <li class="list-group-item">LEGAL & PRIVACY</li>
        <li class="list-group-item">FAQ</li>
      </ul>
    </div>
  </section>

  <!-- FOOTER -->
    <?php
      footer();
    ?>
    
  <!-- CART -->
  <script src="js/add-to-cart.js"></script>
</body>

</html>

<?php
mysqli_close($conn);
?>
