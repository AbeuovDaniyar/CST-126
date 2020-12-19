<!-- Admin Page ver 1.0 
	can log in as admin if user was given admin role
	here can view all users and assign roles
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
  <a class="active" href = "users.php">Users</a>
</div>
  <h1 id="login-header">Users</h1>
<?php 
require_once 'dbConnect.php';
//selecting every row and displaying it 
$sql = "SELECT * FROM `userdata`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "user id: " . $row["ID"]. "<br>" .
     "user's first name: " . $row["FIRST_NAME"]. "<br>" . 
     "user's last name: " . $row["LAST_NAME"]. "<br>" .
     "user's email: " . $row["EMAIL"]. "<br>" .
     "username: " . $row["USERNAME"]. "<br>" .
     "Role: " . $row["ROLE"]. "<br>";
    echo "***********************************************<br>";
    //below is the form with assign role button
    ?>
 
<form action = "assignRole.php" method="get">
<input type= "hidden" name = "userId" value="<?php echo $row["ID"]?>"></input>
<input type= "text" name = "role" placeholder = "Role">
<button type="submit">Assign Role</button>
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
