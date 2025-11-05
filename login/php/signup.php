
<!--This code handles a user's registration request. It checks to see if the registration form has been submitted and retrieves the submitted 
username, email, and password. If all required fields are filled out, the code queries the database to make sure the username or email is not already in use by another user. 
If the username or email already exists, the code displays a message to the user and redirects back to the login page. If both the username and email are new, 
the code hashes the password, stores the new user's data in the database, notifies the user that the registration was successful, and then redirects to the login page.-->

<?php
// Connect to the MySQL database
$conn = mysqli_connect("localhost", "root", "", "ink_house");

// Check if the connection was successful
if (!$conn) {
    // If the connection fails, terminate the script and display an error message
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the signup form has been submitted
if (isset($_POST['signup'])) {
	
    // Retrieve the form data and assign to variables, or set to null if not provided
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    // Check if all required fields are provided
    if ($username && $email && $password) {
		
        // Query to check if the username or email already exists in the database
        $query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
        $result = mysqli_query($conn, $query);

        // If the query returns rows, it means the username or email is already in use
        if (mysqli_num_rows($result) > 0) {
			
            // Alert the user that the username or email already exists and redirect to the login page
            echo "<script>alert('Username or Email already exists. Please try again.');
			window.location.href = '/InkHouse/login/index.php';</script>";
        } else {
			
            // Hash the password securely before storing it in the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user data into the database
            $data = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            $check = mysqli_query($conn, $data);

            // Check if the insertion was successful
            if ($check) {
				
                // Alert the user that the account was created successfully and redirect to the login page
                echo "<script>
                        alert('Account created successfully. Please login.');
                        window.location.href = '/InkHouse/login/index.php';
                      </script>";
            } else {
				
                // If insertion fails, display an error message
                echo "Data not sent: " . mysqli_error($conn);
            }
        }
    } else {
		
        // If any fields are missing, display an error message
        echo "Please fill in all fields.<br>";
    }
}

// Close the database connection
mysqli_close($conn);
?>
