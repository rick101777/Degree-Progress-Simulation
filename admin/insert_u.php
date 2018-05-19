<?php
include ('../includes/dbh.inc.php');

$id = mysqli_real_escape_string($conn, $_POST['uid']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['pwd']);
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$pid = mysqli_real_escape_string($conn, $_POST['pid']);
$dept = mysqli_real_escape_string($conn, $_POST['dept']);
$major = mysqli_real_escape_string($conn, $_POST['major']);

$sql= "INSERT INTO population (ID, EMAIL, PASSWORD, FNAME, LNAME, PID, DEPARTMENT, MAJOR) VALUES ('$id', '$email', '$pass', '$fname', '$lname', '$pid', '$dept', '$major')";
mysqli_query($conn, $sql);
header("Location: insert_user.php?insert=success");
 ?>
