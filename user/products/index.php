<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
if (isset($_GET)) {
    $_SESSION["CFpublic"]["products"]["getData"] = $_GET;
} else {
    $_SESSION["CFpublic"]["products"]["getData"] = [];
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::public() ?>
    <title>Products</title>
    <link rel="stylesheet" href="/cartify/user/products/style.css" />
</head>

<body>
    <?php Header::public() ?>
    <div class="allProducts" id="allProducts"></div>
    <script src="/cartify/user/products/script.js"></script>
    <script src="/cartify/user/functions/productsClick.js"></script>
    <?php Footer::public() ?>
</body>

</html>