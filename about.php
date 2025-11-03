<?php
include_once 'misc/headernavfooter.php';
$site = 'About Us';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'template/head.php'?>
</head>

<body class="d-flex flex-column min-vh-100 bg-dark text-light">
  <!-- NAVBAR -->
  <?php navbarcall(); ?>

  <!-- ABOUT US -->
  <main class="flex-fill py-5 bg-black text-light d-flex flex-column justify-content-center">
    <div class="container text-center">
      <h4 class="mb-4 about-title">Silicon Optics</h4>

      <p class="about-statement text-justify mx-auto" style="max-width: 800px;">
        The Silicon Optics e-shop was established in 2025 as a demo project. It aims to provide
        fashion-conscious individuals with access to stylish eyewear that combines premium quality with affordability.
        Our collection caters to everyone who desires to express their personal style while enjoying comfort and durability.
        At Silicon Optics, we believe that eyewear is not just an accessory but an essential part of one’s look, enhancing
        confidence and making a statement. We are committed to offering a diverse range of designs that suit various
        tastes and occasions, ensuring that each customer finds the perfect pair to complement their unique personality.
        Whether for everyday wear or special events, Silicon Optics strives to deliver exceptional value and style to all our
        customers.
      </p>

      <!-- Contact / Info list -->
      <ul class="list-unstyled mt-5 text-center info-list mx-auto" style="max-width: 400px;">
        <li>ADDRESS: GMA, CAVITE</li>
        <li>EMAIL: siliconoptics@gmail.com</li>
        <li>CONTACT NO: (202) 345-6789</li>
        <li>LEGAL & PRIVACY</li>
        <li>FAQ</li>
      </ul>

      <!-- Horizontal line -->
      <div class="horizontal-line mx-auto mt-4"></div>
    </div>
  </main>

  <!-- FOOTER -->
    <?php
      footer();
    ?>

  <!-- Custom font styles for about page -->
  <style>
    /* Change the main title font */
    .about-title {
      font-family: 'Horizon Bold', sans-serif;
      font-weight: 450;
      font-size: 2.5rem;
      color:rgb(202, 196, 179) !important;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    /* Change the about statement font */
    .about-statement {
      font-family: 'Poppins', sans-serif;
      font-weight: 100;
      font-size: 1.0rem;
      line-height: 1.8;
      color: #e0e0e0 !important;
    }

    /* Change the info list font */
    .info-list li {
      font-family: 'Poppins', sans-serif;
      font-weight: 500;
      font-size: 1rem;
      color: #ffffff !important;
      margin: 8px 0;
      letter-spacing: 1px;
      text-transform: uppercase;
    }
  </style>
</body>
</html>

<?php require_once 'template/scripts.php'?>