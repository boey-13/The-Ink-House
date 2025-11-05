<?php
include '../database/db.php';

$cart_id = $_POST['cart_id'];
$new_quantity = (int)$_POST['quantity'];
// Assume the current user_id is 1
$user_id = 1;

$response = ['success' => false];

if ($new_quantity > 0) {
	// Check current stock and quantity in shopping cart
	$stock_query = "SELECT pv.amount, c.quantity FROM product_variant pv JOIN cart c ON pv.id = c.variant_id WHERE c.id = ?";
	$stmt = $conn->prepare($stock_query);
	$stmt->bind_param('i', $cart_id);
	$stmt->execute();
	$stock_result = $stmt->get_result();
	$stock_row = $stock_result->fetch_assoc();
	$current_stock = (int)$stock_row['amount'];
	$current_cart_quantity = (int)$stock_row['quantity'];

	// Calculate changes in inventory for actual requirements
	$required_quantity_change = $new_quantity - $current_cart_quantity;

	// Check the product stock in database
	if ($required_quantity_change > $current_stock) {
		$response['message'] = 'Insufficient stock to add an item. Current Inventory: ' . $current_stock . '，The amount you try to add: ' . $new_quantity;
	} else {
		// Update product amount in shopping cart
		$update_cart_query = "UPDATE cart SET quantity = ? WHERE id = ?";
		$stmt = $conn->prepare($update_cart_query);
		$stmt->bind_param('ii', $new_quantity, $cart_id);
		$stmt->execute();

		// Recalculate product stock
		$new_stock_amount = $current_stock - $required_quantity_change;

		// Update stock
		$update_stock_query = "UPDATE product_variant SET amount = ? WHERE id = (SELECT variant_id FROM cart WHERE id = ?)";
		$stmt = $conn->prepare($update_stock_query);
		$stmt->bind_param('ii', $new_stock_amount, $cart_id);
		$stmt->execute();

		if ($stmt->affected_rows > 0) {
			$response['success'] = true;
			$response['newTotal'] = calculateNewTotal($cart_id, $new_quantity);
			$response['newMaxStock'] = $new_stock_amount; // Provide the new max stock
		} else {
			$response['message'] = 'No update or no change in quantity';
			$response['currentStock'] = $current_stock; // Provide current stock in case of failure
		}
	}

	$stmt->close();
} else {
	$response['message'] = 'Quantity must be greater than zero';
}

header('Content-Type: application/json');
echo json_encode($response);

$conn->close();

function calculateNewTotal($cartId, $quantity) {
	global $conn;
	$stmt = $conn->prepare("SELECT price FROM product_variant WHERE id = (SELECT variant_id FROM cart WHERE id = ?)");
	$stmt->bind_param("i", $cartId);
	$stmt->execute();
	$result = $stmt->get_result();
	if ($row = $result->fetch_assoc()) {
		return $row['price'] * $quantity;
	}
	return 0;
}
?>
