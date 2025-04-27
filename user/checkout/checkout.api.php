<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::user();
// $conn = DBsqli();
$ProductVariantsSNo = $_SESSION["CFpublic"]["product"]["buyNow"];
$query  = "SELECT 
PV.SNo As ProductVariantsSNo,
PL.ProductName As ProductName,
PL.Brand As Brand,
PV.MRPPrice As MRPPrice,
PV.OfferPrice As OfferPrice,
PV.Stocks As Stocks,
PV.VarentTypeValue1 As VarentTypeValue1,
PV.VarentTypeValue2 As VarentTypeValue2,
PV.VarentTypeValue3 As VarentTypeValue3,
PV.ProductImage1 As ProductImage1,
PL.AverageRating AS AverageRating,
PL.TotalRatings AS TotalRatings,
PL.Brand AS Brand,
PL.DispatchIn AS DispatchIn,
PL.LocalDelivery AS LocalDelivery,
PL.LocalDeliveryCharge AS LocalDeliveryCharge,
PL.ZonalDelivery AS ZonalDelivery,
PL.ZonalDeliveryCharge AS ZonalDeliveryCharge,
PL.NationalDelivery AS NationalDelivery,
PL.NationalDeliveryCharge AS NationalDeliveryCharge
FROM ProductVariants PV
LEFT JOIN ProductList PL ON PV.ProductSNo = PL.SNo
 WHERE PV.SNo = ?
";

$result = executeQuery(DBsqli(), $query, [$ProductVariantsSNo], "i");

if (count($result) > 0) {
    $response = ['status' => 'success'];
    $row = $result[0];
    $productName = $row['ProductName'];
    if ($row['VarentTypeValue1'] != null || $row['VarentTypeValue2'] != null || $row['VarentTypeValue3'] != null) {
        $productName .= " (";
        if ($row['VarentTypeValue1'] != null) {
            $productName .= $row['VarentTypeValue1'];
        }
        if ($row['VarentTypeValue2'] != null) {
            $productName .= ", " . $row['VarentTypeValue2'];
        }
        if ($row['VarentTypeValue3'] != null) {
            $productName .= ", " . $row['VarentTypeValue3'];
        }
        $productName .= ")";
    };
    if ($row['Stocks'] > 10) {
        $row['Stocks'] = 10;
    }

    $response = [
        'ProductSNo' => $row['ProductVariantsSNo'],
        'ProductName' => $productName,
        'MRPPrice' => $row['MRPPrice'],
        'OfferPrice' => $row['OfferPrice'],
        'Stocks' => $row['Stocks'],
        'ProductImage1' => $row['ProductImage1'],
        'AverageRating' => $row['AverageRating'],
        'TotalRatings' => $row['TotalRatings'],
        'Brand' => $row['Brand'],
        'DispatchIn' => $row['DispatchIn'],
        'LocalDelivery' => $row['LocalDelivery'],
        'LocalDeliveryCharge' => $row['LocalDeliveryCharge'],
        'ZonalDelivery' => $row['ZonalDelivery'],
        'ZonalDeliveryCharge' => $row['ZonalDeliveryCharge'],
        'NationalDelivery' => $row['NationalDelivery'],
        'NationalDeliveryCharge' => $row['NationalDeliveryCharge'],




    ];
} else {
    
    sendResponse(false,"No product found","alert");
}

echo json_encode($response);
