
<!--This section is the pen page, a page that showcases pen products. 
This section displays a banner image and a grid of products, each with an image, name, description, and price.-->

<?php include('../connect/conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../style/itemstyle.css">
	<link rel="stylesheet" href="../style/headfoot.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <title>Pens</title>
</head>
<body>
  <?php include('../include/header.php'); ?>
  
 	<!-- banner section starts -->
	<section class="pbanner" id="pbanner">

		<div class="content">
			<h3>Pens</h3>
			<p>Discover the perfect pen to express your thoughts with precision and style. Our collection offers everything from sleek ballpoint pens to smooth gel pens, 
			designed to meet your writing needs. Whether you're jotting down notes, 
			signing important documents, or sketching your next masterpiece, 
			our pens provide the ideal balance of comfort and performance. 
			Elevate your writing experience with tools crafted for excellence.</p>
		</div>
	</section>
	<!-- banner section end -->

    <!-- Container for Products -->
    <div class="container">>

        <div class="item-grid">
            <!-- Item 1 -->
            <div class="item">
				<a href="../itemDetails/pen_highlighter.php" class="hover">
				<div class="img-container">
                <img src="../pen/img/p1.jpeg" alt="Gradient Color Highlighter" class="main-img">
				<img src="img/p11.jpeg" alt="Gradient Color Highlighter" class="hover-img">
				</div>                
				<h3>4PCS Gradient Color Highlighter</h3>
				</a>
                <p>Vibrant colors, smooth highlighting.</p>
                <p class="price">RM5.00</p>
            </div>

            <!-- Item 2 -->
            <div class="item">
				<a href="../itemDetails/pen_macaron gel pen.php" class="hover">
				<div class="img-container">
                <img src="../pen/img/p2.jpeg" alt="Fancy Stationery Cute Macaron Gel Pen" class="main-img">
				<img src="img/p22.jpeg" alt="Fancy Stationery Cute Macaron Gel Pen" class="hover-img">
				</div>              
			    <h3>Fancy Stationery Cute Macaron Gel Pen</h3>
				</a>
                <p>Cute Macaron Gel Pen, fun design, smooth writing.</p>
                <p class="price">RM2.99</p>
            </div>

            <!-- Item 3 -->
            <div class="item">
				<a href="../itemDetails/pen_black ink pen.php" class="hover">
				<div class="img-container">
                <img src="../pen/img/p3.jpeg" alt="MUJI 0.5mm Smooth Black Ink Pen" class="main-img">
				<img src="img/p33.jpeg" alt="MUJI 0.5mm Smooth Black Ink Pen" class="hover-img">
				</div>
				<h3>MUJI 0.5mm Smooth Black Ink Pen</h3>
				</a>
                <p>Smooth writing, minimalist design.</p>
                <p class="price">RM1.09</p>
            </div>

            <!-- Item 4 -->
            <div class="item">
				<a href="../itemDetails/pen_angel series pen.php" class="hover">
				<div class="img-container">
                <img src="../pen/img/p4.jpeg" alt="Ohaya Mura White Angel Series Pen" class="main-img">
				<img src="img/p44.jpeg" alt="Ohaya Mura White Angel Series Pen" class="hover-img">
				</div>
				<h3>Ohaya Mura White Angel Series Pen</h3>
				</a>
                <p>Smooth writing, minimalist design.</p>
                <p class="price">RM1.50</p>
            </div>

            <!-- Item 5 -->
            <div class="item">
				<a href="../itemDetails/pen_retractable gel pen.php" class="hover">
				<div class="img-container">
                <img src="../pen/img/p5.jpeg" alt="Simple Retractable Gel Pen" class="main-img">
				<img src="img/p55.jpeg" alt="Simple Retractable Gel Pen" class="hover-img">
				</div>	
                <h3>Simple Retractable Gel Pen</h3>
				</a>
                <p>Smooth writing, comfortable grip.</p>
                <p class="price">RM1.59</p>
            </div>

           
        </div>
    </div>

</body>
<footer>
<?php include('../include/footer.php'); ?>
</footer>
</html>
