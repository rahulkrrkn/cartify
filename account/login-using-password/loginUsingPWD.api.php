<?php

const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
require_once rootDir . "/account/makeNewSession.php";
// Verify::public();
$data = postJson();
checkRequest($data, ['username', 'password']);
$username = trim($data['username']);
$password = trim($data['password']);

checkInput($username);

function checkInput($input)
{
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        loginUsingEmail();
    } elseif (preg_match("/^\+?[0-9]{10}$/", $input)) {
        loginUsingMobileNo();
    } else {
        sendResponse(false, ["Invalid input. Please enter a valid email or phone number.", "message"]);
    }
}

$query;
function loginUsingMobileNo()
{
    global $query;
    $query = "SELECT EmailID FROM User WHERE MobileNo = ? AND Password = ?";
}
function loginUsingEmail()
{
    global $query;
    $query = "SELECT EmailID FROM User WHERE EmailID = ? AND Password = ?";
}



$result = executeQuery(DBsqli(), $query, [$username, $password], "ss");
if (empty($result)) {
    sendResponse(false, ["Invalid email or password", "message"]);
}


$emailId = $result[0]['EmailID'];
$loginStatus = makeLogin($emailId);
if (!$loginStatus) {
    sendResponse(false, ['Login Failed', 'message']);
}
sendResponse(true, ['Login Success', 'message']);
