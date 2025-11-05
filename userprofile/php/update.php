<?php
session_start(); // Start the session to manage user login state

// Check if the user is logged in by verifying the session variable
if (!isset($_SESSION['login_username'])) {
    header("Location: /InkHouse/login/index.php"); // Redirect to the login page if the user is not logged in
    exit();
}

// Retrieve the logged-in username from the session
$username = $_SESSION['login_username'];

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'ink_house');
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error()); // If the connection fails, terminate the script and display an error message
}

// Initialize an empty array to hold messages
$messages = [];

// Handle the form submission when the user updates their profile
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
    // Sanitize and retrieve the input values
    $newUsername = mysqli_real_escape_string($conn, $_POST['username']);
    $newEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $newImage = $_FILES['image']['name'];

    // Check if a new image was uploaded
    if (!empty($newImage)) {
		
        $targetDir = "../upload/"; // Define the directory where the image will be uploaded
        $imageFileType = strtolower(pathinfo($newImage, PATHINFO_EXTENSION)); // Get the file extension
        $newFileName = uniqid('profile_', true) . '.' . $imageFileType; // Generate a new file name
        $targetFile = $targetDir . $newFileName; // Set the full path for the uploaded file

        $uploadOk = 1; // Flag to indicate if the upload is okay

        // Validate that the file is an image
        if (!empty($_FILES['image']['tmp_name'])) {
            $check = getimagesize($_FILES['image']['tmp_name']);
            if ($check === false) {
                $messages[] = "File is not an image.";
                $uploadOk = 0;
            }
        } else {
            $messages[] = "No file uploaded.";
            $uploadOk = 0;
        }

        // Check if the file already exists
        if (file_exists($targetFile)) {
            $messages[] = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check the file size (limit set to 2MB)
        if ($_FILES['image']['size'] > 2000000) {
            $messages[] = "Sorry, your file is too large. Maximum allowed size is 2MB.";
            $uploadOk = 0;
        }

        // Allow only specific file formats
        $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedFileTypes)) {
            $messages[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if there were any issues with the file upload
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $messages[] = "The file " . htmlspecialchars($newFileName) . " has been uploaded.";
            } else {
                $messages[] = "Sorry, there was an error uploading your file.";
            }
        } else {
            $newFileName = null; // If upload failed, clear the file name
        }
    } else {
        $newFileName = null; // If no new image is uploaded, keep the current image
    }

    // Update the user's information in the database
    $updateQuery = "UPDATE users SET username='$newUsername', email='$newEmail'";
    if ($newFileName) {
        $updateQuery .= ", image='$newFileName'";
    }
    $updateQuery .= " WHERE username='$username'";

    // Execute the update query and handle success or failure
    if (mysqli_query($conn, $updateQuery)) {
        $_SESSION['login_username'] = $newUsername; // Update the session with the new username
        $messages[] = "Profile updated successfully.";
    } else {
        $messages[] = "Error updating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);

    // Redirect to the viewprofile page with messages
    $_SESSION['messages'] = $messages;
    header("Location: /InkHouse/userprofile/viewprofile.php");
    exit();
}
?>
