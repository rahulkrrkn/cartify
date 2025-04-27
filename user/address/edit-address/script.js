const addressId = new URLSearchParams(window.location.search).get("addressId");
document.addEventListener("axiosReady", () => {
  sendAxios("editAddressLoad.api.php", {
      addressId: addressId,
    })
    .then((response) => {
      if (response.data) {
        document.getElementById("AddAddressEmail").value =
          response.data.EmailID || "";
        document.getElementById("AddAddressPinCode").value =
          response.data.PinCode || "";
        document.getElementById("AddAddressFullName").value =
          response.data.FullName || "";
        document.getElementById("AddAddressMobileNo").value =
          response.data.MobileNo || "";
        document.getElementById("AddAddressHouseNoBuilding").value =
          response.data.HouseBuildingName || "";
        document.getElementById("AddAddressRoadArea").value =
          response.data.RoadAreaColony || "";
        document.getElementById("AddAddressLandmark").value =
          response.data.Landmark || "";
        document.getElementById("defultAdd").value =
          response.data.SetDefault || "No";
        fetchLocationData();
      }

      console.log(response.data);
    });
});

function updateAddress() {
  loadingPage("start", "Updating Address ");
  document.getElementById("AddAddressSubmit").style.display = "none";
  document.getElementById("message").innerHTML =
    "<i class='fa fa-spinner fa-spin'></i>  Adding address...";

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
  const defultAdd = document.getElementById("defultAdd").value.trim();

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
      defultAdd,
      addressId,
    };

    // Send data using Axios
  
   sendAxios("editAddressUpload.api.php", data)
      
     
  } 
}
