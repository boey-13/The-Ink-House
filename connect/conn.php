
<!--The function of this part is to check the user's login status. 
By judging whether the user's username information (`login_username`) exists in the session, 
the system can determine whether the user is logged in. If the username exists, it means the user is logged in, 
otherwise, it means the user is not logged in. 
This check is usually used to control access rights or display different content based on the user's login status, 
so when the user is logged in, the dropdown list of the users icons in the header will display view profile and logout, 
and if the user is not logged in, the login option will be displayed.-->


<?php
session_start();

// This is done by checking if the 'login_username' key exists in the session
if (isset($_SESSION['login_username'])) {
	// If 'login_username' exists, it means the user is logged in
    $isLoggedIn = true;
} else {
	// If 'login_username' does not exist, it means the user is not logged in
    $isLoggedIn = false;
}
?>