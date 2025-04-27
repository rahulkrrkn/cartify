<?php
const rootDir = "../..";
require_once rootDir . "/lib/frontend.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= Head::user(); ?>
    <title>Checkout</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <link rel="stylesheet" href="./../address/loadAddress.css">
    <style>
        .container {
            max-width: 800px;
            background: #fff;
            padding: 20px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .product-box {
            display: flex;
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }

        .product-img {
            width: 150px;
            border-radius: 10px;
            margin-right: 20px;
        }

        .product-details {
            flex: 1;
        }

        .quantity-box {
            display: flex;
            align-items: center;

            margin-top: 10px;
        }

        .quantity-box button {
            background: #0463ca;
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin: 0;
        }

        .quantity-box input {
            width: 40px;
            text-align: center;
            margin: 0 10px;
            font-size: 16px;
        }

        .address-box {
            margin-top: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 10px;
        }

        /* Payment session */
        .payment {
            margin-top: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .payment h3 {
            margin-bottom: 10px;
            color: #0463ca;
        }

        .payment p {
            font-size: 16px;
            margin: 5px 0;
        }

        .payment hr {
            margin: 10px 0;
            border: 0;
            height: 1px;
            background: #ddd;
        }

        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }

        .payment-options label {
            display: flex;
            align-items: center;
            font-size: 16px;
            cursor: pointer;
        }

        .payment-options input {
            margin-right: 10px;
            cursor: pointer;
        }

        .payment button {
            background: #0463ca;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 15px;
            width: 100%;
        }

        .payment button:hover {
            background: #0357b3;
        }

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1000;

        }

        #checkoutContainer {
            transition: opacity 0.5s ease-in-out;
        }


        .popup-card {
            background: #28a745;
            color: #fff;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            width: 350px;
        }

        .checkmark {
            font-size: 100px;
            margin-bottom: 10px;
        }

        .popup-card h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .popup-card p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .popup-card button {
            background: #fff;
            color: #28a745;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .popup-card button:hover {
            background: #e6e6e6;
        }

        .hidden {
            opacity: 0;
            pointer-events: none;
        }

        #btn-danger {
            background-color: red;
            color: white;
        }

    
    </style>
</head>

<body>
    <?= Header::user(); ?>
    <div class="container" id="checkoutContainer">
        <h2>Checkout</h2>
        <div class="product-box">
            <img loading="lazy" id="productImage" class="product-img" alt="Product Image">
            <div class="product-details">
                <h3 id="productName"></h3>
                <p><strong>Brand:</strong> <span id="brand"></span></p>
                <p><strong>MRP:</strong> <del id="mrpPrice"></del></p>
                <p><strong>Offer Price:</strong> <span id="offerPrice"></span></p>
                <p><strong>Stock:</strong> <span id="stock"></span></p>
                <p><strong>Ratings:</strong> ⭐<span id="rating"></span> ( <span id="totalRatings"></span> reviews )</p>
                <div class="quantity-box">
                    <button onclick="changeQuantity(-1)">-</button>
                    <input type="text" id="quantity" value="1" readonly>
                    <button onclick="changeQuantity(1)">+</button>
                </div>
            </div>
        </div>

        <div class="address-box">
            <h3>Shipping Address</h3>
            <div id="addressSelected">
            </div>
        </div>


            <div class="selectAddress">
                <div id="addressList">
                </div>
                <div class="btnContainer">
                    <button onclick="cancle()" class=" btnS1">Cancle</button>
                    <a class="btn btnP1" href="/cartify/user/address/add-new/">Add New Address</a>
                </div>
        </div>
        <div class="payment">
            <h3>Payment Details</h3>
            <p><strong>Product Price:</strong> ₹<span id="productPrice"></span></p>
            <p><strong>Delivery Charge:</strong> ₹<span id="deliveryCharge"></span></p>
            <hr>
            <p><strong>Total Price:</strong> ₹<span id="totalPrice"></span></p>

            <h3>Choose Payment Method</h3>
            <div class="payment-options">
                <label>
                    <input type="radio" name="paymentMethod" value="cod"> Cash on Delivery (COD)
                </label>
                <label>
                    <input type="radio" name="paymentMethod" value="online" checked> Pay Online
                </label>
            </div>
            <input type="text" id="productId" hidden>

            <button onclick="placeOrder()">Place Order</button>
        </div>
    </div>
    </div>

    <div id="orderPopup" class="popup">
        <div class="popup-card">
            <div class="checkmark">✅</div>
            <h2>🎉Order Placed!🎉</h2>
            <p>Your order has been successfully placed.</p>
            <p>Thank you for shopping with us!</p>
            <button onclick="closePopup()">OK</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="/cartify/helper/razorpay/razorpayPayment.js"></script>
    <script src="script.js"></script>
    <script src="./../address/loadAddress.js"></script>
    <?= Footer::user(); ?>

</body>

</html>