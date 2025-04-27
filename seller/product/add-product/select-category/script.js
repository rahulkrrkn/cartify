const messageElement = document.getElementById("createCategoryMessage");
const selectedSpecifications = new Set();

const setOption = (data, tag) => {
  const selectedOptions = Array.from(tag.options).map((option) => option.value);
  tag.innerHTML = '<option value="" disabled selected>Select Category</option>';
  if (data.status === "success") {
    data.data.forEach(({ name }) => {
      if (!selectedOptions.includes(name)) {
        const option = document.createElement("option");
        option.value = name;
        option.textContent = name;
        tag.appendChild(option);
      }
    });
  } else {
    alert(data.message);
  }
};

const setImage = (data, tag) => {
  tag.src = `/cartify/uploads/categoryImg/${data.data[0].image}`;
};

const fetchData = (action, params) =>
  axios.post(
    "/cartify/seller/product/add-product/select-category/addNewCategory.api.php",
    {
      action,
      ...params,
    }
  );

  document.addEventListener("axiosReady", function () {
  fetchData("showMainCategory").then(({ data }) =>
    setOption(data, document.getElementById("selectMainCategory"))
  );

});

document
  .getElementById("selectMainCategory")
  .addEventListener("change", (e) => {
    fetchData("showCategory", {
      mainCategory: e.target.value,
    }).then(({ data }) => {
      setOption(data, document.getElementById("selectCategory"));
      setImage(data, document.getElementById("mainCategoryImageView"));
    });
  });

document.getElementById("selectCategory").addEventListener("change", (e) => {
  fetchData("showSubCategory", {
    category: e.target.value,
  }).then(({ data }) => {
    setOption(data, document.getElementById("selectSubCategory"));
    setImage(data, document.getElementById("categoryImageView"));
  });
});

document.getElementById("selectSubCategory").addEventListener("change", (e) => {
  fetchData("showSubCategoryImg", {
    subCategory: e.target.value,
  }).then(({ data }) => {
    setImage(data, document.getElementById("subCategoryImageView"));
    showFilledSpecification();
  });
});

const showFilledSpecificationResponse = (response) => {
  console.log(response.data);
  document.getElementById("categoryId").value = response.data.data[0].SNo;
  const ViewfilledSpecification = document.getElementById(
    "ViewfilledSpecification"
  );
  ViewfilledSpecification.innerHTML = "";

  if (response.data.status === "error") {
    ViewfilledSpecification.innerHTML = response.data.message;
  } else if (response.data.status === "success") {
    if (!response.data.data) {
      ViewfilledSpecification.innerHTML = "No specification found";
    } else {
      for (let i = 1; i <= 40; i++) {
        const specKey = `specification${i}`;
        const shortUnitKey = `specificationUnit${i}`;

        if (response.data.data[specKey]) {
          const specification = document.createElement("span");
          const spec = response.data.data[specKey];
          const shortUnit = response.data.data[shortUnitKey] || "";

          const shortUnitRes = shortUnit ? `(${shortUnit})` : "";

          specification.textContent = `${spec} ${shortUnitRes}`;
          ViewfilledSpecification.appendChild(specification);
        }
      }
    }
  }
};

const showFilledSpecification = async () => {
  try {
    const response = await axios.post(
      "/cartify/seller/product/add-product/select-category/addNewCategory.api.php",
      {
        action: "ViewfilledSpecification",
        mainCategory: document.getElementById("selectMainCategory").value,
        category: document.getElementById("selectCategory").value,
        subCategory: document.getElementById("selectSubCategory").value,
      }
    );
    showFilledSpecificationResponse(response);
  } catch (error) {
    console.error("Error fetching specifications:", error);
  }
};

// Search ar js

const searchInput = document.getElementById("searchInput");
// const searchBtn = document.getElementById("searchBtn");
const searchResultContainer = document.getElementById("searchResult");

let debounceTimer;

// Debounced search function
const debouncedSearch = () => {
  clearTimeout(debounceTimer);
  debounceTimer = setTimeout(() => {
    performSearch(searchInput.value.trim());
  }, 300);
};

// Perform search
const performSearch = async (query) => {
  if (query.length >= 3) {
    try {
      const response = await axios.post(
        "/cartify/seller/product/add-product/select-category/searchCategory.api.php",
        {
          search: query,
        }
      );
      console.log(response.data);
      const data = response.data.data;
      if (data) {
        displayResults(data);
      } else {
        searchResultContainer.innerHTML = "<p>No results found.</p>";
      }
    } catch (error) {
      console.error(error);
      searchResultContainer.innerHTML =
        "<p style='color: red;'>Error fetching data. Please try again.</p>";
    }
  } else {
    searchResultContainer.innerHTML =
      "<p>Please type at least 3 characters to search.</p>";
    searchResultContainer.style.display = "block";
  }
};

// Display results
const displayResults = (data) => {
  searchResultContainer.innerHTML = "";
  searchResultContainer.style.display = "block";

  data.forEach((item) => {
    console.log(item);
    const resultItem = document.createElement("div");
    resultItem.innerHTML = `
                    <img loading="lazy"  src="/cartify/uploads/categoryImg/${item.subCategoryImage}" alt="${item.subCategoryName}" />
                    <p>${item.subCategoryName}</p>
                `;
    resultItem.addEventListener("click", () => selectedId(item.SNo));
    searchResultContainer.appendChild(resultItem);
  });
};
const setImageAfterSearch = (data, tag) => {
  tag.src = `/cartify/uploads/categoryImg/${data}`;
};
const setCkickOnData = (data) => {
  console.log(data);
  if (data.status === "success") {
    document.getElementById(
      "selectMainCategory"
    ).innerHTML += `<option value="" disabled selected>${data.data[0].mainCategoryName}</option>`;
    document.getElementById(
      "selectCategory"
    ).innerHTML = `<option value="" disabled selected>${data.data[0].categoryName}</option>`;
    document.getElementById(
      "selectSubCategory"
    ).innerHTML = `<option value="" disabled selected>${data.data[0].subCategoryName}</option>`;
    setImageAfterSearch(
      data.data[0].mainCategoryImage,
      document.getElementById("mainCategoryImageView")
    );
    setImageAfterSearch(
      data.data[0].categoryImage,
      document.getElementById("categoryImageView")
    );
    setImageAfterSearch(
      data.data[0].subCategoryImage,
      document.getElementById("subCategoryImageView")
    );
    axios
      .post(
        // "/cartify/seller/product/add-product/select-category/searchCategory.api.php",
        "/cartify/seller/product/add-product/select-category/addNewCategory.api.php",
        {
          action: "ViewfilledSpecification",
          mainCategory: data.data[0].mainCategoryName,
          category: data.data[0].categoryName,
          subCategory: data.data[0].subCategoryName,
        }
      )
      .then((response) => {
        console.log(response.data);
        showFilledSpecificationResponse(response);
      });
  }
};
// Select ID handler
const selectedId = (id) => {
  // Hide the search results
  searchResultContainer.style.display = "none";

  axios
    .post(
      "/cartify/seller/product/add-product/select-category/searchCategory.api.php",
      {
        showCategory: id,
      }
    )
    .then((response) => {
      setCkickOnData(response.data);
    })
    .catch((error) => {
      console.error(error);
    });

  // Optional: display a message or do something based on the response
  // alert(`You selected product ID: ${id}`);
};

// Event Listeners
searchInput.addEventListener("input", debouncedSearch);
// searchBtn.addEventListener("click", () =>
//   performSearch(searchInput.value.trim())
// );

const goToNext = () => {
  let id = document.getElementById("categoryId").value;
  console.log(id);
  if (!id) {
    document.getElementById("createCategoryMessage").style.display = "block";
    document.getElementById("createCategoryMessage").innerHTML =
      "Please select a category first.";
    alert("Please select a category first.");
    return;
  } else {
    axios
      .post(
        "/cartify/seller/product/add-product/select-category/setIdOfCategory.api.php",
        {
          id: id,
        }
      )
      .then((response) => {
        console.log(response.data);
        if (response.data.status === "success") {
          window.location.href =
            "/cartify/seller/product/add-product/basic-details";
        }
      })
      .catch((error) => {
        console.error(error);
      });
  }

  // window.location.href = "./../basic-details/?categoryId=" + id;
};
