
<?php

$wbOtpApConfig = require_once rootDir . "/config/whatsApp.inc.php";
require_once rootDir . "/lib/backend.inc.php";
function updateWhatsAppDB($mobileNo, $template, $response, $id, $status)
{
    $query = 'INSERT INTO whatsapp_api (`mobileNo`, `templateName`, `response`, `responseId`, `responseStatus`) VALUES (?, ?, ?, ?, ?)';
    $params = [$mobileNo, $template, $response, $id, $status];
    executeQuery(DBsqli(), $query, $params, "issss");
}
function sendWhatsAppOTP($recipient, $otp)
{
    global $wbOtpApConfig;

    $url = $wbOtpApConfig["url"];

    $data = [
        "messaging_product" => "whatsapp",
        "to" => "91" . $recipient,
        "type" => "template",
        "template" => [
            "name" => "cartify_otp_1", // Your approved template name
            "language" => ["code" => "en_US"],
            "components" => [
                [
                    "type" => "body",
                    "parameters" => [
                        ["type" => "text", "text" => $otp] // OTP Code
                    ]
                ],
                [
                    "type" => "button",
                    "sub_type" => "url",
                    "index" => "0",
                    "parameters" => [
                        ["type" => "text", "text" => $otp],
                    ]
                ]
            ]
        ]
    ];
    $headers = [
        "Authorization: Bearer $wbOtpApConfig[apiKey]",
        "Content-Type: application/json"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $oldResponse = curl_exec($ch);
    $response = json_decode($oldResponse, true);
    curl_close($ch);

    if (isset($response["messages"][0]["message_status"])) {
        updateWhatsAppDB($recipient, "cartify_otp_1", $oldResponse,  $response["messages"][0]["id"], "success");
        return true;
    } else {
        updateWhatsAppDB($recipient, "cartify_otp_1", $oldResponse,  null, "error");
        return false;
    }
}

?>
