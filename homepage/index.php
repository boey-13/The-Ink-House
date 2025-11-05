
<!-- This section is the homepage, which is the face of all pages. Here we provide a media gallery for users to view, 
and also add a New Arrival Product section to let users know what new creative products are available recently. 
In addition, we also add a category section to let users choose the category they are interested in shopping. 
Finally, we also provide a feedback form for users so that they can provide their feedback.-->

<?php include('../connect/conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">
    <title>The Ink Store</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
	<link rel="stylesheet" href="../style/styles.css">
	<link rel="stylesheet" href="../style/headfoot.css">
	
</head>
<body>
<?php include('../include/header.php'); ?>

<!-- home section starts -->
<section class="banner">

	<div class="content">
		<h3>Creative Stationery</h3>
		<span>Designed to Delight</span>
		<p>Creative stationery to brighten your day. Discover our curated selection of uniquely designed notebooks, 
		tapes, stickers, and pens that inspire creativity in your everyday life.</p>
		<a href="../notebook/notebook.php" class="btn" >Shop Now</a>
	</div>
</section>
<!-- home section end -->

<!-- media gallert -->
<h1 class="heading"> <span> media</span> gallery </h1>
<section class="media-gallery">
		<div class="gallery-grid">
			<div class="media-item">
				<img src="img/media4.jpg" alt="">
			</div>
			<div class="media-item">
				<img src="img/media3.jpeg" alt="">
			</div>
			<div class="media-item">
				<img src="img/media16.jpg" alt="">
			</div>
			<div class="media-item">
				<img src="img/media7.webp" alt="">
			</div>
			<div class="media-item">
				<img src="img/media8.jpeg" alt="">
			</div>
			<div class="media-item">
				<img src="img/media1.jpeg" alt="">
			</div>
			<div class="media-item">
				<img src="img/media10.jpeg" alt="">
			</div>
			<div class="media-item">
				<img src="img/product7.jpeg" alt="">
			</div>
			<div class="media-item">
				<img src="img/t1.jpg" alt="">
			</div>
			<div class="media-item">
				<img src="img/media12.jpg" alt="">
			</div>
			<div class="media-item">
				<img src="img/media14.jpg" alt="">
			</div>
			<div class="media-item">
				<img src="img/media17.jpg" alt="">
			</div>
		</div>
</section>
<!-- media gallert -->

<!-- product section starts -->
<section class="products" id="products">

    <h1 class="heading"> New Arrival <span>Products</span></h1>
	
    <div class="box-container">
	
        <!-- Products -->
		<div class="box">
        <div class="image">
            <img src="img/product1.jpeg" alt="notebook">
			<div class="icons">
				<a href="../itemDetails/notebook_american style notebook.php" class="view">View Detail</a>
			</div>
		</div>
		<div class="content">
            <h3>American Style Notebook</h3>
            <span>RM12.90</span>
		</div>
        </div>
		
		<div class="box">
        <div class="image">
            <img src="img/product2.jpeg" alt="pen">
			<div class="icons">
				<a href="../itemDetails/pen_macaron gel pen.php" class="view">View Detail</a>
			</div>
		</div>
		<div class="content">
            <h3>Fancy Stationery Cute Macaron Gel Pen</h3>
            <span>RM2.99</span>
        </div>
		</div>
		
		
		<div class="box">
        <div class="image">
            <img src="img/product3.jpeg" alt="tape">
			<div class="icons">
				<a href="../itemDetails/tape_journaling tape.php" class="view">View Detail</a>
			</div>
		</div>
		<div class="content">
            <h3>Journamm 5pcs5m Solid Color Bullet Journaling Adhesive Tapes</h3>
            <span>RM4.90</span>
        </div>
		</div>
		
		<div class="box">
        <div class="image">
            <img src="img/product4.jpeg" alt="sticker">
			<div class="icons">
				<a href="../itemDetails/sticker_minimalist art.php" class="view">View Detail</a>
			</div>
		</div>
		<div class="content">
            <h3>50pcs minimalist art ins style black and white stickers</h3>
            <span>RM3.50</span>
        </div> 
		</div>
		
		
       <div class="box">
        <div class="image">
            <img src="img/product5.jpeg" alt="pencil case">
			<div class="icons">
				<a href="../itemDetails/pencilcase_muji mesh pencil case.php" class="view">View Detail</a>
			</div>
		</div>
		<div class="content">
            <h3>Ins MUJI Mesh Pencil Case</h3>
            <span>RM7.69</span>
        </div>
		</div>
		
		<div class="box">
        <div class="image">
            <img src="img/product6.jpg" alt="notebook">
			<div class="icons">
				<a href="../itemDetails/notebook_snoopy notebook.php" class="view">View Detail</a>
			</div>
		</div>
		<div class="content">
            <h3>Snoopy notebook</h3>
            <span>RM6.88</span>
        </div>
		</div>
		
		
		<div class="box">
        <div class="image">
            <img src="img/product7.jpeg" alt="sticker">
			<div class="icons">
				<a href="../itemDetails/sticker_planet.php" class="view">View Detail</a>
			</div>
		</div>
		<div class="content">
            <h3>200pcs Exotic Planet Sticker Set</h3>
            <span>RM9.66</span>
        </div>
		</div>
		
		
		<div class="box">
        <div class="image">
            <img src="img/product8.jpeg" alt="tape">
			<div class="icons">
				<a href="../itemDetails/tape_flower tape.php" class="view">View Detail</a>
			</div>
		</div>
		<div class="content">
            <h3>Autumn Flowers Washi Tape Set</h3>
            <span>RM13.59</span>
        </div>
		</div>
    </div>
    
</section>

<!-- product section Ends -->

<!-- category section starts-->
<section class="category" id="category">

<h1 class="heading"> All <span>Category</span></h1>

<div class="category-container">
        <a href="../notebook/notebook.php" class="category-item">
            <img src="img/n3.jpeg" alt="Category 1">
            <p>Notebook</p>
        </a>
        <a href="../pencilcase/pencilcase.php" class="category-item">
            <img src="img/pc1.jpeg" alt="Category 2">
            <p>Pencil Case</p>
        </a>
        <a href="../pen/pen.php" class="category-item">
            <img src="img/p3.jpeg" alt="Category 3">
            <p>Pen</p>
        </a>
        <a href="../tape/tape.php" class="category-item">
            <img src="img/t1.jpg" alt="Category 4">
            <p>Tape</p>
        </a>
        <a href="../sticker/sticker.php" class="category-item">
            <img src="img/s1.jpeg" alt="Category 5">
            <p>Sticker</p>
        </a>
    </div>
</section>
<!-- caregory section Ends -->


<!-- icons section start -->
<section class="icons-container">

	<div class="icons">
		<img src="img/2.png" alt="">
		<div class="info">
			<h3>free delivery of order above RM35</h3>
			<span>on all orders</span>
		</div>
	</div>
	
	<div class="icons">
		<img src="img/4.png" alt="">
		<div class="info">
			<h3>10 days returns</h3>
			<span>moneyback guarantee</span>
		</div>
	</div>
	
	<div class="icons">
		<img src="img/1.png" alt="">
		<div class="info">
			<h3>offer & gifts</h3>
			<span>on all orders</span>
		</div>
	</div>
	
	<div class="icons">
		<img src="img/3.png" alt="">
		<div class="info">
			<h3>secure payment</h3>
			<span>protected by paypal</span>
		</div>
	</div>
	
</section>

<!-- icons section ends -->

<!-- about section start-->
<section class="about" id="about">

	<h1 class="heading"> <span> about </span> us </h1> 
	
	<div class="row">
	
		<div class="video-container">
			<video src="img/video2.mp4" loop autoplay muted></video>
		</div>
		
		<div class="content">
			<h3>Create with Elegance</h3>
			<p>At The Ink House, we pride ourselves on offering uniquely designed stationery that reflects both creativity and quality. Our carefully curated selection includes everything from elegant notebooks to beautifully crafted pens, tapes, and stickers, all designed to inspire your everyday life. Whether you’re a fan of minimalist aesthetics or love bold, artistic designs, you’ll find something that perfectly matches your style.</p>
			<p>Beyond our exceptional products, we are committed to providing an outstanding shopping experience. We believe that quality shouldn’t come at a high price, so we offer our products at affordable rates without compromising on style or durability. Plus, our fast and friendly customer service team is always ready to assist, ensuring that every purchase from The Ink Store is as smooth and satisfying as possible.</p>
			<a href="../about/aboutus.php" class="btn">Learn More</a>
		</div>
		
	</div>
</section>
<!-- about section end -->


<!-- Feedback section Starts -->
<section class="feedback" id="feedback">
    <h1 class="heading"> Give <span> Feedback </span></h1>
    
    <div class="row">
        <form id="feedbackForm" onsubmit="return validateForm()">
		<!-- Star Rating Section -->
            <div class="rating">
                <input type="radio" name="rating" id="star1" value="1"><label for="star1"></label>
                <input type="radio" name="rating" id="star2" value="2"><label for="star2"></label>
                <input type="radio" name="rating" id="star3" value="3"><label for="star3"></label>
                <input type="radio" name="rating" id="star3" value="4"><label for="star4"></label>
                <input type="radio" name="rating" id="star4" value="5"><label for="star5"></label>
            </div>
			
            <input type="text" id="name" placeholder="name" class="box" required>
            <input type="email" id="email" placeholder="email" class="box" required>
            <input type="number" id="number" placeholder="number" class="box" required>
            <textarea id="message" class="box" placeholder="message" id="" cols="30" rows="10" required></textarea>              
            
            <input type="submit" value="Send Message" class="btn">
        </form>
        
        <div class="image">
            <img src="img/feedback1.png" alt="">
        </div>
    </div>
</section>

<script>
function validateForm() {
    // Get the form input values
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var number = document.getElementById("number").value;
    var message = document.getElementById("message").value;
    var rating = document.querySelector('input[name="rating"]:checked'); // Get the selected star rating

    // Validate if any form fields are empty
    if (name === "" || email === "" || number === "" || message === "" || !rating) {
        alert("Please fill in all fields and select a star rating."); // Alert the user if any fields are empty or no rating is selected
        return false; 
    }

    // Simple email validation using a regular expression
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address."); // Alert the user if the email is invalid
        return false; 
    }

    // If all validations pass, display a success message
    alert("Thank You For Your Feedback!");
    
    // Clear the form content after successful submission
    document.getElementById("feedbackForm").reset();
    
    // Prevent the actual form submission to stay on the current page
    return false;
}
</script>
<!-- Feedback section Ends -->


</body>
<footer>
<?php include('../include/footer.php'); ?>
</footer>
<html>