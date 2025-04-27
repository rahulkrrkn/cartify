sendAxios("/cartify/seller/product/view-products/viewProducts.api.php").then(
  (response) => {
    const data = response.data;
    if (response.status === "success") {
      showProducts(data);
    }
  }
);

const showProducts = (data) => {
  let productShow = document.querySelector("#productShow");
  productShow.innerHTML = "";
  data.forEach((product) => {
    let type = "";
    if (
      product.VarentTypeValue1 != null ||
      product.VarentTypeValue2 != null ||
      product.VarentTypeValue3 != null
    ) {
      console.log(product.productSNo);
      type += "<li>Type: ";
      if (product.VarentTypeValue1 != null) {
        type += product.VarentTypeValue1;
      }
      if (product.VarentTypeValue2 != null) {
        type += " > ";
        type += product.VarentTypeValue2;
      }
      if (product.VarentTypeValue3 != null) {
        type += " > ";
        type += product.VarentTypeValue3;
      }
      type += "</li>";
    }

    // console.log(product);
    productShow.innerHTML += `<div class="product-container productNo${product.productSNo}">
        <div class="product-image">
            <img loading="lazy"  src="/cartify/uploads/productImg/${product.image}" alt="Product Image" class="product-image">
        </div>
        <div class="product-info">
            <div class="product-name"> ${product.productName} </div>
        </div>
        <div class="product-details">
            <li>Price: $${product.price}</li>
            <li>Brand: ${product.brand}</li>
            <li>Stock: ${product.stock}</li>
            <li>Rating: ${product.rating}</li>
            <li>Total Ordered: ${product.totalOrderd}</li>
             ${type}
             </div>
            <div class="button">
            <button class="btn btnP2" onclick="deleteProduct(${product.productSNo})"><i class="fa-solid fa-trash-can"></i></button>
            <button class="btn btnP2" onclick="viewProduct(${product.productSNo})"><i class="fa-solid fa-eye"></i></button>
            <button class="btn btnP2" onclick="editProduct(${product.productSNo})"><i class="fa-solid fa-pen-to-square"></i></button>
            </div>
            </div>
    `;
  });
};

const viewProduct = (productSNo) => {
  window.location.href = `/cartify/seller/product/view-product/?productSNo=${productSNo}`;
  console.log(productSNo);
};
const deleteProduct = (productSNo) => {
  modifyProducts(productSNo, "delete", () => {
    document.querySelector(`.productNo${productSNo}`).remove();
  });
};
const editProduct = (productSNo) => {
  modifyProducts(productSNo, "edit", () => {
    window.location.href = "/cartify/seller/product/edit-product/";
  });
};

const modifyProducts = (productSNo, type, callback) => {
  sendAxios("/cartify/seller/product/view-products/modifyProduct.api.php", {
    productSNo: productSNo,
    type: type,
  }).then((response) => {
    //   console.log(response.data);

    const data = response.data;
    if (response.status === "success") {
      callback();
    }
  });
};
