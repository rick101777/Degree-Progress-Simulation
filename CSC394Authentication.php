<?php
include_once("dbcontroller.php");

function hashPassword(){

    $db_handle = new DBController();
    $conn = $db_handle->connectDB();
    $result = runQuery($conn,"SELECT * FROM users WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
    $count  = numRows($result);
    $hash = password_hash($password, PASSWORD_BCRYPT, $result);

}

function check(){
    if(isset($_POST['submit'])) {
	    if($count==0) {
            $message = "Invalid Username or Password!";
            header("Location: ../index.php");
        } 

        else if($hash==$result['password']&& $result['role']=='student'){
            $_SESSION['s_id']=$result['Student_ID'];
            $_SESSION['s_first']=$result['First_Name'];
            $_SESSION['s_last']=$result['Last_Name'];
            $_SESSION['s_email']=$result['Student_Email'];
            $_SESSION['s_major']=$result['Majors'];
            header("Location: ../home.php");
            exit();
        }

        else if($hash==$result['password']&& $result['role']=='admin'){
            $_SESSION['a_id']=$result['Admin_ID'];
            $_SESSION['a_first']=$result['First_Name'];
            $_SESSION['a_last']=$result['Last_Name'];
            $_SESSION['a_email']=$result['Admin_Email'];
            $_SESSION['a_major']=$result['Majors'];
            header("Location: ../adminhome.php");
            exit();
        }
        else if($hash==$result['password']&& $result['role']=='faculty'){
            $_SESSION['f_id']=$result['Admin_ID'];
            $_SESSION['f_first']=$result['First_Name'];
            $_SESSION['f_last']=$result['Last_Name'];
            $_SESSION['f_email']=$result['Admin_Email'];
            $_SESSION['f_major']=$result['Majors'];
            header("Location: ../facultyhome.php");
            exit();
        }
	}
}


?>