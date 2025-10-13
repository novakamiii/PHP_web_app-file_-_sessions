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

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
</head>

<body>

  <!-- NAVBAR -->
  <?php
  navbarcall();
  ?>

  <!-- HERO -->
  <header class="product text-center text-white py-3 bg-dark" style="background:url('https://i.pinimg.com/1200x/cc/c8/d1/ccc8d1cbc54f9aeed28b3b44fa0f6599.jpg') center/cover no-repeat;">
    <div class="container">
      <h1 class="productdisplay-10">WEyewear</h1>
      <p class="lead2">PRODUCTS</p>
    </div>
  </header>
  <!--PRODUCTS-->
  <!-- VISION CORRECTION -->
  <section class="vision correction py-5">
    <div class="container">
      <h2 class="vis">Vision Correction</h2>
      <div class="Vision">
        <?php
        displayVisionCorrection();
        ?>
      </div>
    </div>
  </section>

  <!-- PROTECTIVE -->
  <section class="Protect py-5">
    <div class="container">
      <h3 class="pro">Protection</h3>
      <div class="protection">
        <?php
        displayProtection();
        ?>
      </div>
    </div>
  </section>

  <!-- SUNGLASSES -->
  <section class="Sunglass py-5">
    <div class="container">
      <h3 class="sun">Sunglasses</h3>
      <div class="sunglasses">
        <?php
        displaySunglasses();
        ?>
      </div>
    </div>
  </section>

  <!--FASHION-->
  <section class="Fashion py-5">
    <div class="container">
      <h3 class="Fashion-title">Fashion</h3>
      <div class="Fashionbox">
        <?php
        displayFashion();
        ?>
      </div>
    </div>
  </section>


  <!--ABOUT US -->
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
  <footer class="mt-auto bg-black text-center py-2 text-secondary small">
    © 2025 Weyewear | Designed for demo purposes
  </footer>


  <!-- CART PANEL -->
  <!-- Cart UI moved to a dedicated page: cart.html -->
  <script src="add-to-cart.js"></script>
</body>

</html>

<?php
mysqli_close($conn);
?>