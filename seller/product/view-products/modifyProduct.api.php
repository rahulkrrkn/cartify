<?php
const rootDir = "../../..";
require_once rootDir . "/lib/backend.inc.php";

Verify::seller();
$sellerId = $_SESSION['CFsellerData']['SNo'];
$data = postJson();
if (empty($data)) {
    sendResponse(false,["Invalid request","alert"]);
}

if (!isset($data['productSNo']) && !isset($data['type'])) {
    sendResponse(false,["Invalid request","alert"]);
}

$productSNo = $data['productSNo'];
$type = $data['type'];

if ($type == 'delete') {
    $query = "UPDATE ProductVariants SET Status = 'Deleted' WHERE SNo = ?";
    $result = executeQuery(DBsqli(), $query, [$productSNo], "i");
    if ($result) {
        sendResponse(true,["Product deleted successfully","message"],$result);
    } else {
       
        sendResponse(false,["Failed to delete product","alert"],$result);
    }
} else if ($type == 'edit') {
    $_SESSION['CFseller']['editedProductSNo'] = $productSNo;
    if (isset($_SESSION['CFseller']['editedProductSNo'])) {
        
        sendResponse(true,["Product edited successfully","message"]);
        
    } else {
        sendResponse(false,["Failed to edit product","alert"]);
    
    }
} else if ($type == 'view') {
    $_SESSION['CFseller']['viewedProductSNo'] = $productSNo;
    if (isset($_SESSION['CFseller']['viewedProductSNo'])) {
       sendResponse(true,[]);
    } else {
       sendResponse(false,["Failed to view product","alert"]);
    }
}


sendResponse(false,["No products found","alert"]);
