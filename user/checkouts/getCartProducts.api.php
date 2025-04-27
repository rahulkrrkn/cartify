<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
// Verify::user();
$conn = DBsqli();
$userId = $_SESSION["CFuserData"]["SNo"];
// $userId = 1;


$query = "SELECT ProductVariantSNo AS productVariantsSNo
,Quantity, PV.MRPPrice AS MRPPrice,
PV.OfferPrice AS OfferPrice,
PV.ProductImage1 AS ProductImage1,PV.Stocks, PV.VarentTypeValue1, PV.VarentTypeValue2, PV.VarentTypeValue3, PL.ProductName AS ProductName,PL.Brand AS Brand , PL.ZonalDeliveryCharge AS DeliveryCharge FROM Cart C LEFT JOIN ProductVariants PV ON C.ProductVariantSNo = PV.SNo LEFT JOIN ProductList PL ON PV.ProductSNo=PL.SNO WHERE C.UserSNo = ? AND C.Status ='Saved'";
$result = executeQuery(DBsqli(), $query, [$userId], "i");
if ($result) {
    foreach ($result as &$row) {
        if ($row['Stocks'] > 10) {
            $row['Stocks'] = 10;
        }
    }
    sendResponse(true, [], $result);

} else {
    sendResponse(false, ["Cart is empty", "alert", "/cartify/"],);
}
