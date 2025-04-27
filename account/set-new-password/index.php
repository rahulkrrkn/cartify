<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::public() ?>

    <title>Set New Password</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php Header::public() ?>
    <div class="containerMain">
        <div class="container">
            <h2>Set New Password</h2>
            <p>Enter your email address to receive a password reset link.</p>
            <form method="post" id="forgotPassword">
                <label for="username">Email or Mobile Number</label>
                <input id="username" type="text" name="username" value="<?= $_SESSION['CFuserData']['EmailID']  ?>" required placeholder="Enter your email">

                <button class="btn btnP2" type="submit">Send Reset Link</button>
            </form>
        </div>
    </div>
    <script src="./script.js"></script>

    <?php Footer::public() ?>

</body>

</html>