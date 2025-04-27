<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::user();
$data = postJson();
if (!isset($data['SNo'])) {
    sendResponse(true,["Invalid request","alert"]);
}
$SNo = $data['SNo'];
$userId = $_SESSION['CFuserData']['SNo'];

$query = "UPDATE Address SET SetDefault = 'No' WHERE UserSNo = ? AND Status = 'Active'";
$result = executeQuery(DBsqli(), $query, [$userId], "i");

$query2 = "UPDATE Address SET SetDefault = 'Yes' WHERE SNo = ? AND UserSNo = ? AND Status = 'Active'";
$result2 = executeQuery(DBsqli(), $query2, [$SNo, $userId], "ii");
if ($result2 > 0) {
    sendResponse(true,["Address set as default","message"]);
} else {
    sendResponse(false, ["Error in setting Address as default","alert"]);
}
