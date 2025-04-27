<?php
const rootDir = "../..";
require_once rootDir . "/lib/backend.inc.php";
$data = postJson();
$search = $data["search"];


$query = "SELECT VarentTypeValue1,VarentTypeValue2,VarentTypeValue3,ProductImage1,ProductName,PV.SNo FROM ProductVariants PV 
LEFT JOIN ProductList PL ON PV.ProductSNo = PL.SNo
WHERE PL.ProductName LIKE ? 
   OR PL.Keywords LIKE ? 
   OR PL.Brand LIKE ? 
   OR PL.Description LIKE ?
ORDER BY 
    CASE 
        WHEN PL.ProductName LIKE ? THEN 1
        WHEN PL.Keywords LIKE ? THEN 2
        WHEN PL.Brand LIKE ? THEN 3
        WHEN PL.Description LIKE ? THEN 4
    END
LIMIT 10";

$params = [
    "%$search%",
    "%$search%",
    "%$search%",
    "%$search%",
    "%$search%",
    "%$search%",
    "%$search%",
    "%$search%"
];

$result = executeQuery(DBsqli(), $query, $params, "ssssssss");
$resultData =[];
if ($result) {
    $resultData["product"] = $result;

}else{
    $resultData["product"] = [];

}
$query2 = "SELECT SubCategory,SNo FROM ProductCategory WHERE MainCategory LIKE ? OR Category LIKE ? OR SubCategory LIKE ? LIMIT 5";
$params2 = ["%$search%", "%$search%", "%$search%"];
$result2 = executeQuery(DBsqli(), $query2, $params2, "sss");
if ($result2) {
    $resultData["category"] = $result2;

}else{
    $resultData["category"] = [];

}

sendResponse(true, [], $resultData );


// prd($data);
pr($result2);
pr($result);
