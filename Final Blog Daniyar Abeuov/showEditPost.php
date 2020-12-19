<?php
/*
 * Page that shows fields where admin can edit posts
 */ 
//Session to check if user was loggen in and has admin role
session_start();
if($_SESSION["ROLE"] != 'admin'){
	echo "Please log in as admin <br>";
	exit;
}

require_once 'dbConnect.php';
//fethcing all the data from the row from the specific id
$postToEdit = $_GET['editPostId'];
$sql_statement = "SELECT * FROM `userpost` WHERE `POST_ID` = '$postToEdit' LIMIT 1";
$result = mysqli_query($conn, $sql_statement);
while($row = mysqli_fetch_array($result)){
	$edittedPostTitle = $row['POST_TITLE'];
	$edittedPostDesc = $row['POST_DESC'];
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
<!-- forms where already existing data from the row specific to that id is displayed and admin can edit text -->
<body>
  <div id="main-holder">
  <div class="topnav">
    <a class="active" href = "admin.php">Admin Page</a>
  <a href = "index.html">Home</a>
  <a href = "users.php">Users</a>
  </div>
  <h1 id="login-header">Edit Post</h1>
  
  
<!-- 
<form action="editPost.php" method="get">
    <div class="post-title">
      <input type="text" name="edittedPostTitle" id="postTitle-field"  value="<?php echo $edittedPostTitle;?>"></input>
      <input type= "hidden" name = "editPostId" value="<?php echo $postToEdit;?>"></input>	
    </div>
    <div class="post-desc">
      <input type="text" name="edittedPostDesc" id="post-Desc-field"  value="<?php echo $edittedPostTitle;?>"></input>
    </div>
    <div class="button">
      <input type="submit" value="Post" id="post-form-submit">
    </div>
    </form>
 -->
    
    
    
    
    <form action="editPost.php" method="get">
    <div class="post-title">
    <input type="text" name="edittedPostTitle" id="postTitle-field"  value="<?php echo $edittedPostTitle;?>"></input>
    <input type= "hidden" name = "editPostId" value="<?php echo $postToEdit;?>"></input>
    </div><br>
	<textarea id="post-Desc-field" name="postDesc" rows="20" cols="90">
	<?php echo $edittedPostDesc;?>
     </textarea>
    <div class="button">
      <input type="submit" value="Post" id="button-form-submit">
    </div>
    </form>
    <br><br>
  </div>
</body>
</html>