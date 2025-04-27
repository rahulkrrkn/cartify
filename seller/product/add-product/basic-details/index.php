<?php
const rootDir = "../../../../";

require_once rootDir . "/lib/frontend.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::seller(); ?>
    <title>Add New Product Basic Details</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php Header::seller(); ?>

    <div class="AddnewProductMainDiv">
        <h1>Add New Product Basic Details</h1>
        <!-- Main Product Main Data Start -->
        <div class="MainProductMainData">
            <div class="category">
                <h3>Category</h3>
                <div>
                    <label for="SelectCategorySno">Category SNo:</label>
                    <input type="text" id="SelectCategorySno" name="SelectCategorySno" readonly />
                </div>
                <div>
                    <label for="SelectMainCategory">Main Category:</label>
                    <input type="text" id="SelectMainCategory" name="SelectMainCategory" readonly />
                </div>
                <div>
                    <label for="MainProductSelectCategory">Category:</label>
                    <input type="text" id="MainProductSelectCategory" name="MainProductSelectCategory" readonly />
                    <!-- <div id="MainProductSelectCategory">Sub Category</div> -->
                </div>
                <div>
                    <label for="MainProductSelectSubCategory">Sub Category:</label>
                    <input type="text" id="MainProductSelectSubCategory" name="MainProductSelectSubCategory" readonly />
                </div>

            </div>

            <div>
                <label for="MainProductName">Product Name</label>
                <input type="text" id="MainProductName" name="MainProductName" />
            </div>
            <div>
                <label for="MainProductDescription">Product Description</label>
                <textarea
                    name="MainProductDescription"
                    id="MainProductDescription"
                    cols="30"
                    rows="10"></textarea>
            </div>
            <div class="MainProductExtraData">
                <div>
                    <label for="MainProductBrand">Brand</label>
                    <input type="text" id="MainProductBrand" name="MainProductBrand" />
                </div>
                <div>
                    <label for="DispachIn">Dispatch in (days)</label>
                    <input type="text" id="DispachIn" name="DispachIn" />
                </div>
                <div>
                    <label for="Keywords">Keyword</label>
                    <textarea name="Keywords" id="Keywords"></textarea>
                </div>
            </div>
        </div>
        <div class="MainProductNextButton MainProductMainDataBtn">
            <div></div>
            <button id="MainProductNext2">
                Next <i class="fa-solid fa-arrow-right fa-lg"></i>
            </button>
        </div>
        <!-- Main Product Main Data End -->

        <!-- Main Product Varity Type Start -->
        <div class="MainProductVarityType">
            <h2>Variety Type</h2>
            <div>
                <label for="VaritySelection1">Select 1st Variety</label>
                <select name="VaritySelection1" id="VaritySelection1">
                    <option value="No" selected>Select</option>
                </select>
            </div>
            <div>
                <label for="VaritySelection2">Select 2nd Variety</label>
                <select name="VaritySelection2" id="VaritySelection2">
                    <option value="No" selected>Select</option>
                </select>
            </div>
            <div>
                <label for="VaritySelection3">Select 3rd Variety</label>
                <select name="VaritySelection3" id="VaritySelection3">
                    <option value="No" selected>Select</option>
                </select>
            </div>
        </div>
        <div class="MainProductNextButton MainProductVarityTypeBtn">
            <button id="MainProductBack2">
                <i class="fa-solid fa-arrow-left fa-lg"></i> Previous
            </button>
            <button id="MainProductNext3">
                Next <i class="fa-solid fa-arrow-right fa-lg"></i>
            </button>
        </div>
        <!-- Main Product Varity Type End -->

        <!-- Main Product Fixed Description Data Start -->
        <div class="MainProductFixedDescriptionData">
            <h2>Fixed Description Details</h2>
        </div>
        <div class="MainProductNextButton MainProductFixedDescriptionDataBtn">
            <button id="MainProductBack3">
                <i class="fa-solid fa-arrow-left fa-lg"></i> Previous
            </button>
            <button id="MainProductNext4">
                Next <i class="fa-solid fa-arrow-right fa-lg"></i>
            </button>
        </div>

        <!-- Main Product Fixed Description Data End -->
        <!-- Main Product Delivery Details Start -->
        <div class="MainProductDeliveryDetails">
            <h2>Delivery Details</h2>
            <div>
                <p>Local Delivery</p>
                <span>
                    <input
                        type="radio"
                        name="LocalDelivery"
                        id="LocalDeliveryYes"
                        value="Yes"
                        checked />
                    <label for="LocalDeliveryYes">Yes</label>
                    <input
                        type="radio"
                        name="LocalDelivery"
                        id="LocalDeliveryNo"
                        value="No" />
                    <label for="LocalDeliveryNo">No</label>
                </span>

                <label for="LocalDeliveryCharge">Delivery Charge</label>
                <input
                    type="text"
                    id="LocalDeliveryCharge"
                    name="LocalDeliveryCharge"
                    value="0" />
            </div>

            <div>
                <p>Zonal Delivery</p>
                <span>
                    <input
                        type="radio"
                        name="ZonalDelivery"
                        id="ZonalDeliveryYes"
                        value="Yes"
                        checked />
                    <label for="ZonalDeliveryYes">Yes</label>
                    <input
                        type="radio"
                        name="ZonalDelivery"
                        id="ZonalDeliveryNo"
                        value="No" />
                    <label for="ZonalDeliveryNo">No</label>
                </span>

                <label for="ZonalDeliveryCharge">Delivery Charge</label>
                <input
                    type="text"
                    id="ZonalDeliveryCharge"
                    name="ZonalDeliveryCharge"
                    value="0" />
            </div>
            <div>
                <p>National Delivery</p>
                <span>
                    <input
                        type="radio"
                        name="NationalDelivery"
                        id="NationalDeliveryYes"
                        value="Yes"
                        checked />
                    <label for="NationalDeliveryYes">Yes</label>
                    <input
                        type="radio"
                        name="NationalDelivery"
                        id="NationalDeliveryNo"
                        value="No" />
                    <label for="NationalDeliveryNo">No</label>
                </span>
                <label for="NationalDeliveryCharge">Delivery Charge</label>
                <input
                    type="text"
                    id="NationalDeliveryCharge"
                    name="NationalDeliveryCharge"
                    value="0" />
            </div>
            <div style="display: none;">
                <div class="ListOnUniversal">
                    <p>List On Universal</p>
                    <span>
                        <input
                            type="radio"
                            name="ListOnUniversal"
                            id="ListOnUniversalYes"
                            value="Yes"
                            checked />
                        <label for="ListOnUniversalYes">Yes</label>
                        <input
                            type="radio"
                            name="ListOnUniversal"
                            id="ListOnUniversalNo"
                            value="No" />
                        <label for="ListOnUniversalNo">No</label>
                    </span>
                </div>
                <div class="ListOnLocal">
                    <p>List On Local</p>
                    <span>
                        <input
                            type="radio"
                            name="ListOnLocal"
                            id="ListOnLocalYes"
                            value="Yes"
                            checked />
                        <label for="ListOnLocalYes">Yes</label>
                        <input type="radio" name="ListOnLocal" id="ListOnLocalNo" value="No" />
                        <label for="ListOnLocalNo">No</label>
                    </span>
                </div>
            </div>
        </div>
        <div class="MainProductNextButton MainProductDeliveryDetailsBtn">
            <button id="MainProductBack4">
                <i class="fa-solid fa-arrow-left fa-lg"></i> Previous
            </button>
            <button id="MainProductNext5">
                Next <i class="fa-solid fa-arrow-right fa-lg"></i>
            </button>
        </div>
        <!-- Main Product Delivery Details End -->

        <!-- Main Product Payment Method Start -->
        <div class="MainProductPaymentMethod">
            <h2>Payment Method</h2>
            <div>
                <input type="checkbox" id="COD" name="COD" checked />
                <label for="COD">COD</label>
            </div>

            <div>
                <input type="checkbox" id="UPI" name="UPI" checked />
                <label for="UPI">UPI</label>
            </div>

            <div style="display: none;">
                <input type="checkbox" id="PickupFromStore" name="PickupFromStore" />
                <label for="PickupFromStore">Pickup From Store</label>
            </div>
        </div>
        <div class="MainProductNextButton MainProductPaymentMethodBtn">
            <button id="MainProductBack5">
                <i class="fa-solid fa-arrow-left fa-lg"></i> Previous
            </button>
            <button id="MainProductSubmit">Submit</button>
        </div>
        <!-- Main Product Payment Details End -->
        <div>
            <p class="error"></p>
        </div>
    </div>

    <script src="script.js"></script>
    <?php Footer::seller(); ?>
</body>

</html>