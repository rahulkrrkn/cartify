<?php
const rootDir = "../../..";
require_once rootDir . "/lib/frontend.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php Head::admin(); ?>


    <title>Add or View Category</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php Header::admin(); ?>
    <div id="CategoryCreateMainDiv">
        <h1>View or Add New Category</h1>
        <form id="addCategoryForm" enctype="multipart/form-data">
            <div id="AllCategoryDiv">
                <div id="MainCategoryDiv">
                    <h3>Main Category</h3>
                    <div class="CategoryCreateForSelect" id="MainCategorySelectArea">
                        <div>
                            <label for="options"> Select Main Category: </label>
                            <select id="SelectMainCategory" name="SelectMainCategory">
                                <option value="" disabled selected>Select Main Category</option>
                            </select>
                        </div>
                        <div>
                            <img loading="lazy"
                                id="MainCategoryImageView"
                                src="/cartify/admin/category/add-category/selecet-category.jpg"
                                alt="Main Categor" />
                        </div>
                    </div>
                    <div class="CategoryCreateForNew" id="MainCategoryCreateForNew">
                        <div>
                            <input
                                type="text"
                                id="MainCategoryInputBox"
                                name="MainCategoryInputBox"
                                required
                                placeholder="Enter Main Category" />
                        </div>
                        <div class="ImageUplodeMain">
                            <label for="ImgUplodeInput1" id="ImgUplodeLabelId1">
                                <input
                                    type="file"
                                    accept="image/*"
                                    id="ImgUplodeInput1"
                                    name="ImgUplodeInput1"
                                    hidden />
                                <div id="imguplodedivid1">
                                    <img loading="lazy" src="/cartify/admin/category/add-category/drop.png" alt="" />
                                    <p>
                                        Drag and drop or click here to<br />
                                        Upload Main Category Image
                                    </p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div id="CategoryDiv">
                    <h3>Category</h3>
                    <div class="CategoryCreateForSelect" id="CategorySelectArea">
                        <div>
                            <label for="options"> Select Category: </label>
                            <select id="SelectCategory" name="SelectCategory">
                                <option value="" disabled selected>Select Category</option>
                            </select>
                        </div>
                        <div>
                            <img loading="lazy"
                                id="CategoryImageView"
                                src="/cartify/admin/category/add-category/selecet-category.jpg"
                                alt="Main Categor" />
                        </div>
                    </div>
                    <div class="CategoryCreateForNew" id="CategoryCreateForNew">
                        <div>
                            <input
                                type="text"
                                id="CategoryInputBox"
                                name="CategoryInputBox"
                                required
                                placeholder=" Enter Category" />
                        </div>
                        <div class="ImageUplodeMain">
                            <label for="ImgUplodeInput2" id="imguplodelabelid2">
                                <input
                                    type="file"
                                    accept="image/*"
                                    id="ImgUplodeInput2"
                                    name="ImgUplodeInput2"
                                    hidden />
                                <div id="imguplodedivid2">
                                    <img loading="lazy" src="/cartify/admin/category/add-category/drop.png" alt="" />
                                    <p>
                                        Drag and drop or click here to<br />
                                        Upload Category Image
                                    </p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div id="SubCategoryDiv">
                    <h3>Sub Category</h3>
                    <div class="CategoryCreateForSelect" id="SubCategorySelectArea">
                        <div>
                            <label for="options"> Select Sub Category: </label>
                            <select id="SelectSubCategory" name="SelectSubCategory">
                                <option value="" disabled selected>Select Sub Category</option>
                            </select>
                        </div>
                        <div>
                            <img loading="lazy"
                                id="SubCategoryImageView"
                                src="/cartify/admin/category/add-category/selecet-category.jpg"
                                alt="Main Categor" />
                        </div>
                    </div>
                    <div class="CategoryCreateForNew" id="SubCategoryCreateForNew">
                        <div>
                            <input
                                type="text"
                                id="SubCategoryInputBox"
                                name="SubCategoryInputBox"
                                placeholder="Enter Sub Category" />
                        </div>
                        <div class="ImageUplodeMain">
                            <label for="ImgUplodeInput3" id="ImgUplodeLabelId3">
                                <input
                                    type="file"
                                    accept="image/*"
                                    id="ImgUplodeInput3"
                                    name="ImgUplodeInput3"
                                    hidden />
                                <div id="imguplodedivid3">
                                    <img loading="lazy" src="/cartify/admin/category/add-category/drop.png" alt="" />
                                    <p>
                                        Drag and drop or click here to <br />
                                        Upload Sub Category Image
                                    </p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div id="AttributeMainDiv">



                <div id="forView">
                    <div id="AttributeDivForSee">
                        <h2>Already Selected Attributes</h2>
                        <div class="selectedAttributeValues"></div>
                    </div>
                    <div id="ForAlreadyDrecriptionSetView">
                    </div>

                </div>



                <div id="forSelect">
                    <div id="AttributeDivForSelect">
                        <h3>Attributes</h3>
                        <p>You can only select 15 attributes</p>
                        <div id='ForSelectAttribute'></div>
                    </div>
                    <div id="DescriptionDivForSelect">
                        <h3>Description</h3>
                        <p>You can only select 40 description data</p>
                        <div id='ForSelectDescription'></div>
                    </div>
                </div>











                <p id="CreateCategoryMessage">.</p>
                <div id="CreateCategoryButtonDiv">
                    <button type="submit" id="CreateCategoryButton">Create Category</button>
                </div>
            </div>
        </form>
    </div>
    <script src="./script.js" defer async></script>
    <?php Footer::admin(); ?>
</body>

</html>