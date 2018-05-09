<?php
$message="";
include_once("dbcontroller.php");

if(count($_POST)>0) {
    $db_handle = new DBController();
	$conn = $db_handle->connectDB();
	$result = runQuery($conn,"SELECT * FROM users WHERE user_name='" . $_POST["userName"] . "' and password = '". $_POST["password"]."'");
	$count  = numRows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
	} else {
		$message = "You are successfully authenticated!";
	}
}
?>