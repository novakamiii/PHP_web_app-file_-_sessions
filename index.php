<?php
include 'misc/headernavfooter.php';
include 'misc/disp_products.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEyewear - Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="styles.css" rel="stylesheet">
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <!-- <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script> -->
  <script src="login-modal.js"></script>

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
        <?php
          displayFeaturedProducts();
        ?>
        
      </div>
    </div>
  </section>

  <br>

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

  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function () {
  //Load the modal when login button is clicked
  $('#loginButton').on('click', function (e) {
    e.preventDefault();
    if (!$('#authModal').length) {
      $('body').append('<div id="modalContainer"></div>');
      $('#modalContainer').load('login-modal.php #authModal', function () {
        $('#authModal').modal('show');
      });
    } else {
      $('#authModal').modal('show');
    }
  });

  // Handle events AFTER the modal has been loaded dynamically
  $(document).on('shown.bs.modal', '#authModal', function () {
    console.log("Modal fully loaded");

    // ================= PASSWORD TOGGLE =================
    $(document).off('click', '.toggle-password').on('click', '.toggle-password', function () {
      const target = $($(this).data('target'));
      const type = target.attr('type') === 'password' ? 'text' : 'password';
      target.attr('type', type);
      $(this).find('i').toggleClass('fa-eye fa-eye-slash');
    });

    // ================= SWITCH BETWEEN LOGIN / SIGNUP =================
    $(document).off('click', '#openSignup').on('click', '#openSignup', function (e) {
      e.preventDefault();
      $('#loginFormContainer').addClass('d-none');
      $('#signupFormContainer').removeClass('d-none');
      $('#modalTitle').text('Sign Up');
    });

    $(document).off('click', '#openLogin').on('click', '#openLogin', function (e) {
      e.preventDefault();
      $('#signupFormContainer').addClass('d-none');
      $('#loginFormContainer').removeClass('d-none');
      $('#modalTitle').text('Login');
    });

    // ================= LOGIN VALIDATION =================
    $(document).off('submit', '#loginForm').on('submit', '#loginForm', function (e) {
      e.preventDefault();

      let email = $('#loginEmail').val().trim();
      let password = $('#loginPassword').val().trim();
      let valid = true;

      $('#loginEmailError').text('');
      $('#loginPasswordError').text('');

      if (!email || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
        $('#loginEmailError').text('Please enter a valid email.');
        valid = false;
      }
      if (!password) {
        $('#loginPasswordError').text('Password is required.');
        valid = false;
      }

      if (valid) {
        alert('Log-in successful!');
        $('#authModal').modal('hide');
        $('#loginForm')[0].reset();
      }
    });

    // ================= SIGNUP VALIDATION =================
    $(document).off('submit', '#signupForm').on('submit', '#signupForm', function (e) {
      e.preventDefault();

      let valid = true;
      const nameRegex = /^[A-Za-z]+(?:\s[A-Za-z]+)*$/;
      const emailRegex = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
      const firstName = $('#firstName').val().trim();
      const lastName = $('#lastName').val().trim();
      const address = $('#address').val().trim();
      const email = $('#signupEmail').val().trim();
      const contact = $('#contact').val().trim();
      const password = $('#signupPassword').val();
      const confirm = $('#confirmPassword').val();

      $('.error-msg').text('');

      if (!firstName || !nameRegex.test(firstName)) {
        $('#firstNameError').text('Invalid first name.');
        valid = false;
      }
      if (!lastName || !nameRegex.test(lastName)) {
        $('#lastNameError').text('Invalid last name.');
        valid = false;
      }
      if (!address) {
        $('#addressError').text('Address is required.');
        valid = false;
      }
      if (!email || !emailRegex.test(email)) {
        $('#signupEmailError').text('Invalid email format.');
        valid = false;
      }
      if (!/^[0-9]{11}$/.test(contact)) {
        $('#contactError').text('Contact must be 11 digits.');
        valid = false;
      }
      if (password.includes(' ') || password.length < 7) {
        $('#signupPasswordError').text('Password must be at least 7 characters long and contain no spaces.');
        valid = false;
      }
      if (password !== confirm) {
        $('#confirmPasswordError').text('Passwords do not match.');
        valid = false;
      }

      if (valid) {
        alert('Sign-up successful!');
        $('#authModal').modal('hide')
        $('#signupForm')[0].reset();
      }
    });

    // ================= CONTACT NUMBER VALIDATION =================
    $(document).off('input', '#contact').on('input', '#contact', function () {
      this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);
    });
  });
});
</script> -->


</body>

</html>