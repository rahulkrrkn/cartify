<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
require_once rootDir . "/helper/razorpay/autoloadRazorpay.php";
require_once rootDir . "/user/functions/ProductsPriceCheckAndCalculate.api.php";

Verify::user();
$data = postJson();
checkRequest($data, ["productData"]);
$TotalCost = priceCheckCalculator($data["productData"]);

// prd($TotalCost);
$token = generateRazorPayToken($TotalCost);
// prd($token);
$tokenid = $token["id"];
$emailId = $_SESSION["CFuserData"]["EmailID"];
if ($_SESSION["CFuserData"]["MobileNo"] != null) {
    $mobile = $_SESSION["CFuserData"]["MobileNo"];
}
sendResponse(true,["Proceed to payment","message"],["tokenid" => $tokenid, "emailId" => $emailId, "mobile" => $mobile, "key" => $razorpayConfig["key"]]);