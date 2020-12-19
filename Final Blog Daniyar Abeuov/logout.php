<?php
//logout file where user can logout
//destroying session variables and redirecting to logoutResponse
session_start();
$_SESSION["loggedIn"] = false;
session_destroy();
header("Location:logoutResponse.php");
?>