sendAxios(
  "/cartify/seller/product/add-product/add-first-varity/addFirstVarityLoadProcess.api.php",
  {}
).then((response) => {
  console.log(response.data);
  if (
    response.data.VaritySelectionSNo1 == null &&
    response.data.VaritySelectionSNo2 == null &&
    response.data.VaritySelectionSNo3 == null
  ) {
    document.querySelector(".AddVarityValue").style.display = "none";
    document.querySelector("#AddMoreVarity").style.display = "none";
  }
  if (response.data.VaritySelectionSNo1 == null) {
    document.querySelector("#AddVarityValue1").style.display = "none";
  }
  if (response.data.VaritySelectionSNo2 == null) {
    document.querySelector("#AddVarityValue2").style.display = "none";
  }
  if (response.data.VaritySelectionSNo3 == null) {
    document.querySelector("#AddVarityValue3").style.display = "none";
  }

  const NewResponse = response.data;

  document.getElementById("ProductSNo").textContent = NewResponse.ProductSNo;
  document.getElementById("ProductVaritySNo").textContent =
    NewResponse.ProductVariantsSNo;

  document.getElementById("ProductName").textContent =
    NewResponse.MainProductName;
  document.getElementById("ProductDescription").textContent =
    NewResponse.MainProductDescription;
  document.getElementById("ProductVarity1").textContent =
    NewResponse.VaritySelectionName1;
  document.getElementById("ProductVarity2").textContent =
    NewResponse.VaritySelectionName2;
  document.getElementById("ProductVarity3").textContent =
    NewResponse.VaritySelectionName3;
  document.getElementById("ProductCategory").textContent =
    NewResponse.MainCategory +
    " > " +
    NewResponse.Category +
    " > " +
    NewResponse.SubCategory;

  if (NewResponse.VaritySelectionSNo1 != null) {
    document.getElementById("AddVarityValue1").innerHTML =
      "<label for='VarityValue1'>" +
      NewResponse.VaritySelectionName1 +
      "</label> <input type='text' name='VarityValue1' id='VarityValue1' />";
  }
  if (NewResponse.VaritySelectionSNo2 != null) {
    document.getElementById("AddVarityValue2").innerHTML =
      "<label for='VarityValue2'>" +
      NewResponse.VaritySelectionName2 +
      "</label> <input type='text' name='VarityValue2' id='VarityValue2' />";
  }
  if (NewResponse.VaritySelectionSNo3 != null) {
    document.getElementById("AddVarityValue3").innerHTML =
      "<label for='VarityValue3'>" +
      NewResponse.VaritySelectionName3 +
      "</label> <input type='text' name='VarityValue3' id='VarityValue3' />";
  }

  const FixedDescription = document.getElementById("FixedDescription");
  let tempDescription = 0;
  for (let i = 1; i <= 40; i++) {
    if (NewResponse["DescriptionKey" + i] != null) {
      tempDescription++;
      FixedDescription.innerHTML +=
        "<div><label for='FixedDescription" +
        i +
        "'>" +
        NewResponse["DescriptionKey" + i] +
        "</label><input type='text' name='FixedDescription" +
        i +
        "' value='" +
        NewResponse["DescriptionValue" + i] +
        "' id='FixedDescription" +
        i +
        "' /></div>";
    }
  }
  document.getElementById("TotalFixedDescription").value = tempDescription;
});

const TotalDescount = () => {
  let MRP = Number(document.getElementById("Mrp").value);
  let OfferPrice = Number(document.getElementById("OfferPrice").value);
  // console.log(typeof MRP);
  let TotalDescount = Number((((MRP - OfferPrice) / MRP) * 100).toFixed(2));
  document.getElementById("TotalDescount").value = TotalDescount + " % Off";
};
document.getElementById("Mrp").addEventListener("input", function () {
  TotalDescount();
});
document.getElementById("OfferPrice").addEventListener("input", function () {
  TotalDescount();
});

document.querySelectorAll('input[type="file"]').forEach((input) => {
  input.addEventListener("change", handleUpload);
});

function handleUpload(event) {
  const file = event.target.files[0];
  const labelId = event.target.id.replace("Input", "LabelId"); // Get corresponding label ID
  const imgDivId = "imguplodedivid" + labelId.charAt(labelId.length - 1); // Get corresponding div ID
  const imgDiv = document.getElementById(imgDivId);
  const maxFileSize = 2 * 1024 * 1024; // 2 MB in bytes

  // Check if a file is selected
  if (file) {
    // Check the file size
    if (file.size > maxFileSize) {
      alert("File size exceeds 2 MB. Please upload a smaller file.");
      event.target.value = ""; // Reset the input
      return; // Exit the function without modifying imgDiv
    }

    const reader = new FileReader();
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

const CheckAllData = () => {
  const ProductMRP = document.getElementById("Mrp").value;
  const ProductOfferPrice = document.getElementById("OfferPrice").value;
  const AvailableStock = document.getElementById("AvailableStock").value;
  const ProductVarity1 = document.getElementById("ProductVarity1").textContent;
  const ProductVarity2 = document.getElementById("ProductVarity2").textContent;
  const ProductVarity3 = document.getElementById("ProductVarity3").textContent;

  let VarityValue1 = "";
  let VarityValue2 = "";
  let VarityValue3 = "";
  let VarityValueCheck1 = false;
  let VarityValueCheck2 = false;
  let VarityValueCheck3 = false;

  if (ProductVarity1 != "") {
    VarityValue1 = document.getElementById("VarityValue1").value;
    if (VarityValue1 == "") {
      VarityValueCheck1 = false;
    } else {
      VarityValueCheck1 = true;
    }
  } else {
    VarityValueCheck1 = true;
  }

  if (ProductVarity2 != "") {
    VarityValue2 = document.getElementById("VarityValue2").value;
    if (VarityValue2 == "") {
      VarityValueCheck2 = false;
    } else {
      VarityValueCheck2 = true;
    }
  } else {
    VarityValueCheck2 = true;
  }

  if (ProductVarity3 != "") {
    VarityValue3 = document.getElementById("VarityValue3").value;
    if (VarityValue3 == "") {
      VarityValueCheck3 = false;
    } else {
      VarityValueCheck3 = true;
    }
  } else {
    VarityValueCheck3 = true;
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
  } else {
    return true;
  }
};
const UplodeData = (Type) => {
  const ProductSNo = document.getElementById("ProductSNo").textContent;
  const ProductName = document.getElementById("ProductName").textContent;
  const ProductVaritySNo =
    document.getElementById("ProductVaritySNo").textContent;
  const ProductMRP = document.getElementById("Mrp").value;
  const ProductOfferPrice = document.getElementById("OfferPrice").value;
  const AvailableStock = document.getElementById("AvailableStock").value;
  const ProductVarity1 = document.getElementById("ProductVarity1").textContent;
  const ProductVarity2 = document.getElementById("ProductVarity2").textContent;
  const ProductVarity3 = document.getElementById("ProductVarity3").textContent;
  let VarityValue1 = "";
  let VarityValue2 = "";
  let VarityValue3 = "";
  if (ProductVarity1 != "") {
    VarityValue1 = document.getElementById("VarityValue1").value;
  }
  if (ProductVarity2 != "") {
    VarityValue2 = document.getElementById("VarityValue2").value;
  }
  if (ProductVarity3 != "") {
    VarityValue3 = document.getElementById("VarityValue3").value;
  }
  const ProductCollectedDescription =
    document.getElementById("Description").value;
  const ProductImageUplode0 = document.querySelector("#ImgUplode0").files[0];
  const ProductImageUplode1 = document.querySelector("#ImgUplode1").files[0];
  const ProductImageUplode2 = document.querySelector("#ImgUplode2").files[0];
  const ProductImageUplode3 = document.querySelector("#ImgUplode3").files[0];
  const ProductImageUplode4 = document.querySelector("#ImgUplode4").files[0];
  const ProductImageUplode5 = document.querySelector("#ImgUplode5").files[0];
  const ProductImageUplode6 = document.querySelector("#ImgUplode6").files[0];
  const ProductImageUplode7 = document.querySelector("#ImgUplode7").files[0];
  const ProductImageUplode8 = document.querySelector("#ImgUplode8").files[0];
  const ProductImageUplode9 = document.querySelector("#ImgUplode9").files[0];
  let TotalFixedDescriptionCollected = {};

  // Fixed Description Collected

  let TotalFixedDescriptionValue = parseInt(
    document.getElementById("TotalFixedDescription").value
  );

  for (let i = 0; i < 40; i++) {
    if (i < TotalFixedDescriptionValue) {
      let TempValue = document.getElementById(
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

  const formData = new FormData();
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
  for (let i = 1; i <= 40; i++) {
    formData.append(
      `TotalFD${i}`,
      TotalFixedDescriptionCollected[`FixedDescription${i}`]
    );
  }

  // axios.post(
  sendAxiosImg(
    "/cartify/seller/product/add-product/add-first-varity/addFirstVarityUplodeProcess.api.php",
    formData
  ).then((response) => {
    console.log(response.data);
    if (response.status == "success") {
      if (Type == "AddMoreVarity") {
        window.location.href =
          "/cartify/seller/product/add-product/add-varity/";
      } else if (Type == "SubmitVarity") {
        window.location.href = "/cartify/seller/product/view-products/";
      }
    }
  });
};

document
  .getElementById("AddMoreVarity")
  .addEventListener("click", function (e) {
    e.preventDefault();
    if (CheckAllData()) {
      UplodeData("AddMoreVarity");
    }
  });
document.getElementById("SubmitVarity").addEventListener("click", function (e) {
  e.preventDefault();

  if (CheckAllData()) {
    UplodeData("SubmitVarity");
  }
});
