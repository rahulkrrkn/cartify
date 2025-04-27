document.querySelector(".newPassword").addEventListener("click", function (e) {
  console.log(e.target.textContent);
  e.target.textContent = e.target.textContent === "🙈" ? "👁️" : "🙈";
  let parent = e.target.closest(".input-group");
  parent.querySelector("#newPassword").type =
    parent.querySelector("#newPassword").type === "password"
      ? "text"
      : "password";
});
document
  .querySelector(".confirmPassword")
  .addEventListener("click", function (e) {
    console.log(e.target.textContent);
    e.target.textContent = e.target.textContent === "🙈" ? "👁️" : "🙈";
    let parent = e.target.closest(".input-group");
    parent.querySelector("#confirmPassword").type =
      parent.querySelector("#confirmPassword").type === "password"
        ? "text"
        : "password";
  });

let newPassword = document.getElementById("newPassword");
let confirmPassword = document.getElementById("confirmPassword");
// let passwordMessage = document.getElementById("passwordMessage");
// let confirmMessage = document.getElementById("confirmMessage");
let submitBtn = document.getElementById("submitBtn");
let strengthMeter = document.getElementById("strengthMeter");
let strengthText = document.getElementById("strengthText");

function checkPasswordStrength(password) {
  let strength = 0;

  if (password.length >= 8) strength++;
  if (/[A-Z]/.test(password)) strength++;
  if (/[a-z]/.test(password)) strength++;
  if (/\d/.test(password)) strength++;
  if (/[@$!%*?&]/.test(password)) strength++;

  if (strength <= 2) {
    strengthMeter.className = "strength-meter weak";
    strengthText.textContent = "Weak";
    strengthText.style.color = "red";
  } else if (strength <= 4) {
    strengthMeter.className = "strength-meter medium";
    strengthText.textContent = "Medium";
    strengthText.style.color = "orange";
  } else {
    strengthMeter.className = "strength-meter strong";
    strengthText.textContent = "Strong";
    strengthText.style.color = "green";
  }

  return strength >= 3;
}

function validateInputs() {
  let password = newPassword.value;
  let confirm = confirmPassword.value;
  let isValid = true;

  strengthMeter.style.width = "100%";

  if (!checkPasswordStrength(password)) {
    isValid = false;
  }

  if (confirm && password !== confirm) {

    isValid = false;
  }

  submitBtn.disabled = !isValid;
}

newPassword.addEventListener("input", validateInputs);
confirmPassword.addEventListener("input", validateInputs);

document
  .getElementById("resetPasswordForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    let token = document.getElementById("token").value;
    let successMessage = document.getElementById("successMessage");

    // passwordMessage.textContent = "";
    // confirmMessage.textContent = "";
    successMessage.textContent = "";
    loadingPage("start", "Please wait while we reset your password.");
    sendAxios("resetPassword.api.php", {
      newPassword: newPassword.value,
      confirmPassword: confirmPassword.value,
      token: token,
    })
    
  });
