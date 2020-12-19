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
  <a class="active" href="admin.php">Admin Main</a>
  <a href = "index.html">Home</a>
  <a href = "users.php">Users</a>
  <a href = "adminStatistics.php">Statistics</a>
</div>
<h1 id="login-header">Admin Page</h1>
<?php 
require_once 'dbConnect.php';
//display current posts
//selecting every row and displaying it 
$sql = "SELECT * FROM `userpost`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "post id: " . $row["POST_ID"]. "<br>" .
     "Post Title: " . $row["POST_TITLE"]. "<br>" . 
     "Post: " . $row["POST_DESC"]. "<br>";
    echo "***********************************************<br>";
    //below are the forms to delete or edit with buttons
    ?>
 
<form action = "deletePost.php" method="get">
<input type= "hidden" name = "id" value="<?php echo $row["POST_ID"]?>"></input>
<button type="submit" id="button-form-submit">Delete</button>
</form><br>

<form action = "showEditPost.php" method="get">
<input type= "hidden" name = "editPostId" value="<?php echo $row["POST_ID"]?>"></input>
<button type="submit" id="button-form-submit">Edit</button>
</form>
    <?php 
  }
} else {
  echo "0 results";
}
?>
  </div>
</body>
</html>
