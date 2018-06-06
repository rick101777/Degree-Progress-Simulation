
<?php
	include ("profile.php");
	include ("includes/dbh.inc.php");
	
	require_once ("header.php");
	$fname= "<h4>" . $_SESSION['s_first'] . "<h4>";
	$lname= "<h4>" . $_SESSION['s_last'] . "<h4>";
	$major= "<h4>" . $_SESSION['s_major'] . "<h4>";
	$email= "<h4>" . $_SESSION['s_email'] . "<h4>";	
	$concentration= "<h4>" . $_SESSION['s_con'] . "<h4>";
	$id = $_SESSION['s_id'];
	//$fname = $_POST["fname"];
	//$lname = $_POST["lname"];
	
	
	
	if (empty($_POST["fname"])) {
		//$nameErr = "Name is required";
	} else {
		$c = $_POST["fname"];
		$query = "UPDATE POPULATION SET  FNAME = '$c' WHERE ID = '$id'";		
		mysqli_query($conn, $query);
	}

	if (empty($_POST["lname"])) {
		//$nameErr = "Name is required";
	} else {
		$c = $_POST["lname"];
		$query = "UPDATE POPULATION SET  LNAME = '$c' WHERE ID = '$id'";	
		mysqli_query($conn, $query);
	}
	
	if (empty($_POST["major"])) {
		//$nameErr = "Name is required";
	} else {
		$c = $_POST["major"];
		$query = "UPDATE POPULATION SET  MAJOR = '$c' WHERE ID = '$id'";		
		mysqli_query($conn, $query);
	}	
	
	if (empty($_POST["concentration"])) {
		//$nameErr = "Name is required";
		echo "damn";
	} else {
		echo "hello dawg";
		echo $email;
		$c = $_POST["concentration"];
		$query = "UPDATE POPULATION SET  CONCENTRATION = '$c' WHERE ID = '$id'";	
		mysqli_query($conn, $query);
		//$conn->query($query);
		//$conn->close();
	}	
	$conn->close();
	
?>