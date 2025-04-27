<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
require_once rootDir . "/helper/sendEmail/sendEmail.php";
require_once rootDir . "/helper/whatsapp/sendWhatshaapOTP.fn.php";
Verify::public();
$data = postJson();
checkRequest($data, ['mobile']);
$MobileNo = $data['mobile'];
if (!preg_match("/^[0-9]{10}+$/", $MobileNo)) {
    sendResponse(false, ["MobileNo must be 10 digits", "message"]);
}
if (strlen($MobileNo) != 10) {
    sendResponse(false, ["MobileNo must be 10 digits", "message"]);
}


session_destroy();
session_start();

$emailResult = executeQuery(DBsqli(), "SELECT EmailID FROM `User` WHERE MobileNo = ?", [$MobileNo], "i");


if (empty($emailResult)) {
    sendResponse(false, ["This MobileNo is not registered with us", "message"]);
}
$email = $emailResult[0]['EmailID'];
$OTP = rand(100000, 999999);

$_SESSION['CFaccount'] = [
    "emailId" => $email,
    "otp" => $OTP,
    'mobileNo' => $MobileNo
];
$LoginOTPPermission = whatsaapNumberLogin;
if ($LoginOTPPermission == true) {
    // die("LoginOTPPermission");
    // if (true) {
    if (sendWhatsAppOTP($MobileNo, $OTP)) {
        sendResponse(true, ["OTP sent successfully on WhatsApp", "message"]);
    }else{

        $result = sendMailFn($email, "OTP for Login", "Your OTP for Login is " . $OTP);
        sendResponse(true, ["OTP sent to your Email id whatsApp OTP is currently off", "message"]);
    }
} else {
    // die("LoginOTPPermission2");
    $result = sendMailFn($email, "OTP for Login", "Your OTP for Login is " . $OTP);
    sendResponse(true, ["OTP sent to your Email id whatsApp OTP is currently off", "message"]);
}

// sendResponse(true, ["OTP sent to your whatsApp login is currently off ", "message"]);




















// echo "<pre>";
// print_r($_SESSION);
// // print_r($data);
// echo "</pre>";