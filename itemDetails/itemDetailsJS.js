let currentIndex = 0;
let isAnimating = false;

function changeImage(src, color, element) {
    const mainImage = document.getElementById('main-image');
    const colorSelect = document.getElementById('color-select');

    if (mainImage && colorSelect) {
        mainImage.src = src;
        colorSelect.innerText = color;

        const options = document.querySelectorAll('.item-info .options img');
        options.forEach(img => img.classList.remove('selected'));

        element.classList.add('selected');
        document.getElementById('variant-id').value = element.getAttribute('data-variant-id');
    } else {
        console.error("Main image or color select element not found.");
    }
}

function changeImageWithAnimation(newIndex) {
    if (isAnimating) return;

    isAnimating = true;
    const mainImage = document.getElementById('main-image');

    if (mainImage) {
        mainImage.classList.add('slide-out');

        setTimeout(() => {
            mainImage.src = images[newIndex];
            mainImage.classList.remove('slide-out');
            mainImage.classList.add('slide-in');

            setTimeout(() => {
                mainImage.classList.remove('slide-in');
                isAnimating = false;
            }, 300);
        }, 300);
    } else {
        console.error("Main image element not found.");
    }
}

function nextImage() {
    const newIndex = (currentIndex + 1) % images.length;
    changeImageWithAnimation(newIndex);
    currentIndex = newIndex;
    updateThumbnails();
}

function prevImage() {
    const newIndex = (currentIndex - 1 + images.length) % images.length;
    changeImageWithAnimation(newIndex);
    currentIndex = newIndex;
    updateThumbnails();
}

// Function to change the main image based on the thumbnail clicked
function selectImage(index) {
	const mainImage = document.getElementById('main-image');
	if (mainImage) {
		mainImage.src = images[index];
		currentIndex = index; 
		updateThumbnails();
	} else {
		console.error("Main image element not found.");
	}
}

// Function to update the appearance of selected thumbnails
function updateThumbnails() {
	const thumbnails = document.querySelectorAll('.thumbnails img');
	thumbnails.forEach((thumbnail, index) => {
		thumbnail.classList.toggle('selected', index === currentIndex);
	});
}



document.addEventListener('DOMContentLoaded', () => {
    updateThumbnails();

    const nextButton = document.querySelector('.carousel-controls button:nth-child(1)');
    const prevButton = document.querySelector('.carousel-controls button:nth-child(1)');

    if (nextButton && prevButton) {
        nextButton.addEventListener('click', nextImage);
        prevButton.addEventListener('click', prevImage);
    } else {
        console.error('Carousel buttons not found.');
    }

    const colorOptions = document.querySelectorAll('.item-info .options img');
    if (colorOptions.length > 0) {
        colorOptions.forEach(img => {
            img.addEventListener('click', function(event) {
                const color = img.getAttribute('data-color');
                changeImage(img.src, color, img);
                document.getElementById('color-error').style.display = 'none';
            });
        });
    } else {
        console.error('Color options not found.');
    }

    const colorSelect = document.getElementById('color-select');
    if (colorSelect) {
        colorSelect.addEventListener('click', () => {
            document.getElementById('color-error').style.display = 'none';
        });
    } else {
        console.error('Color select element not found.');
    }

    const addToCartButton = document.querySelector('.add-to-cart');
    if (addToCartButton) {
        addToCartButton.addEventListener('click', addToCart);
    } else {
        console.error('Add to Cart button not found.');
    }

    const closeButton = document.querySelector('.close-cart');
    const cartSidebar = document.getElementById('cartSidebar');
    const overlay = document.getElementById('overlay');

    if (closeButton && cartSidebar && overlay) {
        closeButton.addEventListener('click', () => {
            cartSidebar.classList.remove('open');
            overlay.style.display = 'none';
        });

        cartSidebar.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    } else {
        console.error('Sidebar or overlay elements not found.');
    }
});

function increaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    if (quantityInput) {
        quantityInput.value = parseInt(quantityInput.value) + 1;
    } else {
        console.error("Quantity input element not found.");
    }
}

function decreaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    if (quantityInput && parseInt(quantityInput.value) > 1) {
        quantityInput.value = parseInt(quantityInput.value) - 1;
    } else {
        console.error("Quantity input element not found or value is less than 1.");
    }
}

function openModal() {
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modal-image');
    const header = document.querySelector('header'); 

    if (modal && modalImage && header) {
        header.style.display = 'none';  // Hide the header
        modal.style.display = 'flex';
        modalImage.src = images[currentIndex];
    } else {
        console.error("Modal, modal image, or header elements not found.");
    }
}

function closeModal() {
    const modal = document.getElementById('imageModal');
    const header = document.querySelector('header'); 
	
    if (modal && header) {
        modal.style.display = 'none';
        header.style.display = 'block';  // Show the header again
    } else {
        console.error("Modal or header elements not found.");
    }
}


function nextModalImage() {
    currentIndex = (currentIndex + 1) % images.length;
    document.getElementById('modal-image').src = images[currentIndex];
}

function prevModalImage() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    document.getElementById('modal-image').src = images[currentIndex];
}

function showDescription() {
    const descriptionColumn = document.getElementById('description-column');
    const shippingColumn = document.getElementById('shipping-column');
    const descriptionTab = document.getElementById('description-tab');
    const shippingTab = document.getElementById('shipping-tab');

    if (descriptionColumn && shippingColumn && descriptionTab && shippingTab) {
        descriptionColumn.classList.remove('hidden');
        shippingColumn.classList.add('hidden');
        descriptionTab.classList.add('active-tab');
        shippingTab.classList.remove('active-tab');
    } else {
        console.error("Description or shipping elements not found.");
    }
}

function showShipping() {
    const descriptionColumn = document.getElementById('description-column');
    const shippingColumn = document.getElementById('shipping-column');
    const descriptionTab = document.getElementById('description-tab');
    const shippingTab = document.getElementById('shipping-tab');

    if (descriptionColumn && shippingColumn && descriptionTab && shippingTab) {
        descriptionColumn.classList.add('hidden');
        shippingColumn.classList.remove('hidden');
        descriptionTab.classList.remove('active-tab');
        shippingTab.classList.add('active-tab');
    } else {
        console.error("Description or shipping elements not found.");
    }
}

// Review Modal
let selectedScore = 0;

function openReviewModal() {
    const reviewModal = document.getElementById('reviewModal');
    const header = document.querySelector('header');
    
    if (reviewModal && header) {
        reviewModal.style.display = 'flex';
        header.style.display = 'none'; // Hide the header
    } else {
        console.error("Review modal or header element not found.");
    }
}

function closeReviewModal() {
    const reviewModal = document.getElementById('reviewModal');
    const header = document.querySelector('header');
    
    if (reviewModal && header) {
        reviewModal.style.display = 'none';
        header.style.display = 'block'; // Show the header
    } else {
        console.error("Review modal or header element not found.");
    }
}


document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('#review-score .star');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            selectedScore = parseInt(this.dataset.value);
            updateStarSelection();
        });

        star.addEventListener('mouseover', function() {
            updateStarHover(parseInt(this.dataset.value));
        });

        star.addEventListener('mouseout', function() {
            updateStarSelection();
        });
    });

    function updateStarSelection() {
        stars.forEach(star => {
            star.classList.toggle('selected', parseInt(star.dataset.value) <= selectedScore);
        });
    }

    function updateStarHover(hoverValue) {
        stars.forEach(star => {
            star.classList.toggle('selected', parseInt(star.dataset.value) <= hoverValue);
        });
    }

    const reviewForm = document.getElementById('review-form');
    if (reviewForm) {
        reviewForm.addEventListener('submit', function(event) {
            event.preventDefault();

            if (selectedScore === 0) {
                document.getElementById('score-error').style.display = 'block';
                return;
            }

            document.getElementById('score-error').style.display = 'none';

            const name = document.getElementById('review-name').value;
            const email = document.getElementById('review-email').value;
            const comment = document.getElementById('review-comment').value;

            if (!name || !email || !comment) {
                alert('Please fill all fields.');
                return;
            }

            const reviewHTML = `
                <div class="review">
                    <span class="fas fa-quote-left"></span>
                    <div class="review-score">${'&#9733;'.repeat(selectedScore)}${'&#9734;'.repeat(5 - selectedScore)}</div>
                    <div class="review-name">${name}</div>
                    <div class="review-comment">${comment}</div>
                </div>
            `;

            document.getElementById('reviews-list').innerHTML += reviewHTML;
            saveReview(reviewHTML);
            closeReviewModal();
        });
    } else {
        console.error("Review form element not found.");
    }

    loadReviews();
});

function saveReview(reviewHTML) {
    const savedReviews = JSON.parse(localStorage.getItem('_reviews')) || [];
    savedReviews.push(reviewHTML);
    localStorage.setItem('_reviews', JSON.stringify(savedReviews));
}

function loadReviews() {
    const reviewsList = document.getElementById('reviews-list');
    const savedReviews = JSON.parse(localStorage.getItem('_reviews')) || [];
    if (reviewsList) {
        reviewsList.innerHTML = savedReviews.join('');
    } else {
        console.error("Reviews list element not found.");
    }
}

function addToCart() {
    const itemName = document.querySelector('.item-info h1').innerText;
    const variantId = document.getElementById('variant-id').value;
    const quantity = document.getElementById('quantity').value;
    const discountedPrice = document.querySelector('.item-info .discounted-price').innerText.replace('RM ', '');
    const colorError = document.getElementById('color-error');

    if (!variantId) {
        colorError.textContent = 'Please select a color/option.';
        colorError.style.display = 'block';
        return;
    }
    colorError.style.display = 'none';

    fetch('../cart/add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `variant_id=${variantId}&quantity=${quantity}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            updateCartCount(data.cartCount);
            toggleCartSidebar();
            fetchCartContents();
            const totalPrice = calculateTotalPrice();
            updateProgressBar(totalPrice);
        } else {
            alert('Failed to add product to cart: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while adding the product to cart.');
    });
}

function calculateTotalPrice() {
    let totalPrice = 0;
    document.querySelectorAll('.cart-item').forEach(item => {
        const itemTotalElement = item.querySelector('.item-total');
        if (itemTotalElement) {
            const itemTotal = parseFloat(itemTotalElement.textContent.replace('RM', '').trim());
            if (!isNaN(itemTotal)) {
                totalPrice += itemTotal;
            }
        }
    });

    const cartTotalElement = document.querySelector('.total-price');
    if (cartTotalElement) {
        cartTotalElement.textContent = 'Total Price: RM ' + totalPrice.toFixed(2);
    } else {
        console.error('Cart total element not found.');
    }
    return totalPrice;
}

function updateProgressBar(totalPrice) {
    const FREE_SHIPPING_THRESHOLD = 35;
    const remainingAmount = FREE_SHIPPING_THRESHOLD - totalPrice;
    const shippingThresholdElement = document.getElementById('shipping-threshold');
    const progressElement = document.getElementById('progress');

    if (shippingThresholdElement && progressElement) {
        if (totalPrice >= FREE_SHIPPING_THRESHOLD) {
            shippingThresholdElement.textContent = "You've qualified for FREE SHIPPING!";
            progressElement.style.width = '100%';
            progressElement.style.backgroundColor = '#28a745';
        } else {
            shippingThresholdElement.textContent = `Add just RM ${remainingAmount.toFixed(2)} to get FREE SHIPPING`;
            const progressPercent = (totalPrice / FREE_SHIPPING_THRESHOLD) * 100;
            progressElement.style.width = `${progressPercent}%`;
            progressElement.style.backgroundColor = '#8d6262';
        }
    } else {
        console.error('Shipping threshold or progress elements not found.');
    }
}

function updateQuantity(cartId, change) {
    const quantityInput = document.getElementById('quantity-' + cartId);
    const newQuantity = parseInt(quantityInput.value) + change;
    const maxStock = parseInt(quantityInput.getAttribute('data-max-stock'));

    if (newQuantity < 1) {
        alert('Quantity cannot be less than 1');
        return;
    }

    fetch('../cart/update_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `cart_id=${cartId}&quantity=${newQuantity}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            quantityInput.value = newQuantity;
            document.getElementById('total-' + cartId).innerText = 'RM ' + data.newTotal.toFixed(2);
            calculateTotalPrice();
            fetchCartContents();
            quantityInput.setAttribute('data-max-stock', data.newMaxStock);
        } else {
            alert('Update Failed: ' + data.message);
            quantityInput.setAttribute('data-max-stock', data.currentStock);
        }
    })
    .catch(error => {
        console.error('Error updating quantity:', error.message);
        alert('Error updating quantity. Please check the console for more details.');
    });
}

function toggleCartSidebar() {
    const sidebar = document.getElementById('cartSidebar');
    const overlay = document.getElementById('overlay');

    if (sidebar && overlay) {
        if (!sidebar.classList.contains('open')) {
            sidebar.classList.add('open');
            overlay.style.display = 'block';
        } else {
            sidebar.classList.remove('open');
            overlay.style.display = 'none';
        }
    } else {
        console.error("Sidebar or overlay elements not found.");
    }
}

function updateCartCount(count) {
    const cartIndicator = document.getElementById('cart-indicator');
    if (cartIndicator) {
        cartIndicator.style.display = count > 0 ? 'block' : 'none';
    } else {
        console.error("Cart indicator element not found.");
    }
}

function removeFromCart(cartId, event) {
    event.stopPropagation();

    if (confirm("Are you sure you want to remove this item from your cart?")) {
        fetch('../cart/remove_from_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `cart_id=${cartId}`
        })
        .then(response => response.text())
        .then(() => {
            fetchCartContents();
        })
        .catch(error => {
            console.error('Error removing item from cart:', error.message);
        });
    }
}

function startCheckout() {
    const button = document.querySelector('.checkout-button');
    if (button) {
        button.innerHTML = '<div class="spinner"></div>CHECKOUT';
        button.disabled = true;

        const spinner = button.querySelector('.spinner');
        spinner.style.display = 'inline-block';

        setTimeout(() => {
            window.location.href = '../checkout/checkout.php';
        }, 3000);
    } else {
        console.error("Checkout button not found.");
    }
}

function fetchCartContents() {
    fetch('../cart/cartContent.php')
    .then(response => response.text())
    .then(html => {
        document.getElementById('cartItems').innerHTML = html;
        const totalPrice = calculateTotalPrice();
        updateProgressBar(totalPrice);
    })
    .catch(error => {
        console.error('Error loading the cart contents:', error);
    });
}

function updateCartSummary() {
    let total = 0;
    document.querySelectorAll('.cart-item .item-total').forEach(item => {
        total += parseFloat(item.textContent.substring(2));
    });

    const cartTotalElement = document.querySelector('.total-price');
    if (cartTotalElement) {
        cartTotalElement.textContent = 'Total Price: RM ' + total.toFixed(2);
    } else {
        console.error('Cart total element not found.');
    }
}
