document.addEventListener("DOMContentLoaded", function () {
  const productShow = document.getElementById("productShow");

  // Define sellerId and SNo (for testing, replace with dynamic values as needed)
  const productId = new URLSearchParams(window.location.search).get(
    "productSNo"
  );

  sendAxios("/cartify/seller/product/view-product/viewProduct.api.php", {
    SNo: productId,
  })
    .then((response) => {
      if (response.status === "success") {
        const product = response.data[0]; // Assuming the API returns an array
        renderProduct(product);
      } else {
        productShow.innerHTML = `<p>No product found</p>`;
      }
    })
    .catch((error) => {
      console.error("Error fetching product:", error);
      productShow.innerHTML = `<p>Error fetching product data.</p>`;
    });

  function renderProduct(product) {
    productShow.innerHTML = `
             <div class="ViewSingleProduct"> 
        <div class="MainImage"> 
          <img loading="lazy"  src="/cartify/uploads/productImg/${
            product.ProductImage1
          }" alt="Main Product Image"> 
          <div class="RemainImages"> 
            ${renderProductImages(product)}
          </div>
        </div>
        <div class="ViewSingleProductDetails"> 
          <h3 class="SingleProductName">${product.ProductName}</h3>
          <p class="ProductBrand"><strong>Brand:</strong> ${product.Brand}</p>
          <p class="DeliveryCharge"><strong>Status:</strong> ${
            product.Status
          }</p>
          <div class="SingleProductPrice">
            <span class="SingleProductBuyingPrice">$${
              product.AdditionalCharges
            }</span>
          </div>
          <p><strong>Average Rating:</strong> ${product.AverageRating} (${
      product.TotalRatings
    } ratings)</p>
          <p><strong>Total Ordered:</strong> ${product.TotalOrderd}</p>
          <p><strong>Total Reviews:</strong> ${product.TotalReviews}</p>
        `;
  }

  function renderProductImages(product) {
    let imagesHTML = "";
    for (let i = 1; i <= 10; i++) {
      const imageKey = `ProductImage${i}`;
      if (product[imageKey]) {
        imagesHTML += `<img loading="lazy"  src="/cartify/uploads/productImg/${product[imageKey]}" alt="Product Image ${i}" class="RemainImages" />`;
      }
    }
    return imagesHTML || "<p>No additional images available</p>";
  }
});
