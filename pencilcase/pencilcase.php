
<!-- This section is the pencil case page, which is a page that displays pencil case products. 
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
    <title>Pencil Case</title>
</head>
<body>
  <?php include('../include/header.php'); ?>
  
	<!-- banner section starts -->
	<section class="pcbanner" id="pcbanner">

		<div class="content">
			<h3>Pencil Case</h3>
			<p>Keep your essentials neatly organized with our stylish pencil cases. Whether you're a student, artist, or professional, 
			our range of pencil cases offers the perfect blend of functionality and fashion. 
			Designed with durable materials and available in various sizes, 
			these cases protect your writing tools and accessories while adding a touch of elegance to your everyday routine.</p>
		</div>
	</section>
	<!-- banner section end -->

    <!-- Container for Products -->
    <div class="container">
        <div class="item-grid">
            <!-- Item 1 -->
            <div class="item">
				<a href="../itemDetails/pencilcase_corduroy pen case.php" class="hover">
				<div class="img-container">
                <img src="img/pc1.jpg" alt="Corduroy Pen Case" class="main-img">
				<img src="img/pc11.jpeg" alt="Corduroy Pen Case" class="hover-img">
				</div>
                <h3>Corduroy Pen Case</h3>
				</a>
                <p>Soft texture, stylish and durable.</p>
                <p class="price">RM10.90</p>
            </div>

            <!-- Item 2 -->
            <div class="item">
				<a href="../itemDetails/pencilcase_floral pen bag.php" class="hover">
				<div class="img-container">
                <img src="../pencilcase/img/pc2.jpeg" alt="Fresh Small Floral Pen Bag" class="main-img">
				<img src="img/pc22.jpeg" alt="Fresh Small Floral Pen Bag" class="hover-img">
				</div>
                <h3>Fresh Small Floral Pen Bag</h3>
				</a>
                <p>Fresh design, compact storage.</p>
                <p class="price">RM11.99</p>
            </div>

            <!-- Item 3 -->
            <div class="item">
				<a href="../itemDetails/pencilcase_window pencil case.php" class="hover">
				<div class="img-container">
                <img src="../pencilcase/img/pc3.png" alt="Front Window Pencil Case" class="main-img">
				<img src="img/pc33.jpeg" alt="Front Window Pencil Case" class="hover-img">
				</div>
                <h3>Front Window Pencil Case</h3>
				</a>
                <p>Clear view, easy access.</p>
                <p class="price">RM15.90</p>
            </div>

            <!-- Item 4 -->
            <div class="item">
				<a href="../itemDetails/pencilcase_muji mesh pencil case.php" class="hover">
				<div class="img-container">
                <img src="../pencilcase/img/pc4.jpg" alt="Ins MUJI Mesh Pencil Case" class="main-img">
				<img src="img/pc44.jpeg" alt="Ins MUJI Mesh Pencil Case" class="hover-img">
				</div>
                <h3>Ins MUJI Mesh Pencil Case</h3>
				</a>
                <p>Minimalist design, breathable storage.</p>
                <p class="price">RM7.69</p>
            </div>

            <!-- Item 5 -->
            <div class="item">
				<a href="../itemDetails/pencilcase_ship shape pencil case.php" class="hover">
				<div class="img-container">
                <img src="../pencilcase/img/pc5.jpeg" alt="Ship Shape White Pen Bag" class="main-img">
				<img src="img/pc55.jpg" alt="Ship Shape White Pen Bag" class="hover-img">
				</div>
                <h3>Ship Shape White Pen Bag</h3>
				</a>
                <p>Unique design, spacious storage.</p>
                <p class="price">RM8.99</p>
            </div>
        </div>
    </div>

</body>
<footer>
<?php include('../include/footer.php'); ?>
</footer>
</html>
