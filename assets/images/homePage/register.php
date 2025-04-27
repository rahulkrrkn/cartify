<?php
// Include the database connection file
include 'db.php';

// Check if the form is submitted
if (isset($_POST['register'])) {
  // Get the user input
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // Validate the user input
  if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
    // Display an error message if any field is empty
    echo 'Please fill all the fields kishan has commandade.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Display an error message if the email is not valid
    echo 'Kya yaar🧐,Sahi email id dalo';
  } elseif ($password != $confirm_password) {
    // Display an error message if the passwords do not match
    echo 'The passwords do not match';
  } else {
    // Check if the email already exists in the database
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // Display an error message if the email already exists
      echo 'The email is already taken';
    } else {
      // Generate a random activation code and expiry time
      $activation_code = rand(100000, 999999);
      $activation_expiry = date('Y-m-d H:i:s', strtotime('+1 day'));

      // Hash the password using the password_hash function
      $password = password_hash($password, PASSWORD_DEFAULT);

      // Insert the user data and activation code in the database
      $sql = "INSERT INTO users (username, email, password, activation_code, activation_expiry) VALUES ('$username', '$email', '$password', '$activation_code', '$activation_expiry')";
      if (mysqli_query($conn, $sql)) {
        // Send an email with the activation link to the user's email address
        $subject = 'Email Verification';
        $message = 'Hello ' . $username . ',\n\nThank you for registering on our website. Please click the link below to verify your email address:\n\n' . APP_URL . '/verify.php?email=' . $email . '&code=' . $activation_code . '\n\nThe link will expire in 24 hours.\n\nRegards,\nAdmin';
        $headers = 'From: ' . SENDER_EMAIL_ADDRESS . '\r\n';
        if (mail($email, $subject, $message, $headers)) {
          // Display a success message if the email is sent
          echo 'A verification email has been sent to your email address. Please check your inbox and click the link to activate your account.';
        } else {
          // Display an error message if the email is not sent
          echo 'There was an error sending the verification email. Please try again later.';
        }
      } else {
        // Display an error message if the user data is not inserted
        echo 'There was an error registering your account. Please try again later.';
      }
    }
  }
}
?>
