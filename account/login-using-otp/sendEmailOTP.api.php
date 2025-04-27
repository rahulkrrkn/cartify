<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
require_once rootDir . "/helper/sendEmail/sendEmail.php";
Verify::public();
$data = postJson();
checkRequest($data, ['email']);



$EmailId = sanitizeEmail($data['email']);

if (!$EmailId) {
    sendResponse(false, ['Invalid Email', 'alert']);
}
session_destroy();
session_start();

$email = $EmailId;
$OTP = rand(100000, 999999);
$EmailId = strtolower($EmailId);
$emailResult = executeQuery(DBsqli(), "SELECT EmailID FROM `User` WHERE EmailId = ?", [$EmailId], "s");


if (empty($emailResult)) {
    $emailResult = executeQuery(DBsqli(), "INSERT INTO User (EmailID) VALUES (?)", [$EmailId], "s");
    if (empty($emailResult)) {
        sendResponse(false, ["Error on Creating account", "alert"]);
    }
    $message = "<h2>Your new account has been created. Your OTP is: <b>$OTP</b> </h2>";
    sendMailFn($email, "New Account OTP", $message);
} else {
    $message = "<h3>Your OTP is: <b>$OTP</b> </h3>";
    $response = sendMailFn($email, "OTP for Login", $message);
    // die($message);
}

$_SESSION['CFaccount'] = [
    "emailId" => $email,
    "otp" => $OTP
];

sendResponse(true, ["OTP sent successfully on your email", "message"]);
