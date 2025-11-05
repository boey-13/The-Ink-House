CREATE DATABASE ink_house;

USE ink_house;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    image VARCHAR(100)
);

CREATE TABLE product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

CREATE TABLE product_variant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    product_id INT NOT NULL,
    selection VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL,
    amount INT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES product(id)
);

CREATE TABLE product_variant_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    variant_id INT NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    FOREIGN KEY (variant_id) REFERENCES product_variant(id)
);

CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    variant_id INT NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (variant_id) REFERENCES product_variant(id)
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
	firstname VARCHAR(255),
	lastname VARCHAR(255),
	email VARCHAR(255),
	phone_number VARCHAR(20),
	payment_method VARCHAR(50),
    total_price DECIMAL(10, 2) NOT NULL,
    address VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    selection VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity INT NOT NULL,
	variant_id INT,
    FOREIGN KEY (order_id) REFERENCES orders(id)
);

CREATE TABLE purchase_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
	product_id INT,
    order_id INT NOT NULL,
    purchase_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (order_id) REFERENCES orders(id)
);


INSERT INTO product (name, description) VALUES
('Notebook', 'Various styles of notebooks'),
('Pen', 'Different types of pens'),
('Pencil Case', 'Various types of pencil cases'),
('Sticker', 'Assorted stickers'),
('Tape', 'Different kinds of tapes');

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'American Style Notebook', 'Blue', 12.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/American_style_notebook/blue.jpeg');

INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'American Style Notebook', 'Green', 12.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/American_style_notebook/green.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'Cute Flowering Notebook', 'Blue', 3.88, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/Cute_notebook/blue.jpeg');

INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'Cute Flowering Notebook', 'Green', 3.88, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/Cute_notebook/green.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'Cute Flowering Notebook', 'Pink', 3.88, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/Cute_notebook/pink.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'Cute Flowering Notebook', 'Orange', 3.88, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/Cute_notebook/orange.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'Loose-leaf', NULL, 15.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/Loose-leaf_Notebook/1.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'),'Small Pocket Notebook', 'A', 5.50, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/Small_Pocket_Notebook/A.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'Small Pocket Notebook', 'B', 5.50, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/Small_Pocket_Notebook/B.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'),'Small Pocket Notebook', 'C', 5.50, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/Small_Pocket_Notebook/C.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'),'Small Pocket Notebook', 'D', 5.50, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/Small_Pocket_Notebook/D.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'Snoopy Notebook', 'A', 6.88, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/Snoopy_notebook/A.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'Snoopy Notebook', 'B', 6.88, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/Snoopy_notebook/B.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'TACOTACO Notebook Handbook', 'Laughing', 9.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/TACOTACO_Note_Book_Handbook/Laughing.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'TACOTACO Notebook Handbook', 'Looking', 9.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/TACOTACO_Note_Book_Handbook/Looking.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'TACOTACO Notebook Handbook', 'Outing', 9.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/TACOTACO_Note_Book_Handbook/Outing.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Notebook'), 'TACOTACO Notebook Handbook', 'Standing', 9.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/notebook_image/TACOTACO_Note_Book_Handbook/Standing.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), '4PCS Gradient Color Highlighter', 'Green Grape', 5.00, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/4PCS_Gradient_Color_Highlighter/greengrape.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), '4PCS Gradient Color Highlighter', 'Pink Rose', 5.00, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/4PCS_Gradient_Color_Highlighter/pinkrose.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), '4PCS Gradient Color Highlighter', 'Purple Taro', 5.00, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/4PCS_Gradient_Color_Highlighter/purpletaro.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), 'Fancy Stationery Cute Macaron Gel Pen', 'Blue', 2.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/Fancy_Stationery_Cute_Macaron_Gel_Pen/blue.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), 'Fancy Stationery Cute Macaron Gel Pen', 'Green', 2.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/Fancy_Stationery_Cute_Macaron_Gel_Pen/green.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), 'Fancy Stationery Cute Macaron Gel Pen', 'Orange', 2.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/Fancy_Stationery_Cute_Macaron_Gel_Pen/orange.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), 'Fancy Stationery Cute Macaron Gel Pen', 'Pink', 2.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/Fancy_Stationery_Cute_Macaron_Gel_Pen/pink.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), 'Fancy Stationery Cute Macaron Gel Pen', 'Purple', 2.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/Fancy_Stationery_Cute_Macaron_Gel_Pen/purple.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), 'Simple Retractable Gel Pen', 'Black', 1.59, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/Simple_Retractable_Gel_Pen/black.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), 'Simple Retractable Gel Pen', 'Blue', 1.59, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/Simple_Retractable_Gel_Pen/blue.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), 'Simple Retractable Gel Pen', 'Red', 1.59, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/Simple_Retractable_Gel_Pen/red.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), 'MUJI 0.5mm Smooth Black Ink Pen', 'Black', 1.09, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/MUJI_0.5mm_Smooth_Black_Ink_Pen/1.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pen'), 'Ohaya Mura White Angel Series Pen', 'Random', 1.50, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pen_image/Ohaya_Mura_White_Angel_Series_Pen/1.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Corduroy Pen Case', 'Beige', 10.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Corduroy_Pen_Case/beige.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Corduroy Pen Case', 'Black', 10.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Corduroy_Pen_Case/black.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Corduroy Pen Case', 'Blue', 10.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Corduroy_Pen_Case/blue.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Corduroy Pen Case', 'Gray', 10.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Corduroy_Pen_Case/gray.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Corduroy Pen Case', 'Pink', 10.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Corduroy_Pen_Case/pink.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Fresh Small Floral Pen Bag', 'Deep Blue', 11.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Fresh_Small_Floral_Pen_Bag/deepblue.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Fresh Small Floral Pen Bag', 'Light Blue', 11.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Fresh_Small_Floral_Pen_Bag/lightblue.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Front Window Pencil Case', 'White', 15.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Front_Window_Pencil_Case/white.png');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Front Window Pencil Case', 'Dark Green', 15.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Front_Window_Pencil_Case/darkgreen.png');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Front Window Pencil Case', 'Gray', 15.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Front_Window_Pencil_Case/gray.png');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Front Window Pencil Case', 'Light Green', 15.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Front_Window_Pencil_Case/lightgreen.png');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Ins MUJI Mesh Pencil Case', 'White', 7.69, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Ins_MUJI_Mesh_Pencil_Case/white.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Ins MUJI Mesh Pencil Case', 'Black', 7.69, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Ins_MUJI_Mesh_Pencil_Case/black.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Ins MUJI Mesh Pencil Case', 'Dark Grey', 7.69, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Ins_MUJI_Mesh_Pencil_Case/darkgrey.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Ship Shape White Pen Bag', 'White', 8.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Ship_Shape_White_Pen_Bag/white.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Ship Shape White Pen Bag', 'Black', 8.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Ship_Shape_White_Pen_Bag/black.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Pencil Case'), 'Ship Shape White Pen Bag', 'Blue', 8.99, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/pencil_case_image/Ship_Shape_White_Pen_Bag/blue.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Sticker'), '200pcs Exotic Planet Sticker Set', NULL, 9.66, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/sticker_image/200pcs_Exotic_Planet_Sticker_Set/2.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Sticker'), '60pcs Cute Kittens Cats MEME Waterproof Stickers', 'A', 3.32, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/sticker_image/60pcs_Cute_Kittens_Cats_MEME_Waterproof_Stickers/A.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Sticker'), '60pcs Cute Kittens Cats MEME Waterproof Stickers', 'B', 3.32, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/sticker_image/60pcs_Cute_Kittens_Cats_MEME_Waterproof_Stickers/B.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Sticker'), '80 Pcs Retro Memo Paper Celebrity Quotes Graffiti Waterproof Stickers', NULL, 4.20, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/sticker_image/80_Pcs_Retro_Memo_Paper_Celebrity_Quotes_Graffiti_Waterproof_Stickers/2.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Sticker'), '50pcs minimalist art ins style black and white stickers', NULL, 3.50, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/sticker_image/50pcs_minimalist_art_ins_style_black_and_white_stickers/1.jpg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Sticker'), '54pcs Pink Raspberry Sour Horn Sticker', NULL, 2.98, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/sticker_image/54pcs_Pink_Raspberry_Sour_Horn_Sticker/4.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), '5 Rolls Boxed Retro Style Tape Stickers', 'A', 3.37, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/5_Rolls_Boxed_Retro_Style_Tape_Stickers/A.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), '5 Rolls Boxed Retro Style Tape Stickers', 'B', 3.37, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/5_Rolls_Boxed_Retro_Style_Tape_Stickers/B.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), '5 Rolls Boxed Retro Style Tape Stickers', 'C', 3.37, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/5_Rolls_Boxed_Retro_Style_Tape_Stickers/C.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), '5 Rolls Boxed Retro Style Tape Stickers', 'D', 3.37, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/5_Rolls_Boxed_Retro_Style_Tape_Stickers/D.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), '5 Rolls Boxed Retro Style Tape Stickers', 'E', 3.37, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/5_Rolls_Boxed_Retro_Style_Tape_Stickers/E.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), '5 Rolls Boxed Retro Style Tape Stickers', 'F', 3.37, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/5_Rolls_Boxed_Retro_Style_Tape_Stickers/F.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Autumn Flowers Washi Tape Set', 'A', 13.59, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Autumn_Flowers_Washi_Tape_Set/A.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Autumn Flowers Washi Tape Set', 'B', 13.59, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Autumn_Flowers_Washi_Tape_Set/B.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Autumn Flowers Washi Tape Set', 'C', 13.59, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Autumn_Flowers_Washi_Tape_Set/C.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Autumn Flowers Washi Tape Set', 'D', 13.59, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Autumn_Flowers_Washi_Tape_Set/D.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Journamm 5pcs5m Solid Color Bullet Journaling Adhesive Tapes', 'A', 4.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Journamm_5pcs5m_Solid_Color_Bullet_Journaling_Adhesive_Tapes/A.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Journamm 5pcs5m Solid Color Bullet Journaling Adhesive Tapes', 'B', 4.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Journamm_5pcs5m_Solid_Color_Bullet_Journaling_Adhesive_Tapes/B.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Journamm 5pcs5m Solid Color Bullet Journaling Adhesive Tapes', 'C', 4.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Journamm_5pcs5m_Solid_Color_Bullet_Journaling_Adhesive_Tapes/C.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Journamm 5pcs5m Solid Color Bullet Journaling Adhesive Tapes', 'D', 4.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Journamm_5pcs5m_Solid_Color_Bullet_Journaling_Adhesive_Tapes/D.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Tulip Vintage Time Washi Tape', 'Daisy', 6.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Tulip_Vintage_Time_Washi_Tape/Daisy.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Tulip Vintage Time Washi Tape', 'Lovely', 6.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Tulip_Vintage_Time_Washi_Tape/lovely.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Tulip Vintage Time Washi Tape', 'Red Tulip', 6.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Tulip_Vintage_Time_Washi_Tape/redtulip.jpeg');
COMMIT;

BEGIN;
INSERT INTO product_variant (product_id, product_name, selection, price, amount) VALUES
((SELECT id FROM product WHERE name = 'Tape'), 'Tulip Vintage Time Washi Tape', 'Yellow Tulip', 6.90, 15);
INSERT INTO product_variant_images (variant_id, image_path) VALUES
(LAST_INSERT_ID(), '../website_images/tape_image/Tulip_Vintage_Time_Washi_Tape/yellow.jpeg');
COMMIT;

