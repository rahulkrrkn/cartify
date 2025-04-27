<?php
session_start(); // Start session

// Function to set nested session values dynamically
function setNestedSessionValue(&$session, $keys, $value)
{
    while (count($keys) > 1) {
        $key = array_shift($keys);
        if (!isset($session[$key]) || !is_array($session[$key])) {
            $session[$key] = [];
        }
        $session = &$session[$key]; // Move reference deeper
    }
    $session[array_shift($keys)] = $value; // Set final value
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["sessionKey"]) && isset($_POST["sessionValue"])) {
    $keyString = trim($_POST["sessionKey"]);
    $value = trim($_POST["sessionValue"]);

    // Convert key string to an array path (e.g., "user[address][city]" → ["user", "address", "city"])
    $keys = preg_split('/\]?\[/', rtrim($keyString, ']'));

    setNestedSessionValue($_SESSION, $keys, $value); // Store value dynamically
}
?>

<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::admin() ?>

    <title>Dynamic Session Setter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #eef2f7;
        }

        .session-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }

        .title {
            font-size: 1.8rem;
            color: #3498db;
            margin-bottom: 1rem;
        }

        .session-data {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            text-align: left;
            font-family: monospace;
            /* max-height: 200px; */
            overflow: auto;
            border: 1px solid #ddd;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }

        input {
            width: 100%;
            padding: 8px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            font-size: 1rem;
            color: white;
            background-color: #2980b9;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #1f6690;
        }
    </style>
</head>

<body>
    <?php Header::admin() ?>

    <div class="session-container">
        <h1 class="title">Set Session Data</h1>

        <form method="POST">
            <input type="text" name="sessionKey" placeholder="Enter Session Key (e.g. user[address][city])" required>
            <input type="text" name="sessionValue" placeholder="Enter Session Value" required>
            <button type="submit">Set Session</button>
        </form>

        <?php if (!empty($_SESSION)) : ?>
            <h2 class="title">Active Sessions:</h2>
            <div class="session-data">
                <pre><?php print_r($_SESSION); ?></pre>
            </div>
        <?php else : ?>
            <p>No active session data found.</p>
        <?php endif; ?>
    </div>

    <?php Footer::admin() ?>

</body>

</html>