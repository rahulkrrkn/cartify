<?php

const rootDir = "../../../..";
require_once rootDir . "/lib/backend.inc.php";
$conn = DBsqli();
Verify::seller();


$WorkingOn=$_SESSION['CFsellerData']['addProduct']['productSNo'];



// function CheckUser($UserSNo)
// {
//     return true;
//     // if (isset($_SESSION["DBSellerSNo"])) {
//     //     if ($_SESSION["DBSellerSNo"] == $UserSNo) {
//     //         return true;
//     //     } else {
//     //         $response = [
//     //             'status' => 'error',
//     //             'message' => 'User Not Verified With This Product ID',
//     //         ];
//     //         die(json_encode($response));
//     //     }
//     // }else{
//     //     $response = [
//     //         'status' => 'error',
//     //         'message' => 'Please Login as User First',
//     //     ];
//     //     die(json_encode($response));
//     // }
// }


// if (isset($_SESSION['CFsellerData']['addProduct']['productSNo'])) {
//     $WorkingOn = $_SESSION['CFsellerData']['addProduct']['productSNo'];
// } else {
//     $response = [
//         'status' => 'error',
//         'message' => 'Please Login as User First',
//     ];
//     die(json_encode($response));
// }


// $stmt = $conn->prepare("SELECT * FROM ProductList WHERE SNo = ?");

// Prepare the statement
$stmt = $conn->prepare(
    "SELECT
    P.SNo AS ProductSNo,
    P.UserSNo AS UserSNo,
    P.ProductName AS MainProductName,
    P.Description AS MainProductDescription,
    P.VaritySelectionSNo1 AS VaritySelectionSNo1,
    P.VaritySelectionSNo2 AS VaritySelectionSNo2,
    P.VaritySelectionSNo3 AS VaritySelectionSNo3, 
    PA1.MeasurementUnit AS VaritySelectionName1,
    PA2.MeasurementUnit AS VaritySelectionName2,
    PA3.MeasurementUnit AS VaritySelectionName3,
    PC.MainCategory AS MainCategory,
    PC.Category AS Category,
    PC.SubCategory AS SubCategory,
    PV.SNo AS ProductVariantsSNo,
    PV.VariantDescription AS 	VariantDescription,
    PV.ProductImage1 AS ProductImage1,
    PV.ProductImage2 AS ProductImage2,
    PV.ProductImage3 AS ProductImage3,
    PV.ProductImage4 AS ProductImage4,
    PV.ProductImage5 AS ProductImage5,
    PV.ProductImage6 AS ProductImage6,
    PV.ProductImage7 AS ProductImage7,
    PV.ProductImage8 AS ProductImage8,
    PV.ProductImage9 AS ProductImage9,
    PV.ProductImage10 AS ProductImage10,
    PV.VarentTypeValue1 AS VarentTypeValue1,
    PV.VarentTypeValue2 AS VarentTypeValue2,
    PV.VarentTypeValue3 AS VarentTypeValue3,
    PV.DescriptionKey1 AS DescriptionKey1,
    PV.DescriptionValue1 AS DescriptionValue1,
    PV.DescriptionKey2 AS DescriptionKey2,
    PV.DescriptionValue2 AS DescriptionValue2,
    PV.DescriptionKey3 AS DescriptionKey3,
    PV.DescriptionValue3 AS DescriptionValue3,
    PV.DescriptionKey4 AS DescriptionKey4,
    PV.DescriptionValue4 AS DescriptionValue4,
    PV.DescriptionKey5 AS DescriptionKey5,
    PV.DescriptionValue5 AS DescriptionValue5,
    PV.DescriptionKey6 AS DescriptionKey6,
    PV.DescriptionValue6 AS DescriptionValue6,
    PV.DescriptionKey7 AS DescriptionKey7,
    PV.DescriptionValue7 AS DescriptionValue7,
    PV.DescriptionKey8 AS DescriptionKey8,
    PV.DescriptionValue8 AS DescriptionValue8,
    PV.DescriptionKey9 AS DescriptionKey9,
    PV.DescriptionValue9 AS DescriptionValue9,
    PV.DescriptionKey10 AS DescriptionKey10,
    PV.DescriptionValue10 AS DescriptionValue10,
    PV.DescriptionKey11 AS DescriptionKey11,
    PV.DescriptionValue11 AS DescriptionValue11,
    PV.DescriptionKey12 AS DescriptionKey12,
    PV.DescriptionValue12 AS DescriptionValue12,
    PV.DescriptionKey13 AS DescriptionKey13,
    PV.DescriptionValue13 AS DescriptionValue13,
    PV.DescriptionKey14 AS DescriptionKey14,
    PV.DescriptionValue14 AS DescriptionValue14,
    PV.DescriptionKey15 AS DescriptionKey15,
    PV.DescriptionValue15 AS DescriptionValue15,
    PV.DescriptionKey16 AS DescriptionKey16,
    PV.DescriptionValue16 AS DescriptionValue16,
    PV.DescriptionKey17 AS DescriptionKey17,
    PV.DescriptionValue17 AS DescriptionValue17,
    PV.DescriptionKey18 AS DescriptionKey18,
    PV.DescriptionValue18 AS DescriptionValue18,
    PV.DescriptionKey19 AS DescriptionKey19,
    PV.DescriptionValue19 AS DescriptionValue19,
    PV.DescriptionKey20 AS DescriptionKey20,
    PV.DescriptionValue20 AS DescriptionValue20,
    PV.DescriptionKey21 AS DescriptionKey21,
    PV.DescriptionValue21 AS DescriptionValue21,
    PV.DescriptionKey22 AS DescriptionKey22,
    PV.DescriptionValue22 AS DescriptionValue22,
    PV.DescriptionKey23 AS DescriptionKey23,
    PV.DescriptionValue23 AS DescriptionValue23,
    PV.DescriptionKey24 AS DescriptionKey24,
    PV.DescriptionValue24 AS DescriptionValue24,
    PV.DescriptionKey25 AS DescriptionKey25,
    PV.DescriptionValue25 AS DescriptionValue25,
    PV.DescriptionKey26 AS DescriptionKey26,
    PV.DescriptionValue26 AS DescriptionValue26,
    PV.DescriptionKey27 AS DescriptionKey27,
    PV.DescriptionValue27 AS DescriptionValue27,
    PV.DescriptionKey28 AS DescriptionKey28,
    PV.DescriptionValue28 AS DescriptionValue28,
    PV.DescriptionKey29 AS DescriptionKey29,
    PV.DescriptionValue29 AS DescriptionValue29,
    PV.DescriptionKey30 AS DescriptionKey30,
    PV.DescriptionValue30 AS DescriptionValue30,
    PV.DescriptionKey31 AS DescriptionKey31,
    PV.DescriptionValue31 AS DescriptionValue31,
    PV.DescriptionKey32 AS DescriptionKey32,
    PV.DescriptionValue32 AS DescriptionValue32,
    PV.DescriptionKey33 AS DescriptionKey33,
    PV.DescriptionValue33 AS DescriptionValue33,
    PV.DescriptionKey34 AS DescriptionKey34,
    PV.DescriptionValue34 AS DescriptionValue34,
    PV.DescriptionKey35 AS DescriptionKey35,
    PV.DescriptionValue35 AS DescriptionValue35,
    PV.DescriptionKey36 AS DescriptionKey36,
    PV.DescriptionValue36 AS DescriptionValue36,
    PV.DescriptionKey37 AS DescriptionKey37,
    PV.DescriptionValue37 AS DescriptionValue37,
    PV.DescriptionKey38 AS DescriptionKey38,
    PV.DescriptionValue38 AS DescriptionValue38,
    PV.DescriptionKey39 AS DescriptionKey39,
    PV.DescriptionValue39 AS DescriptionValue39,
    PV.DescriptionKey40 AS DescriptionKey40,
    PV.DescriptionValue40 AS DescriptionValue40
        FROM ProductList P
-- LEFT JOINs to allow NULL values
LEFT JOIN ProductAttribute PA1 ON PA1.SNo = P.VaritySelectionSNo1
LEFT JOIN ProductAttribute PA2 ON PA2.SNo = P.VaritySelectionSNo2
LEFT JOIN ProductAttribute PA3 ON PA3.SNo = P.VaritySelectionSNo3
LEFT JOIN ProductCategory PC ON PC.SNo = P.CategorySNo
LEFT JOIN ProductVariants PV ON PV.ProductSNo = P.SNo
WHERE P.SNo = ? "
);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind the parameter and execute the statement
$stmt->bind_param("i", $WorkingOn); // Assuming SNo is an integer

if (!$stmt->execute()) {
    die("Error executing statement: " . $stmt->error);
}

$result = $stmt->get_result();
$rowCounter = 0;

while ($row = $result->fetch_assoc()) {
    $rowCounter++;
 
    if ($rowCounter == 1) {

        // CheckUser($row["UserSNo"]);
        $response = [
            "ProductSNo" => $row["ProductSNo"],
            "MainProductName" => $row["MainProductName"],
            "MainProductDescription" => $row["MainProductDescription"],

            "VaritySelectionSNo1" => $row["VaritySelectionSNo1"],
            "VaritySelectionSNo2" => $row["VaritySelectionSNo2"],
            "VaritySelectionSNo3" => $row["VaritySelectionSNo3"],
            "VaritySelectionName1" => $row["VaritySelectionName1"],
            "VaritySelectionName2" => $row["VaritySelectionName2"],
            "VaritySelectionName3" => $row["VaritySelectionName3"],
            "VariantDescription" => $row["VariantDescription"],
            "ProductImages" => [
                "ProductImage1" => $row["ProductImage1"],
                "ProductImage2" => $row["ProductImage2"],
                "ProductImage3" => $row["ProductImage3"],
                "ProductImage4" => $row["ProductImage4"],
                "ProductImage5" => $row["ProductImage5"],
                "ProductImage6" => $row["ProductImage6"],
                "ProductImage7" => $row["ProductImage7"],
                "ProductImage8" => $row["ProductImage8"],
                "ProductImage9" => $row["ProductImage9"],
                "ProductImage10" => $row["ProductImage10"],
            ],
            "VaritySelectionAllName" => [
                "Response1" => [
                    "ProductVariantsSNo" => $row["ProductVariantsSNo"],
                    'VarentTypeValue1' => $row["VarentTypeValue1"],
                    'VarentTypeValue2' => $row["VarentTypeValue2"],
                    'VarentTypeValue3' => $row["VarentTypeValue3"],
                ],
            ],

            "MainCategory" => $row["MainCategory"],
            "Category" => $row["Category"],
            "SubCategory" => $row["SubCategory"],

            "ProductVariantsSNo" => $row["ProductVariantsSNo"],
            "DescriptionKey1" => $row["DescriptionKey1"],
            "DescriptionValue1" => $row["DescriptionValue1"],
            "DescriptionKey2" => $row["DescriptionKey2"],
            "DescriptionValue2" => $row["DescriptionValue2"],
            "DescriptionKey3" => $row["DescriptionKey3"],
            "DescriptionValue3" => $row["DescriptionValue3"],
            "DescriptionKey4" => $row["DescriptionKey4"],
            "DescriptionValue4" => $row["DescriptionValue4"],
            "DescriptionKey5" => $row["DescriptionKey5"],
            "DescriptionValue5" => $row["DescriptionValue5"],
            "DescriptionKey6" => $row["DescriptionKey6"],
            "DescriptionValue6" => $row["DescriptionValue6"],
            "DescriptionKey7" => $row["DescriptionKey7"],
            "DescriptionValue7" => $row["DescriptionValue7"],
            "DescriptionKey8" => $row["DescriptionKey8"],
            "DescriptionValue8" => $row["DescriptionValue8"],
            "DescriptionKey9" => $row["DescriptionKey9"],
            "DescriptionValue9" => $row["DescriptionValue9"],
            "DescriptionKey10" => $row["DescriptionKey10"],
            "DescriptionValue10" => $row["DescriptionValue10"],
            "DescriptionKey11" => $row["DescriptionKey11"],
            "DescriptionValue11" => $row["DescriptionValue11"],
            "DescriptionKey12" => $row["DescriptionKey12"],
            "DescriptionValue12" => $row["DescriptionValue12"],
            "DescriptionKey13" => $row["DescriptionKey13"],
            "DescriptionValue13" => $row["DescriptionValue13"],
            "DescriptionKey14" => $row["DescriptionKey14"],
            "DescriptionValue14" => $row["DescriptionValue14"],
            "DescriptionKey15" => $row["DescriptionKey15"],
            "DescriptionValue15" => $row["DescriptionValue15"],
            "DescriptionKey16" => $row["DescriptionKey16"],
            "DescriptionValue16" => $row["DescriptionValue16"],
            "DescriptionKey17" => $row["DescriptionKey17"],
            "DescriptionValue17" => $row["DescriptionValue17"],
            "DescriptionKey18" => $row["DescriptionKey18"],
            "DescriptionValue18" => $row["DescriptionValue18"],
            "DescriptionKey19" => $row["DescriptionKey19"],
            "DescriptionValue19" => $row["DescriptionValue19"],
            "DescriptionKey20" => $row["DescriptionKey20"],
            "DescriptionValue20" => $row["DescriptionValue20"],
            "DescriptionKey21" => $row["DescriptionKey21"],
            "DescriptionValue21" => $row["DescriptionValue21"],
            "DescriptionKey22" => $row["DescriptionKey22"],
            "DescriptionValue22" => $row["DescriptionValue22"],
            "DescriptionKey23" => $row["DescriptionKey23"],
            "DescriptionValue23" => $row["DescriptionValue23"],
            "DescriptionKey24" => $row["DescriptionKey24"],
            "DescriptionValue24" => $row["DescriptionValue24"],
            "DescriptionKey25" => $row["DescriptionKey25"],
            "DescriptionValue25" => $row["DescriptionValue25"],
            "DescriptionKey26" => $row["DescriptionKey26"],
            "DescriptionValue26" => $row["DescriptionValue26"],
            "DescriptionKey27" => $row["DescriptionKey27"],
            "DescriptionValue27" => $row["DescriptionValue27"],
            "DescriptionKey28" => $row["DescriptionKey28"],
            "DescriptionValue28" => $row["DescriptionValue28"],
            "DescriptionKey29" => $row["DescriptionKey29"],
            "DescriptionValue29" => $row["DescriptionValue29"],
            "DescriptionKey30" => $row["DescriptionKey30"],
            "DescriptionValue30" => $row["DescriptionValue30"],
            "DescriptionKey31" => $row["DescriptionKey31"],
            "DescriptionValue31" => $row["DescriptionValue31"],
            "DescriptionKey32" => $row["DescriptionKey32"],
            "DescriptionValue32" => $row["DescriptionValue32"],
            "DescriptionKey33" => $row["DescriptionKey33"],
            "DescriptionValue33" => $row["DescriptionValue33"],
            "DescriptionKey34" => $row["DescriptionKey34"],
            "DescriptionValue34" => $row["DescriptionValue34"],
            "DescriptionKey35" => $row["DescriptionKey35"],
            "DescriptionValue35" => $row["DescriptionValue35"],
            "DescriptionKey36" => $row["DescriptionKey36"],
            "DescriptionValue36" => $row["DescriptionValue36"],
            "DescriptionKey37" => $row["DescriptionKey37"],
            "DescriptionValue37" => $row["DescriptionValue37"],
            "DescriptionKey38" => $row["DescriptionKey38"],
            "DescriptionValue38" => $row["DescriptionValue38"],
            "DescriptionKey39" => $row["DescriptionKey39"],
            "DescriptionValue39" => $row["DescriptionValue39"],
            "DescriptionKey40" => $row["DescriptionKey40"],
            "DescriptionValue40" => $row["DescriptionValue40"],


        ];
    } else {
        $responseKey = "Response" . $rowCounter;

        // Add the current row's data into the response
        $response["VaritySelectionAllName"][$responseKey] = [
            "ProductVariantsSNo" => $row["ProductVariantsSNo"],
            'VarentTypeValue1' => $row["VarentTypeValue1"],
            'VarentTypeValue2' => $row["VarentTypeValue2"],
            'VarentTypeValue3' => $row["VarentTypeValue3"],
        ];
    }
}


// echo json_encode($response);
sendResponse(true,["Product Variety Data Loaded","message"],$response);




// Always close the statement
$stmt->close();
