<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::user();

$conn = DBsqli();
$UserSNo = $_SESSION["CFuserData"]["SNo"];

// Prepare SQL query
$sql = "SELECT SNo, PinCode, FullName, MobileNo, EmailID, State, District, City, HouseBuildingName, RoadAreaColony, Landmark, SetDefault FROM Address WHERE Status = 'Active' AND UserSNo = ? ORDER BY SetDefault";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $UserSNo);
$stmt->execute();
$result = $stmt->get_result();

// Fetch and display data
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($data);

// Close connections
$stmt->close();
$conn->close();
