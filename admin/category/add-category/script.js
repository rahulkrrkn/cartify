const OptionSeletFn = (Response, OptionId, ShowImgId) => {
  // Update the image source
  const imgElement = document.getElementById(ShowImgId);
  if (imgElement) {
    imgElement.src =
      "/cartify/uploads/categoryImg/" + Response[0].AllCategoryImgView;
  }
  const optionsSelect = document.getElementById(OptionId);
  // Remove old options
  optionsSelect.innerHTML =
    '  <option value="" disabled selected>Select</option>';
  // Add new options
  if (Response.length > 0) {
    Response.forEach(function (element) {
      const newOption = document.createElement("option");
      newOption.value = element.ResponseAllCategory; // Set the value of the new option
      newOption.textContent = element.ResponseAllCategory; // Set the displayed text
      optionsSelect.appendChild(newOption);
    });
  }
  // Add "Other" option
  const newOption = document.createElement("option");
  newOption.value = "Other";
  newOption.textContent = "Other";
  optionsSelect.appendChild(newOption);
};

////Variable For Select Area
const CategorySelectArea = document.querySelector("#CategorySelectArea");
const SubCategorySelectArea = document.querySelector("#SubCategorySelectArea");
////Varible For Image View
const MainCategoryImageView = document.querySelector("#MainCategoryImageView");
const CategoryImageView = document.querySelector("#CategoryImageView");
const SubCategoryImageView = document.querySelector("#SubCategoryImageView");
////Varible For New
const MainCategoryCreateForNew = document.querySelector(
  "#MainCategoryCreateForNew"
);
const CategoryCreateForNew = document.querySelector("#CategoryCreateForNew");
const SubCategoryCreateForNew = document.querySelector(
  "#SubCategoryCreateForNew"
);
const forSelect = document.querySelector("#forSelect");
const CreateCategoryButtonDiv = document.querySelector(
  "#CreateCategoryButtonDiv"
);
document.addEventListener("axiosReady", function () {
  axios
    .post(
      "/cartify/admin/category/add-category/checkCategoryAlreadyOrNot.api.php",
      {
        LoadMainCategory: "LoadMainCategory",
      }
    )
    .then(function (response) {
      // OptionSeletFn(response.data, "SelectMainCategory","MainCategoryImageView");
      OptionSeletFn(response.data, "SelectMainCategory");
    });
});

////VARIBLES
const CategoryCreateForSelect = 0;
document
  .querySelector("#SelectMainCategory")
  .addEventListener("change", function () {
    MainCategoryValue = document.querySelector("#SelectMainCategory").value;
    if (MainCategoryValue === "Other") {
      MainCategoryImageView.style.display = "None";
      CategorySelectArea.style.display = "None";
      SubCategorySelectArea.style.display = "None";
      MainCategoryCreateForNew.style.display = "block";
      CategoryCreateForNew.style.display = "block";
      SubCategoryCreateForNew.style.display = "block";
      LoadOtherAttribute();
    } else {
      axios
        .post(
          "/cartify/admin/category/add-category/checkCategoryAlreadyOrNot.api.php",
          {
            LoadCategory: "LoadCategory",
            MainCategoryValue: MainCategoryValue,
          }
        )
        .then(function (response) {
          OptionSeletFn(
            response.data,
            "SelectCategory",
            "MainCategoryImageView"
          );
        });
      MainCategoryImageView.style.display = "block";
      CategorySelectArea.style.display = "block";
      SubCategorySelectArea.style.display = "block";
      MainCategoryCreateForNew.style.display = "None";
      CategoryCreateForNew.style.display = "None";
      SubCategoryCreateForNew.style.display = "None";
      forSelect.style.display = "none";
      CreateCategoryButtonDiv.style.display = "none";
    }
  });
document
  .querySelector("#SelectCategory")
  .addEventListener("change", function () {
    CategoryValue = document.querySelector("#SelectCategory").value;
    if (CategoryValue === "Other") {
      SubCategorySelectArea.style.display = "None";
      CategoryCreateForNew.style.display = "block";
      SubCategoryCreateForNew.style.display = "block";
      CategoryImageView.style.display = "none";
      LoadOtherAttribute();
    } else {
      axios
        .post(
          "/cartify/admin/category/add-category/checkCategoryAlreadyOrNot.api.php",
          {
            LoadSubCategory: "LoadSubCategory",
            CategoryValue: CategoryValue,
          }
        )
        .then(function (response) {
          "CategoryImageView";
          OptionSeletFn(
            response.data,
            "SelectSubCategory",
            "CategoryImageView"
          );
        });
      CategoryImageView.style.display = "block";
      SubCategorySelectArea.style.display = "block";
      CategoryCreateForNew.style.display = "None";
      SubCategoryCreateForNew.style.display = "None";
      forSelect.style.display = "none";
      CreateCategoryButtonDiv.style.display = "none";
    }
  });

document
  .querySelector("#SelectSubCategory")
  .addEventListener("change", function () {
    MainCategoryValue = document.querySelector("#SelectMainCategory").value;
    CategoryValue = document.querySelector("#SelectCategory").value;
    SubCategoryValue = document.querySelector("#SelectSubCategory").value;
    if (SubCategoryValue === "Other") {
      SubCategoryCreateForNew.style.display = "block";
      SubCategoryImageView.style.display = "none";
      LoadOtherAttribute();
    } else {
      forSelect.style.display = "block";
      axios
        .post(
          "/cartify/admin/category/add-category/checkCategoryAlreadyOrNot.api.php",
          {
            LoadSubCategoryImageView: "LoadSubCategoryImageView",
            MainCategoryValue: MainCategoryValue,
            CategoryValue: CategoryValue,
            SubCategoryValue: SubCategoryValue,
          }
        )
        .then(function (response) {
          document.getElementById("forView").style.display = "block";
          TotalAttributes = 1;
          document.querySelector(".selectedAttributeValues").innerHTML = "";
          while (TotalAttributes != 16) {
            let AttributeTempValue =
              response.data[0][`Attribute${TotalAttributes}`];
            if (AttributeTempValue != null && AttributeTempValue != 0) {
              document.querySelector(".selectedAttributeValues").innerHTML +=
                "<label>" + AttributeTempValue + "</label>";
            }
            TotalAttributes = TotalAttributes + 1;
          }

          document.getElementById("SubCategoryImageView").src =
            "/cartify/uploads/categoryImg/" +
            response.data[0].AllCategoryImgView;
        });
      SubCategoryCreateForNew.style.display = "None";
      SubCategoryImageView.style.display = "block";
      forSelect.style.display = "none";
      CreateCategoryButtonDiv.style.display = "none";
    }
  });
const LoadOtherAttribute = () => {
  forSelect.style.display = "block";
  CreateCategoryButtonDiv.style.display = "block";
  document.getElementById("forView").style.display = "none";
};
const loadAttributeAndDescription = () => {
  axios
    .post(
      "/cartify/admin/category/add-category/loadAttributeAndDescription.api.php",
      {
        LoadAttribute: "LoadAttribute",
      }
    )
    .then(function (response) {
      ForSelectAttribute = document.querySelector("#ForSelectAttribute");
      ForSelectAttribute.innerHTML = "";
      response.data.forEach((element) => {
        ForSelectAttribute.innerHTML += `<label for='AttributeCheckBox${element.SNo}'><input onchange="toggleCheckbox(this)" type='checkbox'  id='AttributeCheckBox${element.SNo}' 
                    name='AttributeCheckBox' value='${element.SNo}'> ${element.MeasurementUnit}</label>`;
      });
    });
  axios
    .post(
      "/cartify/admin/category/add-category/loadAttributeAndDescription.api.php",
      {
        LoadAllDescription: "LoadAllDescription",
      }
    )
    .then(function (response) {
      ForSelectDescription = document.querySelector("#ForSelectDescription");
      ForSelectDescription.innerHTML = "";
      response.data.forEach((element) => {
        ForSelectDescription.innerHTML += `<label for='DescriptionDataCheckBox${element.SNo}'><input  onchange="toggleCheckbox(this)"  type='checkbox' id='DescriptionDataCheckBox${element.SNo}' 
                    name='DescriptionDataCheckBox' value='${element.SNo}'> ${element.DescriptionData}</label>`;
      });
    });
};
function toggleCheckbox(checkbox) {
  const label = checkbox.parentElement;
  label.classList.toggle("checked", checkbox.checked);
}
document.addEventListener("axiosReady", function () {
  loadAttributeAndDescription();
});


//// For Attribute Selection Checkup
const CategoryCreateMaxAttributes = 15;

document.addEventListener("change", function (event) {
  if (event.target.matches('input[name="AttributeCheckBox"]')) {
    const checkedCount = document.querySelectorAll(
      'input[name="AttributeCheckBox"]:checked'
    ).length;
    if (checkedCount > CategoryCreateMaxAttributes) {
      alert(
        `You can only select a maximum of ${CategoryCreateMaxAttributes} attributes.`
      );
      event.target.checked = false; // Uncheck the last selected checkbox
    }
  }
});

//// For Description Data Selection Checkup
const CategoryCreateMaxDescriptionData = 40;
// document.querySelectorAll('input[type="checkbox"]').forEach((checkbox) => {
document.addEventListener("change", function (event) {
  if (event.target.matches('input[name="DescriptionDataCheckBox"]')) {
    const checkedCount = document.querySelectorAll(
      'input[name="DescriptionDataCheckBox"]:checked'
    ).length;

    if (checkedCount > CategoryCreateMaxDescriptionData) {
      alert(
        `You can only select a maximum of ${CategoryCreateMaxDescriptionData} Description Attributes.`
      );
      event.target.checked = false; // Uncheck the last selected checkbox
    }
  }
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

////For Create Category
document
  .querySelector("#CreateCategoryButton")
  .addEventListener("click", function (e) {
    e.preventDefault();
    document.getElementById("CreateCategoryMessage").innerText = ".";
    ////Selected Values
    const SelectedMainCategory = document.querySelector(
      "#SelectMainCategory"
    ).value;
    const SelectedCategory = document.querySelector("#SelectCategory").value;
    const SelectedSubCategory =
      document.querySelector("#SelectSubCategory").value;
    ////Old uploded link
    MainCategoryImageViewLink = document.querySelector(
      "#MainCategoryImageView"
    ).src;
    CategoryImageViewLink = document.querySelector("#CategoryImageView").src;
    SubCategoryImageViewLink = document.querySelector(
      "#SubCategoryImageView"
    ).src;
    ////Input box value
    const MainCategoryInputBox = document.querySelector(
      "#MainCategoryInputBox"
    ).value;
    const CategoryInputBox = document.querySelector("#CategoryInputBox").value;
    const SubCategoryInputBox = document.querySelector(
      "#SubCategoryInputBox"
    ).value;
    ////Image Uplode value
    const ImgUplodeInput1 = document.querySelector("#ImgUplodeInput1").files[0];
    const ImgUplodeInput2 = document.querySelector("#ImgUplodeInput2").files[0];
    const ImgUplodeInput3 = document.querySelector("#ImgUplodeInput3").files[0];
    ////Check box value
    const SelectedDescriptionData = document.querySelectorAll(
      'input[name="DescriptionDataCheckBox"]:checked'
    );
    const selectedSelectedDescriptionDataValues = Array.from(
      SelectedDescriptionData
    ).map((checkbox) => checkbox.value);
    const SelectedUnits = document.querySelectorAll(
      'input[name="AttributeCheckBox"]:checked'
    );
    const selectedValues = Array.from(SelectedUnits).map(
      (checkbox) => checkbox.value
    );
    ////Uplodong process start
    // Prepare the form data to send to the backend
    const formData = new FormData();
    formData.append("SelectedMainCategory", SelectedMainCategory);
    formData.append("SelectedCategory", SelectedCategory);
    formData.append("SelectedSubCategory", SelectedSubCategory);
    formData.append("MainCategoryImageViewLink", MainCategoryImageViewLink);
    formData.append("CategoryImageViewLink", CategoryImageViewLink);
    formData.append("SubCategoryImageViewLink", SubCategoryImageViewLink);
    formData.append("MainCategoryInputBox", MainCategoryInputBox);
    formData.append("CategoryInputBox", CategoryInputBox);
    formData.append("SubCategoryInputBox", SubCategoryInputBox);
    formData.append("ImgUplodeInput1", ImgUplodeInput1);
    formData.append("ImgUplodeInput2", ImgUplodeInput2);
    formData.append("ImgUplodeInput3", ImgUplodeInput3);
    // Append the selected attribute values to the form data
    selectedValues.forEach((value) => {
      formData.append("SelectedAttributes[]", value);
    });
    selectedSelectedDescriptionDataValues.forEach((value) => {
      formData.append("SelectedDescriptionData[]", value);
    });
    // Send the data to the backend using Axios
    axios
      .post(
        "/cartify/admin/category/add-category/createNewCategoryProcess.api.php",
        formData
      )
      .then((response) => {
        // Handle success response
        // You can also show a success message to the user
        if (response.data.status === "success") {
          document.getElementById("CreateCategoryMessage").style.color =
            "green";
          document.getElementById("CreateCategoryMessage").innerHTML =
            response.data.message;
          alert(response.data.message);
          // Countdown timer
          let countdown = 10; // Starting countdown from 10 seconds
          const countdownMessage = document.createElement("div");
          countdownMessage.id = "CountdownMessage";
          document
            .getElementById("CreateCategoryMessage")
            .appendChild(countdownMessage);
          const updateCountdown = () => {
            if (countdown > 0) {
              countdownMessage.innerHTML = `Redirecting to Home in ${countdown} seconds...`;
              countdown--; // Decrease countdown
            } else {
              clearInterval(timer); // Clear the interval when countdown reaches 0
              location.reload(); // Change this to your desired redirect URL if needed
            }
          };
          const timer = setInterval(updateCountdown, 1000); // Update every second
          updateCountdown(); // Initial call to display the first countdown message
        } else if (response.data.status === "error") {
          document.getElementById("CreateCategoryMessage").style.color = "red";
          document.getElementById("CreateCategoryMessage").innerHTML =
            response.data.message;
          setTimeout(() => {
            document.getElementById("CreateCategoryMessage").innerHTML = ".";
          }, 10000);
        }
      })
      .catch((error) => {
        // Handle error response
        console.error("Error:", error);
        // You can also show an error message to the user
      });
  });
