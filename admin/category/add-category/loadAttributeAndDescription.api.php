<?php
const rootDir = "../../..";
require_once rootDir . "/lib/backend.inc.php";
$data = postJson();

$response = []; // Initialize an empty array for the response


if (isset($data['LoadAttribute'])) {
    $Sql1 = "SELECT SNo, MeasurementUnit FROM ProductAttribute ORDER BY MeasurementUnit";
    $result1 = executeQuery(DBsqli(), $Sql1);
    if (!empty($result1)) {
        $response = $result1;
    }
}

if (isset($data['LoadAllDescription'])) {
    $Sql1 = "SELECT SNo, DescriptionData FROM DescriptionData ORDER BY DescriptionData";
    $result1 = executeQuery(DBsqli(), $Sql1);
    if (!empty($result1)) {
        $response = $result1;
    }
}

if (empty($response)) {
    $response = [
        'message' => 'No results found.',
        'data' => []
    ];
}

header('Content-Type: application/json');

echo json_encode($response);
