<?php
include('../database/db.php');

$cart_id = $_POST['cart_id'];
// Assume the current user_id is 1
$user_id = 1;

// Check product amount and variant_id in shopping cart
$cart_query = "SELECT quantity, variant_id FROM cart WHERE id = $cart_id AND user_id = $user_id";
$cart_result = $conn->query($cart_query);

if ($cart_result->num_rows > 0) {
	$cart_row = $cart_result->fetch_assoc();
	$quantity = $cart_row['quantity'];
	$variant_id = $cart_row['variant_id'];

	// Remove product in shopping cart
	$delete_query = "DELETE FROM cart WHERE id = $cart_id";
	if ($conn->query($delete_query) === TRUE) {
		// Adding stock in database
		$update_stock_query = "UPDATE product_variant SET amount = amount + $quantity WHERE id = $variant_id";
		$conn->query($update_stock_query);
	}
}
$conn->close();
?>
