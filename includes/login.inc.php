<?php
session_start();


if (isset($_POST['submit'])) {
  include ('dbh.inc.php');

  $mail = mysqli_real_escape_string($conn, $_POST['mail']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

  //Error handkers
  //Check if inputs are null
  if (empty($mail)||empty($pwd)) {
    header("Location: ../index.php?login=empty");
    exit();
  }else{
    $sql="SELECT * FROM Students WHERE Student_Email='$mail'";
    $result=mysqli_query($conn, $sql);
    $resultCheck=mysqli_num_rows($result);
    if ($resultCheck<1) {
      header("Location: ../index.php?login=error");
      exit();
    }else {
      if ($row=mysqli_fetch_assoc($result)) {
        //check password
        if ($pwd!=$row['Student_Password']) {
          header("Location: ../index.php?login=error");
          exit();
        }
        elseif ($pwd==$row['Student_Password']) {
          //login the user
          $_SESSION['s_id']=$row['Student_ID'];
          $_SESSION['s_first']=$row['First_Name'];
          $_SESSION['s_last']=$row['Last_Name'];
          $_SESSION['s_email']=$row['Student_Email'];
          $_SESSION['s_major']=$row['Majors'];
          header("Location: ../home.php");
          exit();
        }
      }
    }
  }
}else{
  header("Location: ../index.php?login=error");
  exit();
}
