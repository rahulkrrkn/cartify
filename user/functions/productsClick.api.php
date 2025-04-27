<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
$conn = DBsqli();
Verify::public();
$data = postJson();

if (!isset($data['productVariantsSNo']) && !isset($data['type'])) {
    sendResponse(false, ["Invalid request", "alert"]);
}
function addToCart($data)
{
    global $conn;
    if (!isset($_SESSION['CFuser']['cart']) != 0) {
        $_SESSION['CFuser']['cart'] = [];
    }

    if (in_array($data['productVariantsSNo'], $_SESSION['CFuser']['cart'])) {
        $Sql2 = "UPDATE Cart SET Status = 'Deleted' WHERE ProductVariantSNo = '{$data['productVariantsSNo']}' AND UserSNo = '{$_SESSION['CFuserData']['SNo']}' AND Status = 'Saved'";
        if ($conn->query($Sql2) === TRUE) {
            $_SESSION['CFuser']['cart'] = array_values(array_diff($_SESSION['CFuser']['cart'], array($data['productVariantsSNo'])));
            sendResponse(true, ["Product removed from cart", "message"], count($_SESSION['CFuser']['cart']));
        } else {
            sendResponse(false, ["Error on removing product from cart", "message"]);
        }
    } else {
        $productVariantsSNo = $data['productVariantsSNo'];
        $UserId = $_SESSION['CFuserData']['SNo'];
        $_SESSION['CFuser']['cart'][] = $productVariantsSNo;
        $TotalProductIncart = count($_SESSION['CFuser']['cart']);

        $sql = "INSERT INTO Cart (UserSNo, ProductVariantSNo) VALUES ('$UserId', '$productVariantsSNo')";

        if ($conn->query($sql) === TRUE) {
            sendResponse(
                true,
                ["Product added to cart", "message"],
                $TotalProductIncart
            );
        } else {
            sendResponse(false, ["Error on adding product to cart", "message"]);
        }
    }
}



function wishlist($data)
{
    global $conn;
    if (!isset($_SESSION['CFuser']['wishList']) != 0) {
        $_SESSION['CFuser']['wishList'] = [];
    }
    if (in_array($data['productVariantsSNo'], $_SESSION['CFuser']['wishList'])) {
        $Sql2 = "UPDATE Favourite SET Status = 'Deleted' WHERE ProductVariantSNo = '{$data['productVariantsSNo']}' AND UserSNo = '{$_SESSION['CFuserData']['SNo']}'";
        if ($conn->query($Sql2) === TRUE) {
            $_SESSION['CFuser']['wishList'] = array_values(array_diff($_SESSION['CFuser']['wishList'], array($data['productVariantsSNo'])));
            sendResponse(true, ["Product removed from wishlist", "message"], count($_SESSION['CFuser']['wishList']));
        } else {
            sendResponse(false, ["Error on removing product from wishlist", "alert"]);
        }
    } else {
        $productVariantsSNo = $data['productVariantsSNo'];
        $UserId = $_SESSION['CFuserData']['SNo'];
        $_SESSION['CFuser']['wishList'][] = $productVariantsSNo;
        $TotalProductInWishlist = count($_SESSION['CFuser']['wishList']);

        $sql = "INSERT INTO Favourite (UserSNo, ProductVariantSNo) VALUES ('$UserId', '$productVariantsSNo')";

        if ($conn->query($sql) === TRUE) {
            sendResponse(
                true,
                [],
                $TotalProductInWishlist
            );
        } else {
            sendResponse(false, ["Error on adding product to wishlist", "alert"]);
        }
    }
}
function buyNow($data)
{
    $_SESSION["CFpublic"]["product"]["buyNow"] = $data['productVariantsSNo'];
    sendResponse(true);
}
function clickOnProduct($data)
{
    $_SESSION["CFpublic"]["product"]["viewProduct"] = $data["productVariantsSNo"];
    sendResponse(true,['','redirect','/cartify/user/product/']);
}


if ($data['type'] == 'addToCart') {
    addToCart($data);
} else if ($data['type'] == 'buyNow') {
    buyNow($data);
} else if ($data['type'] == 'wishlist') {
    wishlist($data);
} else if ($data['type'] == 'clickOnProduct') {
    clickOnProduct($data);
} else {
    sendResponse(false, ["Invalid request", "alert"]);
}
