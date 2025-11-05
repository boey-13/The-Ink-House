<?php include('../connect/conn.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">
	<link rel="stylesheet" href="../style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	<link rel="stylesheet" href="../style/styles.css">
	<link rel="stylesheet" href="../style/headfoot.css">
    <title>Item Details</title>


    <script>
		let images = [
			"../item images/tape image/Tulip Vintage Time Washi Tape/1.webp",
			"../item images/tape image/Tulip Vintage Time Washi Tape/2.jpeg",
			"../item images/tape image/Tulip Vintage Time Washi Tape/daisy.jpeg",
			"../item images/tape image/Tulip Vintage Time Washi Tape/lovely.jpeg",
			"../item images/tape image/Tulip Vintage Time Washi Tape/red tulip.jpeg",
			"../item images/tape image/Tulip Vintage Time Washi Tape/yellow tulip.jpeg"
		];
		
	</script>
	<script src="../itemDetails/itemDetailsJS.js"></script>
	<script>
		

		function loadReviews() {
			const reviewsList = document.getElementById('reviews-list');
			const savedReviews = JSON.parse(localStorage.getItem('tulipTape_reviews')) || [];
			reviewsList.innerHTML = savedReviews.join('');
		}

		function saveReview(reviewHTML) {
			const savedReviews = JSON.parse(localStorage.getItem('tulipTape_reviews')) || [];
			savedReviews.push(reviewHTML);
			localStorage.setItem('tulipTape_reviews', JSON.stringify(savedReviews));
		}

    </script>
</head>

<body>
    <?php include('../include/header.php'); ?>
	<div id="overlay"></div>
    <div class="container">
        <div class="item-images">
		
			<!-- Thumbnail images -->
            <div class="thumbnails">
                <img class="thumbnail" src="../item images/tape image/Tulip Vintage Time Washi Tape/1.webp" alt="Thumbnail 1" onclick="selectImage(0)">
                <img class="thumbnail" src="../item images/tape image/Tulip Vintage Time Washi Tape/2.jpeg" alt="Thumbnail 2" onclick="selectImage(1)">
                <img class="thumbnail" src="../item images/tape image/Tulip Vintage Time Washi Tape/daisy.jpeg" alt="Thumbnail 3" onclick="selectImage(2)">
                <img class="thumbnail" src="../item images/tape image/Tulip Vintage Time Washi Tape/lovely.jpeg" alt="Thumbnail 4" onclick="selectImage(3)">
                <img class="thumbnail" src="../item images/tape image/Tulip Vintage Time Washi Tape/red tulip.jpeg" alt="Thumbnail 5" onclick="selectImage(4)">
                <img class="thumbnail" src="../item images/tape image/Tulip Vintage Time Washi Tape/yellow tulip.jpeg" alt="Thumbnail 6" onclick="selectImage(5)">
            </div>
		
			<!-- Main image -->
			<div class="main-image">
				<img id="main-image" src="../item images/tape image/Tulip Vintage Time Washi Tape/1.webp" alt="item-image" class="item-image" onclick="openModal()">
				
				
				<div class="carousel-controls">
					<button onclick="prevImage()">&#10094;</button>
					<button onclick="nextImage()">&#10095;</button>
				</div>
			</div>

        </div>
		
        <div class="item-info">
            <h1>Tulip Vintage Time Washi Tape</h1>
            <div class="price">RM 8.80</div>
            <div class="discounted-price">RM 6.90</div>
            <div class="stock">In Stock</div>

            <div class="item-options">

                <div class="row">
                    <label for="options">Options:</label>
                    <div class="options" id="options">
                        <img id="daisy" src="../item images/tape image/Tulip Vintage Time Washi Tape/daisy.jpeg" alt="daisy" data-color="Daisy" data-variant-id="68"
                            onclick="changeImage('../item images/tape image/Tulip Vintage Time Washi Tape/daisy.jpeg', 'daisy')">
						<img id="lovely" src="../item images/tape image/Tulip Vintage Time Washi Tape/lovely.jpeg" alt="lovely" data-color="Lovely" data-variant-id="69"
                            onclick="changeImage('../item images/tape image/Tulip Vintage Time Washi Tape/lovely.jpeg', 'lovely')">
						<img id="red tulip" src="../item images/tape image/Tulip Vintage Time Washi Tape/red tulip.jpeg" alt="red tulip" data-color="Red Tulip" data-variant-id="70"
                            onclick="changeImage('../item images/tape image/Tulip Vintage Time Washi Tape/red tulip.jpeg', 'red tulip')">
						<img id="yellow tulip" src="../item images/tape image/Tulip Vintage Time Washi Tape/yellow tulip.jpeg" alt="yellow tulip" data-color="Yellow Tulip" data-variant-id="71"
                            onclick="changeImage('../item images/tape image/Tulip Vintage Time Washi Tape/yellow tulip.jpeg', 'yellow tulip')">
                    </div>
					<input type="hidden" id="variant-id" name="variant_id" value="">
                </div>
				<br>
				<div class="row">
					<label for="color-select">Type:</label>
					<div id="color-select"></div>
					<div id="color-error" style="color: red; font-size: 0.9em; display: none;">Please select an option.</div>
				</div>


                <div class="row">
                    <label for="quantity">Quantity:</label>
                    <div class="quantity-selector">
                        <button onclick="decreaseQuantity()">-</button>
                        <input type="text" id="quantity" value="1">
                        <button onclick="increaseQuantity()">+</button>
                    </div>
                </div>
            </div>
			<br>
            <button class="add-to-cart">ADD TO CART | RM 6.90</button>
			<br><br>
            <div class="info-tabs">
                <div id="description-tab" class="active-tab" onclick="showDescription()">DESCRIPTION</div>
                <div id="shipping-tab" onclick="showShipping()">SHIPPING DETAILS</div>
            </div>

            <!-- Two-column layout for Description and Shipping Details -->
            <div class="info-content">
                <div id="description-column" class="info-column">
                    <h3> Tulip Vintage Time Washi Tape Korean Girl Plaid Pattern </h3>
                    <ul>
                        <li> Size: 1.5CM  </li>
                        <li> Width 5M </li>
                        <li> Suitable For Hand Account, Card, Diary </li>
                    </ul>
					<p> There May Be A Little Color Difference </p>
                </div>

                <div id="shipping-column" class="info-column hidden">
                    <h3>Shipping Details:</h3>
                    <p>
                        Your order of RM 35 or more gets free standard delivery ! 
                    </p>
                    <ul>
                        <li> Standard delivered 4-6 Business Days </li>
                        <li> Express delivered 2-4 Business Days </li>
                    </ul>
                    <p>Tracking information will be provided once the order has shipped.</p>
                </div>
            </div>
        </div>
    </div>
	
	<!-- Cart Sidebar -->
	<div class="cart-sidebar" id="cartSidebar">
		<div class="close-cart" onclick="toggleCartSidebar()">Close &times;</div>
		<h2>MY CART</h2>

		<!-- Progress Bar and Shipping Message -->
		<div class="progress-bar-container">
			<div class="progress-bar" id="progress"></div>
		</div>
		<p id="shipping-threshold" class="shipping-message">Add just $35.00 to get FREE SHIPPING</p>

		<!-- Cart Items -->
		<div id="cartItems">
			<!-- Dynamically populate the cart items here -->
		</div>

		<!-- Cart Footer (Fixed at Bottom) -->
		<div class="cart-footer">
			<div class="total-price-container">
				<span class="total-price" id="cartTotal">Total Price: $77.40</span>
			</div>
			<div class="cart-checkout">
				<!-- Button with loading animation -->
				<button class="checkout-button" onclick="startCheckout()">CHECKOUT</button>
			</div>
		</div>
	</div>

    <!-- Modal -->
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeModal()">&times;</span>
            <img id="modal-image" src="" alt="Enlarged Image">
            <div class="modal-controls">
                <button onclick="prevModalImage()">&#10094;</button>
                <button onclick="nextModalImage()">&#10095;</button>
            </div>
        </div>
    </div>
	
	<!-- Review Section -->
	<div class="review-section">
		<div class="review-header">
			<h2>Reviews</h2>
			<button class="write-review" onclick="openReviewModal()">WRITE A REVIEW</button>
			
			<br><br>
		</div>
		<div id="reviews-list">
			<!-- Example review; dynamic content will be injected here -->
			<div class="review">
				
			</div>
		</div>
		<br>
	</div>

	<!-- Review Modal -->
	<div id="reviewModal" class="review-modal">
		<div class="review-modal-content">
			<span class="review-modal-close" onclick="closeReviewModal()">&times;</span>
			<h2>Write a Review</h2>
			<br>
			<form id="review-form">	
				<div class="form-group">
					<label for="review-score">Score:</label>
					<div id="review-score" class="stars">
						<span class="star" data-value="1">&#9733;</span>
						<span class="star" data-value="2">&#9733;</span>
						<span class="star" data-value="3">&#9733;</span>
						<span class="star" data-value="4">&#9733;</span>
						<span class="star" data-value="5">&#9733;</span>
					</div>
					<br>
					<div id="score-error" style="color: red; font-size: 0.9em; display: none;">Please select a score.</div>
				</div>
				<div class="form-group">
					<label for="review-name">Name:</label>
					<input type="text" id="review-name" required>
				</div>
				<div class="form-group">
					<label for="review-email">Email:</label>
					<input type="email" id="review-email" required>
				</div>
				<div class="form-group">
					<label for="review-comment">Comment:</label>
					<textarea id="review-comment" required></textarea>
				</div>
				<button type="submit">Submit</button>
			</form>
		</div>
	</div>

	<br><br>

	<!-- product section starts -->
	<section class="products" id="products">

		<h1 class="heading"> You Might Like </h1>
		<br><br>
		<div class="box-container">
		
			<!-- Products -->
			<div class="box">
				<div class="image">
					<img src="../item images/tape image/5 Rolls Boxed Retro Style Tape Stickers/1.jpg" alt="tape" >
					<div class="icons">
						<a href="../itemDetails/tape_retro tape.php" class="view" onclick="redirectTo('tape_retro tape.php')">View Detail</a>
					</div>
				</div>
			<div class="content">
				<h3>5 Rolls Boxed Retro Style Tape Stickers</h3>
				<span>RM3.37</span>
			</div>
			</div>
			
			<div class="box">
				<div class="image">
					<img src="../item images/tape image/Autumn Flowers Washi Tape Set/1.jpeg" alt="tape" >
					<div class="icons">
						<a href="../itemDetails/tape_flower tape.php" class="view" onclick="redirectTo('tape_flower tape.php')">View Detail</a>
					</div>
				</div>
			<div class="content">
				<h3>Autumn Flowers Washi Tape Set</h3>
				<span>RM13.59</span>
			</div>
			</div>
			
			<div class="box">
				<div class="image">
					<img src="../item images/tape image/Journamm 5pcs5m Solid Color Bullet Journaling Adhesive Tapes/1.webp" alt="tape" >
					<div class="icons">
						<a href="../itemDetails/tape_journaling tape.php" class="view" onclick="redirectTo('tape_journaling tape.php')">View Detail</a>
					</div>
				</div>
			<div class="content">
				<h3>Journamm 5pcs5m Solid Color Bullet Journaling Adhesive Tapes</h3>
				<span>RM4.9</span>
			</div>
			</div>
			
			<div class="box">
				<div class="image">
					<img src="../item images/tape image/Tulip Vintage Time Washi Tape/1.webp" alt="tape" >
					<div class="icons">
						<a href="../itemDetails/tape_tulip vintage tape.php" class="view" onclick="redirectTo('tape_tulip vintage tape.php')">View Detail</a>
					</div>
				</div>
			<div class="content">
				<h3>Tulip Vintage Time Washi Tape</h3>
				<span>RM3.30</span>
			</div>
			</div>
		</div>
    
	</section>
</body>
<footer>
        <?php include('../include/footer.php'); ?>
</footer>
</html>

