function sendOtpNow() {
  const emailOrMobile = document.getElementById("emailOrMobile").value;

  if (!emailOrMobile) {
    showMessage({
      status: "error",
      message: "Please enter an email or mobile number.",
    });
    return;
  } else if (!isNaN(emailOrMobile)) {
    // Correct condition for mobile number
    if (emailOrMobile.length == 10) {
      senOtpOnMobile(emailOrMobile);
    } else {
      showMessage({
        status: "error",
        message: "Please enter a valid mobile number.",
      });
      return;
    }
  } else if (!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(emailOrMobile)) {
    showMessage({
      status: "error",
      message: "Please enter a valid mobile number.",
    });
    return;
  } else {
    senOtpOnEmail(emailOrMobile);
  }
}
const senOtpOnMobile = (a) => {
  loadingPage("start", "Sending OTP to your whatsApp ");
  sendAxios("/cartify/account/login-using-otp/sendMobileOTP.api.php", {
    mobile: a,
  }).then((response) => {
    if (response.status === "success") {
      document.getElementById("loginSection").style.display = "none";
      document.getElementById("otpSection").style.display = "block";
    }
  });
};

const senOtpOnEmail = (b) => {
  loadingPage("start", "Sending OTP to your email ");
  sendAxios("/cartify/account/login-using-otp/sendEmailOTP.api.php", {
    email: b,
  }).then((response) => {
    if (response.status === "success") {
      document.getElementById("loginSection").style.display = "none";
      document.getElementById("otpSection").style.display = "block";
    }
  });
};

function submitOtp() {
  const otp = document.getElementById("otp").value;
  loadingPage("start", "Verifying OTP");

  sendAxios("/cartify/account/login-using-otp/verifyOtp.api.php", { otp }).then(
    (response) => {
      const referrer = document.referrer || ""; // Define referrer
      if (response.status == "success") {
        redirectUrl(["account/"]);
      }
    }
  );
}

// Google

function onGoogleSignIn(response) {
  const id_token = response.credential;

  if (!id_token) {
    console.error("ID token is missing");
    return;
  }
  loadingPage("start", "Logging in");

  sendAxios("/cartify/account/loginUsingGoogle.api.php", {
    idtoken: id_token, // Send the ID token
  }).then((response) => {
    const referrer = document.referrer || ""; // Define referrer
    if (response.status == "success") {
      redirectUrl(["account/"]);
    }
  });
}

window.onload = function () {
  google.accounts.id.initialize({
    client_id:
      "78394163492-5i4brsjq0dtdjonfj44jp88r3t47i74m.apps.googleusercontent.com",
    callback: onGoogleSignIn,
    // prompt: "select_account",
  });

  google.accounts.id.renderButton(
    document.querySelector(".g_id_signin"),
    { theme: "dark", size: "large", shape: "rounded", logo_alignment: "left" } // Customization options
  );
};
