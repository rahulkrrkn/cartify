<?php
const rootDir = "../../..";
require_once rootDir . "/lib/backend.inc.php";






if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the values from the request
    $SelectedMainCategory = $_POST['SelectedMainCategory'];
    $SelectedCategory = $_POST['SelectedCategory'];
    $SelectedSubCategory = $_POST['SelectedSubCategory'];

    $MainCategoryImageViewLink = $_POST['MainCategoryImageViewLink'];
    $CategoryImageViewLink = $_POST['CategoryImageViewLink'];
    $SubCategoryImageViewLink = $_POST['SubCategoryImageViewLink'];
    $urlsToRemove = [
        'http://localhost/cartify/uploads/categoryImg/',
        'https://rahulkrrkn.com/cartify/uploads/categoryImg/'
    ];

    // Check if any URL is present in the string and remove it if found
    $MainCategoryImageViewLink = str_replace($urlsToRemove, '', $MainCategoryImageViewLink);
    $CategoryImageViewLink = str_replace($urlsToRemove, '', $CategoryImageViewLink);
    $SubCategoryImageViewLink = str_replace($urlsToRemove, '', $SubCategoryImageViewLink);



    $MainCategoryInputBox = $_POST['MainCategoryInputBox'];
    $CategoryInputBox = $_POST['CategoryInputBox'];
    $SubCategoryInputBox = $_POST['SubCategoryInputBox'];






    $WhichIsSelectedOther = 0;
    if ($SelectedMainCategory == "Other") {
        $WhichIsSelectedOther = "MainCategory";
    } elseif ($SelectedCategory == "Other") {
        $WhichIsSelectedOther = "Category";
    } elseif ($SelectedSubCategory == "Other") {
        $WhichIsSelectedOther = "SubCategory";
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Please Select The Category First']);
        die();
    }

    // For image uplode
    function uploadAndRenameImage($fileInput, $newFileName)
    {
        $uploadDir = './../../../uploads/categoryImg/'; // Ensure this directory exists and is writable
        $fileExtension = pathinfo($fileInput['name'], PATHINFO_EXTENSION);
        $newFileNameWithExtension = $newFileName . "." . $fileExtension;
        $uploadFile = $uploadDir . $newFileNameWithExtension;

        if (move_uploaded_file($fileInput['tmp_name'], $uploadFile)) {
            return $uploadFile; // Return the path to the uploaded file
        }
        return null; // Handle the error as needed
    }

    function categoryAlredyorNot($MainCategoryDB, $CategoryDB, $SubCategoryDB)
    {

        $checkCategory = "SELECT * FROM ProductCategory WHERE MainCategory = ? AND Category = ? AND SubCategory = ?";
        
        $result = executeQuery(DBsqli(), $checkCategory,[$MainCategoryDB, $CategoryDB, $SubCategoryDB], "sss");

        if (!empty($result)) {
            sendResponse(false, ["Category Already Exists", "alert"]);
    
        }
    }

    if ($WhichIsSelectedOther == "MainCategory") {
        if ($MainCategoryInputBox == "") {
            echo json_encode(['status' => 'error', 'message' => 'Please Enter Main Category']);
            die();
        } elseif (!isset($_FILES['ImgUplodeInput1'])) {
            echo json_encode(['status' => 'error', 'message' => 'Please Upload Main Category Image']);
            die();
        } elseif ($CategoryInputBox == "") {
            echo json_encode(['status' => 'error', 'message' => 'Please Enter Category']);
            die();
        } elseif (!isset($_FILES['ImgUplodeInput2'])) {
            echo json_encode(['status' => 'error', 'message' => 'Please Upload Category Image']);
            die();
        } elseif ($SubCategoryInputBox == "") {
            echo json_encode(['status' => 'error', 'message' => 'Please Enter Sub Category']);
            die();
        } elseif (!isset($_FILES['ImgUplodeInput3'])) {
            echo json_encode(['status' => 'error', 'message' => 'Please Upload Sub Category Image']);
            die();
        }
        $MainCategoryNewName = $MainCategoryInputBox . "_" . date("YmdHis");
        $CategoryNewName = $MainCategoryInputBox . "_" . $CategoryInputBox . "_" . date("YmdHis");
        $SubCategoryNewName = $MainCategoryInputBox . "_" . $CategoryInputBox . "_" . $SubCategoryInputBox . "_" . date("YmdHis");
        $MainCategoryExtension = pathinfo($_FILES['ImgUplodeInput1']['name'], PATHINFO_EXTENSION);
        $CategoryExtension = pathinfo($_FILES['ImgUplodeInput2']['name'], PATHINFO_EXTENSION);
        $SubCategoryExtension = pathinfo($_FILES['ImgUplodeInput3']['name'], PATHINFO_EXTENSION);
        uploadAndRenameImage($_FILES['ImgUplodeInput1'], $MainCategoryNewName);
        uploadAndRenameImage($_FILES['ImgUplodeInput2'], $CategoryNewName);
        uploadAndRenameImage($_FILES['ImgUplodeInput3'], $SubCategoryNewName);

        $MainCategoryImgDB = $MainCategoryNewName . "." . $MainCategoryExtension;
        $CategoryImgDB = $CategoryNewName . "." . $CategoryExtension;
        $SubCategoryImgDB = $SubCategoryNewName . "." . $SubCategoryExtension;
        $MainCategoryDB = $MainCategoryInputBox;
        $CategoryDB = $CategoryInputBox;
        $SubCategoryDB = $SubCategoryInputBox;
        categoryAlredyorNot($MainCategoryDB, $CategoryDB, $SubCategoryDB);
    } elseif ($WhichIsSelectedOther == "Category") {
        if ($CategoryInputBox == "") {
            echo json_encode(['status' => 'error', 'message' => 'Please Enter Category']);

            die();
        } elseif (!isset($_FILES['ImgUplodeInput2'])) {
            echo json_encode(['status' => 'error', 'message' => 'Please Upload Category Image']);

            die();
        } elseif ($SubCategoryInputBox == "") {
            echo json_encode(['status' => 'error', 'message' => 'Please Enter Sub Category']);

            die();
        } elseif (!isset($_FILES['ImgUplodeInput3'])) {
            echo json_encode(['status' => 'error', 'message' => 'Please Upload Sub Category Image']);
            die();
        } elseif ($SelectedMainCategory == "Other" || $SelectedMainCategory == " ") {
            echo json_encode(['status' => 'error', 'message' => 'Please Select Main Category']);

            die();
        } elseif ($MainCategoryImageViewLink == "") {
            echo json_encode(['status' => 'error', 'message' => 'Please Check Main Category Image']);
            die();
        }


        $CategoryNewName = $SelectedMainCategory . "_" . $CategoryInputBox . "_" . date("YmdHis");
        $SubCategoryNewName = $SelectedMainCategory . "_" . $CategoryInputBox . "_" . $SubCategoryInputBox . "_" . date("YmdHis");

        $CategoryExtension = pathinfo($_FILES['ImgUplodeInput2']['name'], PATHINFO_EXTENSION);
        $SubCategoryExtension = pathinfo($_FILES['ImgUplodeInput3']['name'], PATHINFO_EXTENSION);

        $MainCategoryImgDB = $MainCategoryImageViewLink;
        uploadAndRenameImage($_FILES['ImgUplodeInput2'], $CategoryNewName);
        uploadAndRenameImage($_FILES['ImgUplodeInput3'], $SubCategoryNewName);
        $CategoryImgDB = $CategoryNewName . "." . $CategoryExtension;
        $SubCategoryImgDB = $SubCategoryNewName . "." . $SubCategoryExtension;

        $MainCategoryDB = $SelectedMainCategory;
        $CategoryDB = $CategoryInputBox;
        $SubCategoryDB = $SubCategoryInputBox;
        categoryAlredyorNot($MainCategoryDB, $CategoryDB, $SubCategoryDB);
    } elseif ($WhichIsSelectedOther == "SubCategory") {
        if ($SubCategoryInputBox == "") {
            echo json_encode(['status' => 'error', 'message' => 'Please Enter Sub Category']);

            die();
        } elseif (!isset($_FILES['ImgUplodeInput3'])) {
            echo json_encode(['status' => 'error', 'message' => 'Please Upload Sub Category Image']);
            die();
        } elseif ($SelectedMainCategory == "Other" || $SelectedMainCategory == "") {

            echo json_encode(['status' => 'error', 'message' => 'Please Select Main Category']);
            die();
        } elseif ($MainCategoryImageViewLink == "") {
            echo json_encode(['status' => 'error', 'message' => 'Please Check Main Category Image']);

            die();
        } elseif ($SelectedCategory == "Other" || $SelectedCategory == "") {
            echo json_encode(['status' => 'error', 'message' => 'Please Enter Category']);
            die();
        } elseif ($CategoryImageViewLink == "") {
            echo json_encode(['status' => 'error', 'message' => 'Please Upload Category Image']);
            die();
        }
        $SubCategoryNewName = $SelectedMainCategory . "_" . $SelectedCategory . "_" . $SubCategoryInputBox . "_" . date("YmdHis");
        uploadAndRenameImage($_FILES['ImgUplodeInput3'], $SubCategoryNewName);

        $SubCategoryExtension = pathinfo($_FILES['ImgUplodeInput3']['name'], PATHINFO_EXTENSION);

        $SubCategoryImgDB = $SubCategoryNewName . "." . $SubCategoryExtension;
        $MainCategoryImgDB = $MainCategoryImageViewLink;
        $CategoryImgDB = $CategoryImageViewLink;

        $MainCategoryDB = $SelectedMainCategory;
        $CategoryDB = $SelectedCategory;
        $SubCategoryDB = $SubCategoryInputBox;
        categoryAlredyorNot($MainCategoryDB, $CategoryDB, $SubCategoryDB);
    }







    if (isset($_SESSION['DBUserSNo'])) {
        $UserSNoAddedBy  = $_SESSION['DBUserSNo'];
    } else {
        $UserSNoAddedBy  = null;
    }




    if (isset($_POST['SelectedAttributes'])) {
        $SelectedAttributes = $_POST['SelectedAttributes'];
        $Attributes = [];

        for (
            $i = 0;
            $i < 15;
            $i++
        ) {
            $Attributes["Attribute" . ($i + 1)] = !empty($SelectedAttributes[$i]) ? $SelectedAttributes[$i] : null;
        }

        // Extract attributes for easier use
        $Attribute1DB = $Attributes['Attribute1'];
        $Attribute2DB = $Attributes['Attribute2'];
        $Attribute3DB = $Attributes['Attribute3'];
        $Attribute4DB = $Attributes['Attribute4'];
        $Attribute5DB = $Attributes['Attribute5'];
        $Attribute6DB = $Attributes['Attribute6'];
        $Attribute7DB = $Attributes['Attribute7'];
        $Attribute8DB = $Attributes['Attribute8'];
        $Attribute9DB = $Attributes['Attribute9'];
        $Attribute10DB = $Attributes['Attribute10'];
        $Attribute11DB = $Attributes['Attribute11'];
        $Attribute12DB = $Attributes['Attribute12'];
        $Attribute13DB = $Attributes['Attribute13'];
        $Attribute14DB = $Attributes['Attribute14'];
        $Attribute15DB = $Attributes['Attribute15'];
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Please Select At least One Attribute']);
        die();
    }


    if (isset($_POST['SelectedDescriptionData'])) {
        $SelectedDescriptionData = $_POST['SelectedDescriptionData'];
        $DescriptionData = [];

        for ($i = 0; $i < 40; $i++) {
            $DescriptionData["DescriptionData" . ($i + 1)] = !empty($SelectedDescriptionData[$i]) ? $SelectedDescriptionData[$i] : null;
        }

        // Extract attributes for easier use
        // Extract attributes for easier use
        $DescriptionData1DB = $DescriptionData['DescriptionData1'];
        $DescriptionData2DB = $DescriptionData['DescriptionData2'];
        $DescriptionData3DB = $DescriptionData['DescriptionData3'];
        $DescriptionData4DB = $DescriptionData['DescriptionData4'];
        $DescriptionData5DB = $DescriptionData['DescriptionData5'];
        $DescriptionData6DB = $DescriptionData['DescriptionData6'];
        $DescriptionData7DB = $DescriptionData['DescriptionData7'];
        $DescriptionData8DB = $DescriptionData['DescriptionData8'];
        $DescriptionData9DB = $DescriptionData['DescriptionData9'];
        $DescriptionData10DB = $DescriptionData['DescriptionData10'];
        $DescriptionData11DB = $DescriptionData['DescriptionData11'];
        $DescriptionData12DB = $DescriptionData['DescriptionData12'];
        $DescriptionData13DB = $DescriptionData['DescriptionData13'];
        $DescriptionData14DB = $DescriptionData['DescriptionData14'];
        $DescriptionData15DB = $DescriptionData['DescriptionData15'];
        $DescriptionData16DB = $DescriptionData['DescriptionData16'];
        $DescriptionData17DB = $DescriptionData['DescriptionData17'];
        $DescriptionData18DB = $DescriptionData['DescriptionData18'];
        $DescriptionData19DB = $DescriptionData['DescriptionData19'];
        $DescriptionData20DB = $DescriptionData['DescriptionData20'];
        $DescriptionData21DB = $DescriptionData['DescriptionData21'];
        $DescriptionData22DB = $DescriptionData['DescriptionData22'];
        $DescriptionData23DB = $DescriptionData['DescriptionData23'];
        $DescriptionData24DB = $DescriptionData['DescriptionData24'];
        $DescriptionData25DB = $DescriptionData['DescriptionData25'];
        $DescriptionData26DB = $DescriptionData['DescriptionData26'];
        $DescriptionData27DB = $DescriptionData['DescriptionData27'];
        $DescriptionData28DB = $DescriptionData['DescriptionData28'];
        $DescriptionData29DB = $DescriptionData['DescriptionData29'];
        $DescriptionData30DB = $DescriptionData['DescriptionData30'];
        $DescriptionData31DB = $DescriptionData['DescriptionData31'];
        $DescriptionData32DB = $DescriptionData['DescriptionData32'];
        $DescriptionData33DB = $DescriptionData['DescriptionData33'];
        $DescriptionData34DB = $DescriptionData['DescriptionData34'];
        $DescriptionData35DB = $DescriptionData['DescriptionData35'];
        $DescriptionData36DB = $DescriptionData['DescriptionData36'];
        $DescriptionData37DB = $DescriptionData['DescriptionData37'];
        $DescriptionData38DB = $DescriptionData['DescriptionData38'];
        $DescriptionData39DB = $DescriptionData['DescriptionData39'];
        $DescriptionData40DB = $DescriptionData['DescriptionData40'];
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Please Select At least One Description']);
        die();
    }
    $conn = DBsqli();
    $stmt = $conn->prepare("INSERT INTO ProductCategory (UserSNoAddedBy, MainCategory, MainCategoryImg, Category, CategoryImg, SubCategory, SubCategoryImg, AlreadySetInDescription1, AlreadySetInDescription2, AlreadySetInDescription3, AlreadySetInDescription4, AlreadySetInDescription5, AlreadySetInDescription6, AlreadySetInDescription7, AlreadySetInDescription8, AlreadySetInDescription9, AlreadySetInDescription10, AlreadySetInDescription11, AlreadySetInDescription12, AlreadySetInDescription13, AlreadySetInDescription14, AlreadySetInDescription15, AlreadySetInDescription16, AlreadySetInDescription17, AlreadySetInDescription18, AlreadySetInDescription19, AlreadySetInDescription20, AlreadySetInDescription21, AlreadySetInDescription22, AlreadySetInDescription23, AlreadySetInDescription24, AlreadySetInDescription25, AlreadySetInDescription26, AlreadySetInDescription27, AlreadySetInDescription28, AlreadySetInDescription29, AlreadySetInDescription30, AlreadySetInDescription31, AlreadySetInDescription32, AlreadySetInDescription33, AlreadySetInDescription34, AlreadySetInDescription35, AlreadySetInDescription36, AlreadySetInDescription37, AlreadySetInDescription38, AlreadySetInDescription39, AlreadySetInDescription40, Attribute1, Attribute2, Attribute3, Attribute4, Attribute5, Attribute6, Attribute7, Attribute8, Attribute9, Attribute10, Attribute11, Attribute12, Attribute13, Attribute14, Attribute15,Verification) VALUES ( ? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,? ,?,?)");
    $Verification = "Approved";
    $stmt->bind_param(
        "issssssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiis",
        $UserSNoAddedBy,
        $MainCategoryDB,
        $MainCategoryImgDB,
        $CategoryDB,
        $CategoryImgDB,
        $SubCategoryDB,
        $SubCategoryImgDB,
        $DescriptionData1DB,
        $DescriptionData2DB,
        $DescriptionData3DB,
        $DescriptionData4DB,
        $DescriptionData5DB,
        $DescriptionData6DB,
        $DescriptionData7DB,
        $DescriptionData8DB,
        $DescriptionData9DB,
        $DescriptionData10DB,
        $DescriptionData11DB,
        $DescriptionData12DB,
        $DescriptionData13DB,
        $DescriptionData14DB,
        $DescriptionData15DB,
        $DescriptionData16DB,
        $DescriptionData17DB,
        $DescriptionData18DB,
        $DescriptionData19DB,
        $DescriptionData20DB,
        $DescriptionData21DB,
        $DescriptionData22DB,
        $DescriptionData23DB,
        $DescriptionData24DB,
        $DescriptionData25DB,
        $DescriptionData26DB,
        $DescriptionData27DB,
        $DescriptionData28DB,
        $DescriptionData29DB,
        $DescriptionData30DB,
        $DescriptionData31DB,
        $DescriptionData32DB,
        $DescriptionData33DB,
        $DescriptionData34DB,
        $DescriptionData35DB,
        $DescriptionData36DB,
        $DescriptionData37DB,
        $DescriptionData38DB,
        $DescriptionData39DB,
        $DescriptionData40DB,
        $Attribute1DB,
        $Attribute2DB,
        $Attribute3DB,
        $Attribute4DB,
        $Attribute5DB,
        $Attribute6DB,
        $Attribute7DB,
        $Attribute8DB,
        $Attribute9DB,
        $Attribute10DB,
        $Attribute11DB,
        $Attribute12DB,
        $Attribute13DB,
        $Attribute14DB,
        $Attribute15DB,
        $Verification
    );

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Category Added successfully!']);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Handle invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
