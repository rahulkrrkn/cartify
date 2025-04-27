<?php
// Include the database connection file
include 'db.php';

// Check if the email and code are provided
if (isset($_GET['email']) && isset($_GET['code'])) {
  // Sanitize and validate the email and code
  $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);
  $code = filter_var($_GET['code'], FILTER_SANITIZE_NUMBER_INT);
  if (filter_var($email, FILTER_VALIDATE_EMAIL) && filter_var($code, FILTER_VALIDATE_INT)) {
    // Find the user with the email address
    $sql = "SELECT * FROM users WHERE email = '$email' AND active = 0";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // Get the user data and activation code
      $user = mysqli_fetch_assoc($result);
      $activation_code = $user['activation_code'];
      $activation_expiry = $user['activation_expiry'];

      // Check if the activation code is expired
      if (strtotime($activation_expiry) < time()) {
        // Delete the user record from the database
        $sql = "DELETE FROM users WHERE email = '$email'";
        mysqli_query($conn, $sql);
        // Display an error message and redirect to the registration page
        echo 'The activation link has expired. Please register again.';
        header('Refresh: 3; URL=register.php');
      } else {
        // Match the activation code with the hash in the database
        if ($code == $activation_code) {
          // Activate the user account and update the activated_at column
          $sql = "UPDATE users SET active = 1, activated_at = NOW() WHERE email = '$email'";
          if (mysqli_query($conn, $sql)) {
            // Display a success message and redirect to the login page
            echo 'Your account has been activated. You can now login.';
            header('Refresh: 3; URL=login.php');
          } else {
            // Display an error message
            echo 'There was an error activating your account. Please try again later.';
          }
        } else {
          // Display an error message
          echo 'The activation code is invalid. Please check your email and try again.';
        }
      }
    } else {
      // Display an error message and redirect to the registration page
      echo 'The email address does not exist or is already activated. Please register again.';
      header('Refresh: 3; URL=register.php');
    }
  } else {
    // Display an error message
    echo 'The email address or the activation code is not valid. Please check your email and try again.';
  }
} else {
  // Display an error message
  echo 'The email address and the activation code are required. Please check your email and try again.';
}
?>
