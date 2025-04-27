<?php
const rootDir = "../../../..";
require_once rootDir . "/lib/backend.inc.php";
$conn = DBsqli();
Verify::seller();

$WorkingOn = $_SESSION['CFsellerData']['addProduct']['productSNo'];
// Retrieve the form data
$ProductSNo = $_POST['ProductSNo'];
$ProductName = $_POST['ProductName'];
$ProductMRP = $_POST['ProductMRP'];
$ProductOfferPrice = $_POST['ProductOfferPrice'];
$AvailableStock = $_POST['AvailableStock'];
$VarityValue1 = $_POST['VarityValue1'];
$VarityValue2 = $_POST['VarityValue2'];
$VarityValue3 = $_POST['VarityValue3'];
$VarityValue1 = isset($_POST['VarityValue1']) && !empty($_POST['VarityValue1']) ? $_POST['VarityValue1'] : NULL;
$VarityValue2 = isset($_POST['VarityValue2']) && !empty($_POST['VarityValue2']) ? $_POST['VarityValue2'] : NULL;
$VarityValue3 = isset($_POST['VarityValue3']) && !empty($_POST['VarityValue3']) ? $_POST['VarityValue3'] : NULL;
$VaritySelectionName1 = $_POST['VaritySelectionName1'] && !empty($_POST['VaritySelectionName1']) ? $_POST['VaritySelectionName1'] : NULL;
$VaritySelectionName2 = $_POST['VaritySelectionName2'] && !empty($_POST['VaritySelectionName2']) ? $_POST['VaritySelectionName2'] : NULL;
$VaritySelectionName3 = $_POST['VaritySelectionName3'] && !empty($_POST['VaritySelectionName3']) ? $_POST['VaritySelectionName3'] : NULL;
$ProductOldImages1 = $_POST['ProductOldImages1'];
$ProductOldImages2 = $_POST['ProductOldImages2'];
$ProductOldImages3 = $_POST['ProductOldImages3'];
$ProductOldImages4 = $_POST['ProductOldImages4'];
$ProductOldImages5 = $_POST['ProductOldImages5'];
$ProductOldImages6 = $_POST['ProductOldImages6'];
$ProductOldImages7 = $_POST['ProductOldImages7'];
$ProductOldImages8 = $_POST['ProductOldImages8'];
$ProductOldImages9 = $_POST['ProductOldImages9'];
$ProductOldImages10 = $_POST['ProductOldImages10'];


$ProductCollectedDescription = $_POST['ProductCollectedDescription'];
$ProductFD1 = $_POST['TotalFD1'] == "null" ? NULL : $_POST['TotalFD1'];
$ProductFD2 = $_POST['TotalFD2'] == "null" ? NULL : $_POST['TotalFD2'];
$ProductFD3 = $_POST['TotalFD3'] == "null" ? NULL : $_POST['TotalFD3'];
$ProductFD4 = $_POST['TotalFD4'] == "null" ? NULL : $_POST['TotalFD4'];
$ProductFD5 = $_POST['TotalFD5'] == "null" ? NULL : $_POST['TotalFD5'];
$ProductFD6 = $_POST['TotalFD6'] == "null" ? NULL : $_POST['TotalFD6'];
$ProductFD7 = $_POST['TotalFD7'] == "null" ? NULL : $_POST['TotalFD7'];
$ProductFD8 = $_POST['TotalFD8'] == "null" ? NULL : $_POST['TotalFD8'];
$ProductFD9 = $_POST['TotalFD9'] == "null" ? NULL : $_POST['TotalFD9'];
$ProductFD10 = $_POST['TotalFD10'] == "null" ? NULL : $_POST['TotalFD10'];
$ProductFD11 = $_POST['TotalFD11'] == "null" ? NULL : $_POST['TotalFD11'];
$ProductFD12 = $_POST['TotalFD12'] == "null" ? NULL : $_POST['TotalFD12'];
$ProductFD13 = $_POST['TotalFD13'] == "null" ? NULL : $_POST['TotalFD13'];
$ProductFD14 = $_POST['TotalFD14'] == "null" ? NULL : $_POST['TotalFD14'];
$ProductFD15 = $_POST['TotalFD15'] == "null" ? NULL : $_POST['TotalFD15'];
$ProductFD16 = $_POST['TotalFD16'] == "null" ? NULL : $_POST['TotalFD16'];
$ProductFD17 = $_POST['TotalFD17'] == "null" ? NULL : $_POST['TotalFD17'];
$ProductFD18 = $_POST['TotalFD18'] == "null" ? NULL : $_POST['TotalFD18'];
$ProductFD19 = $_POST['TotalFD19'] == "null" ? NULL : $_POST['TotalFD19'];
$ProductFD20 = $_POST['TotalFD20'] == "null" ? NULL : $_POST['TotalFD20'];
$ProductFD21 = $_POST['TotalFD21'] == "null" ? NULL : $_POST['TotalFD21'];
$ProductFD22 = $_POST['TotalFD22'] == "null" ? NULL : $_POST['TotalFD22'];
$ProductFD23 = $_POST['TotalFD23'] == "null" ? NULL : $_POST['TotalFD23'];
$ProductFD24 = $_POST['TotalFD24'] == "null" ? NULL : $_POST['TotalFD24'];
$ProductFD25 = $_POST['TotalFD25'] == "null" ? NULL : $_POST['TotalFD25'];
$ProductFD26 = $_POST['TotalFD26'] == "null" ? NULL : $_POST['TotalFD26'];
$ProductFD27 = $_POST['TotalFD27'] == "null" ? NULL : $_POST['TotalFD27'];
$ProductFD28 = $_POST['TotalFD28'] == "null" ? NULL : $_POST['TotalFD28'];
$ProductFD29 = $_POST['TotalFD29'] == "null" ? NULL : $_POST['TotalFD29'];
$ProductFD30 = $_POST['TotalFD30'] == "null" ? NULL : $_POST['TotalFD30'];
$ProductFD31 = $_POST['TotalFD31'] == "null" ? NULL : $_POST['TotalFD31'];
$ProductFD32 = $_POST['TotalFD32'] == "null" ? NULL : $_POST['TotalFD32'];
$ProductFD33 = $_POST['TotalFD33'] == "null" ? NULL : $_POST['TotalFD33'];
$ProductFD34 = $_POST['TotalFD34'] == "null" ? NULL : $_POST['TotalFD34'];
$ProductFD35 = $_POST['TotalFD35'] == "null" ? NULL : $_POST['TotalFD35'];
$ProductFD36 = $_POST['TotalFD36'] == "null" ? NULL : $_POST['TotalFD36'];
$ProductFD37 = $_POST['TotalFD37'] == "null" ? NULL : $_POST['TotalFD37'];
$ProductFD38 = $_POST['TotalFD38'] == "null" ? NULL : $_POST['TotalFD38'];
$ProductFD39 = $_POST['TotalFD39'] == "null" ? NULL : $_POST['TotalFD39'];
$ProductFD40 = $_POST['TotalFD40'] == "null" ? NULL : $_POST['TotalFD40'];
$ImageUplodeOrNot = $_POST['ImageUplodeOrNot'];
$Image1 = null;
$Image2 = null;
$Image3 = null;
$Image4 = null;
$Image5 = null;
$Image6 = null;
$Image7 = null;
$Image8 = null;
$Image9 = null;
$Image10 = null;
$ProductVaritySNo = 0;

$sql3 = "INSERT INTO ProductVariants (ProductSNo) VALUES ('" . $ProductSNo . "')";
if ($conn->query($sql3) === TRUE) {
    $ProductVaritySNo = $conn->insert_id;
} else {
    echo "Error: " . $sql3 . "<br>" . $conn->error;
}



$NewProductSNo = sprintf('%06d', $ProductSNo);
$NewProductVaritySNo = sprintf('%06d', $ProductVaritySNo);
$Image1Name = "ProductNo_" . $NewProductSNo . "_VarityNo_" . $NewProductVaritySNo . "_Img01_" . $ProductName . "_" . date("YmdHis");
$Image2Name = "ProductNo_" . $NewProductSNo . "_VarityNo_" . $NewProductVaritySNo . "_Img02_" . $ProductName . "_" . date("YmdHis");
$Image3Name = "ProductNo_" . $NewProductSNo . "_VarityNo_" . $NewProductVaritySNo . "_Img03_" . $ProductName . "_" . date("YmdHis");
$Image4Name = "ProductNo_" . $NewProductSNo . "_VarityNo_" . $NewProductVaritySNo . "_Img04_" . $ProductName . "_" . date("YmdHis");
$Image5Name = "ProductNo_" . $NewProductSNo . "_VarityNo_" . $NewProductVaritySNo . "_Img05_" . $ProductName . "_" . date("YmdHis");
$Image6Name = "ProductNo_" . $NewProductSNo . "_VarityNo_" . $NewProductVaritySNo . "_Img06_" . $ProductName . "_" . date("YmdHis");
$Image7Name = "ProductNo_" . $NewProductSNo . "_VarityNo_" . $NewProductVaritySNo . "_Img07_" . $ProductName . "_" . date("YmdHis");
$Image8Name = "ProductNo_" . $NewProductSNo . "_VarityNo_" . $NewProductVaritySNo . "_Img08_" . $ProductName . "_" . date("YmdHis");
$Image9Name = "ProductNo_" . $NewProductSNo . "_VarityNo_" . $NewProductVaritySNo . "_Img09_" . $ProductName . "_" . date("YmdHis");
$Image10Name = "ProductNo_" . $NewProductSNo . "_VarityNo_" . $NewProductVaritySNo . "_Img10_" . $ProductName . "_" . date("YmdHis");





function uploadAndRenameImage($fileInput, $newFileName)
{

    $uploadDir = rootDir . '/uploads/productImg/'; // Ensure this directory exists and is writable
    $fileExtension = pathinfo($fileInput['name'], PATHINFO_EXTENSION);
    $newFileNameWithExtension = $newFileName . "." . $fileExtension;
    $uploadFile = $uploadDir . $newFileNameWithExtension;

    if (move_uploaded_file($fileInput['tmp_name'], $uploadFile)) {
        return $uploadFile; // Return the path to the uploaded file
    }
    return null; // Handle the error as needed
}
if ($ImageUplodeOrNot == "Yes") {


    if (!isset($_FILES['ProductImageUplode0']['name']) || !isset($_FILES['ProductImageUplode1']['name']) || !isset($_FILES['ProductImageUplode2']['name'])) {
        sendResponse(false,["Please Upload First 3 Images","message"]);
    }

    if (isset($_FILES['ProductImageUplode0']['name'])) {
        $fileExtension = pathinfo($_FILES['ProductImageUplode0']['name'], PATHINFO_EXTENSION);
        $uploadedImagePath = uploadAndRenameImage($_FILES['ProductImageUplode0'], $Image1Name);
        $Image1 = $Image1Name . "." . $fileExtension;
    }

    if (isset($_FILES['ProductImageUplode1']['name'])) {
        $fileExtension = pathinfo($_FILES['ProductImageUplode1']['name'], PATHINFO_EXTENSION);
        $uploadedImagePath = uploadAndRenameImage($_FILES['ProductImageUplode1'], $Image2Name);
        $Image2 = $Image2Name . "." . $fileExtension;
    }

    if (isset($_FILES['ProductImageUplode2']['name'])) {
        $fileExtension = pathinfo($_FILES['ProductImageUplode2']['name'], PATHINFO_EXTENSION);
        $uploadedImagePath = uploadAndRenameImage($_FILES['ProductImageUplode2'], $Image3Name);
        $Image3 = $Image3Name . "." . $fileExtension;
    }

    if (isset($_FILES['ProductImageUplode3']['name'])) {
        $fileExtension = pathinfo($_FILES['ProductImageUplode3']['name'], PATHINFO_EXTENSION);
        $uploadedImagePath = uploadAndRenameImage($_FILES['ProductImageUplode3'], $Image4Name);
        $Image4 = $Image4Name . "." . $fileExtension;
    }

    if (isset($_FILES['ProductImageUplode4']['name'])) {
        $fileExtension = pathinfo($_FILES['ProductImageUplode4']['name'], PATHINFO_EXTENSION);
        $uploadedImagePath = uploadAndRenameImage($_FILES['ProductImageUplode4'], $Image5Name);
        $Image5 = $Image5Name . "." . $fileExtension;
    }

    if (isset($_FILES['ProductImageUplode5']['name'])) {
        $fileExtension = pathinfo($_FILES['ProductImageUplode5']['name'], PATHINFO_EXTENSION);
        $uploadedImagePath = uploadAndRenameImage($_FILES['ProductImageUplode5'], $Image6Name);
        $Image6 = $Image6Name . "." . $fileExtension;
    }

    if (isset($_FILES['ProductImageUplode6']['name'])) {
        $fileExtension = pathinfo($_FILES['ProductImageUplode6']['name'], PATHINFO_EXTENSION);
        $uploadedImagePath = uploadAndRenameImage($_FILES['ProductImageUplode6'], $Image7Name);
        $Image7 = $Image7Name . "." . $fileExtension;
    }

    if (isset($_FILES['ProductImageUplode7']['name'])) {
        $fileExtension = pathinfo($_FILES['ProductImageUplode7']['name'], PATHINFO_EXTENSION);
        $uploadedImagePath = uploadAndRenameImage($_FILES['ProductImageUplode7'], $Image8Name);
        $Image8 = $Image8Name . "." . $fileExtension;
    }

    if (isset($_FILES['ProductImageUplode8']['name'])) {
        $fileExtension = pathinfo($_FILES['ProductImageUplode8']['name'], PATHINFO_EXTENSION);
        $uploadedImagePath = uploadAndRenameImage($_FILES['ProductImageUplode8'], $Image9Name);
        $Image9 = $Image9Name . "." . $fileExtension;
    }

    if (isset($_FILES['ProductImageUplode9']['name'])) {
        $fileExtension = pathinfo($_FILES['ProductImageUplode9']['name'], PATHINFO_EXTENSION);
        $uploadedImagePath = uploadAndRenameImage($_FILES['ProductImageUplode9'], $Image10Name);
        $Image10 = $Image10Name . "." . $fileExtension;
    }
} else if ($ImageUplodeOrNot == "No") {

    $Image1 = $ProductOldImages1 == "null" ? null : $ProductOldImages1;
    $Image2 = $ProductOldImages2 == "null" ? null : $ProductOldImages2;
    $Image3 = $ProductOldImages3 == "null" ? null : $ProductOldImages3;
    $Image4 = $ProductOldImages4 == "null" ? null : $ProductOldImages4;
    $Image5 = $ProductOldImages5 == "null" ? null : $ProductOldImages5;
    $Image6 = $ProductOldImages6 == "null" ? null : $ProductOldImages6;
    $Image7 = $ProductOldImages7 == "null" ? null : $ProductOldImages7;
    $Image8 = $ProductOldImages8 == "null" ? null : $ProductOldImages8;
    $Image9 = $ProductOldImages9 == "null" ? null : $ProductOldImages9;
    $Image10 = $ProductOldImages10 == "null" ? null : $ProductOldImages10;
}
// die();
$query = "SELECT DescriptionKey1, DescriptionKey2, DescriptionKey3, DescriptionKey4, DescriptionKey5, DescriptionKey6, DescriptionKey7, DescriptionKey8, DescriptionKey9, DescriptionKey10, DescriptionKey11, DescriptionKey12, DescriptionKey13, DescriptionKey14, DescriptionKey15, DescriptionKey16, DescriptionKey17, DescriptionKey18, DescriptionKey19, DescriptionKey20, DescriptionKey21, DescriptionKey22, DescriptionKey23, DescriptionKey24, DescriptionKey25, DescriptionKey26, DescriptionKey27, DescriptionKey28, DescriptionKey29, DescriptionKey30, DescriptionKey31, DescriptionKey32, DescriptionKey33, DescriptionKey34, DescriptionKey35, DescriptionKey36, DescriptionKey37, DescriptionKey38, DescriptionKey39, DescriptionKey40 FROM ProductVariants WHERE ProductSNo = ? ORDER BY SNo ASC LIMIT 1";
$result = executeQuery(DBsqli(), $query, [$WorkingOn], "i");

if(!empty($result)) {
    $DescriptionKey1 = $result[0]["DescriptionKey1"];
    $DescriptionKey2 = $result[0]["DescriptionKey2"];
    $DescriptionKey3 = $result[0]["DescriptionKey3"];
    $DescriptionKey4 = $result[0]["DescriptionKey4"];
    $DescriptionKey5 = $result[0]["DescriptionKey5"];
    $DescriptionKey6 = $result[0]["DescriptionKey6"];
    $DescriptionKey7 = $result[0]["DescriptionKey7"];
    $DescriptionKey8 = $result[0]["DescriptionKey8"];
    $DescriptionKey9 = $result[0]["DescriptionKey9"];
    $DescriptionKey10 = $result[0]["DescriptionKey10"];
    $DescriptionKey11 = $result[0]["DescriptionKey11"];
    $DescriptionKey12 = $result[0]["DescriptionKey12"];
    $DescriptionKey13 = $result[0]["DescriptionKey13"];
    $DescriptionKey14 = $result[0]["DescriptionKey14"];
    $DescriptionKey15 = $result[0]["DescriptionKey15"];
    $DescriptionKey16 = $result[0]["DescriptionKey16"];
    $DescriptionKey17 = $result[0]["DescriptionKey17"];
    $DescriptionKey18 = $result[0]["DescriptionKey18"];
    $DescriptionKey19 = $result[0]["DescriptionKey19"];
    $DescriptionKey20 = $result[0]["DescriptionKey20"];
    $DescriptionKey21 = $result[0]["DescriptionKey21"];
    $DescriptionKey22 = $result[0]["DescriptionKey22"];
    $DescriptionKey23 = $result[0]["DescriptionKey23"];
    $DescriptionKey24 = $result[0]["DescriptionKey24"];
    $DescriptionKey25 = $result[0]["DescriptionKey25"];
    $DescriptionKey26 = $result[0]["DescriptionKey26"];
    $DescriptionKey27 = $result[0]["DescriptionKey27"];
    $DescriptionKey28 = $result[0]["DescriptionKey28"];
    $DescriptionKey29 = $result[0]["DescriptionKey29"];
    $DescriptionKey30 = $result[0]["DescriptionKey30"];
    $DescriptionKey31 = $result[0]["DescriptionKey31"];
    $DescriptionKey32 = $result[0]["DescriptionKey32"];
    $DescriptionKey33 = $result[0]["DescriptionKey33"];
    $DescriptionKey34 = $result[0]["DescriptionKey34"];
    $DescriptionKey35 = $result[0]["DescriptionKey35"];
    $DescriptionKey36 = $result[0]["DescriptionKey36"];
    $DescriptionKey37 = $result[0]["DescriptionKey37"];
    $DescriptionKey38 = $result[0]["DescriptionKey38"];
    $DescriptionKey39 = $result[0]["DescriptionKey39"];
    $DescriptionKey40 = $result[0]["DescriptionKey40"];
}


$sql = "UPDATE ProductVariants 
        SET MRPPrice = ?, OfferPrice = ?, Stocks = ?, VarentTypeValue1 = ?, VarentTypeValue2 = ?, VarentTypeValue3 = ?,
VariantDescription = ?,   
ProductImage1  = ?,
ProductImage2  = ?,
ProductImage3  = ?,
ProductImage4  = ?,
ProductImage5  = ?,
ProductImage6  = ?,
ProductImage7  = ?,
ProductImage8  = ?,
ProductImage9  = ?,
ProductImage10  = ?,
DescriptionValue1  = ?,
DescriptionValue2  = ?,
DescriptionValue3  = ?,
DescriptionValue4  = ?,
DescriptionValue5  = ?,
DescriptionValue6  = ?,
DescriptionValue7  = ?,
DescriptionValue8  = ?,
DescriptionValue9  = ?,
DescriptionValue10  = ?,
DescriptionValue11  = ?,
DescriptionValue12  = ?,
DescriptionValue13  = ?,
DescriptionValue14  = ?,
DescriptionValue15  = ?,
DescriptionValue16  = ?,
DescriptionValue17  = ?,
DescriptionValue18  = ?,
DescriptionValue19  = ?,
DescriptionValue20  = ?,
DescriptionValue21  = ?,
DescriptionValue22  = ?,
DescriptionValue23  = ?,
DescriptionValue24  = ?,
DescriptionValue25  = ?,
DescriptionValue26  = ?,
DescriptionValue27  = ?,
DescriptionValue28  = ?,
DescriptionValue29  = ?,
DescriptionValue30  = ?,
DescriptionValue31  = ?,
DescriptionValue32  = ?,
DescriptionValue33  = ?,
DescriptionValue34  = ?,
DescriptionValue35  = ?,
DescriptionValue36  = ?,
DescriptionValue37  = ?,
DescriptionValue38  = ?,
DescriptionValue39  = ?,
DescriptionValue40  = ?,
DescriptionKey1 = ?,
 DescriptionKey2 = ?,
 DescriptionKey3 = ?,
 DescriptionKey4 = ?,
 DescriptionKey5 = ?,
 DescriptionKey6 = ?,
 DescriptionKey7 = ?,
 DescriptionKey8 = ?,
 DescriptionKey9 = ?,
 DescriptionKey10 = ?,
 DescriptionKey11 = ?,
 DescriptionKey12 = ?,
 DescriptionKey13 = ?,
 DescriptionKey14 = ?,
 DescriptionKey15 = ?,
 DescriptionKey16 = ?,
 DescriptionKey17 = ?,
 DescriptionKey18 = ?,
 DescriptionKey19 = ?,
 DescriptionKey20 = ?,
 DescriptionKey21 = ?,
 DescriptionKey22 = ?,
 DescriptionKey23 = ?,
 DescriptionKey24 = ?,
 DescriptionKey25 = ?,
 DescriptionKey26 = ?,
 DescriptionKey27 = ?,
 DescriptionKey28 = ?,
 DescriptionKey29 = ?,
 DescriptionKey30 = ?,
 DescriptionKey31 = ?,
 DescriptionKey32 = ?,
 DescriptionKey33 = ?,
 DescriptionKey34 = ?,
 DescriptionKey35 = ?,
 DescriptionKey36 = ?,
 DescriptionKey37 = ?,
 DescriptionKey38 = ?,
 DescriptionKey39 = ?,
 DescriptionKey40 = ?
 
        WHERE SNo = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "iiissssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssi",
    $ProductMRP,
    $ProductOfferPrice,
    $AvailableStock,
    $VarityValue1,
    $VarityValue2,
    $VarityValue3,
    $ProductCollectedDescription,
    $Image1,
    $Image2,
    $Image3,
    $Image4,
    $Image5,
    $Image6,
    $Image7,
    $Image8,
    $Image9,
    $Image10,
    $ProductFD1,
    $ProductFD2,
    $ProductFD3,
    $ProductFD4,
    $ProductFD5,
    $ProductFD6,
    $ProductFD7,
    $ProductFD8,
    $ProductFD9,
    $ProductFD10,
    $ProductFD11,
    $ProductFD12,
    $ProductFD13,
    $ProductFD14,
    $ProductFD15,
    $ProductFD16,
    $ProductFD17,
    $ProductFD18,
    $ProductFD19,
    $ProductFD20,
    $ProductFD21,
    $ProductFD22,
    $ProductFD23,
    $ProductFD24,
    $ProductFD25,
    $ProductFD26,
    $ProductFD27,
    $ProductFD28,
    $ProductFD29,
    $ProductFD30,
    $ProductFD31,
    $ProductFD32,
    $ProductFD33,
    $ProductFD34,
    $ProductFD35,
    $ProductFD36,
    $ProductFD37,
    $ProductFD38,
    $ProductFD39,
    $ProductFD40,
    $DescriptionKey1,
    $DescriptionKey2,
    $DescriptionKey3,
    $DescriptionKey4,
    $DescriptionKey5,
    $DescriptionKey6,
    $DescriptionKey7,
    $DescriptionKey8,
    $DescriptionKey9,
    $DescriptionKey10,
    $DescriptionKey11,
    $DescriptionKey12,
    $DescriptionKey13,
    $DescriptionKey14,
    $DescriptionKey15,
    $DescriptionKey16,
    $DescriptionKey17,
    $DescriptionKey18,
    $DescriptionKey19,
    $DescriptionKey20,
    $DescriptionKey21,
    $DescriptionKey22,
    $DescriptionKey23,
    $DescriptionKey24,
    $DescriptionKey25,
    $DescriptionKey26,
    $DescriptionKey27,
    $DescriptionKey28,
    $DescriptionKey29,
    $DescriptionKey30,
    $DescriptionKey31,
    $DescriptionKey32,
    $DescriptionKey33,
    $DescriptionKey34,
    $DescriptionKey35,
    $DescriptionKey36,
    $DescriptionKey37,
    $DescriptionKey38,
    $DescriptionKey39,
    $DescriptionKey40,
    
    $ProductVaritySNo
);

$sql2 = "INSERT INTO ProductNewStocksDetail (ProductListSNo, ProductVariantsSNo , Quantity)
        VALUES (?, ?, ?)";

$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("iii", $ProductSNo, $ProductVaritySNo, $AvailableStock);
$stmt2->execute();
$meaasge = "";
$meaasge .= "Your variety of  $ProductName has been added successfully.";
if ($VarityValue1 != null) {
    $meaasge .= "<br>1. $VaritySelectionName1  :  $VarityValue1";
}
if ($VarityValue2 != null) {
    $meaasge .= "<br>2. $VaritySelectionName2  :  $VarityValue2";
}
if ($VarityValue3 != null) {
    $meaasge .= "<br>3. $VaritySelectionName3  :  $VarityValue3";
}




if ($stmt->execute()) {
    



    sendResponse(true,[$meaasge]);

} else {
    sendResponse(false, ["Failed to add product", "alert"]);
}

$stmt->close();
$conn->close();
