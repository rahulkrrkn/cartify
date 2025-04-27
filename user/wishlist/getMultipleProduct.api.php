




<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::user();
$conn = DBsqli();

if(!isset($_SESSION['CFuser']['wishList']) || empty($_SESSION['CFuser']['wishList'])){
    sendResponse(false,["Wishlist is empty","alert","/cartify/"],);
}


$data = $_SESSION['CFuser']['wishList'];
$wishlist = implode(",", $data);
$wishlist;
$ConnectionPrepare  = "SELECT PV.SNo As ProductVariantsSNo, PL.ProductName As ProductName, PL.Brand As Brand, PV.MRPPrice As MRPPrice, PV.OfferPrice As OfferPrice, PV.VariantDescription As VariantDescription, PV.ProductImage1 As ProductImage1, PL.AverageRating As AverageRating, PL.TotalRatings As TotalRatings, PL.LocalDeliveryCharge As LocalDeliveryCharge, PV.Stocks As Stocks, PA1.MeasurementUnit As VaritySelectionName1, PA2.MeasurementUnit As VaritySelectionName2, PA3.MeasurementUnit As VaritySelectionName3, PV.VarentTypeValue1 AS VarentTypeValue1, PV.VarentTypeValue2 AS VarentTypeValue2, PV.VarentTypeValue3 AS VarentTypeValue3 FROM ProductVariants PV LEFT JOIN ProductList PL ON PV.ProductSNo = PL.SNo LEFT JOIN ProductAttribute PA1 ON PA1.SNo = PL.VaritySelectionSNo1 LEFT JOIN ProductAttribute PA2 ON PA2.SNo = PL.VaritySelectionSNo2 LEFT JOIN ProductAttribute PA3 ON PA3.SNo = PL.VaritySelectionSNo3
WHERE PV.SNo IN ($wishlist) ";

$result = executeQuery(DBsqli(),  $ConnectionPrepare);
if (!$result) {
    sendResponse(false,["Wishlist is empty","alert","/cartify/"],);
}




if (isset($_SESSION['CFuser']['wishList'])) {
    $TotalProductInWishlist = count($_SESSION['CFuser']['wishList']);
} else {
    $TotalProductInWishlist = 0;
}
if (isset($_SESSION['CFuser']['cart'])) {
    $TotalProductIncart = count($_SESSION['CFuser']['cart']);
} else {
    $TotalProductIncart = 0;
}
foreach ($result as $row) {

    $WishListIs;
    if (isset($_SESSION['CFuser']['wishList'])) {

        if (in_array($row['ProductVariantsSNo'], $_SESSION['CFuser']['wishList'])) {
            $WishListIs = true;
        } else {
            $WishListIs = false;
        }
    } else {
        $WishListIs = false;
    }
    $AddToCartIs;
    if (isset($_SESSION['CFuser']['cart'])) {
        if (in_array($row['ProductVariantsSNo'], $_SESSION['CFuser']['cart'])) {
            $AddToCartIs = true;
        } else {
            $AddToCartIs = false;
        }
    } else {
        $AddToCartIs = false;
    }
    $productName = $row['ProductName'];
    if ($row['VarentTypeValue1'] != null || $row['VarentTypeValue2'] != null || $row['VarentTypeValue3'] != null) {
        $productName .= " (";
        if ($row['VarentTypeValue1'] != null) {
            $productName .= $row['VarentTypeValue1'];
        }
        if ($row['VarentTypeValue2'] != null) {
            $productName .= ", " . $row['VarentTypeValue2'];
        }
        if ($row['VarentTypeValue3'] != null) {
            $productName .= ", " . $row['VarentTypeValue3'];
        }
        $productName .= ")";
    }



    $response['Product'][] = [
        'WishListIs' => $WishListIs,
        'AddToCartIs' => $AddToCartIs,
        // 'ProductSNo' => $row['ProductSNo'],
        'ProductVariantsSNo' => $row['ProductVariantsSNo'],
        'ProductName' => $productName,
        'MRPPrice' => $row['MRPPrice'],
        'OfferPrice' => $row['OfferPrice'],
        'ProductImage1' => $row['ProductImage1'],
        'TotalRatings' => $row['TotalRatings'],
        'AverageRating' => $row['AverageRating'],
        'LocalDeliveryCharge' => $row['LocalDeliveryCharge'],
        'Stocks' => $row['Stocks'],
        'VaritySelectionName1' => $row['VaritySelectionName1'],
        'VaritySelectionName2' => $row['VaritySelectionName2'],
        'VaritySelectionName3' => $row['VaritySelectionName3'],

    ];
}
$response['TotalWishListCount'] = $TotalProductInWishlist;
$response['TotalCartCount'] = $TotalProductIncart;
sendResponse(true, [], $response);
