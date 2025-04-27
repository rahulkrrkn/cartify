<?php

const rootDir = "../../..";
$sellerId = 1;
require_once rootDir . "/lib/backend.inc.php";
Verify::seller();

$sellerId = $_SESSION["CFuserData"]["SNo"];



$query = "SELECT PV.ProductImage1 AS image, PV.OfferPrice AS price, PV.Stocks AS stock, PL.ProductName AS productName, PL.Brand AS brand, PL.AverageRating AS rating, PL.TotalRatings AS TotalRatings, PV.TotalOrderd AS totalOrderd, PV.SNo AS productSNo, PV.VarentTypeValue1 AS VarentTypeValue1 , PV.VarentTypeValue2 AS VarentTypeValue2, PV.VarentTypeValue3 AS VarentTypeValue3 FROM ProductVariants PV INNER JOIN ProductList PL ON PV.ProductSNo = PL.SNo  WHERE UserSNo = ? AND PV.Status = 'Saved' ORDER BY PV.SNo DESC";
$parms = [$sellerId];
$type = "i";
$result = executeQuery(DBsqli(), $query, $parms, $type);


if ($result) {
    // echo json_encode(['status' => 'success', 'data' => $result]);
    sendResponse(true, [], $result);
} else {
    // echo json_encode(['status' => 'error', 'data' => [], 'message' => 'No products found']);
    sendResponse(false, ["No products found", "message"]);
}
