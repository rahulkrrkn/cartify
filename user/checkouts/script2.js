// const productData = [
//   {
//     quantity: 10,
//     productId: 8,
//   },
//   {
//     quantity: 5,
//     productId: 9,
//   },
//   {
//     quantity: 1,
//     productId: 1,
//   },
// ];

// TEmp
// function placeOnlion() {
//   paymentMethod = "online";
//   placeOrder();
// }
// function placeOnCod() {
//   paymentMethod = "cod";
//   placeOrder();
// }

// MAke Order
// let quantity;
// let productId;
// let paymentMethod = "cod";
// let addressId = 1;
function getdata() {
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
  
  sendAxios("tokenCreate.api.php", {
    productData: productData,
  }).then((response) => {

    if (response.status == "success") {
      let data = response.data;
      let dataOfPay = payWithRazorpay(
        data.key,
        data.tokenid,
        "",
        data.emailId,
        data.mobile,
        {
          productData: productData,
          paymentMethod: paymentMethod,
          addressId: addressId,
        }
      );
    } 
  });
}

function paymentDone(dataOfPay) {
  placeOrderSystem(dataOfPay);
}

function placeOrderSystem(dataOfPay = null) {
  
  getdata();
  loadingPage("start", "Placing Order");
  axios
    .post("placesOrders.api.php", {
      productData: productData,
      paymentMethod: paymentMethod,
      addressId: addressId,
      dataOfPay: dataOfPay,
    })
    .then((response) => {
      console.log(response.data);
      loadingPage("end");
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
  // document.getElementById("checkoutContainer").style.display = "hidden";
}
function closePopup() {
  document.getElementById("orderPopup").style.display = "none";
  window.location.href = "/cartify/user/my-orders/";
}
