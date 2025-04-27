//  Loding Spinner
const loadingPage = (e, LodingMessage) => {
  LodingTempVar = document.getElementById("loadingOverlay");
  if (e == "start") {
    LodingTempVar.classList.add("LodingActivateCss");
  } else if (e == "end") {
    LodingTempVar.classList.remove("LodingActivateCss");
  } else {
    LodingTempVar.classList.toggle("LodingActivateCss");
    window.scrollTo(0, 0);
  }
  if (LodingMessage) {
    document.querySelector("#loadingMessage").innerText = LodingMessage;
    // document.querySelector(".loading-message").innerText = LodingMessage;
  }
  // if (LodingGoToTop) {
  // }
  // LodingGoToTop = !LodingGoToTop;
};
// loadingPage("start");

// Corner message
// Demo     showPopup({message: 'Product added successfully',status: 'success'});

const showMessage = (data) => {
    loadingPage("end");
  const popup = document.getElementById("statusPopup");
  const popupMessage = document.getElementById("popupMessage");
  const progressBar = document.getElementById("progressBar");

  popupMessage.textContent = data.message;
  popup.className = `popupMessage ${data.status} show`;
  popup.style.display = "block";

  progressBar.style.width = "100%";
  progressBar.style.transition = "width 3s linear";
  setTimeout(() => {
    progressBar.style.width = "0%";
  }, 3);

  setTimeout(() => {
    popup.classList.remove("show");
    setTimeout(() => {
      popup.style.display = "none";
    }, 300);
  }, 3000);
};


// Show alert
let redirectUrlMsg = null;

function showAlert(data) {
  loadingPage("end");
  if (data.status == "success") {
    data.title = "Success"
  } else if( data.status == "error") {
    data.title = "Error"
  }
  if(data.success){
    data.status = "success"
    data.title = "Success"
  } else if (data.success == false) {
    data.status = "error";
    data.title = "Error";
  }
  
    document.getElementById("alertTitle").innerText = data.title;
  document.getElementById("alertMessage").innerText = data.message;
  let alertBox = document.getElementById("customAlert");
  let alertContent = document.getElementById("alertBox");

  alertContent.className = `alert-box ${data.status}`;
  alertBox.style.visibility = "visible";
  alertBox.style.opacity = "1";
  alertContent.style.transform = "scale(1)";

  redirectUrlMsg = data.url || null;
}

function closeAlert() {
  let alertBox = document.getElementById("customAlert");
  let alertContent = document.getElementById("alertBox");
  alertBox.style.opacity = "0";
  alertContent.style.transform = "scale(0.9)";
  setTimeout(() => {
    alertBox.style.visibility = "hidden";
    if (redirectUrlMsg) {
      window.location.href = redirectUrlMsg;
    }
  }, 300);
}


// temp
function c(res) {
  console.log(res);
}