let productData = []; // FOr Order

console.log("productData");
console.log(productData);
let productsData = [];
loadingPage("start", "Loading Items");
sendAxios("/cartify/user/checkouts/getCartProducts.api.php", {}).then(
  (response) => {
    if (response.data) {
      productsData = response.data;
      renderCartItems(response.data);
      calculatePriceSummary(response.data);
      console.log(response.data);
    }
  }
);

function renderCartItems(data) {
  let cartContainer = document.querySelector(".cart-items");
  cartContainer.innerHTML = "<h2>Checkout</h2>";

  data.forEach((item) => {
    let stockData = "";
    
    if (item.Stocks != 0) {
      productData.push({
        quantity: item.Quantity,
        productId: item.productVariantsSNo,
      });
      stockData = `
      <div class="actions">
                <div class="quantity">
                <p>Quantity: ${item.Quantity}</p>
            
                </div>
              </div>`;

      cartContainer.innerHTML += `
        <div class="cart-item" onclick="clickOnProduct(${item.productVariantsSNo}, event)">
          <img loading="lazy"  src="/cartify/uploads/productImg/${item.ProductImage1}" alt="Product Image">
          <div class="item-details">
            <h3>${item.ProductName}</h3>
            <p>${item.Brand}</p>
            <p>MRP: <del>₹${item.MRPPrice}</del> Offer Price: ₹${item.OfferPrice}</p>
    <p>Delivery Charge: ${item.DeliveryCharge}</p>
            ${item.VarentTypeValue1}, ${item.VarentTypeValue2}, ${item.VarentTypeValue3}

              ${stockData}
            </div>
          </div>
        </div>
    
    `;
    }
  });
  console.log("productData");
  console.log(productData);
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
// document.getElementById("productPrice").innerText = totalPrice;
// document.getElementById("descount").innerText = totalDiscount;
// document.getElementById("deliveryCharge").innerText = deliveryCharges;
// document.getElementById("totalPrice").innerText = finalAmount;


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
  `;
}
