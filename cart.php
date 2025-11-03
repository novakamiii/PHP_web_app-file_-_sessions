<?php
include 'misc/headernavfooter.php';
include 'misc/cart_functions.php';
$site = 'Cart';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php require_once 'template/head.php' ?>
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

<?php
mysqli_close($conn);
?>

<?php include 'template/login-modal.php'; ?>
<?php require_once 'template/scripts.php'; ?>

<!-- Page-specific scripts -->
<script src="js/cart-page.js"></script>
<script src="js/add-to-cart.js"></script>
