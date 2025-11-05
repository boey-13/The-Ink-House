
<!--This section is the notebook page, which is a page that displays notebook products. 
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
    <title>Notebook</title>
</head>
<body>
  <?php include('../include/header.php'); ?>
  
	<!-- banner section starts -->
	<section class="nbanner" id="nbanner">

		<div class="content">
			<h3>Notebook</h3>
			<p>Every page in our premium notebooks is a blank canvas waiting for your ideas. Whether you're capturing fleeting thoughts, sketching out your next masterpiece, 
			or jotting down daily reflections, our notebooks are designed to inspire and elevate your creativity. 
			Crafted with high-quality paper and a durable cover, it's the perfect companion for your journey, wherever it takes you.</p>
		</div>
	</section>
	<!-- banner section end -->

    <!-- Container for Products -->
    <div class="container">
        <div class="item-grid">
            <!-- Item 1 -->
            <div class="item">
				<a href="../itemDetails/notebook_american style notebook.php" class="hover">
				<div class="img-container">
					<img src="img/n1.jpeg" alt="American Style Notebook" class="main-img">
					<img src="img/n11.jpeg" alt="American Style Notebook" class="hover-img">
				</div> 
				<h3>American Style Notebook</h3>
				</a>
				<p>A high-quality notebook perfect for students.</p>
				<p class="price">RM12.90</p>
            </div>

            <!-- Item 2 -->
            <div class="item">
				<a href="../itemDetails/notebook_cute notebook.php" class="hover">
				<div class="img-container">
					<img src="img/n2.jpeg" alt="Cute Flowering Notebook" class="main-img">
					<img src="img/n22.jpeg" alt="Cute Flowering Notebook" class="hover-img">
				</div> 
                <h3>Cute Flowering Notebook</h3>
				</a>
                <p>Stylish notebook for all your writing needs.</p>
                <p class="price">RM3.88</p>
            </div>

            <!-- Item 3 -->
            <div class="item">
				<a href="../itemDetails/notebook_loose-leaf notebook.php" class="hover">
                <div class="img-container">
					<img src="img/n3.jpeg" alt="Loose-leaf Notebook" class="main-img">
					<img src="img/n33.jpeg" alt="Loose-leaf Notebook" class="hover-img">
				</div> 
                <h3>Loose-leaf Notebook</h3>
				</a>
                <p>Durable notebook with a sleek design.</p>
                <p class="price">RM15.90</p>
            </div>

            <!-- Item 4 -->
            <div class="item">
				<a href="../itemDetails/notebook_small pocket notebook.php" class="hover">
                <div class="img-container">
					<img src="img/n4.jpeg" alt="Small Pocket Notebook" class="main-img">
					<img src="img/n444.jpeg" alt="Small Pocket Notebook" class="hover-img">
				</div>
                <h3>Small Pocket Notebook</h3>
				</a>
                <p>Compact notebook, easy to carry around.</p>
                <p class="price">RM5.50</p>
            </div>

            <!-- Item 5 -->
            <div class="item">
				<a href="../itemDetails/notebook_snoopy notebook.php" class="hover">
                <div class="img-container">
					<img src="img/n5.jpg" alt="Snoopy notebook" class="main-img">
					<img src="img/n55.jpeg" alt="Snoopy notebook" class="hover-img">
				</div>
                <h3>Snoopy notebook</h3>
				</a>
                <p>Playful design, perfect for fans and everyday use.</p>
                <p class="price">RM6.88</p>
            </div>

            <!-- Item 6 -->
            <div class="item">
				<a href="../itemDetails/notebook_TACOTACO notebook.php" class="hover">
                <div class="img-container">
					<img src="img/n6.jpeg" alt="TACOTACO Note Book" class="main-img">
					<img src="img/n66.jpeg" alt="TACOTACO Note Book" class="hover-img">
				</div>
                <h3>TACOTACO Note Book Handbook</h3>
				</a>
                <p>Perfect for jotting down notes, ideas, and daily plans.</p>
                <p class="price">RM9.99</p>
            </div>
        </div>
    </div>
	
</body>
<footer>
<?php include('../include/footer.php'); ?>
</footer>
</html>
