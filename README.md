## InkHouse

InkHouse is a PHP/MySQL stationery e-commerce website.  
It provides product browsing, item detail pages, search suggestions, cart, checkout, login/register, profile management, and order history.

## 1. Tech Stack

- Backend: PHP (procedural style), MySQL
- Frontend: HTML, CSS, JavaScript (vanilla)
- Runtime: Apache + PHP + MySQL (recommended: WAMP/XAMPP/Laragon)
- Database schema and seed data: `database/inkhouse.sql`

## 2. Main Features

- Homepage with banner, media gallery, new arrivals, categories, about, feedback
- Product category pages: notebooks, pens, pencil cases, stickers, tape
- Item detail pages with variant switching and image carousel
- Search suggestion API and dropdown redirect
- Cart operations: add, update quantity, remove, subtotal calculation
- Checkout form with client-side and server-side validation
- User authentication: sign up, sign in, logout
- User profile: update profile info, upload avatar, view orders
- Order details page with purchased items

## 3. Project Structure

```text
InkHouse/
├─ homepage/              # Home page + search-suggestion API
├─ notebook/              # Notebook category page
├─ pen/                   # Pen category page
├─ pencilcase/            # Pencil case category page
├─ sticker/               # Sticker category page
├─ tape/                  # Tape category page
├─ itemDetails/           # One PHP detail page per product
├─ cart/                  # Cart view and cart action endpoints
├─ checkout/              # Checkout page + validation + order processing
├─ login/                 # Login/register pages and handlers
├─ logout/                # Logout endpoint
├─ userprofile/           # Profile, order list, order details, profile update
├─ include/               # Shared header/footer
├─ style/                 # Stylesheets
├─ connect/               # Session/login state helper
├─ database/              # DB connection + SQL schema/seed
├─ website_images/        # Product and site images
└─ item images/           # Additional image assets
```

## 4. Data Model

`database/inkhouse.sql` defines and seeds these core tables:

- `users`
- `product`
- `product_variant`
- `product_variant_images`
- `cart`
- `orders`
- `order_items`
- `purchase_history`

Database name used by code and SQL: `ink_house`.

## 5. Setup (Local)

1. Put the project in web root, for example: `C:/wamp64/www/InkHouse`
2. Create database `ink_house`
3. Import `database/inkhouse.sql`
4. Confirm DB credentials in:
   - `database/db.php`
   - places using direct `mysqli_connect(...)` (for example in `login/` and `userprofile/`)
5. Start Apache and MySQL
6. Open: `http://localhost/InkHouse/homepage/index.php`

## 6. Key Pages and Endpoints

- Home: `homepage/index.php`
- Search suggestion: `homepage/search-suggestion.php`
- Categories:
  - `notebook/notebook.php`
  - `pen/pen.php`
  - `pencilcase/pencilcase.php`
  - `sticker/sticker.php`
  - `tape/tape.php`
- Item details: `itemDetails/*.php`
- Cart:
  - `cart/viewCart.php`
  - `cart/add_to_cart.php`
  - `cart/update_cart.php`
  - `cart/remove_from_cart.php`
  - `cart/cartContent.php`
- Checkout:
  - `checkout/checkout.php`
  - `checkout/validate_form.php`
  - `checkout/process_checkout.php`
- Auth:
  - `login/index.php`
  - `login/php/signup.php`
  - `login/php/signin.php`
  - `logout/logout.php`
- User area:
  - `userprofile/viewprofile.php`
  - `userprofile/order_details.php`
  - `userprofile/php/update.php`

## 7. Known Limitations (Current Code)

- Several cart/checkout queries use a hardcoded user id (`user_id = 1`) as fallback/demo behavior.
- Some SQL in auth/profile modules is string-concatenated and should be migrated to prepared statements for safety.
- Validation logic has minor inconsistencies (for example, displayed text vs actual minlength in some fields).
- Multiple places create DB connections directly instead of using one shared config wrapper.

These are normal cleanup targets if you continue developing this project.

## 8. Development Notes

- Paths are mostly relative, and some links are absolute with `/InkHouse/...`; keep folder name consistent when deploying.
- The app relies on PHP sessions (`$_SESSION`) for login state.
- Cart and product interactions are handled by `itemDetails/itemDetailsJS.js` + PHP endpoints.
- For avatar uploads, ensure upload directory is writable by the web server.

## 9. Troubleshooting

- White page or 500 error:
  - Enable temporary error reporting in the failing PHP file:
    ```php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ```
- DB connection error:
  - Check MySQL service status
  - Check DB name `ink_house`
  - Check username/password in connection files
- Missing images or CSS:
  - Verify the project is under web root
  - Verify relative paths from current PHP file

## 10. Security Checklist (Recommended)

- Use prepared statements everywhere (signup/signin/profile updates included)
- Add CSRF protection for state-changing requests
- Add stronger server-side input validation and output escaping review
- Avoid embedding plaintext DB credentials in tracked files

## 11. License

No explicit license file is included in this repository.


