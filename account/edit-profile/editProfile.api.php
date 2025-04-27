<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::user();
// $data = postJson();
// prd("", $data);

$userID = $_SESSION["CFuserData"]["SNo"];
// prd($_POST);
$sno = str_pad($userID, 4, "0", STR_PAD_LEFT);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // prd($_POST);
    try {
        $FName = trim($_POST['FName'] ?? "");
        $LName = trim($_POST['LName'] ?? "");
        $Gender = trim($_POST['Gender'] ?? "");
        $Gender = $Gender == "" ? null : $Gender;
        $DOB = trim($_POST['DOB'] ?? "");
        $DOB = $DOB == "" ? null : $DOB;


        if (!$FName || !$LName) {
            throw new Exception("First and Last name are required.");
        }

        if (!in_array($Gender, ["Male", "Female", "Other", null])) {
            throw new Exception("Invalid gender selection.");
        }
        $profilePhotoName = $_SESSION['CFuserData']['ProfilePhoto'] ?? 'profile-photo.jpg';
        
        if (!empty($_FILES['ProfilePhoto']['name'])) {
            // prd("not");
            $uploadDir = "./../../uploads/profiles/";
            $dateTime = date("Ymd_His");
            $fileName = "{$sno}_{$FName}_{$dateTime}.jpg";
            $targetFilePath = $uploadDir . $fileName;
            
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg','image/JPG','image/PNG','image/GIF','image/JPEG', 'image/WEBP', 'image/webp'];
            if (!in_array($_FILES['ProfilePhoto']['type'], $allowedTypes)) {
                throw new Exception("Invalid file type. Only JPG, PNG, and GIF are allowed.");
            }
            
            if (move_uploaded_file($_FILES['ProfilePhoto']['tmp_name'], $targetFilePath)) {
                $profilePhotoName = basename($fileName);
            } else {
                throw new Exception("Failed to upload profile photo.");
            }
            $query = "UPDATE User SET FName = ?, LName = ?, Gender = ?, DOB = ?, ProfilePhoto = ? WHERE SNo = ?";
            $parms = [$FName, $LName, $Gender, $DOB, $profilePhotoName, $userID];
            $type = "sssssi";
            $result = executeQuery(DBsqli(), $query, $parms, $type);
            if($result){
                
                $_SESSION['CFuserData']['ProfilePhoto'] = "/cartify/uploads/profiles/" . $profilePhotoName;
            }
        }else{

            $query = "UPDATE User SET FName = ?, LName = ?, Gender = ?, DOB = ? WHERE SNo = ?";
            $parms = [$FName, $LName, $Gender, $DOB, $userID];
            $type = "ssssi";
            $result = executeQuery(DBsqli(), $query, $parms, $type);
         
        }

        if ($result) {
            

            $_SESSION['CFuserData']['FName'] = $FName;
            $_SESSION['CFuserData']['LName'] = $LName;
            $_SESSION['CFuserData']['Gender'] = $Gender;
            $_SESSION['CFuserData']['DOB'] = $DOB;

            sendResponse(true, ["Profile updated successfully.", "alert","./../profile/"]);
        } else {
            throw new Exception("No changes made to the profile.");
        }
    } catch (Exception $e) {
        sendResponse(false, ["Something went wrong. Please try again later.", "message"]);
    }
} else {
    sendResponse(false, ["Invalid request method.", "alert"]);
}
