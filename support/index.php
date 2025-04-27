<?php
const rootDir = "..";
require_once rootDir . "/lib/frontend.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::support() ?>
    <title>Support Dashboard - Under Construction</title>
    <style>
        .containerMain {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            height: 60vh;
            text-align: center;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            color: #333;
        }

        .container p {
            color: #777;
        }
    </style>
</head>

<body>
    <?php Header::support(); ?>
    <div class="containerMain">
        <div class="container">
            <h1>Support Dashboard</h1>
            <p>🚧 This page is under construction 🚧</p>
            <p>We are working hard to bring you the best experience. Please check back later.</p>
        </div>
    </div>
    <?php Footer::support() ?>
</body>

</html>