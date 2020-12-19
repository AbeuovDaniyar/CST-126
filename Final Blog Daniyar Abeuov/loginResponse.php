<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main</title>
  <link rel="stylesheet" href="page.css">
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
     <h2>Login was successful: <?php echo " " . $_SESSION["USERNAME"]; ?></h2>
     <a href = "index.html">Main</a>
  </div>
</body>
</html>