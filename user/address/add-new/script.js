function fetchLocationData() {
  const pinCode = document.getElementById("AddAddressPinCode").value;

  if (pinCode.length < 6) {
    document.getElementById("AddAddressState").value = "";
    document.getElementById("AddAddressDistrict").value = "";
    document.getElementById("AddAddressCity").value = "";
    document.getElementById("message").innerText = "";
    return; // Exit the function if pin code is less than 6 digits
  }

  // Replace with your API endpoint for pin code lookup
  const apiUrl = `https://api.postalpincode.in/pincode/${pinCode}`;

  // Use Axios to fetch data
  axios
    .get(apiUrl)
    .then((response) => {
      const data = response.data;
      if (data[0].Status === "Success") {
        const postData = data[0].PostOffice[0];
        document.getElementById("AddAddressState").value = postData.State || "";
        document.getElementById("AddAddressDistrict").value =
          postData.District || "";
        document.getElementById("AddAddressCity").value = postData.Block || ""; // Assuming city is same as district
        document.getElementById("message").innerText = ""; // Clear any previous messages
      } else {
        showMessage({ status: "error", message: "Invalid Pin Code" });
        document.getElementById("AddAddressState").value = "";
        document.getElementById("AddAddressDistrict").value = "";
        document.getElementById("AddAddressCity").value = "";
      }
    })

}
 function validateEmail(email) {
   const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
   return re.test(String(email).toLowerCase());
 }
function submitForm() {
  
  

  const email = document.getElementById("AddAddressEmail").value.trim();
  const pinCode = document.getElementById("AddAddressPinCode").value.trim();
  const fullName = document.getElementById("AddAddressFullName").value.trim();
  const mobileNo = document.getElementById("AddAddressMobileNo").value.trim();
  const state = document.getElementById("AddAddressState").value.trim();
  const district = document.getElementById("AddAddressDistrict").value.trim();
  const city = document.getElementById("AddAddressCity").value.trim();
  const houseNoBuilding = document
    .getElementById("AddAddressHouseNoBuilding")
    .value.trim();
  const roadArea = document.getElementById("AddAddressRoadArea").value.trim();
  const landmark = document.getElementById("AddAddressLandmark").value.trim();

  let valid = true;
  let message = "";

  // Validate Email
  if (!validateEmail(email)) {
    valid = false;
    message += "Please enter a valid email address.\n";
  }

  // Validate Pin Code
  if (!pinCode) {
    valid = false;
    message += "Pin Code is required.\n";
  }

  // Validate Full Name
  if (!fullName) {
    valid = false;
    message += "Full Name is required.\n";
  }

  // Validate Mobile No
  if (!mobileNo || mobileNo.length < 10) {
    valid = false;
    message += "Please enter a valid mobile number.\n";
  }

  // Validate House No and Road Area
  if (!houseNoBuilding) {
    valid = false;
    message += "House No/Building Name is required.\n";
  }

  if (!roadArea) {
    valid = false;
    message += "Road Area/Colony is required.\n";
  }

  if (valid) {
    // Prepare data to send
    const data = {
      email,
      pinCode,
      fullName,
      mobileNo,
      state,
      district,
      city,
      houseNoBuilding,
      roadArea,
      landmark,
    };

    // Send data using Axios
   loadingPage("start", "Adding Address ");
    sendAxios("/cartify/user/address/add-new/addAddressUploadProcess.php", data)
    


  };
}
