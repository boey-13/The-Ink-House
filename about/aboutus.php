
<!--This part is the about us page, which clearly shows our brand creation ideas and introduction to users.-->

<?php include('../connect/conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style/aboutstyle.css">
	<link rel="stylesheet" href="../style/headfoot.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <title>About Us</title>
</head>
<body>
<?php include ('../include/header.php'); ?>

<!-- banner section starts -->
<section class="abanner" id="abanner">
	<div class="content">
		<h3>About Us</h3>
	</div>
</section>
<!-- banner section end -->
	
<!-- about us section starts -->
<section class="about-section">
    <p>Welcome to The Ink House, where creativity meets quality. Since our founding in 2024, we have been dedicated to offering a curated selection of stationery that inspires our customers to 
	bring their ideas to life. Whether you're a student, a professional, or simply someone who appreciates the beauty of well-designed stationery, we have 
	something for everyone.</p>
	<p>At The Ink House, we believe that the right tools can make a world of difference. From the perfect pen to a notebook that just feels right, we are passionate about providing products that 
	not only serve a practical purpose but also add a touch of joy to your daily routines. We carefully select each item in our store, ensuring that it meets our high standards of quality, 
	functionality, and design.</p>
	
<section class="about-images">
    <img src="image/store3.webp" alt="Store Image 1">
    <img src="image/store4.webp" alt="Store Image 2">
</section>

</section>
<!-- about us section end -->

</body>
<footer>
<?php include ('../include/footer.php'); ?>
</footer>
</html>
