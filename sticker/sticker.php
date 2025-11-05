
<!--This section is the sticker page, a page that displays sticker products. 
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
    <title>Sticker</title>
</head>
<body>
  <?php include('../include/header.php'); ?>
  
 	<!-- banner section starts -->
	<section class="sbanner" id="sbanner">

		<div class="content">
			<h3>Sticker</h3>
			<p>Add a touch of personality to anything with our vibrant collection of stickers. 
			Perfect for planners, laptops, journals, and more, 
			stickers let you express yourself in endless ways. 
			From cute and quirky to sleek and sophisticated, 
			our stickers are designed to inspire creativity and bring a pop of color to your everyday items. 
			Transform the ordinary into the extraordinary, one sticker at a time.</p>
		</div>
	</section>
	<!-- banner section end -->

    <!-- Container for Products -->
    <div class="container">

        <div class="item-grid">
            <!-- Item 1 -->
            <div class="item">
				<a href="../itemDetails/sticker_minimalist art.php" class="hover">
				<div class="img-container">
                <img src="../sticker/img/s1.jpg" alt="Minimalist art ins style black and white stickers" class="main-img">
				<img src="img/s11.jpeg" alt="black and white stickers" class="hover-img">
				</div>                 
				<h3>50pcs minimalist art ins style black and white stickers</h3>
				</a>
                <p>Perfect for adding a stylish touch to your belongings.</p>
                <p class="price">RM3.50</p>
            </div>

            <!-- Item 2 -->
            <div class="item">
				<a href="../itemDetails/sticker_raspberry.php" class="hover">
				<div class="img-container">
                <img src="../sticker/img/s2.jpg" alt="Pink Raspberry Sour Horn Sticker" class="main-img">
				<img src="img/s222.jpeg" alt="Pink Raspberry Sour Horn Sticker" class="hover-img">
				</div>                 
				<h3>54pcs Pink Raspberry Sour Horn Sticker</h3>
				</a>
                <p>Vibrant and fun, perfect for decorating.</p>
                <p class="price">RM2.98</p>
            </div>

            <!-- Item 3 -->
            <div class="item">
				<a href="../itemDetails/sticker_kitten.php" class="hover">
				<div class="img-container">
                <img src="../sticker/img/s3.jpeg" alt="Cute Kittens Cats MEME Waterproof Stickers" class="main-img">
				<img src="img/s33.jpeg" alt="Cats MEME Waterproof Stickers" class="hover-img">
				</div>                 
				<h3>60pcs Cute Kittens Cats MEME Waterproof Stickers</h3>
				</a>
                <p>Waterproof and playful, ideal for personalizing items.</p>
                <p class="price">RM3.32</p>
            </div>

            <!-- Item 4 -->
            <div class="item">
				<a href="../itemDetails/sticker_celebrity quote.php" class="hover">
				<div class="img-container">
                <img src="../sticker/img/s4.jpg" alt="Retro Memo Paper Celebrity Quotes Graffiti Waterproof Stickers" class="main-img">
				<img src="img/s44.jpeg" alt="Retro Memo Paper Celebrity Quotes Graffiti Waterproof Stickers" class="hover-img">
				</div> 
                <h3>80 Pcs Retro Memo Paper Celebrity Quotes Graffiti Waterproof Stickers</h3>
				</a>
                <p>Featuring celebrity quotes, graffiti style, and waterproof.</p>
                <p class="price">RM4.20</p>
            </div>

            <!-- Item 5 -->
            <div class="item">
				<a href="../itemDetails/sticker_planet.php" class="hover">
				<div class="img-container">
                <img src="../sticker/img/s5.jpg" alt="Exotic Planet Sticker Set" class="main-img">
				<img src="img/s55.jpeg" alt="Exotic Planet Sticker Set" class="hover-img">
				</div>                 
				<h3>200pcs Exotic Planet Sticker Set</h3>
				</a>
                <p>Vibrant and unique, ideal for creative decoration.</p>
                <p class="price">RM9.66</p>
            </div>

 
        </div>
    </div>

</body>
<footer>
<?php include('../include/footer.php'); ?>
</footer>
</html>
