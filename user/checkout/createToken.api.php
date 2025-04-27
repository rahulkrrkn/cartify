<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
require_once rootDir . "/helper/razorpay/autoloadRazorpay.php";
require_once rootDir . "/user/functions/ProductsPriceCheckAndCalculate.api.php";

Verify::user();
$data = postJson();
checkRequest($data, ["quantity", "productId"]);

$productId = $data["productId"];
$quantity = $data["quantity"];
$TotalCost = priceCheckCalculator([["productId" => $productId, "quantity" => $quantity]]);


$token = generateRazorPayToken($TotalCost);
$tokenid = $token["id"];
$emailId = $_SESSION["CFuserData"]["EmailID"];
if ($_SESSION["CFuserData"]["MobileNo"] != null) {
    $mobile = $_SESSION["CFuserData"]["MobileNo"];
}

sendResponse(true, ["Proceed to payment", "alert"], ["tokenid" => $tokenid, "emailId" => $emailId, "mobile" => $mobile, "key" => $razorpayConfig["key"]]);