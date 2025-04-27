<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::user();
$userId = $_SESSION["CFuserData"]["SNo"];
$query = "SELECT ProductCost,DeliveryCharge,DateOfDelivery,DeliverdOn,Oi.OrderStatus,Quantities,ProductVariantsSNo AS OrderId, PV.ProductImage1,PV.VarentTypeValue1,PV.VarentTypeValue2,PV.VarentTypeValue3, PL.ProductName FROM OrderItems Oi LEFT JOIN ProductVariants as PV ON Oi.ProductVariantsSNo = PV.SNo LEFT JOIN Orders ON Oi.OrdersSNo = Orders.SNo LEFT JOIN ProductList PL ON PV.ProductSNo =PL.SNo   WHERE Orders.UserSNo = ? ORDER BY Orders.SNo DESC";
// prd($userId);
$result = executeQuery(DBsqli(), $query, [$userId], "i");
if ($result) {
    sendResponse(true, [], $result);
} else {

    sendResponse(false, ["No Orders Found","alert", "/cartify/user/products/"], "alert");
}
