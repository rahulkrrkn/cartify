<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
require_once rootDir . "/helper/razorpay/autoloadRazorpay.php";
require_once rootDir . "/user/functions/ProductsPriceCheckAndCalculate.api.php";

Verify::user();
$data = postJson();
checkRequest($data, ["quantity", "productId", "paymentMethod", "addressId"]);

$userID = $_SESSION["CFuserData"]["SNo"];
$productId = $data["productId"];
$quantity = $data["quantity"];
$paymentMethod = $data["paymentMethod"];
$addressId = $data["addressId"];

$query = "SELECT PV.OfferPrice AS OfferPrice,PV.Stocks AS Stocks,PL.ZonalDeliveryCharge AS DeliveryCharge ,PL.DispatchIn AS DispatchIn FROM ProductVariants PV LEFT JOIN ProductList PL ON PV.ProductSNo = PL.SNo WHERE PV.SNo = ?";
$result = executeQuery(DBsqli(), $query, [$productId], 'i');
if (!$result) {
    sendResponse(false, ["Product not found", "alert"]);
}
$result = $result[0];
$offerPrice = $result["OfferPrice"];
$stocks = $result["Stocks"];
$deliveryCharge = $result["DeliveryCharge"];
$dispatchIn = $result["DispatchIn"];
if ($stocks < $quantity) {

    sendResponse(false, ["Out of stock", "alert"]);
}
$TotalCost = $offerPrice * $quantity;



function placeOrder($type, $payment)
{
    global $productId, $quantity, $TotalCost, $deliveryCharge, $addressId, $dispatchIn, $userID;
    if ($type == "Online") {
        $PaymentId = updatePayment();
    } else {
        $PaymentId = null;
    }

    $conn = DBsqli();
    $query1 = "INSERT INTO Orders(UserSNo,AddressSNo,ordersCount,TotalProductCost,TotalDeliveryCharge,ModeOfPayment,OrderStatus,ResivedPaymentSNo) VALUES(?,?,?,?,?,?,?,?)";
    $result = executeQuery($conn, $query1, [$userID, $addressId, 1, $TotalCost, $deliveryCharge, $type,  $payment, $PaymentId], 'iiiiisss');
    if ($result) {
        $orderID = $conn->insert_id;
        $query2 = "INSERT INTO OrderItems(OrdersSNo,ProductVariantsSNo,Quantities,ProductCost,DeliveryCharge,DateOfDelivery,OrderStatus) VALUES(?,?,?,?,?,?,?)";
        $dispatchIn = date('Y-m-d', strtotime($dispatchIn + 7));
        // prd($dispatchIn);
        $result = executeQuery($conn, $query2, [$orderID, $productId, $quantity, $TotalCost, $deliveryCharge, $dispatchIn, "Confirmed"], 'iiiiiis');
        // die();
        if ($result) {
            executeQuery($conn,"UPDATE ProductVariants SET Stocks = Stocks - ? WHERE SNo = ?",[$quantity,$productId],'ii');
            // echo json_encode(['status' => 'success', 'message' => 'Order placed successfully']);
            sendResponse(true, []);
        } else {
            sendResponse(false, ["Error in placing order", "alert"]);
        }
    } else {
        sendResponse(false, ["Error in placing order", "alert"]);
    }
}
if ($paymentMethod == "cod") {
    placeOrder("COD", "COD");
} else if ($paymentMethod == "online") {
    placeOrder("Online",  "PaymentSuccess");
}

function updatePayment()
{
    global $data;
    checkRequest($data, ["dataOfPay"]);
    checkRequest($data["dataOfPay"], ["razorpay_payment_id", "razorpay_order_id", "razorpay_signature"]);
    if (verifyPayment($data["dataOfPay"]["razorpay_payment_id"], $data["dataOfPay"]["razorpay_order_id"], $data["dataOfPay"]["razorpay_signature"])) {
        $conn = DBsqli();
        $query3 = "UPDATE razorPay SET paymentId = ?, signature = ?, Status = ? WHERE token = ?";
        $result3 = executeQuery($conn, $query3, [$data["dataOfPay"]["razorpay_payment_id"], $data["dataOfPay"]["razorpay_signature"], "success", $data["dataOfPay"]["razorpay_order_id"]], 'ssss');
        if ($result3) {

            $query4 = "SELECT SNo FROM razorPay WHERE token =?";
            $result5 = executeQuery(DBsqli(), $query4, [$data["dataOfPay"]["razorpay_order_id"]], 's');
            if ($result5) {
                $order_id = $result5[0]["SNo"];
            } else {
                $order_id = 0;
            }
        } else {
            $order_id = 0;
        }
        return $order_id;
    } else {
        sendResponse(false, ["Payment failled", "alert"]);
    }
}
