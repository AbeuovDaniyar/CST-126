<?php
//the following save and get functions are to save var as session and return them
function saveUserId($id)
{
	session_start();
	$_SESSION["ID"] = $id;
}
function getUserId()
{
	session_start();
	return $_SESSION["ID"];
}
function saveUserName($username)
{
	session_start();
	$_SESSION["USERNAME"] = $username;
}

function getUserName()
{
	session_start();
	return $_SESSION["USERNAME"];
}

//function to get all users in the array
function getAllUsers(){
    require_once 'dbConnect.php';
	$sql = "SELECT `POST_ID`, `POST_TITLE`, `POST_DESC`, FROM `userpost`";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	    	$posts = array();
	        $index = 0;
  		// output data of each row
  		while($row = mysqli_fetch_assoc($result)) {
  			$posts[$index] = array($row["POST_ID"], $row["POST_TITLE"], 
  			$row["POST_DESC"], $row["POST_DESC"]);
  			++$index;
  		} 		
	} else {
  	echo "0 results";
	}
	return $posts;	
}
//function to get number of rows from post category
function getRows($postcategory){
	require_once 'dbConnect.php';
	$sql = "SELECT * FROM `userpost` WHERE `POST_CATEGORY` = '$postcategory'";
	$result = mysqli_query($conn, $sql);
	 $rowcount = mysqli_num_rows($result);
	 return $rowcount;
}

?>