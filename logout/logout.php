
<!--This section of code is used to handle the user's logout operation. 
It first starts the session, then clears all session variables and destroys the session data to ensure that the user is completely logged out. 
Finally, it redirects the user to the login page to ensure that the user is directed to the correct page after logging out.-->


<?php
session_start(); // Start the session so we can access session data

session_unset(); // Remove all session variables 
session_destroy(); // Completely end the session 


// After logging out, we want to send the user back to the login page
header("Location: /InkHouse/login/index.php"); // Send them to the login page
exit(); // Make sure the script stops here, so nothing else runs
?>
