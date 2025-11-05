<?php 
include('../connect/conn.php');

if (!isset($_GET['order_id'])) {
    die('Order ID not specified.');
}

$order_id = $_GET['order_id'];

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ink_house');
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Query to select the order details based on the order_id
$order_query = "SELECT * FROM orders WHERE id = ?";
$order_stmt = $conn->prepare($order_query);
$order_stmt->bind_param("i", $order_id);
$order_stmt->execute();
$order_result = $order_stmt->get_result();

if ($order_result->num_rows === 1) {
    $order = $order_result->fetch_assoc();
} else {
    die('Order not found.');
}

// Query to get the items for this order along with product details and images
// Updated query to join based on variant_id to ensure correct product variant is fetched
$items_query = "
    SELECT oi.*, pv.product_name, pvi.image_path 
    FROM order_items oi 
    JOIN product_variant pv ON oi.variant_id = pv.id 
    JOIN product_variant_images pvi ON pv.id = pvi.variant_id 
    WHERE oi.order_id = ?";
$items_stmt = $conn->prepare($items_query);
$items_stmt->bind_param("i", $order_id);
$items_stmt->execute();
$items_result = $items_stmt->get_result();

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <title>Order Details</title>
	<link rel="stylesheet" href="../style/orderdetailstyle.css">
    <link rel="stylesheet" href="../style/headfoot.css">
</head>
<body>
    <header>
        <?php include('../include/header.php'); ?>
    </header>

    <section class="order-container">
        <div class="order-info">
            <h1>Order Details</h1>
            <p><strong>Name: </strong> <p><?php echo htmlspecialchars($order['firstname'] . ' ' . $order['lastname']); ?></p></p>
            <p><strong>Email: </strong> <p><?php echo htmlspecialchars($order['email']); ?></p></p>
            <p><strong>Phone Number: </strong> <p><?php echo htmlspecialchars($order['phone_number']); ?></p></p>
            <p><strong>Address: </strong> <p><?php echo htmlspecialchars($order['address']); ?></p></p>
            <p><strong>Payment Method: </strong> <p><?php echo htmlspecialchars($order['payment_method']); ?></p></p>
            <p><strong>Order Date: </strong> <p><?php echo htmlspecialchars($order['created_at']); ?></p></p>
        </div>

        <div class="divider"></div>

        <div class="items-list">
            <h2>Items in this order</h2>
            <?php while ($item = $items_result->fetch_assoc()) : ?>
                <div class="item-row">
                    <img src="<?php echo htmlspecialchars($item['image_path']); ?>" alt="Product Image" class="product-image">
                    <div class="item-info">
                        <h3><?php echo htmlspecialchars($item['product_name']); ?></h3>
                        <p><strong>Selection:</strong> <?php echo htmlspecialchars($item['selection']); ?></p>
                        <p><strong>Price: </strong>RM <?php echo htmlspecialchars($item['price']); ?></p>
                        <p><strong>Quantity:</strong> <?php echo htmlspecialchars($item['quantity']); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <footer>
        <?php include('../include/footer.php'); ?>
    </footer>
</body>
</html>
