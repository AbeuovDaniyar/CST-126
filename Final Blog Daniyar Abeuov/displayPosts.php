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

  <form action="displayPosts.php" method="get"> 
       <label for="games">Choose your game category: </label>
  <input list="games_category" name="games" id="games">
  <datalist id="games_category">
    	<option value="Black Desert Online">Black Desert Online</option>
    	<option value="Cyberpunk">Cyberpunk</option>
      	<option value="COD">COD</option>
    	<option value="Overwatch">Overwatch</option>
    	<option value="Among us">Among us</option>
  </datalist> <br>
  <div class="button">
      <input type="submit" value="Show" id="button-form-submit">
    </div>
  </form>
<?php
include 'wordFilter.php';
require_once 'dbConnect.php';
$postcategory = $_GET["games"];
//selecting every row and displaying it 
//displaying all posts
$sql = "SELECT * FROM `userpost` WHERE `POST_CATEGORY` IN ('$postcategory')";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  	echo  wordFilter($row["POST_TITLE"]). "<br>";
  	echo  "<textarea rows = '15' cols='120'>" . wordFilter($row["POST_DESC"]). "</textarea>" . "<br>";
    echo "***********************************************<br>";	
  }
}     
?>
	    
  
  </div>
</body>
</html>