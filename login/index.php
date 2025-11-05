
<!-- This part is the login and sign up page. We allow customers to log in to their accounts, 
or new customers to create an account. Or if customers do not want to create or log in to an account, 
they can also use guest login to enter the homepage.-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import Google Fonts for styling -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <!-- Import Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <title>The Ink House Login</title>
    <link rel="stylesheet" href="../style/loginstyle.css">
</head>
<body>

<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
		
            <!-- Sign In Form -->
            <form method="post" action="php/signin.php" class="sign-in-form">
                <h2 class="title">Sign In</h2>
				
                <!-- Username input field -->
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="login_username" placeholder="Username" required>
                </div>
				
                <!-- Password input field -->
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="login_password" placeholder="Password" required>
                </div>
				
                <!-- Sign In button -->
                <input type="submit" name="login" value="login" class="btn solid"></input>
				
                <!-- Link for guest login -->
				<a class="home-text" href="../homepage/index.php">Guest Login</a>
            </form>
            
            <!-- Sign Up Form -->
            <form action="php/signup.php" method="post" class="sign-up-form">
                <h2 class="title">Sign Up</h2>
				
                <!-- Username input field -->
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
				
                <!-- Email input field -->
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
				
                <!-- Password input field -->
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
				
                <!-- Sign Up button -->
                <input type="submit" name="signup" value="Sign up" class="btn solid"></input>
				
                <!-- Link for guest login -->
				<a class="home-text" href="../homepage/index.php">Guest Login</a>
            </form>

        </div>
    </div>
    
    
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New Here?</h3>
                <p>Start your creative journey with us! Sign up now for special offers, the latest updates, and a community that shares your passion for stationery.
                Join the Ink House Family!
                </p>
                <!-- Button to switch to the Sign Up form -->
                <button class="btn transparent" id="sign-up-btn">Sign Up</button>
            </div>
            <!-- Image on the left panel -->
            <img src="img/signup.png" class="image">
        </div>
        
        <div class="panel right-panel">
            <div class="content">
                <h3>One of Us?</h3>
                <p>Unlock exclusive deals, get early access to new arrivals, and connect with fellow stationery lovers. 
                Welcome to a world where your creativity thrives!
                </p>
                <!-- Button to switch to the Sign In form -->
                <button class="btn transparent" id="sign-in-btn">Sign In</button>
            </div>
            <!-- Image on the right panel -->
            <img src="img/login.png" class="image">
        </div>
    </div>
</div>

<script src="app.js"></script>
</body>
</html>
