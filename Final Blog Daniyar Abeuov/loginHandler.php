<?php
/*
 * login handler where user can log in ver 1.2
 * changed the connection to database to a function
 * updates: changed the way the error is displayed
 * added log in response to display a succesful log in followed with username
 */
session_start();
$personUserName = $_POST["userName"];
$personPassword = $_POST["passwordInput"];
include 'dbConnect.php';
dbConnect();
//check if username or password is blank otherwise check if they match to the data in the 
//data table
if (empty($_POST["passwordInput"]) || empty($_POST["userName"])) {
    echo "The username or password is a required field and cannot be blank";
	echo "<br>";  
}else{
	//checking if username and password that user inputed is the same as data in the sql table
	$sql = "SELECT * FROM `userdata` 
	WHERE USERNAME = '$personUserName' and PASSWORD = '$personPassword'";	
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
    //save session var
	$_SESSION["USERNAME"] = $row['USERNAME'];
	$_SESSION["ROLE"] = $row['ROLE'];
	$_SESSION["ID"] = $row['ID'];
	$_SESSION["loggedIn"] = true;
	$count = mysqli_num_rows($result);
//if there is 1 record found then login otherwise show failed to log in
	if ($count == 0) {
	$message = "Failed to login";
	include 'failedLogin.php';
	
} elseif ($count == 1) {
	include 'loginResponse.php';
} else {
	echo "There are multiple users have registered";
} 	
} 

$mysqli->close();
?>