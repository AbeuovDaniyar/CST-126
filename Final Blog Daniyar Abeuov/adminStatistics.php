<!-- Admin page ver 1.0 
	can log in as admin if user was given admin role
	here can view all posts edit and delete posts
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
  <a href="admin.php">Admin Main</a>
  <a href = "index.html">Home</a>
  <a href = "users.php">Users</a>
  <a class="active" href = "adminStatistics.php">Statistics</a>
</div>

<h1 id="login-header">Statistics</h1>

  <form action="adminStatistics.php" method="get"> 
       <label for="games">Sort by game category: </label>
  <input list="games_category" name="games" id="games">
  <datalist id="games_category">
    	<option value="Black Desert Online">Black Desert Online</option>
    	<option value="Cyberpunk">Cyberpunk</option>
      	<option value="COD">COD</option>
    	<option value="Overwatch">Overwatch</option>
    	<option value="Among us">Among us</option>
  </datalist><br>
<div class="button">
      <input type="submit" value="Show" id="button-form-submit">
    </div>
  </form>
  
<?php 
echo "<br>";
require_once 'dbConnect.php';
include 'userFuncs.php';
//counting rows in game categories and displaying the result 
$postcategory = $_GET["games"];
	$sql = "SELECT * FROM `userpost` WHERE `POST_CATEGORY` = '$postcategory'";
	$result = mysqli_query($conn, $sql);
	 $rowcount = mysqli_num_rows($result);

echo "The number of posts in ". $postcategory ." is: ". $rowcount;
    ?>
  </div>
</body>
</html>
