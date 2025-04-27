
<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php Head::public() ?>
    <title>Cart</title>
    <link rel="stylesheet" href="/cartify/user/cart/style.css" />
</head>
<body>
    <?php Header::public() ?>
    <div class="cart-container" id="cartProducts">
        <div class="cart-items">
            <div class="cart-item">
                <div class="item-details">
                </div>
            </div>
        </div>
        <div class="cart-summary">
        </div>
    </div>
    <script src="script.js"></script>
    <script src="/cartify/user/functions/productsClick.js"></script>
    <?php Footer::public() ?>
</body>
</html>