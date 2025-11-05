<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "ink_house";

$con = mysqli_connect($host, $username, $password, $db_name);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['product_name'])) {
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);

    // Define the mapping between product names and URLs
    $productMappings = [
        "American Style Notebook" => "../itemDetails/notebook_american style notebook.php",
        "Cute Flowering Notebook" => "../itemDetails/notebook_cute notebook.php",
        "Loose-leaf" => "../itemDetails/notebook_loose-leaf notebook.php",
        "Small Pocket Notebook" => "../itemDetails/notebook_small pocket notebook.php",
        "Snoopy Notebook" => "../itemDetails/notebook_snoopy notebook.php",
        "TACOTACO Notebook Handbook" => "../itemDetails/notebook_TACOTACO notebook.php",
        "4PCS Gradient Color Highlighter" => "../itemDetails/pen_highlighter.php",
        "Fancy Stationery Cute Macaron Gel Pen" => "../itemDetails/pen_macaron gel pen.php",
        "Simple Retractable Gel Pen" => "../itemDetails/pen_retractable gel pen.php",
        "MUJI 0.5mm Smooth Black Ink Pen" => "../itemDetails/pen_black ink pen.php",
        "Ohaya Mura White Angel Series Pen" => "../itemDetails/pen_angel series pen.php",
        "Corduroy Pen Case" => "../itemDetails/pencilcase_corduroy pen case.php",
        "Fresh Small Floral Pen Bag" => "../itemDetails/pencilcase_floral pen bag.php",
        "Front Window Pencil Case" => "../itemDetails/pencilcase_window pencil case.php",
        "Ins MUJI Mesh Pencil Case" => "../itemDetails/pencilcase_muji mesh pencil case.php",
        "Ship Shape White Pen Bag" => "../itemDetails/pencilcase_ship shape pencil case.php",
        "200pcs Exotic Planet Sticker Set" => "../itemDetails/sticker_planet.php",
        "60pcs Cute Kittens Cats MEME Waterproof Stickers" => "../itemDetails/sticker_kitten.php",
        "80 Pcs Retro Memo Paper Celebrity Quotes Graffiti Waterproof Stickers" => "../itemDetails/sticker_celebrity quote.php",
        "50pcs minimalist art ins style black and white stickers" => "../itemDetails/sticker_minimalist art.php",
        "54pcs Pink Raspberry Sour Horn Sticker" => "../itemDetails/sticker_raspberry.php",
        "5 Rolls Boxed Retro Style Tape Stickers" => "../itemDetails/tape_retro tape.php",
        "Autumn Flowers Washi Tape Set" => "../itemDetails/tape_flower tape.php",
        "Journamm 5pcs5m Solid Color Bullet Journaling Adhesive Tapes" => "../itemDetails/tape_journaling tape.php",
        "Tulip Vintage Time Washi Tape" => "../itemDetails/tape_tulip vintage tape.php"
    ];

    $suggestions = [];
    foreach ($productMappings as $name => $url) {
        if (stripos($name, $product_name) !== false) {
            $suggestions[] = [
                'name' => $name,
                'url' => $url
            ];
        }
    }

    echo json_encode($suggestions);
} else {
    echo json_encode([]);
}

mysqli_close($con);
?>
