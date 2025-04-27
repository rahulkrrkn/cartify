<?php
const rootDir = "../../../../";

require_once rootDir . "/lib/frontend.inc.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  Head::seller();
  ?>

  <title>Category Management</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    .searchData {
      position: relative;
    }

    .searchResult {
      position: absolute;
      top: 50px;
      left: 0;
      right: 0;
      max-height: 300px;
      overflow-y: scroll;
      background-color: #fff;
    }
  </style>
</head>

<body>
  <?php Header::seller(); ?>
  <div class="container">
    <div class="selectCategory">
      <h2>Search Categories</h2>
      <div class="searchData">
        <!-- Search Input -->
        <div class="searchButton">
          <input id="searchInput" type="text" placeholder="Type to search..." />
          <!-- <button id="searchBtn">Search</button> -->
        </div>

        <!-- Search Results -->
        <div class="searchResult" id="searchResult"></div>
      </div>
    </div>
  </div>

  <div id="categoryCreateMainDiv">
    <form id="addCategoryForm" enctype="multipart/form-data">
      <div id="allCategoryDiv">
        <div>
          <h3>Main Category</h3>
          <select id="selectMainCategory" name="selectMainCategory">
            <option value="" disabled selected>Select Main Category</option>
          </select>
          <img loading="lazy" id="mainCategoryImageView" src="./selecet-category.jpg" alt="Main Category Image" />
        </div>

        <div>
          <h3>Category</h3>
          <select id="selectCategory" name="selectCategory">
            <option value="" disabled selected>Select Category</option>
          </select>
          <img loading="lazy" id="categoryImageView" src="./selecet-category.jpg" alt="Category Image" />
        </div>

        <div>
          <h3>Sub Category</h3>
          <select id="selectSubCategory" name="selectSubCategory">
            <option value="" disabled selected>Select Sub Category</option>
          </select>
          <img loading="lazy" id="subCategoryImageView" src="./selecet-category.jpg" alt="Sub Category Image" />
        </div>
      </div>

      <div id="ViewfilledSpecificationDiv">
        <!-- <h2>Specification to be Filled</h2> -->
        <div id="ViewfilledSpecification"></div>
      </div>
      <input type="text" id="categoryId" name="categoryId" value="" hidden>
      <!-- <input type="text" id="categoryId" name="categoryId" value="" hidden> -->

      <p id="createCategoryMessage">.</p>
    </form>
    <div class="links">
      <a class="btn" href="/cartify/admin/category/add-category/">Create Category</a>
      <button id="goToNext" onclick="goToNext()">Next</button>
    </div>
  </div>

  <script src="./script.js"></script>

  <?php Footer::seller(); ?>
</body>

</html>