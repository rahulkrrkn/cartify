<?php
const rootDir = "./../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::user();
$data = postJson();
checkRequest($data, ['productVariantsSNo', 'change']);
$productId = $data['productVariantsSNo'];
$change = $data['change'];
$userId = $_SESSION["CFuserData"]["SNo"];
$conn = DBsqli();


if ($change == "1") {
    $query = "UPDATE Cart SET Quantity = Quantity + 1 WHERE ProductVariantSNo = ? AND UserSNo = ? AND Status = 'Saved'";
    $result = executeQuery($conn, $query, [$productId, $userId], "ii");
    sendResponse(true, "Quantity increases", "message");
} else if ($change == "-1") {
    $query = "UPDATE Cart SET Quantity = Quantity - 1 WHERE ProductVariantSNo = ? AND UserSNo = ? AND Status = 'Saved'";
    $result = executeQuery($conn, $query, [$productId, $userId], "ii");
    sendResponse(true, "Quantity decreases", "message");
}
