<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'login';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die('Could not connect to MySQL server: ' . mysqli_error($conn));
}
?>
