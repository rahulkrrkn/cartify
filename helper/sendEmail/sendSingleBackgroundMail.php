<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
require_once rootDir . "/config/email.inc.php";
require rootDir . "/helper/sendEmail/PHPMailer-master/src/PHPMailer.php";
require rootDir . "/helper/sendEmail/PHPMailer-master/src/SMTP.php";
require rootDir . "/helper/sendEmail/PHPMailer-master/src/Exception.php";
$db = DBsqli();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


// Fetch pending emails from the database
$query = "SELECT id, email, subject, body FROM email_logs WHERE status = 'pending' ORDER BY id DESC LIMIT 5";
$result = $db->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $emailId = $row['id'];
        $mailEmail = $row['email'];
        $mailSubject = $row['subject'];
        $mailBody = $row['body'];

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

            $mail->Subject = $mailSubject;
            // $mail->Body = $mailBody;
            $MailHeader = file_get_contents(rootDir . '/helper/sendEmail/MailHeader.html');
            $MailFooter = file_get_contents(rootDir . '/helper/sendEmail/MailFooter.html');


            $mail->Body = "{$MailHeader}
            {$mailBody}
            {$MailFooter}";

            $mail->send();

            // Update status to sent
            $stmt = $db->prepare("UPDATE email_logs SET status = 'sent' WHERE id = ?");
            $stmt->execute([$emailId]);
        } catch (Exception $e) {
            // Update status to failed
            $stmt = $db->prepare("UPDATE email_logs SET status = 'failed', error_message = ? WHERE id = ?");
            $stmt->execute([$mail->ErrorInfo, $emailId]);
        }
    }
} else {
    writeLog("No pending emails", "email");
}
