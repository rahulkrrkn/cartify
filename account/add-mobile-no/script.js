function sendOTP() {
  let mobile = document.getElementById("mobile").value;
  if (mobile.length === 10 && !isNaN(mobile)) {
    loadingPage("start", "Sending OTP ");
    sendAxios("addMobileNo.php", { mobileNo: mobile })
      .then((response) => {
        if (response.status === "success") {
          document.getElementById("step1").style.display = "none";
          document.getElementById("step2").style.display = "block";
        }
      })
  } else {
    showMessage({ message: "Please enter a valid 10-digit mobile number.", status: "error" });
  }
}

function verifyOTP() {
  let otp = document.getElementById("otp").value;
  let mobile = document.getElementById("mobile").value;
  if (otp.length === 6 && !isNaN(otp)) {
    sendAxios("addMobileNo.php", { otp });
  } else {
    showMessage({ message: "Invalid OTP. Please try again.", status: "error" });
  }
}
