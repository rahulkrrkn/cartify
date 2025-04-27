<?php
const rootDir = "../../..";
require_once rootDir . "/lib/backend.inc.php";
$conn = DBsqli();
Verify::user();

$data = postJson();
checkRequest($data, ["addressId", 'pinCode', 'state', 'district', 'city', 'houseNoBuilding', 'roadArea', 'landmark', 'fullName', 'mobileNo', 'email']);

$UserSNo = $_SESSION["CFuserData"]["SNo"];
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
$addressId = $data['addressId'];


$query = "UPDATE Address SET Status = 'Deleted' WHERE UserSNo = ? AND Status = 'Active' AND SNo = ?";
executeQuery($conn, $query, [$UserSNo, $addressId], "ii");

$query = "INSERT INTO Address (UserSNo, PinCode, State, District, City, HouseBuildingName, RoadAreaColony, Landmark, FullName, MobileNo, EmailID) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$parms = [$UserSNo, $PinCode, $State, $District, $City, $HouseBuildingName, $RoadAreaColony, $Landmark, $FullName, $MobileNo, $EmailID];

$result = executeQuery($conn, $query, $parms, "issssssssss");


if ($result) {
    sendResponse(true, ["Address Updated Successfully", "alert"], "/cartify/user/address/");
} else {
    sendResponse(false, ["Failed to update address", "alert"]);
}
