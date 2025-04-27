<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::user() ?>

    <title>Product</title>
    <style>
        .container {
            max-width: 1200px;
            margin: 10px auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 5px;
        }

        .productCard {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            padding: 5px;
        }

        .productCard:hover {
            transform: scale(1.03);
        }

        .image {
            flex: 0 0 100px;
        }

        .image img {
            /* width: 100%; */
            height: 100px;
            object-fit: cover;
            display: block;
        }

        .productDetail {
            flex: 1;
            padding-left: 15px;
            text-align: left;
        }

        .productName {
            /* font-size: 1rem; */
            font-weight: bold;
            color: #0463ca;
            margin-bottom: 3px;
        }

        .productType {
            /* font-size: 0.8rem; */
            color: #333;
            margin-bottom: 3px;
        }

        .priceQuantity {
            display: flex;
            justify-content: space-between;
            /* font-size: 0.9rem; */
            margin-bottom: 3px;
        }

        .productStatus {
            /* font-size: 0.8rem; */
            color: #333;
        }

        .price {
            /* font-size: 1rem; */
            font-weight: bold;
            color: #e63946;
        }
    </style>

</head>

<body>
    <?php Header::user() ?>
    <div class="container" id="container">

    </div>
    <?php Footer::user() ?>
    <script>
        loadingPage("Start", "Loading order ")
        sendAxios("myorder.api.php").then(res => {
            let container = document.getElementById("container");
            container.textContent = "";
            if (res.status == "success") {
                res.data.forEach(e => {
                    container.innerHTML += `
                    <div class="productCard">
            <div class="image">
                <img loading="lazy"  src="/cartify/uploads/productImg/${e.ProductImage1}" alt="Product Image">
            </div>
            <div class="productDetail">
                <div class="productName">${e.ProductName}</div>
                <div class="productType">${e.VarentTypeValue1} ${e.VarentTypeValue2} ${e.VarentTypeValue3}</div>
                <div class="priceQuantity">
                    <div class="productPrice">Price: <span class="price">RS ${e.ProductCost+e.DeliveryCharge}</span></div>
                    <div class="productQuantity">Quantity: ${e.Quantities}</div>
                </div>
                <div class="productStatus"></div>
            </div>
        </div>
                    `;
                    console.log(e);

                })
            }


        })
    </script>
</body>

</html>