<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::public() ?>
    <title>Wishlist</title>
    <link rel="stylesheet" href="/cartify/user/wishlist/style.css" />
</head>

<body>
    <?php Header::public() ?>
    <div class="allProducts" id="allProducts">
    </div>
    <script src="/cartify/user/functions/productsClick.js"></script>
    <script src="/cartify/user/wishlist/script.js"></script>
    <?php Footer::public() ?>
</body>

</html>