<?php
include 'misc/disp_products.php';
include 'misc/headernavfooter.php';
$site = 'Products';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'template/head.php'?>
</head>

<body>

  <!-- NAVBAR -->
  <?php navbarcall(); ?>

  <!-- HERO -->
  <header class="product text-center text-white py-3 bg-dark"
    style="background:url('https://i.pinimg.com/1200x/cc/c8/d1/ccc8d1cbc54f9aeed28b3b44fa0f6599.jpg') center/cover no-repeat;">
    <div class="container">
      <h1 class="productdisplay-10">Silicon Optics</h1>
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
  
</body>

</html>
<script src="js/add-to-cart.js"></script>
<?php require_once 'template/scripts.php'?>


<?php
mysqli_close($conn);
?>
