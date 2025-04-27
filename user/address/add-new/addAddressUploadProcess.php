<?php
const rootDir = "../../..";
require_once rootDir . "/lib/backend.inc.php";
$conn = DBsqli();

Verify::user();
$data = postJson();


$UserSNo = $_SESSION['CFuserData']['SNo'];
$PinCode = $data['pinCode'];
$State = $data['state'];
$District = $data['district'];
$City = $data['city'];
$HouseBuildingName = $data['houseNoBuilding'];
$RoadAreaColony = $data['roadArea'];
$Landmark = $data['landmark'];
$FullName = $data['fullName'];
$MobileNo = $data['mobileNo'];
$EmailID = $data['email'];

$sql2 = "UPDATE Address SET SetDefault = 'No' WHERE UserSNo = '$UserSNo'";
$conn->query($sql2);

$sql = "INSERT INTO Address (UserSNo, PinCode, State, District, City, HouseBuildingName, RoadAreaColony, Landmark, FullName, MobileNo, EmailID)"
    . " VALUES ('$UserSNo', '$PinCode', '$State', '$District', '$City', '$HouseBuildingName', '$RoadAreaColony', '$Landmark', '$FullName', '$MobileNo', '$EmailID')";
if ($conn->query($sql) === TRUE) {
    sendResponse(true, ['Address Added Successfully',"alert","/cartify/user/address/"]);
} else {
    sendResponse(false, ['Failed to add address',"message"]);
}
