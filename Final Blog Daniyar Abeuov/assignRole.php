<!-- Admin edit post page ver 1.0 
	here can assign roles
--> 
<?php 
//Session to check if user was loggen in and has admin role
session_start();
if($_SESSION["ROLE"] != 'admin'){
	echo "Please log in as admin <br>";
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href="adminPage.css">
</head>

<body>
  <div id="main-holder">
  <div class="topnav">
  <a class="active" href="admin.php">Admin Main</a>
  <a href = "index.html">Home</a>
  <a href = "users.php">Users</a>
  </div>
  <h1 id="login-header">Edit Post</h1>
  <?php 
	require_once 'dbConnect.php';
	
	$userID = $_GET['userId'];
	$assignRole = $_GET['role'];
	//using UPDATE statement from mysql to edit rows by id
	//assigning a role to any user
	$sql_statement = "UPDATE `userdata` SET 
	`ROLE`= '$assignRole' 
	WHERE `userdata`.`ID` = '$userID'";
	$result = mysqli_query($conn, $sql_statement);
	if($result){
		echo "Role assigned to: " . $assignRole;
	}else{
		echo "Error";
	}
	?>
<a href= 'users.php'>back</a>
  </div>
</body>
</html>