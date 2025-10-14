<?php
include 'misc/headernavfooter.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEyewear - About Us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="styles.css" rel="stylesheet">
  <!-- <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="login-modal.js"></script>
</head>

<body class="d-flex flex-column min-vh-100 bg-dark text-light">
  <!-- NAVBAR -->
  <?php navbarcall(); ?>

  <!-- ABOUT US -->
  <main class="flex-fill py-5 bg-black text-light d-flex flex-column justify-content-center">
    <div class="container text-center">
      <h4 class="mb-4">WEyewear</h4>

      <p class="about-statement text-justify mx-auto" style="max-width: 800px;">
        The WEyewear e-shop was established in 2025 by Mary Ann and Wilfredo as a demo project. It aims to provide
        fashion-conscious individuals with access to stylish eyewear that combines premium quality with affordability.
        Our collection caters to everyone who desires to express their personal style while enjoying comfort and durability.
        At WEyewear, we believe that eyewear is not just an accessory but an essential part of one’s look, enhancing
        confidence and making a statement. We are committed to offering a diverse range of designs that suit various
        tastes and occasions, ensuring that each customer finds the perfect pair to complement their unique personality.
        Whether for everyday wear or special events, WEyewear strives to deliver exceptional value and style to all our
        customers.
      </p>

      <!-- Contact / Info list -->
      <ul class="list-unstyled mt-5 text-center info-list mx-auto" style="max-width: 400px;">
        <li>ADDRESS: GMA, CAVITE</li>
        <li>EMAIL: weyewear@gmail.com</li>
        <li>CONTACT NO: (202) 345-6789</li>
        <li>LEGAL & PRIVACY</li>
        <li>FAQ</li>
      </ul>

      <!-- Horizontal line -->
      <div class="horizontal-line mx-auto mt-4"></div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="mt-auto bg-black text-center py-2 text-secondary small">
    © 2025 Weyewear | Designed for demo purposes
  </footer>
</body>
</html>