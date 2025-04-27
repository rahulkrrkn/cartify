function payWithRazorpay(keyId, order_id, name, email, mobileNo, notes) {
  console.log("keyId", keyId);
  const paymentData = {
    key: keyId,
    name: "Cartify | RahulKrRKN.com",
    image: "/cartify/old/Images/Developer/RahulKrRKN.webp",
    order_id: order_id,
    handler: function (response) {
      paymentDone(response);
    },
    prefill: {
      name: name,
      email: email,
      contact: mobileNo,
    },
    notes: notes,
    theme: { color: "#3399cc" },
  };
  console.log("paymentData", paymentData);
  const rzp1 = new Razorpay(paymentData);
  rzp1.open();
}
// payWithRazorpay(
//   "rzp_test_dTpozDUQQRSkG2",
//   "order_Q70N6IIfC45IYo",
//   "Rahul Kumar",
//   "rahulkrrkn@gmail.com",
//   8877788288,
//   {
//     key: "order_Q70N6IIfC45IYo",
//     name: "Cartify | RahulKrRKN.com",
//     image: "/cartify/old/Images/Developer/RahulKrRKN.webp",
//     order_id: "order_Q70N6IIfC45IYo",
//   }
// );

 