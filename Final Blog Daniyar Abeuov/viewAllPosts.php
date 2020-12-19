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
  <title>POST</title>
  <link rel="stylesheet" href="adminPage.css">
</head>

<body>
  <div id="main-holder">
  <div class="topnav">
  <a  href = "index.html">Home</a>
  <a href="post.html">Add post</a>
  <a class="active" href = "viewAllPosts.php">View Posts</a>
  <a href = "login.html">Log In</a>
  <a href = "register.html">Register</a>
  <a href = "admin.php">Admin Page</a>
  </div>
    <h1 id="login-header">All posts</h1>

  <form action="viewAllPosts.php" method="get"> 
       <label for="games">Sort by game category: </label>
  <input list="games_category" name="games" id="games">
  <datalist id="games_category">
    	<option value="Black Desert Online">Black Desert Online</option>
    	<option value="Cyberpunk">Cyberpunk</option>
      	<option value="COD">COD</option>
    	<option value="Overwatch">Overwatch</option>
    	<option value="Among us">Among us</option>
  </datalist>
  <label for="searchPattern">Search by title: </label>
  <input type="text" name="searchPattern" id="username-field" class="login-form-field" placeholder="Search text">
<div class="button">
      <input type="submit" value="Sort" id="button-form-submit">
    </div>
  </form>
<?php
include 'wordFilter.php';
require_once 'dbConnect.php';
$postcategory = $_GET["games"];
$searchPattern = $_GET["searchPattern"];
//selecting a row where column matches the post category and/or post title matches search pattern
$sql = "SELECT * FROM `userpost` WHERE `POST_CATEGORY` IN ('$postcategory') AND POST_TITLE LIKE '%$searchPattern%'";
$result = mysqli_query($conn, $sql);
?>
<?php 
echo "<br>";
//displaying the posts and applying a word filter
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) { 
    echo "Post ID: " . $row["POST_ID"] . "    ";
  	echo  "Post Title: " . wordFilter($row["POST_TITLE"]). "<br>";
  	echo  "<textarea rows = '15' cols='100' readonly>" . wordFilter($row["POST_DESC"]). "</textarea>" . "<br>";?>
      <form action="processPostRating.php" method="get"> 
      <input type = "hidden" name = "postVotedId" value = "<?php echo $row['POST_ID']?>"></input><br>
      <input type="submit" name = "Upvote" value="like">
      <input type="submit" name = "Downvote" value="Dislike">
		</form>
    <?php 	
    //get post replies
    $post_id = $row["POST_ID"];
    $sql_replies = "SELECT * FROM `replies` WHERE `userpost_POST_ID` = '$post_id'";
    $result_replies = mysqli_query($conn, $sql_replies);
    if(mysqli_num_rows($result_replies) > 0){
        while($row_replies = mysqli_fetch_assoc($result_replies)){
            echo "<textarea rows = '5' cols = '50' readonly>" . wordFilter($row_replies['REPLY_TEXT']) . "</textarea>";
        }
    }
    
    ?>
  <form action="repliesHandler.php" method="get"> 
  <input type = "hidden" name = "id" value = "<?php echo $row['POST_ID']?>"></input><br>
  <textarea name = "replies" rows = "5" cols = "50">
  </textarea><br>
  <br>
  <div class="button">
   <input type="submit" value="Reply" id="button-form-submit">
  </div>
  </form><br>
    <?php 
  }
}
    ?>
  </div>
</body>
</html>