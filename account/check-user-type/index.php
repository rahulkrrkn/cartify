<?php

// Redirect to login if no user session exists
if (!isset($_SESSION['CFuserData']['SNo'])) {
    session_destroy();
    header("Location: /cartify/account/login-using-password/");
    exit;
}

// Role checks
$CheckIsUser = isset($_SESSION['CFuserData']['SNo']) ? true : false;
$CheckIsSeller = isset($_SESSION['CFsellerData']['SNo']) ? true : false;
$CheckIsAdmin = isset($_SESSION['CFadminData']['SNo']) ? true : false;
$CheckIsSupport = isset($_SESSION['CFsupportData']['SNo']) ? true : false;

// Redirect to Home if not logged in as Seller, Admin, or Support
if (!$CheckIsSeller && !$CheckIsAdmin && !$CheckIsSupport) {
    header("Location: /cartify/");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login As</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
        }

        .container {
            background-color: #fff;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 500px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            margin-bottom: 25px;
            font-size: 16px;
            color: #777;
        }

        .links {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .links a {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-size: 18px;
        }

        .links a:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #0056b3;
        }

        /* Countdown Timer */
        .countdown {
            margin-top: 15px;
            font-size: 14px;
            color: #ff0000;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 30px;
                width: 90%;
            }

            h1 {
                font-size: 24px;
            }

            .links a {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 22px;
            }

            .links a {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login As</h1>

        <p>Select the Dashboard you want to access:</p>

        <div class="links">
            <?php
            // Display links based on user role
            if ($CheckIsUser) {
                echo '<a href="/cartify/">User Dashboard</a>';
            }

            if ($CheckIsSeller) {
                echo '<a href="/cartify/seller/">Seller Dashboard</a>';
            }

            if ($CheckIsAdmin) {
                echo '<a href="/cartify/qdmin/">Admin Dashboard</a>';
            }

            if ($CheckIsSupport) {
                echo '<a href="/cartify/support/">Support Dashboard</a>';
            }
            ?>
        </div>

        <div class="footer">
            <p>If you’re not <b><?php echo $_SESSION['CFuserData']['FName']; ?></b>, <b><?php echo $_SESSION['CFuserData']['EmailID']; ?></b>, <a href="/cartify/account/Logout/">Logout</a></p>
        </div>

        <div class="countdown">
            You will be redirected to the <b>Shopping</b> page in <span id="timer">20</span> seconds...
        </div>
    </div>

    <script>
        // Countdown timer
        let countdown = 20;
        const timerElement = document.getElementById('timer');

        const countdownInterval = setInterval(() => {
            countdown--;
            timerElement.textContent = countdown;

            if (countdown === 0) {
                clearInterval(countdownInterval);
                window.location.href = '/cartify/'; // Redirect to Shopping page
            }
        }, 1000);

        // Stop timer when user clicks on a link
        document.querySelectorAll('.links a').forEach(link => {
            link.addEventListener('click', function() {
                clearInterval(countdownInterval); // Stop timer
                link.classList.add('loading');
                setTimeout(() => link.classList.remove('loading'), 500); // Remove animation after 0.5s
            });
        });
    </script>
</body>

</html>