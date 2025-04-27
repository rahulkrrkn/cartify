<?php

const rootDir = "..";
require_once rootDir . "/lib/backend.inc.php";
Verify::public();
require_once rootDir . "/account/makeNewSession.php";
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the ID token from POST data

    $data = postJson();

    $id_token = $data['idtoken'] ?? ''; // Retrieve ID token from POST data

    // $id_token = $_POST['idtoken'] ?? ''; // Use null coalescing to avoid undefined index notice

    // Verify the ID token
    if ($id_token) {
        // The URL for verifying the token
        $url = 'https://oauth2.googleapis.com/tokeninfo?id_token=' . $id_token;

        // Use file_get_contents to make a GET request to the Google API
        $response = file_get_contents($url);

        // Check if we received a response
        if ($response) {
            // Decode the response
            $payload = json_decode($response, true);

            // Check if the token is valid
            if (isset($payload['sub'])) {
                $userId = $payload['sub']; // Extract user ID from payload
                $email = $payload['email'] ?? null; // Extract email
                $name = $payload['name'] ?? null; // Extract name
                $LodedProfilePhoto = $payload['picture'] ?? null;
                $data = $payload;
                $result = sliceFullName($name);
                $FName = $result['firstName'] ?? null;
                $LName = $result['lastName'] ?? null;



                $sql1 = "SELECT SNo, EmailID,FName,LName,ProfilePhoto FROM User WHERE EmailID = '$email'";
                $result = executeQuery(DBsqli(), $sql1);
                if (!empty($result)) {
                    $row = $result[0];
                    $UserSNo = $row['SNo'];
                    $email = $row['EmailID'];
                    $name = $row['FName'] . " " . $row['LName'];
                    $profilePhoto = $row['ProfilePhoto'];
                    $NewFName = $row['FName'] == null ? $FName : $row['FName'];
                    $NewLName = $row['LName'] == null ? $LName : $row['LName'];
                    $NewProfilePhoto = $row['ProfilePhoto'] == null ? $LodedProfilePhoto : $row['ProfilePhoto'];

                    if ($row['FName'] == null || $row['LName'] == null || $row['ProfilePhoto'] == null) {
                        $sql2 = "UPDATE User SET FName = '$NewFName', LName = '$NewLName', ProfilePhoto = '$NewProfilePhoto' WHERE EmailID = '$email'";
                        $result = executeQuery(DBsqli(), $sql2);
                    }
                    $emailId = $email ?? "";
                    $loginStatus = makeLogin($emailId);
                    if (!$loginStatus) {
                        sendResponse(false,["Login Failed","message"]);
                    }
                    sendResponse(true,["Login Successful","message"]);
                } else {
                    $sql2 = "INSERT INTO User(EmailID,FName,LName,ProfilePhoto) VALUES('$email','$FName','$LName','$LodedProfilePhoto')";
                    $result = executeQuery(DBsqli(), $sql2);
                    if (!empty($result)) {
                        $emailId = $email ?? "";
                        $loginStatus = makeLogin($emailId);
                        if (!$loginStatus) {
                            sendResponse(false,["Login Failed","message"]);
                        }
                        sendResponse(true,["Login Successful","message"]);
                    } else {
                        sendResponse(false,["Error in Creating User","message"]);
                    }
                }
            } else {
                sendResponse(false,['Invalid ID token',"message"]);
            }
        } else {
            sendResponse(false,['Error contacting Google API',"message"]);
        }
    } else {
        sendResponse(false,['No ID token provided',"message"]);
    }
} else {
    sendResponse(false,['Invalid request method',"message"]);
}

function sliceFullName($fullName)
{
    // Split the full name by spaces
    $parts = explode(" ", $fullName);

    // Check if the name has at least two parts
    if (count($parts) < 2) {
        return ["error" => "Full name must include at least a first and last name."];
    }

    // The first name is the first part
    $firstName = $parts[0];

    // The last name is the last part (assuming it's the last element)
    $lastName = $parts[count($parts) - 1];

    return [
        "firstName" => $firstName,
        "lastName" => $lastName
    ];
}
