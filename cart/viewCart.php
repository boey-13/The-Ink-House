<?php include('../connect/conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	<link rel="stylesheet" href="../style/headfoot.css">
	<link rel="stylesheet" href="../style/styleviewCart.css">
	<title>Cart Page</title>
</head>
<body>
    <?php include('../include/header.php'); ?>
	<div class="cart-container">
		<h1>Your Cart</h1>
		<div class="cart-header">
			<div class="cart-header-item">PRODUCT</div>
			<div class="cart-header-item">QUANTITY</div>
			<div class="cart-header-item">TOTAL</div>
		</div>

		<?php 
		include('../cart/cartContent.php');
		echo "<div class='cart-footer'>";
		echo "<div class='subtotal'>Subtotal <span class='subtotal-amount'>RM " . number_format($total_price, 2) . "</span></div>";
		echo "<p>Shipping, taxes, and discounts will be calculated at checkout.</p>";
		echo "<button class='checkout-button' onclick='startCheckout()'>Checkout <div class='spinner' style='display: none;'></div></button>";
		echo "</div>";
		?>
	</div>

	<script src="../itemDetails/itemDetailsJS.js"></script>
</body>
<footer>
<?php include('../include/footer.php'); ?>
</footer>
</html>
