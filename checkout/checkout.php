<?php
include('../connect/conn.php');
include '../checkout/validate_form.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Checkout Page</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	<link rel="stylesheet" href="../style/headfoot.css">
	<link rel="stylesheet" href="../style/stylecheckout.css">
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			// Initialize credit card fields based on the current selection
			toggleCreditCardFields();

			// Event listener for the payment method change
			document.getElementById('paymentMethod').addEventListener('change', toggleCreditCardFields);

			// Add an event listener to the form for submission
			document.querySelector('#checkout-form').addEventListener('submit', function(event) {
				event.preventDefault();

				let form = this;
				let isValid = true;
					
				// Check each required input for validity
				form.querySelectorAll('input[required], select[required]').forEach(function(input) {
					let errorSpan = input.nextElementSibling;

					if (!input.checkValidity()) {
						errorSpan.style.display = 'block'; // Show error message
						isValid = false;
					} else {
						errorSpan.style.display = 'none'; // Hide error message
					}
				});

				if (isValid) {
					form.submit(); // Only submit the form if all inputs are valid
				} else {
					// Ensure credit card fields remain visible if selected and validation fails
					if (document.getElementById('paymentMethod').value === 'creditCard') {
						document.getElementById('creditCardDetails').style.display = 'block';
					}
				}
			});
		});

		function toggleCreditCardFields() {
			var paymentMethod = document.getElementById('paymentMethod').value;
			var creditCardDetails = document.getElementById('creditCardDetails');
			if (paymentMethod === 'creditCard') {
				creditCardDetails.style.display = 'block';
				document.getElementById('ccnum').required = true;
				document.getElementById('expdate').required = true;
				document.getElementById('cvv').required = true;
				document.getElementById('cname').required = true;
			} else {
				creditCardDetails.style.display = 'none';
				document.getElementById('ccnum').required = false;
				document.getElementById('expdate').required = false;
				document.getElementById('cvv').required = false;
				document.getElementById('cname').required = false;
			}
		}
	</script>
</head>
<body>
<?php include('../include/header.php'); ?>
<div class="container">
	<div class="form-section">
		<form action="../checkout/process_checkout.php" method="POST" id="checkout-form" novalidate>
			<h3>Billing Address</h3>

			<div class="row">
				<div class="col-50">
					<label for="fname"><i class="fa fa-user"></i></label>
					<input type="text" id="fname" name="firstname" placeholder="First Name" value="<?php echo htmlspecialchars($firstname ?? ''); ?>" minlength="5" required>
					<span class="error-message" style="display:none;">First name must be at least 5 characters.</span>
				</div>
				<div class="col-50">
					<label for="lname"><i class="fa fa-user"></i></label>
					<input type="text" id="lname" name="lastname" placeholder="Last Name" value="<?php echo htmlspecialchars($lastname ?? ''); ?>" minlength="5" required>
					<span class="error-message" style="display:none;">Last name must be at least 5 characters.</span>
				</div>
			</div>

			<label for="email"><i class="fa fa-envelope"></i></label>
			<input type="email" id="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
			<span class="error-message" style="display:none;">Please enter a valid email address.</span>

			<label for="phone"><i class="fa fa-phone"></i></label>
			<input type="text" id="phone" name="phone" placeholder="Phone" value="<?php echo htmlspecialchars($phone ?? ''); ?>" pattern="\d{10,11}" required>
			<span class="error-message" style="display:none;">Phone number must be 10 or 11 digits.</span>

			<label for="adr"><i class="fa fa-address-card-o"></i></label>
			<input type="text" id="adr" name="address" placeholder="Address" value="<?php echo htmlspecialchars($address ?? ''); ?>" required>
			<span class="error-message" style="display:none;">Please enter your address.</span>

			<label for="city"><i class="fa fa-institution"></i></label>
			<input type="text" id="city" name="city" placeholder="City" value="<?php echo htmlspecialchars($city ?? ''); ?>" required>
			<span class="error-message" style="display:none;">Please enter your city.</span>

			<div class="row">
				<div class="col-50">
					<label for="state"></label>
					<select id="state" name="state" required>
						<option value="">Select State</option>
						<option value="Johor">Johor</option>
						<option value="Kedah">Kedah</option>
						<option value="Kelantan">Kelantan</option>
						<option value="Kuala Lumpur">Kuala Lumpur</option>
						<option value="Labuan">Labuan</option>
						<option value="Malacca">Malacca</option>
						<option value="Negeri Sembilan">Negeri Sembilan</option>
						<option value="Pahang">Pahang</option>
						<option value="Penang">Penang</option>
						<option value="Perak">Perak</option>
						<option value="Perlis">Perlis</option>
						<option value="Putrajaya">Putrajaya</option>
						<option value="Sabah">Sabah</option>
						<option value="Sarawak">Sarawak</option>
						<option value="Selangor">Selangor</option>
						<option value="Terengganu">Terengganu</option>
					</select>
					<span class="error-message" style="display:none;">Please select a state.</span>
				</div>
				<div class="col-50">
					<label for="zip"></label>
					<input type="text" id="zip" name="zip" placeholder="Zip" value="<?php echo htmlspecialchars($zip ?? ''); ?>" pattern="\d{5}" required>
					<span class="error-message" style="display:none;">ZIP code must be 5 digits.</span>
				</div>
			</div>

			<h3>Payment</h3>
			<label for="paymentMethod"></label>
			<p>All transactions are secure and encrypted.</p>
			<select id="paymentMethod" name="paymentMethod" required>
				<option value="creditCard">Credit Card</option>
				<option value="onlineBanking">Online Banking</option>
				<option value="eWallet">E-Wallet</option>
			</select>

			<div id="creditCardDetails" style="display: block;">
				<label for="ccnum"></label>
				<input type="text" id="ccnum" name="cardnumber" placeholder="Card Number" pattern="\d{13,19}" required>
				<span class="error-message" style="display:none;">Card number must be between 13 and 19 digits.</span>

				<label for="expdate"></label>
				<input type="text" id="expdate" name="expdate" placeholder="Expiration Date" pattern="^(0[1-9]|1[0-2])\/\d{2}$" required>
				<span class="error-message" style="display:none;">Expiration date must be in MM/YY format.</span>

				<label for="cvv"></label>
				<input type="text" id="cvv" name="cvv" placeholder="Security Code (CVV)" pattern="\d{3,4}" required>
				<span class="error-message" style="display:none;">Security code must be 3 or 4 digits.</span>

				<label for="cname"></label>
				<input type="text" id="cname" name="cardname" placeholder="Name on Card" required>
				<span class="error-message" style="display:none;">Please enter the name on your card.</span>
			</div>

			<input type="submit" value="Pay Now" class="btn">
		</form>
	</div>

	<div class="cart-sidebar">
		<div class="cart-summary">
			<?php
				include ('../database/db.php');
				$user_id = 1;

				// SQL query to fetch cart items
				$sql = "SELECT pv.product_name, pv.selection, pv.price, pvi.image_path, c.quantity 
						FROM cart c
						JOIN product_variant pv ON c.variant_id = pv.id
						JOIN product_variant_images pvi ON pv.id = pvi.variant_id
						WHERE c.user_id = ?";
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('i', $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$cart_items = [];
				$total_price = 0;
				$shipping_fee = 3.99; 
				$free_shipping_threshold = 35.00;

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						$cart_items[] = $row;
						$total_price += $row['price'] * $row['quantity'];
						echo "<div class='product-item'>
								<img src='{$row['image_path']}' alt='{$row['product_name']}' class='product-image'>
								<div class='product-info'>
									<p class='product-name'>{$row['product_name']}</p>
									<p class='product-variant'>Qty: {$row['quantity']} | {$row['selection']}</p>
								</div>
								<div class='product-price'>RM" . number_format($row['price'], 2) . "</div>
							</div>";
					}

					// Check if total price is below the threshold for free shipping
					if ($total_price < $free_shipping_threshold) {
						$total_price += $shipping_fee;
						echo "<div class='summary-item'>
								<span>Shipping Fee:</span>
								<span class='total-amount'>RM" . number_format($shipping_fee, 2) . "</span>
							</div>";
					} else {
						echo "<div class='summary-item'>
								<span>Shipping Fee:</span>
								<span class='total-amount'>RM0.00</span>
							</div>";
					}
				
					echo "<div class='summary-item'>
							<span>Total:</span>
							<span class='total-amount'>RM" . number_format($total_price, 2) . "</span>
						</div>";
				} else {
					echo "<p>Your cart is empty.</p>";
				}
				
				$stmt->close();
				$conn->close();
				
			?>
		</div>
	</div>
</div>
</body>
<footer>
<?php include('../include/footer.php'); ?>
</footer>
</html>
