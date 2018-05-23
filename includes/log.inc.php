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
    }
    else{
      $sql="SELECT * FROM population WHERE Email='$mail'";
      $result=mysqli_query($conn, $sql);
      $resultCheck=mysqli_num_rows($result);
      if ($resultCheck<1) {
        header("Location: ../index.php?login=error");
        exit();
      }
      else{
        if ($row=mysqli_fetch_assoc($result)) {
          if ($pwd!=$row['Password']) {
            header("Location: ../index.php?login=error");
            exit();
          }
          elseif($pwd==$row['Password'] && $row['PID']=="STU"){
            $_SESSION["s_email"]= $row['Email'];
            $_SESSION['s_id']=$row['ID'];
            $_SESSION['s_first']=$row['FirstName'];
            $_SESSION['s_last']=$row['LastName'];
            $_SESSION['s_major']=$row['MajorList'];
            header("Location: ../home.php");
            exit();
          }
          elseif ($pwd==$row['Password'] && $row['PID']=="ADM") {
            $_SESSION["a_email"]= $row['Email'];
            $_SESSION['a_id']=$row['ID'];
            $_SESSION['a_first']=$row['FirstName'];
            $_SESSION['a_last']=$row['LastName'];
            header("Location: ../admin/home.php");
            exit();
          }
          elseif ($pwd==$row['Password'] && $row['PID']=="FAC") {
            $_SESSION["f_email"]= $row['Email'];
            $_SESSION['f_id']=$row['ID'];
            $_SESSION['f_first']=$row['FirstName'];
            $_SESSION['f_last']=$row['LastName'];
            $_SESSION['f_dept']=$row['Department'];
            header("Location: ../faculty/home.php");
            exit();
          }
        }
      }

    }
  }
  else{
    header("Location: ../index.php?login=error");
    exit();
  }
?>
