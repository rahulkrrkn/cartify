const clickOnProduct = (productVariantsSNo, event) => {
  loadingPage("start");
  uplodeData(productVariantsSNo, "clickOnProduct", event, () => {
    loadingPage("end");
    window.location.href = "/cartify/user/product/";
  });
};
const buyNow = (productVariantsSNo, event) => {
  event.stopPropagation();
  loadingPage("start");
  uplodeData(productVariantsSNo, "buyNow", event, () => {
    loadingPage("end");
    window.location.href = "/cartify/user/checkout/";
  });
};

const wishlist = (productVariantsSNo, event) => {
  event.stopPropagation();
  let icon = event.currentTarget.querySelector("i");
  
    let cartProductCount = document.getElementById("WishlistCount").innerText;
    cartProductCount = parseInt(cartProductCount);
    let wishlistButtonIs = icon.classList.contains("fa-regular");
    if (wishlistButtonIs) {
      document.getElementById("WishlistCount").innerText = cartProductCount + 1;
    } else {
      document.getElementById("WishlistCount").innerText = cartProductCount - 1;
    }
icon.classList.toggle("fa-regular");
icon.classList.toggle("fa-solid");

  uplodeData(productVariantsSNo, "wishlist", event, () => {
  });
};


const addToCart = (productVariantsSNo, event) => {
  event.stopPropagation();
  let cartProductCount = document.getElementById("CartCount").innerText;
  cartProductCount = parseInt(cartProductCount);
  console.log(cartProductCount);
  if (event.target.innerText === "Add To Cart") {
    document.getElementById("CartCount").innerText = cartProductCount + 1;
    event.target.innerText = "Remove";
  } else {
    document.getElementById("CartCount").innerText = cartProductCount - 1;
    event.target.innerText = "Add To Cart";
  }
  uplodeData(productVariantsSNo, "addToCart", event, () => {

  });
};

const uplodeData = (productVariantsSNo, type, event, callback) => {
  sendAxios("/cartify/user/functions/productsClick.api.php", {
      productVariantsSNo: productVariantsSNo,
      type: type,
    })
    .then((response) => {
      if (callback) callback(); 
     
    })
};
