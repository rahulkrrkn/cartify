document.getElementById("searchIcon").addEventListener("click", function () {
  document.getElementById("searchBar").style.display = "block";
});

document.getElementById("closeSearch").addEventListener("click", function () {
  if (isMobile()) {
    document.getElementById("searchBar").style.display = "none";
  }
});
function showSuggestions() {
  document.getElementById("suggestionsBox").style.display = "block";
  document.getElementById("closeSearch").style.display = "block";
}
function hideSuggestions() {
  setTimeout(() => {
    showMessage({ message: "",  });
    document.getElementById("suggestionsBox").style.display = "none";
    document.getElementById("closeSearch").style.display = "none";
  }, 1000);
}

let debounceTimer;

document
  .getElementById("navSearchInput")
  .addEventListener("input", function () {
    clearTimeout(debounceTimer);

    const query = this.value.trim();
    if (query === "") {
      document.getElementById("navProductResult").innerHTML = "";
      return;
    }

    debounceTimer = setTimeout(() => {
      if (query.length > 3) {
        document.getElementById("searchMessage").innerHTML =
          "<center><h4>Searching ...</h4></center>";
        searchItems(query);
      } else {
        document.getElementById("navCategoryResult").innerHTML = "";
        document.getElementById("searchMessage").innerHTML =
          "<center><h4>Type atlist 3 latter for search </h4></center>";
      }
    }, 500); // 500ms debounce delay
  });

function searchItems(search) {
  sendAxios("/cartify/user/functions/searchProduct.api.php", { search }).then(
    (res) => {
      let categoryTag = document.getElementById("navCategoryResult");
      let productDetail = document.getElementById("navProductResult");
      let categoryDataStore = "";
      let productDataStore = "";

      categoryData = res.data.category;
      productData = res.data.product;
      // count total data
  
      if(categoryData.length == 0 && productData.length == 0) {
        document.getElementById("searchMessage").innerHTML = `<center><h4>No data found</h4></center>`;
        return;
      }


      if (categoryData.length != 0) {
        categoryDataStore = `<h4>Categories</h4>
                    <div>
                        <ul>`;
        categoryData.forEach((e) => {
          categoryDataStore += `<li onclick="searchCategoryId(${e.SNo},event)">${e.SubCategory}</li>`;
        });
        categoryDataStore += `</ul></div>`;
      }
      if (productData.length != 0) {
        productDataStore = `<h4>Products</h4> <div>`;

        productData.forEach((e) => {
          let productName = e.ProductName;
          if (e.VarentTypeValue1 || e.VarentTypeValue2 || e.VarentTypeValue3) {
            productName += " (";
            if (e.VarentTypeValue1) {
              productName += `${e.VarentTypeValue1}`;
            }
            if (e.VarentTypeValue2) {
              productName += `, ${e.VarentTypeValue2}`;
            }
            if (e.VarentTypeValue3) {
              productName += `, ${e.VarentTypeValue3}`;
            }
            productName += ")";
          }

          productDataStore += `<div class="nevProductCart" onclick="searchClickOnProduct(${e.SNo},event)">
                            
                                <div class="navProductImage">
                                    <img loading="lazy"  src="/cartify/uploads/productImg/${e.ProductImage1}" alt="">
                                </div>
                                <div class="navProductDetail">
                                    ${productName}
                                </div>
                          
                        </div>`;
        });
        productDataStore += `<div>`;
      }
      document.getElementById("searchMessage").innerHTML = "";
      categoryTag.innerHTML = "";
      productDetail.innerHTML = "";
      categoryTag.innerHTML += categoryDataStore;
      productDetail.innerHTML += productDataStore;

    }
  );
  //   console.log(search);
}
function searcProducts() {
  searchData = document.getElementById("navSearchInput").value
  if (searchData.length < 3) {
    showMessage({
      message: "Please type atlist 3 latter for search",
      status: "error",
    });
    return;
  }
    window.location.href =
      "/cartify/user/products/?search=" +
      document.getElementById("navSearchInput").value;
}

function searchClickOnProduct(id, e) {
  e.preventDefault();
  // showMessage({ message: "Search Category Id: " + id, status: "success" });
  sendAxios("/cartify/user/functions/productsClick.api.php", {
    productVariantsSNo: id,
    type: "clickOnProduct",
  }).then((res) => {
    window.location.href = "/cartify/user/product/";
    
  });
}
function searchCategoryId(id,e) {
  e.preventDefault();
  window.location.href = "/cartify/user/products/?searchCategoryId=" + id;
}
