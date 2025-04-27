<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
     Head::public() 
    //  Head::admin()
     ?>

    <title>Session Data Viewer</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            /* height: 100vh; */
        }

        .CheckSessionMainContainer {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .SessionContainer {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
            max-width: 650px;
            width: 90%;
            text-align: center;
            user-select: text;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .CheckSessionTitle {
            font-size: 2.2rem;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .SessionMessage {
            font-size: 1.4rem;
            color: #2980b9;
            margin-bottom: 1rem;
        }

        .SessionSubtitle {
            font-size: 1rem;
            color: #7f8c8d;
            margin-top: 0.5rem;
        }

        .SessionData {
            background-color: #ecf0f1;
            padding: 1rem;
            border-radius: 8px;
            text-align: left;
            color: #2c3e50;
            font-family: monospace;
            font-size: 1rem;
            /* max-height: 250px; */
            overflow: auto;
            border: 1px solid #bdc3c7;
        }
    </style>
</head>

<body>
    <?php
     Header::public();
    //  Header::admin(); 
    ?>

    <?php // Start the session
    ?>

    <div class="CheckSessionMainContainer">
        <div class="SessionContainer">
            <h1 class="CheckSessionTitle">Session Data</h1>
            <?php if (!empty($_SESSION)) : ?>
                <h2 class="SessionMessage">Active Session Details:</h2>
                <div class="SessionData">
                    <pre><?php print_r($_SESSION); ?></pre>
                </div>
            <?php else : ?>
                <h2 class="SessionMessage">No Active Session Data</h2>
                <p class="SessionSubtitle">Your session is currently empty. Start a session to view data here.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php
    //  Footer::admin() 
     Footer::public() 
     ?>
</body>

</html>