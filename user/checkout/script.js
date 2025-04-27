let stock = 10;
let productPrice;
let deliveryCharge = 0;
document.addEventListener("DOMContentLoaded", function () {
  loadingPage("start", "Loading Product");
  axios
    .get("./checkout.api.php")
    .then((response) => {
      console.log(response.data);
      let product = response.data;
      document.getElementById("productName").innerText = product.ProductName;
      document.getElementById("brand").innerText = product.Brand;
      document.getElementById("mrpPrice").innerText = "₹" + product.MRPPrice;
      document.getElementById("offerPrice").innerText =
        "₹" + product.OfferPrice;
      document.getElementById("stock").innerText =
        product.Stocks > 0 ? "In Stock" : "Out of Stock";
      document.getElementById("rating").innerText = product.AverageRating;
      document.getElementById("totalRatings").innerText = product.TotalRatings;
      document.getElementById("productImage").src =
        "/cartify/uploads/productImg/" + product.ProductImage1;
      stock = product.Stocks;
      document.getElementById("deliveryCharge").textContent =
        product.ZonalDeliveryCharge;
      deliveryCharge = product.ZonalDeliveryCharge;
      document.getElementById("productPrice").textContent = product.OfferPrice;
      productPrice = product.OfferPrice;
      document.getElementById("productId").value = product.ProductSNo;
      document.getElementById("totalPrice").textContent =
        product.OfferPrice + deliveryCharge;

      loadingPage("end");
    })
    .catch((error) => {
      loadingPage("end");
      console.error("Error fetching product data:", error);
    });
});

function changeQuantity(amount) {
  let quantityInput = document.getElementById("quantity");
  let currentQuantity = parseInt(quantityInput.value);
  if (currentQuantity + amount > 0 && currentQuantity + amount <= stock) {
    quantityInput.value = currentQuantity + amount;
    document.getElementById("productPrice").textContent =
      (currentQuantity + amount) * productPrice;
    document.getElementById("totalPrice").textContent =
      (currentQuantity + amount) * productPrice + deliveryCharge;
  }
}

// MAke Order
let quantity;
let productId;
let paymentMethod;
let addressId;
function getdata() {
  quantity = document.getElementById("quantity").value;
  productId = document.getElementById("productId").value;
  paymentMethod = document.querySelector(
    'input[name="paymentMethod"]:checked'
  ).value;
  addressId = document.getElementById("addressId").value;
}

function placeOrder() {
  getdata();
  if (!addressId) {
    alert("Please add an address before placing the order.");
    changeDetails();
    // document.querySelector(".selectAddress").style.display = "block";
    return;
  }

  if (paymentMethod == "online") {
    CreatePaymentToken();
  } else if (paymentMethod == "cod") {
    placeOrderSystem();
  }
}

function CreatePaymentToken() {
  getdata();
  
  loadingPage("start", "Opening Payment Page");
 sendAxios("createToken.api.php", {
      quantity: quantity,
      productId: productId,
    })
   .then((response) => {
      if (response.status == "success") {
        let data = response.data;
        let dataOfPay = payWithRazorpay(
          data.key,
          data.tokenid,
          "RahulKrRKN.com/cartify/",
          data.emailId,
          data.mobile,
          {
            quantity: quantity,
            productId: productId,
            paymentMethod: paymentMethod,
            addressId: addressId,
          }
        );
      } 
    });
}

function paymentDone(dataOfPay) {
  console.log("dataOfPay", dataOfPay);
  placeOrderSystem(dataOfPay);
}

function placeOrderSystem(dataOfPay = null) {
  getdata();
  loadingPage("start", "Placing Order");
  axios
    .post("createOrder.api.php", {
      quantity: quantity,
      productId: productId,
      paymentMethod: paymentMethod,
      addressId: addressId,
      dataOfPay: dataOfPay,
    })
    .then((response) => {
      loadingPage("end");
      showAlert(response.data);
      showMessage(response.data);
      if (response.data.status == "success") {
        placeOrderPopup();
        // alert(response.data.message);
      } else {
        // alert(response.data.message);
        showAlert(response.data);
      }
    });
}

function placeOrderPopup() {
  document.getElementById("orderPopup").style.display = "flex";
  document.getElementById("checkoutContainer").style.display = "hidden";
}
function closePopup() {
  document.getElementById("orderPopup").style.display = "none";
  window.location.href = "/cartify/user/my-orders/";
}
