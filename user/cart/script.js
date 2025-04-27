let productsData = [];
loadingPage("start", "Loading Cart Items");
sendAxios("/cartify/user/cart/getCartProducts.api.php", {}).then((response) => {
  if (response.data) {
    productsData = response.data;
    renderCartItems(response.data);
    calculatePriceSummary(response.data);
    console.log(response.data);
  }
});

function renderCartItems(data) {
  let cartContainer = document.querySelector(".cart-items");
  cartContainer.innerHTML = "<h2>My Cart</h2>";

  data.forEach((item) => {

    let stockData ="";

    if (item.Stocks != 0) {
      stockData = `
      <div class="actions">
                <div class="quantity">
                  <button onclick="updateCartQuantity(${
                    item.productVariantsSNo
                  }, -1,event)">-</button>
                  <span id="qty-${item.productVariantsSNo}">${
        item.Quantity
      }</span>
                  <input type="hidden" id="maxQuantityOf-${
                    item.productVariantsSNo
                  }" value="${item.Stocks}">
                  <button onclick="updateCartQuantity(${
                    item.productVariantsSNo
                  }, 1,event)">+</button>
                </div>
                  <button class="remove" id="CartCount${
                    item.productVariantsSNo
                  }" onclick="addOrRemoveFromCart(${
        item.productVariantsSNo
      }, event)">${item.AddToCartIs == true ? "Add To Cart" : "Remove"}</button>
              </div>`;
    } else {
      stockData = `<p style="color:red;">Out of Stock</p>
      <div class="actions">
      <button class="remove" id="CartCount${
        item.productVariantsSNo
      }" onclick="addtoCartOrRemove(${item.productVariantsSNo}, event)">${
        item.AddToCartIs == true ? "Add To Cart" : "Remove"
      }</button>
      </div>
                
      
      `;
    }
    cartContainer.innerHTML += `
        <div class="cart-item" onclick="clickOnProduct(${
          item.productVariantsSNo
        }, event)">
          <img loading="lazy"  src="/cartify/uploads/productImg/${
            item.ProductImage1
          }" alt="Product Image">
          <div class="item-details">
            <h3>${item.ProductName}</h3>
            <p>${item.Brand}</p>
            <p>MRP: <del>₹${item.MRPPrice}</del> Offer Price: ₹${
      item.OfferPrice
    }</p>
    <p>Delivery Charge: ${item.DeliveryCharge}</p>
            ${item.VarentTypeValue1}, ${item.VarentTypeValue2}, ${
      item.VarentTypeValue3
    }

              ${stockData}
            </div>
          </div>
        </div>
    
    `;
  });
}

function updateCartQuantity(productVariantsSNo, change,e) {
  e.preventDefault();
  e.stopPropagation();
  let maxQuantity = document.getElementById("maxQuantityOf-" + productVariantsSNo).value;
  let pId = document.getElementById("qty-" + productVariantsSNo);
  let currentQty = parseInt(pId.textContent);
  if (change == 1) {
    if (currentQty < maxQuantity) {
      pId.textContent++;
      changeFinalPrice(productVariantsSNo, change);
      sendAxios("cartQuantity.api.php", { productVariantsSNo, change });
    } else {
      showAlert({status: "error", message: "Maximum quantity reached"});
    }
  } else if (change == -1 && currentQty > 1) {
    changeFinalPrice(productVariantsSNo, change);
    pId.textContent--;
    sendAxios("cartQuantity.api.php", { productVariantsSNo, change });
  }

}
function changeFinalPrice(PNo, change) {
  let data = findProductByProductNo(PNo);
  let finalPrice = document.getElementById("finalPrice");
  let finalTotalPrice = document.getElementById("finalTotalPrice");
  let finalDiscount = document.getElementById("finalDiscount");
  console.log(change);
  let finalPriceValue = parseInt(finalPrice.textContent);
  let finalTotalPriceValue = parseInt(finalTotalPrice.textContent);
  let finalDiscountValue = parseInt(finalDiscount.textContent);
  if (change == 1) {
    finalPrice.innerHTML = finalPriceValue + data.MRPPrice;
    finalDiscount.innerHTML = finalDiscountValue + (data.MRPPrice - data.OfferPrice);
    finalTotalPrice.innerHTML = finalTotalPriceValue + data.OfferPrice;
  } else if (change == -1) {
    finalPrice.innerHTML = finalPriceValue - data.MRPPrice;
    finalDiscount.innerHTML = finalDiscountValue - (data.MRPPrice - data.OfferPrice);
    finalTotalPrice.innerHTML = finalTotalPriceValue - data.OfferPrice;
  }
}
function findProductByProductNo(productNo) {
  return productsData.find(
    (product) => product.productVariantsSNo === productNo
  );
}

function addOrRemoveFromCart(PNo, e) {
  e.stopPropagation();
  document.getElementById("qty-"+PNo).innerText = 1;
  let data = findProductByProductNo(PNo);
  let quantity = document.getElementById("qty-" + PNo).innerText;
  let finalPrice = document.getElementById("finalPrice");
  let finalTotalPrice = document.getElementById("finalTotalPrice");
  let finalDiscount = document.getElementById("finalDiscount");
  let finalDeliveryCharges = document.getElementById("finalDeliveryCharges");

  let quantityValue = parseInt(quantity);
  let finalPriceValue = parseInt(finalPrice.textContent);
  let finalTotalPriceValue = parseInt(finalTotalPrice.textContent);
  let finalDiscountValue = parseInt(finalDiscount.textContent);
  let finalDeliveryChargesValue = parseInt(finalDeliveryCharges.textContent);
  if (e.target.innerText === "Add To Cart") {
    finalPrice.innerHTML = finalPriceValue + data.MRPPrice ;
    finalTotalPrice.innerHTML =
      finalTotalPriceValue + data.OfferPrice ;
    finalDiscount.innerHTML =
      finalDiscountValue +
      (data.MRPPrice - data.OfferPrice) ;
    finalDeliveryCharges.innerHTML =
      finalDeliveryChargesValue + data.DeliveryCharge;
    
  } else if (e.target.innerText === "Remove") {
    let quantity = document.getElementById("qty-" + PNo).innerText;
    let quantityValue = parseInt(quantity);

    finalPrice.innerHTML = finalPriceValue - data.MRPPrice * quantityValue;
    finalTotalPrice.innerHTML =
      finalTotalPriceValue - data.OfferPrice * quantityValue;
    finalDiscount.innerHTML =
      finalDiscountValue -
      (data.MRPPrice - data.OfferPrice) * quantityValue;
    finalDeliveryCharges.innerHTML =
      finalDeliveryChargesValue - data.DeliveryCharge;
    
  }
  addToCart(PNo, e);
  
}
function addtoCartOrRemove(PNo, e) {
  e.stopPropagation();
  addToCart(PNo, e);
}


function calculatePriceSummary(cartData) {
  let totalPrice = 0;
  let totalDiscount = 0;
  let deliveryCharges = 0;
  // console.log(cartData);
  // console.log(cartData);

  cartData.forEach((item) => {
    if (item.Stocks != 0) {
      const itemTotalPrice = item.MRPPrice * item.Quantity;
      const itemTotalOfferPrice = item.OfferPrice * item.Quantity;
      totalPrice += itemTotalPrice;
      totalDiscount += itemTotalPrice - itemTotalOfferPrice;
      deliveryCharges += item.DeliveryCharge * item.Quantity;
    }
  });


  const finalAmount = totalPrice - totalDiscount + deliveryCharges;

  document.querySelector(".cart-summary").innerHTML = `
    <h2>Price Details</h2>
    <div class="summary-details">
      <p>Price (${cartData.length} item${
    cartData.length > 1 ? "s" : ""
  }) <span>₹<span id="finalPrice">${totalPrice}</span></span></p>
      <p>Discount <span style="color:green;">-₹<span id="finalDiscount">${totalDiscount}</span></span></p>
      <p>Delivery Charges <span>₹<span id="finalDeliveryCharges">${deliveryCharges}</span></span></p>
      <hr>
      <p class="total">Total Amount <span>₹<span id="finalTotalPrice">${finalAmount}</span></span></p>
    </div>
    <a href="/cartify/user/checkouts/" class="checkout btn">Proceed to Checkout</a>
  `;
}
