
<?php
const rootDir = "../../..";
require_once rootDir . "/lib/backend.inc.php";
$data = postJson();

if (isset($data['description'])) {
    $DescriptionForAdd = $data['description'];
    $Sql2 = "SELECT DescriptionData FROM DescriptionData WHERE DescriptionData = ?";
    $result = executeQuery(DBsqli(), $Sql2, [$DescriptionForAdd], "s");
    if (!empty($result)) {
        // sendResponse(false);
        echo json_encode(["status" => "error", "message" => "Description unit already exists"]);
    } else {
        $Sql3 = "INSERT INTO DescriptionData(DescriptionData) VALUES (?)";
        $result3 = executeQuery(DBsqli(), $Sql3, [$DescriptionForAdd], "s");
        if (!empty($result3)) {
            // sendResponse(true);
            echo json_encode(["status" => "success", "message" => "Description unit added successfully"]);
        } else {
            // sendResponse(false);
            echo json_encode(["status" => "error", "message" => "Error adding description unit"]);
        }
    }
}
