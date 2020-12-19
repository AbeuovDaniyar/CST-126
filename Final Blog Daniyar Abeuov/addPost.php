<?php 
//check if user is logged in
session_start();
if(!$_SESSION["loggedIn"]){
    echo "Please log in <br>";
    header("Location: login.html");
    exit;
}
?>
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
 * add post file where user can add post 
 */
//define variables
$posttitle = $_GET["postTitle"];
$postdesc = $_GET["postDesc"];
$postcategory = $_GET["games"];
$user_id = $_SESSION['ID'];

//include files with database connection and other functions
include 'dbConnect.php';
dbConnect();
include 'wordFilter.php';

//add post into the database
$sql_statement = "INSERT INTO `userpost`(`POST_ID`, `POST_TITLE`, `POST_DESC`, `POST_CATEGORY` , `userdata_ID`) 
VALUES (NULL, '$posttitle', '$postdesc', '$postcategory' , '$user_id')";

if(mysqli_query($conn, $sql_statement)){
	echo "New post added";
	echo "<br>";
}else{
	echo "Error: " . $sql_statement . "<br>" . mysqli_error($conn);
}
?>
<a href = "viewAllPosts.php">View Posts</a>
  </div>
</body>
</html>

