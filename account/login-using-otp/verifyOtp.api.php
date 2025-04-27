<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::public();
require_once rootDir . "/account/makeNewSession.php";
// echo "HHHHH";

$data = postJson();
checkRequest($data, ['otp']);
$otp = $data['otp'];
if (!preg_match("/^[0-9]{6}+$/", $otp)) {
    sendResponse(false, ["OTP must be 6 digits", "message"]);
}

$oldOtp = $_SESSION['CFaccount']['otp'] ?? "";
if (empty($oldOtp)) {
    sendResponse(false, ["OTP is expired", "message"]);
}
if ($oldOtp != $otp) {
    sendResponse(false, ["OTP is incorrect", "message"]);
}
$emailId = $_SESSION['CFaccount']['emailId'] ?? "";
$loginStatus = makeLogin($emailId);
if (!$loginStatus) {
    unset($_SESSION['CFaccount']);
    sendResponse(false, ["Login Failed", "message"]);
}
unset($_SESSION['CFaccount']);
sendResponse(true, ['OTP verified successfully', 'message']);
