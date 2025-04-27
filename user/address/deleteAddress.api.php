<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::user();
$data = postJson();
if (!isset($data['SNo'])) {
    sendResponse(false,"Invalid request","alert");
}
$SNo = $data['SNo'];
$userId = $_SESSION['CFuserData']['SNo'];

$query = "UPDATE Address SET Status = 'Deleted' WHERE UserSNo = ? AND Status = 'Active' AND SNo = ?";
$result = executeQuery(DBsqli(), $query, [$userId, $SNo], "ii");
if ($result > 0) {
    sendResponse(true,["Address deleted successfully","message"]);
} else {
    
    sendResponse(false,["Error deleting address","alert"]);
}
