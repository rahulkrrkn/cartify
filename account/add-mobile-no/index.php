<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";

if(isset($_SESSION["CFuserData"]["MobileNo"])) {
    header("Location: ../profile/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::user() ?>
    <title>Mobile OTP Verification</title>
    <style>
        .containerMain {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #f4f4f4;
            width: 100%;
            margin-top: 150px;
        }

        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            border: none;
            background: #0463ca;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <?php Header::user() ?>
    <div class="containerMain">
        <div class="container">
            <h2>Enter Mobile Number</h2>
            <div id="step1">
                <input type="text" id="mobile" placeholder="Enter Mobile Number" maxlength="10">
                <button onclick="sendOTP()">Send OTP</button>
            </div>

            <div id="step2" style="display: none;">
                <h2>Enter OTP</h2>
                <input type="text" id="otp" placeholder="Enter OTP" maxlength="6">
                <button onclick="verifyOTP()">Verify OTP</button>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <?php Footer::user() ?>
</body>

</html>