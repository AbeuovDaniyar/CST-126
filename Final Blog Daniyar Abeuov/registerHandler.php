<?php
/*
 * RegistrationPageHandler where user can register a new account ver 1.2
 * changed the connection to database to a function
 */
$personName = $_POST["firstName"];
$personLastName = $_POST["lastName"];
$personEmail = $_POST["emailInput"];
$personUserName = $_POST["userName"];
$personPassword = $_POST["passwordInput"];

include 'dbConnect.php';
dbConnect();

// Check connection
if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

//Display error when fields are left blank.
if (empty($_POST["firstName"])) {
    echo "The First Name or is a required field and cannot be blank";
	echo "<br>";  
} 
if (empty($_POST["lastName"])) {
    echo "The Last Name or is a required field and cannot be blank";
	echo "<br>";  
} 
if (empty($_POST["emailInput"])) {
    echo "The Email is a required field and cannot be blank";
	echo "<br>";  
}
if (empty($_POST["passwordInput"])) {
    echo "The Password is a required field and cannot be blank";
	echo "<br>";  
} 
//instert data into sql tables
$sql_statement = "INSERT INTO `userdata` (`ID`, `FIRST_NAME`, `LAST_NAME`, 
`EMAIL`, `USERNAME`, `PASSWORD`) VALUES (NULL, '$personName', 
'$personLastName', '$personEmail', '$personUserName', '$personPassword');";
//check if data was entered
if(mysqli_query($conn, $sql_statement)){
	echo "New record created successfully";
	echo "<br>";
}else{
	echo "Error: " . $sql_statement . "<br>" . mysqli_error($conn);
}
echo "<br><a href = 'index.html'>Main</a>"
?>