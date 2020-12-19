<!-- Admin delete page ver 1.0 
	here can delete posts
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
    <a class="active" href = "admin.php">Admin Page</a>
  <a href = "index.html">Home</a>
  <a href = "users.php">Users</a>
  </div>
  <h1 id="login-header">Delete Post</h1>
<?php 
require_once 'dbConnect.php';
//deleting a post by id
$postToDelete = $_GET['id'];
$sql_statement = "DELETE FROM `userpost` WHERE `userpost`.`POST_ID` = '$postToDelete'";
$result = mysqli_query($conn, $sql_statement);
if ($result) {
	echo "Deleting post..." . $postToDelete. "<br>";
	echo "Post deleted<br>";
  } else {
  echo "Error, try again";
}
?>
<a href= 'admin.php'>back</a>
  </div>
</body>
</html>
