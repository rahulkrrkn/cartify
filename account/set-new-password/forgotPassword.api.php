<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
require_once rootDir . "/helper/sendEmail/sendEmail.php";
Verify::public();
$data = postJson();
checkRequest($data,["username"]);

$username = $data["username"];


if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
    // Username is an email
    forgotPasswordWithEmail(sanitizeEmail($username));
} elseif (preg_match('/^\+?[0-9]{10,15}$/', $username)) {
    // Username is a mobile number (supports optional '+' and 10-15 digits)
    forgotPasswordWithMobile($username);
} else {
    sendResponse(false,["Invalid email or mobile number format.","message"]);
}


function sendlinkToGmail($email, $sNo, $accountType, $password)
{
    global $endDncKey;
    $encData = ["email" => $email, "sNo" => $sNo];
    $passwordType = $password == "old" ? "Reset Password" : "Set New Password";
    $encrypted = aesEnc($endDncKey["forgotPasswordKey"], $encData);
    $encrypted = urlencode($encrypted);
    if ($accountType == "new") {
        $message = "
    <table align='center' width='600' style='background: #ffffff; padding: 20px; border-radius: 8px;'>
        <tr>
            <td align='center'>
                <h2 style='color: #0463ca;'>Your Account Has Been Created</h2>
                <p style='color: #333;'>Welcome! Your account has been successfully created. Click the button below to
                    set your new password. This link will expire in 15 minutes.</p>
                <a href='https://rahulkrrkn.site/cartify/account/reset-password/?token=$encrypted'
                    style='display: inline-block; background: #0463ca; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; font-weight: bold;'> $passwordType</a>
                <p style='color: #777; font-size: 14px; margin-top: 10px;'>If you did not sign up for this account,
                    please ignore this email.</p>
            </td>
        </tr>
    </table>";
    } else {
        $message = "
    <table align='center' width='600' style='background: #ffffff; padding: 20px; border-radius: 8px;'>
        <tr>
            <td align='center'>
                <h2 style='color: #0463ca;'>Set Your New Password</h2>
                <p style='color: #333;'>Click the button below to set your password. This link will expire in 15 minutes.</p>
                <a href='https://rahulkrrkn.com/cartify/account/reset-password/?token=$encrypted'
                    style='display: inline-block; background: #0463ca; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; font-weight: bold;'>$passwordType</a>
                <p style='color: #777; font-size: 14px; margin-top: 10px;'>If you did not request this, please ignore
                    this email.</p>
            </td>
        </tr>
    </table>";
    }
    sendMailFn($email, $passwordType, $message);
    $emailPrifix = getEmailPrefix($email);
    sendResponse(true,["Password reset link has been sent to your email that Start with ($emailPrifix) Please check your email for further instructions.","message"]);

}
function forgotPasswordWithEmail($email)
{
    global $endDncKey;
    $conn = DBsqli();
    $query = "SELECT SNo,EmailID,Password FROM User WHERE EmailID = ? LIMIT 1";
    $result = executeQuery($conn, $query,  [$email], "s");
    $accountType = null;
    $password = null;
    if (count($result) > 0) {
        $sNo = $result[0]["SNo"];
        $password = $result[0]["Password"] == null ? "new" : "old";
        $accountType = "old";
    } else {
        $sql = "INSERT INTO User (EmailID) VALUES (?)";
        $result = executeQuery($conn, $sql, [$email], "s");
        $sNo = $conn->insert_id;
        $accountType = "new";
        $password = "new";
    }
    sendlinkToGmail($email, $sNo, $accountType, $password);
}

function forgotPasswordWithMobile($mobile)
{
    global $endDncKey;
    $conn = DBsqli();
    $query = "SELECT SNo,EmailID,Password FROM User WHERE MobileNo = ? LIMIT 1";
    $result = executeQuery($conn, $query, [$mobile], "s");
    $accountType = null;
    if (count($result) > 0) {
        $sNo = $result[0]["SNo"];
        $password = $result[0]["Password"] == null ? "new" : "old";
        $email = $result[0]["EmailID"];
        $accountType = "old";
        sendlinkToGmail($email, $sNo, $accountType, $password);
    } else {
        sendResponse(false,["This mobile number is not registered with us.","message"]);
    }
}
