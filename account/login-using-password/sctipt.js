// JavaScript remains unchanged
document
  .getElementById("togglePassword")
  .addEventListener("click", function () {
    const passwordInput = document.getElementById("password");
    const type = passwordInput.type === "password" ? "text" : "password";
    passwordInput.type = type;
    this.textContent = type === "password" ? "👁️" : "🙈";
  });

function verifyLogin() {
  const email = document.getElementById("emailOrMobile").value.trim();
  const password = document.getElementById("password").value.trim();

  if (!email || !password) {
    showMessage({
      status: "error",
      message: "Please fill in all fields.",
    });
    return;
  }

  if (password.length < 8) {
    showMessage({
      status: "error",
      message: "Password must be at least 8 characters long.",
    });
    return;
  }
  loadingPage("start", "Verifying Password");
  sendAxios("/cartify/account/login-using-password/loginUsingPWD.api.php", {
    username: email,
    password,
  }).then((response) => {
    const referrer = document.referrer || ""; // Define referrer
    if (response.status == "success") {
      redirectUrl(["account/"]);
    }
  });
}

// Google

function onGoogleSignIn(response) {
  const id_token = response.credential;

  if (!id_token) {
    console.error("ID token is missing");
    return;
  }
  document.querySelector("#message").innerHTML =
    "<i class='fa fa-spinner fa-spin'></i> Logging in...";

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
