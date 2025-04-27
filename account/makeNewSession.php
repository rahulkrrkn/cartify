<?php
require_once rootDir . "/lib/backend.inc.php";


function makeLogin($emailId)
{

    session_destroy();
    session_start();
    $query = "
SELECT 
    u.SNo AS UserSNo,
    u.EmailID,
    u.MobileNo,
    u.FName,
    u.LName,
    u.ProfilePhoto,
    u.DOB,
    u.Password,
    u.Gender,
    u.Date AS UserDate,
    
    s.SNo AS SellerSNo,
    s.ShopName,
    s.ShopPinCode,
    s.ShopFullAddress,
    s.ShopMobileNo,
    s.ShopEmail,
    s.GSTNo,
    s.BankAccountNo,
    s.IFSCCode,
    s.AadharNo AS SellerAadharNo,
    s.SellInlast7Days,
    s.SellInlast30Days,
    s.SellInlast365Days,
    s.Date AS SellerDate,

    a.SNo AS AdminSNo,
    a.Verification AS AdminVerification,
    a.Date AS AdminDate,

    sp.SNo AS SupportSNo,
    sp.AadharNo AS SupportAadharNo,
    sp.Verification AS SupportVerification,
    sp.Date AS SupportDate

FROM 
    User u
LEFT JOIN 
    Seller s ON u.SNo = s.UserSNo
LEFT JOIN 
    Admin a ON u.SNo = a.UserSNo
LEFT JOIN 
    Support sp ON u.SNo = sp.UserSNo
WHERE 
    u.EmailID = ?
";
    $result = executeQuery(DBsqli(), $query, [$emailId], "s");

    if (empty($result)) {
        sendResponse(false,["This EmailID is not registered with us", "message"]);
    }
    $row = $result[0];
    if (!empty($row['UserSNo'])) {
        // If UserSNo is set, set other variables to "NotSet" if they are empty
        $_SESSION['CFuserData'] = [
            "SNo" => $row['UserSNo'],
            "EmailID" => !empty($row['EmailID']) ? $row['EmailID'] : null,
            "MobileNo" => !empty($row['MobileNo']) ? $row['MobileNo'] : null,
            "FName" => !empty($row['FName']) ? $row['FName'] : null,
            "LName" => !empty($row['LName']) ? $row['LName'] : null,
            "ProfilePhoto" => !empty($row['ProfilePhoto'])
                ? (str_contains($row['ProfilePhoto'], 'http')
                    ? $row['ProfilePhoto']
                    : "/cartify/uploads/profiles/{$row['ProfilePhoto']}")
                : "/cartify/uploads/profiles/profile-photo.jpg",
            "DOB" => !empty($row['DOB']) ? $row['DOB'] : null,
            "MobNumVerify" => !empty($row['MobNumVerify']) ? $row['MobNumVerify'] : null,
            "Password" => !empty($row['Password']) ? true : null,
            "GoogleKey" => !empty($row['GoogleKey']) ? $row['GoogleKey'] : null,
            "Gender" => !empty($row['Gender']) ? $row['Gender'] : null,
            "Date" => !empty($row['UserDate']) ? $row['UserDate'] : null
        ];
    }

    if (!empty($row['SellerSNo'])) {

        // If SellerSNo is set, set other variables to "NotSet" if they are empty
        $_SESSION['CFsellerData'] = [
            "SNo" => $row['SellerSNo'],
            "ShopName" => !empty($row['ShopName']) ? $row['ShopName'] : null,
            "ShopPinCode" => !empty($row['ShopPinCode']) ? $row['ShopPinCode'] : null,
            "ShopFullAddress" => !empty($row['ShopFullAddress']) ? $row['ShopFullAddress'] : null,
            "ShopMobileNo" => !empty($row['ShopMobileNo']) ? $row['ShopMobileNo'] : null,
            "ShopEmail" => !empty($row['ShopEmail']) ? $row['ShopEmail'] : null,
            "GSTNo" => !empty($row['GSTNo']) ? $row['GSTNo'] : null,
            "BankAccountNo" => !empty($row['BankAccountNo']) ? $row['BankAccountNo'] : null,
            "IFSCCode" => !empty($row['IFSCCode']) ? $row['IFSCCode'] : null,
            "AadharNo" => !empty($row['SellerAadharNo']) ? $row['SellerAadharNo'] : null,
            "SellInlast7Days" => !empty($row['SellInlast7Days']) ? $row['SellInlast7Days'] : null,
            "SellInlast30Days" => !empty($row['SellInlast30Days']) ? $row['SellInlast30Days'] : null,
            "SellInlast90Days" => !empty($row['SellInlast90Days']) ? $row['SellInlast90Days'] : null,
            "SellInlast365Days" => !empty($row['SellInlast365Days']) ? $row['SellInlast365Days'] : null

        ];
    }
    if (!empty($row['AdminSNo'])) {
        $_SESSION['CFadminData'] = [
            "SNo" => $row['AdminSNo'],
            "Verification" => !empty($row['AdminVerification']) ? $row['AdminVerification'] : null,
            "Date" => !empty($row['AdminDate']) ? $row['AdminDate'] : null
        ];
    }
    if (!empty($row['SupportSNo'])) {
        $_SESSION['CFsupportData'] = [
            "SNo" => $row['SupportSNo'],
            "AadharNo" => !empty($row['SupportAadharNo']) ? $row['SupportAadharNo'] : null,
            "Verification" => !empty($row['SupportVerification']) ? $row['SupportVerification'] : null,
            "Date" => !empty($row['SupportDate']) ? $row['SupportDate'] : null
        ];
    }

    $LoginUserSNo = $_SESSION['CFuserData']['SNo'];
    $_SESSION['CFuser']['wishList'] = [];
    $_SESSION['CFuser']['cart'] = [];

    $WishListSql = "SELECT ProductVariantSNo FROM Favourite WHERE UserSNo = ? AND Status = 'Saved'";
    $WishListResult = executeQuery(DBsqli(), $WishListSql, [$LoginUserSNo], "s");
    foreach ($WishListResult as $row) {
        $_SESSION['CFuser']['wishList'][] = $row['ProductVariantSNo'];
    }

    $CartSql = "SELECT ProductVariantSNo FROM Cart WHERE UserSNo = ? AND Status = 'Saved'";
    $CartResult = executeQuery(DBsqli(), $CartSql, [$LoginUserSNo], "s");
    foreach ($CartResult as $row) {
        $_SESSION['CFuser']['cart'][] = $row['ProductVariantSNo'];
    }

    // Remove duplicates from cart
    $_SESSION['CFuser']['wishList'] = array_unique($_SESSION['CFuser']['wishList']);
    $_SESSION['CFuser']['cart'] = array_unique($_SESSION['CFuser']['cart']);

    if (isset($_SESSION['CFuserData']['SNo'])) {
        return true;
    } else {
        return false;
    }
}
