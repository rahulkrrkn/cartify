<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::user();
checkAccess(whatsaapNumberAdditon, "Add new mobile no is currently off");
require_once rootDir . "/helper/whatsapp/sendWhatshaapOTP.fn.php";
$data = postJson();


if (isset($data["mobileNo"])) {
    // check valid mobile no
    if (preg_match("/^[0-9]{10}$/", $data["mobileNo"])) {
        $mobileNo = $data["mobileNo"];
        $sql = "SELECT * FROM User WHERE MobileNo = ?";
        $result = executeQuery(DBsqli(), $sql, [$mobileNo], "i");
        if ($result) {

            sendResponse(false, ["Mobile no already exists Please add another", "alert"]);
        } else {
            $_SESSION["CFtemp"]["setMobileNo"] = $mobileNo;
            $_SESSION["CFtemp"]["setMobileNoTime"] = time();
            $otp = rand(100000, 999999);
            $_SESSION["CFtemp"]["setMobileNoOTP"] = $otp;
            if (sendWhatsAppOTP($mobileNo, $otp)) {
                sendResponse(true, ["OTP sent successfully on WhatsApp", "alert"]);
            } else {
                sendResponse(false, ["Failed to send OTP", "alert"]);
            }
        }
    } else {
        sendResponse(false, ["Invalid mobile no", "message"]);
    }
}

if (isset($data["otp"])) {
    if (preg_match("/^[0-9]{6}$/", $data["otp"])) {
        // Check if OTP is submitted within 15 minutes
        if (isset($_SESSION["CFtemp"]["setMobileNoTime"]) && (time() - $_SESSION["CFtemp"]["setMobileNoTime"] <= 900)) {
            if ($_SESSION["CFtemp"]["setMobileNoOTP"] == $data["otp"]) {
                $sql = "UPDATE User SET MobileNo = ? WHERE SNo = ?";
                $result = executeQuery(DBsqli(), $sql, [$_SESSION["CFtemp"]["setMobileNo"], $_SESSION["CFuserData"]["SNo"]], "si");
                if ($result) {
                    $_SESSION["CFuserData"]["MobileNo"] = $_SESSION["CFtemp"]["setMobileNo"];
                    unset($_SESSION["CFtemp"]["setMobileNo"]);
                    unset($_SESSION["CFtemp"]["setMobileNoTime"]);
                    sendResponse(true, ["Mobile no added successfully", "alert","/cartify/"]);
                } else {
                    sendResponse(false, ["Failed to add mobile no", "message"]);
                }
            } else {
                sendResponse(false, ["Invalid OTP", "message"]);
            }
        } else {
            unset($_SESSION["CFtemp"]["setMobileNo"]);
            unset($_SESSION["CFtemp"]["setMobileNoTime"]);
            sendResponse(false, ["OTP expired. Please request a new one.", "message"]);
        }
    } else {
        sendResponse(false, ["Invalid OTP", "message"]);
    }
}
if (!isset($data["otp"]) && !isset($data["mobileNo"])) {
    sendResponse(false, ["Invalid request", "message"]);
}
