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

	<main class="container py-4">
		<h2>Your Cart</h2>
		<div id="cart-page-items" class="list-group mb-3"></div>
		<div class="d-flex justify-content-between align-items-center">
			<div class="h4">Total: ₱<span id="cart-page-total">0.00</span></div>
			<div>
				<button id="cart-page-clear" class="btn btn-secondary">Clear Cart</button>
				<button id="cart-page-checkout" class="btn btn-primary">Checkout</button>
			</div>
		</div>
	</main>

	<!-- FOOTER -->
  <footer class="mt-auto bg-black text-center py-2 text-secondary small">
    © 2025 Weyewear | Designed for demo purposes
  </footer>
	<script src="cart-page.js"></script>
</body>

</html>