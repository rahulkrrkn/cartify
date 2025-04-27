<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
require_once rootDir . "/helper/razorpay/autoloadRazorpay.php";
require_once rootDir . "/user/functions/ProductsPriceCheckAndCalculate.api.php";

Verify::user();
$data = postJson();
checkRequest($data, ["productData", "paymentMethod", "addressId"]);
$userID = $_SESSION["CFuserData"]["SNo"];



$productArray = $data["productData"];
$paymentMethod = $data["paymentMethod"];
$addressId = $data["addressId"];


$productIds = array_column($productArray, "productId"); // Correct key
$placeHolder = implode(",", array_fill(0, count($productIds), "?"));
$type = str_repeat("i", count($productIds)); // Integer type for each ID

$query = "SELECT PV.SNo AS ProductVariantsSNo, PV.OfferPrice AS OfferPrice, 
                     PV.Stocks AS Stocks, PL.ZonalDeliveryCharge AS DeliveryCharge ,PL.DispatchIn AS DispatchIn
              FROM ProductVariants PV 
              LEFT JOIN ProductList PL ON PV.ProductSNo = PL.SNo 
              WHERE PV.SNo IN ($placeHolder)";
$conn = DBsqli(); // Get database connection
$productResult = executeQuery($conn, $query, $productIds, $type);
if (!$productResult) {
    sendResponse(false, ["Product not found", "alert"]);
}

if ($paymentMethod == "cod") {
    createNewOrder($productResult, $productArray, "COD", "COD");
} else if ($paymentMethod == "online") {
    createNewOrder($productResult, $productArray, "Online",  "PaymentSuccess");
}
function createNewOrder($productResult, $productArray, $type, $payment)
{
    $totalCost = 0;
    $quentity = 0;
    $deliveryCharge = 0;


    foreach ($productResult as $row) {
        $SNo = $row["ProductVariantsSNo"];

        // Find quantity from productArray using `productId`
        $quantity = array_values(array_filter($productArray, function ($item) use ($SNo) {
            return $item["productId"] == $SNo;
        }))[0]["quantity"];

        // Calculate total cost (OfferPrice * Quantity + DeliveryCharge)
        $totalCost += ($quantity * $row["OfferPrice"]) + $row["DeliveryCharge"];
        $deliveryCharge += $row["DeliveryCharge"];
        $quentity += 1;
    }
    global $conn, $userID, $addressId;
    if ($type == "Online") {
        $PaymentId = updatePayment();
    } else {
        $PaymentId = null;
    }

    $conn = DBsqli();
    $query1 = "INSERT INTO Orders(UserSNo,AddressSNo,ordersCount,TotalProductCost,TotalDeliveryCharge,ModeOfPayment,OrderStatus,ResivedPaymentSNo) VALUES(?,?,?,?,?,?,?,?)";
    $result2 = executeQuery($conn, $query1, [$userID, $addressId, $quentity, $totalCost, $deliveryCharge, $type,  $payment, $PaymentId], 'iiiiisss');
    if ($result2) {
        createOrderItems($conn->insert_id);
        return $conn->insert_id;
    } else {
        sendResponse(false, ["Order not placed", "alert"]);
    }
}

function createOrderItems($orderSno)
{
    global $conn, $productArray, $productResult;
    $perms = [];
    $type = "";
    $value = "";
    // Creating single Orders
    foreach ($productResult as $row) {
        $SNo = $row["ProductVariantsSNo"];

        // Find quantity from productArray using `productId`
        $quantity = array_values(array_filter($productArray, function ($item) use ($SNo) {
            return $item["productId"] == $SNo;
        }))[0]["quantity"];

        // Calculate total cost (OfferPrice * Quantity + DeliveryCharge)
        $totalCost = ($quantity * $row["OfferPrice"]);
        $deliveryCharge = $row["DeliveryCharge"];
        $despatchIn = $row["DispatchIn"] + 7;
        $perms[] = $orderSno;
        $perms[] = $SNo;
        $perms[] = $quantity;
        $perms[] = $totalCost;
        $perms[] = $deliveryCharge;
        $perms[] = $despatchIn;
        $perms[] = "Confirmed";
        $type .= "iiiiiss";
        $value .= "(?,?,?,?,?,?,?),";
    }
    $value = rtrim($value, ",");
    $query2 = "INSERT INTO OrderItems(OrdersSNo,ProductVariantsSNo,Quantities,ProductCost,DeliveryCharge,DateOfDelivery,OrderStatus) VALUES $value";
    $result2 = executeQuery($conn, $query2, $perms, $type);
    if ($result2) {
        sendResponse(true, ["Order placed successfully", "message"]);
    } else {
        sendResponse(false, ["Order not placed", "message"]);
    }
}































prd($result);



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
        echo json_encode(['status' => 'error', 'message' => 'Payment failed']);
        exit();
    }
}
