<?php
// Connect to database (replace dbname, username, password with actual credentials)
require_once "databaseconnection.php";
//<!---nzabacahe seraphine 222019160--->Adminusers Registration Form -->

$uname = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT *FROM users WHERE username='$uname' AND password='$password'";
$result =$connection->query($sql);
if ($result->num_rows >0) {
  // echo "successfully loggedin!";
  header("Location: dashboardusers.html");
      exit();
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
?>
