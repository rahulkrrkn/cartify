<?php
const rootDir = "../../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::seller();
$data = postJson();
$SNo;
if (isset($data['SNo'])) {
    $SNo = $data['SNo']; // Fetch the value
} else {
    
    sendResponse(false,["Missing productSNo in URL","alert"],null);
    
}



$sellerId = $_SESSION['CFsellerData']['SNo'];
// for testing purpose both are fixed but no chnage it

$query = "SELECT  PL.UserSNo AS UserSNo, PL.CategorySNo AS CategorySNo, PL.VaritySelectionSNo1 AS VaritySelectionSNo1, PL.VarityUnit1 AS VarityUnit1, PL.VaritySelectionSNo2 AS VaritySelectionSNo2, PL.VarityUnit2 AS VarityUnit2, PL.VaritySelectionSNo3 AS VaritySelectionSNo3, PL.VarityUnit3 AS VarityUnit3, PL.Verification AS Verification, PL.ProductName AS ProductName, PL.Description AS Description, PL.AverageRating AS AverageRating, PL.TotalRatings AS TotalRatings, PL.TotalOrderd AS TotalOrderd, PL.Brand AS Brand, PL.Keywords AS Keywords, PL.Status AS Status, PL.DispatchIn AS DispatchIn, PL.SellOnLocalShop AS SellOnLocalShop, PL.SellOnUniversal AS SellOnUniversal, PL.LocalDelivery AS LocalDelivery, PL.LocalDeliveryCharge AS LocalDeliveryCharge, PL.Date AS Date, PL.ZonalDelivery AS ZonalDelivery, PL.ZonalDeliveryCharge AS ZonalDeliveryCharge, PL.NationalDelivery AS NationalDelivery, PL.NationalDeliveryCharge AS NationalDeliveryCharge, PV.VariantDescription AS VariantDescription, PV.AdditionalCharges AS AdditionalCharges, PV.Status AS Status, PV.ProductImage1 AS ProductImage1, PV.ProductImage2 AS ProductImage2, PV.ProductImage3 AS ProductImage3, PV.ProductImage4 AS ProductImage4, PV.ProductImage5 AS ProductImage5, PV.ProductImage6 AS ProductImage6, PV.ProductImage7 AS ProductImage7, PV.ProductImage8 AS ProductImage8, PV.ProductImage9 AS ProductImage9, PV.ProductImage10 AS ProductImage10, PV.TotalOrderd AS TotalOrderd, PV.TotalSell AS TotalSell, PV.TotalCancel AS TotalCancel, PV.DescriptionKey1 AS DescriptionKey1, PV.DescriptionValue1 AS DescriptionValue1, PV.DescriptionKey2 AS DescriptionKey2, PV.DescriptionValue2 AS DescriptionValue2, PV.DescriptionKey3 AS DescriptionKey3, PV.DescriptionValue3 AS DescriptionValue3, PV.DescriptionKey4 AS DescriptionKey4, PV.DescriptionValue4 AS DescriptionValue4, PV.DescriptionKey5 AS DescriptionKey5, PV.DescriptionValue5 AS DescriptionValue5, PV.DescriptionKey6 AS DescriptionKey6, PV.DescriptionValue6 AS DescriptionValue6, PV.DescriptionKey7 AS DescriptionKey7, PV.DescriptionValue7 AS DescriptionValue7, PV.DescriptionKey8 AS DescriptionKey8, PV.DescriptionValue8 AS DescriptionValue8, PV.DescriptionKey9 AS DescriptionKey9, PV.DescriptionValue9 AS DescriptionValue9, PV.DescriptionKey10 AS DescriptionKey10, PV.DescriptionValue10 AS DescriptionValue10, PV.DescriptionKey11 AS DescriptionKey11, PV.DescriptionValue11 AS DescriptionValue11, PV.DescriptionKey12 AS DescriptionKey12, PV.DescriptionValue12 AS DescriptionValue12, PV.DescriptionKey13 AS DescriptionKey13, PV.DescriptionValue13 AS DescriptionValue13, PV.DescriptionKey14 AS DescriptionKey14, PV.DescriptionValue14 AS DescriptionValue14, PV.DescriptionKey15 AS DescriptionKey15, PV.DescriptionValue15 AS DescriptionValue15, PV.DescriptionKey16 AS DescriptionKey16, PV.DescriptionValue16 AS DescriptionValue16, PV.DescriptionKey17 AS DescriptionKey17, PV.DescriptionValue17 AS DescriptionValue17, PV.DescriptionKey18 AS DescriptionKey18, PV.DescriptionValue18 AS DescriptionValue18, PV.DescriptionKey19 AS DescriptionKey19, PV.DescriptionValue19 AS DescriptionValue19, PV.DescriptionKey20 AS DescriptionKey20, PV.DescriptionValue20 AS DescriptionValue20, PV.DescriptionKey21 AS DescriptionKey21, PV.DescriptionValue21 AS DescriptionValue21, PV.DescriptionKey22 AS DescriptionKey22, PV.DescriptionValue22 AS DescriptionValue22, PV.DescriptionKey23 AS DescriptionKey23, PV.DescriptionValue23 AS DescriptionValue23, PV.DescriptionKey24 AS DescriptionKey24, PV.DescriptionValue24 AS DescriptionValue24, PV.DescriptionKey25 AS DescriptionKey25, PV.DescriptionValue25 AS DescriptionValue25, PV.DescriptionKey26 AS DescriptionKey26, PV.DescriptionValue26 AS DescriptionValue26, PV.DescriptionKey27 AS DescriptionKey27, PV.DescriptionValue27 AS DescriptionValue27, PV.DescriptionKey28 AS DescriptionKey28, PV.DescriptionValue28 AS DescriptionValue28, PV.DescriptionKey29 AS DescriptionKey29, PV.DescriptionValue29 AS DescriptionValue29, PV.DescriptionKey30 AS DescriptionKey30, PV.DescriptionValue30 AS DescriptionValue30, PV.DescriptionKey31 AS DescriptionKey31, PV.DescriptionValue31 AS DescriptionValue31, PV.DescriptionKey32 AS DescriptionKey32, PV.DescriptionValue32 AS DescriptionValue32, PV.DescriptionKey33 AS DescriptionKey33, PV.DescriptionValue33 AS DescriptionValue33, PV.DescriptionKey34 AS DescriptionKey34, PV.DescriptionValue34 AS DescriptionValue34, PV.DescriptionKey35 AS DescriptionKey35, PV.DescriptionValue35 AS DescriptionValue35, PV.DescriptionKey36 AS DescriptionKey36, PV.DescriptionValue36 AS DescriptionValue36, PV.DescriptionKey37 AS DescriptionKey37, PV.DescriptionValue37 AS DescriptionValue37, PV.DescriptionKey38 AS DescriptionKey38, PV.DescriptionValue38 AS DescriptionValue38, PV.DescriptionKey39 AS DescriptionKey39, PV.DescriptionValue39 AS DescriptionValue39, PV.DescriptionKey40 AS DescriptionKey40, PV.DescriptionValue40 AS DescriptionValue40, PV.Date AS Date FROM ProductVariants PV INNER JOIN ProductList PL ON PV.ProductSNo = PL.SNo  WHERE UserSNo = ? AND PV.SNo = ? ORDER BY PV.SNo DESC";
$parms = [$sellerId, $SNo];
$type = "ii";
$result = executeQuery(DBsqli(), $query, $parms, $type);



if ($result) {

    sendResponse(true,[],$result);
} else {
   
    sendResponse(false,["No products found","message"],$result);
}
