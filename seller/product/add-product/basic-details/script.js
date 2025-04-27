// Button Woking

// Checking Form FN
const MainProductNext1Check = () => {
  const SelectMainCategoryValue = document.querySelector(
    "#SelectMainCategory"
  ).value;
  let MainCategoryCheck = false;
  if (SelectMainCategoryValue === "") {
    MainCategoryCheck = false;
  } else {
    MainCategoryCheck = true;
  }
  const MainProductSelectCategoryId = document.querySelector(
    "#MainProductSelectCategory"
  ).value;
  let MainProductSelectCategoryCheck = false;
  if (MainProductSelectCategoryId === "") {
    MainProductSelectCategoryCheck = false;
  } else {
    MainProductSelectCategoryCheck = true;
  }
  const MainProductSelectSubCategory = document.querySelector(
    "#MainProductSelectSubCategory"
  ).value;
  let MainProductSelectSubCategoryCheck = false;
  if (MainProductSelectSubCategory === "") {
    MainProductSelectSubCategoryCheck = false;
  } else {
    MainProductSelectSubCategoryCheck = true;
  }

  if (
    MainCategoryCheck &&
    MainProductSelectCategoryCheck &&
    MainProductSelectSubCategoryCheck
  ) {
    return true;
  } else {
    return false;
  }
};

const MainProductNext2Check = () => {
  const MainProductName = document.querySelector("#MainProductName").value;
  const MainProductDescription = document.querySelector(
    "#MainProductDescription"
  ).value;
  const MainProductBrand = document.querySelector("#MainProductBrand").value;
  const DispachIn = document.querySelector("#DispachIn").value;
  const Keywords = document.querySelector("#Keywords").value;
  let MainProductNameCheck = false;
  let MainProductDescriptionCheck = false;
  if (MainProductName === "") {
    alert("Product Name Should Not Be Empty");
    MainProductNameCheck = false;
  } else {
    MainProductNameCheck = true;
  }

  if (MainProductDescription === "") {
    alert("Description Should Not Be Empty");
    MainProductDescriptionCheck = false;
  } else if (MainProductDescription.length < 10) {
    alert("Description Should Be More Than 10 Character");
    MainProductDescriptionCheck = false;
  } else {
    MainProductDescriptionCheck = true;
  }

  let MainProductBrandCheck = false;
  if (MainProductBrand === "") {
    alert("Brand Should Not Be Empty");
    MainProductBrandCheck = false;
  } else {
    MainProductBrandCheck = true;
  }

  let DispachInCheck = false;
  if (DispachIn === "") {
    alert("Dispach In Should Not Be Empty");
    DispachInCheck = false;
  } else if (isNaN(DispachIn)) {
    alert("Dispach In Should Be Number");
    DispachInCheck = false;
  } else {
    DispachInCheck = true;
  }

  let KeywordsCheck = false;
  if (Keywords === "") {
    alert("Keywords Should Not Be Empty");
    KeywordsCheck = false;
  } else {
    KeywordsCheck = true;
  }

  if (
    MainProductNameCheck &&
    MainProductDescriptionCheck &&
    MainProductBrandCheck &&
    DispachInCheck &&
    KeywordsCheck
  ) {
    return true;
  } else {
    return false;
  }
};

const MainProductNext3Check = () => {
  const VaritySelection1 = document.querySelector("#VaritySelection1").value;
  const VaritySelection2 = document.querySelector("#VaritySelection2").value;
  const VaritySelection3 = document.querySelector("#VaritySelection3").value;
  let VaritySelectionCheck = false;
  if (
    VaritySelection1 === "" ||
    VaritySelection2 === "" ||
    VaritySelection3 === ""
  ) {
    VaritySelectionCheck = false;
  } else {
    VaritySelectionCheck = true;
  }
  if (VaritySelectionCheck) {
    return true;
  } else {
    return false;
  }
};

const MainProductNext5Check = () => {
  const LocalDeliveryCharge = document.querySelector(
    "#LocalDeliveryCharge"
  ).value;
  const ZonalDeliveryCharge = document.querySelector(
    "#ZonalDeliveryCharge"
  ).value;
  const InternationalDeliveryCharge = document.querySelector(
    "#NationalDeliveryCharge"
  ).value;
  let LocalDeliveryChargeCheck = false;
  if (isNaN(LocalDeliveryCharge)) {
    alert("Local Delivery Charge Should Be Number");
    LocalDeliveryChargeCheck = false;
  } else {
    LocalDeliveryChargeCheck = true;
  }
  let ZonalDeliveryChargeCheck = false;
  if (isNaN(ZonalDeliveryCharge)) {
    alert("Zonal Delivery Charge Should Be Number");
    ZonalDeliveryChargeCheck = false;
  } else {
    ZonalDeliveryChargeCheck = true;
  }
  let NationalDeliveryChargeChargeCheck = false;
  if (isNaN(InternationalDeliveryCharge)) {
    alert("International Delivery Charge Should Be Number");
    InternationalDeliveryChargeCheck = false;
  } else {
    InternationalDeliveryChargeCheck = true;
  }
  if (
    LocalDeliveryChargeCheck &&
    ZonalDeliveryChargeCheck &&
    InternationalDeliveryChargeCheck
  ) {
    return true;
  } else {
    return false;
  }
};
const MainProductNext6Check = () => {
  const COD = document.querySelector("#COD").value;
  const UPI = document.querySelector("#UPI").value;
  const PickupFromStore = document.querySelector("#PickupFromStore").value;
  let CODCheck = false;
  if (COD === "") {
    CODCheck = false;
  } else {
    CODCheck = true;
  }
  let UPICheck = false;
  if (UPI === "") {
    UPICheck = false;
  } else {
    UPICheck = true;
  }
  let PickupFromStoreCheck = false;
  if (PickupFromStore === "") {
    PickupFromStoreCheck = false;
  } else {
    PickupFromStoreCheck = true;
  }
  if (CODCheck || UPICheck || PickupFromStoreCheck) {
    return true;
  } else {
    return false;
  }
};

// varible Declaration

const MainProductNext1 = document.querySelector("#MainProductNext1");
const MainProductBack1 = document.querySelector("#MainProductBack1");
const MainProductNext2 = document.querySelector("#MainProductNext2");
const MainProductBack2 = document.querySelector("#MainProductBack2");
const MainProductNext3 = document.querySelector("#MainProductNext3");
const MainProductBack3 = document.querySelector("#MainProductBack3");
const MainProductNext4 = document.querySelector("#MainProductNext4");
const MainProductBack4 = document.querySelector("#MainProductBack4");
const MainProductNext5 = document.querySelector("#MainProductNext5");
const MainProductBack5 = document.querySelector("#MainProductBack5");
const MainProductSubmit = document.querySelector("#MainProductSubmit");
const MainProductSelectCategory = document.querySelector(
  ".MainProductSelectCategory"
);
const MainProductSelectCategoryBtn = document.querySelector(
  ".MainProductSelectCategoryBtn"
);
const MainProductMainData = document.querySelector(".MainProductMainData");
const MainProductMainDataBtn = document.querySelector(
  ".MainProductMainDataBtn"
);
const MainProductVarityType = document.querySelector(".MainProductVarityType");
const MainProductVarityTypeBtn = document.querySelector(
  ".MainProductVarityTypeBtn"
);
const MainProductFixedDescriptionData = document.querySelector(
  ".MainProductFixedDescriptionData"
);
const MainProductFixedDescriptionDataBtn = document.querySelector(
  ".MainProductFixedDescriptionDataBtn"
);
const MainProductDeliveryDetails = document.querySelector(
  ".MainProductDeliveryDetails"
);
const MainProductDeliveryDetailsBtn = document.querySelector(
  ".MainProductDeliveryDetailsBtn"
);
const MainProductPaymentMethod = document.querySelector(
  ".MainProductPaymentMethod"
);
const MainProductPaymentMethodBtn = document.querySelector(
  ".MainProductPaymentMethodBtn"
);
const error = document.querySelector(".error");

// Function Clicking

MainProductNext2.addEventListener("click", () => {
  if (MainProductNext2Check()) {
    MainProductMainData.style.display = "none";
    MainProductMainDataBtn.style.display = "none";
    MainProductVarityType.style.display = "flex";
    MainProductVarityTypeBtn.style.display = "flex";
    window.scrollTo(0, 0);
    error.textContent = "";
    error.style.color = "green";
  } else {
    // alert("Please Fill Product Details Correctly");
    error.textContent = "Please Fill Product Details Correctly";
    error.style.color = "red";
  }
});

MainProductBack2.addEventListener("click", () => {
  MainProductVarityType.style.display = "none";
  MainProductVarityTypeBtn.style.display = "none";
  MainProductMainData.style.display = "flex";
  MainProductMainDataBtn.style.display = "flex";
  window.scrollTo(0, 0);
});

MainProductNext3.addEventListener("click", () => {
  if (MainProductNext3Check()) {
    MainProductFixedDescriptionData.style.display = "flex";
    MainProductFixedDescriptionDataBtn.style.display = "flex";
    MainProductVarityType.style.display = "none";
    MainProductVarityTypeBtn.style.display = "none";
    window.scrollTo(0, 0);
    error.textContent = "";
    error.style.color = "green";
  } else {
    alert("Please Select Varity Correctly");
    error.textContent = "Please Select Varity Correctly";
    error.style.color = "red";
  }
});

MainProductBack3.addEventListener("click", () => {
  MainProductFixedDescriptionData.style.display = "none";
  MainProductFixedDescriptionDataBtn.style.display = "none";
  MainProductVarityType.style.display = "flex";
  MainProductVarityTypeBtn.style.display = "flex";
  window.scrollTo(0, 0);
});

MainProductNext4.addEventListener("click", () => {
  MainProductDeliveryDetails.style.display = "flex";
  MainProductDeliveryDetailsBtn.style.display = "flex";
  MainProductFixedDescriptionData.style.display = "none";
  MainProductFixedDescriptionDataBtn.style.display = "none";
  window.scrollTo(0, 0);
  error.textContent = "";
  error.style.color = "green";
});

MainProductBack4.addEventListener("click", () => {
  MainProductDeliveryDetails.style.display = "none";
  MainProductDeliveryDetailsBtn.style.display = "none";
  MainProductFixedDescriptionData.style.display = "flex";
  MainProductFixedDescriptionDataBtn.style.display = "flex";
  window.scrollTo(0, 0);
});

MainProductNext5.addEventListener("click", () => {
  if (MainProductNext5Check()) {
    MainProductPaymentMethod.style.display = "flex";
    MainProductPaymentMethodBtn.style.display = "flex";
    MainProductDeliveryDetails.style.display = "none";
    MainProductDeliveryDetailsBtn.style.display = "none";
    window.scrollTo(0, 0);
    error.textContent = "";
    error.style.color = "green";
  } else {
    alert("Please Fill Delivery Details Correctly");
    error.textContent = "Please Fill Delivery Details Correctly";
    error.style.color = "red";
  }
});

MainProductBack5.addEventListener("click", () => {
  MainProductPaymentMethod.style.display = "none";
  MainProductPaymentMethodBtn.style.display = "none";
  MainProductDeliveryDetails.style.display = "flex";
  MainProductDeliveryDetailsBtn.style.display = "flex";
  window.scrollTo(0, 0);
});

// Loding Function

const selectMainCategory = document.querySelector("#SelectMainCategory");
const MainProductSelectCategoryId = document.querySelector(
  "#MainProductSelectCategory"
);

const MainProductMainCategoryImgView = document.querySelector(
  "#MainProductMainCategoryImgView"
);
MainProductSelectSubCategory = document.querySelector(
  "#MainProductSelectSubCategory"
);
MainProductCategoryImgView = document.querySelector(
  "#MainProductCategoryImgView"
);
MainProductSubCategoryImgView = document.querySelector(
  "#MainProductSubCategoryImgView"
);

sendAxios(
    "/cartify/seller/product/add-product/basic-details/addNewProductBasicDetail.api.php",
    {
      categoryDetails: "categoryDetails",
    }
  )
  .then((response) => {
    console.log(response.data);
    ResponseIs = response.data[0];
    // MainProductSubCategoryImgView.src =
    //   "/cartify/Images/AllCategoryImg/" + ResponseIs.DBCSubCategoryImg;
    document.getElementById("SelectCategorySno").value =
      ResponseIs.DBAllCategorySNo;
    document.getElementById("SelectMainCategory").value =
      ResponseIs.DBMainCategoryName;
    document.getElementById("MainProductSelectCategory").value =
      ResponseIs.DBCategoryName;
    document.getElementById("MainProductSelectSubCategory").value =
      ResponseIs.DBSubCategoryName;

    // Varible
    const VaritySelection1 = document.querySelector("#VaritySelection1");
    const VaritySelection2 = document.querySelector("#VaritySelection2");
    const VaritySelection3 = document.querySelector("#VaritySelection3");
    VaritySelection1.innerHTML =
      '  <option value="" disabled selected>Select</option> <option value="No">Don\'t Select any Varity</option>';
    VaritySelection2.innerHTML =
      '  <option value="" disabled selected>Select</option><option value="No">Don\'t Select any Varity</option>';
    VaritySelection3.innerHTML =
      '  <option value="" disabled selected>Select</option><option value="No">Don\'t Select any Varity</option>';

    DBAttributes = ResponseIs.DBAttribute;
    Object.keys(DBAttributes).forEach((key) => {
      const attribute = DBAttributes[key];
      if (
        attribute.SNo != "0" &&
        attribute.SNo.trim() != "" &&
        attribute.SNo != null
      ) {
        const option = document.createElement("option");
        option.value = attribute.SNo;
        option.textContent = attribute.Value;
        VaritySelection1.appendChild(option);
        const option2 = document.createElement("option");
        option2.value = attribute.SNo;
        option2.textContent = attribute.Value;
        VaritySelection2.appendChild(option2);
        const option3 = document.createElement("option");
        option3.value = attribute.SNo;
        option3.textContent = attribute.Value;
        VaritySelection3.appendChild(option3);
      }

      //For Data Description
      const MainProductFixedDescriptionData = document.querySelector(
        ".MainProductFixedDescriptionData"
      );
      MainProductFixedDescriptionData.innerHTML =
        "<h2>Fixed Description Details</h2>";

      DBDescriptions = ResponseIs.DBDescription;
      Object.keys(DBDescriptions).forEach((key) => {
        const Description1 = DBDescriptions[key];
        if (
          Description1.SNo != "0" &&
          Description1.SNo.trim() != "" &&
          Description1.SNo != null
        ) {
          const NewDescriptionDiv =
            "<div> <label for='" +
            Description1.Value +
            "'> " +
            Description1.Value +
            "</label> <input type='text' id='" +
            Description1.Value +
            "' name='" +
            Description1.Value +
            "' /> </div>";

          // Append the new div to an existing element
          MainProductFixedDescriptionData.innerHTML += NewDescriptionDiv;
        }
      });

      // console.log(attribute.SNo);
    });
    // console.log(ResponseIs.DBAttribute);

    // console.log(ResponseIs);
  });
// Not Select Same varity

const VaritySelection1 = document.querySelector("#VaritySelection1");
const VaritySelection2 = document.querySelector("#VaritySelection2");
const VaritySelection3 = document.querySelector("#VaritySelection3");
VaritySelection1.addEventListener("change", function () {
  if (VaritySelection1.value == "No") {
  } else {
    if (VaritySelection1.value == VaritySelection2.value) {
      alert("Please Select Different Varity");
      VaritySelection1.value = "";
    } else if (VaritySelection1.value == VaritySelection3.value) {
      alert("Please Select Different Varity");
      VaritySelection1.value = "";
    } else {
    }
  }
});

VaritySelection2.addEventListener("change", function () {
  if (VaritySelection2.value == "No") {
  } else {
    if (VaritySelection2.value == VaritySelection1.value) {
      alert("Please Select Different Varity");
      VaritySelection2.value = "";
    } else if (VaritySelection2.value == VaritySelection3.value) {
      alert("Please Select Different Varity");
      VaritySelection2.value = "";
    } else {
    }
  }
});

VaritySelection3.addEventListener("change", function () {
  if (VaritySelection3.value == "No") {
  } else {
    if (VaritySelection3.value == VaritySelection1.value) {
      alert("Please Select Different Varity");
      VaritySelection3.value = "";
    } else if (VaritySelection3.value == VaritySelection2.value) {
      alert("Please Select Different Varity");
      VaritySelection3.value = "";
    } else {
    }
  }
});

// Form Submittion
const ClickedOnSubmit = document.querySelector("#MainProductSubmit");
ClickedOnSubmit.addEventListener("click", () => {
  loadingPage("start");
  const MiainCategoryValue = document.querySelector(
    "#SelectMainCategory"
  ).value;
  const CategoryValue = document.querySelector(
    "#MainProductSelectCategory"
  ).value;
  const SubCategoryValue = document.querySelector(
    "#MainProductSelectSubCategory"
  ).value;
  const SelectedAllCategorySNoValue =
    document.querySelector("#SelectCategorySno").value;
  const MainProductNameValue = document.querySelector("#MainProductName").value;
  const MainProductDescriptionValue = document.querySelector(
    "#MainProductDescription"
  ).value;
  const BrandValue = document.querySelector("#MainProductBrand").value;
  const MainDispachInValue = document.querySelector("#DispachIn").value;
  const KeywordsValue = document.querySelector("#Keywords").value;
  const VaritySelection1Value =
    document.querySelector("#VaritySelection1").value;
  const VaritySelection2Value =
    document.querySelector("#VaritySelection2").value;
  const VaritySelection3Value =
    document.querySelector("#VaritySelection3").value;
  // Fixed Deescription Data In Last

  let LocalDeliveryOptions = document.getElementsByName("LocalDelivery");
  let LocalDeliveryValue = ""; // Use let instead of const for reassignment
  const LocalDeliveryChargeValue = document.querySelector(
    "#LocalDeliveryCharge"
  ).value;

  for (const option of LocalDeliveryOptions) {
    if (option.checked) {
      LocalDeliveryValue = option.value;
      break;
    }
  }

  let ZonalDelivery = document.getElementsByName("ZonalDelivery");
  let ZonalDeliveryValue = "";
  const ZonalDeliveryChargeValue = document.querySelector(
    "#ZonalDeliveryCharge"
  ).value;
  for (const option of ZonalDelivery) {
    if (option.checked) {
      ZonalDeliveryValue = option.value;
      break;
    }
  }

  let NationalDelivery = document.getElementsByName("NationalDelivery");
  let NationalDeliveryValue = "";
  const NationalDeliveryChargeValue = document.querySelector(
    "#NationalDeliveryCharge"
  ).value;
  for (const option of NationalDelivery) {
    if (option.checked) {
      NationalDeliveryValue = option.value;
      break;
    }
  }

  let ListOnUniversal = document.getElementsByName("ListOnUniversal");
  let ListOnUniversalShopValue = "";
  for (const option of ListOnUniversal) {
    if (option.checked) {
      ListOnUniversalShopValue = option.value;
      break;
    }
  }

  let ListOnLocal = document.getElementsByName("ListOnLocal");
  let ListOnLocalShopValue = "";
  for (const option of ListOnLocal) {
    if (option.checked) {
      ListOnLocalShopValue = option.value;
      break;
    }
  }

  let COD = document.getElementById("COD");
  let CodDeliveryValue = COD.checked ? "Yes" : "No";

  let UPI = document.querySelector("#UPI");
  const UpiDeliveryValue = UPI.checked ? "Yes" : "No";
  let PickupFromStore = document.querySelector("#PickupFromStore");
  const PickupFromStoreValue = PickupFromStore.checked ? "Yes" : "No";
  // Fixed Deescription Data

  const DescriptionDataValueIs = {};

  let descriptionCount = 1;

  // Loop through DBDescriptions and assign values to formData
  Object.keys(DBDescriptions).forEach((key) => {
    const Description1 = DBDescriptions[key];

    if (
      Description1.SNo != "0" &&
      Description1.SNo.trim() != "" &&
      Description1.SNo != null
    ) {
      const inputValue = document.getElementById(Description1.Value).value;

      // Create DescriptionN object with Key and Value structure
      DescriptionDataValueIs[`Description${descriptionCount}`] = {
        Key: Description1.Value,
        Value: inputValue,
      };

      descriptionCount++;
    }
  });

  // Fill remaining descriptions (up to 40) with null values
  while (descriptionCount <= 40) {
    DescriptionDataValueIs[`Description${descriptionCount}`] = {
      Key: null,
      Value: null,
    };
    descriptionCount++;
  }

  let AllCollectedData = {
    MainCategory: MiainCategoryValue,
    Category: CategoryValue,
    SubCategory: SubCategoryValue,
    SelectedAllCategorySNo: SelectedAllCategorySNoValue,
    MainProductName: MainProductNameValue,
    MainProductDescription: MainProductDescriptionValue,
    Brand: BrandValue,
    DispachIn: MainDispachInValue,
    Keywords: KeywordsValue,
    VaritySelection1: VaritySelection1Value,
    VaritySelection2: VaritySelection2Value,
    VaritySelection3: VaritySelection3Value,
    LocalDelivery: LocalDeliveryValue,
    LocalDeliveryCharge: LocalDeliveryChargeValue,
    ZonalDelivery: ZonalDeliveryValue,
    ZonalDeliveryCharge: ZonalDeliveryChargeValue,
    NationalDelivery: NationalDeliveryValue,
    NationalDeliveryCharge: NationalDeliveryChargeValue,
    ListOnUniversal: ListOnUniversalShopValue,
    ListOnLocal: ListOnLocalShopValue,
    COD: CodDeliveryValue,
    UPI: UpiDeliveryValue,
    PickupFromStore: PickupFromStoreValue,
    ...DescriptionDataValueIs,
  };

  sendAxios(
      "/cartify/seller/product/add-product/basic-details/addNewProductBasicDetail.api.php",
      {
        AllCollectedData,
      }
    )
    .then((response) => {
      if (response.data.status == "Success") {
        window.location.href =
          "/cartify/seller/product/add-product/add-first-varity/";
      }
    })
    
  console.log(AllCollectedData);
});
