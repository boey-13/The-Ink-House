<?php 
include('../connect/conn.php');

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['login_username'])) {
    // If not logged in, redirect to the login page
    header("Location: /InkHouse/login/index.php"); 
    exit();
}

// Retrieve the username from the session
$username = $_SESSION['login_username'];

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ink_house');
if (!$conn) {
    // If connection fails, display an error message and exit
    die('Connection failed: ' . mysqli_connect_error());
}

// Query to select the user details based on the username
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $query);

// If the user is found, fetch the user details
if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);
} else {
    // If no user is found, display an error message and exit
    echo "User not found.";
    exit();
}

// Query to retrieve the user's purchase history
$purchase_query = "SELECT * FROM orders WHERE user_id = ?";
$purchase_stmt = $conn->prepare($purchase_query);
$purchase_stmt->bind_param("i", $user['id']);
$purchase_stmt->execute();
$purchase_result = $purchase_stmt->get_result();

// Display any messages stored in the session
if (isset($_SESSION['messages'])) {
    foreach ($_SESSION['messages'] as $message) {
        echo "<script>alert('$message');</script>";
    }
    unset($_SESSION['messages']); // Clear messages after displaying
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../style/headfoot.css">
	<link rel="stylesheet" href="../style/userstyle.css">
</head>
<body>
    <header>
        <?php include('../include/header.php'); ?>
    </header>

    <section class="profile-order-container">
        <div class="profile-info">
            <h1>User Profile</h1>
            <?php if (!empty($user['image'])): ?>
                <img src="upload/<?php echo htmlspecialchars($user['image']); ?>" alt="Profile Image" class="profile-image">
            <?php else: ?>
                <img src="upload/default.png" alt="Default Profile Image" class="profile-image">
            <?php endif; ?>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            
            <h2>Update Profile</h2>
            <!-- Form to update the user's profile details -->
            <form action="php/update.php" method="post" enctype="multipart/form-data">
                <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" placeholder="Username" required>
                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" placeholder="Email" required>
                <input type="file" name="image">
                <input type="submit" value="Update Profile">
            </form>
        </div>

        <div class="divider"></div>

        <div class="purchase-history">
            <h1>My Orders</h1>
            <?php if ($purchase_result->num_rows > 0) : ?>
                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>Total Price</th>
                        <th>Purchase Date</th>
                        <th>Action</th>
                    </tr>
                    <?php while ($row = $purchase_result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td>RM <?php echo htmlspecialchars($row['total_price']); ?></td>
                            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                            <td><a href="order_details.php?order_id=<?php echo $row['id']; ?>">View Details</a></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else : ?>
                <p>You have no purchase history.</p>
            <?php endif; ?>
        </div>
    </section>

    <footer>
        <?php include('../include/footer.php'); ?>
    </footer>
</body>
</html>
