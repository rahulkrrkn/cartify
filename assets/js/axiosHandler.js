function waitForAxiosReady() {
  return new Promise((resolve) => {
    if (window.axiosReady) {
      resolve();
    } else {
      document.addEventListener(
        "axiosReady",
        () => {
          window.axiosReady = true;
          resolve();
        },
        { once: true }
      ); // Ensures the event is listened to only once
    }
  });
}

async function sendAxios(
  url,
  data = {},
  method = "POST",
  headers = {},
  // timeout = 5000
) {
  await waitForAxiosReady(); // Wait for axiosReady before proceeding

  try {
    const config = {
      url,
      method: method.toUpperCase(),
      headers: {
        "Content-Type": "application/json",
        ...headers,
      },
      // timeout,
    };

    if (["POST", "PUT", "PATCH"].includes(config.method)) {
      config.data = data;
    } else {
      config.params = data;
    }
    console.log("Sending request to:"+url);
    const response = await axios(config);
    return checkResponse(response.data);
  } catch (error) {
    return {
      status: "error",
      message:
        error.response?.data?.message || error.message || "Request failed",
    };
  }
}

// Example checkResponse function
function checkResponse(responseData) {
  console.log(responseData);
  loadingPage("end");
  if (responseData.type === "message") {
    showMessage(responseData);
  } else if (responseData.type === "alert") {
    showAlert(responseData);
  } else if (responseData.type === "confirm") {
  } else if (responseData.type === "redirect") {
    window.location.href = responseData.url;
  }
  return responseData;
}

// Mark axios as ready
document.addEventListener("axiosReady", () => {
  window.axiosReady = true;
});

// // Example Usage
// sendAxios("http://localhost/cartify/helper/razorpay/autoloadRazorpay.php", {
//   name: "John Doe",
//   email: "john@example.com",
// })
//   .then((response) => console.log(response))
//   .catch((error) => console.error(error));

async function sendAxiosImg(url, data) {
  const response = await axios.post(url, data);
  return checkResponse(response.data);
  
}