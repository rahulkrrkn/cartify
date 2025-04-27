var LoadMultipleProduct = (filter) => {
  loadingPage("start");
  sendAxios("/cartify/user/products/getMultipleProduct.api.php", {
    filter: filter,
  })
    .then((response) => {
      console.log(response.data);
      data = response.data.Product;
      data.forEach((e) => {
        document.getElementById(
          "allProducts"
        ).innerHTML += `<div class="productCard" id="productCard" onclick="clickOnProduct(${
          e.ProductVariantsSNo
        }, event)">
    <div class="wishlist" id="wishlist${
      e.ProductVariantsSNo
    }" onclick="wishlist(${e.ProductVariantsSNo}, event)">
        ${
          e.WishListIs == true
            ? "<i class='fa-solid fa-heart fa-lg'></i>"
            : "<i class='fa-regular fa-heart fa-lg'></i>"
        }
    </div>
    <div class="productImage">
        <img loading="lazy"  src="/cartify/uploads/productImg/${
          e.ProductImage1
        }" alt="Product Image" />
    </div>
    <div class="productName">
        <p id="productName">${e.ProductName}</p>
    </div>
    <div class="variety">
        <p id="variety">
            ${e.VarentTypeValue1 ? e.VarentTypeValue1 : ""} 
            ${
              e.VarentTypeValue2
                ? '<i class="fa-solid fa-angle-right"></i>' + e.VarentTypeValue2
                : ""
            } 
            ${
              e.VarentTypeValue3
                ? '<i class="fa-solid fa-angle-right"></i>' + e.VarentTypeValue3
                : ""
            }
        </p>
    </div>
    <div class="rating">
        <div class="starRating">
            <p id="starRating">${e.AverageRating ? e.AverageRating : "-"}</p>
            <i class="fa-solid fa-star fa-xs" style="color: #ffffff"></i>
        </div>
        <div class="TotalRatings">
            <p id="TotalRatings">(${e.TotalRatings ? e.TotalRatings : "0"})</p>
        </div>
    </div>
    <div class="price">
        <div class="buyingPrice">
            <i class="fa-solid fa-indian-rupee-sign"></i>
            <p id="buyingPrice">${e.OfferPrice}</p>
        </div>
        <div class="mrp">
            <i class="fa-solid fa-indian-rupee-sign fa-xs"></i>
            <del><p id="mrp">${e.MRPPrice}</p></del>
        </div>
        <div class="discount">
            <p id="discount">${(
              ((e.MRPPrice - e.OfferPrice) / e.MRPPrice) *
              100
            ).toFixed(2)}</p>
            <p>% Off</p>
        </div>
    </div>
    <div class="deliveryCharge">
        <p>${e.LocalDeliveryCharge > 1 ? "" : "Free Delivery"}</p>
    </div>
    <div class="stock">
      <p style="color: ${e.Stocks === 0 ? "red" : "green"};">  
      ${
        e.Stocks === 0
          ? "Out of Stock"
          : e.Stocks < 10
          ? `Only ${e.Stocks} left`
          : ""
      }
        </p>
      </div>   
    <div class="cartAndBuy">
        <button id="wishlist" onclick="wishlist(${
          e.ProductVariantsSNo
        }, event)">
             ${
               e.WishListIs
                 ? "<i class='fa-solid fa-heart fa-lg'></i>"
                 : "<i class='fa-regular fa-heart fa-lg'></i>"
             }
        </button>
        <button id="addToCart" onclick="addToCart(${
          e.ProductVariantsSNo
        }, event)">
               ${e.AddToCartIs == true ? "Remove" : "Add To Cart"}
        </button>
        <button id="buyNow" onclick="buyNow(${e.ProductVariantsSNo}, event)"${
          e.Stocks === 0 ? "disabled" : ""
        }>Buy Now</button>
    </div>
    </div>`;
      });

      document.querySelector("#WishlistCount").innerHTML =
        response.data.TotalWishListCount;
      document.querySelector("#CartCount").innerHTML =
        response.data.TotalCartCount;
      // console.log(data);
      loadingPage("end");
    })
    .catch((error) => {
      loadingPage("end");
    })
    .finally(() => {
      loadingPage("end");
    });
};
LoadMultipleProduct();
