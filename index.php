<?php
include 'misc/headernavfooter.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEyewear - Home</title>
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
  <header class=" text-center text-white py-3 bg-dark" style="background:url('https://i.pinimg.com/1200x/c7/af/c0/c7afc09064af70ab585bb939f40eecbc.jpg') center/cover no-repeat;">
    <div class="container">
      <h1 class="display-10">WEyewear</h1>
      <p class="lead">Elegance and protection for your eyes</p>
    </div>
  </header>

  <!--LINYA-->
  <div class="hstack gap-3">
    <div class="p-2">Vision Correction</div>
    <div class="p-2">Protective</div>
    <div class="p-2">Sunglasses</div>
    <div class="p-2">Fashion</div>
  </div>

  <!--DESIGN LANG-->
  <section class="prescription-section d-flex align-items-center justify-content-center text-white" style="background:url('https://i.pinimg.com/736x/16/5d/7c/165d7c28d256eaafc63045847d9617ae.jpg') center/cover no-repeat;">
    <div class="container">
      <h3 class="text-center mt-3">Glasses for your everyday use</h3>
      <p class="text-center">Discover our wide range of stylish and affordable eyewear.</p>
    </div>
  </section>



  <!-- PRODUCTS -->
  <section class="py-5">
    <div class="container">
      <h2 class="feat text-center mb-4">Featured Products</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-50">
            <img src="https://i.pinimg.com/1200x/66/70/d0/6670d0596683a34e8e3d44e98d54a7da.jpg" class="card-img-top" alt="Product 1">
            <div class="card-body">
              <h5 class="card-title">Nova</h5>
              <p class="card-text">₱499.00</p>
              <a href="#" class="btn btn-secondary w-100">Add to Cart</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-50">
            <img src="https://i.pinimg.com/1200x/5b/00/95/5b0095e6ea5b0ccbc8e7b50b91c23db4.jpg" class="card-img-top" alt="Product 2">
            <div class="card-body">
              <h5 class="card-title">Celine</h5>
              <p class="card-text">₱789.00</p>
              <a href="#" class="btn btn-secondary w-100">Add to Cart</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-50">
            <img src="https://i.pinimg.com/1200x/03/0e/82/030e82549f8d9695da4924009f80af77.jpg" class="card-img-top" alt="Product 3">
            <div class="card-body">
              <h5 class="card-title">Ferar</h5>
              <p class="card-text">₱599.00</p>
              <a href="#" class="btn btn-secondary w-100">Add to Cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--CAROUSEL-->
  <h6>Our Collection</h6>

  <div class="container mt-3">
    <div class="row">
      <!-- Carousel column -->
      <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://i.pinimg.com/1200x/28/c2/c7/28c2c718470a1338db9892b913e9021b.jpg" class="d-block w-100" style="height:700px; object-fit:cover;" alt="Pic1">
            <div class="eme mt-3">
              <h2 class="emegaming">Comfort</h2>
              <p class="eme-sentence">
                Comfortable eyewear is designed to fit naturally, reducing pressure on the nose and ears for all-day wear.
                Lightweight materials and ergonomic frames ensure ease without sacrificing durability.
                It blends function with style, making vision support feel effortless.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://i.pinimg.com/1200x/d6/39/dc/d639dcc32d640aa4572843c2b69cd780.jpg" class="d-block w-100" style="height:700px; object-fit:cover;" alt="...">
            <div class="eme mt-3">
              <h2 class="emegaming">Sophisticated</h2>
              <p class="eme-sentence">
                Sophistication in eyewear is defined by timeless design, refined details, and premium craftsmanship.
                Each frame balances elegance with subtle style,
                elevating the wearer’s presence without excess.
                More than vision, it becomes a statement of confidence and taste.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="https://i.pinimg.com/1200x/a3/c9/62/a3c96224fa981a996cce3e738f30138f.jpg" class="d-block w-100" style="height:700px; object-fit:cover;" alt="...">
            <div class="eme mt-3">
              <h2 class="emegaming">Unique</h2>
              <p class="eme-sentence">
                Crafted with timeless elegance, each frame blends sophistication with subtle style.
                Sleek lines and polished details create a refined balance of clarity and beauty.
                More than an accessory, the eyewear becomes a statement of elegance and confidence.

              </p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <!--Collection pics-->
  <div class="container">
    <div class="col-md-4">
      <div class="collection-model-item">
        <img src="https://i.pinimg.com/1200x/7d/7f/45/7d7f45696e89e3773733634ba3f93a0e.jpg" style="height:600px; object-fit:cover;" class="collection-img-1" alt="collection1">
        <div class="emefy mt-3">
          <h2 class="emefygaming">Beauty</h2>
          <p class="emefy-sentence">
            Comfortable eyewear is designed to fit naturally, reducing pressure on the nose and ears for all-day wear.
            Lightweight materials and ergonomic frames ensure ease without sacrificing durability.
            It blends function with style, making vision support feel effortless.
          </p>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
    <div class="col-md-4">
      <div class="collection-model-item">
        <img src="https://i.pinimg.com/1200x/f4/7d/4a/f47d4ad2569116242e893cc014549f05.jpg" style="height:700px; object-fit:cover;" class="collection-img-2" alt="collection2">
        <div class="emefe mt-3">
          <h2 class="emefegaming">Elegance</h2>
          <p class="emefe-sentence">
            Comfortable eyewear is designed to fit naturally, reducing pressure on the nose and ears for all-day wear.
            Lightweight materials and ergonomic frames ensure ease without sacrificing durability.
            It blends function with style, making vision support feel effortless.
          </p>
        </div>
      </div>
    </div>
  </div>



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
  </footerr>

</body>

</html>