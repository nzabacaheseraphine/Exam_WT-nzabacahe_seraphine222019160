<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();
//nzabacahe seraphine 222019160--->
// Redirect to index.php
header("Location: index.html");
exit();
?>
