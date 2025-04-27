let data;
sendAxios("/cartify/user/address/address.api.php", {}).then((res) => {
  console.log(res);
  defult = true;
  data = res;

  if (!res || res.length === 0) {

    // If no addresses are available, show the "Add New Address" button
    document.getElementById("addressSelected").innerHTML = `
      <div class="AddAddress"> 
        <a href="/cartify/user/address/add-new/" id="addNewAddress" class="btn btnP2">Add New Address</a> 
      </div>
    `;
    return;
  }

  
  // let defaultSet = false;
  // document.getElementById("addressList").innerHTML = ""; 



  res.forEach((e) => {

    let data = `
      <input type="text" id="addressId" value="${e.SNo}" hidden>
                    <p id="FullName">${e.FullName}</p>
                    <div class="contact">
                        <p id="MobileNo">${e.MobileNo}</p>
                        <p id="EmailID">${e.EmailID}</p>
                    </div>
                    <div class="address">
                        <p id="HouseBuildingName">${e.HouseBuildingName}</p>,
                        <p id="RoadAreaColony">${e.RoadAreaColony}</p>,
                        <p id="landmark">${e.Landmark}</p>,
                        <p id="City">${e.City}</p>,
                        <p id="State">${e.State}</p>,
                        <p id="PinCode">${e.PinCode}</p>
                    </div>
                
        `;
    if (defult) {
      document.getElementById("addressSelected").innerHTML = `
            <div class="info"><div class="box">
                ${data}
                <button class="btn btnP1" onclick="changeDetails()">Change</button>
            </div></div>
        </div>`;
      defult = false;
    }

    document.getElementById("addressList").innerHTML += `
      <div class="info">
      ${data}
      <button class="btn btnP2" onclick="selectAddress(${e.SNo})">Select</button>
      `;
  });

  // document.getElementById("addressSelected").innerHTML = res;
});
const changeDetails = () => {
  document.querySelector(".selectAddress").style.display = "block";
};
const cancle = () => {
  document.querySelector(".selectAddress").style.display = "none";
};
const selectAddress = (addressId) => {
  let newAddress = data.find((e) => e.SNo == addressId);
  console.log(newAddress);
  if (newAddress) {
    document.getElementById("addressSelected").innerHTML = `
            <div class="info"><div class="box">
                <input type="text" id="addressId" value="${newAddress.SNo}" hidden>
                    <p id="FullName">${newAddress.FullName}</p>
                    <div class="contact">
                        <p id="MobileNo">${newAddress.MobileNo}</p>
                        <p id="EmailID">${newAddress.EmailID}</p>
                    </div>
                    <div class="address">
                        <p id="HouseBuildingName">${newAddress.HouseBuildingName}</p>,
                        <p id="RoadAreaColony">${newAddress.RoadAreaColony}</p>,
                        <p id="landmark">${newAddress.Landmark}</p>,
                        <p id="City">${newAddress.City}</p>,
                        <p id="State">${newAddress.State}</p>,
                        <p id="PinCode">${newAddress.PinCode}</p>
                    </div>
                <button class="btn btnP1" onclick="changeDetails()">Change</button>
            </div>
        </div>`;
  }
  //     document.getElementById("addressSelected").innerHTML = `<div id="addressSelected">
  //     <div class="info"><div class="box">
  //         ${data.data.find((e) => e.SNo == addressId)}
  //         <button class="btn btnP1" onclick="changeDetails()">Change</button>
  //     </div></div>
  // </div>`;
  document.querySelector(".selectAddress").style.display = "none";
};

