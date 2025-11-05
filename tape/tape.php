
<!--This part is the tape item list. When the user selects a tape through the navigation bar or in the category, 
they will be navigated to this page. The item list provides all the tape products, including price, photos, 
and a brief introduction. We use CSS to achieve that when the user touches a photo, 
it will automatically change to another photo and hover effect, 
which can increase the user's visual sense and interactive feeling.-->

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
    <title>Tape</title>
</head>
<body>
  <?php include('../include/header.php'); ?>
  
	<!-- banner section starts -->
	<section class="tbanner" id="tbanner">

		<div class="content">
			<h3>Tape</h3>
			<p>Discover the versatility of our decorative tapes, perfect for adding a unique flair to your projects. 
			Whether you're sealing a gift, enhancing your scrapbook, or personalizing your stationery, 
			our tapes come in a variety of colors, patterns, and textures to suit your creative needs. 
			Elevate your crafting and organizing with tapes that are as functional as they are beautiful.</p>
		</div>
	</section>
	<!-- banner section end -->

    <!-- Container for Products -->
    <div class="container">

        <div class="item-grid">
            <!-- Item 1 -->
            <div class="item">
				<a href="../itemDetails/tape_retro tape.php" class="hover">
				<div class="img-container">
                <img src="../tape/img/t1.jpg" alt="Retro Style Tape Stickers" class="main-img">
				<img src="img/t11.jpeg" alt="Retro Style Tape Stickers" class="hover-img">
				</div>
                <h3>5 Rolls Boxed Retro Style Tape Stickers</h3>
				</a>
                <p>Perfect for adding a vintage touch.</p>
                <p class="price">RM3.37</p>
            </div>

            <!-- Item 2 -->
            <div class="item">
				<a href="../itemDetails/tape_flower tape.php" class="hover">
				<div class="img-container">
                <img src="../tape/img/t2.jpeg" alt="Autumn Flowers Washi Tape Set" class="main-img">
				<img src="img/t22.jpeg" alt="Autumn Flowers Washi Tape Set" class="hover-img">
				</div>
                <h3>Autumn Flowers Washi Tape Set</h3>
				</a>
                <p>Warm tones, ideal for seasonal crafting.</p>
                <p class="price">RM13.59</p>
            </div>

            <!-- Item 3 -->
            <div class="item">
				<a href="../itemDetails/tape_journaling tape.php" class="hover">
				<div class="img-container">
                <img src="../tape/img/t3.jpg" alt="Bullet Journaling Adhesive Tapes" class="main-img">
				<img src="img/t33.jpeg" alt="Bullet Journaling Adhesive Tapes" class="hover-img">
				</div>
                <h3>Journamm 5pcs5m Solid Color Bullet Journaling Adhesive Tapes</h3>
				</a>
                <p>Perfect for bullet journaling and crafting.</p>
                <p class="price">RM4.90</p>
            </div>

            <!-- Item 4 -->
            <div class="item">
				<a href="../itemDetails/tape_tulip vintage tape.php" class="hover">
				<div class="img-container">
                <img src="../tape/img/t4.jpeg" alt="Tulip Vintage Time Washi Tape" class="main-img">
				<img src="img/t44.webp" alt="Tulip Vintage Time Washi Tap" class="hover-img">
				</div>
                <h3>Tulip Vintage Time Washi Tape</h3>
				</a>
                <p>Elegant and timeless, ideal for decoration.</p>
                <p class="price">RM6.90</p>
            </div>

        </div>
    </div>

</body>
<footer>
<?php include('../include/footer.php'); ?>
</footer>
</html>
