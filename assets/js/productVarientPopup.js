varientPopupHtml = `    <div id="varityContainerMain">
        <div class="varityContainer">
            <h3>Select Product Variant</h3>
            <div id="varient1">
                <p id="varient1Type">Choose :</p>
                <div id="varient1Values"></div>
            </div>
            <div id="varient2">
                <p id="varient2Type">Choose :</p>
                <div id="varient2Values"></div>
            </div>
            <div id="varient3">
                <p id="varient3Type">Choose :</p>
                <div id="varient3Values"></div>
            </div>
            <p id="message"></p>
            <div class="btn-container">
                <button class="btnS1" onclick="closeVarientPopup()">Cancel</button>
                <button class="btnP1" onclick="applySelection()">Apply</button>
            </div>
        </div>
    </div>`;

let isVarient1 = false;
let isVarient2 = false;
let isVarient3 = false;
let selectedVarient1 = null;
let selectedVarient2 = null;
let selectedVarient3 = null;

// For getting unique values
function getUniqueValues(key) {
  return [...new Set(products.map((item) => item[key]))];
}
// Set all value in id first time
function generateOptions(containerId, values, type) {
  const container = document.getElementById(containerId);
  container.innerHTML = "";
  values.forEach((value) => {
    const div = document.createElement("div");
    div.classList.add("option");
    div.textContent = value;
    // Check if this variant combination is in stock
    const isOutOfStock = !products.some(
      (p) =>
        p[
          type === "varient1"
            ? "VarentValue1"
            : type === "varient2"
            ? "VarentValue2"
            : "VarentValue3"
        ] === value && p.Stocks === true
    );
    if (isOutOfStock) {
      div.classList.add("disabled");
    }
    div.onclick = () => selectOption(type, value);
    container.appendChild(div);
  });
}
// Check and apply for set varients 1st time
const setVarients = (mainVarientData) => {
  document.getElementById("varityContainerMain").style.display = "flex";
  if (mainVarientData) {
    types = mainVarientData.VarientsTypes;
    products = mainVarientData.Varients;
  }
  generateOptions(
    "varient1Values",
    getUniqueValues("VarentValue1"),
    "varient1"
  );
  generateOptions(
    "varient2Values",
    getUniqueValues("VarentValue2"),
    "varient2"
  );
  generateOptions(
    "varient3Values",
    getUniqueValues("VarentValue3"),
    "varient3"
  );
  if (types.type1) {
    document.getElementById("varient1").style.display = "block";
    document.getElementById(
      "varient1Type"
    ).textContent = `Choose ${types.type1} :`;
    isVarient1 = true;
  }
  if (types.type2) {
    document.getElementById("varient2").style.display = "block";
    document.getElementById(
      "varient2Type"
    ).textContent = `Choose ${types.type2} :`;
    isVarient2 = true;
  }
  if (types.type3) {
    document.getElementById("varient3").style.display = "block";
    document.getElementById(
      "varient3Type"
    ).textContent = `Choose ${types.type3} :`;
    isVarient3 = true;
  }
};
// Check for is all varients are not a null

// Remove selected value and add new selected value
function selectOption(type, value) {
  const selectedElement = Array.from(
    document.querySelectorAll(`#${type}Values .option`)
  ).find((el) => el.textContent === value);
  if (!selectedElement || selectedElement.classList.contains("disabled")) {
    return; // Prevent selecting disabled options
  }
  document
    .querySelectorAll(`#${type}Values .option`)
    .forEach((el) => el.classList.remove("selected"));
  selectedElement.classList.add("selected");
  if (type === "varient1") selectedVarient1 = value;
  if (type === "varient2") selectedVarient2 = value;
  if (type === "varient3") selectedVarient3 = value;
  filterUnavailableOptions();
}
function filterUnavailableOptions() {
  document.getElementById("message").classList.remove("errorMsg");
  document.getElementById("message").textContent = "";
  let availableVarient2 = new Set();
  let availableVarient3 = new Set();
  if (selectedVarient1) {
    availableVarient2 = new Set(
      products
        // .filter(p => p.VarentValue1 === selectedVarient1 && p.Stocks)
        .filter((p) => p.VarentValue1 === selectedVarient1)
        .map((p) => p.VarentValue2)
    );
    availableVarient3 = new Set(
      products
        // .filter(p => p.VarentValue1 === selectedVarient1 && p.Stocks)
        .filter((p) => p.VarentValue1 === selectedVarient1)
        .map((p) => p.VarentValue3)
    );
  }
  if (selectedVarient2) {
    availableVarient3 = new Set(
      products
        // .filter(p => p.VarentValue1 === selectedVarient1 && p.VarentValue2 === selectedVarient2 && p.Stocks)
        .filter(
          (p) =>
            p.VarentValue1 === selectedVarient1 &&
            p.VarentValue2 === selectedVarient2
        )
        .map((p) => p.VarentValue3)
    );
  }
  document.querySelectorAll(`#varient2Values .option`).forEach((el) => {
    if (availableVarient2.has(el.textContent)) {
      el.classList.remove("disabled");
    } else {
      el.classList.add("disabled");
    }
  });
  document.querySelectorAll(`#varient3Values .option`).forEach((el) => {
    if (availableVarient3.has(el.textContent)) {
      el.classList.remove("disabled");
    } else {
      el.classList.add("disabled");
    }
  });
  autoCheckStocks();
}
function chekingSelectedOrNot() {
  if (
    (!selectedVarient1 && isVarient1) ||
    (!selectedVarient2 && isVarient2) ||
    (!selectedVarient3 && isVarient3)
  ) {
    return false;
  }
  return true;
}
function applySelection() {
  if (!chekingSelectedOrNot()) {
    document.getElementById("message").classList.add("errorMsg");
    document.getElementById("message").textContent =
      "Please select all variants.";
    // console.log("Please select all variants.");
    return;
  }
  const selectedProduct = products.find(
    (p) =>
      p.VarentValue1 === selectedVarient1 &&
      p.VarentValue2 === selectedVarient2 &&
      p.VarentValue3 === selectedVarient3
  );
  if (selectedProduct) {
    setForLodeNewProduct(selectedProduct.ProductVariantsSNo);
    // console.log("Selected Product ID:", selectedProduct.ProductVariantsSNo);
  } else {
    document.getElementById("message").classList.add("errorMsg");
    document.getElementById("message").textContent =
      "No matching product found.";
    // console.log("No matching product found.");
  }
}
function autoCheckStocks() {
  if (!chekingSelectedOrNot()) {
    return;
  }
  const selectedProduct = products.find(
    (p) =>
      p.VarentValue1 === selectedVarient1 &&
      p.VarentValue2 === selectedVarient2 &&
      p.VarentValue3 === selectedVarient3
  );
  if (selectedProduct) {
    if (!selectedProduct.Stocks) {
      document.getElementById("message").classList.add("errorMsg");
      document.getElementById("message").textContent =
        "Selected product is out of stock.";
      // console.log("Selected product is out of stock.");
    }
  }
}
const closeVarientPopup = () => {
  document.getElementById("varityContainerMain").style.display = "none";
};
// setVarients();
