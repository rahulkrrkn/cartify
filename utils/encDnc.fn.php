<?php

$endDncKey = require_once rootDir . "/config/endDnc.inc.php";

// Ensure $endDncKey is an array
if (!is_array($endDncKey)) {
    die("Invalid configuration file.");
}

// $endDncKey["secretKey"] = "adsfsfd"; // Avoid modifying global config directly
// $secretKey = $endDncKey["secretKey"];

function aesEnc($secretKey = null, $data)
{
    global $endDncKey;
    $secretKey = $secretKey ? $secretKey : $endDncKey["secretKey"];
    $data["currentTime"] = time();
    $data = json_encode($data);
    $timestamp = time();
    $key = substr(hash('sha256', $secretKey, true), 0, 32);
    $iv = openssl_random_pseudo_bytes(12);

    $tag = ""; // Initialize tag
    $ciphertext = openssl_encrypt($data, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag);

    if ($ciphertext === false) {
        return false; // Return false if encryption fails
    }
    $encryptedData = base64_encode($iv . $tag . $ciphertext);

    return $encryptedData;
}


function aesDec($secretKey = null, $encryptedData)
{
    global $endDncKey;
    $secretKey = $secretKey ? $secretKey : $endDncKey["secretKey"];
    $key = substr(hash('sha256', $secretKey, true), 0, 32);
    $decodedData = base64_decode($encryptedData);

    if ($decodedData === false || strlen($decodedData) < 28) {
        return false; // Invalid data
    }

    $iv = substr($decodedData, 0, 12);
    $tag = substr($decodedData, 12, 16);
    $ciphertext = substr($decodedData, 28);

    $decryptedData = openssl_decrypt($ciphertext, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag);

    return $decryptedData !== false ? json_decode($decryptedData, true) : null;
}


// // Prepare JSON Data
// $data = [
//     "Sno" => 10,
//     "emailId" => "rahulkrrkn@gmail.com",
// ];

// // Encrypt
// // $encrypted = aesEnc($data);
// $encrypted = aesEnc("1234567890",$data);

// if ($encrypted) {
//     echo "Encrypted Data: " . $encrypted["keySecret"];

//     // Decrypt
//     $decrypted = aesDec($encrypted["keySecret"], "1234567890");
//     // $decrypted = aesDec($encrypted["keySecret"]);
//     echo "Decrypted Data: " . $decrypted;
// }
