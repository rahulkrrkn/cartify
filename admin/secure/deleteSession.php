<?php
session_start(); // Start session

// Function to delete nested session values dynamically
function deleteNestedSessionValue(&$session, $keys)
{
    $lastKey = array_pop($keys);
    $ref = &$session;

    foreach ($keys as $key) {
        if (!isset($ref[$key]) || !is_array($ref[$key])) {
            return false; // Key not found, nothing to delete
        }
        $ref = &$ref[$key]; // Move reference deeper
    }

    if (isset($ref[$lastKey])) {
        unset($ref[$lastKey]); // Delete final key
        return true;
    }
    return false;
}

// Handle session deletion
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["clearSession"])) {
        session_destroy(); // Clear all session data
        session_start(); // Restart session to avoid errors
    } elseif (!empty($_POST["sessionKey"])) {
        $keyString = trim($_POST["sessionKey"]);
        $keys = preg_split('/\]?\[/', rtrim($keyString, ']')); // Convert key string to an array path

        deleteNestedSessionValue($_SESSION, $keys);
    }
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

    <title>Delete Session Data</title>
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
            color: #e74c3c;
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
            background-color: #c0392b;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #a93226;
        }

        .clear-btn {
            background-color: #7f8c8d;
        }

        .clear-btn:hover {
            background-color: #616a6b;
        }
    </style>
</head>

<body>
    <?php Header::admin(); ?>

    <div class="session-container">
        <h1 class="title">Delete Session Data</h1>

        <form method="POST">
            <input type="text" name="sessionKey" placeholder="Enter Session Key to Delete (e.g. user[address])">
            <button type="submit">Delete Session Key</button>
        </form>

        <form method="POST">
            <button type="submit" name="clearSession" class="clear-btn">Clear All Sessions</button>
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

    <?php Footer::admin(); ?>

</body>

</html>