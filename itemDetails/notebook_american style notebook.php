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
	<link rel="stylesheet" href="../style/headfoot.css">
    <title>Item Details</title>

	<script>
		let images = [
			"../item images/notebook image/American style notebook/1.jpeg",
			"../item images/notebook image/American style notebook/2.jpeg",
			"../item images/notebook image/American style notebook/3.jpeg",
			"../item images/notebook image/American style notebook/4.jpeg",
			"../item images/notebook image/American style notebook/blueberry milk.jpeg",
			"../item images/notebook image/American style notebook/matcha marshmallow.jpeg"
		];
		
	</script>
<script src="../itemDetails/itemDetailsJS.js"></script>
</head>

<body>
	<?php include('../include/header.php'); ?>
    <div id="overlay"></div>
    <div class="container">
        <div class="item-images">
			<!-- Thumbnail images -->
            <div class="thumbnails">
                <img class="thumbnail" src="../item images/notebook image/American style notebook/1.jpeg" alt="Thumbnail 1" onclick="selectImage(0)">
                <img class="thumbnail" src="../item images/notebook image/American style notebook/2.jpeg" alt="Thumbnail 2" onclick="selectImage(1)">
                <img class="thumbnail" src="../item images/notebook image/American style notebook/3.jpeg" alt="Thumbnail 3" onclick="selectImage(2)">
                <img class="thumbnail" src="../item images/notebook image/American style notebook/4.jpeg" alt="Thumbnail 4" onclick="selectImage(3)">
                <img class="thumbnail" src="../item images/notebook image/American style notebook/blueberry milk.jpeg" alt="Thumbnail 5" onclick="selectImage(4)">
                <img class="thumbnail" src="../item images/notebook image/American style notebook/matcha marshmallow.jpeg" alt="Thumbnail 6" onclick="selectImage(5)">
            </div>
			<!-- Main image -->
			<div class="main-image">
				<img id="main-image" src="../item images/notebook image/American style notebook/1.jpeg" alt="item-image" class="item-image" onclick="openModal()">
				<div class="carousel-controls">
					<button onclick="prevImage()">&#10094;</button>
					<button onclick="nextImage()">&#10095;</button>
				</div>
			</div>
        </div>
        <div class="item-info">
            <h1>American Style Notebook Diary Journal</h1>
            <div class="price">RM 15.90</div>
            <div class="discounted-price">RM 12.90</div>
            <div class="stock">In Stock</div>

            <div class="item-options">
                <div class="row">
                    <label for="options">Options:</label>
                    <div class="options" id="options">
                        <img src="../item images/notebook image/American style notebook/blueberry milk.jpeg" id="blue" alt="Blueberry Milk" data-color="Blueberry Milk" data-variant-id="1"
                            onclick="changeImage('../item images/notebook image/American style notebook/blueberry milk.jpeg', 'Blueberry Milk', this)">
                        <img id="green" src="../item images/notebook image/American style notebook/matcha marshmallow.jpeg" alt="Matcha Marshmallow" data-color="Matcha Marshmallow" data-variant-id="2"
                            onclick="changeImage('../item images/notebook image/American style notebook/matcha marshmallow.jpeg', 'Matcha Marshmallow', this)">
                    </div>
					<input type="hidden" id="variant-id" name="variant_id" value="">
                </div>
				<br>
				<div class="row">
					<label for="color-select">Color:</label>
					<div id="color-select"></div>
					<div id="color-error" style="color: red; font-size: 0.9em; display: none;">Please select a color.</div>
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
            <button class="add-to-cart">ADD TO CART | RM 12.90</button>
			<br><br>
            <div class="info-tabs">
                <div id="description-tab" class="active-tab" onclick="showDescription()">DESCRIPTION</div>
                <div id="shipping-tab" onclick="showShipping()">SHIPPING DETAILS</div>
            </div>

            <!-- Two-column layout for Description and Shipping Details -->
            <div class="info-content">
                <div id="description-column" class="info-column">
                    <h3>Description:</h3>
                    <p> Suitable for you to create a unique notebook in your style. </p>
                    <ul>
                        <li> Size: A5 (148 x 210mm) </li>
                        <li> Inner: 160 pages / 80 sheets </li>
                        <li> Materials: 80 gsm high quality writing paper </li>
                    </ul>
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
			<div class="review"></div>
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
				<div class="form-group">
					<button type="submit">Submit</button>
				</div>
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
					<img src="../item images/notebook image/Loose-leaf Notebook/1.jpeg" alt="notebook">
					<div class="icons">
						<a href="../itemDetails/notebook_loose-leaf notebook.php" class="view" onclick="redirectTo('notebook_loose-leaf notebook.php')">View Detail</a>
					</div>
				</div>
			<div class="content">
				<h3>Loose-leaf Notebook</h3>
				<span>RM15.90</span>
			</div>
			</div>
			<div class="box">
				<div class="image">
					<img src="../item images/notebook image/Snoopy notebook/1.jpg" alt="notebook">
					<div class="icons">
						<a href="../itemDetails/notebook_snoopy notebook.php" class="view" onclick="redirectTo('notebook_snoopy notebook.php')">View Detail</a>
					</div>
				</div>
				<div class="content">
					<h3>Snoopy notebook</h3>
					<span>RM6.88</span>
				</div>
			</div>
			<div class="box">
				<div class="image">
					<img src="../item images/notebook image/TACOTACO Note Book Handbook/1.jpeg" alt="notebook">
					<div class="icons">
						<a href="../itemDetails/notebook_TACOTACO notebook.php" class="view" onclick="redirectTo('notebook_TACOTACO notebook.php')">View Detail</a>
					</div>
				</div>
				<div class="content">
					<h3>TACOTACO Note Book Handbook</h3>
					<span>RM9.99</span>
				</div>
			</div>
			<div class="box">
			<div class="image">
				<img src="../item images/notebook image/Small Pocket Notebook/1.jpeg" alt="notebook">
				<div class="icons">
					<a href="../itemDetails/notebook_small pocket notebook.php" class="view" onclick="redirectTo('notebook_small pocket notebook.php')">View Detail</a>
				</div>
			</div>
			<div class="content">
				<h3>Small Pocket Notebook</h3>
				<span>RM5.50</span>
			</div>
			</div>
		</div>
	</section>
</body>
<footer>
<?php include('../include/footer.php'); ?>
</footer>
</html>
