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
      $sql="SELECT * FROM POPULATION WHERE EMAIL='$mail'";
      $result=mysqli_query($conn, $sql);
      $resultCheck=mysqli_num_rows($result);
      if ($resultCheck<1) {
        header("Location: ../index.php?login=error");
        exit();
      }
      else{
        if ($row=mysqli_fetch_assoc($result)) {
          if ($pwd!=$row['PASSWORD']) {
            header("Location: ../index.php?login=error");
            exit();
          }
          elseif($pwd==$row['PASSWORD'] && $row['PID']=="STU"){
            $_SESSION["s_email"]= $row['EMAIL'];
            $_SESSION['s_id']=$row['ID'];
            $_SESSION['s_first']=$row['FNAME'];
            $_SESSION['s_last']=$row['LNAME'];
            $_SESSION['s_major']=$row['MAJOR'];
            $_SESSION['s_con']=$row['CONCENTRATION'];
            header("Location: ../home.php");
            exit();
          }
          elseif ($pwd==$row['PASSWORD'] && $row['PID']=="ADM") {
            $_SESSION["a_email"]= $row['EMAIL'];
            $_SESSION['a_id']=$row['ID'];
            $_SESSION['a_first']=$row['FNAME'];
            $_SESSION['a_last']=$row['LNAME'];
            header("Location: ../admin/home.php");
            exit();
          }
          elseif ($pwd==$row['PASSWORD'] && $row['PID']=="FAC") {
            $_SESSION["f_email"]= $row['EMAIL'];
            $_SESSION['f_id']=$row['ID'];
            $_SESSION['f_first']=$row['FNAME'];
            $_SESSION['f_last']=$row['LNAME'];
            $_SESSION['f_dept']=$row['DEPARTMENT'];
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
