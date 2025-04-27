document.getElementById("forgotPassword").addEventListener("submit", (e) => {
  e.preventDefault();

  let username = document.getElementById("username").value;
  loadingPage("start", "Sending Email ");
  sendAxios("/cartify/account/set-new-password/forgotPassword.api.php", {
    username,
  });
});
