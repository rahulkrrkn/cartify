<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::public() ?>
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php Header::public() ?>
    <div class="containerMain">
        <div class="container">
            <h2>Reset Password</h2>
            <p id="successMessage" class="success"></p>

            <form id="resetPasswordForm">
                <div class="input-group">
                    <input type="password" id="newPassword" name="newPassword" required placeholder="New Password">
                    <span class="newPassword">👁️</span>
                </div>
                <!-- <p id="passwordMessage" class="message error"></p> -->
                <div class="strength-meter" id="strengthMeter"></div>
                <p id="strengthText" class="strength-message"></p>

                <div class="input-group">
                    <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="Confirm Password">
                    <span class="confirmPassword">👁️</span>
                </div>
                <!-- <p id="confirmMessage" class="message error"></p> -->

                <input type="hidden" id="token" name="token" value="<?= htmlspecialchars($_GET['token'] ?? '') ?>">

                <button type="submit" id="submitBtn" class="btn btnP2" disabled>Reset Password</button>
            </form>
        </div>
    </div>
    <?php Footer::public() ?>

    <script src="script.js"></script>
</body>

</html>