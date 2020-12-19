<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "registration";
$port = 8889;

// Create connection
$conn = mysqli_connect("$servername:$port", $username,
 $password, $dbname);
 
 function dbConnect(){
 	return $conn;
 }
?>