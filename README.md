## InkHouse — Online Stationery Store (PHP/MySQL)

InkHouse is a simple e‑commerce website for stationery products (notebooks, pens, pencil cases, stickers, tapes) built with PHP, MySQL, and plain HTML/CSS/JS. It supports product browsing, search, cart, checkout, user auth, and order history.

### Features
- Product catalog pages with item detail views
- Search with suggestions
- Cart: add, update, remove, view
- Checkout with server-side validation
- User signup/signin, logout
- User profile and order details

### Tech Stack
- PHP (procedural)
- MySQL (schema in `database/inkhouse.sql`)
- HTML/CSS/JavaScript (no framework)
- Apache (WAMP/XAMPP or similar)

### Project Structure (high level)
```
InkHouse/
  homepage/           Landing + search suggestions
  notebook|pen|pencilcase|sticker|tape/  Category pages
  itemDetails/        Product detail pages per item
  cart/               Cart actions & view
  checkout/           Checkout flow (validate/process)
  login/              Signup/Signin pages
  logout/             Logout endpoint
  userprofile/        Profile & order details
  include/            Shared header/footer
  style/              Stylesheets
  connect/, database/ DB connection helpers & SQL dump
  website_images/, item images/  Product/media assets
```

### Prerequisites
- PHP 7.4+ (or 8.x)
- MySQL 5.7+ (or MariaDB 10.4+)
- Apache (WAMP/XAMPP/Laragon or your own LAMP stack)

### Setup
1) Clone or copy the project into your web root (e.g., `C:/wamp64/www/InkHouse`).

2) Create a database and import schema/data:
   - Create a database (e.g., `inkhouse`).
   - Import `database/inkhouse.sql` using phpMyAdmin or MySQL client.

3) Configure database connection:
   - Check `connect/conn.php` and `database/db.php` for host, username, password, and database name.
   - Ensure the credentials match your local MySQL setup.

4) Start Apache and MySQL (via WAMP/XAMPP).

5) Visit the site:
   - Example: `http://localhost/InkHouse/homepage/index.php`

### Key Routes
- Home: `homepage/index.php`
- Search suggestions (AJAX): `homepage/search-suggestion.php`
- Categories: `notebook/notebook.php`, `pen/pen.php`, `pencilcase/pencilcase.php`, `sticker/sticker.php`, `tape/tape.php`
- Item details: files under `itemDetails/` (one per product)
- Cart: `cart/viewCart.php` (+ `add_to_cart.php`, `update_cart.php`, `remove_from_cart.php`)
- Checkout: `checkout/checkout.php` → `validate_form.php` → `process_checkout.php`
- Auth: `login/index.php` (`php/signup.php`, `php/signin.php`), `logout/logout.php`
- Profile: `userprofile/viewprofile.php`, `userprofile/order_details.php`

### Configuration Notes
- Base URLs: The project uses relative paths; if deploying under a subdirectory, keep the folder name consistent or adjust links as needed.
- Sessions: Cart and auth rely on PHP sessions; ensure `session.auto_start` is off and session save path is writable.
- File permissions: Image and upload directories must be readable by the web server. For profile uploads, ensure `userprofile/upload/` is writable.

### Development Tips
- If you change DB schema, update both `connect/conn.php`/`database/db.php` references and any SQL in action files.
- Use browser dev tools Network tab to debug cart/checkout requests (they are simple POSTs to PHP endpoints).

### Troubleshooting
- Blank page or 500 error: enable PHP error display in development:
  ```php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  ```
  Add temporarily near the top of the failing PHP file.
- DB connection failed: verify credentials and that MySQL is running; confirm the database name matches what the code expects.
- Assets not loading: ensure the project is under the web root and that relative paths (e.g., `include/header.php`) resolve correctly.

### Security (basic reminders)
- Never commit real production credentials.
- Validate and sanitize all inputs (signup, signin, checkout).
- If deploying publicly, consider CSRF tokens and prepared statements everywhere.

### License
No license specified.


