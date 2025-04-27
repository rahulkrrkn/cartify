<?php
const rootDir = "../../../..";
require_once rootDir . "/lib/backend.inc.php";
$conn = DBsqli();
Verify::seller();

$data = postJson();

$response = []; // Initialize an empty array for the response

if (isset($data['GiveMeMainCategory'])) { // Check the JSON data, not $_POST
    $Sql1 = "SELECT MainCategory FROM ProductCategory GROUP BY MainCategory";
    $result = $conn->query($Sql1);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $response[] = [
                'ResponseMainCategory' => htmlspecialchars($row['MainCategory']),
            ];
        }
    } else {
        $response = [
            'message' => 'No results found.',
            'data' => []
        ];
    }
}

if (isset($data['MainCategoryIs'])) {
    $MainCategoryIs = $data['MainCategoryIs'];
    $sql2 = "SELECT  MainCategoryImg, Category FROM ProductCategory WHERE MainCategory = '{$MainCategoryIs}' GROUP BY Category";
    $result = $conn->query($sql2);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $response[] = [
                'ResponseCategory' => htmlspecialchars($row['Category']),
                'AllCategoryImgView' => htmlspecialchars($row['MainCategoryImg'])
            ];
        }
    } else {
        $response = [
            'message' => 'No results found.',
            'data' => []
        ];
    }
}
if (isset($data['CategoryIs2'])) {
    $CategoryIs = $data['CategoryIs2'];
    $MainCategoryIs = $data['MainCategoryIs2'];
    // $MainCategoryIs = "Mobile, Tablets and Accessories";
    // $CategoryIs = "Mobile Phone";
    $sql3 = "SELECT CategoryImg, SubCategory FROM ProductCategory WHERE Category = '{$CategoryIs}' AND MainCategory = '{$MainCategoryIs}' GROUP BY SubCategory";
    $result = $conn->query($sql3);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $response[] = [
                'ResponseSubCategory' => htmlspecialchars($row['SubCategory']),
                'AllCategoryImgView' => htmlspecialchars($row['CategoryImg'])
            ];
            // echo $row['SubCategory'];
        }
    } else {
        $response = [
            'message' => 'No results found.',
            'data' => []
        ];
    }
}

if (isset($data['categoryDetails'])) {
    $categoryId = $_SESSION['CFsellerData']['addProduct']['categoryId'] ?? '0';
    $sql4 = "SELECT 
        SubCategoryImg,SubCategory,MainCategory,Category,AlreadySetInDescription1,AlreadySetInDescription2,AlreadySetInDescription3,AlreadySetInDescription4,AlreadySetInDescription5,AlreadySetInDescription6,AlreadySetInDescription7,AlreadySetInDescription8,AlreadySetInDescription9,AlreadySetInDescription10,AlreadySetInDescription11,AlreadySetInDescription12,AlreadySetInDescription13,AlreadySetInDescription14,AlreadySetInDescription15,AlreadySetInDescription16,AlreadySetInDescription17,AlreadySetInDescription18,AlreadySetInDescription19,AlreadySetInDescription20,AlreadySetInDescription21,AlreadySetInDescription22,AlreadySetInDescription23,AlreadySetInDescription24,AlreadySetInDescription25,AlreadySetInDescription26,AlreadySetInDescription27,AlreadySetInDescription28,AlreadySetInDescription29,AlreadySetInDescription30,AlreadySetInDescription31,AlreadySetInDescription32,AlreadySetInDescription33,AlreadySetInDescription34,AlreadySetInDescription35,AlreadySetInDescription36,AlreadySetInDescription37,AlreadySetInDescription38,AlreadySetInDescription39,AlreadySetInDescription40,Attribute1,Attribute2,Attribute3,Attribute4,Attribute5,Attribute6,Attribute7,Attribute8,Attribute9,Attribute10,Attribute11,Attribute12,Attribute13,Attribute14,Attribute15,

        pc.SNo AS SNo,
        pa1.MeasurementUnit AS Attribute1Value,
        pa2.MeasurementUnit AS Attribute2Value,
        pa3.MeasurementUnit AS Attribute3Value,
        pa4.MeasurementUnit AS Attribute4Value,
        pa5.MeasurementUnit AS Attribute5Value,
        pa6.MeasurementUnit AS Attribute6Value,
        pa7.MeasurementUnit AS Attribute7Value,
        pa8.MeasurementUnit AS Attribute8Value,
        pa9.MeasurementUnit AS Attribute9Value,
        pa10.MeasurementUnit AS Attribute10Value,
        pa11.MeasurementUnit AS Attribute11Value,
        pa12.MeasurementUnit AS Attribute12Value,
        pa13.MeasurementUnit AS Attribute13Value,
        pa14.MeasurementUnit AS Attribute14Value,
        pa15.MeasurementUnit AS Attribute15Value,
        dd1.DescriptionData AS AlreadySetInDescription1Value,
        dd2.DescriptionData AS AlreadySetInDescription2Value,
        dd3.DescriptionData AS AlreadySetInDescription3Value,
        dd4.DescriptionData AS AlreadySetInDescription4Value,
        dd5.DescriptionData AS AlreadySetInDescription5Value,
        dd6.DescriptionData AS AlreadySetInDescription6Value,
        dd7.DescriptionData AS AlreadySetInDescription7Value,
        dd8.DescriptionData AS AlreadySetInDescription8Value,
        dd9.DescriptionData AS AlreadySetInDescription9Value,
        dd10.DescriptionData AS AlreadySetInDescription10Value,
        dd11.DescriptionData AS AlreadySetInDescription11Value,
        dd12.DescriptionData AS AlreadySetInDescription12Value,
        dd13.DescriptionData AS AlreadySetInDescription13Value,
        dd14.DescriptionData AS AlreadySetInDescription14Value,
        dd15.DescriptionData AS AlreadySetInDescription15Value,
        dd16.DescriptionData AS AlreadySetInDescription16Value,
        dd17.DescriptionData AS AlreadySetInDescription17Value,
        dd18.DescriptionData AS AlreadySetInDescription18Value,
        dd19.DescriptionData AS AlreadySetInDescription19Value,
        dd20.DescriptionData AS AlreadySetInDescription20Value,
        dd21.DescriptionData AS AlreadySetInDescription21Value,        
        dd22.DescriptionData AS AlreadySetInDescription22Value,
        dd23.DescriptionData AS AlreadySetInDescription23Value,
        dd24.DescriptionData AS AlreadySetInDescription24Value,
        dd25.DescriptionData AS AlreadySetInDescription25Value,
        dd26.DescriptionData AS AlreadySetInDescription26Value,
        dd27.DescriptionData AS AlreadySetInDescription27Value,
        dd28.DescriptionData AS AlreadySetInDescription28Value,
        dd29.DescriptionData AS AlreadySetInDescription29Value,
        dd30.DescriptionData AS AlreadySetInDescription30Value,
        dd31.DescriptionData AS AlreadySetInDescription31Value,
        dd32.DescriptionData AS AlreadySetInDescription32Value,
        dd33.DescriptionData AS AlreadySetInDescription33Value,
        dd34.DescriptionData AS AlreadySetInDescription34Value,
        dd35.DescriptionData AS AlreadySetInDescription35Value,
        dd36.DescriptionData AS AlreadySetInDescription36Value,
        dd37.DescriptionData AS AlreadySetInDescription37Value,
        dd38.DescriptionData AS AlreadySetInDescription38Value,
        dd39.DescriptionData AS AlreadySetInDescription39Value,
        dd40.DescriptionData AS AlreadySetInDescription40Value
    FROM 
        ProductCategory pc
    LEFT JOIN 
        ProductAttribute pa1 ON pc.Attribute1 = pa1.SNo
    LEFT JOIN 
        ProductAttribute pa2 ON pc.Attribute2 = pa2.SNo
    LEFT JOIN 
        ProductAttribute pa3 ON pc.Attribute3 = pa3.SNo
    LEFT JOIN 
        ProductAttribute pa4 ON pc.Attribute4 = pa4.SNo
    LEFT JOIN 
        ProductAttribute pa5 ON pc.Attribute5 = pa5.SNo
    LEFT JOIN 
        ProductAttribute pa6 ON pc.Attribute6 = pa6.SNo
    LEFT JOIN 
        ProductAttribute pa7 ON pc.Attribute7 = pa7.SNo
    LEFT JOIN 
        ProductAttribute pa8 ON pc.Attribute8 = pa8.SNo
    LEFT JOIN 
        ProductAttribute pa9 ON pc.Attribute9 = pa9.SNo
    LEFT JOIN 
        ProductAttribute pa10 ON pc.Attribute10 = pa10.SNo
    LEFT JOIN 
        ProductAttribute pa11 ON pc.Attribute11 = pa11.SNo
    LEFT JOIN 
        ProductAttribute pa12 ON pc.Attribute12 = pa12.SNo
    LEFT JOIN 
        ProductAttribute pa13 ON pc.Attribute13 = pa13.SNo
    LEFT JOIN 
        ProductAttribute pa14 ON pc.Attribute14 = pa14.SNo
    LEFT JOIN 
        ProductAttribute pa15 ON pc.Attribute15 = pa15.SNo
    LEFT JOIN
        DescriptionData dd1 ON pc.AlreadySetInDescription1 = dd1.SNo
    LEFT JOIN
        DescriptionData dd2 ON pc.AlreadySetInDescription2 = dd2.SNo
    LEFT JOIN
        DescriptionData dd3 ON pc.AlreadySetInDescription3 = dd3.SNo
    LEFT JOIN
        DescriptionData dd4 ON pc.AlreadySetInDescription4 = dd4.SNo
    LEFT JOIN
        DescriptionData dd5 ON pc.AlreadySetInDescription5 = dd5.SNo
    LEFT JOIN
        DescriptionData dd6 ON pc.AlreadySetInDescription6 = dd6.SNo
    LEFT JOIN
        DescriptionData dd7 ON pc.AlreadySetInDescription7 = dd7.SNo
    LEFT JOIN
        DescriptionData dd8 ON pc.AlreadySetInDescription8 = dd8.SNo
    LEFT JOIN
        DescriptionData dd9 ON pc.AlreadySetInDescription9 = dd9.SNo
    LEFT JOIN
        DescriptionData dd10 ON pc.AlreadySetInDescription10 = dd10.SNo
    LEFT JOIN
        DescriptionData dd11 ON pc.AlreadySetInDescription11 = dd11.SNo
    LEFT JOIN
        DescriptionData dd12 ON pc.AlreadySetInDescription12 = dd12.SNo
    LEFT JOIN
        DescriptionData dd13 ON pc.AlreadySetInDescription13 = dd13.SNo
    LEFT JOIN
        DescriptionData dd14 ON pc.AlreadySetInDescription14 = dd14.SNo
    LEFT JOIN
        DescriptionData dd15 ON pc.AlreadySetInDescription15 = dd15.SNo
    LEFT JOIN
        DescriptionData dd16 ON pc.AlreadySetInDescription16 = dd16.SNo
    LEFT JOIN
        DescriptionData dd17 ON pc.AlreadySetInDescription17 = dd17.SNo
    LEFT JOIN
        DescriptionData dd18 ON pc.AlreadySetInDescription18 = dd18.SNo
    LEFT JOIN
        DescriptionData dd19 ON pc.AlreadySetInDescription19 = dd19.SNo
    LEFT JOIN
        DescriptionData dd20 ON pc.AlreadySetInDescription20 = dd20.SNo
    LEFT JOIN
        DescriptionData dd21 ON pc.AlreadySetInDescription21 = dd21.SNo
    LEFT JOIN
        DescriptionData dd22 ON pc.AlreadySetInDescription22 = dd22.SNo
    LEFT JOIN
        DescriptionData dd23 ON pc.AlreadySetInDescription23 = dd23.SNo
    LEFT JOIN
        DescriptionData dd24 ON pc.AlreadySetInDescription24 = dd24.SNo
    LEFT JOIN
        DescriptionData dd25 ON pc.AlreadySetInDescription25 = dd25.SNo
    LEFT JOIN
        DescriptionData dd26 ON pc.AlreadySetInDescription26 = dd26.SNo
    LEFT JOIN
        DescriptionData dd27 ON pc.AlreadySetInDescription27 = dd27.SNo
    LEFT JOIN
        DescriptionData dd28 ON pc.AlreadySetInDescription28 = dd28.SNo
    LEFT JOIN
        DescriptionData dd29 ON pc.AlreadySetInDescription29 = dd29.SNo
    LEFT JOIN
        DescriptionData dd30 ON pc.AlreadySetInDescription30 = dd30.SNo
    LEFT JOIN
        DescriptionData dd31 ON pc.AlreadySetInDescription31 = dd31.SNo
    LEFT JOIN
        DescriptionData dd32 ON pc.AlreadySetInDescription32 = dd32.SNo
    LEFT JOIN
        DescriptionData dd33 ON pc.AlreadySetInDescription33 = dd33.SNo
    LEFT JOIN
        DescriptionData dd34 ON pc.AlreadySetInDescription34 = dd34.SNo
    LEFT JOIN
        DescriptionData dd35 ON pc.AlreadySetInDescription35 = dd35.SNo
    LEFT JOIN
        DescriptionData dd36 ON pc.AlreadySetInDescription36 = dd36.SNo
    LEFT JOIN
        DescriptionData dd37 ON pc.AlreadySetInDescription37 = dd37.SNo
    LEFT JOIN
        DescriptionData dd38 ON pc.AlreadySetInDescription38 = dd38.SNo
    LEFT JOIN
        DescriptionData dd39 ON pc.AlreadySetInDescription39 = dd39.SNo
    LEFT JOIN
        DescriptionData dd40 ON pc.AlreadySetInDescription40 = dd40.SNo
    WHERE 
        pc.SNo = '{$categoryId}'
";
    $result = $conn->query($sql4);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            // echo $row['SubCategory'];
            $response[] = [
                'DBAllCategorySNo' => htmlspecialchars($row['SNo']),
                'DBMainCategoryName' => htmlspecialchars($row['MainCategory']),
                'DBCategoryName' => htmlspecialchars($row['Category']),
                'DBSubCategoryName' => htmlspecialchars($row['SubCategory']),

                'DBCSubCategoryImg' => htmlspecialchars($row['SubCategoryImg']),
                'DBDescription' => [
                    'AlreadySetInDescription1' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription1']), 'Value' => htmlspecialchars($row['AlreadySetInDescription1Value'])],
                    'AlreadySetInDescription2' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription2']), 'Value' => htmlspecialchars($row['AlreadySetInDescription2Value'])],
                    'AlreadySetInDescription3' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription3']), 'Value' => htmlspecialchars($row['AlreadySetInDescription3Value'])],
                    'AlreadySetInDescription4' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription4']), 'Value' => htmlspecialchars($row['AlreadySetInDescription4Value'])],
                    'AlreadySetInDescription5' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription5']), 'Value' => htmlspecialchars($row['AlreadySetInDescription5Value'])],
                    'AlreadySetInDescription6' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription6']), 'Value' => htmlspecialchars($row['AlreadySetInDescription6Value'])],
                    'AlreadySetInDescription7' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription7']), 'Value' => htmlspecialchars($row['AlreadySetInDescription7Value'])],
                    'AlreadySetInDescription8' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription8']), 'Value' => htmlspecialchars($row['AlreadySetInDescription8Value'])],
                    'AlreadySetInDescription9' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription9']), 'Value' => htmlspecialchars($row['AlreadySetInDescription9Value'])],
                    'AlreadySetInDescription10' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription10']), 'Value' => htmlspecialchars($row['AlreadySetInDescription10Value'])],
                    'AlreadySetInDescription11' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription11']), 'Value' => htmlspecialchars($row['AlreadySetInDescription11Value'])],
                    'AlreadySetInDescription12' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription12']), 'Value' => htmlspecialchars($row['AlreadySetInDescription12Value'])],
                    'AlreadySetInDescription13' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription13']), 'Value' => htmlspecialchars($row['AlreadySetInDescription13Value'])],
                    'AlreadySetInDescription14' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription14']), 'Value' => htmlspecialchars($row['AlreadySetInDescription14Value'])],
                    'AlreadySetInDescription15' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription15']), 'Value' => htmlspecialchars($row['AlreadySetInDescription15Value'])],
                    'AlreadySetInDescription16' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription16']), 'Value' => htmlspecialchars($row['AlreadySetInDescription16Value'])],
                    'AlreadySetInDescription17' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription17']), 'Value' => htmlspecialchars($row['AlreadySetInDescription17Value'])],
                    'AlreadySetInDescription18' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription18']), 'Value' => htmlspecialchars($row['AlreadySetInDescription18Value'])],
                    'AlreadySetInDescription19' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription19']), 'Value' => htmlspecialchars($row['AlreadySetInDescription19Value'])],
                    'AlreadySetInDescription20' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription20']), 'Value' => htmlspecialchars($row['AlreadySetInDescription20Value'])],
                    'AlreadySetInDescription21' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription21']), 'Value' => htmlspecialchars($row['AlreadySetInDescription21Value'])],
                    'AlreadySetInDescription22' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription22']), 'Value' => htmlspecialchars($row['AlreadySetInDescription22Value'])],
                    'AlreadySetInDescription23' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription23']), 'Value' => htmlspecialchars($row['AlreadySetInDescription23Value'])],
                    'AlreadySetInDescription24' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription24']), 'Value' => htmlspecialchars($row['AlreadySetInDescription24Value'])],
                    'AlreadySetInDescription25' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription25']), 'Value' => htmlspecialchars($row['AlreadySetInDescription25Value'])],
                    'AlreadySetInDescription26' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription26']), 'Value' => htmlspecialchars($row['AlreadySetInDescription26Value'])],
                    'AlreadySetInDescription27' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription27']), 'Value' => htmlspecialchars($row['AlreadySetInDescription27Value'])],
                    'AlreadySetInDescription28' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription28']), 'Value' => htmlspecialchars($row['AlreadySetInDescription28Value'])],
                    'AlreadySetInDescription29' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription29']), 'Value' => htmlspecialchars($row['AlreadySetInDescription29Value'])],
                    'AlreadySetInDescription30' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription30']), 'Value' => htmlspecialchars($row['AlreadySetInDescription30Value'])],

                    'AlreadySetInDescription31' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription31']), 'Value' => htmlspecialchars($row['AlreadySetInDescription31Value'])],
                    'AlreadySetInDescription32' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription32']), 'Value' => htmlspecialchars($row['AlreadySetInDescription32Value'])],
                    'AlreadySetInDescription33' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription33']), 'Value' => htmlspecialchars($row['AlreadySetInDescription33Value'])],
                    'AlreadySetInDescription34' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription34']), 'Value' => htmlspecialchars($row['AlreadySetInDescription34Value'])],
                    'AlreadySetInDescription35' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription35']), 'Value' => htmlspecialchars($row['AlreadySetInDescription35Value'])],
                    'AlreadySetInDescription36' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription36']), 'Value' => htmlspecialchars($row['AlreadySetInDescription36Value'])],
                    'AlreadySetInDescription37' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription37']), 'Value' => htmlspecialchars($row['AlreadySetInDescription37Value'])],
                    'AlreadySetInDescription38' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription38']), 'Value' => htmlspecialchars($row['AlreadySetInDescription38Value'])],
                    'AlreadySetInDescription39' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription39']), 'Value' => htmlspecialchars($row['AlreadySetInDescription39Value'])],
                    'AlreadySetInDescription40' => ['SNo' => htmlspecialchars($row['AlreadySetInDescription40']), 'Value' => htmlspecialchars($row['AlreadySetInDescription40Value'])],

                ],

                'DBAttribute' => [
                    'Attribute1' => ['SNo' => htmlspecialchars($row['Attribute1']), 'Value' => htmlspecialchars($row['Attribute1Value'])],
                    'Attribute2' => ['SNo' => htmlspecialchars($row['Attribute2']), 'Value' => htmlspecialchars($row['Attribute2Value'])],
                    'Attribute3' => ['SNo' => htmlspecialchars($row['Attribute3']), 'Value' => htmlspecialchars($row['Attribute3Value'])],
                    'Attribute4' => ['SNo' => htmlspecialchars($row['Attribute4']), 'Value' => htmlspecialchars($row['Attribute4Value'])],
                    'Attribute5' => ['SNo' => htmlspecialchars($row['Attribute5']), 'Value' => htmlspecialchars($row['Attribute5Value'])],
                    'Attribute6' => ['SNo' => htmlspecialchars($row['Attribute6']), 'Value' => htmlspecialchars($row['Attribute6Value'])],
                    'Attribute7' => ['SNo' => htmlspecialchars($row['Attribute7']), 'Value' => htmlspecialchars($row['Attribute7Value'])],
                    'Attribute8' => ['SNo' => htmlspecialchars($row['Attribute8']), 'Value' => htmlspecialchars($row['Attribute8Value'])],
                    'Attribute9' => ['SNo' => htmlspecialchars($row['Attribute9']), 'Value' => htmlspecialchars($row['Attribute9Value'])],
                    'Attribute10' => ['SNo' => htmlspecialchars($row['Attribute10']), 'Value' => htmlspecialchars($row['Attribute10Value'])],
                    'Attribute11' => ['SNo' => htmlspecialchars($row['Attribute11']), 'Value' => htmlspecialchars($row['Attribute11Value'])],
                    'Attribute12' => ['SNo' => htmlspecialchars($row['Attribute12']), 'Value' => htmlspecialchars($row['Attribute12Value'])],
                    'Attribute13' => ['SNo' => htmlspecialchars($row['Attribute13']), 'Value' => htmlspecialchars($row['Attribute13Value'])],
                    'Attribute14' => ['SNo' => htmlspecialchars($row['Attribute14']), 'Value' => htmlspecialchars($row['Attribute14Value'])],
                    'Attribute15' => ['SNo' => htmlspecialchars($row['Attribute15']), 'Value' => htmlspecialchars($row['Attribute15Value'])],

                ]

            ];
        };
    } else {
        $response = [
            'message' => 'No results found.',
            'data' => []
        ];
    }
}




if (isset($data['AllCollectedData'])) {
    $AllCollectedData = $data['AllCollectedData'];

    $UserSNo = $_SESSION["CFuserData"]["SNo"];
    $AllCotegorySNo = $AllCollectedData['SelectedAllCategorySNo'];
    $ProductName = $AllCollectedData['MainProductName'];
    $ProductDescription = $AllCollectedData['MainProductDescription'];
    $Brand = $AllCollectedData['Brand'];
    $DispatchIn = $AllCollectedData['DispachIn'];
    $Keywords = $AllCollectedData['Keywords'];

    if ($AllCollectedData['VaritySelection1'] == "No") {
        $VaritySelection1 = null;
    } else {
        $VaritySelection1 = $AllCollectedData['VaritySelection1'];
    }

    if ($AllCollectedData['VaritySelection2'] == "No") {
        $VaritySelection2 = null;
    } else {
        $VaritySelection2 = $AllCollectedData['VaritySelection2'];
    }
    if ($AllCollectedData['VaritySelection3'] == "No") {
        $VaritySelection3 = null;
    } else {
        $VaritySelection3 = $AllCollectedData['VaritySelection3'];
    }



    $LocalDelivery = $AllCollectedData['LocalDelivery'];
    $LocalDeliveryCharge = $AllCollectedData['LocalDeliveryCharge'];
    $ZonalDelivery = $AllCollectedData['ZonalDelivery'];
    $ZonalDeliveryCharge = $AllCollectedData['ZonalDeliveryCharge'];
    $NationalDelivery = $AllCollectedData['NationalDelivery'];
    $NationalDeliveryCharge = $AllCollectedData['NationalDeliveryCharge'];
    $ListOnUniversal = $AllCollectedData['ListOnUniversal'];
    $ListOnLocal = $AllCollectedData['ListOnLocal'];
    $COD = $AllCollectedData['COD'];
    $UPI = $AllCollectedData['UPI'];
    $PickupFromStore = $AllCollectedData['PickupFromStore'];
    $DescriptionKey1 = $AllCollectedData['Description1']['Key'];
    $DescriptionValue1 = $AllCollectedData['Description1']['Value'];
    $DescriptionKey2 = $AllCollectedData['Description2']['Key'];
    $DescriptionValue2 = $AllCollectedData['Description2']['Value'];
    $DescriptionKey3 = $AllCollectedData['Description3']['Key'];
    $DescriptionValue3 = $AllCollectedData['Description3']['Value'];
    $DescriptionKey4 = $AllCollectedData['Description4']['Key'];
    $DescriptionValue4 = $AllCollectedData['Description4']['Value'];
    $DescriptionKey5 = $AllCollectedData['Description5']['Key'];
    $DescriptionValue5 = $AllCollectedData['Description5']['Value'];
    $DescriptionKey6 = $AllCollectedData['Description6']['Key'];
    $DescriptionValue6 = $AllCollectedData['Description6']['Value'];
    $DescriptionKey7 = $AllCollectedData['Description7']['Key'];
    $DescriptionValue7 = $AllCollectedData['Description7']['Value'];
    $DescriptionKey8 = $AllCollectedData['Description8']['Key'];
    $DescriptionValue8 = $AllCollectedData['Description8']['Value'];
    $DescriptionKey9 = $AllCollectedData['Description9']['Key'];
    $DescriptionValue9 = $AllCollectedData['Description9']['Value'];
    $DescriptionKey10 = $AllCollectedData['Description10']['Key'];
    $DescriptionValue10 = $AllCollectedData['Description10']['Value'];
    $DescriptionKey11 = $AllCollectedData['Description11']['Key'];
    $DescriptionValue11 = $AllCollectedData['Description11']['Value'];
    $DescriptionKey12 = $AllCollectedData['Description12']['Key'];
    $DescriptionValue12 = $AllCollectedData['Description12']['Value'];
    $DescriptionKey13 = $AllCollectedData['Description13']['Key'];
    $DescriptionValue13 = $AllCollectedData['Description13']['Value'];
    $DescriptionKey14 = $AllCollectedData['Description14']['Key'];
    $DescriptionValue14 = $AllCollectedData['Description14']['Value'];
    $DescriptionKey15 = $AllCollectedData['Description15']['Key'];
    $DescriptionValue15 = $AllCollectedData['Description15']['Value'];
    $DescriptionKey16 = $AllCollectedData['Description16']['Key'];
    $DescriptionValue16 = $AllCollectedData['Description16']['Value'];
    $DescriptionKey17 = $AllCollectedData['Description17']['Key'];
    $DescriptionValue17 = $AllCollectedData['Description17']['Value'];
    $DescriptionKey18 = $AllCollectedData['Description18']['Key'];
    $DescriptionValue18 = $AllCollectedData['Description18']['Value'];
    $DescriptionKey19 = $AllCollectedData['Description19']['Key'];
    $DescriptionValue19 = $AllCollectedData['Description19']['Value'];
    $DescriptionKey20 = $AllCollectedData['Description20']['Key'];
    $DescriptionValue20 = $AllCollectedData['Description20']['Value'];
    $DescriptionKey21 = $AllCollectedData['Description21']['Key'];
    $DescriptionValue21 = $AllCollectedData['Description21']['Value'];
    $DescriptionKey22 = $AllCollectedData['Description22']['Key'];
    $DescriptionValue22 = $AllCollectedData['Description22']['Value'];
    $DescriptionKey23 = $AllCollectedData['Description23']['Key'];
    $DescriptionValue23 = $AllCollectedData['Description23']['Value'];
    $DescriptionKey24 = $AllCollectedData['Description24']['Key'];
    $DescriptionValue24 = $AllCollectedData['Description24']['Value'];
    $DescriptionKey25 = $AllCollectedData['Description25']['Key'];
    $DescriptionValue25 = $AllCollectedData['Description25']['Value'];
    $DescriptionKey26 = $AllCollectedData['Description26']['Key'];
    $DescriptionValue26 = $AllCollectedData['Description26']['Value'];
    $DescriptionKey27 = $AllCollectedData['Description27']['Key'];
    $DescriptionValue27 = $AllCollectedData['Description27']['Value'];
    $DescriptionKey28 = $AllCollectedData['Description28']['Key'];
    $DescriptionValue28 = $AllCollectedData['Description28']['Value'];
    $DescriptionKey29 = $AllCollectedData['Description29']['Key'];
    $DescriptionValue29 = $AllCollectedData['Description29']['Value'];
    $DescriptionKey30 = $AllCollectedData['Description30']['Key'];
    $DescriptionValue30 = $AllCollectedData['Description30']['Value'];
    $DescriptionKey31 = $AllCollectedData['Description31']['Key'];
    $DescriptionValue31 = $AllCollectedData['Description31']['Value'];
    $DescriptionKey32 = $AllCollectedData['Description32']['Key'];
    $DescriptionValue32 = $AllCollectedData['Description32']['Value'];
    $DescriptionKey33 = $AllCollectedData['Description33']['Key'];
    $DescriptionValue33 = $AllCollectedData['Description33']['Value'];
    $DescriptionKey34 = $AllCollectedData['Description34']['Key'];
    $DescriptionValue34 = $AllCollectedData['Description34']['Value'];
    $DescriptionKey35 = $AllCollectedData['Description35']['Key'];
    $DescriptionValue35 = $AllCollectedData['Description35']['Value'];
    $DescriptionKey36 = $AllCollectedData['Description36']['Key'];
    $DescriptionValue36 = $AllCollectedData['Description36']['Value'];
    $DescriptionKey37 = $AllCollectedData['Description37']['Key'];
    $DescriptionValue37 = $AllCollectedData['Description37']['Value'];
    $DescriptionKey38 = $AllCollectedData['Description38']['Key'];
    $DescriptionValue38 = $AllCollectedData['Description38']['Value'];
    $DescriptionKey39 = $AllCollectedData['Description39']['Key'];
    $DescriptionValue39 = $AllCollectedData['Description39']['Value'];
    $DescriptionKey40 = $AllCollectedData['Description40']['Key'];
    $DescriptionValue40 = $AllCollectedData['Description40']['Value'];


    $stmt = $conn->prepare("INSERT INTO ProductList (UserSNo, CategorySNo, VaritySelectionSNo1,  VaritySelectionSNo2, VaritySelectionSNo3,  ProductName, Description, Brand, Keywords,  DispatchIn, SellOnLocalShop, SellOnUniversal, LocalDelivery, LocalDeliveryCharge, ZonalDelivery, ZonalDeliveryCharge, NationalDelivery, NationalDeliveryCharge) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param(
        "iiiiissssisssisisi",
        $UserSNo,
        $AllCotegorySNo,
        $VaritySelection1,
        $VaritySelection2,
        $VaritySelection3,
        $ProductName,
        $ProductDescription,
        $Brand,
        $Keywords,
        $DispatchIn,
        $ListOnLocal,
        $ListOnUniversal,
        $LocalDelivery,
        $LocalDeliveryCharge,
        $ZonalDelivery,
        $ZonalDeliveryCharge,
        $NationalDelivery,
        $NationalDeliveryCharge
    );

    $stmt->execute();
    $insertedSNo = $conn->insert_id;
    $stmt->close();
    $_SESSION['CFsellerData']['addProduct']['productSNo'] = $insertedSNo;

    $stmt = $conn->prepare("INSERT INTO ProductVariants (ProductSNo,DescriptionKey1, DescriptionValue1, DescriptionKey2, DescriptionValue2, DescriptionKey3, DescriptionValue3, DescriptionKey4, DescriptionValue4, DescriptionKey5, DescriptionValue5, DescriptionKey6, DescriptionValue6, DescriptionKey7, DescriptionValue7, DescriptionKey8, DescriptionValue8, DescriptionKey9, DescriptionValue9, DescriptionKey10, DescriptionValue10, DescriptionKey11, DescriptionValue11, DescriptionKey12, DescriptionValue12, DescriptionKey13, DescriptionValue13, DescriptionKey14, DescriptionValue14, DescriptionKey15, DescriptionValue15, DescriptionKey16, DescriptionValue16, DescriptionKey17, DescriptionValue17, DescriptionKey18, DescriptionValue18, DescriptionKey19, DescriptionValue19, DescriptionKey20, DescriptionValue20, DescriptionKey21, DescriptionValue21, DescriptionKey22, DescriptionValue22, DescriptionKey23, DescriptionValue23, DescriptionKey24, DescriptionValue24, DescriptionKey25, DescriptionValue25, DescriptionKey26, DescriptionValue26, DescriptionKey27, DescriptionValue27, DescriptionKey28, DescriptionValue28, DescriptionKey29, DescriptionValue29, DescriptionKey30, DescriptionValue30, DescriptionKey31, DescriptionValue31, DescriptionKey32, DescriptionValue32, DescriptionKey33, DescriptionValue33, DescriptionKey34, DescriptionValue34, DescriptionKey35, DescriptionValue35, DescriptionKey36, DescriptionValue36, DescriptionKey37, DescriptionValue37, DescriptionKey38, DescriptionValue38, DescriptionKey39, DescriptionValue39, DescriptionKey40, DescriptionValue40) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param(
        "issssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
        $insertedSNo,
        $DescriptionKey1,
        $DescriptionValue1,
        $DescriptionKey2,
        $DescriptionValue2,
        $DescriptionKey3,
        $DescriptionValue3,
        $DescriptionKey4,
        $DescriptionValue4,
        $DescriptionKey5,
        $DescriptionValue5,
        $DescriptionKey6,
        $DescriptionValue6,
        $DescriptionKey7,
        $DescriptionValue7,
        $DescriptionKey8,
        $DescriptionValue8,
        $DescriptionKey9,
        $DescriptionValue9,
        $DescriptionKey10,
        $DescriptionValue10,
        $DescriptionKey11,
        $DescriptionValue11,
        $DescriptionKey12,
        $DescriptionValue12,
        $DescriptionKey13,
        $DescriptionValue13,
        $DescriptionKey14,
        $DescriptionValue14,
        $DescriptionKey15,
        $DescriptionValue15,
        $DescriptionKey16,
        $DescriptionValue16,
        $DescriptionKey17,
        $DescriptionValue17,
        $DescriptionKey18,
        $DescriptionValue18,
        $DescriptionKey19,
        $DescriptionValue19,
        $DescriptionKey20,
        $DescriptionValue20,
        $DescriptionKey21,
        $DescriptionValue21,
        $DescriptionKey22,
        $DescriptionValue22,
        $DescriptionKey23,
        $DescriptionValue23,
        $DescriptionKey24,
        $DescriptionValue24,
        $DescriptionKey25,
        $DescriptionValue25,
        $DescriptionKey26,
        $DescriptionValue26,
        $DescriptionKey27,
        $DescriptionValue27,
        $DescriptionKey28,
        $DescriptionValue28,
        $DescriptionKey29,
        $DescriptionValue29,
        $DescriptionKey30,
        $DescriptionValue30,
        $DescriptionKey31,
        $DescriptionValue31,
        $DescriptionKey32,
        $DescriptionValue32,
        $DescriptionKey33,
        $DescriptionValue33,
        $DescriptionKey34,
        $DescriptionValue34,
        $DescriptionKey35,
        $DescriptionValue35,
        $DescriptionKey36,
        $DescriptionValue36,
        $DescriptionKey37,
        $DescriptionValue37,
        $DescriptionKey38,
        $DescriptionValue38,
        $DescriptionKey39,
        $DescriptionValue39,
        $DescriptionKey40,
        $DescriptionValue40
    );
    $stmt->execute();
    $insertedVaritySNo = $conn->insert_id;
    $response = [
        'status' => 'Success',
        'Inserted S No is ' => $insertedSNo,
        'Inserted Varity S No is ' => $insertedVaritySNo,
    ];
} else {
}






sendResponse(true, ['Data loded successfully'], $response);

$conn->close();
