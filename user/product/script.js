var InsertData = (IDWhereInsert, data) => {
  console.log(data);
  types = data.VarientsTypes;
  products = data.Varients;

  let VarientDataForScreen = "";
  if (
    data.VarientsTypes.type1 ||
    data.VarientsTypes.type2 ||
    data.VarientsTypes.type3
  ) {
    VarientDataForScreen += `${varientPopupHtml}<div id="SelectVarients" onclick="setVarients()"> <p><strong>Select Varients</strong></p>`;
    if (data.VarientsTypes.type1) {
      VarientDataForScreen += `  <div>
            <p> ${data.VarientsTypes.type1} : <strong>${
        data.MainProduct.VarentTypeValue1
      }</strong> </p>
            <p> ${getUniqueValues("VarentValue1").length - 1} More </p>
        </div>`;
    }
    if (data.VarientsTypes.type2) {
      VarientDataForScreen += `  <div>
            <p> ${data.VarientsTypes.type2} : <strong>${
        data.MainProduct.VarentTypeValue2
      }</strong> </p>
            <p> ${getUniqueValues("VarentValue2").length - 1} More </p>
        </div>`;
    }
    if (data.VarientsTypes.type3) {
      VarientDataForScreen += `  <div>
            <p> ${data.VarientsTypes.type3} : <strong>${
        data.MainProduct.VarentTypeValue3
      }</strong> </p>
            
            <p> ${getUniqueValues("VarentValue3").length - 1} More </p>
                              </div>`;
    }

    VarientDataForScreen += `</div> `;
  }

  // console.log(data);
  DescriptionAllData = "";
  data.MainProduct.DescriptionKeyValue.forEach((element) => {
    if (element.key != null) {
      DescriptionAllData += `<div>
              <p>${element.key}</p>
              <p>${element.Value}</p>
            </div>`;
    }
    //   DescriptionAllData += `<p>${element.Description}</p>`;
  });

  document.getElementById(
    IDWhereInsert
  ).innerHTML = `  <div class="ViewSingleProduct">
      <div class="AllImage">
        <div class="MainImage">
        <div class="SinglePageWishlist" id="SinglePageWishlist${
          data.MainProduct.ProductVariantsSNo
        }" onclick="wishlist(${data.MainProduct.ProductVariantsSNo},event)">
          ${
            data.MainProduct.WishListIs == true
              ? "<i class='fa-solid fa-heart fa-lg'></i>"
              : "<i class='fa-regular fa-heart fa-lg'></i>"
          }
            
          </div>
          <div class="SinglePageMainImageDiv">
          <img loading="lazy"  id="SinglePageMainImage"
          src="/cartify/uploads/productImg/${data.MainProduct.ProductImage1}"
          alt=""
          />
          </div>
        </div>
        <div class="RemainImages">
        ${
          data.MainProduct.ProductImage1 == null
            ? ""
            : `<img loading="lazy"  onclick="ViewBigImage('${data.MainProduct.ProductImage1}')"
            src="/cartify/uploads/productImg/${data.MainProduct.ProductImage1}"
            alt=""
          />`
        }
        ${
          data.MainProduct.ProductImage2 == null
            ? ""
            : `<img loading="lazy"  onclick="ViewBigImage('${data.MainProduct.ProductImage2}')"
            src="/cartify/uploads/productImg/${data.MainProduct.ProductImage2}"
            alt=""
          />`
        }
        ${
          data.MainProduct.ProductImage3 == null
            ? ""
            : `<img loading="lazy"  onclick="ViewBigImage('${data.MainProduct.ProductImage3}')"
            src="/cartify/uploads/productImg/${data.MainProduct.ProductImage3}"
            alt=""
          />`
        }
        ${
          data.MainProduct.ProductImage4 == null
            ? ""
            : `<img loading="lazy"  onclick="ViewBigImage('${data.MainProduct.ProductImage4}')"
            src="/cartify/uploads/productImg/${data.MainProduct.ProductImage4}"
            alt=""
          />`
        }
        ${
          data.MainProduct.ProductImage5 == null
            ? ""
            : `<img loading="lazy"  onclick="ViewBigImage('${data.MainProduct.ProductImage5}')"
            src="/cartify/uploads/productImg/${data.MainProduct.ProductImage5}"
            alt=""
          />`
        }
        ${
          data.MainProduct.ProductImage6 == null
            ? ""
            : `<img loading="lazy"  onclick="ViewBigImage('${data.MainProduct.ProductImage6}')"
            src="/cartify/uploads/productImg/${data.MainProduct.ProductImage6}"
            alt=""
          />`
        }
        ${
          data.MainProduct.ProductImage7 == null
            ? ""
            : `<img loading="lazy"  onclick="ViewBigImage('${data.MainProduct.ProductImage7}')"
            src="/cartify/uploads/productImg/${data.MainProduct.ProductImage7}"
            alt=""
          />`
        }
        ${
          data.MainProduct.ProductImage8 == null
            ? ""
            : `<img loading="lazy"  onclick="ViewBigImage('${data.MainProduct.ProductImage8}')"
            src="/cartify/uploads/productImg/${data.MainProduct.ProductImage8}"
            alt=""
          />`
        }
        ${
          data.MainProduct.ProductImage9 == null
            ? ""
            : `<img loading="lazy"  onclick="ViewBigImage('${data.MainProduct.ProductImage9}')"
            src="/cartify/uploads/productImg/${data.MainProduct.ProductImage9}"
            alt=""
          />`
        }
        ${
          data.MainProduct.ProductImage10 == null
            ? ""
            : `<img loading="lazy"  onclick="ViewBigImage('${data.MainProduct.ProductImage10}')"
            src="/cartify/uploads/productImg/${data.MainProduct.ProductImage10}"
            alt=""
          />`
        }
        </div>
      </div>
      <div class="ViewSingleProductDetails">
        <div class="SingleProductCategory">

          <p> ${data.MainProduct.MainCategory} > ${
    data.MainProduct.Category
  } > ${data.MainProduct.SubCategory} </p>
        </div>
        <div class="SingleProductName">
          <p>${data.MainProduct.ProductName}</p>
        </div>
        <div class="SingleProductPrice">
          <div class="SingleProductBuyingPrice">
            <i class="fa-solid fa-indian-rupee-sign"></i>
            <p id="SingleProductBuyingPrice">${data.MainProduct.OfferPrice}</p>
          </div>
          <div class="SingleProductMrp">
            <i class="fa-solid fa-indian-rupee-sign fa-xs"></i>
            <del><p id="SingleProductMrp">${data.MainProduct.MRPPrice}</p></del>
          </div>
          <div class="SingleProductDiscount">
            <p id="SingleProductDiscount">${(
              ((data.MainProduct.MRPPrice - data.MainProduct.OfferPrice) /
                data.MainProduct.MRPPrice) *
              100
            ).toFixed(2)}</p>
            <p>% Off</p>
          </div>
        </div>
        <div class="ProductBrand">
          <p>${data.MainProduct.Brand}</p>
        </div>
        ${VarientDataForScreen}



        <div class="SinglePageCartAndBuy">
          <div class="SinglePageAddToCart" onclick="addToCart(${
            data.MainProduct.ProductVariantsSNo
          },event)">
            <p id="SinglePageAddToCart${data.MainProduct.ProductVariantsSNo}">${
    data.MainProduct.AddToCartIs == true ? "Remove" : "Add To Cart"
  }</p>
          </div>
         <div class="SinglePageBuyNow ${
           data.MainProduct.Stocks === 0 ? "disabled" : ""
         }" 
     onclick="${
       data.MainProduct.Stocks === 0
         ? ""
         : `buyNow(${data.MainProduct.ProductVariantsSNo},event)`
     }">
    <p id="SinglePageBuyNow${data.MainProduct.ProductVariantsSNo}">
        ${data.MainProduct.Stocks === 0 ? "Out of Stock" : "Buy Now"}
    </p>
</div>

        </div>
        <div class="DeliveryCharge">
          <p>Free Delivery</p>
        </div>
        <div class="ProductDescription">
          <div class="Highlights">
            <h3>Highlights</h3>
            ${DescriptionAllData}
          </div>
          <div class="Description">
            <h4>Description</h4>
            <p>
              ${data.MainProduct.MainProductDescription}
            </p>
          </div>
        </div>
      </div>
    </div>`;
  window.scrollTo(0, 0);
};

var ViewBigImage = (ImageURL) => {
  // console.log(ImageURL);
  document.getElementById("SinglePageMainImage").src =
    "/cartify/uploads/productImg/" + ImageURL;
};
var LoadSingleProduct = (IDWhereInsert) => {
  // console.log("ViewSingleProduct");
  // console.log(IDWhereInsert);
  loadingPage("start");
  sendAxios("/cartify/user/product/loadProduct.api.php")
    .then((response) => {
      // console.log(response.data);
      if (response.data && response.data) {
        InsertData(IDWhereInsert, response.data);
      } else {
        document.getElementById(IDWhereInsert).innerHTML =
          "<p>Product could not be loaded.</p>";
      }
      // console.log(response.data);
      loadingPage("end");
    })
    .catch((error) => {
      console.error("Error loading product:", error);
      document.getElementById(IDWhereInsert).innerHTML =
        "<p>Error loading product. Please try again later.</p>";
      loadingPage("end");
    });
};
LoadSingleProduct("ViewProduct");

function setForLodeNewProduct(productVariantsSNo) {
  sendAxios("/cartify/user/functions/productsClick.api.php", {
    productVariantsSNo: productVariantsSNo,
    type: "clickOnProduct",
  }).then((response) => {
    if (response.data) {
      LoadSingleProduct("ViewProduct");
    }
  });
}
