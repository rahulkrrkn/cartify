<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::public();
$data = postJson();
checkRequest($data,["newPassword","confirmPassword","token"]);



$newPassword = trim($data["newPassword"]);
$confirmPassword = trim($data["confirmPassword"]);
$token = trim($data["token"]);

if ($newPassword !== $confirmPassword) {
    sendResponse(false,["Both Password do not match","message"]);
}

// Password strength validation
$warnings = [];
$errors = [];
// print_r($errors);
if (strlen($newPassword) < 6) {
    $errors[] = "Password must be at least 6 characters long.";
}
if (!preg_match('/\d/', $newPassword)) {
    $warnings[] = "Consider adding at least one number for better security.";
}
if (!preg_match('/[\W_]/', $newPassword)) {
    $warnings[] = "Consider adding a special character (e.g., !@#$%^&*) for better security.";
}
if (!preg_match('/[A-Z]/', $newPassword)) {
    $warnings[] = "Consider adding an uppercase letter for better security.";
}

if (!empty($errors)) {
    sendResponse(false, ["Password is too weak. ".$errors, "message"]);
}

// if (!empty($warnings)) {
//     // http_response_code(400);
//     echo json_encode(["success" => false, "message" => "Password is weak", "warnings" => $warnings]);
//     exit();
// }

$token = trim($data["token"]);
if (empty($token)) {
    sendResponse(false, ["Something went wrong please try again later", "message"]);
}
$tokenData = aesDec($endDncKey["forgotPasswordKey"], $token);

if (empty($tokenData)) {
    sendResponse(false, ["Something went wrong please try again later", "message"]);
}

if (empty($tokenData["email"])) {
    sendResponse(false, ["Something went wrong please try again later", "message"]);
}
if (empty($tokenData["email"]) || empty($tokenData["sNo"]) || empty($tokenData["currentTime"])) {
    sendResponse(false, ["Something went wrong please try again later", "message"]);
}

if (!validateTime($tokenData["currentTime"], 15)) {
    sendResponse(false, ["Link is expired please try again", "message"]);
}
$sql = "UPDATE User SET Password = ? WHERE SNo = ?";
$SNo = $tokenData["sNo"];

$result = executeQuery(DBsqli(), $sql, [$newPassword, $SNo], "si");
if (empty($result)) {
    sendResponse(false, ["It might be this is your old password or somting went wrong"," message"]);
} else {
    sendResponse(true, ["Password reset successfully", "alert", "/cartify/account/logout/"]);
}
