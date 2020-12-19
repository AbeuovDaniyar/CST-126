<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Post</title>
  <link rel="stylesheet" href="adminPage.css">
</head>

<body>
  <div id="main-holder">
  <div class="topnav">
  <a class="active" href = "index.html">Home</a>
  <a href="post.html">Add post</a>
  <a href = "viewAllPosts.php">View Posts</a>
  <a href = "login.html">Log In</a>
  <a href = "register.html">Register</a>
  <a href = "admin.php">Admin Page</a>
  </div>
<h1 id="login-header">Add Post</h1>
<?php
/*
 * add reply file where user can reply to posts 
 */
//define variables
session_start();

//include files with database connection and other functions
include 'dbConnect.php';
dbConnect();
include 'wordFilter.php';

$replies = $_GET["replies"];
$id = $_GET["id"];
$user_id = $_SESSION['ID'];

//add post into the database
$sql_statement = "INSERT INTO `replies`(`ID`, `REPLY_TEXT`, `userpost_POST_ID`, `userdata_ID`) 
VALUES (NULL, '$replies' , '$id' , '$user_id')";

if(mysqli_query($conn, $sql_statement)){
	echo "New reply added";
	echo "<br>";
	header("Location:viewAllPosts.php");
	exit;
	
}else{
	echo "Error: " . $sql_statement . "<br>" . mysqli_error($conn);
}
?>
<a href = "viewAllPosts.php">View Posts</a>
  </div>
</body>
</html>

