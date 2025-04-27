
<?php

const rootDir = "../../..";
require_once rootDir . "/lib/backend.inc.php";
$data = postJson();

if (isset($data['MeasurementTypeInput'])) {
    $MeasurementTypeInput = $data['MeasurementTypeInput'];
    $Sql1 = "SELECT MeasurementUnit FROM ProductAttribute WHERE MeasurementUnit = ?";
    $resultOfType = executeQuery(DBsqli(), $Sql1, [$MeasurementTypeInput], "s");
    if (count($resultOfType) > 0) {
        // sendResponse(false);
        echo json_encode(["status" => "error", "message" => "Measurement Type Already Exist"]);
    } else {
        // sendResponse(true);
        echo json_encode(["status" => "success", "message" => "Measurement Type Not Exist"]);
    }
}

if (isset($data['MeasurementType'])) {
    $MeasurementType = $data['MeasurementType'];
    $Sql2 = "SELECT MeasurementUnit FROM ProductAttribute WHERE MeasurementUnit = ?";
    $resultOfTypeInsert = executeQuery(DBsqli(), $Sql2, [$MeasurementType], "s");
    if (count($resultOfTypeInsert) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Measurement Type Already Exist']);
    } else {
        // $MeasurementType;

        // Retrieve and set units, assigning null if empty
        $Unit1 = !empty($data['Unit1']) ? $data['Unit1'] : null;
        $Unit2 = !empty($data['Unit2']) ? $data['Unit2'] : null;
        $Unit3 = !empty($data['Unit3']) ? $data['Unit3'] : null;
        $Unit4 = !empty($data['Unit4']) ? $data['Unit4'] : null;
        $Unit5 = !empty($data['Unit5']) ? $data['Unit5'] : null;
        $Unit6 = !empty($data['Unit6']) ? $data['Unit6'] : null;
        $Unit7 = !empty($data['Unit7']) ? $data['Unit7'] : null;
        $Unit8 = !empty($data['Unit8']) ? $data['Unit8'] : null;
        $Unit9 = !empty($data['Unit9']) ? $data['Unit9'] : null;
        $Unit10 = !empty($data['Unit10']) ? $data['Unit10'] : null;
        $Unit11 = !empty($data['Unit11']) ? $data['Unit11'] : null;
        $Unit12 = !empty($data['Unit12']) ? $data['Unit12'] : null;
        $Unit13 = !empty($data['Unit13']) ? $data['Unit13'] : null;
        $Unit14 = !empty($data['Unit14']) ? $data['Unit14'] : null;
        $Unit15 = !empty($data['Unit15']) ? $data['Unit15'] : null;

        $Sql3 = "INSERT INTO ProductAttribute(MeasurementUnit, Unit1, Unit2, Unit3, Unit4, Unit5, Unit6, Unit7, Unit8, Unit9, Unit10, Unit11, Unit12, Unit13, Unit14, Unit15) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $InsertResult = executeQuery(DBsqli(), $Sql3, [$MeasurementType, $Unit1, $Unit2, $Unit3, $Unit4, $Unit5, $Unit6, $Unit7, $Unit8, $Unit9, $Unit10, $Unit11, $Unit12, $Unit13, $Unit14, $Unit15], "ssssssssssssssss");

        if ($InsertResult) {
            echo json_encode(['status' => 'success', 'message' => 'New Measurement Type Added Successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
