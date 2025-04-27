<?php

// include("./rootDirAdd.php");
require_once rootDir . "/config/email.inc.php";
require_once rootDir . "/helper/sendEmail/PHPMailer-master/src/PHPMailer.php";
require_once rootDir . "/helper/sendEmail/PHPMailer-master/src/SMTP.php";
require_once rootDir . "/helper/sendEmail/PHPMailer-master/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMailFn($mailEmail, $mailSubject, $mailBody)
{

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = emailSecure;
        $mail->Host = emailHost;
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->Port = emailPort;
        $mail->Username = emailUsername;
        $mail->Password = emailPassword; // Store in a secure place
        $mail->setFrom(emailUsername, "Cartify");

        $mail->addAddress($mailEmail);
        $mail->addCC("rahulkrrkn@gmail.com");


    

        // Email content
        $mail->Subject = $mailSubject;

        // Load email header and footer

        $MailHeader = file_get_contents(rootDir . '/helper/sendEmail/MailHeader.html');
        $MailFooter = file_get_contents(rootDir . '/helper/sendEmail/MailFooter.html');


        $mail->Body = "{$MailHeader}
        {$mailBody}
    {$MailFooter}";
        // $mail->Body = "{$mailBody}";

        // Send email
        // echo "{$mailBody}";
        $mail->send();
        return ["status" => "success", "message" => "Email sent successfully"];
    } catch (Exception $e) {
        return ["status" => "error", "message" => "Error: Email could not be sent. Mailer Error: {$mail->ErrorInfo}"];
    }
}
