<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
Verify::public();
$conn = DBsqli();
if(!isset($_SESSION["CFpublic"]["product"]["viewProduct"])) {
    sendResponse(false, ["No any selected Product", "alert", "/cartify/user/products/"], "alert");
}

$ProductVariantsSNo = $_SESSION["CFpublic"]["product"]["viewProduct"];
$ConnectionPrepare  = $conn->prepare("SELECT 
PV.ProductSNo As ProductSNo,
PV.SNo As ProductVariantsSNo,
PL.ProductName As ProductName,
PL.Description As MainProductDescription,
PL.Brand As Brand,
PV.MRPPrice As MRPPrice,
PV.OfferPrice As OfferPrice,
PV.Stocks As Stocks,
PV.VarentTypeValue1 As VarentTypeValue1,
PV.VarentTypeValue2 As VarentTypeValue2,
PV.VarentTypeValue3 As VarentTypeValue3,
PV.VariantDescription As VariantDescription,
PV.ProductImage1 As ProductImage1,
PV.ProductImage2 As ProductImage2,
PV.ProductImage3 As ProductImage3,
PV.ProductImage4 As ProductImage4,
PV.ProductImage5 As ProductImage5,
PV.ProductImage6 As ProductImage6,
PV.ProductImage7 As ProductImage7,
PV.ProductImage8 As ProductImage8,
PV.ProductImage9 As ProductImage9,
PV.ProductImage10 As ProductImage10,
PV.DescriptionKey1 As DescriptionKey1,
PV.DescriptionValue1 As DescriptionValue1,
PV.DescriptionKey2 As DescriptionKey2,
PV.DescriptionValue2 As DescriptionValue2,
PV.DescriptionKey3 As DescriptionKey3,
PV.DescriptionValue3 As DescriptionValue3,
PV.DescriptionKey4 As DescriptionKey4,
PV.DescriptionValue4 As DescriptionValue4,
PV.DescriptionKey5 As DescriptionKey5,
PV.DescriptionValue5 As DescriptionValue5,
PV.DescriptionKey6 As DescriptionKey6,
PV.DescriptionValue6 As DescriptionValue6,
PV.DescriptionKey7 As DescriptionKey7,
PV.DescriptionValue7 As DescriptionValue7,
PV.DescriptionKey8 As DescriptionKey8,
PV.DescriptionValue8 As DescriptionValue8,
PV.DescriptionKey9 As DescriptionKey9,
PV.DescriptionValue9 As DescriptionValue9,
PV.DescriptionKey10 As DescriptionKey10,
PV.DescriptionValue10 As DescriptionValue10,
PV.DescriptionKey11 As DescriptionKey11,
PV.DescriptionValue11 As DescriptionValue11,
PV.DescriptionKey12 As DescriptionKey12,
PV.DescriptionValue12 As DescriptionValue12,
PV.DescriptionKey13 As DescriptionKey13,
PV.DescriptionValue13 As DescriptionValue13,
PV.DescriptionKey14 As DescriptionKey14,
PV.DescriptionValue14 As DescriptionValue14,
PV.DescriptionKey15 As DescriptionKey15,
PV.DescriptionValue15 As DescriptionValue15,
PV.DescriptionKey16 As DescriptionKey16,
PV.DescriptionValue16 As DescriptionValue16,
PV.DescriptionKey17 As DescriptionKey17,
PV.DescriptionValue17 As DescriptionValue17,
PV.DescriptionKey18 As DescriptionKey18,
PV.DescriptionValue18 As DescriptionValue18,
PV.DescriptionKey19 As DescriptionKey19,
PV.DescriptionValue19 As DescriptionValue19,
PV.DescriptionKey20 As DescriptionKey20,
PV.DescriptionValue20 As DescriptionValue20,
PV.DescriptionKey21 As DescriptionKey21,
PV.DescriptionValue21 As DescriptionValue21,
PV.DescriptionKey22 As DescriptionKey22,
PV.DescriptionValue22 As DescriptionValue22,
PV.DescriptionKey23 As DescriptionKey23,
PV.DescriptionValue23 As DescriptionValue23,
PV.DescriptionKey24 As DescriptionKey24,
PV.DescriptionValue24 As DescriptionValue24,
PV.DescriptionKey25 As DescriptionKey25,
PV.DescriptionValue25 As DescriptionValue25,
PV.DescriptionKey26 As DescriptionKey26,
PV.DescriptionValue26 As DescriptionValue26,
PV.DescriptionKey27 As DescriptionKey27,
PV.DescriptionValue27 As DescriptionValue27,
PV.DescriptionKey28 As DescriptionKey28,
PV.DescriptionValue28 As DescriptionValue28,
PV.DescriptionKey29 As DescriptionKey29,
PV.DescriptionValue29 As DescriptionValue29,
PV.DescriptionKey30 As DescriptionKey30,
PV.DescriptionValue30 As DescriptionValue30,
PV.DescriptionKey31 As DescriptionKey31,
PV.DescriptionValue31 As DescriptionValue31,
PV.DescriptionKey32 As DescriptionKey32,
PV.DescriptionValue32 As DescriptionValue32,
PV.DescriptionKey33 As DescriptionKey33,
PV.DescriptionValue33 As DescriptionValue33,
PV.DescriptionKey34 As DescriptionKey34,
PV.DescriptionValue34 As DescriptionValue34,
PV.DescriptionKey35 As DescriptionKey35,
PV.DescriptionValue35 As DescriptionValue35,
PV.DescriptionKey36 As DescriptionKey36,
PV.DescriptionValue36 As DescriptionValue36,
PV.DescriptionKey37 As DescriptionKey37,
PV.DescriptionValue37 As DescriptionValue37,
PV.DescriptionKey38 As DescriptionKey38,
PV.DescriptionValue38 As DescriptionValue38,
PV.DescriptionKey39 As DescriptionKey39,
PV.DescriptionValue39 As DescriptionValue39,
PV.DescriptionKey40 As DescriptionKey40,
PV.DescriptionValue40 As DescriptionValue40,
PC.MainCategory As MainCategory,
PC.Category As Category,
PC.SubCategory As SubCategory,
PL.VaritySelectionSNo1 As VaritySelectionSNo1,
PL.VaritySelectionSNo2 As VaritySelectionSNo2,
PL.VaritySelectionSNo3 As VaritySelectionSNo3,
PL.AverageRating As AverageRating,
PL.TotalRatings As TotalRatings,
PL.LocalDeliveryCharge As LocalDeliveryCharge,
PA1.MeasurementUnit As VaritySelectionName1,
PA2.MeasurementUnit As VaritySelectionName2,
PA3.MeasurementUnit As VaritySelectionName3
FROM ProductVariants PV
LEFT JOIN ProductList PL ON PV.ProductSNo = PL.SNo
LEFT JOIN ProductAttribute PA1 ON PA1.SNo = PL.VaritySelectionSNo1
LEFT JOIN ProductAttribute PA2 ON PA2.SNo = PL.VaritySelectionSNo2
LEFT JOIN ProductAttribute PA3 ON PA3.SNo = PL.VaritySelectionSNo3
LEFT JOIN ProductCategory PC ON PC.SNo = PL.CategorySNo WHERE PV.SNo = ?
");

$ProductSNo;
$ConnectionPrepare->bind_param("i", $ProductVariantsSNo);
$ConnectionPrepare->execute();
$result = $ConnectionPrepare->get_result();

if ($result->num_rows > 0) {
    $response = [
        'status' => 'success',
    ];
    while ($row = $result->fetch_assoc()) {
        $WishListIs;
        if (isset($_SESSION["CFuser"]["wishList"])) {

            if (in_array($row['ProductVariantsSNo'], $_SESSION["CFuser"]["wishList"])) {
                $WishListIs = true;
            } else {
                $WishListIs = false;
            }
        } else {
            $WishListIs = false;
        }
        $AddToCartIs;
        if (isset($_SESSION["CFuser"]["cart"])) {
            if (in_array($row['ProductVariantsSNo'], $_SESSION["CFuser"]["cart"])) {
                $AddToCartIs = true;
            } else {
                $AddToCartIs = false;
            }
        } else {
            $AddToCartIs = false;
        }


        $ProductSNo = $row['ProductSNo'];
        $response['VarientsTypes'] = [
            'type1' => $row['VaritySelectionName1'],
            'type2' => $row['VaritySelectionName2'],
            'type3' => $row['VaritySelectionName3'],
        ];
        $response['MainProduct'] = [
            'WishListIs' => $WishListIs,
            'AddToCartIs' => $AddToCartIs,

            'ProductSNo' => $row['ProductSNo'],
            'ProductVariantsSNo' => $row['ProductVariantsSNo'],
            'ProductName' => $row['ProductName'],
            'MainProductDescription' => $row['MainProductDescription'],
            'Brand' => $row['Brand'],

            'MRPPrice' => $row['MRPPrice'],
            'OfferPrice' => $row['OfferPrice'],
            'Stocks' => $row['Stocks'],

            'VarentTypeValue1' => $row['VarentTypeValue1'],
            'VarentTypeValue2' => $row['VarentTypeValue2'],
            'VarentTypeValue3' => $row['VarentTypeValue3'],
            'VariantDescription' => $row['VariantDescription'],

            'ProductImage1' => $row['ProductImage1'],
            'ProductImage2' => $row['ProductImage2'],
            'ProductImage3' => $row['ProductImage3'],
            'ProductImage4' => $row['ProductImage4'],
            'ProductImage5' => $row['ProductImage5'],
            'ProductImage6' => $row['ProductImage6'],
            'ProductImage7' => $row['ProductImage7'],
            'ProductImage8' => $row['ProductImage8'],
            'ProductImage9' => $row['ProductImage9'],
            'ProductImage10' => $row['ProductImage10'],
            'DescriptionKeyValue' => [
                [
                    'key' => $row['DescriptionKey1'],
                    'Value' => $row['DescriptionValue1'],
                ],
                [
                    'key' => $row['DescriptionKey2'],
                    'Value' => $row['DescriptionValue2'],
                ],
                [
                    'key' => $row['DescriptionKey3'],
                    'Value' => $row['DescriptionValue3'],
                ],
                [
                    'key' => $row['DescriptionKey4'],
                    'Value' => $row['DescriptionValue4'],
                ],
                [
                    'key' => $row['DescriptionKey5'],
                    'Value' => $row['DescriptionValue5'],
                ],
                [
                    'key' => $row['DescriptionKey6'],
                    'Value' => $row['DescriptionValue6'],
                ],
                [
                    'key' => $row['DescriptionKey7'],
                    'Value' => $row['DescriptionValue7'],
                ],
                [
                    'key' => $row['DescriptionKey8'],
                    'Value' => $row['DescriptionValue8'],
                ],
                [
                    'key' => $row['DescriptionKey9'],
                    'Value' => $row['DescriptionValue9'],
                ],
                [
                    'key' => $row['DescriptionKey10'],
                    'Value' => $row['DescriptionValue10'],
                ],
                [
                    'key' => $row['DescriptionKey11'],
                    'Value' => $row['DescriptionValue11'],
                ],
                [
                    'key' => $row['DescriptionKey12'],
                    'Value' => $row['DescriptionValue12'],
                ],
                [
                    'key' => $row['DescriptionKey13'],
                    'Value' => $row['DescriptionValue13'],
                ],
                [
                    'key' => $row['DescriptionKey14'],
                    'Value' => $row['DescriptionValue14'],
                ],
                [
                    'key' => $row['DescriptionKey15'],
                    'Value' => $row['DescriptionValue15'],
                ],
                [
                    'key' => $row['DescriptionKey16'],
                    'Value' => $row['DescriptionValue16'],
                ],
                [
                    'key' => $row['DescriptionKey17'],
                    'Value' => $row['DescriptionValue17'],
                ],
                [
                    'key' => $row['DescriptionKey18'],
                    'Value' => $row['DescriptionValue18'],
                ],
                [
                    'key' => $row['DescriptionKey19'],
                    'Value' => $row['DescriptionValue19'],
                ],
                [
                    'key' => $row['DescriptionKey20'],
                    'Value' => $row['DescriptionValue20'],
                ],
                [
                    'key' => $row['DescriptionKey21'],
                    'Value' => $row['DescriptionValue21'],
                ],
                [
                    'key' => $row['DescriptionKey22'],
                    'Value' => $row['DescriptionValue22'],
                ],
                [
                    'key' => $row['DescriptionKey23'],
                    'Value' => $row['DescriptionValue23'],
                ],
                [
                    'key' => $row['DescriptionKey24'],
                    'Value' => $row['DescriptionValue24'],
                ],
                [
                    'key' => $row['DescriptionKey25'],
                    'Value' => $row['DescriptionValue25'],
                ],
                [
                    'key' => $row['DescriptionKey26'],
                    'Value' => $row['DescriptionValue26'],
                ],
                [
                    'key' => $row['DescriptionKey27'],
                    'Value' => $row['DescriptionValue27'],
                ],
                [
                    'key' => $row['DescriptionKey28'],
                    'Value' => $row['DescriptionValue28'],
                ],
                [
                    'key' => $row['DescriptionKey29'],
                    'Value' => $row['DescriptionValue29'],
                ],
                [
                    'key' => $row['DescriptionKey30'],
                    'Value' => $row['DescriptionValue30'],
                ],
                [
                    'key' => $row['DescriptionKey31'],
                    'Value' => $row['DescriptionValue31'],
                ],
                [
                    'key' => $row['DescriptionKey32'],
                    'Value' => $row['DescriptionValue32'],
                ],
                [
                    'key' => $row['DescriptionKey33'],
                    'Value' => $row['DescriptionValue33'],
                ],
                [
                    'key' => $row['DescriptionKey34'],
                    'Value' => $row['DescriptionValue34'],
                ],
                [
                    'key' => $row['DescriptionKey35'],
                    'Value' => $row['DescriptionValue35'],
                ],
                [
                    'key' => $row['DescriptionKey36'],
                    'Value' => $row['DescriptionValue36'],
                ],
                [
                    'key' => $row['DescriptionKey37'],
                    'Value' => $row['DescriptionValue37'],
                ],
                [
                    'key' => $row['DescriptionKey38'],
                    'Value' => $row['DescriptionValue38'],
                ],
                [
                    'key' => $row['DescriptionKey39'],
                    'Value' => $row['DescriptionValue39'],
                ],
                [
                    'key' => $row['DescriptionKey40'],
                    'Value' => $row['DescriptionValue40'],
                ],
            ],


            'MainCategory' => $row['MainCategory'],
            'Category' => $row['Category'],
            'SubCategory' => $row['SubCategory'],

            'VaritySelectionSNo1' => $row['VaritySelectionSNo1'],
            'VaritySelectionSNo2' => $row['VaritySelectionSNo2'],
            'VaritySelectionSNo3' => $row['VaritySelectionSNo3'],

            'TotalRatings' => $row['TotalRatings'],
            'AverageRating' => $row['AverageRating'],
            'LocalDeliveryCharge' => $row['LocalDeliveryCharge'],

            'VaritySelectionName1' => $row['VaritySelectionName1'],
            'VaritySelectionName2' => $row['VaritySelectionName2'],
            'VaritySelectionName3' => $row['VaritySelectionName3'],
        ];
    }




    $ConnectionPrepare2  = $conn->prepare("SELECT 
PV.SNo As ProductVariantsSNo,
PV.VarentTypeValue1 As VarentTypeValue1,
PV.VarentTypeValue2 As VarentTypeValue2,
PV.VarentTypeValue3 As VarentTypeValue3,
PV.Stocks As Stocks
FROM ProductVariants PV
LEFT JOIN ProductList PL ON PV.ProductSNo = PL.SNo
LEFT JOIN ProductAttribute PA1 ON PA1.SNo = PL.VaritySelectionSNo1
LEFT JOIN ProductAttribute PA2 ON PA2.SNo = PL.VaritySelectionSNo2
LEFT JOIN ProductAttribute PA3 ON PA3.SNo = PL.VaritySelectionSNo3
LEFT JOIN ProductCategory PC ON PC.SNo = PL.CategorySNo WHERE PV.ProductSNo = ?
");

    $ConnectionPrepare2->bind_param("i", $ProductSNo);
    $ConnectionPrepare2->execute();
    $result2 = $ConnectionPrepare2->get_result();

    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
            if ($row["Stocks"] > 0) {
                $response['Varients'][] = [
                    'ProductVariantsSNo' => $row['ProductVariantsSNo'],
                    'VarentValue1' => $row['VarentTypeValue1'],
                    'VarentValue2' => $row['VarentTypeValue2'],
                    'VarentValue3' => $row['VarentTypeValue3'],
                    'Stocks' => true,
                ];
            } else {
                $response['Varients'][] = [
                    'ProductVariantsSNo' => $row['ProductVariantsSNo'],
                    'VarentValue1' => $row['VarentTypeValue1'],
                    'VarentValue2' => $row['VarentTypeValue2'],
                    'VarentValue3' => $row['VarentTypeValue3'],
                    'Stocks' => false,
                ];
            }
        }
    } else {
        $response['Varients'] = [];
    }
} else {
    $response[] = [];
}

sendResponse(true,[], $response);
