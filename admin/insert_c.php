<?php
include ('../includes/dbh.inc.php');

$cid = mysqli_real_escape_string($conn, $_POST['cid']);
$subject = mysqli_real_escape_string($conn, $_POST['sub']);
$cat = mysqli_real_escape_string($conn, $_POST['cat']);
$title = mysqli_real_escape_string($conn, $_POST['tname']);
$consent = mysqli_real_escape_string($conn, $_POST['con']);
$subd = mysqli_real_escape_string($conn, $_POST['subd']);
$location = mysqli_real_escape_string($conn, $_POST['loc']);
$prereq = mysqli_real_escape_string($conn, $_POST['pre']);
$autumn = mysqli_real_escape_string($conn, $_POST['atm']);
$winter = mysqli_real_escape_string($conn, $_POST['win']);
$spring = mysqli_real_escape_string($conn, $_POST['spr']);
$summer = mysqli_real_escape_string($conn, $_POST['sum']);

$sql= "INSERT INTO t_courses (COURSE_ID, SUBJECT, CAT_NUMBER, TITLE, CONSENT, SUBJECT_DESC, LOCATION, PREREQ, AUTUMN, WINTER, SPRING, SUMMER) VALUES ('$cid', '$subject', '$cat', '$title', '$consent', '$subd', '$location', '$prereq', '$autumn', '$winter', '$spring', '$summer')";
mysqli_query($conn, $sql);
header("Location: insert_class.php?insert=success");
