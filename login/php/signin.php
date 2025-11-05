
<!--The function of this code is to handle the user's login request. It first checks whether the username and password are received in the POST request, 
and then connects to the database to find a matching username. If a matching username is found and the password is correct, 
the user's login status will be recorded in the session and redirected to the home page. If the username does not exist or the password is incorrect, 
the code will display an error message and redirect back to the login page.-->

<?php
session_start(); // Initializes the session to track the user's login status

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    // Retrieve the submitted username and password from the POST request
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    // Connect to the MySQL database
    $conn = mysqli_connect('localhost', 'root', '', 'ink_house');

    // Check if the connection was successful
    if (!$conn) {
		
        // If the connection fails, terminate the script and display an error message
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Query the database to find the user with the submitted username
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    // Check if exactly one user with the submitted username was found
    if (mysqli_num_rows($result) === 1) {
		
        // Fetch the user data as an associative array
        $user = mysqli_fetch_assoc($result);

        // Verify the submitted password 
        if (password_verify($password, $user['password'])) {
			
            // If the password is correct, set a session variable to indicate the user is logged in
            $_SESSION['login_username'] = $username;

            // Display a success message and redirect the user to the homepage
            echo "<script>
                    alert('Login successful! Welcome to The Ink House!');
                    window.location.href = '/InkHouse/homepage/index.php';
                  </script>";
            exit(); 
        } else {
			
            // If the password is incorrect, display an error message and redirect to the login page
            echo "<script>
                    alert('Invalid username or password. Please try again.');
                    window.location.href = '/InkHouse/login/index.php';
                  </script>";
        }
    } else {
		
        // If the username does not exist, display an error message and redirect to the login page
        echo "<script>
                alert('Invalid username or password. Please try again.');
                window.location.href = '/InkHouse/login/index.php';
              </script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
