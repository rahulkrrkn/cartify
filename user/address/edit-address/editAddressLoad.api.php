<?php
const rootDir = "../../..";
require_once rootDir . "/lib/backend.inc.php";
$conn = DBsqli();
Verify::user();
$data = postJson();
checkRequest($data, ["addressId"]);
$addressId = $data["addressId"];

$sql = "SELECT * FROM Address WHERE Status = 'Active' AND UserSNo = ? AND SNo = ? ";
$result = executeQuery(DBsqli(), $sql, [userId, $addressId], "ii");
if ($result) {
    sendResponse(true ,["Address found", "message"], $result[0]);
} else {
    sendResponse(false ,["Address not found", "alert"] );
}
