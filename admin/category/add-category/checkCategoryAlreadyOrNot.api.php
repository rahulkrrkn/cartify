<?php
const rootDir = "../../..";
require_once rootDir . "/lib/backend.inc.php";
$data = postJson();

$response = []; // Initialize an empty array for the response

if (isset($data['LoadMainCategory'])) {
    $Sql1 = "SELECT MainCategory AS ResponseAllCategory, MainCategoryImg AS AllCategoryImgView FROM ProductCategory GROUP BY MainCategory";
    $result1 = executeQuery(DBsqli(), $Sql1);
    if (!empty($result1)) {
        $response = $result1;
    }
}
if (isset($data['LoadCategory'])) {
    $Sql3 = "SELECT Category AS ResponseAllCategory, MainCategoryImg AS AllCategoryImgView FROM ProductCategory WHERE MainCategory = '{$data["MainCategoryValue"]}' GROUP BY Category";
    // $result2 = executeQuery(DBsqli(), $Sql2, $data["MainCategoryValue"], "s");
    $result3 = executeQuery(DBsqli(), $Sql3);
    if (!empty($result3)) {
        $response = $result3;
    }
}


if (isset($data['LoadSubCategory'])) {
    $Sql2 = "SELECT SubCategory AS ResponseAllCategory, CategoryImg AS AllCategoryImgView FROM ProductCategory WHERE Category = '{$data["CategoryValue"]}' GROUP BY SubCategory";

    $result2 = executeQuery(DBsqli(), $Sql2,);
    // $result2 = executeQuery(DBsqli(), $Sql2, $data["CategoryValue"], "s");
    if (!empty($result2)) {
        $response = $result2;
    }
}


if (isset($data['LoadSubCategoryImageView'])) {
    $Sql4 = "SELECT 
        pc.SubCategoryImg AS AllCategoryImgView,
        pa1.MeasurementUnit AS Attribute1,
        pa2.MeasurementUnit AS Attribute2,
        pa3.MeasurementUnit AS Attribute3,
        pa4.MeasurementUnit AS Attribute4,
        pa5.MeasurementUnit AS Attribute5,
        pa6.MeasurementUnit AS Attribute6,
        pa7.MeasurementUnit AS Attribute7,
        pa8.MeasurementUnit AS Attribute8,
        pa9.MeasurementUnit AS Attribute9,
        pa10.MeasurementUnit AS Attribute10,
        pa11.MeasurementUnit AS Attribute11,
        pa12.MeasurementUnit AS Attribute12,
        pa13.MeasurementUnit AS Attribute13,
        pa14.MeasurementUnit AS Attribute14,
        pa15.MeasurementUnit AS Attribute15
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
    WHERE 
        pc.MainCategory = '{$data['MainCategoryValue']}'
        AND pc.Category = '{$data['CategoryValue']}'
        AND pc.SubCategory = '{$data['SubCategoryValue']}'";
    $result4 = executeQuery(DBsqli(), $Sql4);
    if (!empty($result4)) {
        $response = $result4;
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
