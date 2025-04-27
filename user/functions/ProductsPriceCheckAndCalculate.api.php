<?php

function priceCheckCalculator($productArray)
{
    $productIds = array_column($productArray, "productId"); // Correct key
    $placeHolder = implode(",", array_fill(0, count($productIds), "?"));
    $type = str_repeat("i", count($productIds)); // Integer type for each ID

    $query = "SELECT PV.SNo AS ProductVariantsSNo, PV.OfferPrice AS OfferPrice, 
                     PV.Stocks AS Stocks, PL.ZonalDeliveryCharge AS DeliveryCharge 
              FROM ProductVariants PV 
              LEFT JOIN ProductList PL ON PV.ProductSNo = PL.SNo 
              WHERE PV.SNo IN ($placeHolder)";
    $conn = DBsqli(); // Get database connection
    $result = executeQuery($conn, $query, $productIds, $type);
    // prd($result);
    $TotalCost = 0;

    foreach ($result as $row) {
        $SNo = $row["ProductVariantsSNo"];

        // Find quantity from productArray using `productId`
        $quantity = array_values(array_filter($productArray, function ($item) use ($SNo) {
            return $item["productId"] == $SNo;
        }))[0]["quantity"];

        // Calculate total cost (OfferPrice * Quantity + DeliveryCharge)
        $TotalCost += ($quantity * $row["OfferPrice"]) + $row["DeliveryCharge"];
    }

    return $TotalCost;
}

