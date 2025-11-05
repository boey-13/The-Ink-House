<?php
include '../database/db.php';

session_start();
$user_id = $_SESSION['user_id'] ?? 1;

// Check if all required POST data is available
$required_fields = ['firstname', 'lastname', 'email', 'phone', 'address', 'city', 'state', 'zip', 'paymentMethod'];
foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        die('Error: Missing required field ' . $field);
    }
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$paymentMethod = $_POST['paymentMethod'];

// Retrieve cart items from the database and join with the product_variant table to get product details
$cart_query = "SELECT c.variant_id, c.quantity, pv.product_name, COALESCE(pv.selection, 'Default Selection') AS selection, pv.price 
               FROM cart c 
               JOIN product_variant pv ON c.variant_id = pv.id 
               WHERE c.user_id = ?";
$cart_stmt = $conn->prepare($cart_query);
$cart_stmt->bind_param('i', $user_id);
$cart_stmt->execute();
$cart_result = $cart_stmt->get_result();
$items = $cart_result->fetch_all(MYSQLI_ASSOC);
$cart_stmt->close();

$total_price = array_sum(array_map(function($item) {
    return $item['price'] * $item['quantity'];
}, $items));

// Inserting an order
$query = "INSERT INTO orders (user_id, firstname, lastname, email, phone_number, total_price, address, payment_method, created_at) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($query);
$full_address = $address . ', ' . $city . ', ' . $state . ' ' . $zip;
$stmt->bind_param('issssiss', $user_id, $firstname, $lastname, $email, $phone, $total_price, $full_address, $paymentMethod);
if ($stmt->execute()) {
    $order_id = $stmt->insert_id;
    
    // Loop through each item in the cart and add it to the order_items table
    foreach ($items as $item) {
        $selection = $item['selection'] ?? 'Default Selection';  // Use default value if selection is null
        $order_items_query = "INSERT INTO order_items (order_id, variant_id, product_name, selection, price, quantity) VALUES (?, ?, ?, ?, ?, ?)";
        $order_item_stmt = $conn->prepare($order_items_query);
        $order_item_stmt->bind_param('iissdi', $order_id, $item['variant_id'], $item['product_name'], $selection, $item['price'], $item['quantity']);
        $order_item_stmt->execute();
        $order_item_stmt->close();
        
        // Insert into purchase_history
        $purchase_history_query = "INSERT INTO purchase_history (user_id, product_id, order_id, purchase_date) VALUES (?, ?, ?, NOW())";
        $purchase_history_stmt = $conn->prepare($purchase_history_query);
        $purchase_history_stmt->bind_param('iii', $user_id, $item['variant_id'], $order_id);
        $purchase_history_stmt->execute();
        $purchase_history_stmt->close();
    }

    // Clear the cart after order is processed
    $clear_cart_query = "DELETE FROM cart WHERE user_id = ?";
    $clear_cart_stmt = $conn->prepare($clear_cart_query);
    $clear_cart_stmt->bind_param('i', $user_id);
    $clear_cart_stmt->execute();
    $clear_cart_stmt->close();
    
    // Save the order message
    $order_message = "The order has been successfully submitted! Your order number is: {$order_id}";
} else {
    die('Error: Order processing failed - ' . $conn->error);
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body, html {
        height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .return-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
        .return-button:hover {
            background-color: #45a049;
        }
        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        #message {
            display: none;
            text-align: center;
            padding-top: 20%;
        }
        .spinner {
            border: 6px solid #f3f3f3; /* Light grey */
            border-top: 6px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .loading-text {
            padding-top: 10px; /* Space between spinner and text */
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div id="loading">
        <div class="spinner"></div>
        <div class="loading-text">Processing your order...</div>
    </div>
    <div id="message">
        <p><?php echo $order_message; ?></p> <!-- Output the message here -->
        <a href='../homepage/index.php' class='return-button'>Return Homepage</a>
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('loading').style.display = 'none';
            document.getElementById('message').style.display = 'block';
        }, 3000); // Show loading for 3 seconds before displaying the message
    </script>
</body>
</html>
