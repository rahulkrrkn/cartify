<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::public() ?>

    <title>Product</title>
    <link rel="stylesheet" href="/cartify/user/product/style.css" />
    <link rel="stylesheet" href="/cartify/assets/css/productVarientPopup.css" />

</head>

<body>
    <?php Header::public() ?>
    <div class="allProducts" id="allProducts"></div>
    <div class="ViewProduct" id="ViewProduct"></div>
    <script src="/cartify/assets/js/productVarientPopup.js"></script>
    <script src="/cartify/user/product/script.js"></script>
    <script src="/cartify/user/functions/productsClick.js"></script>
    <?php Footer::public() ?>
</body>

</html>