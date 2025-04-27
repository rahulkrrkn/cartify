<?php
const rootDir = "../../../../";

require_once rootDir . "/lib/frontend.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::seller(); ?>
    <title>Add Product</title>
</head>
<style>
    :root {
        --AddMoreVarityBgColor: #b7b2b2;
        --AddMoreVarityColor: #000000;
        --AddMoreVarityBorder: #a7a6a6;
        --AddMoreVarityInnerBox: #ffffff;
        --AddMoreVarityButtonbg: #f53082;
        --AddMoreVarityButtonColor: #ffffff;
    }

    .DarkMode {
        --AddMoreVarityBgColor: #343a40;
        --AddMoreVarityColor: #ffffff;
        --AddMoreVarityBorder: #898787;
        --AddMoreVarityInnerBox: #000000;
        --AddMoreVarityButtonbg: #6763f4;
        --AddMoreVarityButtonColor: #ffffff;
    }

    .AddMoreVarity {
        background-color: var(--AddMoreVarityBgColor);
        color: var(--AddMoreVarityColor);
        padding: 10px;
        border-top: 2px solid var(--AddMoreVarityColor);
    }

    .MoreVarityFixedData {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        /* margin: 10px; */
        /* padding: 10px; */
        background-color: var(--AddMoreVarityInnerBox);
        border: 1px solid var(--AddMoreVarityBorder);
        border-radius: 10px;
    }

    .MoreVarityFixedData>div {
        display: flex;
        border: 1px solid var(--AddMoreVarityBorder);
        border-radius: 10px;
        padding: 5px;
        margin: 5px;
        background-color: var(--AddMoreVarityInnerBox);
    }

    .MoreVarityFixedData>div>p {
        margin: 0 5px;
    }

    .AlreadyAddedVarityTypes {
        background-color: var(--AddMoreVarityInnerBox);
        border: 1px solid var(--AddMoreVarityBorder);
        border-radius: 10px;
        padding: 5px;
        margin: 5px;
    }

    .AlreadyAddedVarityTypes>div {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid var(--AddMoreVarityBorder);
    }

    .AlreadyAddedVarityTypes>div>div {
        /* border: 1px solid var(--AddMoreVarityBorder); */
        border-right: 1px solid var(--AddMoreVarityBorder);
        border-left: 1px solid var(--AddMoreVarityBorder);
        /* border-bottom: 2px solid var(--AddMoreVarityBorder); */
        /* height: 25px; */
        /* border-radius: 10px; */
        padding: 5px;
        width: 100%;
        text-align: center;
    }

    /* .AlreadyAddedVarityTypes >  div:first-child{
        border-bottom: none;
    }
    .AlreadyAddedVarityTypes >  div:nth-child(2){
        border-top: none;
    } */
    .AlreadyAddedVarityTypes>div:first-child,
    .AlreadyAddedVarityTypes>div:nth-child(2) {
        border: 1px solid red;
        background-color: #ff0000;
        color: #ffffff;
        font-weight: 800;
    }

    .NewForFill>div {
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        background-color: var(--AddMoreVarityInnerBox);
        border: solid 1px var(--AddMoreVarityBorder);
        border-radius: 10px;
        padding: 5px;
        margin: 5px;
    }

    .ProductPrice>div,
    .AddVarityValue>div,
    .FixedDescription>div {
        /* display: flex; */
        background-color: var(--AddMoreVarityInnerBox);
        border: solid 1px var(--AddMoreVarityBorder);
        border-radius: 10px;
        padding: 5px;
        margin: 5px;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }

    .ProductPrice>div label,
    .AddVarityValue>div label,
    .FixedDescription>div label {
        display: block;
        margin: 5px;
    }

    .ProductPrice>div input {
        width: 100px;
        padding: 10px;
        border-radius: 5px;
        border: solid 1px var(--AddMoreVarityBorder);
        font-size: 16px;
    }

    .AddVarityValue>div input,
    .FixedDescription>div input {
        width: 150px;
        padding: 10px;
        border-radius: 5px;
        border: solid 1px var(--AddMoreVarityBorder);
        font-size: 16px;
    }

    .Description {
        width: 95%;
    }

    .Description>label {
        display: block;
        margin: 5px;
        padding: 5px;
    }

    .Description>textarea {
        width: 100%;
        height: 100px;
        padding: 10px;
        border-radius: 5px;
        border: solid 1px var(--AddMoreVarityBorder);
        font-size: 16px;
        box-sizing: border-box;
    }

    .AreYouWantToUplodeImage {
        background-color: var(--AddMoreVarityInnerBox);
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px;
        border: 1px solid var(--AddMoreVarityBorder);
        border-radius: 10px;
        padding: 5px;
    }

    .ForImageUplode {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 1px;
        flex-wrap: wrap;
    }

    .ImageUplodeMain {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 1px;
    }

    .ImageUplodeMain>label {
        width: 160px;
        height: 160px;
        padding: 10px;
        background: var(--AddMoreVarityInnerBox);
        text-align: center;
        border-radius: 15px;
        margin: 10px;
    }

    .ImageUplodeMain>label>div {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        border: 2px dashed var(--AddMoreVarityColor);
        background-position: center;
        background-size: cover;
    }

    .ImageUplodeMain>label>div>img {
        width: 80px;
        height: 80px;
    }

    .ImageUplodeMain>label>div>p {
        color: var(--AddMoreVarityBorder);
        margin: 0 5px;
        padding: 0 5px;
    }

    .For3ImageUplode {
        width: 100%;
        text-align: center;
        color: red;
    }

    .ForSubmitOrNext {
        display: flex;
        justify-content: right;
        align-items: center;
    }

    .ForSubmitOrNext button {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
        background-color: var(--AddMoreVarityButtonbg);
        color: var(--AddMoreVarityButtonColor);
        margin: 5px;
    }

    .AreYouWantToUploadImage {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 10px;
        border: 1px solid var(--AddMoreVarityBorder);
        border-radius: 10px;
        padding: 5px;
        background: var(--AddMoreVarityInnerBox);
    }

    .AreYouWantToUploadImage label {
        padding-right: 10px;
    }
</style>

<body>
    <?php Header::seller(); ?>
    <div class="AddMoreVarityMain">
        <form>
            <div class="AddMoreVarity">
                <div class="MoreVarityFixedData">
                    <div class="ProductSNo">
                        <p>Product S.No :</p>
                        <p id="ProductSNo"></p>
                    </div>
                    <div class="ProductVaritySNo">
                        <p>Product Variety S.No :</p>
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
                    <div class="ProductCategory">
                        <p>Product Category :</p>
                        <p id="ProductCategory"></p>
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
                </div>
                <div class="AlreadyAddedVarityTypes">
                    <div>
                        <div>Variety 1</div>
                        <div>Variety 2</div>
                        <div>Variety 3</div>
                    </div>
                    <div>
                        <div id="AlreadyAddedVarityType1"></div>
                        <div id="AlreadyAddedVarityType2"></div>
                        <div id="AlreadyAddedVarityType3"></div>
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
                </div>
                <div class="AreYouWantToUploadImage">
                    <label for="AreYouWantToUploadImage">Do you want to upload image?</label>
                    <input
                        type="radio"
                        id="UploadYes"
                        name="AreYouWantToUploadImage"
                        checked
                        value="Yes" />
                    <label for="UploadYes">Yes</label>
                    <input
                        type="radio"
                        id="UploadNo"
                        name="AreYouWantToUploadImage"
                        value="No" />
                    <label for="UploadNo">No</label>
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
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-varity/drop.png" alt="" />
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
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-varity/drop.png" alt="" />
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
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-varity/drop.png" alt="" />
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
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-varity/drop.png" alt="" />
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
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-varity/drop.png" alt="" />
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
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-varity/drop.png" alt="" />
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
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-varity/drop.png" alt="" />
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
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-varity/drop.png" alt="" />
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
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-varity/drop.png" alt="" />
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
                                <img loading="lazy" src="/cartify/seller/product/add-product/add-varity/drop.png" alt="" />
                                <p>
                                    Drag and drop or click here <br />
                                    to Upload Product Image
                                </p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="ForSubmitOrNext">
                    <input type="text" id="TotalFixedDescription" hidden />
                    <button id="AddMoreVarity">Add More</button>
                    <button id="SubmitVarity">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
    <?php Footer::seller(); ?>
</body>

</html>