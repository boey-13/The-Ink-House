<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Sanitize and validate inputs
	$firstname = trim($_POST['firstname']);
	$lastname = trim($_POST['lastname']);
	$email = trim($_POST['email']);
	$phone = trim($_POST['phone']);
	$address = trim($_POST['address']);
	$city = trim($_POST['city']);
	$zip = trim($_POST['zip']);
	$paymentMethod = trim($_POST['paymentMethod']); // Capture the payment method
	$cardnumber = trim($_POST['cardnumber']);
	$expdate = trim($_POST['expdate']);
	$cvv = trim($_POST['cvv']);
	$cardname = trim($_POST['cardname']);

	// General validation for all fields
	if (strlen($firstname) < 5) {
		$errors['firstname'] = 'Full name must be at least 7 characters long.';
	}
	
	if (strlen($lastname) < 2) {
		$errors['lastname'] = 'Last name must be at least 2 characters long.';
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Please enter a valid email address.';
	}

	if (!preg_match('/^\d{10,11}$/', $phone)) {
		$errors['phone'] = 'Phone number must be 10 or 11 digits.';
	}

	if (empty($address)) {
		$errors['address'] = 'Please enter your address.';
	}

	if (empty($city)) {
		$errors['city'] = 'Please enter your city.';
	}

	if (!preg_match('/^\d{5}$/', $zip)) {
		$errors['zip'] = 'ZIP code must be 5 digits.';
	}

	// Validate credit card fields only if payment method is Credit Card
	if ($paymentMethod === 'creditCard') {
		if (!preg_match('/^\d{13,19}$/', $cardnumber)) {
			$errors['cardnumber'] = 'Card number must be between 13 and 19 digits.';
		}

		if (!preg_match('/^(0[1-9]|1[0-2])\/\d{2}$/', $expdate)) {
			$errors['expdate'] = 'Expiration date must be in MM/YY format.';
		}

		if (!preg_match('/^\d{3,4}$/', $cvv)) {
			$errors['cvv'] = 'Security code must be 3 or 4 digits.';
		}

		if (empty($cardname)) {
			$errors['cardname'] = 'Please enter the name on your card.';
		}
	}

	// Check if there are no errors
	if (empty($errors)) {
		$total_price = 100.00; // Replace with your actual logic
		echo "Total Price: RM" . number_format($total_price, 2);

	}	
}
?>
