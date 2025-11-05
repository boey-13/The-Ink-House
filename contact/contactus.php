
<!--This is the contact us page, where we provide a form for users to fill in their information and messages. 
In addition, we also provide store information (phone number, address and email) so that users can contact us faster to solve their problems. 
In addition, we also add form validation to confirm that the user has filled in valid information.-->

<?php include('../connect/conn.php'); ?>

<?php
// Initialize error variables and input variables with empty values
$firstnameErr = $lastnameErr = $emailErr = $phoneErr = $categoryErr = $subjectErr = $messageErr = "";
$firstname = $lastname = $email = $phone = $category = $subject = $message = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;
	
	// Check Validate
    if (empty($_POST["firstname"])) {
        $firstnameErr = "First Name is required";
        $isValid = false;
    } else {
        $firstname = test_input($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
            $firstnameErr = "Only letters and white space allowed";
            $isValid = false;
        }
    }

    if (empty($_POST["lastname"])) {
        $lastnameErr = "Last Name is required";
        $isValid = false;
    } else {
        $lastname = test_input($_POST["lastname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
            $lastnameErr = "Only letters and white space allowed";
            $isValid = false;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $isValid = false;
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $isValid = false;
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
        $isValid = false;
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{10,15}$/",$phone)) {
            $phoneErr = "Invalid phone number format";
            $isValid = false;
        }
    }

    if (empty($_POST["category"])) {
        $categoryErr = "Category is required";
        $isValid = false;
    } else {
        $category = test_input($_POST["category"]);
    }

    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required";
        $isValid = false;
    } else {
        $subject = test_input($_POST["subject"]);
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
        $isValid = false;
    } else {
        $message = test_input($_POST["message"]);
    }
	
	// If all inputs are valid, display a success message and clear the form
    if ($isValid) {
        echo "<script>alert('Thank you for contacting us!');</script>";
        $firstname = $lastname = $email = $phone = $category = $subject = $message = "";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - The Ink House</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	<link rel="stylesheet" href="../style/headfoot.css"> 
	<link rel="stylesheet" href="../style/contact.css"> 
</head>
<body>
    <header>
        <?php include('../include/header.php'); ?>
    </header>
    <section class="contact-section">
        <div class="form-container">
            <h1>Contact Us</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <label for="firstname">First Name: </label>
                <input type="text" id="firstname" name="firstname" value="<?php echo $firstname;?>">
                <span class="error">* <?php echo $firstnameErr;?></span>

                <label for="lastname">Last Name: </label>
                <input type="text" id="lastname" name="lastname" value="<?php echo $lastname;?>">
                <span class="error">* <?php echo $lastnameErr;?></span>
                
                <label for="email">Email: </label>
                <input type="email" id="email" name="email" value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span>

                <label for="phone">Phone Number: </label>
                <input type="text" id="phone" name="phone" value="<?php echo $phone;?>">
                <span class="error">* <?php echo $phoneErr;?></span>

                <label for="category">Category: </label>
                <select id="category" name="category">
                    <option value="">Select</option>
                    <option value="issue" <?php if ($category == "issue") echo "selected";?>>Report an Issue</option>
                    <option value="suggestion" <?php if ($category == "suggestion") echo "selected";?>>Suggestion</option>
                </select>
                <span class="error">* <?php echo $categoryErr;?></span>

                <label for="subject">Subject: </label>
                <input type="text" id="subject" name="subject" value="<?php echo $subject;?>">
                <span class="error">* <?php echo $subjectErr;?></span>

                <label for="message">Message: </label>
                <textarea id="message" name="message"><?php echo $message;?></textarea>
                <span class="error">* <?php echo $messageErr;?></span>

                <button type="submit" name="submit">Submit</button>
            </form>
        </div>

        <div class="info-container">
            <h2>Get in Touch</h2>
            <p>If you have any questions, feel free to contact us. We are here to help you!</p>
            <div class="contact-details">
                <p><i class="fas fa-phone-alt"></i> +6011-11223344</p>
                <p><i class="fas fa-envelope"></i> support@inkhouse.com</p>
                <p><i class="fas fa-map-marker-alt"></i> No.88, Lorong Panggung, City Centre, 50000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p>
            </div>
            <div class="contact-image">
                <img src="img/shop.webp" alt="Contact Image">
				<img src="img/shop2.webp" alt="Contact Image">
            </div>
        </div>
    </section>
	
	<footer>
<?php include('../include/footer.php'); ?>
</footer>
</body>
</html>

