<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::public() ?>

    <meta name="description" content="Secure and user-friendly login page for Cartify, the ultimate eCommerce platform by RahulKrRKN. Log in to shop seamlessly, sign up, or recover your password easily.">
    <meta name="keywords" content="Cartify, ecommerce, online store, secure login, OTP login, email login, RahulKrRKN, shop online, sign up, buy online">
    <meta name="author" content="Rahul Kumar">
    <meta property="og:title" content="Responsive Login Page - Cartify">
    <meta property="og:description" content="Log in to Cartify, your trusted eCommerce platform, designed by RahulKrRKN. Shop smart, sign up, or recover your account easily.">
    <meta property="og:image" content="https://rahulkrrkn.com/RahulKrRKN.jpg">
    <meta property="og:url" content="https://rahulkrrkn.com">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Secure Login - Cartify by RahulKrRKN">
    <meta name="twitter:description" content="Cartify offers a fast and secure shopping experience. Log in or sign up now.">
    <meta name="twitter:image" content="https://rahulkrrkn.com/RahulKrRKN.jpg">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <title>Login to Cartify - Online Shopping Made Easy</title>
    <link rel="stylesheet" href="./style.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>

</head>

<body>
    <?php Header::public() ?>
    <div id="mainContainer">
        <div class="login-container">
            <div class="login-image" aria-hidden="true"></div>
            <div class="login-form">
                <h2>Welcome Back to Cartify</h2>
                <form id="loginForm" onsubmit="event.preventDefault(); verifyLogin();">
                    <label for="emailOrMobile">Email</label>
                    <input type="text" id="emailOrMobile" name="emailOrMobile" placeholder="Enter your email address" required>

                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required minlength="8">
                        <span id="togglePassword">👁️</span>
                    </div>
                    <p id="message"></p>
                    <button id="loginButton" type="submit">Login</button>
                </form>

                <div class="otp-login">
                    <a href="./../login-using-otp/">Login with OTP</a>
                </div>

                <div class="login-links">
                    <a href="./../login-using-otp/">Create an Account</a>
                    <a href="./../set-new-password/">Forgot Password?</a>
                </div>

                <div class="google-signin">
                    <div id="g_id_onload"
                        data-client_id="78394163492-5i4brsjq0dtdjonfj44jp88r3t47i74m.apps.googleusercontent.com"
                        data-context="signin"
                        data-ux_mode="popup"
                        data-login_uri="<?php echo $referrer; ?>"
                        data-auto_prompt="false">
                    </div>
                    <div class="g_id_signin" data-type="standard"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="./sctipt.js" async defer></script>
    <?php Footer::public() ?>

</body>

</html>