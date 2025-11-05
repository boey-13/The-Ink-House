
<!--This part is the header that exists on all pages. 
It has a login and a navigation bar to provide customers with navigation to the page they want. 
In addition, there is a shooping bag and users icons. The shopping bag can navigate customers to the shopping car, 
and the users icons will have a dropdown list. When the user enters as a guest, the users icon will have a login option. 
When the user has already logged in to the account, the users icon has the options of view profile and logout.-->


<header>
    <div class="header-main">
	<input type="checkbox" name="" id="toggler">
	<label for="toggler" class="fas fa-bars"></label>
        <div class="logo">
            <a href="../homepage/index.php">
                <img src="../include/img/logo.png" alt="Trademark" width="60" height="50">
            </a>
        </div>
        <nav class="navbar">
            <ul class="main-menu">
                <li class="menu-item">
                    <a href="../homepage/index.php">Home</a>
                </li>
                <li class="menu-item">
                    <a href="../homepage/index.php#category">Products</a>
                    <ul class="dropdown">
                        <li><a href="../notebook/notebook.php">Notebooks</a></li>
                        <li><a href="../pencilcase/pencilcase.php">Pencil Cases</a></li>
                        <li><a href="../pen/pen.php">Pens</a></li>
                        <li><a href="../tape/tape.php">Tape</a></li>
                        <li><a href="../sticker/sticker.php">Stickers</a></li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a href="../contact/contactus.php">Contact Us</a>
                </li>
                <li class="menu-item">
                    <a href="../about/aboutus.php">About Us</a>
                </li>
            </ul>
        </nav>
	<div class="icons">
		<i class="fa-solid fa-magnifying-glass"></i>
		<form class="well-home span6 form-horizontal" name="search-bar" id="search-bar">
		<div class="control-group">
			
			<div class="controls">
				
				<input type="text" id="search" placeholder="Search" onkeyup="searchSuggestion()"> <!--Input textbox-->
				<div class="dropdown" id="suggestion">.</div>
			</div>
		</div>
		

	</form>

    <a href="../cart/viewCart.php" class="fas fa-shopping-bag"></a>
    
    <div class="user-menu">
        <a href="#" class="fas fa-user"></a>
        <ul class="dropdown-menu">
            <?php if ($isLoggedIn): ?>
                <li><a href="/InkHouse/userprofile/viewprofile.php">View Profile</a></li>
                <li><a href="/InkHouse/logout/logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="../login/index.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</div>

    </div>
</header>

<script>
// Wait until the DOM is fully loaded before running the script
document.addEventListener('DOMContentLoaded', function() {
    // Check if the user is logged in by evaluating the PHP session
    const isLoggedIn = <?php echo isset($_SESSION['login_username']) ? 'true' : 'false'; ?>;

    // Select the profile, logout, and login links from the DOM
    const profileLink = document.querySelector('.view-profile');
    const logoutLink = document.querySelector('.logout');
    const loginLink = document.querySelector('.login');

    // If the user is logged in
    if (isLoggedIn) {
        // Display the profile and logout links
        profileLink.style.display = 'block';
        logoutLink.style.display = 'block';
        // Hide the login link
        loginLink.style.display = 'none';
    } else {
        // If the user is not logged in
        // Hide the profile and logout links
        profileLink.style.display = 'none';
        logoutLink.style.display = 'none';
        // Display the login link
        loginLink.style.display = 'block';
    }
});

function searchSuggestion() {
    var search = document.getElementById("search").value.toLowerCase();
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../homepage/search-suggestion.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var suggestionDiv = document.getElementById("suggestion");
                var suggestions = JSON.parse(xhr.responseText);

                // Clear previous suggestions
                suggestionDiv.innerHTML = '';

                // If suggestions are available, show the dropdown
                if (suggestions.length > 0) {
                    suggestionDiv.style.display = 'block';
                } else {
                    suggestionDiv.style.display = 'none';
                }

                // Add new suggestions with highlighting
                suggestions.forEach(function(suggestion) {
                    var p = document.createElement('p');
                    var highlightedText = highlightMatch(suggestion.name, search);
                    p.innerHTML = highlightedText;
                    p.dataset.url = suggestion.url; // Store URL in a data attribute
                    suggestionDiv.appendChild(p);

                    p.addEventListener('click', function() {
                        document.getElementById("search").value = this.innerText;
                        window.location.href = this.dataset.url; // Redirect to the URL stored in the data attribute
                    });
                });
            } else {
                console.error('Request failed with status:', xhr.status); 
                alert('There was a problem with the request.');
            }
        }
    };
    xhr.send("product_name=" + encodeURIComponent(search));
}

function highlightMatch(text, query) {
    var regex = new RegExp('(' + query + ')', 'gi');
    return text.replace(regex, '<span class="highlight">$1</span>');
}


document.getElementById('search').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        var search = this.value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "search-suggestion.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var suggestions = JSON.parse(xhr.responseText);
                    var exactMatch = suggestions.find(function(suggestion) {
                        return suggestion.name.toLowerCase() === search.toLowerCase();
                    });

                    if (exactMatch) {
                        window.location.href = exactMatch.url; // Redirect to the URL stored in the data attribute
                    } else {
                        alert('No exact match found.');
                    }
                } else {
                    console.error('Request failed with status:', xhr.status);
                    alert('No result found.');
                }
            }
        };
        xhr.send("product_name=" + encodeURIComponent(search));
        event.preventDefault(); // Prevent the default form submission
    }
});
</script>

