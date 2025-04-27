<?php

function generateRazorPayToken($amount)
{
    global $razorpayConfig;
    $userId = $_SESSION["CFuserData"]["SNo"];
    $key_id = $razorpayConfig["key"];
    $key_secret = $razorpayConfig["secret"];
    $conn = DBsqli();
    $query = 'INSERT INTO razorPay (amount,userSNo) VALUES (?,?)';
    $result = executeQuery($conn, $query, [$amount, $userId], "ii");
    if (!$result) return response(false, "Something went wrong. Try again");
    $receiptId = $conn->insert_id;

    $orderData = [
        // 'receipt'         => $receiptId,
        'receipt'         => 'receiptid_' . $receiptId,
        'amount'          => ($amount * 100), // Amount in paise (50000 paise = INR 500)
        'currency'        => 'INR',
        'payment_capture' => 1, // Auto capture
        'notes'           => [
            'name'        => 'Cartify',
            'email'       => $_SESSION["CFuserData"]["EmailID"],
            'contact'     => $_SESSION["CFuserData"]["MobileNo"],
            'cartifyPaymentId' => $receiptId,
            'userId'      => $userId,
            'paymentType' => 'cartify',
        ]
    ];
    $data_string = json_encode($orderData);

    // Set up HTTP headers and authorization for basic authentication
    $headers = [
        "Authorization: Basic " . base64_encode("$key_id:$key_secret"),
        "Content-Type: application/json",
        "Content-Length: " . strlen($data_string)
    ];

    $options = [
        'http' => [
            'header'  => implode("\r\n", $headers),
            'method'  => 'POST',
            'content' => $data_string
        ]
    ];

    $context  = stream_context_create($options);
    $response = file_get_contents("https://api.razorpay.com/v1/orders", false, $context);
    $response = json_decode($response, true);
    if (!$response) return response(false, "Something went wrong. Try again");
    $token = $response["id"];
    $query = 'UPDATE razorPay SET token = ? WHERE SNo = ?';
    $result = executeQuery($conn, $query, [$token, $receiptId], 'si');
    if (!$result) return response(false, 'Something went wrong. Try again');
    $response["PaymentId"] = $receiptId;
    return $response;
}
