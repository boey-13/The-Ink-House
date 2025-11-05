<?php
include('../database/db.php');

// Assume the current user_id is 1
$user_id = 1; 

$query = "SELECT c.id, p.name, pv.product_name, pv.selection, pv.price, pvi.image_path, c.quantity, pv.amount AS stock 
		  FROM cart c
		  JOIN product_variant pv ON c.variant_id = pv.id
		  JOIN product p ON pv.product_id = p.id
		  LEFT JOIN product_variant_images pvi ON pv.id = pvi.variant_id
		  WHERE c.user_id = $user_id";

$result = $conn->query($query);
$total_price = 0;

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$subtotal = $row['quantity'] * $row['price'];
		$total_price += $subtotal;

		// Start of cart item container
		echo "<div class='cart-item' id='cart-item-" . $row['id'] . "' style='display: flex; align-items: center; padding: 15px 0; border-bottom: 1px solid #ddd;'>";

		// Image and product details container
		echo "<div style='flex: 2; display: flex; align-items: center;'>";
		echo "<img src='" . $row['image_path'] . "' alt='" . $row['product_name'] . "' style='width: 100px; height: auto; margin-right: 15px;'>";
		echo "<div style='display: flex; flex-direction: column;'>";
		echo "<span style='font-size:1.15rem; font-weight: bold;'>" . $row['product_name'] . " - " . $row['selection'] . "</span>";
		echo "</div>";
		echo "</div>";

		// Quantity controls container
		echo "<div style='flex: 1; display: flex; justify-content: center; align-items: center;'>";
		echo "<div class='quantity-control' style='display: flex; align-items: center;'>";
		echo "<button onclick='updateQuantity(" . $row['id'] . ", -1)' style='border: none; background-color: #ddd; padding: 5px; cursor: pointer;'>-</button>";
		echo "<input type='text' id='quantity-" . $row['id'] . "' value='" . $row['quantity'] . "' readonly data-max-stock='" . $row['stock'] . "' style='width: 40px; text-align: center; margin: 0 5px;'>";
		echo "<button onclick='updateQuantity(" . $row['id'] . ", 1)' style='border: none; background-color: #ddd; padding: 5px; cursor: pointer;'>+</button>";
		echo "</div>";
		echo "</div>";

		// Price and remove button container
		echo "<div style='flex: 1; text-align: right; display: flex; flex-direction: column; align-items: flex-end;'>";
		echo "<div class='item-total' id='total-" . $row['id'] . "' style='font-size:1.15rem; font-weight: bold;'>RM" . number_format($subtotal, 2) . "</div>";
		echo "<div class='remove-item' onclick='removeFromCart(" . $row['id'] . ", event)' style='color: #d9534f; cursor: pointer; text-decoration: underline; margin-top: 5px;'>Remove</div>";
		echo "</div>";
			
		// End of cart item container
		echo "</div>";
	}
} else {
	echo "<div class='cart-item'>Your shopping cart is empty.</div>";
}

$conn->close();
?>
