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
session_start();
include 'wordFilter.php';
require_once 'dbConnect.php';
dbConnect();

$upvote = $_GET["Upvote"];
$downvote = $_GET["Downvote"];
$post_id = $_GET["postVotedId"];
$user_id = $_SESSION["ID"];

//check if user chose like or dislike
if($upvote == "like"){
    //insert appropriate user into db as vote 
    $sql = "INSERT INTO `post_rating`(`RATE_ID`, `VOTE`, `userpost_POST_ID`, `userdata_ID`)
VALUES (NULL, '$upvote', '$post_id','$user_id')";
    
    if(mysqli_query($conn, $sql)){
        echo "New vote added";
        echo "<br>";
        header("Location:viewAllPosts.php");
        exit;   
    }
}elseif($downvote == "dislike"){
    //insert appropriate user choice into db as vote
    $sql = "INSERT INTO `post_rating`(`RATE_ID`, `VOTE`, `userpost_POST_ID`, `userdata_ID`)
VALUES (NULL, '$downvote', '$post_id','$user_id')";
    
    if(mysqli_query($conn, $sql)){
        echo "New vote added";
        echo "<br>";
        header("Location:viewAllPosts.php");
        exit;   
    }
}
?>
<a href = "viewAllPosts.php">View Posts</a>
  </div>
</body>
</html>

