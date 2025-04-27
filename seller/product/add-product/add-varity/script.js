// var Temprory = () => {
//   document.getElementById("Mrp").value = "10";
//   document.getElementById("OfferPrice").value = "9";
//   document.getElementById("AvailableStock").value = "10";
//   document.getElementById("VarityValue1").value = "Blue";
//   document.getElementById("VarityValue2").value = "10";
// };
var AllOldVarityName;
var ProductImages;
var VaritySelectionName1;
var VaritySelectionName2;
var VaritySelectionName3;

sendAxios(
  "/cartify/seller/product/add-product/add-varity/addProductVarityLoadProcess.php"
).then((response) => {
  var data = response.data;
  if (data.status == "error") {
    alert(data.message);
  } else {
    console.log(data);
    document.getElementById("ProductSNo").textContent = data.ProductSNo;
    document.getElementById("ProductName").textContent = data.MainProductName;
    document.getElementById("ProductVaritySNo").textContent =
      data.ProductVariantsSNo;
    document.getElementById("ProductDescription").textContent =
      data.MainProductDescription;

    // Handling variety names
    var varietyNames = [
      "VaritySelectionName1",
      "VaritySelectionName2",
      "VaritySelectionName3",
    ];
    varietyNames.forEach((varName, index) => {
      var varityElement = document.getElementById(`ProductVarity${index + 1}`);
      var alreadyAddedVarityElement = document.getElementById(
        `AlreadyAddedVarityType${index + 1}`
      );
      if (data[varName]) {
        varityElement.textContent = data[varName];
        alreadyAddedVarityElement.textContent = data[varName];
      }
    });

    // Handling category
    document.getElementById(
      "ProductCategory"
    ).textContent = `${data.MainCategory} > ${data.Category} > ${data.SubCategory}`;

    // Handle variety value input fields
    var varietySNo = [
      "VaritySelectionSNo1",
      "VaritySelectionSNo2",
      "VaritySelectionSNo3",
    ];
    varietySNo.forEach((varSNo, index) => {
      if (data[varSNo] != null) {
        document.getElementById(
          `AddVarityValue${index + 1}`
        ).innerHTML = `<label for='VarityValue${index + 1}'>${
          data[`VaritySelectionName${index + 1}`]
        }</label>
           <input type='text' name='VarityValue${index + 1}' id='VarityValue${
          index + 1
        }' />`;
      }
    });

    // Handling fixed description
    var FixedDescription = document.getElementById("FixedDescription");
    var tempDescription = 0;
    for (var i = 1; i <= 40; i++) {
      var descriptionKey = data[`DescriptionKey${i}`];
      var descriptionValue = data[`DescriptionValue${i}`];
      if (descriptionKey != null) {
        tempDescription++;
        FixedDescription.innerHTML += `<div>
             <label for='FixedDescription${i}'>${descriptionKey}</label>
             <input type='text' name='FixedDescription${i}' value='${descriptionValue}' id='FixedDescription${i}' />
           </div>`;
      }
    }
    document.getElementById("TotalFixedDescription").value = tempDescription;
    document.getElementById("Description").value = data.VariantDescription;

    // Handling already added variety types
    AllOldVarityName = data.VaritySelectionAllName;
    ProductImages = data.ProductImages;
    VaritySelectionName1 = data.VaritySelectionName1;
    VaritySelectionName2 = data.VaritySelectionName2;
    VaritySelectionName3 = data.VaritySelectionName3;

    var Temp1 = true;
    var Temp2 = 1;

    while (Temp1) {
      var Temp3 = `Response${Temp2}`;
      if (
        AllOldVarityName[Temp3] &&
        AllOldVarityName[Temp3].ProductVariantsSNo != null
      ) {
        document.querySelector(
          ".AlreadyAddedVarityTypes"
        ).innerHTML += `<div id="${Temp3}">
             <div>${AllOldVarityName[Temp3].VarentTypeValue1 || " "}</div>
             <div>${AllOldVarityName[Temp3].VarentTypeValue2 || " "}</div>
             <div>${AllOldVarityName[Temp3].VarentTypeValue3 || " "}</div>
           </div>`;
      } else {
        Temp1 = false;
      }
      Temp2++;
    }
  }
});

//   Handling New Data
// For Images
document.querySelectorAll('input[type="file"]').forEach((input) => {
  input.addEventListener("change", handleUpload);
});
function handleUpload(event) {
  var file = event.target.files[0];
  var labelId = event.target.id.replace("Input", "LabelId"); // Get corresponding label ID
  var imgDivId = "imguplodedivid" + labelId.charAt(labelId.length - 1); // Get corresponding div ID
  var imgDiv = document.getElementById(imgDivId);
  var maxFileSize = 2 * 1024 * 1024; // 2 MB in bytes

  // Check if a file is selected
  if (file) {
    // Check the file size
    if (file.size > maxFileSize) {
      alert("File size exceeds 2 MB. Please upload a smaller file.");
      event.target.value = ""; // Reset the input
      return; // Exit the function without modifying imgDiv
    }

    var reader = new FileReader();
    reader.onload = function (e) {
      imgDiv.style.backgroundImage = `url(${e.target.result})`;
      imgDiv.innerHTML = ""; // Clear existing content
      imgDiv.insertAdjacentHTML(
        "beforeend",
        `<img loading="lazy"  src="${e.target.result}" alt="Uploaded Image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;" />`
      );
    };
    reader.readAsDataURL(file);
  }
}
//   Form Validation
var TotalDescount = () => {
  var MRP = Number(document.getElementById("Mrp").value);
  var OfferPrice = Number(document.getElementById("OfferPrice").value);
  // console.log(typeof MRP);
  var TotalDescount = Number((((MRP - OfferPrice) / MRP) * 100).toFixed(2));
  document.getElementById("TotalDescount").value = TotalDescount + " % Off";
};
document.getElementById("Mrp").addEventListener("input", function () {
  TotalDescount();
});
document.getElementById("OfferPrice").addEventListener("input", function () {
  TotalDescount();
});
var CheckAllData = () => {
  document.querySelector(".ForSubmitOrNext").style.display = "none";
  var ProductMRP = document.getElementById("Mrp").value;
  var ProductOfferPrice = document.getElementById("OfferPrice").value;
  var AvailableStock = document.getElementById("AvailableStock").value;
  var ProductVarity1 = document.getElementById("ProductVarity1").textContent;
  var ProductVarity2 = document.getElementById("ProductVarity2").textContent;
  var ProductVarity3 = document.getElementById("ProductVarity3").textContent;

  var VarityValue1 = null;
  var VarityValue2 = null;
  var VarityValue3 = null;
  var VarityValueCheck1 = false;
  var VarityValueCheck2 = false;
  var VarityValueCheck3 = false;

  if (ProductVarity1 != "") {
    VarityValue1 = document.getElementById("VarityValue1").value;
    if (VarityValue1 == null) {
      VarityValueCheck1 = false;
    } else {
      VarityValueCheck1 = true;
    }
  } else {
    VarityValueCheck1 = true;
  }

  if (ProductVarity2 != "") {
    VarityValue2 = document.getElementById("VarityValue2").value;
    if (VarityValue2 == null) {
      VarityValueCheck2 = false;
    } else {
      VarityValueCheck2 = true;
    }
  } else {
    VarityValueCheck2 = true;
  }

  if (ProductVarity3 != "") {
    VarityValue3 = document.getElementById("VarityValue3").value;
    if (VarityValue3 == null) {
      VarityValueCheck3 = false;
    } else {
      VarityValueCheck3 = true;
    }
  } else {
    VarityValueCheck3 = true;
  }
  var VarityCompare = true;
  var Temp2 = 1;
  while (true) {
    var Temp3 = `Response${Temp2}`;
    if (AllOldVarityName[Temp3]) {
      if (
        AllOldVarityName[Temp3].VarentTypeValue1 == VarityValue1 &&
        AllOldVarityName[Temp3].VarentTypeValue2 == VarityValue2 &&
        AllOldVarityName[Temp3].VarentTypeValue3 == VarityValue3
      ) {
        VarityCompare = false;
        break;
      }
    } else {
      break;
    }
    Temp2++;
  }
  if (ProductMRP == "") {
    alert("Please Enter MRP");
  } else if (isNaN(ProductMRP)) {
    alert("Please Enter Correct MRP");
  } else if (ProductMRP <= 0) {
    alert("Please Enter Valid MRP");
  } else if (ProductOfferPrice == "") {
    alert("Please Enter Selling Price");
  } else if (isNaN(ProductOfferPrice)) {
    alert("Please Enter Correct Selling Price");
  } else if (ProductOfferPrice <= 0) {
    alert("Please Enter Valid Selling Price");
  } else if (parseInt(ProductOfferPrice) > parseInt(ProductMRP)) {
    alert("Selling Price should be less than MRP");
  } else if (AvailableStock == "") {
    alert("Please Enter Available Stock");
  } else if (isNaN(AvailableStock)) {
    alert("Please Enter Correct Available Stock");
  } else if (AvailableStock <= 0) {
    alert("Please Enter Valid Available Stock");
  } else if (!VarityValueCheck1) {
    alert("Please Enter 1st Variety Value");
  } else if (!VarityValueCheck2) {
    alert("Please Enter 2nd Variety Value");
  } else if (!VarityValueCheck3) {
    alert("Please Enter 3rd Variety Value");
  } else if (!VarityCompare) {
    alert("Variety Already Added");
  } else {
    return true;
  }

  //   for (var key in AllOldVarityName) {
  //     console.log(key, AllOldVarityName[key]);
  //   }
  //   console.log("AllOldVarityName");
};
var UplodeCheck = () => {
  var uploadYes = document.getElementById("UploadYes");
  var uploadNo = document.getElementById("UploadNo");
  var ImageViewer = document.querySelector(".ForImageUplode");
  if (uploadYes.checked) {
    ImageViewer.style.display = "flex";
  } else if (uploadNo.checked) {
    ImageViewer.style.display = "none";
  }
};
document.getElementById("UploadYes").addEventListener("click", function () {
  UplodeCheck();
});
document.getElementById("UploadNo").addEventListener("click", function () {
  UplodeCheck();
});

// Uplode Data
var UplodeMoreVarityData = (Type) => {
  // console.log("UplodeCheck");

  var ProductSNo = document.getElementById("ProductSNo").textContent;
  var ProductName = document.getElementById("ProductName").textContent;
  var ProductVaritySNo =
    document.getElementById("ProductVaritySNo").textContent;
  var ProductMRP = document.getElementById("Mrp").value;
  var ProductOfferPrice = document.getElementById("OfferPrice").value;
  var AvailableStock = document.getElementById("AvailableStock").value;
  var ProductVarity1 = document.getElementById("ProductVarity1").textContent;
  var ProductVarity2 = document.getElementById("ProductVarity2").textContent;
  var ProductVarity3 = document.getElementById("ProductVarity3").textContent;
  var selectedOption = document.querySelector(
    'input[name="AreYouWantToUploadImage"]:checked'
  ).value;
  var VarityValue1 = "";
  var VarityValue2 = "";
  var VarityValue3 = "";
  if (ProductVarity1 != "") {
    VarityValue1 = document.getElementById("VarityValue1").value;
  }
  if (ProductVarity2 != "") {
    VarityValue2 = document.getElementById("VarityValue2").value;
  }
  if (ProductVarity3 != "") {
    VarityValue3 = document.getElementById("VarityValue3").value;
  }
  var ProductCollectedDescription =
    document.getElementById("Description").value;
  var ProductImageUplode0 = document.querySelector("#ImgUplode0").files[0];
  var ProductImageUplode1 = document.querySelector("#ImgUplode1").files[0];
  var ProductImageUplode2 = document.querySelector("#ImgUplode2").files[0];
  var ProductImageUplode3 = document.querySelector("#ImgUplode3").files[0];
  var ProductImageUplode4 = document.querySelector("#ImgUplode4").files[0];
  var ProductImageUplode5 = document.querySelector("#ImgUplode5").files[0];
  var ProductImageUplode6 = document.querySelector("#ImgUplode6").files[0];
  var ProductImageUplode7 = document.querySelector("#ImgUplode7").files[0];
  var ProductImageUplode8 = document.querySelector("#ImgUplode8").files[0];
  var ProductImageUplode9 = document.querySelector("#ImgUplode9").files[0];
  var TotalFixedDescriptionCollected = {};

  // Fixed Description Collected

  var TotalFixedDescriptionValue = parseInt(
    document.getElementById("TotalFixedDescription").value
  );

  for (var i = 0; i < 40; i++) {
    if (i < TotalFixedDescriptionValue) {
      var TempValue = document.getElementById(
        "FixedDescription" + (i + 1)
      ).value;

      if (TempValue == "") {
        TempValue = null;
      }

      TotalFixedDescriptionCollected["FixedDescription" + (i + 1)] = TempValue;
    } else {
      TotalFixedDescriptionCollected["FixedDescription" + (i + 1)] = null;
    }
  }

  var formData = new FormData();
  formData.append("ProductSNo", ProductSNo);
  formData.append("ProductName", ProductName);
  formData.append("ProductVaritySNo", ProductVaritySNo);
  formData.append("ProductMRP", ProductMRP);
  formData.append("ProductOfferPrice", ProductOfferPrice);
  formData.append("AvailableStock", AvailableStock);
  formData.append("VarityValue1", VarityValue1);
  formData.append("VarityValue2", VarityValue2);
  formData.append("VarityValue3", VarityValue3);
  formData.append("ProductCollectedDescription", ProductCollectedDescription);
  formData.append("ImageUplodeOrNot", selectedOption);
  formData.append("VaritySelectionName1", VaritySelectionName1);
  formData.append("VaritySelectionName2", VaritySelectionName2);
  formData.append("VaritySelectionName3", VaritySelectionName3);
  formData.append("ProductOldImages1", ProductImages.ProductImage1);
  formData.append("ProductOldImages2", ProductImages.ProductImage2);
  formData.append("ProductOldImages3", ProductImages.ProductImage3);
  formData.append("ProductOldImages4", ProductImages.ProductImage4);
  formData.append("ProductOldImages5", ProductImages.ProductImage5);
  formData.append("ProductOldImages6", ProductImages.ProductImage6);
  formData.append("ProductOldImages7", ProductImages.ProductImage7);
  formData.append("ProductOldImages8", ProductImages.ProductImage8);
  formData.append("ProductOldImages9", ProductImages.ProductImage9);
  formData.append("ProductOldImages10", ProductImages.ProductImage10);

  formData.append("ProductImageUplode0", ProductImageUplode0);
  formData.append("ProductImageUplode1", ProductImageUplode1);
  formData.append("ProductImageUplode2", ProductImageUplode2);
  formData.append("ProductImageUplode3", ProductImageUplode3);
  formData.append("ProductImageUplode4", ProductImageUplode4);
  formData.append("ProductImageUplode5", ProductImageUplode5);
  formData.append("ProductImageUplode6", ProductImageUplode6);
  formData.append("ProductImageUplode7", ProductImageUplode7);
  formData.append("ProductImageUplode8", ProductImageUplode8);
  formData.append("ProductImageUplode9", ProductImageUplode9);
  for (var i = 1; i <= 40; i++) {
    formData.append(
      `TotalFD${i}`,
      TotalFixedDescriptionCollected[`FixedDescription${i}`]
    );
  }

  sendAxiosImg(
    "/cartify/seller/product/add-product/add-varity/addProductVarityUploadProcess.php",
    formData
  )
    .then((response) => {
      if (response.status == "success") {
        if (Type == "AddMoreVarity") {
          response['url'] = "/cartify/seller/product/add-product/add-varity/";
          showAlert(response);

        } else if (Type == "SubmitVarity") {
          response["url"] = "/cartify/seller/product/view-products/";
          // window.location.href = "/cartify/seller/product/view-products/";
          showAlert(response);
        }
      } 

    })
};

document
  .getElementById("AddMoreVarity")
  .addEventListener("click", function (e) {
    e.preventDefault();
    if (CheckAllData()) {
      UplodeMoreVarityData("AddMoreVarity");
      // console.log("AddMoreVarity");
    }
  });
document.getElementById("SubmitVarity").addEventListener("click", function (e) {
  e.preventDefault();

  if (CheckAllData()) {
    UplodeMoreVarityData("SubmitVarity");
    // console.log("SubmitVarity");
    // console.log(AllOldVarityName);
  }
});
