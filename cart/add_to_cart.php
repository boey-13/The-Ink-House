<?php
include '../database/db.php';

$variant_id = $_POST['variant_id'];
$quantity = (int)$_POST['quantity'];
// Assume the current user_id is 1
$user_id = 1; 

// Check current stock in database
$stock_query = "SELECT amount FROM product_variant WHERE id = ?";
$stmt = $conn->prepare($stock_query);
$stmt->bind_param('i', $variant_id);
$stmt->execute();
$stock_result = $stmt->get_result();
$stock_row = $stock_result->fetch_assoc();
$current_stock = (int)$stock_row['amount'];

// Check the product stock
if ($quantity > $current_stock) {
	echo json_encode(['success' => false, 'message' => 'Insufficient stock to add an item. Current Inventory: ' . $current_stock . ', The amount you try to add: ' . $quantity]);
} else {
	// Check if the same product is already in the shopping cart
	$cart_check_query = "SELECT id, quantity FROM cart WHERE user_id = ? AND variant_id = ?";
	$stmt = $conn->prepare($cart_check_query);
	$stmt->bind_param('ii', $user_id, $variant_id);
	$stmt->execute();
	$cart_check_result = $stmt->get_result();

	if ($cart_check_result->num_rows > 0) {
		// If the item is already in the shopping cart, update the quantity
		$cart_row = $cart_check_result->fetch_assoc();
		$new_cart_quantity = $cart_row['quantity'] + $quantity;

		// Update shopping cart and stock
		$update_cart_query = "UPDATE cart SET quantity = ? WHERE id = ?";
		$stmt = $conn->prepare($update_cart_query);
		$stmt->bind_param('ii', $new_cart_quantity, $cart_row['id']);
		$stmt->execute();

		// Update stock
		$new_stock_amount = $current_stock - $quantity;
		$update_stock_query = "UPDATE product_variant SET amount = ? WHERE id = ?";
		$stmt = $conn->prepare($update_stock_query);
		$stmt->bind_param('ii', $new_stock_amount, $variant_id);
		$stmt->execute();

		echo json_encode(['success' => true, 'cartCount' => $new_cart_quantity]);
	} else {
		// If the item is not in the shopping cart, then add to cart
		$insert_cart_query = "INSERT INTO cart (user_id, variant_id, quantity) VALUES (?, ?, ?)";
		$stmt = $conn->prepare($insert_cart_query);
		$stmt->bind_param('iii', $user_id, $variant_id, $quantity);
		$stmt->execute();

		// Update stock
		$new_stock_amount = $current_stock - $quantity;
		$update_stock_query = "UPDATE product_variant SET amount = ? WHERE id = ?";
		$stmt = $conn->prepare($update_stock_query);
		$stmt->bind_param('ii', $new_stock_amount, $variant_id);
		$stmt->execute();

		echo json_encode(['success' => true, 'cartCount' => $quantity]);
	}
}

$stmt->close();
$conn->close();
?>
