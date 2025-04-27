<?php
const rootDir = "../../../../";

require_once rootDir . "/lib/frontend.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::seller(); ?>
    <title>Add Product Details</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php Header::seller(); ?>
    <h2 style="display: flex; justify-content: center;">Add Product Details</h2>
    <form enctype="multipart/form-data" style="margin-top: 10px" ;">
        <div class="AddVarityMain">
            <div class="AlreadyFilledData">
                <div class="ProductSNo">
                    <p>Product SNo :</p>
                    <p id="ProductSNo"></p>
                </div>
                <div class="ProductVaritySNo">
                    <p>Product Variety SNo :</p>
                    <p id="ProductVaritySNo"></p>
                </div>
                <div class="ProductName">
                    <p>Product Name :</p>
                    <p id="ProductName"></p>
                </div>

                <div class="ProductDescription">
                    <p>Product Description :</p>
                    <p id="ProductDescription"></p>
                </div>
                <div class="ProductVarity1">
                    <p>Product Variety 1 :</p>
                    <p id="ProductVarity1"></p>
                </div>
                <div class="ProductVarity2">
                    <p>Product Variety 2 :</p>
                    <p id="ProductVarity2"></p>
                </div>
                <div class="ProductVarity3">
                    <p>Product Variety 3 :</p>
                    <p id="ProductVarity3"></p>
                </div>
                <div class="ProductCategory">
                    <p>Product Category :</p>
                    <p id="ProductCategory"></p>
                </div>
            </div>
            <div class="NewForFill">
                <div class="ProductPrice">
                    <div class="MrpPrice">
                        <label for="Mrp">MRP :</label>
                        <input type="text" id="Mrp" name="Mrp" />
                    </div>
                    <div class="OfferPrice">
                        <label for="OfferPrice">Selling Price :</label>
                        <input type="text" id="OfferPrice" name="OfferPrice" />
                    </div>
                    <div class="TotalDescount">
                        <label for="OfferPrice">Descount : (%)</label>
                        <input
                            type="text"
                            id="TotalDescount"
                            name="TotalDescount"
                            readonly />
                    </div>
                    <div class="AvailableStock">
                        <label for="AvailableStock">Available Stocks :</label>
                        <input type="text" id="AvailableStock" name="AvailableStock" />
                    </div>
                </div>

                <div class="AddVarityValue">
                    <div id="AddVarityValue1"></div>
                    <div id="AddVarityValue2"></div>
                    <div id="AddVarityValue3"></div>
                </div>

                <div class="FixedDescription" id="FixedDescription"></div>
                <div>
                    <div class="Description">
                        <label for="Description">Description :</label>
                        <textarea name="Description" id="Description"></textarea>
                    </div>
                </div>
                <div class="ForImageUplode">
                    <p class="For3ImageUplode">First 3 images are required</p>
                    <div class="ImageUplodeMain">
                        <label for="ImgUplode0" id="ImgUplodeLabelId0">
                            <input
                                type="file"
                                accept="image/*"
                                id="ImgUplode0"
                                name="ImgUplode0"
                                hidden />
                            <div id="imguplodedivid0">
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-first-varity/drop.png" alt="" />
                                <p>
                                    Drag and drop or click here <br />
                                    to Upload Product Image
                                </p>
                            </div>
                        </label>
                    </div>

                    <div class="ImageUplodeMain">
                        <label for="ImgUplode1" id="ImgUplodeLabelId1">
                            <input
                                type="file"
                                accept="image/*"
                                id="ImgUplode1"
                                name="ImgUplode1"
                                hidden />
                            <div id="imguplodedivid1">
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-first-varity/drop.png" alt="" />
                                <p>
                                    Drag and drop or click here <br />
                                    to Upload Product Image
                                </p>
                            </div>
                        </label>
                    </div>

                    <div class="ImageUplodeMain">
                        <label for="ImgUplode2" id="ImgUplodeLabelId2">
                            <input
                                type="file"
                                accept="image/*"
                                id="ImgUplode2"
                                name="ImgUplode2"
                                hidden />
                            <div id="imguplodedivid2">
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-first-varity/drop.png" alt="" />
                                <p>
                                    Drag and drop or click here <br />
                                    to Upload Product Image
                                </p>
                            </div>
                        </label>
                    </div>

                    <div class="ImageUplodeMain">
                        <label for="ImgUplode3" id="ImgUplodeLabelId3">
                            <input
                                type="file"
                                accept="image/*"
                                id="ImgUplode3"
                                name="ImgUplode3"
                                hidden />
                            <div id="imguplodedivid3">
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-first-varity/drop.png" alt="" />
                                <p>
                                    Drag and drop or click here <br />
                                    to Upload Product Image
                                </p>
                            </div>
                        </label>
                    </div>

                    <div class="ImageUplodeMain">
                        <label for="ImgUplode4" id="ImgUplodeLabelId4">
                            <input
                                type="file"
                                accept="image/*"
                                id="ImgUplode4"
                                name="ImgUplode4"
                                hidden />
                            <div id="imguplodedivid4">
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-first-varity/drop.png" alt="" />
                                <p>
                                    Drag and drop or click here <br />
                                    to Upload Product Image
                                </p>
                            </div>
                        </label>
                    </div>

                    <div class="ImageUplodeMain">
                        <label for="ImgUplode5" id="ImgUplodeLabelId5">
                            <input
                                type="file"
                                accept="image/*"
                                id="ImgUplode5"
                                name="ImgUplode5"
                                hidden />
                            <div id="imguplodedivid5">
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-first-varity/drop.png" alt="" />
                                <p>
                                    Drag and drop or click here <br />
                                    to Upload Product Image
                                </p>
                            </div>
                        </label>
                    </div>

                    <div class="ImageUplodeMain">
                        <label for="ImgUplode6" id="ImgUplodeLabelId6">
                            <input
                                type="file"
                                accept="image/*"
                                id="ImgUplode6"
                                name="ImgUplode6"
                                hidden />
                            <div id="imguplodedivid6">
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-first-varity/drop.png" alt="" />
                                <p>
                                    Drag and drop or click here <br />
                                    to Upload Product Image
                                </p>
                            </div>
                        </label>
                    </div>

                    <div class="ImageUplodeMain">
                        <label for="ImgUplode7" id="ImgUplodeLabelId7">
                            <input
                                type="file"
                                accept="image/*"
                                id="ImgUplode7"
                                name="ImgUplode7"
                                hidden />
                            <div id="imguplodedivid7">
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-first-varity/drop.png" alt="" />
                                <p>
                                    Drag and drop or click here <br />
                                    to Upload Product Image
                                </p>
                            </div>
                        </label>
                    </div>

                    <div class="ImageUplodeMain">
                        <label for="ImgUplode8" id="ImgUplodeLabelId8">
                            <input
                                type="file"
                                accept="image/*"
                                id="ImgUplode8"
                                name="ImgUplode8"
                                hidden />
                            <div id="imguplodedivid8">
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-first-varity/drop.png" alt="" />
                                <p>
                                    Drag and drop or click here <br />
                                    to Upload Product Image
                                </p>
                            </div>
                        </label>
                    </div>

                    <div class="ImageUplodeMain">
                        <label for="ImgUplode9" id="ImgUplodeLabelId9">
                            <input
                                type="file"
                                accept="image/*"
                                id="ImgUplode9"
                                name="ImgUplode9"
                                hidden />
                            <div id="imguplodedivid9">
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-first-varity/drop.png" alt="" />
                                <p>
                                    Drag and drop or click here <br />
                                    to Upload Product Image
                                </p>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="ForSubmitOrNext">
                <input type="text" id="TotalFixedDescription" hidden />
                <button class="btnP2" id="AddMoreVarity">Add More Variety</button>
                <button class="btnP2" id="SubmitVarity">Submit</button>
            </div>
        </div>
    </form>
    <script src="./script.js"></script>
    <?php Footer::seller(); ?>
</body>

</html>