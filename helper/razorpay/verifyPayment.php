<?php

function verifyPayment($paymentId, $orderId, $signature)
{
    global $razorpayConfig;
    $generated_signature = hash_hmac('sha256', $orderId . "|" . $paymentId, $razorpayConfig['secret']);
    if ($generated_signature === $signature) {
        return true;
    } else {
        return false;
    }
}


