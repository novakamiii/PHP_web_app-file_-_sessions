<?php
include 'misc/headernavfooter.php';
include 'misc/cart_functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WEyewear - Home</title>
	<link href="styles.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
	<!-- NAVBAR -->
	<?php
	navbarcall();
	?>

	<main class="container py-4">
		<h2>Your Cart</h2>
		<div id="cart-page-items" class="list-group mb-3">
			<?php showCartItems(); ?>
		</div>

		<?php
		if (getCartCount() != 0) {
			cartUtils();
		}
		?>
	</main>

	<!-- FOOTER -->
		<?php
		footer();
		?>
</body>

</html>


<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/login-modal.js"></script>
<script src="js/add-to-cart.js"></script>
<script src="js/cart-page.js"></script>

<?php
mysqli_close($conn);
?>