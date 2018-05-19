<?php
include ('../includes/dbh.inc.php');

$id = mysqli_real_escape_string($conn, $_POST['cid']);
$sql = "DELETE FROM t_courses WHERE COURSE_ID = $id";
mysqli_query($conn, $sql);
header("Location: delete_user.php?insert=success");
?>
